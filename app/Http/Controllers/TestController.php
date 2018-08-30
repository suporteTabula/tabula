<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TestController extends Controller {
    // ==>> INTERMEDIADOR <<== //
    
    // -- PAGAMENTO CARTÃO DE CRÉDITO -- //
    // Os itens com comentário S (Sim) e N (Não) indicam a obrigatoriedade do campo, segundo a Yapay
    public function intermediadorPagamentoCartaoCredito() {

        // Tipo da Request
        $reqtype = "POST";
        // Qual URL que vamos enviar a request
        // Teste: https://api.intermediador.sandbox.yapay.com.br/api/v3/transactions/payment
        // Produção: https://api.intermediador.yapay.com.br/api/v3/transactions/payment
        $url = "https://api.intermediador.sandbox.yapay.com.br/api/v3/transactions/payment";
        // Array com todas as informações para compra no cartão de crédito
        $data = array(
            "token_account" => "b6b74a0f43b8aa9", // S
            "customer" => array (  
                "contacts" => array (
                    ["type_contact" => "H", // S
                    "number_contact" => "1133221122"], // S
                    ["type_contact" => "M", // S
                    "number_contact" => "11999999999"] // S    
                ),
                "addresses" => array ([
                    "type_address" => "B", // S
                    "postal_code" => "17000-000", // S
                    "street" => "Av Esmeralda", // S
                    "number" => "1001", // S
                    "completion" => "A", // N
                    "neighborhood" => "Jd Esmeralda", // S
                    "city" => "Marilia", // S
                    "state" => "SP" // S
                ]),
                "name" => "Stephen Strange", // S
                "birth_date" => "21/05/1941", // N
                "cpf" => "50235335142", // S
                "email" => "stephen.strange@avengers.com" // S
            ),
            "transaction_product" => array ([
                "description" => "Camiseta Tony Stark", // S
                "quantity" => "1", // S
                "price_unit" => "130.00", // S
                "code" => "1", // N
                "sku_code" => "0001", // N
                "extra" => "Informação Extra" // N
            ]),
            "transaction" => array (
                "available_payment_methods" => "2,3,4,5,6,7,14,15,16,18,19,21,22,23", // N
                "customer_ip" => "127.0.0.1", // S
                "shipping_type" => "Sedex", // N
                "shipping_price" => "12", // N
                "price_discount" => "", // N
                "url_notification" => "http://www.loja.com.br/notificacao", // N
                "free" => "Campo Livre" // N
            ),
            "affiliates" => array ([
                 "account_email" => "user2.teste@teste.com", // N
                 "percentage" => "20" // N
            ]),
            "payment" => array (
                "payment_method_id" => "4", // S
                "card_name" => "STEPHEN STRANGE", // N
                "card_number" => "4111111111111111", // N
                "card_expdate_month" => "01", // N
                "card_expdate_year" => "2021", // N
                "card_cvv" => "644", // N
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
        return view('test')
            ->with('result', $result);
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