<?php
namespace Nicelizhi\Apps\Console\Commands;

use Illuminate\Console\Command;

class Install extends Command 
{
    protected $signature = 'apps:install {name}';

    protected $description = 'Install an app';

    public function handle()
    {
        $name = $this->argument('name');
        $this->info("Creating app: $name");
    }
}