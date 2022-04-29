<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Services\MailchimpNewsletter;
use App\Services\Newsletter;
use MailchimpMarketing\ApiClient;


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

    }
}
