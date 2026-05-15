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

$endereco_id = trim($_POST['endereco_id'] ?? '');
$titulo = trim($_POST['titulo'] ?? 'Endereço');
$cep = trim($_POST['cep'] ?? '');
$logradouro = trim($_POST['logradouro'] ?? '');
$numero = trim($_POST['numero'] ?? '');
$complemento = trim($_POST['complemento'] ?? '');
$bairro = trim($_POST['bairro'] ?? '');
$cidade = trim($_POST['cidade'] ?? '');
$estado = strtoupper(trim($_POST['estado'] ?? ''));
$principal = isset($_POST['principal']) ? 1 : 0;

if (
    empty($usuario_id) ||
    empty($titulo) ||
    empty($cep) ||
    empty($logradouro) ||
    empty($numero) ||
    empty($bairro) ||
    empty($cidade) ||
    empty($estado)
) {
    $_SESSION['erro_perfil'] = "Preencha todos os campos obrigatórios do endereço.";
    header("Location: minha-conta.php");
    exit;
}

try {
    $stmtTotal = $pdo->prepare("SELECT COUNT(*) FROM enderecos_usuario WHERE usuario_id = :usuario_id");
    $stmtTotal->execute([':usuario_id' => $usuario_id]);
    $totalEnderecos = (int)$stmtTotal->fetchColumn();

    if ($totalEnderecos === 0) {
        $principal = 1;
    }

    if ($principal === 1) {
        $stmtReset = $pdo->prepare("UPDATE enderecos_usuario SET principal = 0 WHERE usuario_id = :usuario_id");
        $stmtReset->execute([':usuario_id' => $usuario_id]);
    }

    if (!empty($endereco_id)) {
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

        $sql = "UPDATE enderecos_usuario SET
                    titulo = :titulo,
                    cep = :cep,
                    logradouro = :logradouro,
                    numero = :numero,
                    complemento = :complemento,
                    bairro = :bairro,
                    cidade = :cidade,
                    estado = :estado,
                    principal = :principal
                WHERE id = :id AND usuario_id = :usuario_id";

        $stmt = $pdo->prepare($sql);

        $stmt->execute([
            ':titulo' => $titulo,
            ':cep' => $cep,
            ':logradouro' => $logradouro,
            ':numero' => $numero,
            ':complemento' => $complemento,
            ':bairro' => $bairro,
            ':cidade' => $cidade,
            ':estado' => $estado,
            ':principal' => $principal,
            ':id' => $endereco_id,
            ':usuario_id' => $usuario_id
        ]);

        $_SESSION['sucesso_perfil'] = "Endereço atualizado com sucesso.";
    } else {
        $sql = "INSERT INTO enderecos_usuario
                (
                    usuario_id,
                    titulo,
                    cep,
                    logradouro,
                    numero,
                    complemento,
                    bairro,
                    cidade,
                    estado,
                    principal
                )
                VALUES
                (
                    :usuario_id,
                    :titulo,
                    :cep,
                    :logradouro,
                    :numero,
                    :complemento,
                    :bairro,
                    :cidade,
                    :estado,
                    :principal
                )";

        $stmt = $pdo->prepare($sql);

        $stmt->execute([
            ':usuario_id' => $usuario_id,
            ':titulo' => $titulo,
            ':cep' => $cep,
            ':logradouro' => $logradouro,
            ':numero' => $numero,
            ':complemento' => $complemento,
            ':bairro' => $bairro,
            ':cidade' => $cidade,
            ':estado' => $estado,
            ':principal' => $principal
        ]);

        $_SESSION['sucesso_perfil'] = "Endereço cadastrado com sucesso.";
    }

    header("Location: minha-conta.php");
    exit;

} catch (PDOException $e) {
    $_SESSION['erro_perfil'] = "Erro ao salvar endereço: " . $e->getMessage();
    header("Location: minha-conta.php");
    exit;
}
?>