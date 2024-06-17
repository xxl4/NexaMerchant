<?php
namespace Nicelizhi\Apps\Console\Commands;

use Illuminate\Console\Command;

class UnInstall extends Command 
{
    protected $signature = 'apps:uninstall {name}';

    protected $description = 'Uninstall an app';

    public function handle()
    {
        $name = $this->argument('name');
        $this->info("Creating app: $name");
    }
}