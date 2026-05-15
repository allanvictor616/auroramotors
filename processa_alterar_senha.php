<?php
session_start();
require_once 'conexao.php';

if (!isset($_SESSION['logado']) || $_SESSION['logado'] !== true) {
    header("Location: index.php");
    exit;
}

$usuario_id = $_SESSION['usuario_id'];

$senha_atual = trim($_POST['senha_atual'] ?? '');
$nova_senha = trim($_POST['nova_senha'] ?? '');
$confirmar_senha = trim($_POST['confirmar_senha'] ?? '');

if (empty($senha_atual) || empty($nova_senha) || empty($confirmar_senha)) {
    $_SESSION['erro_senha'] = "Preencha todos os campos.";
    header("Location: seguranca.php");
    exit;
}

if (strlen($nova_senha) < 6) {
    $_SESSION['erro_senha'] = "A nova senha precisa ter pelo menos 6 caracteres.";
    header("Location: seguranca.php");
    exit;
}

if ($nova_senha !== $confirmar_senha) {
    $_SESSION['erro_senha'] = "A confirmação da nova senha não confere.";
    header("Location: seguranca.php");
    exit;
}

try {
    $stmt = $pdo->prepare("SELECT senha FROM usuarios WHERE id = :id LIMIT 1");
    $stmt->bindParam(':id', $usuario_id);
    $stmt->execute();

    $usuario = $stmt->fetch();

    if (!$usuario || !password_verify($senha_atual, $usuario['senha'])) {
        $_SESSION['erro_senha'] = "Senha atual incorreta.";
        header("Location: seguranca.php");
        exit;
    }

    $senha_hash = password_hash($nova_senha, PASSWORD_DEFAULT);

    $sql = "UPDATE usuarios SET senha = :senha WHERE id = :id";
    $stmtUpdate = $pdo->prepare($sql);
    $stmtUpdate->bindParam(':senha', $senha_hash);
    $stmtUpdate->bindParam(':id', $usuario_id);
    $stmtUpdate->execute();

    $_SESSION['sucesso_senha'] = "Senha alterada com sucesso.";
    header("Location: seguranca.php");
    exit;

} catch (PDOException $e) {
    $_SESSION['erro_senha'] = "Erro ao alterar senha: " . $e->getMessage();
    header("Location: seguranca.php");
    exit;
}
?>