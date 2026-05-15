<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

require_once 'conexao.php';

if (!isset($_SESSION['logado']) || $_SESSION['logado'] !== true) {
    header("Location: index.php");
    exit;
}

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header("Location: meus-pedidos.php?aba=compras");
    exit;
}

$usuario_id = $_SESSION['usuario_id'] ?? null;
$pedido_id = $_POST['pedido_id'] ?? null;

if (empty($usuario_id) || empty($pedido_id)) {
    $_SESSION['erro_pedido'] = "Pedido inválido.";
    header("Location: meus-pedidos.php?aba=compras");
    exit;
}

try {
    $stmt = $pdo->prepare("
        SELECT id, status
        FROM pedidos_boutique
        WHERE id = :id
          AND usuario_id = :usuario_id
        LIMIT 1
    ");

    $stmt->execute([
        ':id' => $pedido_id,
        ':usuario_id' => $usuario_id
    ]);

    $pedido = $stmt->fetch();

    if (!$pedido) {
        $_SESSION['erro_pedido'] = "Pedido não encontrado para este usuário.";
        header("Location: meus-pedidos.php?aba=compras");
        exit;
    }

    $statusAtual = $pedido['status'];

    if (in_array($statusAtual, ['Enviado', 'Entregue', 'Cancelado'])) {
        $_SESSION['erro_pedido'] = "Este pedido não pode mais ser cancelado.";
        header("Location: meus-pedidos.php?aba=compras");
        exit;
    }

    $stmtUpdate = $pdo->prepare("
        UPDATE pedidos_boutique
        SET status = 'Cancelado'
        WHERE id = :id
          AND usuario_id = :usuario_id
    ");

    $stmtUpdate->execute([
        ':id' => $pedido_id,
        ':usuario_id' => $usuario_id
    ]);

    if ($stmtUpdate->rowCount() > 0) {
        $_SESSION['sucesso_compra'] = "Pedido #" . str_pad($pedido_id, 5, '0', STR_PAD_LEFT) . " cancelado com sucesso.";
    } else {
        $_SESSION['erro_pedido'] = "Nenhuma alteração foi realizada no pedido.";
    }

    header("Location: meus-pedidos.php?aba=compras");
    exit;

} catch (PDOException $e) {
    $_SESSION['erro_pedido'] = "Erro ao cancelar pedido: " . $e->getMessage();
    header("Location: meus-pedidos.php?aba=compras");
    exit;
}
?>