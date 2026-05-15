<?php
session_start();
require_once 'conexao.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header("Location: index.php");
    exit;
}

$nome = trim($_POST['nome'] ?? '');
$email = trim($_POST['email'] ?? '');
$telefone = trim($_POST['telefone'] ?? '');
$senha = trim($_POST['senha'] ?? '');

if (empty($nome) || empty($email) || empty($senha)) {
    $_SESSION['erro_cadastro'] = "Preencha nome, e-mail e senha.";
    header("Location: index.php");
    exit;
}

if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $_SESSION['erro_cadastro'] = "Informe um e-mail válido.";
    header("Location: index.php");
    exit;
}

if (strlen($senha) < 6) {
    $_SESSION['erro_cadastro'] = "A senha precisa ter pelo menos 6 caracteres.";
    header("Location: index.php");
    exit;
}

try {
    $sqlVerifica = "SELECT id FROM usuarios WHERE email = :email LIMIT 1";
    $stmtVerifica = $pdo->prepare($sqlVerifica);
    $stmtVerifica->bindParam(':email', $email);
    $stmtVerifica->execute();

    if ($stmtVerifica->fetch()) {
        $_SESSION['erro_cadastro'] = "Este e-mail já está cadastrado.";
        header("Location: index.php");
        exit;
    }

    $senhaCriptografada = password_hash($senha, PASSWORD_DEFAULT);

    $sql = "INSERT INTO usuarios (nome, email, telefone, senha) 
            VALUES (:nome, :email, :telefone, :senha)";

    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':nome', $nome);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':telefone', $telefone);
    $stmt->bindParam(':senha', $senhaCriptografada);
    $stmt->execute();

    $_SESSION['sucesso_cadastro'] = "Cadastro realizado com sucesso. Faça login para continuar.";
    header("Location: index.php");
    exit;

} catch (PDOException $e) {
    $_SESSION['erro_cadastro'] = "Erro ao realizar cadastro.";
    header("Location: index.php");
    exit;
}
?>