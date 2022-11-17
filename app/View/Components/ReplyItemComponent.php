<?php

namespace App\View\Components;

use Illuminate\View\Component;

class ReplyItemComponent extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $reply;
    public function __construct($reply)
    {
        //
        $this->reply=$reply;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.reply-item-component');
    }
}
