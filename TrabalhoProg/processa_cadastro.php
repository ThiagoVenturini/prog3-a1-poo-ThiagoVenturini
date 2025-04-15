<?php
require_once 'classes/Autenticador.php';
require_once 'classes/Sessao.php';
require_once 'classes/Usuario.php'; 

Sessao::iniciar();
$nome = htmlspecialchars($_POST["nome"]);       // Validação para ver se os dados informados pelo usuarios estão de acordo 
$email = filter_input(INPUT_POST,"email");  
$senha = $_POST["senha"];

if (!$nome || !$email || !$senha) {    // validação para ver se não tem nenhum campo em branco 
    header('Location: cadastro.php?erro=Preencha todos os campos corretamente.');
    exit;
}

if (Autenticador::RegistrarUsuarios($nome, $email, $senha)) {        // Se passar por todas as validações registramos o usuarios 
    header('Location: login.php?sucesso=Cadastro realizado com sucesso! Faça login.');
} else {
    header('Location: cadastro.php?erro=E-mail já cadastrado.');
}
exit;
?>