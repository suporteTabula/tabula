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
        // $id = -1 é setado na ACTION do forumlário de busca do layout: 'user.blade.php'
        // se $id = 1 ou mais, será considerado macrotema, então o macrotema será checkado automaticamente na view de busca
        if($id == -1)
        {

            $search_string = Input::get('search_string');

            // se houver string, busca a string e manda a $search_string para ser escrita automaticamente no campo
            // se não houver, busca todos os cursos
            if($search_string != "")
                $courses = Course::where('name','like', '%' . $search_string . '%')->get();
            else
                $courses = Course::all();

            return view('search')
                ->with('category_count', 0)
                ->with('categories', Category::orderBy('desc', 'ASC')->get())
                ->with('courses', $courses)
                // variável para ser escrita no campo de busca na search.blade
                ->with('search_string', $search_string);
        }
        else
        {   
            $category = Category::find($id);

            return view('search')
                ->with('category_count', 0)
                ->with('categories', Category::orderBy('desc', 'ASC')->get())
                // busca todas os cursos da categoria selecionada
                ->with('courses', $category->courses->all())
                // campos para serem checados na search.blade
                ->with('checked_category', $category)
                // variável para ser escrita no campo de busca na search.blade
                ->with('search_string', '');
        }
    }

    public function searchCat(Request $request)
    {
        if ($request->ajax()){

            $courses_group = array();
            $courses_check = array();
            $courses_string = array();

            // CHECK E STRING
            if($request->any_check == "true" && $request->any_string == "true")
            {
                // monta um collection com as categorias selecionadas
                $categories = Category::all()->whereIN('id', explode(',', $request->checked_group_output));
                
                foreach($categories as $category)
                {
                    // cursos de cada categoria
                    $category_courses = $category->courses->all();

                    foreach($category_courses as $category_course)
                        // adiciona cada curso de cada categoria no array de cursos checadas
                        array_push($courses_check, $category_course);
                }

                // verificação se parte do nome de cada curso checado é igual à string que existe no campo de busca
                // se a string for igual -> o curso é adicionado ao array de cursos para serem exibidos na lista da view
                foreach($courses_check as $course)
                    if(strpos(strtolower($course->name), strtolower($request->course_title_output)) !== false)
                        array_push($courses_group, $course);

                // retorna searchResults que é uma view extra apenas para os resultados da busca    
                return view('searchResults')
                    ->with('courses', $courses_group);
            }
            // CHECK APENAS
            else if($request->any_check == "true" && $request->any_string == "false")
            {
                // monta um collection com as categorias selecionadas
                $categories = Category::all()->whereIN('id', explode(',', $request->checked_group_output));
                
                foreach($categories as $category)
                {
                    // cursos de cada categoria
                    $category_courses = $category->courses->all();

                    foreach($category_courses as $category_course)
                        // adiciona cada curso de cada categoria no array de cursos checadas
                        array_push($courses_check, $category_course);
                }
                
                // retorna searchResults que é uma view extra apenas para os resultados da busca
                return view('searchResults')
                    ->with('courses', $courses_check);
            }
            // STRING APENAS
            else if($request->any_check == "false" && $request->any_string == "true")
            {
                // monta um collection com cursos contendo a string escrita no campo de busca
                $courses_collection = Course::where('name','like', '%' . $request->course_title_output . '%')->get();

                foreach($courses_collection as $courses)
                    // transfere os cursos do collection para um novo array de cursos
                    array_push($courses_string, $courses);

                // retorna searchResults que é uma view extra apenas para os resultados da busca
                return view('searchResults')
                    ->with('courses', $courses_string);
            } 
            // NEM CHECK NEM STRING
            else
            {
                $courses = Course::all();
                // retorna searchResults que é uma view extra apenas para os resultados da busca
                return view('searchResults')
                    ->with('courses', $courses);
            }
        }
    }
}
