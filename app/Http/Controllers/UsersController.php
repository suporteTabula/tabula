<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Session;
use App\State;
use App\Country;
use App\Schooling;
use App\Transaction;
use App\Course;
use App\TransactionItem;

class UsersController extends Controller
{
    public function userPanel() // criar outras funções para update de usuario no banco
    {
        return view('userPanel')
            ->with('user', Auth::user())
            ->with('states', State::all())
            ->with('courses', Course::all())
            ->with('countries', Country::all())
            ->with('schoolings', Schooling::all());
    }

    
    public function userProfileUpdate(Request $request)
    {
        $user = Auth::user();


        $this->validate($request, [
            'first_name'    => 'required',
            'last_name'     => 'required',
            'nickname'      => 'required',
        ]);
        $user->first_name   = $request->first_name;
        $user->last_name    = $request->last_name;
        $user->nickname     = $request->nickname;
        $user->image        = $request->image;
        $user->sex          = $request->sex;
        $user->bio          = $request->bio;
        $user->website      = $request->website;
        $user->google_plus  = $request->google_plus;
        $user->twitter      = $request->twitter;
        $user->facebook     = $request->facebook;
        $user->youtube      = $request->youtube;
        $user->country_id   = $request->country_id;
        $user->state_id     = $request->state_id;
        
        $user->save();


        Session::flash('success', 'Usuário alterado com sucesso');
        return redirect()->back();
    }

    public function userPurchases() 
    {
        $user = Auth::user();
        $purchases = Transaction::where('user_id', $user->id)->get();

        return view('userPurchases')
            ->with('user', Auth::user())
            ->with('purchases', $purchases);
    }

    public function userPurchaseDetails($hash) 
    {
        $user = Auth::user();
        $purchases = TransactionItem::where('hash', $hash)->get();

        foreach ($purchases as $purchase) {

            $course = Course::find($purchase->course_id);
            $purchase['course_name'] = $course->name;
        }

        return view('userPurchaseDetails')
            ->with('user', Auth::user())
            ->with('purchases', $purchases);
    }
}
