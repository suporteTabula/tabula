<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\CustomClasses\vimeo_tools;
use Illuminate\Support\Facades\Route;
use App\Course;
use App\User;
use App\Star;
use App\Comment;
use App\CourseUser;
use App\CourseItem;
use App\CourseItemUser;
use App\CourseItemGroup;
use App\CourseItemOption;
use App\CourseItemStatus;
use Log;
use Auth;
use Session;

class CoursesController extends Controller
{
    public function course($urn)
    {
        $auth           = Auth::user();
        $course         = Course::where('urn', $urn)->first();
        $author         = User::find($course->user_id_owner);
        $chapter        = $course->course_item_groups->all();
        $hasCourse      = false;
        $userHasItem    = false;
        $votes          = Star::where('id_course', $course->id)->count();
        $point          = Star::where('id_course', $course->id)->sum('point');

        $courses        = Course::where('category_id', $course->category_id)
                            ->where('id', '<>', $course->id)->inRandomOrder()->take(8)->get();
        foreach ($course->comments as $comment) {
            $comment->user = User::where('id', $comment->user_id)->first();
        }


        $progress       = 0;
        if($votes==0){
            $point      = 0;
        }else{
            $point      = round($point/$votes, 1);
        }
        $rating['id']   = $course->id;
        $rating['star'] = $point;
      
        if($auth){

            foreach ($chapter as $chapters) {
                $itemChapter = CourseItem::where('course_item_group_id', $chapters->id)->pluck('id')->toArray();
                $chapters->progressDo = CourseItemUser::wherein('course_item_id', $itemChapter)
                ->where('course_item_status_id', 1)
                ->count();
                $progress+= $chapters->progressDo;
            }
        }
       $route = Route::getFacadeRoot()->current()->uri();
       // return dd($route);
        if($auth && $auth->courses()->find($course->id))
            $hasCourse      = true;
        if ($chapter) {
            $firstChapter   = $course->course_item_groups->first();
            $freeClass      = CourseItem::where('course_item_group_id', $firstChapter->id)->first();
            return view('course')
            ->with('course', $course)
            ->with('author', $author)
            ->with('chapters', $chapter)
            ->with('userItem', $userHasItem)
            ->with('auth', $auth)
            ->with('rating', $rating)
            ->with('route', $route)
            ->with('progress', $progress)
            ->with('freeClass', $freeClass)
            ->with('hasCourse', $hasCourse);
        }
        return view('course')
        ->with('course', $course)
        ->with('courses', $courses)
        ->with('author', $author)
        ->with('chapters', $chapter)
        ->with('userItem', $userHasItem)
        ->with('auth', $auth)
        ->with('route', $route)
        ->with('rating', $rating)
        ->with('progress', $progress)
        ->with('hasCourse', $hasCourse);
    }

        public function check_chapter_progress($id)
        {
        $complete       = true; //Assume the chapter is complete and then falsify it.

        $item           = CourseItem::find($id);
        $items          = CourseItem::where('id', $id)->get();
        $user           = Auth::user();
        $id_course      = $item->course_item_group->course_id;
        $chapter_items  = CourseItem::where('course_item_group_id',$item->course_item_group_id)->get();
        


        foreach($chapter_items as $chapterItem)
        {            
            $item_status = CourseItemUser::where('course_item_id',$chapterItem->id)->where('user_id',$user->id)->where('course_item_status_id',0)->get();            
            if(count($item_status) > 0)
            {
                //This means there is at least one chapter item with a status of 0
                $complete = false;
            }            
        }                
        
        if($complete){
            return $item->course_item_group_id.'-true';
        }
        else
        {
            return $item->course_item_group_id.'-false';
        }        
    }


    public function course_item_toggle(Request $request,$id)
    {
        $course         = Course::find($id);
        $chapter        = $course->course_item_groups->all();
        $auth           = Auth::user();
        $item           = $request->item_id; // Id específico do item ao finalizar aula
        $readonly       = $request->readonly;
        $totalProgress  = 0;
        $totalClass     = 0;

        $courseItem     = CourseItemUser::where('course_item_id',$item)->where('user_id',$auth->id)->get();
        $courseCount    = CourseItemUser::where('course_item_id',$item)->where('user_id',$auth->id)->count();
        if($readonly == 'false'){
            Log::Debug('Not Readonly');
            if(!count($courseItem) == 0)
            {         
                $realItem = CourseItemUser::find($courseItem->first()->id);            
                if($realItem->course_item_status_id == 1)
                {
                    $realItem->course_item_status_id = 0;
                }
                else
                {
                    $realItem->course_item_status_id = 1;
                }            
                $realItem->save();
            }
            else{
                //A user has attempted to mark as done an item they don't yet have
                $realItem = new CourseItemUser;
                $realItem->user_id = $auth->id;
                $realItem->course_item_id = $item;
                $realItem->course_item_status_id = 1;
                $realItem->save();
            }
        }
        foreach ($chapter as $chapters) {
            $total  = CourseItem::where('course_item_group_id', $chapters->id)->count();
            $totalClass  = $totalClass + $total;

            $itemChapter            = CourseItem::where('course_item_group_id', $chapters->id)->pluck('id')->toArray();
            $chapters->progressDo   = CourseItemUser::wherein('course_item_id', $itemChapter)
            ->where('course_item_status_id', 1)
            ->count();
            $totalProgress          = $totalProgress + $chapters->progressDo;
        }
        CourseUser::where('course_id', $course->id)->where('user_id', $auth->id)->update([
            'progress' =>   $totalProgress
        ]);
        // $chapter['total']           = $total;
        // $chapter['totalProgress']   = $totalProgress;
        return json_encode($chapter);
    }

    

    public function course_start(Request $request, $urn)
    {        
        $auth       = Auth::user();
        $course     = Course::where('urn', $urn)->first();
        $chapter    = $course->course_item_groups->all();
        $total      = 0;
        foreach ($chapter as $chapters) {
            $itemChapter            = CourseItem::where('course_item_group_id', $chapters->id)->pluck('id')->toArray();
            $chapters->progressDo   = CourseItemUser::wherein('course_item_id', $itemChapter)
                                        ->where('course_item_status_id', 1)
                                        ->count();
            $item                   = CourseItem::where('course_item_group_id', $chapters->id)->count();
            $total                  = $total + $item;
        }
        
        if ($total > 0) {
        $items  = CourseItem::where('course_item_group_id', $chapter[0]->id)->get();


        $items  = vimeo_tools::parse_for_urls($items); 
        $item   = $request->item_id; // Id específico do item ao finalizar aula


        if ($item && !$auth->items()->find($item)) {
            $auth->items()->attach($request->item_id, ['course_item_status_id' => 1 ]);
        }
        foreach ($chapter as $chap) {
            $count[$chap->id] = count($chap->course_items);

            
        }
        $done   = $auth->items()->wherePivot('course_item_status_id','1')->get();
        
        Log::Debug($course);
        return view('courseProgress')
        ->with('auth', $auth)
        ->with('course',$course)
        ->with('chapters', $chapter)
        ->with('items', $items);
        }else{
            Session::flash('success', 'Este curso não possui nenhum capitulo');
            return redirect()->back();
        }

    }

    public function lesson(Request $request)
    { 
        $item = CourseItem::where('id', $request->item_id)->get();
        
        
        $item = vimeo_tools::parse_for_urls($item); 


        return view('lesson')
        ->with('items', $item);

    }
    public function answers(Request $request, $id)
    {
        //$options = new CourseItemOption();
        //$items = CourseItemOption::where('course_items_id', $id)->get();
        $all    = $request->all();
        $user   = Auth::user();
        $user->items()->attach($id, ['course_item_status_id' => 1 ]);

        foreach ($all as $key => $value) {
            //verifica se a chave($key) é de multipla escolha(multiple)
            if (strpos($key, 'multiple') !== false) {

                //separa a string e pega a posicao 1, que será o id da questão
                $id_question_m = explode('_', $key)[1];

                //pega todas alternativas(escolhas) relacionadas ao id da questão $id_question_m
                $affirmatives = CourseItemOption::where('course_items_id', $id_question_m)->get();

                foreach ($affirmatives as $afirmative) {

                    $i = 0;
                    foreach ($value as $answer) {

                        if ($afirmative->id == $answer) {
                            $i = 1;
                        }
                    }
                    //Atrela um usuario a uma resposta com attach pegando id da alternativa e colocando um campo adicional para a resposta(checked) 
                    $user->itemOptions()->attach($afirmative->id, ['checked' => $i]);
                }         
            }
            //verifica se a chave($key) é de alternativa
            if (strpos($key, 'alternativa') !== false) {

                //separa a string e pega a posicao 1, que será o id da questão
                $id_question_a = explode('_', $key)[1];
                
                //pega todas alternativas relacionadas ao id da questão $id_question_a
                $altertatives = CourseItemOption::where('course_items_id', $id_question_a)->get();

                foreach ($altertatives as $altertative) {

                    $i = 0;
                    foreach ($value as $answer) {

                        if ($altertative->id == $answer) {
                            $i = 1;

                        }
                    }
                    //Atrela um usuario a uma resposta com attach pegando id da alternativa e colocando um campo adicional para a resposta(checked) 
                    $user->itemOptions()->attach($altertative->id, ['checked' => $i]);
                }         
            }
            //verifica se a chave($key) é de dissertativa
            if (strpos($key, 'dissertativa') !== false){

                //separa a string e pega a posicao 1, que será o id da questão
                $id_question_d = explode('_', $key)[1];

                //Atrela um usuario a uma resposta com attach pegando id da questao e colocando um campo adicional para a resposta(desc)
                $user->items()->attach($id_question_d, ['desc' => $value, 'course_item_status_id' => 1 ]);
            }
            //verifica se a chave($key) é de verdadeira/falso
            if (strpos($key, 'trueFalse') !== false){

                //separa a string e pega a posicao 1, que será o id da questão
                $id_trueFalse = explode('_', $key)[1];

                //Atrela um usuario a uma resposta com attach pegando id da questao e colocando um campo adicional para a resposta(desc)
                $user->items()->attach($id_trueFalse, ['desc' => $value, 'course_item_status_id' => 1 ]);
            }   
        }
        return redirect()->back(); 
    }

    public function comment(Request $request)
    {
        $auth = Auth::user();
        Comment::create([
            'user_id'       => $auth->id,
            'course_id'     => $request->idCourse,
            'comment'       => $request->comments,
            'type_comment'  => $request->typeComment,
        ]);

        Session::flash('success', 'Comentário adicionado');
        return redirect()->back();
    }

   
}
