<?php
// Recupera o email do cookie, se existir
$email_cookie = $_COOKIE['email'] ?? '';

$erro = $_GET['erro'] ?? '';
$sucesso = $_GET['sucesso'] ?? '';

$email_value = isset($_POST['lembrar']) ? $email_cookie : '';
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link rel="stylesheet" href="style.css">
    <script>
    window.onload = function () {
        // Valida se tudo deu certo ou se tem algum erro 
        if ("<?php echo $sucesso; ?>") {
            alert("<?php echo $sucesso; ?>");
        }
        if ("<?php echo $erro; ?>") {
            alert("<?php echo $erro; ?>");
        }
    };
    </script>
</head>
<body>
<div class="container">
    <h2>Login</h2>
    <form method="POST" action="processa_login.php">
        <input type="email" name="email" value="<?= htmlspecialchars($email_value) ?>" placeholder="Email" required>
        <input type="password" name="senha" placeholder="Senha" required>
        <label><input type="checkbox" name="lembrar" <?= isset($_COOKIE['email']) ? 'checked' : '' ?>> Lembrar e-mail</label>
        <button type="submit">Login</button>
    </form>
    <a href="cadastro.php">Criar conta</a>
</div>
</body>
</html>
