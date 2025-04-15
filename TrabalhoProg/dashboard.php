<?php
require_once 'classes/Sessao.php';
Sessao::iniciar();

if (!Sessao::get('logged_in')) {  // Verifica se o usuário está logado. Se não, redireciona para a página de login.
    header('Location: login.php');
    exit;
}

$nome = Sessao::get('usuario_nome');  // Recupera o nome e email da sessão e o email armazenado no cookie, se houver.
$emailSessao = Sessao::get('usuario_email');
$emailCookie = $_COOKIE['email'] ?? null;
$sucesso = $_GET['sucesso'] ?? '';
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Dashboard</title>
    <link rel="stylesheet" href="style.css">
    <script>
        window.onload = () => sucesso && alert(sucesso);
    </script>
</head>
<body>
    <div class="container">
        <h1>Bem-vindo, <?= htmlspecialchars($nome) ?>!</h1>
        <p>Email da sessão: <?= htmlspecialchars($emailSessao) ?></p>
        <?= $emailCookie ? "<p>Email lembrado: " . htmlspecialchars($emailCookie) . "</p>" : '' ?>
        <a href='logout.php'>Logout</a>
    </div>
</body>
</html>