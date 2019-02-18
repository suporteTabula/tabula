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

        // !!!!!!!!!!!!!!!!!!!
        // IMPORTANTE: não existe nada que impeça o acesso à essa URL
        // caso o usuário possua itens no carrinho e acessar essa URL, ele registrará os cursos à ele
        // !!!!!!!!!!!!!!!!!!!

		$user = Auth::user();
        $items = Cart::where('user_id', $user->id)->get();
        // array de cursos do pedido
        $courses = array();
        // preço acumulado dos cursos
        $total_price = 0;
        $transaction = new Transaction;
        // remover esse random quando existir algum serviço de transação real
        $random_hash = rand(1, 9999999);

        foreach($items as $item)
        {
            $course = Course::find($item->course_id);
            // adiciona o curso do item em questão no array de cursos
            array_push($courses, $course);
            // soma o preço de cada curso
            $total_price = $total_price + $course->price;
            // vincula o usuário ao curso comprado
            $user->courses()->save($course, ['progress' => 0]);

            $cart_item = Cart::find($item->id);
            // remove item do carrinho
        	$cart_item->delete();

            // aqui são criados cada item de uma compra 
            // cada item é identificado pelo $random_hash (que será substituido pelo codigo da compra de algum serviço de compras)
            $transaction_item = new TransactionItem;
            $transaction_item->hash = $random_hash;
            $transaction_item->user_id = $user->id;
            $transaction_item->course_id = $course->id;
            $transaction_item->price = $course->price;
            $transaction_item->save();
        }

        $transaction->user_id = $user->id;
        $transaction->price = $total_price;
        // aqui entrará a informação do tipo de transação, quando houver algum serviço de compras
        $transaction->transaction_type = 'remove_this';
        // mesmo $random_hash de cada item da transação, fazendo o vínculo para poder ser resgatado na view
        // será substituido pelo codigo da compra 
        $transaction->hash = $random_hash;
        $transaction->save();

        return view('success')
            ->with('courses', $courses)
            ->with('total_price', $total_price)
            ->with('user', $user);
	}
}