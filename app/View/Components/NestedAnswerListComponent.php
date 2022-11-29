<?php

namespace App\View\Components;

use Illuminate\View\Component;

class NestedAnswerListComponent extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $answers;

    public function __construct($answers)
    {
        //
        $this->answers=$answers;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.nested-answer-list-component');
    }
}
