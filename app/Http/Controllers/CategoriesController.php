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
        return view('admin.categories.index')
            ->with('categories', Category::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $last_index = Category::orderBy('desktop_index', 'desc')->first()->desktop_index;

        return view('admin.categories.create')
            ->with('categories', Category::all())
            ->with('suggested_index', $last_index + 1);
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
        
        if($request->category_id == '')
        {
            $this->validate($request, [
                'desktop_hex_bg' => 'required',
                'mobile_hex_bg' => 'required',
                'hex_icon' => 'required'
            ]);

            $last_index = Category::orderBy('desktop_index', 'desc')->first()->desktop_index;

            if($request->desktop_index == '') 
            {
                $category->desktop_index = $last_index + 1;
                $attach_number = $last_index + 1;
            }
            else
            {
                $category->desktop_index = $request->desktop_index;
                $attach_number = $request->desktop_index;
            }
            if($request->mobile_index == '')
                $category->mobile_index = $last_index + 1;
            else 
                $category->mobile_index = $request->mobile_index;

            $attach_desktop_hex_bg = $request->desktop_hex_bg;
            $attach_desktop_hex_bg_name = 'category-'.$attach_number.'.svg';
            $attach_desktop_hex_bg->move('images/hex/desktop', $attach_desktop_hex_bg_name); 

            $attach_mobile_hex_bg = $request->mobile_hex_bg;
            $attach_mobile_hex_bg_name = 'category-'.$attach_number.'.svg';
            $attach_mobile_hex_bg->move('images/hex/mobile', $attach_mobile_hex_bg_name); 

            $attach_hex_icon = $request->hex_icon;
            $attach_hex_icon_name = 'category-'.$attach_number.'.svg';
            $attach_hex_icon->move('images/hex/icon', $attach_hex_icon_name); 

            $category->desktop_hex_bg = $attach_desktop_hex_bg_name;  
            $category->mobile_hex_bg = $attach_mobile_hex_bg_name;
            $category->hex_icon = $attach_hex_icon_name;   
        }
        else
            $category->category_id_parent = $request->category_id;

        $category->desc = $request->desc;

        $category->save();

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
        if ($request->selected_category_output != 0 && $request->typed_category_output != "")
        {
            $subcategories = collect();
            $subcategories_select = Category::all()->whereIN('category_id_parent', explode(',', $request->selected_category_output));

            foreach ($subcategories_select as $subcategory) 
                if(strpos(strtolower($subcategory->desc), strtolower($request->typed_category_output)) !== false)
                    $subcategories->push($subcategory);

            return view('admin.categories.filterResults')
                ->with('subcategories', $subcategories);
        }
        else if ($request->selected_category_output != 0 && $request->typed_category_output == "")
        {
            $subcategories = Category::all()->whereIN('category_id_parent', explode(',', $request->selected_category_output));

            return view('admin.categories.filterResults')
                ->with('subcategories', $subcategories);
        }
        else if ($request->selected_category_output == 0 && $request->typed_category_output != "")
        {
            $subcategories = Category::where('desc','like', '%' . $request->typed_category_output . '%')->get();

            return view('admin.categories.filterResults')
                ->with('subcategories', $subcategories);
        }
        else
        {
            $subcategories = Category::all();

            return view('admin.categories.filterResults')
                ->with('subcategories', $subcategories);
        }
    }
}
