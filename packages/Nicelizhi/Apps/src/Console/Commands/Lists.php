<?php
namespace Nicelizhi\Apps\Console\Commands;

class Lists extends CommandInterface 
{
    protected $signature = 'apps:lists';

    protected $description = 'list an app';

    public function getAppVer() {
        return config("apps.ver");
    }

    public function getAppName() {
        return config("apps.name");
    }

    public function handle()
    {
        
        $this->info("List apps");
        
    }
}