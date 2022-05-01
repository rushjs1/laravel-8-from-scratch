<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Services\MailchimpNewsletter;
use App\Services\Newsletter;
use MailchimpMarketing\ApiClient;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Blade;
use App\Models\User;




class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
    
     app()->bind(Newsletter::class, function(){
        
        $client = (new ApiClient)->setConfig([
            'apiKey' => config('services.mailchimp.key'),
            'server' => 'us14'
          ]);


        return new MailchimpNewsletter($client);
     });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //disable mass assignment restrictions accross entire app
        //Model::unguard();
        
        Gate::define('admin', function(User $user){
            return $user->username === 'rushjs1';
        });

        Blade::if('admin', function() {
            return request()->user()?->can('admin');
        });

    }
}
