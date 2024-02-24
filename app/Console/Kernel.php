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
        $schedule->command('shopify:order:post')->everyFiveMinutes()->withoutOverlapping(); // 投递成功的订单到shopify ，每五分钟投递一次
        # $schedule->command('shopify:order:get --force=true')->hourly()->withoutOverlapping(); // shopify 订单同步 1个小时同步一次
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
