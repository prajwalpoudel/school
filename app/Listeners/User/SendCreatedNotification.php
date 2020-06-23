<?php

namespace App\Listeners\User;

use App\Events\User\Created;
use App\Notifications\MailTemplateNotification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class SendCreatedNotification
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  Created  $event
     * @return void
     */
    public function handle(Created $event)
    {
        $event->user->notify(new MailTemplateNotification('account_created', []));

        return ;
    }
}
