<?php
session_start();

// Aqui no futuro entrará a conexão com Banco de Dados.
// Por enquanto, vamos forçar o login para você testar a interface:
$_SESSION['logado'] = true;
$_SESSION['nome_usuario'] = "Cliente VIP";

// Devolve o usuário para a página inicial
header("Location: index.php");
exit;
?>