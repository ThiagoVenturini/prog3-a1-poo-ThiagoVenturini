<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Cadastro de Usuários</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="container">
    <h2>Cadastro de Usuários</h2>
    <form method="POST" action="processa_cadastro.php">
        <input type="text" name="nome" placeholder="Nome" required>
        <input type="email" name="email" placeholder="Email" required>
        <input type="password" name="senha" placeholder="Senha" required>
        <button type="submit">Cadastrar</button>
    </form>
    <a href="login.php">Login</a>
</div>
</body>
</html>