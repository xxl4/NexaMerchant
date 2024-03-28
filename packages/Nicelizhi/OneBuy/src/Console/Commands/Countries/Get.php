<?php
namespace Nicelizhi\OneBuy\Console\Commands\Countries;

use Exception;
use Illuminate\Console\Command;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Log;

class Get extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'onebuy:countries:get';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Get countries List';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
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
        $dst_dir = public_path("template-common/checkout1/state");
        

        $url = "https://cdn-sgn.dfowebsys-h01.com/states/rw.json";

        $json = file_get_contents($dst_dir."/countries.json");
        $items = json_decode($json);
        foreach($items as $key=>$item) {
            $country_code = strtolower($item->countryCode);
            $dst_file = $dst_dir."/".$country_code.".json";
            $this->info($dst_file);
            if(!file_exists($dst_file)) {
                $url = "https://cdn-sgn.dfowebsys-h01.com/states/".$country_code.".json";
                $this->error($url);
                

                $client = new Client();
                try {
                    $res = $client->request('GET', $url);
                    var_dump($res->getStatusCode());
                    // "200"
                    $content = $res->getBody();
                    file_put_contents($dst_file, $content);
                }catch(Exception $e) {
                    var_dump($e->getCode());
                }
            }
            
        }
    }
}
