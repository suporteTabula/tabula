<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Course;

class CategoriesController extends Controller
{
    public function category($urn)
    {
        $all_categories = [];
        $category = Category::where('urn', $urn)->first();
    	$parent_categories = Category::where('category_id_parent', $category->id)->pluck('id')->toArray();

        array_push($all_categories, $category->id);
        $all_categories = array_merge($all_categories, $parent_categories);

        $courses = Course::whereIn('category_id', $all_categories)->get();

        return view('category')
            ->with('category_desc', $category->desc)
            ->with('category_count', 0)
            ->with('categories', Category::orderBy('desc', 'ASC')->get())
            // busca todas os cursos da categoria selecionada
            ->with('courses', $courses)
            // campos para serem checados na search.blade
            ->with('checked_category', $category)
            // variável para ser escrita no campo de busca na search.blade
            ->with('search_string', '');
    }
}
