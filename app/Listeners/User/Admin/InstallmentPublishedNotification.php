<?php

namespace App\Listeners\User\Admin;

use App\Events\User\Admin\InstallmentPublished;
use App\Notifications\MailTemplateNotification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class InstallmentPublishedNotification implements ShouldQueue
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
     * @param  InstallmentPublished  $event
     * @return void
     */
    public function handle(InstallmentPublished $event)
    {
        $installment = $event->installment->load('feeCategories.grades');

        foreach ($categories = $installment->feeCategories as $feeCategory) {
            foreach ($feeCategory->grades as $grade) {
                $grades[] = $grade->with('students.user')->get();
            }
        }
        foreach ($grades as $grade) {
            foreach ($grade->students as $student) {
                $student->user->notify(new MailTemplateNotification('installment', [
                    'variables' => [
                        'name' => $student->user->first_name,
                    ]
                ]));
            }
        }
    }
}
