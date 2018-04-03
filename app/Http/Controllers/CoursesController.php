<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Course;
use App\CourseItem;
use Illuminate\Support\Facades\DB;
use App\CourseItemOption;
use App\CourseItemGroup;

class CoursesController extends Controller
{
    public function course($id)
    {
        $course = Course::find($id);
        $chapter = $course->course_item_groups->all();

        return view('course')
            ->with('course', $course)
            ->with('chapters', $chapter);
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
        
        $questoes = $request->all();

        foreach ($questoes as $key => $value) {
            if (strpos($key, 'multiple') !== false) {
                $respostas_multipla[] = explode('_', $key)[1];
                //INSTANCIA DE OPTION
                //$option->option_user()->attach($id_novo, ['desc' => $value]);
           }
        }
        dd($respostas_multipla);
        
    }

    public function next(Request $request, $id)
    {

    }
}
