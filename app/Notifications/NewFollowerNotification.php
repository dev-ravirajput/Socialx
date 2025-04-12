<?php

namespace App\Notifications;

use Illuminate\Notifications\Notification;
use Illuminate\Notifications\Messages\DatabaseMessage;
use Illuminate\Notifications\Messages\MailMessage;
use App\Models\User;

class NewFollowerNotification extends Notification
{
    protected $follower;

    // Inject the follower (user who follows) into the notification
    public function __construct(User $follower)
    {
        $this->follower = $follower;
    }

    // Define which channels the notification will use
    public function via($notifiable)
    {
        return ['database', 'mail']; // You can use 'mail' for email notifications
    }

    // Notification data for database storage
    public function toDatabase($notifiable)
    {
        return [
            'follower_name' => $this->follower->name,
            'follower_id' => $this->follower->id,
            'message' => $this->follower->name . ' is now following you.',
        ];
    }

    // Optional: To send an email as well
    public function toMail($notifiable)
    {
        return (new MailMessage)
                    ->line('You have a new follower: ' . $this->follower->name)
                    ->action('View Profile', url('/profile/' . $this->follower->id))
                    ->line('Thank you for using our application!');
    }
}
