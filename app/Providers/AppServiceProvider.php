<?php

namespace App\Providers;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;
use Illuminate\Database\Eloquent\Relations\Relation;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
        Schema::defaultStringLength(200);
        Relation::morphMap([
            'Expense'=>\App\Expense::class,
            'Report'=> \App\Report::class,
            'Merchant'=>\App\Merchant::class,
            'Category'=>\App\Category::class,

        ]);
    }
}
