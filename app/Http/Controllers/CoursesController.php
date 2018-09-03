<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Course;
use App\CourseItem;
use Illuminate\Support\Facades\DB;
use App\CourseItemOption;
use App\CourseItemGroup;
use App\CourseItemStatus;
use App\CustomClasses\vimeo_tools;
use App\User;
use Log;

class CoursesController extends Controller
{
    public function course($id)
    {
        $user = Auth::user();
        $course = Course::find($id);
        $author = User::find($course->user_id_owner);
        $chapter = $course->course_item_groups->all();
        $hasCourse = false;
        $userHasItem = false;
        //query SELECT ci.id as ItemId, 
        //              ci.name as ItemName, chapter.id as CapituloId, 
        //               (SELECT created_at as CriadoEm from course_item_user 
        //                WHERE ci.id = course_item_user.course_item_id ) as CriadoEm 
        //                FROM course_items AS ci
        //                JOIN course_item_groups AS chapter ON ci.course_item_group_id = chapter.id
        //                WHERE exists (SELECT ciu.created_at FROM course_item_user AS ciu 
        //                WHERE ciu.user_id = :userid AND ciu.course_item_id = ci.id)
        //                AND chapter.course_id = :courseid ORDER BY ItemID DESC
        
        if ($user) {
            $userHasItem =  DB::select( DB::raw("SELECT ci.id as ItemId, 
                        ci.name as ItemName, chapter.id as CapituloId
                        FROM course_items AS ci JOIN course_item_groups AS chapter 
                        ON ci.course_item_group_id = chapter.id WHERE ci.id NOT IN 
                        ( SELECT course_item_id FROM course_item_user AS ciu WHERE ciu.user_id = :userid)
                        AND chapter.course_id = :courseid ORDER BY ItemId ASC"), array (
                                    'userid' => $user->id, 
                                    'courseid' => $course->id,
                                    ));
        }
       
        if($user && $user->courses()->find($id))
            $hasCourse = true;

        return view('course')
            ->with('course', $course)
            ->with('author', $author)
            ->with('chapters', $chapter)
            ->with('userItem', $userHasItem)
            ->with('hasCourse', $hasCourse);
    }

    public function course_start(Request $request, $id)
    {        
        $course = Course::find($id);
        $chapter = $course->course_item_groups->all();
        $user = Auth::user();
        $item = $request->item_id; // Id específico do item ao finalizar aula

        if ($item && !$user->items()->find($item)) {
            $user->items()->attach($request->item_id, ['course_item_status_id' => 1 ]);
        }
        foreach ($chapter as $chap) {
            $count[$chap->id] = count($chap->course_items);
            
        }
        $done = $user->items()->wherePivot('course_item_status_id','1')->get();
        
        //dd($done->all());
        return view('courseProgress')
            ->with('users', $user)
            ->with('chapters', $chapter);
            //->with('items', $items);
    }

    public function course_progress($id)
    {
        $item = CourseItem::find($id);
        $items = CourseItem::where('id', $id)->get(); 

        $items = vimeo_tools::parse_for_urls($items);        

        $user = Auth::user();
        $id_course = $item->course_item_group->course_id;
        $chapter = CourseItemGroup::where('course_id', $id_course)->get();

        

        return view('courseProgress')
            ->with('users', $user)
            ->with('chapters', $chapter)
            ->with('items', $items);

    }

    public function lesson(Request $request)
    { 
        $item = CourseItem::where('id', $request->item_id)->get();  
        
        $item = vimeo_tools::parse_for_urls($item); 

        return view('lesson')
            ->with('items', $item);
            
        //$item = DB::table('course_items')->where('id', $request->item_id)->get();
        
    }
    public function answers(Request $request, $id)
    {
        //$options = new CourseItemOption();
        //$items = CourseItemOption::where('course_items_id', $id)->get();
        $all = $request->all();
        $user = Auth::user();
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
}
