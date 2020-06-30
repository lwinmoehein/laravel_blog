<?php

namespace App\View\Components;

use Illuminate\View\Component;

class NestedReplyListComponent extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $replies;
    public function __construct($replies)
    {
        //
        $this->replies=$replies;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.nested-reply-list-component');
    }
}
