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
    protected $signature = 'onebuy:import:faq';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'import faq';

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
        $redis = Redis::connection('default');

        $faq_file = storage_path("imports/")."faq.xlsx";
        if(!file_exists($faq_file)) {
            $this->error("faq file not found");
            return false;
        }

        Excel::import(new \Nicelizhi\OneBuy\Imports\FaqImport(), $faq_file);

    }
}