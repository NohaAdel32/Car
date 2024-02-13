<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\Contact;
use Illuminate\Pagination\Paginator;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        view()->composer("admin.includes.navigation",function($view){
            $counts=Contact::where("read_at",0)->count();
            $unreadMes=Contact::where("read_at",0)->get();
            $view->with("unread",$counts)->with("unreadMes", $unreadMes);
        });

        Paginator::useBootstrapFour();
    }
}
