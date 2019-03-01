<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\State; 
use App\Country;
use App\UserType;
use App\Schooling;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    

    protected function validator($request)
    {       

         return Validator::make($request, [
            'login'         => 'required',   
            'name'          => 'required',
//Validar Sexo
            'country_id'    => 'required',
            'schooling_id'  => 'required',
            'email'         => 'required|string|email|max:255|unique:users',
            'password'      => 'required|min:6|confirmed',
        ]);     
    }    

    public function showRegistrationForm()
    {
        return view('auth.register')->with('countries', Country::all())
                                    ->with('states', State::all())
                                    ->with('schoolings', Schooling::all());
    }
    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        $user = User::create([
            'login'         => $data['login'],
            'email'         => $data['email'],
            'name'          => $data['name'],
            //'sex'           => $data['sex'],
            'country_id'    => $data['country_id'],
            'schooling_id'  => $data['schooling_id'],
            'password'      => bcrypt($data['password']),
        ]);

        $user->userTypes()->attach($data['userType']);
        if (!empty($data['state_id'])) {
            $user->state_id = $data['state_id'];
        }
        $user->save();
        return $user;
    }
}
