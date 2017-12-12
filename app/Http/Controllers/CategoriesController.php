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
}
