<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Course;
use App\Category;
use App\Company;

class UserGroupsController extends Controller
{
    public function index()
    {
    $user = Auth::user();
        $userGroup = $user->userGroups()->first();
        $company = Company::where('id', $userGroup->company_id)->first();

        $courses = $userGroup->courses()->get();

        //$featured_category1 = Category::find(1);
        //$featured_category2 = Category::find(2);

        //$featured_courses1 = $featured_category1->courses()->inRandomOrder()->take(8)->get();
        //$featured_courses2 = $featured_category2->courses()->inRandomOrder()->take(8)->get();

        //$featured_posts = Course::inRandomOrder()->take(8)->get();

        return view('userGroupHome')
            //->with('categories', Category::whereNull('category_id_parent')->whereNotNull('desktop_index')->orderBy('desktop_index', 'ASC')->get())
            //->with('row_limit', 5)
            //->with('category_count', 0)
            //->with('mobile_categories', Category::whereNull('category_id_parent')->whereNotNull('mobile_index')->orderBy('mobile_index', 'ASC')->get())
            //->with('mobile_col_limit', 5)
            //->with('mobile_category_count', 0)
            //->with('featured_category1', $featured_category1->desc)
            //->with('featured_category2', $featured_category2->desc)
            //->with('featured_courses1', $featured_courses1)
            //->with('featured_courses2', $featured_courses2)
            //->with('featured_posts', $featured_posts)
            ->with('courses', $courses)
            ->with('userGroup', $userGroup)
            ->with('company', $company);
    }
}
