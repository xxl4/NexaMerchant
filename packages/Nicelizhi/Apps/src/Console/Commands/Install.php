<?php
namespace Nicelizhi\Apps\Console\Commands;

class Install extends CommandInterface 
{
    protected $signature = 'apps:install {name}';

    protected $description = 'Install an app';

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