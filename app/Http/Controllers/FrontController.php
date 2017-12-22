<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
Use App\Post;
Use App\User;
Use App\Category;

class FrontController extends Controller
{
    public function index()
    {
        return view('welcome')
            ->with('categories', Category::all());
    }

    public function category($id)
    {
        $category = Category::find($id);

        return view('category')
            ->with('category', $category);
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
                        
            dd($catgroup);
        }
        else 
        {
            echo $catgroup = "Selecione um macrotema para pesquisar.";
        }
    }
}
