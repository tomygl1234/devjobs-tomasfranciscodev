<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class NewCandidate extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($vacancy_id, $vacancy_name, $user_id)
    {
        $this->vacancy_id = $vacancy_id;
        $this->vacancy_name = $vacancy_name;
        $this->user_id = $user_id;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail', 'database'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        $url = url('/notifications');

        return (new MailMessage)
            ->line('¡You have received a new candidate for your vacancy!')
            ->line('¡You have received a new candidate for your vacancy!')
            ->line('¡The vacancy is: ' . $this->vacancy_name)
            ->action('See notifications', $url)
            ->line('Thank you for using DevJobs!');
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
    //Save the notification in the database
    public function toDatabase($notifiable)
    {
        return [
            'vacancy_id' => $this->vacancy_id,
            'vacancy_name' => $this->vacancy_name,
            'user_id' => $this->user_id,
        ];
    }
}
