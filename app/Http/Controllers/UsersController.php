<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Auth;
use Session;
use App\User;
use App\State;
use App\Country;
use App\Schooling;
use App\Transaction;
use App\Course;
use App\TransactionItem;
use App\Usertype;
use App\Category;
use App\UserGroup;
use Image;

class UsersController extends Controller
{
    public function userPanel() // criar outras funções para update de usuario no banco
    {   
        $auth = Auth::user();
        $userType = Usertype::all(); 
        $teachers = User::where('empresa_id', $auth->id)->get();   

        $company = DB::table('company')->where('user_id', $auth->id)->first();
        if ($company == null) {
            return view('userPanel')
            ->with('auth', Auth::user())
            ->with('states', State::all())
            ->with('courses', Course::all())
            ->with('countries', Country::all())
            ->with('schoolings', Schooling::all())
            ->with('categories', Category::all())
            ->with('user_groups', UserGroup::all())
            ->with('company', $company)
            ->with('teachers', $teachers)
            ->with('usertype', $userType);
        }else{ 
            $users = User::where('empresa_id', $company->user_id)->get();
            foreach ($users as $user) {
                $user->courses = Course::where('user_id_owner', $user->id)->get();
            }
            return view('userPanel')
            ->with('auth', Auth::user())
            ->with('states', State::all())
            ->with('countries', Country::all())
            ->with('schoolings', Schooling::all())
            ->with('categories', Category::all())
            ->with('user_groups', UserGroup::all())
            ->with('users', $users)
            ->with('company', $company)
            ->with('teachers', $teachers)
            ->with('usertype', $userType);
        }
    }

    
    public function userProfileUpdate(Request $request)
    {
        $user = Auth::user();


        $this->validate($request, [
            'name'    => 'required',
            
        ]);


        
        $user->name         = $request->name;
        $user->sex          = $request->sex;
        $user->bio          = $request->bio;
        $user->website      = $request->website;
        $user->google_plus  = $request->google_plus;
        $user->twitter      = $request->twitter;
        $user->facebook     = $request->facebook;
        $user->youtube      = $request->youtube;
        $user->country_id   = $request->country_id;
        $user->state_id     = $request->state_id;
        $user->avatar       = $request->avatar;



        
        
        


        
        if($user->avatar != '')
        {
            $attach_img_avatar = $request->avatar;
           // $attach_img_avatar_name = time().$attach_img_avatar>getClientOriginalName();
            $attach_img_avatar_name = $user->nickname;
            $attach_img_avatar_name =  $attach_img_avatar_name.".".pathinfo($attach_img_avatar->getClientOriginalName(),PATHINFO_EXTENSION);
            $attach_img_avatar->move('images/Profilepic', $attach_img_avatar_name); 

            $user->avatar = $attach_img_avatar_name;  
        }
        else
            $user->avatar = 'default.png'; 


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
