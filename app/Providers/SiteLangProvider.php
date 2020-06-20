<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Riak\Connection;
use App\Model\SettingModel;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;
use Exception;
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
        try {
            DB::connection()->getPdo();
                if(Schema::hasTable('setting')) {
                    $locale = SettingModel::where('key','lang');
                    if($locale->count()) {
                        return \App::setLocale($locale->first()->value);
                    } else {
                        return \App::setLocale('en');
                    }
                }
        }catch(Exception $e) {
            
            print_r("\n You don't run setup for setting \n\n");

            return \App::setLocale('en');
        }
        //
    }
}
