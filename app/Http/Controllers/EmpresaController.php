<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Country;
use App\State;
use App\Schooling;

class EmpresaController extends Controller
{
	public function index()
	{
		

		return view('auth.register_empresa')
			->with('countries', Country::all())
			->with('states', State::all())
			->with('schoolings', Schooling::all());
	}
}
