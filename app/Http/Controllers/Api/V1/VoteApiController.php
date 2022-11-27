<?php

namespace App\Http\Controllers\Api\V1;

use App\Repositories\VoteRepository;
use App\Services\VoteService;
use App\Vote;
use F9Web\ApiResponseHelpers;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class VoteApiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    use ApiResponseHelpers;

    protected $voteService;
    protected $voteRepository;
    public function __construct(VoteService $service,VoteRepository $repository)
    {
        //
        $this->voteService = $service;
        $this->voteRepository = $repository;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        if($request->vote_type==1){
            $this->voteService->upvote($request->article_id);
        }else{
            $this->voteService->downVote($request->article_id);
        }
        return $this->respondCreated();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Vote  $vote
     * @return \Illuminate\Http\Response
     */
    public function show(Vote $vote)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Vote  $vote
     * @return \Illuminate\Http\Response
     */
    public function edit(Vote $vote)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Vote  $vote
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Vote $vote)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Vote  $vote
     * @return \Illuminate\Http\Response
     */
    public function destroy(Vote $vote)
    {
        //
    }
}
