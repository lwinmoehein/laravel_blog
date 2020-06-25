<?php

namespace App\Repositories;

use App\Tag;

class TagRepository
{
    public function all()
    {
        return Tag::all();
    }

    public function getTag($tag_id)
    {
        return Tag::find($tag_id);
    }
}
