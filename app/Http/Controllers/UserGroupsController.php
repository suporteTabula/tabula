<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Course;
use App\Category;
use App\Company;
use App\UserGroup;

class UserGroupsController extends Controller
{
    public function index($group)
    {
        $user = Auth::user();
        $userGroup = UserGroup::where('desc', $group)->first();
        $compaines = Company::where('id', $userGroup->company_id)->first();

        $courses = $userGroup->courses()->get();

        return view('userGroupHome')
            ->with('courses', $courses)
            ->with('userGroup', $userGroup)
            ->with('compaines', $compaines);
    }

    public function select() 
    {
        $user = Auth::user();
        $userGroups = $user->userGroups()->get();

        return view('userGroups')
            ->with('userGroups', $userGroups);
    }
}
