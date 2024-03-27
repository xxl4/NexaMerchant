<?php
namespace Nicelizhi\OneBuy\Console\Commands\Imports;

use Exception;
use Illuminate\Console\Command;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Redis;
use Maatwebsite\Excel\Facades\Excel;

class ImportFaq extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'onebuy:import:faq {--force=}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'import faq {--force=}';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    private $cache_key = "faq";

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $redis = Redis::connection('default');

        $force = $this->option("force");

        if($redis->exists($this->cache_key)) {
            
            if($force==true) {
                $redis->del($this->cache_key);
            }else{
                $this->error($this->cache_key." is online");
                return false;
            }
           
        }

        $faq_file = storage_path("imports/")."faq.xlsx";
        if(!file_exists($faq_file)) {
            $this->error("faq file not found");
            return false;
        }

        Excel::import(new \Nicelizhi\OneBuy\Imports\FaqImport(), $faq_file);

    }
}