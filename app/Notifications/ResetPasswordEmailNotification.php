<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class ResetPasswordEmailNotification extends Notification
{
    use Queueable;

    protected $url;

    /**
     * Create a new notification instance.
     */
    public function __construct($url)
    {
       $this->url = $url;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)
        ->subject(__('mail.reset_password'))
        ->greeting(__('mail.hello'). ' ' .$notifiable->last_name.' '.$notifiable->first_name)
        ->cc('9268188@gmail.com')
        ->line(__('mail.you_have_sent_request_change_password'))
        ->line(__('mail.to_change_password_click_button'))
        ->action(__('mail.сhange_password'), $this->url)
        ->line(__('mail.if_wasnt_you_dont_need_do_anything'));
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            //
        ];
    }
}
