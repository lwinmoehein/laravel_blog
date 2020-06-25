<?php
namespace App\Services;
use App\Tag;
use App\Repositories\TagRepository;

class tagService
{
    protected $repository;

    public function __construct(TagRepository $repository)
    {
        $this->repository=$repository;
    }
    public  function getAll(){
        return $this->repository->all();
    }

    public function get($id){
        return $this->repository->getTag($id);
    }

    public  function delete($id){
        return Tag::destroy($id);
    }

    public function store($tag){
        return $tag->save();
    }

    public function update($tag){
        Tag::where('id',$tag->id)->update($tag);
    }




}
