<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Cart;
use App\Course;
use App\User;
use App\Transaction;
use App\TransactionItem;
use App\CustomClasses\yapay_transaction;
use App\CustomClasses\yapay_author;
use App\CustomClasses\yapay_affiliate;

class Yappay extends Controller
{
    // ==>> INTERMEDIADOR <<== //
    
    // -- PAGAMENTO CARTÃO DE CRÉDITO -- //
    // Os itens com comentário S (Sim) e N (Não) indicam a obrigatoriedade do campo, segundo a Yapay
    public function intermediadorPagamentoCartaoCredito(Request $request) {
        $post = $request->post();
        $user = Auth::user();
        $items = Cart::where('user_id', $user->id)->get();
        // array de cursos do pedido
        $courses = array();
        //array de transactions de yapay
        $transaction_items_yapay = array();
        // preço acumulado dos cursos
        $total_price = 0;
        $transaction = new Transaction;
        // remover esse random quando existir algum serviço de transação real
        $random_hash = rand(1, 9999999);

        $authors = array();

        foreach($items as $item)
        {
            $course = Course::find($item->course_id);
            array_push($courses, $course);

            // adiciona o curso do item em questão no array de cursos
            $author = User::find($course->user_id_owner);     

            $author_item = new yapay_author;
            $author_item->email = $author->email;
            $author_item->course_cost = $course->price;

            array_push($authors,$author_item);

            // soma o preço de cada curso
            $total_price = $total_price + $course->price;

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
            
            $transaction_item_yapay = new yapay_transaction;
            $transaction_item_yapay->description = $course->name;
            $transaction_item_yapay->quantity = 1;
            $transaction_item_yapay->price_unit = $course->price;
            
            $transaction_items_yapay[] = $transaction_item_yapay;
        }

        $expiry = explode("/",$post['expiry']);
        $transaction->user_id = $user->id;
        $transaction->price = $total_price;
        // aqui entrará a informação do tipo de transação, quando houver algum serviço de compras
        $transaction->transaction_type = 'course_payment';
        // mesmo $random_hash de cada item da transação, fazendo o vínculo para poder ser resgatado na view
        // será substituido pelo codigo da compra 
        $transaction->hash = $random_hash;
        $transaction->save();

        $affiliate_array = array();

        foreach($authors as $author)
        {
            $author_cost = $author->course_cost * 100;

            $affiliate = new yapay_affiliate;
            $affiliate->email = $author->email;
            $affiliate->percentage = $author_cost / $total_price;

            array_push($affiliate_array,$affiliate);
        };

        // Tipo da Request
        $reqtype = "POST";
        // Qual URL que vamos enviar a request
        // mudar isso quando mudar para produção
        // Teste: https://api.intermediador.sandbox.yapay.com.br/api/v3/transactions/payment
        // Produção: https://api.intermediador.yapay.com.br/api/v3/transactions/payment
        $url = "https://api.intermediador.sandbox.yapay.com.br/api/v3/transactions/payment";
        // Array com todas as informações para compra no cartão de crédito
        $data = array(
            "token_account" => "b6b74a0f43b8aa9", // S
            "customer" => array (  
                "contacts" => array (
                    ["type_contact" => "H", // S //Placeholder - this does not exist in laravel
                    "number_contact" => "1133221122"], // S //Placeholder - this does not exist in laravel
                    ["type_contact" => "M", // S //Placeholder - this does not exist in laravel
                    "number_contact" => "11999999999"] // S //Placeholder - this does not exist in laravel
                ),
                "addresses" => array ([
                    "type_address" => "B", // S //Placeholder - this does not exist in laravel
                    "postal_code" => "17000-000", // S //Placeholder - this does not exist in laravel
                    "street" => "Av Esmeralda", // S //Placeholder - this does not exist in laravel
                    "number" => "1001", // S //Placeholder - this does not exist in laravel
                    "neighborhood" => "Jd Esmeralda", // S //Placeholder - this does not exist in laravel
                    "city" => "Marilia", // S //Placeholder - this does not exist in laravel
                    "state" => "SP" // S //Placeholder - this does not exist in laravel
                ]),
                "name" => $user->first_name." " .$user->last_name, // S
                "birth_date" => $user->birthdate, // N
                "cpf" => "50235335142", // S //Placeholder - this does not exist in laravel
                "email" => $user->email // S
            ),
            "transaction_product" => $transaction_items_yapay,
            "transaction" => array (
                "customer_ip" => \Request::ip(), // S
            ),
            "affiliates" => $affiliate_array,
            "payment" => array (
                "payment_method_id" => "4", // S
                "card_name" => $post['first-name']." ".$post['last-name'], // N
                "card_number" => $post['number'], // N
                "card_expdate_month" => str_replace(' ', '', $expiry[0]), // N
                "card_expdate_year" => str_replace(' ', '', $expiry[1]), // N
                "card_cvv" => $post['cvv'], // N
                "split" => "3" // S
            )
        );  

        // Transformação do array em PHP para JSON
        $data_string = json_encode($data);

        // Configurando o cURL
        $ch = curl_init($url);
        // Configuração do tipo da request
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, $reqtype);
        // Configuração do que será enviado (JSON)
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);
        // Configuração do retorno do valor quando for executado
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        // Configuração do Header HTTP
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            'Content-Type: application/json',
            'Content-Length: ' . strlen($data_string))
        );

        // Execução do cURL (curl_exec())
        // Decodificação JSON para PHP (json_decode())
        $result = json_decode(curl_exec($ch));

        // Para esse caso, retornará sucesso se as informações forem aprovadas pelo sistema da Yapay, junto com as informações de compra, ou erro caso sejam negadas.
        // Informações mais detalhadas em: https://intermediador.dev.yapay.com.br/#/transacao-cartao-credito?id=enviando-uma-transa%C3%A7%C3%A3o
        
        $message = '';

        if($result->message_response->message=='success'){
            foreach($items as $item)
            {
                $course = Course::find($item->course_id);
                array_push($courses, $course);
                
                // vincula o usuário ao curso comprado
                $user->courses()->save($course, ['progress' => 0]);
                $message = 'Successfully added courses to user profile';
            }
        } else {
            $message = 'Failed to add courses to user profile. Problem with payment';
        }

        return redirect()->action('HomeController@index')->with('message', $message);
    }

    /* 
    Informações Adicionais:
    [O QUE FALTA PARA JUNTAR]
    - Trocar as informações "hard-coded" dentro dos arrays para as variáveis advindas da página de finalizar compra, dentro de suas collections (informações do cliente, tipo de transação, etc)

    [SPLIT]
    - O split de pagamento é feito no sub-array "affiliates", passando apenas o email do professor e a porcentágem que ele receberá, o mesmo DEVERÁ estar cadastrado no sistema da Yapay, caso não esteja, o valor ficará congelado até que o mesmo se cadastre.

    [MÉTODOS DE PAGAMENTO]
    - No ambiente de testes (sandbox), o método de pagamento 2 (Dinners) gera um sucesso, mas deixa o status como "Em Recuperação", o método 3 (Visa) gera um erro e deixa o status como "Aguardando Pagamento" e o método 4 (Mastercard) gera sucesso e deixa o status como "Aprovado". (Resto dos métodos não testados).
    - É possível acompanhar os testes se autenticando com o email contato@tabula.com.br em https://intermediador.sandbox.yapay.com.br/

    [BONUS: CADASTRO E BUSCA]
    - Eu cheguei a montar tanto a API de Cadastro de clientes, quanto a de busca de clientes, mas imagino que isso não contempla de fato a criação de um afiliado para receber o split, pois não é cadastrado nenhum tipo de dado bancário e, tirando a API de busca (que está funcionando normalmente), não existe um painel da Yapay que é possível verificar os clientes cadastrados

    [BONUS: GATEWAY]
    - Deixei a API de pagamento com cartão de crédito no ambiente de testes do Gateway, caso achem necessário em algum momento.
    */

    // -- CADASTRO DE CLIENTE -- //
    public function intermediadorCadastoCliente() {

        $username = "test";
        $password = "aaaa";

        $data = array(
            "account_type" => "1", 
            "email" => "user2.teste@teste.com",
            "name" => "Usuário2 Teste",
            "cpf" => "21225081084",
            "birth_date" => "22/12/1985",
            "relationship" => "S",
            "gender" => "M",
            "type_address" => "B",
            "street" => "Av Paulista",
            "number" => "3",
            "completion" => "111",
            "neighborhood" => "Jd Paulista",
            "postal_code" => "17516000",
            "city" => "São Paulo",
            "state" => "SP",      
            "contacts" => array ([ 
                "type_contact" => "H",
                "number_contact" => "1143221122"
            ]),
            "type_response" => "J"
        );

        $data_string = json_encode($data);

        $ch = curl_init('https://api.intermediador.sandbox.yapay.com.br/v1/people/create');

        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_USERPWD, "$username:$password");
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            'Content-Type: application/json',
            'Content-Length: ' . strlen($data_string))
        );

        $result = curl_exec($ch);

        return view('test')
            ->with('json', $data_string)
            ->with('result', $result);
    }

    // -- BUSCA DE CLIENTE -- //
    public function intermediadorBuscaCliente() {

        $data = array(
            "email" => "user2.teste@teste.com",
        ); 

        $data_string = json_encode($data);                                                                                                     
        $ch = curl_init('https://api.intermediador.sandbox.yapay.com.br/v1/people/get_person_by_cpf_and_email');                                                                      
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");                    
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);                  
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);                       
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(                                  
            'Content-Type: application/json',                                                       
            'Content-Length: ' . strlen($data_string))                                                          
        );

        $result = new \SimpleXMLElement(curl_exec($ch));

        return view('test')
            ->with('result', $result);
    }
    // ============================= //

    // ==>> GATEWAY <<== //

    // -- CARTAO DE CREDITO -- //
    public function gatewayPagamentoCartaoCredito() {  

        $username = "SAINT";
        $password = "kHba#21s";
        $url = "https://sandbox.gateway.yapay.com.br/checkout/api/v3/transacao";
        $reqtype = "POST";
        $data = array(

            "codigoEstabelecimento" => 1533835657395,
            "codigoFormaPagamento" => 170,
            "transacao" => array (
                "numeroTransacao" => 123,
                "valor" => 100,
                "parcelas" => 1
            ),
            "dadosCartao" => array (
                "nomePortador" => "Teste Teste",
                "numeroCartao" => "0000000000000001",
                "codigoSeguranca" => "123",
                "dataValidade" => "12/2030"
            ),
            "itensDoPedido" => array ([
                "quantidadeProduto" => 1,
                "valorUnitarioProduto" => 100
            ]),
            "dadosCobranca" => array (
                "nome" => "Teste Integração",
                "documento" => "12312312312"
            )
        );
        
        $data_string = json_encode($data);

        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, $reqtype);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_USERPWD, "$username:$password");
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            'Content-Type: application/json',
            'Content-Length: ' . strlen($data_string))
        );

        $result = json_decode(curl_exec($ch));
        $curl_info = curl_getinfo($ch);

        return view('test')
            ->with('result', $result);
    }   
    // ============================= // 
}
