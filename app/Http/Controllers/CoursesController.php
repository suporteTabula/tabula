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
use App\User;

class CoursesController extends Controller
{
    public function course($id)
    {
        $user = Auth::user();
        $course = Course::find($id);
        $author = User::find($course->user_id_owner);
        $chapter = $course->course_item_groups->all();
        $hasCourse = false;

        if($user && $user->courses()->find($id))
            $hasCourse = true;

        return view('course')
            ->with('course', $course)
            ->with('author', $author)
            ->with('chapters', $chapter)
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

        return view('courseProgress')
            ->with('course', $course)
            ->with('users', $user)
            ->with('specificItem', $item)
            ->with('chapters', $chapter);
            //->with('items', $item);
    }
    public function lesson(Request $request)
    { 
        $item = CourseItem::where('id', $request->item_id)->get();  

        return view('lesson')
            ->with('items', $item)
            ->with('count', 0);
            
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

                $user->items()->attach($id_question_d, ['desc' => $value, 'course_item_status_id' => 1 ]);
            }

            if (strpos($key, 'trueFalse') !== false){
                $id_trueFalse = explode('_', $key)[1];

                $user->items()->attach($id_trueFalse, ['desc' => $value, 'course_item_status_id' => 1 ]);
            }

        }

        return redirect()->back(); 
    }
}
