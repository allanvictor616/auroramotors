<?php
session_start();
require_once 'conexao.php';

if (!isset($_SESSION['logado']) || $_SESSION['logado'] !== true) {
    $_SESSION['erro_login'] = "Faça login para solicitar uma proposta.";
    header("Location: index.php");
    exit;
}

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header("Location: modelos.php");
    exit;
}

$usuario_id = $_SESSION['usuario_id'] ?? null;

$nome = trim($_POST['nome'] ?? '');
$email = trim($_POST['email'] ?? '');
$telefone = trim($_POST['telefone'] ?? '');
$modelo = trim($_POST['modelo'] ?? '');
$mensagem = trim($_POST['mensagem'] ?? '');
$valor_total = trim($_POST['valor_total'] ?? '0');

function converterValorProposta($valor) {
    $valor = trim((string)$valor);
    $valor = str_replace(['R$', ' '], ['', ''], $valor);

    if (strpos($valor, ',') !== false) {
        $valor = str_replace('.', '', $valor);
        $valor = str_replace(',', '.', $valor);
    } else {
        $valor = preg_replace('/[^0-9.]/', '', $valor);
    }

    return is_numeric($valor) ? (float)$valor : 0;
}

$valor_total = converterValorProposta($valor_total);

if (empty($nome) || empty($email) || empty($modelo)) {
    $_SESSION['erro_proposta'] = "Preencha os campos obrigatórios da proposta.";
    header("Location: modelos.php");
    exit;
}

if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $_SESSION['erro_proposta'] = "Informe um e-mail válido.";
    header("Location: modelos.php");
    exit;
}

try {
    $sql = "INSERT INTO propostas 
            (
                usuario_id,
                nome,
                email,
                telefone,
                modelo,
                mensagem,
                valor_total,
                status
            )
            VALUES 
            (
                :usuario_id,
                :nome,
                :email,
                :telefone,
                :modelo,
                :mensagem,
                :valor_total,
                'Pendente'
            )";

    $stmt = $pdo->prepare($sql);

    $stmt->execute([
        ':usuario_id' => $usuario_id,
        ':nome' => $nome,
        ':email' => $email,
        ':telefone' => $telefone,
        ':modelo' => $modelo,
        ':mensagem' => $mensagem,
        ':valor_total' => $valor_total
    ]);

    $_SESSION['sucesso_proposta'] = "Proposta enviada com sucesso!";
    header("Location: meus-pedidos.php?aba=propostas");
    exit;

} catch (PDOException $e) {
    $_SESSION['erro_proposta'] = "Erro ao salvar proposta: " . $e->getMessage();
    header("Location: modelos.php");
    exit;
}
?>