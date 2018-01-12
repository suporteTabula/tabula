<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
Use App\Post;
Use App\User;
Use App\Course;
Use App\Category;

class FrontController extends Controller
{
    public function index()
    {
        return view('welcome')
            ->with('categories', Category::orderBy('desc', 'ASC')->get());
    }

    public function category($id)
    {
        $category = Category::find($id);

        return view('category')
            ->with('category', $category)
            ->with('courses', $category->courses->all());
    }

    public function course($id)
    {
        $course = Course::find($id);

        return view('course')
            ->with('course', $course)
            ->with('chapters', $course->course_item_groups->all());
    }

    public function search()
    {   
        return view('search')
            ->with('categories', Category::orderBy('desc', 'ASC')->get());
    }

    public function searchCat(Request $request)
    {
        if ($request->ajax()){
            if(isset($request->checked_group_output))
            {
                $categories = Category::all()->whereIN('id', explode(',', $request->checked_group_output));
                $courses_group = array();

                foreach($categories as $category)
                {
                    $category_courses = $category->courses->all();

                    foreach($category_courses as $category_course){
                        array_push($courses_group, $category_course);
                    }
                }    

                return view('searchResults')
                    ->with('courses', $courses_group);
            }
        }
    }
}
