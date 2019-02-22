<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Session;
use App\Cart;
use App\Course;
use App\Cupom;

class CartController extends Controller
{
    public function cart()
    {
        $user = Auth::user();
        $items = Cart::where('user_id', $user->id)->get();
        // array de cursos do pedido
        $courses = array();
        // preço acumulado dos cursos
        $total_price = 0;

        
        foreach($items as $item)
        {
            $course = Course::find($item->course_id);
            // adiciona o ATRIBUTO 'cart_id' em cada $course, para saber qual id no carrinho pode ser REMOVIDO
            $course['cart_id'] = $item->id;
            // adiciona o curso do item em questão no array de cursos
            array_push($courses, $course);
            // soma o preço de cada curso
            $total_price = $total_price + $course->price;
        }

        return view('cart')
        ->with('courses', $courses)
        ->with('user', Auth::user())
        ->with('total_price', $total_price);

    }

    public function insertCourseIntoCart($id)
    {
        $user = Auth::user();

        $items = Cart::where('user_id', $user->id)->get();
        // boolean de duplicata no carrinho 
        $double = false;

        // verifica se o $id do produto à adicionar é igual a algum $item->course_id
        foreach($items as $item)
            if($id == $item->course_id)
                $double = true;

        //se produto não já estiver no carrinho, então salva no banco
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
        // array de cursos do pedido
            $courses = array();
        // preço acumulado dos cursos
            $total_price = 0;

            foreach($items as $item)
            {
                $course = Course::find($item->course_id);
            // adiciona o curso do item em questão no array de cursos
                array_push($courses, $course);
            // soma o preço de cada curso
                $total_price = $total_price + $course->price;
            }

            return view('checkout')
            ->with('courses', $courses)
            ->with('total_price', $total_price)
            ->with('user', $user);
        }

        public function validaCupom(Request $request)
        {
            $cupom = Cupom::where('codCupom', $request->validaCupom)->count();
            
            if($cupom >0){
                return 'teste';
            }
            else
                return redirect()->back();
        }
    }
