<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Session;
use App\State;
use App\Country;
use App\Schooling;

class UserController extends Controller
{
    public function userPanel() // criar outras funções para update de usuario no banco
    {
        return view('userPanel')
            ->with('user', Auth::user());
    }

    public function userProfile() // criar outras funções para update de usuario no banco
    {
        return view('userProfile')
            ->with('user', Auth::user())
            ->with('states', State::all())
            ->with('countries', Country::all())
            ->with('schoolings', Schooling::all());;
    }

    public function userProfileUpdate(Request $request)
    {
        $user = Auth::user();

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
        $user->country_id   = $request->country_id;
        $user->state_id     = $request->state_id;
        $user->schooling_id = $request->schooling_id;
        
        $user->save();

        Session::flash('success', 'Usuário alterado com sucesso');
        return redirect()->back();
    }
}
