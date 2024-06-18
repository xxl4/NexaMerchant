<?php
namespace Nicelizhi\Apps\Console\Commands;

class Search extends CommandInterface 
{
    protected $signature = 'apps:search {name}';

    protected $description = 'list an app';

    public function getAppVer() {
        return config("apps.ver");
    }

    public function getAppName() {
        return config("apps.name");
    }

    public function handle()
    {
        $name = $this->argument('name');
        if(empty($name)) {
            $this->error("App name is required!");
            return false;
        }
        $this->info("Install app: $name");

        if (!$this->confirm('Do you wish to continue?')) {
            // ...
            $this->error("App $name Install cannelled!");
            return false;
        }
        
        $dir = $this->getBaseDir($name);
        $this->info($dir);
    }
}