<?php
namespace App\Services;
use App\Achievement;
use App\Article;
use App\Notifications\GotNewAchievement;
use App\Repositories\AchievementRepository;
use App\Repositories\ArticleRepository;
use App\Http\Requests\ArticleStoreRequest;
use App\Image;
use Illuminate\Support\Facades\DB;

class ArticleService
{
    protected $articleRepository;
    protected $achievementRepository;
    protected $achievementService;

    public function __construct(
        ArticleRepository $articleRepository,
        AchievementRepository $achievementRepository,
        AchievementService $achievementService
    )
    {
        $this->articleRepository=$articleRepository;
        $this->achievementRepository = $achievementRepository;
        $this->achievementService  = $achievementService;
    }

    public  function delete($id){
        $article = Article::findOrFail($id);

        if(!auth()->user()->can('modify',$article)){
            return  false;
        }
        Article::destroy($id);

        return  true;
    }

    public function store(ArticleStoreRequest $request){

        if(!auth()->user()->can('store',Article::class)){
            return  false;
        }

        $isNotFirstTime  = auth()->user()->articles()->exists();
        $newStudentAchievement = $this->achievementRepository->getByNameOrNull("မေးသူ");

        if(!$isNotFirstTime && !$this->achievementRepository->isExist(auth()->user()->id,$newStudentAchievement->id)){
            $this->achievementService->storeUserAchievement(auth()->user(),$newStudentAchievement);
            auth()->user()->notify(new GotNewAchievement($newStudentAchievement, auth()->user()));
        }

        $article= new Article($request->validated());
        $article->fill(['user_id'=>auth()->id()])->save();
        $article->tags()->attach($request['tags']);
        $article->images()->save(new Image(['url'=>$request->image_url]));

        return true;
    }

    public function update(ArticleStoreRequest $request,$id){

        $article = Article::findOrFail($id);

        if(!auth()->user()->can('modify',$article)){
            return  false;
        }

         $article->update($request->only(['title','body']));
         $article->tags()->sync($request['tags']);

         return  true;

    }

}
