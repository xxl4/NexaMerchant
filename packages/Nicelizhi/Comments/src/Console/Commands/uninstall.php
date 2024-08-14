<?php
namespace Nicelizhi\Comments\Console\Commands;
use Illuminate\Console\Command;

class UnInstall extends Command {
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'comments:uninstall';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'unInstall the comments package';

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
        $this->info('UnInstall the comments package');

        
    }
}