<?php
namespace Nicelizhi\Apps\Console\Commands;


class UnInstall extends CommandInterface
{
    protected $signature = 'apps:uninstall {name}';

    protected $description = 'Uninstall an app';

    public function handle()
    {
        $name = $this->argument('name');

        if(empty($name)) {
            $this->error("App name is required!");
            return false;
        }

        $this->info("Uninstall app: $name");

        if (!$this->confirm('Do you wish to continue?')) {
            // ...
            $this->error("App $name Uninstall cannelled!");
            return false;
        }
    }
}