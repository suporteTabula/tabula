<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Session;
use App\User;
use App\State;
use App\Country;
use App\Schooling;
use App\Transaction;
use App\Course;
use App\TransactionItem;

class profController extends Controller
{
    public function professor() // criar outras funções para update de usuario no banco
    {
        return view('professor')
            ->with('user', Auth::user())
            ->with('states', State::all())
            ->with('courses', Course::all())
            ->with('countries', Country::all())
            ->with('schoolings', Schooling::all());
        }

        
    
}
