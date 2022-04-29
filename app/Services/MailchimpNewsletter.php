<?php 

namespace App\Services;
use MailchimpMarketing\ApiClient;


class MailchimpNewsletter implements Newsletter
{
    
    function __construct(protected ApiClient $client)
    {
        $this->key = config('services.mailchimp.key');
        $this->server = 'us14';
    }

   public function subscribe(String $email, string $list = null)
   {

    //list = what you gave us, if nothing then its whats in the config
    // 'null safe assignment operator'
    $list ??= config('services.mailchimp.list.subscribers');

    return $this->client->lists->addListMember($list, [
        'email_address' => $email,
        'status' => 'subscribed'
    ]);
   }

}