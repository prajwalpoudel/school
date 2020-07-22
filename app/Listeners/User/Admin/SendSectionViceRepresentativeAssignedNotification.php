<?php

namespace App\Listeners\User\Admin;

use App\Events\User\Admin\SectionPosted;
use App\Notifications\MailTemplateNotification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class SendSectionViceRepresentativeAssignedNotification implements ShouldQueue
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
     * @param  SectionPosted  $event
     * @return void
     */
    public function handle(SectionPosted $event)
    {
        $event->section->with(['students.user', 'viceCaptain.user']);
        if ($viceCaptainId = $event->section->vice_captain_id) {
            foreach ($event->section->students as $sectionStudent) {
                if($sectionStudent->id == $viceCaptainId)
                {
                    $sectionStudent->user->notify(new MailTemplateNotification('section_vice_representative_self_assigned', [
                        'variables' => [
                            'name' => $sectionStudent->user->first_name,
                        ]
                    ]));
                }
                else
                {
                    $sectionStudent->user->notify(new MailTemplateNotification('section_vice_representative_assigned', [
                        'variables' => [
                            'name' => $sectionStudent->user->first_name,
                            'representative' => $event->section->viceCaptain->user->full_name
                        ]
                    ]));
                }
            }
        }
    }
}
