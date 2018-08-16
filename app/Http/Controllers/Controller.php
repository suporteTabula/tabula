<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

public function homeEmpresa()
{
	return view('homeEmpresa');
}

<<<<<<< HEAD
public function reportsAdmin()
{
	return view ('reportsAdmin');
}

public function userAluno()
{
	return view ('userAluno');
=======
public function reports()
{
	return ('teste');
>>>>>>> frontend
}

}
