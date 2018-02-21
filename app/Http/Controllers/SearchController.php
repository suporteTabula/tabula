<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Course;
use App\Category;

class SearchController extends Controller
{
    public function search($id)
    {    
        if($id == -1)
        {

            $search_string = Input::get('search_string');

            if($search_string != "")
                $courses = Course::where('name','like', '%' . $search_string . '%')->get();
            else
                $courses = Course::all();

            return view('search')
                ->with('categories', Category::orderBy('desc', 'ASC')->get())
                ->with('courses', $courses)
                ->with('search_string', $search_string);
        }
        else
        {   
            $category = Category::find($id);

            return view('search')
                ->with('categories', Category::orderBy('desc', 'ASC')->get())
                ->with('courses', $category->courses->all())
                ->with('checked_category', $category)
                ->with('search_string', '');
        }
    }

    public function searchCat(Request $request)
    {
        if ($request->ajax()){

            $courses_group = array();
            $courses_check = array();
            $courses_string = array();

            if($request->any_check == "true" && $request->any_string == "true")
            {
                $categories = Category::all()->whereIN('id', explode(',', $request->checked_group_output));
                
                foreach($categories as $category)
                {
                    $category_courses = $category->courses->all();

                    foreach($category_courses as $category_course)
                        array_push($courses_check, $category_course);
                }

                foreach($courses_check as $course)
                    if(strpos(strtolower($course->name), strtolower($request->course_title_output)) !== false)
                        array_push($courses_group, $course);

                return view('searchResults')
                    ->with('courses', $courses_group);
            }
            else if($request->any_check == "true" && $request->any_string == "false")
            {
                $categories = Category::all()->whereIN('id', explode(',', $request->checked_group_output));
                
                foreach($categories as $category)
                {
                    $category_courses = $category->courses->all();

                    foreach($category_courses as $category_course)
                        array_push($courses_check, $category_course);
                }
                
                return view('searchResults')
                    ->with('courses', $courses_check);
            }
            else if($request->any_check == "false" && $request->any_string == "true")
            {
                $courses_collection = Course::where('name','like', '%' . $request->course_title_output . '%')->get();

                foreach($courses_collection as $courses)
                    array_push($courses_string, $courses);

                return view('searchResults')
                    ->with('courses', $courses_string);
            }  
            else
            {
                $courses = Course::all();
                return view('searchResults')
                    ->with('courses', $courses);
            }
        }
    }
}
