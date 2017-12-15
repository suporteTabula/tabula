<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
Use App\Post;
Use App\User;
Use App\Category;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin/home')
            ->with('categories', Category::all());
    }

    public function category($id)
    {
        $category = Category::find($id);

        return view('category')
            ->with('category', $category);
    }
}
