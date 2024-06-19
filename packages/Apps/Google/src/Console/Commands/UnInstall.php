<?php
namespace NexaMerchant\Google\Console\Commands;

use Illuminate\Console\Command;

class UnInstall extends Command 
{
    protected $signature = 'Google:uninstall';

    protected $description = 'Uninstall Google an app';

    public function handle()
    {
        if (!$this->confirm('Do you wish to continue?')) {
            // ...
            $this->error("App Google UnInstall cannelled");
            return false;
        }
    }
}