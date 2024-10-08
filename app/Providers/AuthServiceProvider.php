<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;
use Illuminate\Auth\Notifications\VerifyEmail;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        // How to configure the mail content
        // VerifyEmail::toMailUsing(function($notifiable, $url){
        //     return(new MailMessage)
        //         ->subject('Verify your email address')
        //         ->line('Please click the button below to verify your email address.')
        //         ->action('Verify Email', $url)
        //         ->line('This link will expire in 24 hours.');

        // });
    }
}
