<?php

namespace App\Http\Controllers;

use App\Http\Requests\ImageStoreRequest;
use App\Repositories\ImageRepository;
use App\Repositories\UserRepository;
use Illuminate\Http\Request;
use App\Services\ImageService;
class ImageController extends Controller
{

    protected $repository;
    protected $userRepository;
    protected $service;
    public function __construct(ImageRepository $imageRepository,UserRepository $userRepository)
    {
           $this->repository=$imageRepository;
           $this->userRepository=$userRepository;

           $this->service=new ImageService($imageRepository);
           $this->middleware('auth');
    }
    public function index()
    {
        //
    }


    public function create()
    {
        //
    }


    public function store(ImageStoreRequest $request)
    {
               $user=$this->userRepository->getCurrentUser();

               $image=$this->service->store($request);
               if($image){
                   return "ok";
               }
               return "nope";

    }

    public function new(Request $request){
        return view('images.new');
    }


    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }


    public function update(Request $request, $id)
    {
        //
    }


    public function destroy($id)
    {
        //
    }
}
