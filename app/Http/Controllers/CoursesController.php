<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Course;
use App\CourseItem;
use Illuminate\Support\Facades\DB;

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
    public function progress(Request $request)
    {   
        if ($request->ajax()){
            
            //$item = DB::table('course_items')->where('id', $request->item_id)->get();
            $item = CourseItem::where('id', $request->item_id)->get();            

            return view('lesson')
                ->with('items', $item);
        }
        
    }
}
