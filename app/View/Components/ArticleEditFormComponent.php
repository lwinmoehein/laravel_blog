<?php

namespace App\View\Components;

use Illuminate\View\Component;

class ArticleEditFormComponent extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $article=null;
    public $tags;
    public function __construct($article,$tags)
    {
        //
        $this->article=$article;
        $this->tags=$tags;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.article-edit-form-component');
    }
}
