<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Country;
use App\State;
use App\Schooling;
use App\UserType;
use App\UserGroup;
use App\Course;
use App\User;
use App\Company;
use Session;
use Auth;


class CompanyController extends Controller
{

	public function index()
	{
		$companies = Company::all();
		foreach ($companies as $company) {
			$company->user = User::where('id', $company->user_id)->first();
		}
		$auth = Auth::user();
		return view('companies.all_company')
		->with('auth', $auth)
		->with('companies', $companies);
	}

	public function theCompany($id)
	{
		$auth 			= User::find($id);
		$auth->company 	= Company::where('user_id', $auth->id)->first();
		$teachers 		= User::where('empresa_id', $auth->id)->get();

		foreach ($teachers as $teacher) {
			$idTeachers = User::where('empresa_id', $id)->pluck('id')->toArray();
		}
		if($teachers != '[]'){
			$courses = Course::wherein('user_id_owner', $idTeachers)->orWhere('user_id_owner', $id); 
		}
		$totalTeachers = User::where('empresa_id', $auth->id)->count();
		if (isset($courses)) {
			return view('companies.company')
			->with('teachers', $teachers)
			->with('courses', $courses->get())
			->with('auth', $auth);
		}
		return view('companies.company')->with('auth', $auth);

	}


	public function registerCompany()
	{
		if (Auth::user()) {
			Session::flash('success', 'Para registrar uma empresa, inicialmente deslogue da plataforma');
			return redirect()->back();
		}
		return view('auth.register_empresa')
		->with('countries', Country::all())
		->with('states', State::all())
		->with('schoolings', Schooling::all());
	}
	public function teachersIndex()
	{
		$auth = Auth::user();
		$teachers = User::where('empresa_id', $auth->id)->get();
		return view('companies.teachers')
		->with('teachers', $teachers);
	}

	public function teachersCreate()
	{
		$usersType = UserType::all();
		return view('companies.teachers_create')
		->with('usersType', $usersType)
		->with('states', State::all())
		->with('countries', Country::all())
		->with('schoolings', Schooling::all())
		->with('userGroups', UserGroup::all());
	}

	public function teachersStore(Request $request)
	{
		$user = new User;
		$auth = Auth::user();

		$this->validate($request, [
			'login'         => 'required',
			'name'    		=> 'required',
			'sex'           => 'required',
			'email'         => 'required|email',
			'password'      => 'required',
		]);

		$user->login        = $request->login;
		$user->email        = $request->email;
		$user->password     = bcrypt($request->password);
		$user->name   		= $request->name;
		$user->birthdate    = $request->birthdate;
		$user->sex          = $request->sex;
		$user->occupation   = $request->occupation;
		$user->bio          = $request->bio;
		$user->website      = $request->website;
		$user->google_plus  = $request->google_plus;
		$user->twitter      = $request->twitter;
		$user->facebook     = $request->facebook;
		$user->youtube      = $request->youtube;
		$user->state_id     = $request->state_id;
		$user->empresa_id	= $auth->id;
		$user->country_id   = $request->country_id;
		$user->schooling_id = $request->schooling_id;
		$user->youtube      = $request->youtube;

		$user->save();

		$user->userTypes()->attach($request->usersType);

        // se tiver algum check nos grupos de usuário
		if($request->group != ''){
			foreach($request->group as $checked) 
			{
				$userGroup = UserGroup::find($checked);
                // vincula user com o usergroup em questao
				$user->userGroups()->attach($userGroup);
                // remover essa linha e a coluna da tabela de usuários
				$user->group = 'ta dentro';
				$user->save();
			}
		}
		Session::flash('success', 'Usuário adicionado com sucesso');
		return redirect()->back();
	}

	public function teachersDestroy($id)
	{
		$user = User::find($id);
		User::where('id', $id)->update([
			'empresa_id' => null,
		]);


		Session::flash('success', 'Funcionário removido com sucesso');
		return redirect()->back();
	}

	public function mission()
	{
		$auth = Auth::user();
		$company = DB::table('company')->where('user_id', $auth->id)->first();
		return view('companies.mission')
		->with('company', $company);
	}

	public function missionUpdate(Request $request)
	{
		$auth = Auth::user();

		DB::table('company')->where('user_id', $auth->id)->update([
			'mission' => $request->mission,

		]);

		Session::flash('success', 'Missão atualizada');
		return redirect()->back();

	}

}
