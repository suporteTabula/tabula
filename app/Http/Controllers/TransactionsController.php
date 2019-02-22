<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Cart;
use App\User;
use App\Course;
use App\Transaction;
use App\TransactionItem;

class TransactionsController extends Controller
{
	public function success(Request $request)
	{  
        $idUser = Auth::user()->id;
        $user = User::find($idUser);
        return dd($request);


        // !!!!!!!!!!!!!!!!!!!
        // IMPORTANTE: não existe nada que impeça o acesso à essa URL
        // caso o usuário possua itens no carrinho e acessar essa URL, ele registrará os cursos à ele
        // !!!!!!!!!!!!!!!!!!!
/*
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
            ->with('user', $user);*/
        }

        public function statusTransaction(Request $request)
        {
            $user=Auth::user();

            $carts = Cart::where('user_id', $user->id)->first();
            //return dd($carts);
            $courses = Course::where('id', $carts->course_id)->first();
        
        //return dd($courses); 
            if(isset($request))
            {
                $data["token_account"] = "b6b74a0f43b8aa9";
                $data["finger_print"] = $request->finger_print;

                $data["customer"]["contacts"][1]["type_contact"] = "H";
                $data["customer"]["contacts"][1]["number_contact"] = "1133221122";

                $data["customer"]["addresses"][1]["type_address"] = "B";
                $data["customer"]["addresses"][1]["postal_code"] = "17516000";
                $data["customer"]["addresses"][1]["postal_code"] = "17000-000";
                $data["customer"]["addresses"][1]["street"] = "Av Esmeralda";
                $data["customer"]["addresses"][1]["number"] = "1001";
                $data["customer"]["addresses"][1]["neighborhood"] = "Jd Esmeralda";
                $data["customer"]["addresses"][1]["city"] = "Marilia";
                $data["customer"]["addresses"][1]["state"] = "SP";

                $data["customer"]["name"] = $user->first_name;
                $data["customer"]["cpf"] = $request->cpf;
                $data["customer"]["email"] = $user->email;
                //for ($i=0; $i < 2; $i++) { 
                $data["transaction_product"][1]["description"] = $courses->name;
                //return dd($courses->name);
                $data["transaction_product"][1]["quantity"] = "1";
                $data["transaction_product"][1]["price_unit"] = $courses->price;
                //}


                $data["payment"]["payment_method_id"] = "3";
                $data["payment"]["card_name"] = "STEPHEN STRANGE";
                $data["payment"]["card_number"] = (int) $request->number;
                $data["payment"]["card_expdate_month"] = (int) $request->monthExpiry;
                $data["payment"]["card_expdate_year"] = (int) $request->yearExpiry;
                $data["payment"]["card_cvv"] = "532";
                $data["payment"]["split"] = "1";

                $url = "https://api.intermediador.sandbox.yapay.com.br/api/v3/transactions/payment";

                ob_start();

                $ch = curl_init();
                curl_setopt($ch, CURLOPT_URL, $url);
                curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
                curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
                curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));

                curl_exec($ch);

                // JSON de retorno
                $resposta = json_decode(ob_get_contents());
                $code = curl_getinfo($ch, CURLINFO_HTTP_CODE);

                ob_end_clean();
                curl_close($ch);
                return dd($resposta);
                if($code == "201"){
                    //Tratamento dos dados de resposta da consulta.
                }else{
                    //Tratamento das mensagens de erro
                }
            }
        }
    }