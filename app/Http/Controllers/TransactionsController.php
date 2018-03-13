<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Cart;
use App\Course;
use App\Transaction;
use App\TransactionItem;

class TransactionsController extends Controller
{
	public function success()
	{
		$user = Auth::user();
        $items = Cart::where('user_id', $user->id)->get();
        $courses = array();
        $total_price = 0;
        $transaction = new Transaction;
        $random_hash = rand(1, 9999999);

        foreach($items as $item)
        {
            $course = Course::find($item->course_id);
            array_push($courses, $course);
            $total_price = $total_price + $course->price;

            $user->courses()->save($course);

            $cart_item = Cart::find($item->id);
        	$cart_item->delete();

            $transaction_item = new TransactionItem;
            $transaction_item->hash = $random_hash;
            $transaction_item->user_id = $user->id;
            $transaction_item->course_id = $course->id;
            $transaction_item->price = $course->price;
            $transaction_item->save();
        }

        $transaction->user_id = $user->id;
        $transaction->price = $total_price;
        $transaction->transaction_type = 'remove_this';
        $transaction->hash = $random_hash;
        $transaction->save();

        return view('success')
            ->with('courses', $courses)
            ->with('total_price', $total_price);
	}
}