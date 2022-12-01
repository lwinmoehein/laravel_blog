<?php
namespace App\Services;
use App\Achievement;
use App\Events\Illuminate\Auth\Events\BadgeReceived;
use App\Question;
use App\Notifications\GotNewAchievement;
use App\Repositories\AchievementRepository;
use App\Repositories\QuestionRepository;
use App\Http\Requests\QuestionStoreRequest;
use App\Image;
use App\Traits\SlugTrait;
use Illuminate\Support\Facades\DB;

class QuestionService
{
    use SlugTrait;

    protected $questionRepository;
    protected $achievementRepository;
    protected $achievementService;


    public function __construct(
        QuestionRepository    $questionRepository,
        AchievementRepository $achievementRepository,
        AchievementService    $achievementService
    )
    {
        $this->questionRepository=$questionRepository;
        $this->achievementRepository = $achievementRepository;
        $this->achievementService  = $achievementService;
    }

    public  function delete($id){
        $question = Question::findOrFail($id);

        if(!auth()->user()->can('modify',$question)){
            return  false;
        }
        Question::destroy($id);

        return  true;
    }

    public function store(QuestionStoreRequest $request){

        try{
            if(!auth()->user()->can('store',Question::class)){
                return  false;
            }

            $isNotFirstTime  = auth()->user()->questions()->exists();
            $newStudentAchievement = $this->achievementRepository->getByNameOrNull("မေးသူ");

            if(!$isNotFirstTime && $newStudentAchievement!=null && !$this->achievementRepository->isExist(auth()->user()->id,$newStudentAchievement->id)){
                $this->achievementService->storeUserAchievement(auth()->user(),$newStudentAchievement);
                auth()->user()->notify(new GotNewAchievement($newStudentAchievement, auth()->user()));
                event(new BadgeReceived($newStudentAchievement));
            }
            $question= new Question($request->validated());
            $question->slug = $this->getSlugFromString($request->title);
            $question->fill(['user_id'=>auth()->id()])->save();
            $question->tags()->attach($request['tags']);
            $question->images()->save(new Image(['url'=>$request->image_url]));
            return true;
        }catch (\Exception $exception){
            return false;
        }
    }

    public function update(QuestionStoreRequest $request, $id){

        $question = Question::findOrFail($id);

        if(!auth()->user()->can('modify',$question)){
            return  false;
        }

         $question->update($request->only(['title','body']));
         $question->tags()->sync($request['tags']);

         return  true;

    }

}
