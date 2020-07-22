<?php

namespace App\Listeners\User\Admin;

use App\Events\User\Admin\SectionPosted;
use App\Notifications\MailTemplateNotification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class SendSectionRepresentativeAssignedNotification implements ShouldQueue
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
     * @param SectionPosted $event
     * @return void
     */
    public function handle(SectionPosted $event)
    {
        $event->section->with(['students.user', 'captain.user']);
        if ($captainId = $event->section->captain_id) {
            foreach ($event->section->students as $sectionStudent) {
                if($sectionStudent->id == $captainId)
                {
                    $sectionStudent->user->notify(new MailTemplateNotification('section_representative_self_assigned', [
                        'variables' => [
                            'name' => $sectionStudent->user->first_name,
                        ]
                    ]));
                }
                else
                {
                    $sectionStudent->user->notify(new MailTemplateNotification('section_representative_assigned', [
                        'variables' => [
                            'name' => $sectionStudent->user->first_name,
                            'representative' => $event->section->captain->user->full_name
                        ]
                    ]));
                }
            }
        }
    }
}
