<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class GotNewBadge extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    protected  $badge,$user;

    public function __construct($badge,$user)
    {
        //
        $this->badge = $badge;
        $this->user  = $user;
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
                    ->line($this->badge->name.' ဆိုတဲ့ Badge အသစ်ကို ရသွားပါပြီ။')
                    ->line('ယခုအချိန်ကစပြီး '.$this->badge->description)
                    ->action('Vote တွေစပေးမယ်', url(route('articles.index')))
            ;
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
            'id'=>$this->badge->id,
            'type'=>get_class($this->badge),
            'title'=>$this->badge->name.' ဆိုတဲ့ Badge အသစ်ကို ရသွားပါပြီ။',
            'description'=>'ယခုအချိန်ကစပြီး '.$this->badge->description
        ];
    }
}
