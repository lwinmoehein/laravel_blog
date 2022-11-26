<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class GotNewAchievement extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    protected  $achievement;
    protected  $user;

    public function __construct($achievement,$user)
    {
        //
        $this->achievement = $achievement;
        $this->user = $user;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */


    public function via($notifiable)
    {
        return ['mail','database'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->line('၀မ်းသာပါတယ် '.$this->user->name.' ရေ')
            ->line($this->achievement->name.' ဆိုတဲ့ Achievement အသစ်ကို ရသွားပါပြီ။')
            ->line('ယခုအချိန်ကစပြီး '.$this->achievement->description);
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
            "id"=>$this->achievement->id,
            "title"=>$this->achievement->name.' ဆိုတဲ့ Achievement အသစ်ကို ရသွားပါပြီ။',
            "description"=>'ယခုအချိန်ကစပြီး '.$this->achievement->description
        ];
    }
}
