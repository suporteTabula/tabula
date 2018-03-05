<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Cart;
use App\Course;

class TransactionsController extends Controller
{
	public function success()
	{
		$user = Auth::user();
        $items = Cart::where('user_id', $user->id)->get();
        $courses = array();

        foreach($items as $item)
        {
            $course = Course::find($item->course_id);
            array_push($courses, $course);

            $user->courses()->save($course);

            $cart_item = Cart::find($item->id);
        	$cart_item->delete();
        }

        return view('success')
            ->with('courses', $courses);
	}
}
