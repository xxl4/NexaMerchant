<?php
namespace Nicelizhi\Manage\Console\Commands\Customers;

use Illuminate\Console\Command;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Event;
use Webkul\Customer\Repositories\CustomerRepository;
use Webkul\Sales\Models\Order;


class ImportOrderCustomer extends Command {
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'manage:customers:import:order';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Impoty the customer from orders';

    public function __construct(
        protected CustomerRepository $customerRepository
    )
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {

        $count = Order::count();
        $max = 100;
        $offset = 0;
        $pages = ceil($count / $max);

        for($i=0; $i< $pages; $i++) {
            $offset = $i * $max;
            $items = Order::select(['id'])->offset($offset)->limit($max)->get();
            
            foreach($items as $item) {

                

               // var_dump($item->shipping_address);

                $shipping_address = $item->shipping_address;

                $this->info("import the customer: ".$shipping_address->email);

                //check the email exist
                $customer = $this->customerRepository->findOneByField('email', $shipping_address->email);

                if($customer) {
                    continue;
                }

                //check the phone exist
                $customer = $this->customerRepository->findOneByField('phone', $shipping_address->phone);

                if($customer) {
                    continue;
                }

                $data = [];
                $data['email'] = $shipping_address->email;
                $data['customer_group_id'] = 2;
                $data['first_name'] = $shipping_address->first_name;
                $data['last_name'] = $shipping_address->last_name;
                $data['gender'] = $shipping_address->gender;
                $data['phone'] = $shipping_address->phone;

                //var_dump($data);
    
                $this->createCuster($data);
                //exit;


            }

        }

        //exit;

        



        

        

        // $data = array_merge(request()->only([
        //     'first_name',
        //     'last_name',
        //     'gender',
        //     'email',
        //     'date_of_birth',
        //     'phone',
        //     'customer_group_id',
        // ]), [
        //     'password'    => bcrypt($password),
        //     'is_verified' => 1,
        // ]);

        


    }

    public function createCuster($data) {
        $password = rand(100000, 10000000);
        Event::dispatch('customer.registration.before');

        $data = array_merge($data, [
            'password'    => bcrypt($password),
            'is_verified' => 1,
        ]);

        $this->customerRepository->create($data);
    }
}