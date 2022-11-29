<?php

namespace App\View\Components;

use Illuminate\View\Component;

class AnswerItemComponent extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $answer;
    public function __construct($answer)
    {
        //
        $this->answer=$answer;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.answer-item-component');
    }
}
