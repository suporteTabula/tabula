<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Page;
use Session;

class AdminPageController extends Controller
{
    public function index()
    {
    	return view('admin.pages.index')
    	->with('pages', Page::all());
    }

    public function create()
    {
		return view('admin.pages.create')
		->with('seos', Page::all());
    }

    public function store(Request $request)
    {
    	$pages = Page::all();
    	foreach ($pages as $page) {
    		if ($page->type_page == $request->typePage) {
    			Session::flash('info', 'já possui uma página criada');
    			return redirect()->back();
    		}
    	}
    	$page = new Page;
    	$page->type_page	= $request->typePage;
    	$page->desc			= $request->desc;
    	$page->save();
    	Session::flash('success', 'Página vinculada');
		return redirect()->back();

    }

    public function edit($id)
    {
    	$page = Page::find($id);
    	return view('admin.pages.edit')
    	->with('page', $page);
    }

    public function update(Request $request, $id)
    {
    	$page 				= Page::find($id);
    	$page->type_page 	= $request->typePage;
    	$page->desc 		= $request->desc;
    	$page->save();
    	Session::flash('info', 'Página Editada');
		return redirect()->back();

    }

    public function destroy()
    {

    }
}
