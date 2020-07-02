<?php
namespace App\Services;
use App\Image;
use App\Repositories\ImageRepository;
use App\Http\Requests\ArticleStoreRequest;
use App\Http\Requests\ImageStoreRequest;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
class ImageService
{
    protected $repository;

    public function __construct()
    {
    }

    public  function delete($id){
        return Image::destroy($id);
    }



}
