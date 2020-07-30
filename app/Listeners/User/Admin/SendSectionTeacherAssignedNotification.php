<?php

namespace App\Listeners\User\Admin;

use App\Events\User\Admin\SectionPosted;
use App\Notifications\MailTemplateNotification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class SendSectionTeacherAssignedNotification implements ShouldQueue
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
    }

    /**
     * Handle the event.
     *
     * @param  SectionPosted  $event
     * @return void
     */
    public function handle(SectionPosted $event)
    {
        $event->section->with(['sectionTeacher.user', 'grade']);
        if ($teacherId = $event->section->teacher_id) {
            $event->section->sectionTeacher->user->notify(new MailTemplateNotification('section_teacher_assigned', [
                'variables' => [
                    'name' => $event->section->sectionTeacher->user->first_name,
                    'section' => $event->section->name,
                    'grade' => $event->section->grade->name,
                ]
            ]));
        }
    }
}
