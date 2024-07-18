<?php
namespace Nicelizhi\Manage\Console\Commands\Customers;

use Illuminate\Console\Command;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Event;
use Webkul\Customer\Repositories\CustomerRepository;
use Webkul\Sales\Models\Order;
use GuzzleHttp\Exception\ClientException;
use Nicelizhi\Shopify\Models\ShopifyCustomer;
use Nicelizhi\Shopify\Models\ShopifyStore;
use Illuminate\Support\Facades\Cache;


class ImportOrderCustomer extends Command {
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'manage:customers:import:order';

    private $customerRepository;

    private $shopify_store_id = null;

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Impoty the customer from orders';

    public function __construct(
        protected ShopifyStore $ShopifyStore,
        protected ShopifyCustomer $ShopifyCustomer
    )
    {
        $this->shopify_store_id = config('shopify.shopify_store_id');
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {

        $this->importCsvData();
        return true;


        $this->customerRepository = app(CustomerRepository::class);

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

    public function importCsvData() {

        $shopifyStore = Cache::get("shopify_store_".$this->shopify_store_id);

        if(empty($shopifyStore)){
            $shopifyStore = $this->ShopifyStore->where('shopify_store_id', $this->shopify_store_id)->first();
            Cache::put("shopify_store_".$this->shopify_store_id, $shopifyStore, 3600);
        }
        if(is_null($shopifyStore)) {
            $this->error("no store");
            return false;
        }
        $shopify = $shopifyStore->toArray();

        $this->customerRepository = app(CustomerRepository::class);

        $file = storage_path("app/public/customers/customers_export_4.csv");
        $file = fopen($file, "r");
        $i = 0;
        while(! feof($file))
        {
            $data = fgetcsv($file);
            if($i == 0) {
                $i++;
                var_dump($data);
                continue;
            }
            
            //var_dump($data);
            if(empty($data[2])) {
                continue;
            }

            $customer = $this->customerRepository->findOneByField('email', $data[2]);
            if($customer) {
                continue;
            }

            $i++;

            $this->error("email import ". $data[2]);

            $customerData = [];
            $customerData['email'] = trim($data[2]);
            $customerData['customer_group_id'] = 1;
            $customerData['first_name'] = trim($data[0]);
            $customerData['last_name'] = trim($data[1]);
            $customerData['gender'] = "";
            

           $this->createCuster($customerData);
        
            $customerData['address1'] = trim($data[5]);
            $customerData['address2'] = trim($data[6]);
            $customerData['city'] = trim($data[7]);
            $customerData['Province'] = trim($data[8]);
            $customerData['country'] = trim($data[10]);
            $customerData['postcode'] = trim($data[12]);
            $customerData['phone'] = trim($data[13]);
            

            //var_dump($customerData);exit;


            $this->postCustomer($customerData, $customerData['email'], $shopify);

            $time = rand(0, 9);

            sleep($time);

            //if($i > 1000) exit;

            //exit; 
        }
        echo "done\r\n";
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

    /**
     * 
     * 
     * @param int order_id
     * @param string email
     * @param array $shopify
     * 
     */
    public function postCustomer($data, $email, $shopify) {
        $ShopifyCustomer = $this->ShopifyCustomer->where([
            'email' => $email
        ])->first();


        $client = new Client();

        $addresses = [];
        $addresses[] = [
            "first_name" => $data['first_name'],
            "last_name" => $data['last_name'],
            "address1" => $data['address1'],            
            "phone" => $data['phone'],
            "city" => $data['city'],
            "province" => $data['Province'],
            "country" => $data['country'],
            "zip" => $data['postcode']
        ];

        $email_marketing_consent = [];
        $email_marketing_consent['state'] = "subscribed";
        $email_marketing_consent['opt_in_level'] = "confirmed_opt_in";
        $email_marketing_consent['consent_updated_at'] = date("c");

        $note = "";

        $customer = [];
        $customer = [
            "first_name" => $data['first_name'],
            "last_name"  => $data['last_name'],
            "email"     => $data['email'],
            //"phone"     => $data['phone'],
            "verified_email"   => true,
            "addresses"  => $addresses,
            'tags'      => 'imported_customer',
            'email_marketing_consent' => $email_marketing_consent,
            'currency'  => config("app.currency"),
            'note'      => $note,
        ];
        $pOrder['customer'] = $customer;

        //var_dump($pOrder);


        try {
            $response = $client->post($shopify['shopify_app_host_name'].'/admin/api/2023-10/customers.json', [
                'http_errors' => true,
                'headers' => [
                    'Content-Type' => 'application/json',
                    'Accept' => 'application/json',
                    'X-Shopify-Access-Token' => $shopify['shopify_admin_access_token'],
                ],
                'body' => json_encode($pOrder)
            ]);
        }catch(ClientException $e) {
            //var_dump($e);
            var_dump($e->getMessage());
            // Log::error(json_encode($e->getMessage()));
            // Log::error(json_encode($pOrder));
            //\Nicelizhi\Shopify\Helpers\Utils::send($e->getMessage().'--' .$id. " 需要手动解决 ");
            //continue;
            //return false;
        }catch(\GuzzleHttp\Exception\RequestException $e){
            var_dump($e->getMessage());
        }finally  {
            
        }

        


    }
}