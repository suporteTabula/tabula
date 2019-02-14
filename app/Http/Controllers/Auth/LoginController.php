<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
   /*
   |--------------------------------------------------------------------------
   | Login Controller
   |--------------------------------------------------------------------------
   |
   | This controller handles authenticating users for the application and
   | redirecting them to your home screen. The controller uses a trait
   | to conveniently provide its functionality to your applications.
   |
   */

   use AuthenticatesUsers;

   /**
    * Where to redirect users after login.
    *
    * @var string
    */

   protected function authenticated($request, $user)
   {
     $groups = count($user->userGroups()->get());

     if($groups == 0) {
      return redirect()->intended('/');
    }
    else if($groups == 1) {

     $userGroup = $user->userGroups()->first();

     return redirect()->route('userGroupIndex.single', ['group' => $userGroup->desc]);
   }
   return redirect()->intended('/userGroups');
 }

   /**
    * Create a new controller instance.
    *
    * @return void
    */
   public function __construct()
   {
     $this->middleware('guest')->except('logout');
   }
 }