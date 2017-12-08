<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Session;
use App\User;
use App\UserGroup;
use App\Company;

class UserGroupsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.userGroups.index')
            ->with('userGroups', UserGroup::all())
            ->with('companies', Company::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.userGroups.create')
            ->with('companies', Company::all());
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
            'desc'       => 'required|max:100',
            'company_id' => 'required'
        ]);

        $userGroup = UserGroup::create([
            'desc' => $request->desc,
            'company_id' => $request->company_id
        ]);

        Session::flash('success', 'Grupo criado com sucesso');

        return redirect()->route('userGroups');
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
        $userGroup = UserGroup::find($id);

        return view('admin.userGroups.edit')
            ->with('userGroup', $userGroup)
            ->with('companies', Company::all());
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
            'desc' => 'required|max:100'
        ]);

        $userGroup = UserGroup::find($id);

        $userGroup->desc = $request->desc;
        $userGroup->company_id = $request->company_id;
        $userGroup->save();

        Session::flash('success', 'Grupo editado com sucesso');

        return redirect()->route('userGroups');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $userGroup = UserGroup::find($id);

        $userGroup->delete();

        Session::flash('success', 'Grupo removido com sucesso');
        return redirect()->back();
    }
}
