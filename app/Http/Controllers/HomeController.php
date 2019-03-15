<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Course;
use App\Category;
use App\Usertype;
use Auth;

class HomeController extends Controller
{
 public function index()
 {
   $session = session()->pull('course_id');
   if ($session != null) {
      return redirect()->route('cart.insert', ['id' => $session]);   
   }

   $featured_category1 = Category::find(1);              
   $featured_category2 = Category::find(2);
   $auth = Auth::user();
   $userType = Usertype::all();

   $featured_courses1 = $featured_category1->courses()->where('featured', 1)->inRandomOrder()->take(8)->get();
   $featured_courses2 = $featured_category2->courses()->where('featured', 1)->inRandomOrder()->take(8)->get();

   $featured_posts = Course::inRandomOrder()->take(8)->get();       return view('home')
   ->with('categories', Category::whereNull('category_id_parent')->whereNotNull('desktop_index')->orderBy('desktop_index', 'ASC')->get())
   ->with('row_limit', 5)
   ->with('category_count', 0)
   ->with('mobile_categories', Category::whereNull('category_id_parent')->whereNotNull('mobile_index')
   ->orderBy('mobile_index', 'ASC')->get())
   ->with('mobile_col_limit', 5)
   ->with('mobile_category_count', 0)
   ->with('auth', $auth)
   ->with('userType', $userType)
   ->with('featured_category1', $featured_category1->desc)
   ->with('featured_category2', $featured_category2->desc)
   ->with('featured_courses1', $featured_courses1)
   ->with('featured_courses2', $featured_courses2)
   ->with('featured_posts', $featured_posts);

}
}