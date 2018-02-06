<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
Use Auth;
Use Session;
use Illuminate\Support\Facades\Input;
Use App\Post;
Use App\User;
Use App\Course;
Use App\Category;
Use App\MobileCategory;
Use App\UserType;
Use App\State;
Use App\Country;
Use App\Schooling;
use App\CourseItemGroup;

class FrontController extends Controller
{
    public function index()
    {
        $featured_category1 = Category::find(1);
        $featured_category2 = Category::find(2);

        $featured_courses1 = $featured_category1->courses()->inRandomOrder()->take(8)->get();
        $featured_courses2 = $featured_category2->courses()->inRandomOrder()->take(8)->get();

        $featured_posts = Course::inRandomOrder()->take(8)->get();

        return view('welcome')
            ->with('categories', Category::all())
            ->with('row_limit', 5)
            ->with('category_count', 0)
            ->with('mobile_categories', MobileCategory::all())
            ->with('mobile_col_limit', 5)
            ->with('mobile_category_count', 0)
            ->with('featured_category1', $featured_category1->desc)
            ->with('featured_category2', $featured_category2->desc)
            ->with('featured_courses1', $featured_courses1)
            ->with('featured_courses2', $featured_courses2)
            ->with('featured_posts', $featured_posts);
    }

    public function course($id)
    {
        $course = Course::find($id);

        return view('course')
            ->with('course', $course)
            ->with('chapters', $course->course_item_groups->all());
    }

    public function chapter($id)
    {
        $chapter = CourseItemGroup::find($id);

        return view('chapter')
            ->with('chapter', $chapter)
            ->with('items', $chapter->course_items->all()); 
    }

    public function userPanel() // criar outras funções para update de usuario no banco
    {
        return view('userPanel')
            ->with('user', Auth::user());
    }

    public function userProfile() // criar outras funções para update de usuario no banco
    {
        return view('userProfile')
            ->with('user', Auth::user())
            ->with('states', State::all())
            ->with('countries', Country::all())
            ->with('schoolings', Schooling::all());;
    }

    public function userProfileUpdate(Request $request)
    {
        $user = Auth::user();

        $this->validate($request, [
            'login'         => 'required',
            'first_name'    => 'required',
            'last_name'     => 'required',
            'sex'           => 'required',
            'nickname'      => 'required',
            'email'         => 'required|email',
        ]);

        $user->login        = $request->login;
        $user->email        = $request->email;
        $user->first_name   = $request->first_name;
        $user->last_name    = $request->last_name;
        $user->nickname     = $request->nickname;
        $user->birthdate    = $request->birthdate;
        $user->sex          = $request->sex;
        $user->occupation   = $request->occupation;
        $user->bio          = $request->bio;
        $user->website      = $request->website;
        $user->google_plus  = $request->google_plus;
        $user->twitter      = $request->twitter;
        $user->facebook     = $request->facebook;
        $user->youtube      = $request->youtube;
        $user->country_id   = $request->country_id;
        $user->state_id     = $request->state_id;
        $user->schooling_id = $request->schooling_id;
        
        $user->save();

        Session::flash('success', 'Usuário alterado com sucesso');
        return redirect()->back();
    }

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
