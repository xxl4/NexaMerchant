<?php
namespace Nicelizhi\Apps\Console\Commands;

use Illuminate\Console\Command;

class Create extends Command 
{
    protected $signature = 'apps:create {name}';

    protected $description = 'Create a new app';

    public function handle()
    {
        $name = $this->argument('name');
        $this->info("Creating app: $name");
    }
}