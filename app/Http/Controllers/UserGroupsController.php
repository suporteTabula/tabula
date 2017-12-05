<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Session;
use App\User;
use App\UserType;
use App\UserGroup;

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
            ->with('users', User::all())
            ->with('userGroups', UserGroup::all());
            
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.userGroups.create');
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
            'desc' => 'required|max:100'
        ]);

        $user = Auth::user();

        $userGroup = UserGroup::create([
            'desc' => $request->desc,
            'user_id' => $user->id
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
            ->with('userGroup', $userGroup);
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
