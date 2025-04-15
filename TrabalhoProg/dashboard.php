<?php
require_once 'classes/Sessao.php';
Sessao::iniciar();

if (!Sessao::get('logged_in')) {   //Puxa as informações que foram informadas e ve se o checkbox de lembrar email esta ativo
    header('Location: login.php');
    exit;
}

$nome = Sessao::get('usuario_nome');
$emailSessao = Sessao::get('usuario_email');
$emailCookie = $_COOKIE['email'] ?? null;
$sucesso = $_GET['sucesso'] ?? '';
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Dashboard</title>
    <link rel="stylesheet" href="style.css">
    <script>
    window.onload = function () {
        const sucesso = <?= json_encode($sucesso) ?>;
        if (sucesso) alert(sucesso);
    };
    </script>
</head>
<body>
<div class="container">
    <h1>Bem-vindo, <?= htmlspecialchars($nome) ?>!</h1>
    <p>Email da sessão: <?= htmlspecialchars($emailSessao) ?></p>
    <?php if ($emailCookie): ?>
        <p>Email lembrado: <?= htmlspecialchars($emailCookie) ?></p>
    <?php endif; ?>
    <a href='logout.php'>Logout</a>
</div>
</body>
</html>