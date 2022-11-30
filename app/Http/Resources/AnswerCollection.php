<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

class AnswerCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public $collects = 'App\Http\Resources\AnswerResource';

    public function toArray($request)
    {
        return [
                "total"=>$this->resource->total(),
                "per_page"=>$this->resource->perPage(),
                "current_page"=>$this->resource->currentPage(),
                "last_page"=>$this->resource->lastPage(),
                "data"=>$this->collection,
        ];
    }
}
