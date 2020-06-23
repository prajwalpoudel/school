<?php

namespace App\Notifications;

use App\Services\General\EmailTemplateService;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class MailTemplateNotification extends Notification
{
    use Queueable;
    /**
     * @var string
     */
    private $slug;
    /**
     * @var array
     */
    private $variables;
    /**
     * @var string
     */
    private $from;
    /**
     * @var EmailTemplateService
     */
    private $emailTemplateService;

    /**
     * Create a new notification instance.
     *
     * @param string $slug
     * @param array $data
     * @param EmailTemplateService $emailTemplateService
     */
    public function __construct(string $slug, array $data)
    {
        $this->slug = $slug;
        $this->variables = $data['variables'] ?? [];
        $this->from =$data['from'] ?? '';
        $this->emailTemplateService = app(EmailTemplateService::class);
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        $content = $this->emailTemplateService->getContent(
            $this->slug,
            $this->variables
        );
        $mail = (new MailMessage)
            ->markdown('emails.layout', ['content' => $content->content])
            ->subject($content->subject ?? '');

        if (!empty($content->email_from)) {
            $mail->from($content->email_from);
        }

        return $mail;
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
