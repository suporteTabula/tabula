<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\UserType;
use App\User;

class ProfController extends Controller
{
	public function virarProfessor(Request $request)
	{
		$user = User::find($request->id);

        /*$this->validate($request, [
            'login'         => 'required',
            'first_name'    => 'required',
            'last_name'     => 'required',
            'sex'           => 'required',
            'nickname'      => 'required',
            'email'         => 'required|email',
        ]);*/

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
        $request->id = 3;


        
        
        $user->userTypes()->sync($request->id);
        $user->save();

        return redirect()->route('userPanel.single');

    }
}
