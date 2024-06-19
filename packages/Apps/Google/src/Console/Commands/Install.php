<?php
namespace NexaMerchant\Google\Console\Commands;

use Illuminate\Console\Command;

class Install extends Command 
{
    protected $signature = 'Google:install';

    protected $description = 'Install Google an app';

    public function handle()
    {
        $this->info("Install app: Google");
        if (!$this->confirm('Do you wish to continue?')) {
            // ...
            $this->error("App Google Install cannelled");
            return false;
        }
    }
}