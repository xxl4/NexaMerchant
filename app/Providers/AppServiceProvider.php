<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;

class AppServiceProvider extends ServiceProvider
{
  /**
   * Bootstrap any application services.
   *
   * @return void
   */
  public function boot(): void
  {
    Schema::defaultStringLength(191);
    \Illuminate\Support\Facades\URL::forceScheme('https');
  }

  /**
   * Register any application services.
   *
   * @return void
   */
  public function register(): void
  {
  }
}
