<?php
session_start();
require_once 'conexao.php';

if (!isset($_SESSION['logado']) || $_SESSION['logado'] !== true) {
    header("Location: index.php");
    exit;
}

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header("Location: minha-conta.php");
    exit;
}

$usuario_id = $_SESSION['usuario_id'] ?? null;
$endereco_id = $_POST['endereco_id'] ?? null;

if (empty($usuario_id) || empty($endereco_id)) {
    $_SESSION['erro_perfil'] = "Endereço inválido.";
    header("Location: minha-conta.php");
    exit;
}

try {
    $stmtCheck = $pdo->prepare("
        SELECT id 
        FROM enderecos_usuario 
        WHERE id = :id AND usuario_id = :usuario_id 
        LIMIT 1
    ");

    $stmtCheck->execute([
        ':id' => $endereco_id,
        ':usuario_id' => $usuario_id
    ]);

    if (!$stmtCheck->fetch()) {
        $_SESSION['erro_perfil'] = "Endereço não encontrado.";
        header("Location: minha-conta.php");
        exit;
    }

    $stmtReset = $pdo->prepare("
        UPDATE enderecos_usuario 
        SET principal = 0 
        WHERE usuario_id = :usuario_id
    ");

    $stmtReset->execute([
        ':usuario_id' => $usuario_id
    ]);

    $stmtPrincipal = $pdo->prepare("
        UPDATE enderecos_usuario 
        SET principal = 1 
        WHERE id = :id AND usuario_id = :usuario_id
    ");

    $stmtPrincipal->execute([
        ':id' => $endereco_id,
        ':usuario_id' => $usuario_id
    ]);

    $_SESSION['sucesso_perfil'] = "Endereço principal atualizado.";
    header("Location: minha-conta.php");
    exit;

} catch (PDOException $e) {
    $_SESSION['erro_perfil'] = "Erro ao definir endereço principal: " . $e->getMessage();
    header("Location: minha-conta.php");
    exit;
}
?>