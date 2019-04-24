<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use App\User;
use App\Seo;
use App\Course;
use App\Category;

class AdminSeoController extends Controller
{
    public function index()
    {
    	return view('admin.seo.index')
		->with('courses', Course::all())
		->with('seos', Seo::all());
    }

    public function create()
    {
    	$seos = Seo::all();
		return view('admin.seo.create')
		->with('seos', $seos)
		->with('users', User::all())
		->with('categories', Category::all())
		->with('courses', Course::all());
    }


    public function store(Request $request)
    {
    	$this->validate($request, [
    		'metaDescription'  	=> 'required',
    		'metaType'			=> 'required',
    		'pageType' 			=> 'required'
    	]);       
	//Configura o Tipo de Meta
    	if ($request->metaType == 'description') {
    		$metaDescription = '<meta name="description" content="'.$request->metaDescription.'">';
    	}else if ($request->metaType == 'title') {
    		$metaDescription = '<title> '.$request->metaDescription.' </title>';
    	}else{
    		$metaDescription = '<meta name="keywords" content="'.$request->metaDescription.'">';
    	}
 		
    	//Confugura o Tipo da Página
 		if ($request->pageType == 'course') {
 			$course = Course::where('id', $request->page)->first();
 		}else if($request->pageType == 'category'){
 			$categories = Category::where('desc', $request->page)->first();
 		}else{
 			$request->page = 'Home';
 		}

    	Seo::create([
    		'meta_type'           => $request->metaType,
    		'meta_description'    => $request->metaDescription,
    		'meta'                => $metaDescription,
    		'page'                => $request->page,
    		'page_type'           => $request->pageType,
    	]);

    	Session::flash('success', 'SEO criado com sucesso');

    	return redirect()->back();
    }

    public function edit($id)
    {
    	$seos = Seo::find($id);

    	return view('admin.seo.edit')
    	->with('seos', $seos)
		->with('categories', Category::all())
		->with('courses', Course::all());
    }

    public function update(Request $request)
    {
    	if ($request->metaType == 'description') {
    		$metaDescription = '<meta name="description" content="'.$request->metaDescription.'">';
    	}else if ($request->metaType == 'title') {
    		$metaDescription = '<title> '.$request->metaDescription.' </title>';
    	}else{
    		$metaDescription = '<meta name="keywords" content="'.$request->metaDescription.'">';
    	}
 		
    	//Confugura o Tipo da Página
 		if ($request->pageType == 'course') {
 			$course = Course::where('name', $request->page)->first();
 		}else if($request->pageType == 'category'){
 			$categories = Category::where('desc', $request->page)->first();
 		}else{
 			$request->page = 'Home';
 		}

 		Seo::where('id', $request->id)->update([
    		'meta_type'           => $request->metaType,
    		'meta_description'    => $request->metaDescription,
    		'meta'                => $metaDescription,
    		'page'                => $request->page,
    		'page_type'           => $request->pageType,
    	]);  

    	Session::flash('success', 'SEO criado com sucesso');

    	return redirect()->back();
    }

    public function destroy($id)
    {
    	$seo = Seo::find($id);

        $seo->delete();

        Session::flash('success', 'SEO removido com sucesso');
        return redirect()->back();
    }
}
