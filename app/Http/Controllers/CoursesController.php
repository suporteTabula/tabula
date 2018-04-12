<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Course;
use App\CourseItem;
use Illuminate\Support\Facades\DB;
use App\CourseItemOption;
use App\CourseItemGroup;

class CoursesController extends Controller
{
    public function course($id)
    {
        $user = Auth::user();
        $course = Course::find($id);
        $chapter = $course->course_item_groups->all();
        $hasCourse = false;

        if($user && $user->courses()->find($id))
            $hasCourse = true;

        return view('course')
            ->with('course', $course)
            ->with('chapters', $chapter)
            ->with('hasCourse', $hasCourse);
    }

    public function course_start($id)
    {
        $course = Course::find($id);
        $chapter = $course->course_item_groups->all();
        //$item = $chapter->course_items->all();

        return view('courseProgress')
            ->with('course', $course)
            ->with('chapters', $chapter);
            //->with('items', $item);
    }
    public function lesson(Request $request)
    {   
        if ($request->ajax()){
            
            //$item = DB::table('course_items')->where('id', $request->item_id)->get();
            $item = CourseItem::where('id', $request->item_id)->get();            

            return view('lesson')
                ->with('items', $item)
                ->with('count', 0);
        }
        
    }

    public function answers(Request $request, $id)
    {
        //$options = new CourseItemOption();
        //$items = CourseItemOption::where('course_items_id', $id)->get();
        
        $all = $request->all();
        $user = Auth::user();

        foreach ($all as $key => $value) {

            if (strpos($key, 'multiple') !== false) {
                $id_question_m = explode('_', $key)[1];
                
                $affirmatives = CourseItemOption::where('course_items_id', $id_question_m)->get();
               
                foreach ($affirmatives as $afirmative) {

                    $i = 0;
                    foreach ($value as $answer) {

                        if ($afirmative->id == $answer) {
                            $i = 1;
                                 
                        }
                    }
                    $user->itemOptions()->attach($afirmative->id, ['checked' => $i]);
                }         
            }

            if (strpos($key, 'alternativa') !== false) {
                $id_question_a = explode('_', $key)[1];
                
                $altertatives = CourseItemOption::where('course_items_id', $id_question_a)->get();
               
                foreach ($altertatives as $altertative) {

                    $i = 0;
                    foreach ($value as $answer) {

                        if ($altertative->id == $answer) {
                            $i = 1;
                                 
                        }
                    }
                    $user->itemOptions()->attach($altertative->id, ['checked' => $i]);
                }         
            }

            if (strpos($key, 'dissertativa') !== false){
                $id_question_d = explode('_', $key)[1];

                $user->items()->attach($id_question_d, ['desc' => $value]);
            }

            if (strpos($key, 'trueFalse') !== false){
                $id_trueFalse = explode('_', $key)[1];

                $user->items()->attach($id_trueFalse, ['desc' => $value]);
            }

        } 
    }

    public function next(Request $request, $id)
    {

    }
}
