<?php

namespace App\Http\Controllers;

use App\Http\Requests\ImageStoreRequest;
use App\Repositories\ImageRepository;
use App\Repositories\UserRepository;
use Illuminate\Http\Request;
use App\Services\ImageService;
class ImageController extends Controller
{

    protected $service;
    public function __construct()
    {
           $this->service=new ImageService();
           $this->middleware('auth');
    }

    public function store(ImageStoreRequest $request)
    {
               $image=$request->file('image')->store('public/images');
               if($image){
                   return $image;
               }
               return 'error';


    }
    public function new(){
        return view('images.new');
    }


}
