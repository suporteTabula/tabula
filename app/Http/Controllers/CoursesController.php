<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Course;
use App\CourseItem;

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

    public function lesson($id)
    {
        $lesson = CourseItem::find($id);

        return view('lesson')
            ->with('lesson', $lesson);
    }
}
