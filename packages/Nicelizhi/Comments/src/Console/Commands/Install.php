<?php
namespace Nicelizhi\Comments\Console\Commands;
use Illuminate\Console\Command;

class Install extends Command {
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'comments:install';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Install the comments package';

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
        $this->info('Install the comments package');
    }
}