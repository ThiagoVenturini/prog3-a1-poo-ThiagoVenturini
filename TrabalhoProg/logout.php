<?php
require_once 'classes/Sessao.php';   // Destruir sessão
Sessao::iniciar();
Sessao::destruir();
header('Location: cadastro.php?sucesso=Logout realizado com sucesso!');
exit;
?>