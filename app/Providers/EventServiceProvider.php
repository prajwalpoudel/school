<?php

namespace App\Providers;

use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;

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

        'App\Events\User\Created' => [
            'App\Listeners\User\SendCreatedNotification'
        ],
        'App\Events\User\Admin\SectionPosted' => [
            'App\Listeners\User\Admin\SendSectionRepresentativeAssignedNotification',
            'App\Listeners\User\Admin\SendSectionViceRepresentativeAssignedNotification',
            'App\Listeners\User\Admin\SendSectionTeacherAssignedNotification'
        ],
        'App\Events\User\Admin\InstallmentPublished' => [
            'App\Listeners\User\Admin\InstallmentPublishedNotification',
        ]
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();

        //
    }
}
