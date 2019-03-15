<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Session;
use App\Cart;
use App\User;
use App\Course;
use App\Transaction;
use App\TransactionItem;

class TransactionsController extends Controller
{
	public function statusTransaction(Request $request)
	{  
        $session = session()->get('desconto');
        $idUser = Auth::user()->id;
        $auth = User::find($idUser);


        // !!!!!!!!!!!!!!!!!!!
        // IMPORTANTE: não existe nada que impeça o acesso à essa URL
        // caso o usuário possua itens no carrinho e acessar essa URL, ele registrará os cursos à ele
        // !!!!!!!!!!!!!!!!!!!

		$auth = Auth::user();
        $items = Cart::where('user_id', $auth->id)->get();
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
            $auth->courses()->save($course, ['progress' => 0]);

            $cart_item = Cart::find($item->id);
            // remove item do carrinho
        	$cart_item->delete();

            // aqui são criados cada item de uma compra 
            // cada item é identificado pelo $random_hash (que será substituido pelo codigo da compra de algum serviço de compras)
            $transaction_item = new TransactionItem;
            $transaction_item->hash = $random_hash;
            $transaction_item->user_id = $auth->id;
            $transaction_item->course_id = $course->id;
            $transaction_item->price = $course->price;
            $transaction_item->save();
        }

        $transaction->user_id = $auth->id;
        $transaction->price = $total_price;
        // aqui entrará a informação do tipo de transação, quando houver algum serviço de compras
        $transaction->transaction_type = 'remove_this';
        // mesmo $random_hash de cada item da transação, fazendo o vínculo para poder ser resgatado na view
        // será substituido pelo codigo da compra 
        $transaction->hash = $random_hash;
        $transaction->save();
        session()->flush('desconto');
        return view('success')
            ->with('courses', $courses)
            ->with('total_price', $total_price)
            ->with('auth', $auth);
        }

       /* public function statusTransaction(Request $request)
        {
            $auth=Auth::user();
            $i = 1;
            $items = Cart::where('user_id', $auth->id)->get();
            // array de cursos do pedido
            $courses = array();
            // preço acumulado dos cursos
            $total_price = 0;

        /*  !!!!!!!!!!!!!!!!!!!!!!!!!!!!!
        *   TABELA BIN CARTAO DE CREDITO
        *   DINERS CLUB |   2   |
        *   VISA        |   3   |
        *   MASTERCARD  |   4   |
        *   ELO         |   16  |
        *   HIPERCARD   |   20  |
        *   !!!!!!!!!!!!!!!!!!!!!!!!!!!!!
        *
        //return dd($request);

        if(isset($request))
        {
            $data["token_account"] = "b6b74a0f43b8aa9";
            $data["finger_print"] = $request->finger_print;

            $data["customer"]["contacts"][1]["type_contact"] = "M";
            $data["customer"]["contacts"][1]["number_contact"] = $request->phone;

            $data["customer"]["addresses"][1]["type_address"] = "B";
            $data["customer"]["addresses"][1]["postal_code"] = $request->cep;
            $data["customer"]["addresses"][1]["street"] = $request->address;
            $data["customer"]["addresses"][1]["number"] = $request->numAddress;
            $data["customer"]["addresses"][1]["neighborhood"] = $request->neighborhood;
            $data["customer"]["addresses"][1]["city"] = $request->city;
            $data["customer"]["addresses"][1]["state"] = $request->state;

            $data["customer"]["name"] = $auth->first_name;
            $data["customer"]["cpf"] = $request->cpf;
            $data["customer"]["email"] = $auth->email;
            foreach ($items as $item) {
                $course = Course::where('id', $item->course_id)->first();
                $data["transaction_product"][$i]["description"] = $course->name;
                $data["transaction_product"][$i]["quantity"] = "1";
                $data["transaction_product"][$i]["price_unit"] = $course->price;
                $total_price = $total_price + $course->price;
                $i++;
            } 

            $data["transaction"]["url_notification"] = "https://en8tt2ica2jzr.x.pipedream.net/";

            $data["payment"]["payment_method_id"] = $request->paymentMethod;
            $data["payment"]["card_name"] = $request->cardName;
            $data["payment"]["card_number"] = (int) $request->number;
            $data["payment"]["card_expdate_month"] = (int) $request->monthExpiry;
            $data["payment"]["card_expdate_year"] = (int) $request->yearExpiry;
            $data["payment"]["card_cvv"] = $request->cvv;
            $data["payment"]["split"] = $request->parcel;

            $url = "https://api.intermediador.sandbox.yapay.com.br/api/v3/transactions/payment";

            ob_start();

            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
            curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
            curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));

            curl_exec($ch);
            // JSON de retorno
            $resposta   = json_decode(ob_get_contents());
            $code       = curl_getinfo($ch, CURLINFO_HTTP_CODE);

            ob_end_clean();
            curl_close($ch);
            $message    = $resposta->message_response->message;

            return dd($resposta);
            if ($message == "success") {
                $status_id  = $resposta->data_response->transaction->status_id;
                $token_transaction = $resposta->data_response->transaction->token_transaction;
                $payment_method_id = $resposta->data_response->transaction->payment_method_id;
                if ($status_id = 6) {
                    $transaction = new Transaction;
                    foreach($items as $item)
                    {
                        $course = Course::find($item->course_id);
                        // adiciona o curso do item em questão no array de cursos
                        array_push($courses, $course);
                        $auth->courses()->save($course, ['progress' => 0]);

                        $cart_item = Cart::find($item->id);
                        // remove item do carrinho
                        $cart_item->delete();
                        // aqui são criados cada item de uma compra 
                        // cada item é identificado pelo $token_transaction 
                        $transaction_item = new TransactionItem;
                        $transaction_item->hash = $token_transaction;
                        $transaction_item->user_id = $auth->id;
                        $transaction_item->course_id = $course->id;
                        $transaction_item->price = $course->price;
                        $transaction_item->save();
                    }
                    $transaction->user_id = $auth->id;
                    $transaction->price = $total_price;
                    // aqui entrará a informação do tipo de transação
                    $transaction->transaction_type = $payment_method_id;
                    // mesmo $token_transaction de cada item da transação, 
                    //fazendo o vínculo para poder ser resgatado na view
                    // será substituido pelo codigo da compra 
                    $transaction->hash = $token_transaction;
                    $transaction->save();
                    session()->flush('desconto');
                    return view('success')
                    ->with('courses', $courses)
                    ->with('total_price', $total_price)
                    ->with('auth', $auth);
                }
            }

            
            
            if($code == "201"){
                return 'teste';
            }else{
                    //Tratamento das mensagens de erro
            }
        }
    }*/
}