<?php
namespace App\Services;
use App\Question;
use App\Repositories\QuestionRepository;
use App\Http\Requests\QuestionStoreRequest;

class QuestionService
{

    protected $questionRepository;


    public function __construct(
        QuestionRepository    $questionRepository
    )
    {
        $this->questionRepository=$questionRepository;
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
            $question->slug = Str::slug($request->title);
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
