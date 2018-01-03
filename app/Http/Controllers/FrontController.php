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
            ->with('course', $course);
    }

    public function search()
    {   
        return view('search')
            ->with('categories', Category::orderBy('desc', 'ASC')->get())  
            ->with('catgroup', "Selecione um macrotema para pesquisar.");
    }

    public function searchCat(Request $request)
    {
        if(isset($request->checked_categories_output)) 
        {
            $catgroup = Category::all()->whereIN('id', explode(',', $request->checked_categories_output));
            
            foreach($catgroup as $catgroup)
            {
                $catcourses = $catgroup->courses->all();
                foreach($catcourses as $catcourse)
                {
                    echo 
                        '<a href="'.route('course.single', ['id' => $catcourse->id]).'">
                            <div style="height:100%;width:100%">'
                                .$catcourse->name.
                            '</div>
                        </a>';
                    echo '<br />';
                }
            }            
        }
        else 
        {
            echo $catgroup = "Selecione um macrotema para pesquisar.";
        }
    }
}
