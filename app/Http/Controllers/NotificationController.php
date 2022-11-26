<?php

namespace App\Http\Controllers;

use App\Repositories\NotificationRepository;
use Illuminate\Http\Request;

class NotificationController extends Controller
{
    //
    protected  $repository;

    public function __construct(NotificationRepository $repository){
        $this->repository = $repository;
    }

    public function index(){
        $notifications = $this->repository->paginate();

        return view('notifications.index',compact(['notifications']));
    }

}
