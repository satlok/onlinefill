<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use App\model\Board;
use App\Observers\BoardObserver;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
         Schema::defaultStringLength(191);
         Board::observe(BoardObserver::class);
    }

    /**blic function boot()
    {
         Schema::defaultStringLength(191);
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
