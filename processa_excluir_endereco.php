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
    $stmt = $pdo->prepare("
        SELECT principal 
        FROM enderecos_usuario 
        WHERE id = :id AND usuario_id = :usuario_id 
        LIMIT 1
    ");

    $stmt->execute([
        ':id' => $endereco_id,
        ':usuario_id' => $usuario_id
    ]);

    $endereco = $stmt->fetch();

    if (!$endereco) {
        $_SESSION['erro_perfil'] = "Endereço não encontrado.";
        header("Location: minha-conta.php");
        exit;
    }

    $eraPrincipal = (int)$endereco['principal'] === 1;

    $stmtDelete = $pdo->prepare("
        DELETE FROM enderecos_usuario 
        WHERE id = :id AND usuario_id = :usuario_id
    ");

    $stmtDelete->execute([
        ':id' => $endereco_id,
        ':usuario_id' => $usuario_id
    ]);

    if ($eraPrincipal) {
        $stmtNovoPrincipal = $pdo->prepare("
            UPDATE enderecos_usuario 
            SET principal = 1 
            WHERE usuario_id = :usuario_id 
            ORDER BY id DESC 
            LIMIT 1
        ");

        $stmtNovoPrincipal->execute([
            ':usuario_id' => $usuario_id
        ]);
    }

    $_SESSION['sucesso_perfil'] = "Endereço excluído com sucesso.";
    header("Location: minha-conta.php");
    exit;

} catch (PDOException $e) {
    $_SESSION['erro_perfil'] = "Erro ao excluir endereço: " . $e->getMessage();
    header("Location: minha-conta.php");
    exit;
}
?>