<html>
<head>
<title>Resultados do formulario</title>
</head>
<body>
<?php
# recuperando os dados enviados via post:
$primeiroNome =  isset($_POST['primeiroNome']) ? $_POST['primeiroNome'] : '';
$sobrenome =  isset($_POST['sobrenome']) ? $_POST['sobrenome'] : '';
$email =  isset($_POST['email']) ? $_POST['email'] : '';
$comentarios =  isset($_POST['comentarios']) ? $_POST['comentarios'] : '';

//esta página recebe e manipula os dados criados por formulario.html
print ("Seu primeiro nome: $primeiroNome <br>\n");
print ("Seu sobrenome: $sobrenome <br>\n");
print ("Seu e-mail: $email <br>\n");
print ("Seu comentario: $comentarios <br>\n");
?>
</body>
</html>