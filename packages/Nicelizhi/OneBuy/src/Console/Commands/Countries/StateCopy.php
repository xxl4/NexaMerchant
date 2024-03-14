<?php
namespace Nicelizhi\OneBuy\Console\Commands\Countries;

use Exception;
use Illuminate\Console\Command;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Log;

class StateCopy extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'onebuy:countries:state:copy';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Countries State Copy';

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

        $langs = [
            'en',
            'de',
            'fr',
            'es'
        ];

        
        $dir = scandir($dst_dir);
        foreach($dir as $key=>$d) {
            if($d=='.' || $d=='..') continue;
            if(strlen($d)!=7) continue;
            $dpath = pathinfo($d);
            foreach($langs as $lang) {
                $dst_file = $dst_dir.'/'.$dpath['filename']."_".$lang.".json";
                $this->info($dst_file);
                if(!file_exists($dst_file)) {
                    $source = file_get_contents($dst_dir.'/'.$dpath['filename'].".json");
                    file_put_contents($dst_file, $source);
                }
            }
            //var_dump($dpath);exit;
        }
    }
}
