<?php

namespace App\View\Components;

use Illuminate\View\Component;

class QuestionListComponent extends Component
{
    public $questions;

    public function __construct($questions)
    {
        $this->questions=$questions;
        //
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.question-list-component');
    }
}
