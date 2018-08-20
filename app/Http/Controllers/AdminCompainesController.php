<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

<<<<<<< HEAD:app/Http/Controllers/AdminCompainesController.php
class AdminCompainesController extends Controller
=======

class AdminCompaniesController extends Controller
>>>>>>> integration:app/Http/Controllers/AdminCompaniesController.php
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function index()
    {
<<<<<<< HEAD:app/Http/Controllers/AdminCompainesController.php
        return view('admin.compaines.index')
            ->with('compaines', Company::all());
=======
        return view('admin.companies.index')
            ->with('companies', Company::all());
            
>>>>>>> integration:app/Http/Controllers/AdminCompaniesController.php
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.compaines.create');
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
            'name'          => 'required|max:100',
            'desc'          => 'required|max:300',
            'theme_color'   => 'required'
        ]);

       $company = Company::create([
            'name'          => $request->name,
            'desc'          => $request->desc,
            'theme_color'   => $request->theme_color
        ]);

        Session::flash('success', 'Empresa cadastrada com sucesso');
        return redirect()->route('compaines');
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
        $company = Company::find($id);

        return view('admin.compaines.edit')
            ->with('company', $company);
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
            'name' => 'required|max:100',
            'desc' => 'required|max:300'

        ]);

        $company = Company::find($id);

        $company->name = $request->name;
        $company->desc = $request->desc;
        $company->theme_color = $request->theme_color;
        $company->save();
        
        Session::flash('success', 'Dados da Empresa alterados com sucesso');
        return redirect()->route('compaines');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $company = Company::find($id);

        $company->delete();

        Session::flash('success', 'Empresa removida comp sucesso');
        return redirect()->back();
    }
}
