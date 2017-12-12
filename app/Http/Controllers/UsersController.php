<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\UserType;
use Session;
use App\State;
use App\Country;
use App\Schooling;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    

    public function index()
    {
        return view('admin.users.index')->with('users', User::all())
                                        ->with('usersType', UserType::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $usersType = UserType::all();
        return view('admin.users.create')->with('usersType', $usersType)
                                         ->with('states', State::all())
                                         ->with('countries', Country::all())
                                         ->with('schoolings', Schooling::all());
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
            'login'         => 'required',
            'first_name'    => 'required',
            'last_name'     => 'required',
            'sex'           => 'required',
            'nickname'      => 'required',
            'email'         => 'required|email',
            'password'      => 'required',
            'usersType'     => 'required'
        ]);

        $user = User::create([
            'login'         => $request->login,
            'email'         => $request->email,
            'password'      => bcrypt($request->password),            
            'first_name'    => $request->first_name,
            'last_name'     => $request->last_name,
            'nickname'      => $request->nickname,
            'birthdate'     => $request->birthdate,
            'sex'           => $request->sex,
            'occupation'    => $request->occupation,
            'bio'           => $request->bio,
            'website'       => $request->website,
            'google_plus'   => $request->google_plus,
            'twitter'       => $request->twitter,
            'facebook'      => $request->facebook,
            'youtube'       => $request->youtube,
            'state_id'      => $request->state_id,
            'country_id'    => $request->country_id,
            'schooling_id'  => $request->schooling_id
        ]);

        $user->userTypes()->attach($request->usersType);
        Session::flash('success', 'Usuário adicionado com sucesso');
        return redirect()->route('users');
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
        $user = User::find($id);
        return view('admin.users.edit')->with('user', $user)
                                       ->with('usersType', UserType::all())
                                       ->with('states', State::all())
                                       ->with('countries', Country::all())
                                       ->with('schoolings', Schooling::all());
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
        $user = User::find($id);

        $this->validate($request, [
            'login'         => 'required',
            'first_name'    => 'required',
            'last_name'     => 'required',
            'sex'           => 'required',
            'nickname'      => 'required',
            'email'         => 'required|email',
        ]);

        $user->login        = $request->login;
        $user->email        = $request->email;
        $user->first_name   = $request->first_name;
        $user->last_name    = $request->last_name;
        $user->nickname     = $request->nickname;
        $user->birthdate    = $request->birthdate;
        $user->sex          = $request->sex;
        $user->occupation   = $request->occupation;
        $user->bio          = $request->bio;
        $user->website      = $request->website;
        $user->google_plus  = $request->google_plus;
        $user->twitter      = $request->twitter;
        $user->facebook     = $request->facebook;
        $user->youtube      = $request->youtube;
        
        $user->userTypes()->sync($request->usersType);
        $user->save();

        Session::flash('success', 'Usuário alterado com sucesso');
        return redirect()->route('users');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);

        $user->delete();

        Session::flash('success', 'Usuário deletado com sucesso');
        return redirect()->back();
    }
}
