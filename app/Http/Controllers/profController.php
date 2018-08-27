<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class profController extends Controller
{
    public function professor()
{
	return view ('professor');
		
}
}
