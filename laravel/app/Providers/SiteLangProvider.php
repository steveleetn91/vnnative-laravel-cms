<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Riak\Connection;
use App\Model\SettingModel;
use Illuminate\Support\Facades\Schema;
class SiteLangProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
        $this->app->singleton(Connection::class, function ($app) {
            return new Connection(config('riak'));
        });
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
        if(Schema::hasTable('setting')) {
            $locale = SettingModel::where('key','lang');
            if($locale->count()) {
                return \App::setLocale($locale->first()->value);
            } else {
                return \App::setLocale('en');
            }
        }
    }
}
