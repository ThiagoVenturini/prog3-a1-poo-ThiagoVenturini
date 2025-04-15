<?php
require_once 'classes/Sessao.php';
require_once 'classes/Usuario.php';
require_once 'classes/Autenticador.php';

Sessao::iniciar();

$email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);  // Filtra as informações
$senha = $_POST['senha'] ?? '';
$lembrar = isset($_POST['lembrar']);

$usuarioLogado = Autenticador::LoginUsuarios($email, $senha);

if ($usuarioLogado === false) {
    header('Location: login.php?erro=E-mail ou senha inválidos.');   // Validação email senha
    exit;
}

Sessao::set('usuario_nome', $usuarioLogado->getNome());
Sessao::set('usuario_email', $usuarioLogado->getEmail());
Sessao::set('logged_in', true);

if ($lembrar) {
    setcookie('email', $email, time() + (86400 * 30), "/"); // 30 dias
} else {
    setcookie('email', '', time() - 3600, "/"); // apaga o cookie
}

header('Location: dashboard.php?sucesso=Login realizado com sucesso!');
exit;
?>
