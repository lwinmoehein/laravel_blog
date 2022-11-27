<?php

namespace App\View\Components;

use Illuminate\View\Component;

class NotificationComponent extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public  $notification;

    public function __construct($notification)
    {
        //
        $this->notification = $notification;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.notification-component');
    }
    public function getIconClass()
    {
        switch ($this->notification->data['type']){
            case "App\Badge":
                return "fa-certificate";
                break;
            default:
                return "fa-trophy";
        }
    }
}
