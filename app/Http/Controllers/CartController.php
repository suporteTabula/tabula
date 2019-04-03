<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Session;
use App\Cart;
use App\Course;
use App\Cupom;
use App\CupomUser;
use App\Category;

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
        ->with('auth', Auth::user())
        ->with('total_price', $total_price);

    }

    public function insertCourseIntoFinish($id)
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

            return redirect()->back();
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
        $session = session()->get('desconto');

        $auth = Auth::user();
        $items = Cart::where('user_id', $auth->id)->get();
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
        ->with('auth', $auth)
        ->with('session', $session);
    }

    public function validaCupom(Request $request)
    {
        //Consulta usuário e cupom
        $auth = Auth::user();
        $cupom = Cupom::where('cod_cupom', $request->codCupom);
        //Seta os dados
        $total_price = 0;
        $validaCupom['total'] = $total_price;
        $validaCupom['desconto'] = 0;

        //Verifica se o cupom existe
        if ($cupom->count() > 0) {
            //Busca todos os itens do carrinho e pega o valor total
            $items = Cart::where('user_id', $auth->id)->get();
            $courses = array();
            foreach($items as $item){
                $course = Course::find($item->course_id);
                // adiciona o curso do item em questão no array de cursos
                array_push($courses, $course);
                // soma o preço de cada curso
                $total_price = $total_price + $course->price;
            }
            //Verifica se o cupom já foi usado pelo usuario
            $cupomUser = CupomUser::where('cupom_id', $cupom->first()->id)->where('user_id', $auth->id);
            if ($cupomUser->count() > 0) {
                return json_encode($validaCupom); //Retorna desconto vazio
            }    
            $cupomOK = new CupomUser;
            $cupomOK->type_cupom = NULL;
            //Realiza processo do carrinho
            if ($cupom->first()->tipo_cupom == 'carrinho') {
                //Reduz o valor no valor total do pedido
                $validaCupom['desconto'] = $cupom->first()->valor_cupom;
                $validaCupom['total'] = $total_price - $cupom->first()->valor_cupom;
                //Adiciona desconto e tipo no banco 
                $cupomOK->discount = $validaCupom['desconto'];
                $cupomOK->type_cupom = 'carrinho';

            //Realiza processo da porcentagem
            }elseif ($cupom->first()->tipo_cupom == 'porcentagem') {
                //reduz o valor total do carrinho com base na porcentagem
                $validaCupom['desconto'] = $total_price * ($cupom->first()->valor_cupom/100);
                $validaCupom['total'] = $total_price - ($total_price * ($cupom->first()->valor_cupom/100));

                $cupomOK->discount = $validaCupom['desconto'];
                $cupomOK->type_cupom = 'porcentagem';

            //Realiza processo do macrotema
            }elseif ($cupom->first()->tipo_cupom == 'macrotema') {
                //Verifica se o id existe
                $id_type = unserialize($cupom->first()->type_id);
                $categ = Category::wherein('id', $id_type);
                //Se existir faz a conta normalmente
                if ($categ->count() != 0) {
                    $validaCupom['desconto'] = $cupom->first()->valor_cupom;
                    $validaCupom['total'] = $total_price - $cupom->first()->valor_cupom;
                    $cupomOK->discount = $validaCupom['desconto'];
                    $cupomOK->type_cupom = 'macrotema';
                }

            //Realiza processo da subcategoria
            }elseif ($cupom->first()->tipo_cupom == 'subcategoria'){
                $id_type = unserialize($cupom->first()->type_id);
                $categ = Category::wherein('id', $id_type);
                //Se existir faz a conta normalmente
                if ($categ->count() != 0) {
                    $validaCupom['desconto'] = $cupom->first()->valor_cupom;
                    $validaCupom['total'] = $total_price - $cupom->first()->valor_cupom;
                    $cupomOK->discount = $validaCupom['desconto'];
                    $cupomOK->type_cupom = 'subcategoria';
                }
            }else{
                foreach ($courses as $course) {
                    if ($course->id == $cupom->first()->type_id) {
                    //Reduz de um produto especifico
                        $validaCupom['desconto'] = $cupom->first()->valor_cupom;
                        $validaCupom['total'] = $total_price - $cupom->first()->valor_cupom;
                        $cupomOK->discount = $validaCupom['desconto'];
                        $cupomOK->type_cupom = 'produto';
                    }
                }
            }

            if ($cupomOK->type_cupom != NULL) {
                $cupomOK->user_id   = $auth->id;
                $cupomOK->cupom_id  = $cupom->first()->id;
                $cupomOK->save();
            }
        }//endif

        $validaCupom['total'] = number_format($validaCupom['total'], 2,',', '.');

        $request->session()->put('desconto',[
            'descontoTotal' => $validaCupom['desconto'],
            'total' => $validaCupom['total'],
        ]);
        return json_encode($validaCupom);

    }

    public function newCart($id)
    {
        session(['course_id' => $id]);

        return redirect()->route('register');
    }
}
