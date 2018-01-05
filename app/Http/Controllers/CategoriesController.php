<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use Auth;
use Session;

class CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.categories.index')->with('categories', Category::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.categories.create')->with('categories', Category::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'desc' => 'required'
        ]);

        $category = new Category();

        $category->desc = $request->desc;
        
        if($request->category_id == '')
        {
            $category->category_id_parent = NULL;
            $category->save();
        }
        else
        {
            $category->category_id_parent = $request->category_id;
            $category->save();
        }

        Session::flash('success', 'Categoria adicionada com sucesso');

        return redirect()->route('categories');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = Category::find($id);
        return view('admin.categories.edit')->with('category', $category)
                                            ->with('categories', Category::all());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'desc' => 'required'
        ]);

        $category = Category::find($id);

        $category->desc = $request->desc;

        if($request->category_id == '')
        {
            $category->category_id_parent = NULL;
            $category->save();
        }
        else
        {
            $category->category_id_parent = $request->category_id;
            $category->save();
        }

        Session::flash('success', 'Categoria/Subcategoria alterada com sucesso');

        return redirect()->route('categories');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = Category::find($id);

        $category->delete();

        Session::flash('success', 'Categoria deletada com sucesso');

        return redirect()->back();
    }

    public function search()
    {
        $input = Input::get('option');
        $cat = Category::where('desc', '=', $input)->get();
        return view('admin.categories.index')->with('sub', $cat);
    }

    public function filter(Request $request)
    {

        if ($request->cat_id != 0)
        {
            $subcats = Category::all()->whereIN('category_id_parent', explode(',', $request->cat_id));
            if ($subcats->count() > 0)
            {   
                foreach($subcats as $subcat)
                {
                    echo '<tr>'; 
                    echo    '<td style="vertical-align: middle !important;">'.$subcat->desc.'</td>'; 
                    echo    '<td>';
                    echo        '<a href="'.route('category.edit', ['id' => $subcat->id]).'">';
                    echo            '<img style=" width:35px; " src="'.asset('images\edit.svg').'">';
                    echo        '</a>';
                    echo    '</td>'; 
                    echo    '<td>'; 
                    echo        '<a href="'.route('category.delete', ['id' => $subcat->id]).'">'; 
                    echo            '<img style=" width:35px; " src="'.asset('images\error.svg').'">'; 
                    echo        '</a>';                   
                    echo    '</td>';
                    echo '</tr>';
                }    
            }
            else
            {
                echo '<tr>';
                echo    '<td colspan="4" class="text-center">Sem Subtemas</td>';
                echo '</tr>';
            }
        }
        else
        {
            $subcats = Category::all();
            foreach($subcats as $subcat)
                {
                    echo '<tr>'; 
                    echo    '<td style="vertical-align: middle !important;">'.$subcat->desc.'</td>'; 
                    echo    '<td>';
                    echo        '<a href="'.route('category.edit', ['id' => $subcat->id]).'">';
                    echo            '<img style=" width:35px; " src="'.asset('images\edit.svg').'">';
                    echo        '</a>';
                    echo    '</td>'; 
                    echo    '<td>'; 
                    echo        '<a href="'.route('category.delete', ['id' => $subcat->id]).'">'; 
                    echo            '<img style=" width:35px; " src="'.asset('images\error.svg').'">'; 
                    echo        '</a>';                   
                    echo    '</td>';
                    echo '</tr>';
                } 
        }
    }
}
