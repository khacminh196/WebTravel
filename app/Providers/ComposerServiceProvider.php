<?php

namespace App\Providers;

use App\Models\Contact;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class ComposerServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        View::composer('*', function ($view) {
            $myContact = Contact::select('address', 'phone', 'email', 'website')->first();
            $view->with('myContact', $myContact);
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
    }
}
