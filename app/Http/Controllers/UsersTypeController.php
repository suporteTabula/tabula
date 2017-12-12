<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use App\UserType;


class UsersTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.usersType.index')->with('usersType', UserType::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.usersType.create');
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

        $userType = new UserType();

        $userType->desc = $request->desc;

        $userType->save();

        Session::flash('success', 'Novo tipo de usuário adicionado com sucesso');

        return redirect()->route('usersType');

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
        $userType = UserType::find($id);
        return view('admin.usersType.edit')->with('userType', $userType);
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

        $userType = UserType::find($id);

        $userType->desc = $request->desc;

        $userType->save();
        
        Session::flash('success', 'Tipo de usuário alterado com sucesso');

        return redirect()->route('usersType');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $userType = UserType::find($id);

        $userType->delete();

        Session::flash('success', 'Tipo de usuário deletado com sucesso');

        return redirect()->back();
    }
}
