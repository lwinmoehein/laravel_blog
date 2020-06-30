<?php

namespace App\Repositories;

use App\Image;
use JasonGuru\LaravelMakeRepository\Repository\BaseRepository;

class ImageRepository
{

    //get all images
    public function all() {
        return Image::all();
    }

    //get image by image id
    public function get($id){
        return Image::find($id);
    }
}
