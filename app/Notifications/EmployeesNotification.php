<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class EmployeesNotification extends Notification
{
    use Queueable;
    private $employee_id;
    private $creator_id;
    private $title;
    private $icon;
    private $bg_color;
    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($employee_id,$creator_id,$title,$icon,$bg_color)
    {
       $this->employee_id = $employee_id;
       $this->creator_id = $creator_id;
       $this->title = $title;
       $this->icon = $icon;
       $this->bg_color = $bg_color;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['database'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    // public function toMail($notifiable)
    // {
    //     return (new MailMessage)
    //                 ->line('The introduction to the notification.')
    //                 ->action('Notification Action', url('/'))
    //                 ->line('Thank you for using our application!');
    // }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            'employee_id' =>  $this->employee_id,
            'creator_id'  =>  $this->creator_id,
            'title'       =>  $this->title,
            'icon'        =>  $this->icon,
            'bg_color'    =>  $this->bg_color,
        ];
    }
}
