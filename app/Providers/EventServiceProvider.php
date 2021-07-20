<?php

namespace App\Providers;

use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;
use App\Listeners\ReadTrackingHandling;
use App\Events\ReadTracking;
use App\Listeners\LoginListener;
use Illuminate\Auth\Events\Login;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
        ReadTracking::class => [
            ReadTrackingHandling::class,
        ],
        Login::class => [
            LoginListener::class,
        ],
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        Event::listen(
        ReadTracking::class,
            [ReadTrackingHandling::class, 'handle']
        );

        Event::listen(function (ReadTrackingHandling $event) {
            //
        });
    }
}
