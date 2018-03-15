<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Course;
use App\CourseItem;

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

    public function lesson($id)
    {
        $lesson = CourseItem::find($id);

        return view('lesson')
            ->with('lesson', $lesson);
    }
}
