<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        //
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        # $schedule->command('invoice:cron')->dailyAt('3:00');
        # $schedule->command('product:index --type=price')->dailyAt('23:59');
        // $schedule->command('shopify:order:post')->everyMinute()->withoutOverlapping(); // post order to shopify
        //$schedule->command('shopify:order:get --force=true')->hourly()->withoutOverlapping()->timezone('Asia/Shanghai')->between('9:00', '19:00'); // shopify order sync
        //$schedule->command('shopify:order:get:shipped --force=true')->hourly()->withoutOverlapping()->timezone('Asia/Shanghai')->between('9:00', '19:00'); // shopify order sync
        //$schedule->command('shopify:customers:get')->hourly()->withoutOverlapping()->timezone('Asia/Shanghai')->between('9:00', '19:00'); // shopify customer sync
        $schedule->command('shopify:customers:post')->hourly()->withoutOverlapping()->timezone('Asia/Shanghai')->between('9:00', '19:00'); // shopify customer post sync
    }

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__.'/Commands');
        $this->load(__DIR__.'/../../packages/Webkul/Core/src/Console/Commands');

        require base_path('routes/console.php');
    }
}
