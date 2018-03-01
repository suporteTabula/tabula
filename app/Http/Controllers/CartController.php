<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Session;
use App\Cart;
use App\Course;

class CartController extends Controller
{
    public function cart()
    {
    	$user = Auth::user();
    	$items = Cart::where('user_id', $user->id)->get();
    	$courses = array();

    	foreach($items as $item)
    	{
    		$course = Course::find($item->course_id);
    		$course['cart_id'] = $item->id;
    		array_push($courses, $course);
    	}

    	return view('cart')
    		->with('courses', $courses);
    }

    public function insertCourseIntoCart($id)
    {
    	$user = Auth::user();
        $items = Cart::where('user_id', $user->id)->get();
        $double = false;

        foreach($items as $item)
            if($id == $item->course_id)
                $double = true;

        if(!$double)
        {
        	$cart = new Cart;
        	$cart->user_id = $user->id;
        	$cart->course_id = $id;
        	$cart->save();

        	Session::flash('success', 'Curso adicionado ao carrinho!');
        }
        else
            Session::flash('info', 'Curso já existente no carrinho');

        return redirect()->route('cart');
    }

    public function removeCourseFromCart($id)
    {
    	$cart_item = Cart::find($id);
        $cart_item->delete();

        Session::flash('success', 'Curso removido do carrinho!');

        return redirect()->back();
    }

    public function checkout()
    {
        $user = Auth::user();
        $items = Cart::where('user_id', $user->id)->get();
        $courses = array();

        foreach($items as $item)
        {
            $course = Course::find($item->course_id);
            array_push($courses, $course);
        }

        return view('checkout')
            ->with('courses', $courses);
    }
}
