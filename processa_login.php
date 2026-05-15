<?php
session_start();
require_once 'conexao.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header("Location: index.php");
    exit;
}

$email = trim($_POST['email'] ?? '');
$senha = trim($_POST['senha'] ?? '');

if (empty($email) || empty($senha)) {
    $_SESSION['erro_login'] = "Preencha e-mail e senha.";
    header("Location: index.php");
    exit;
}

try {
    $sql = "SELECT id, nome, email, senha FROM usuarios WHERE email = :email LIMIT 1";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':email', $email);
    $stmt->execute();

    $usuario = $stmt->fetch();

    if ($usuario && password_verify($senha, $usuario['senha'])) {
        $_SESSION['logado'] = true;
        $_SESSION['usuario_id'] = $usuario['id'];
        $_SESSION['nome_usuario'] = $usuario['nome'];
        $_SESSION['email_usuario'] = $usuario['email'];

        header("Location: minha-conta.php");
        exit;
    }

    $_SESSION['erro_login'] = "E-mail ou senha inválidos.";
    header("Location: index.php");
    exit;

} catch (PDOException $e) {
    $_SESSION['erro_login'] = "Erro ao tentar fazer login.";
    header("Location: index.php");
    exit;
}
?>