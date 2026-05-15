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

$nome = trim($_POST['nome'] ?? '');
$email = trim($_POST['email'] ?? '');
$telefone = trim($_POST['telefone'] ?? '');
$cpf = trim($_POST['cpf'] ?? '');

$endereco = trim($_POST['endereco'] ?? '');
$numero = trim($_POST['numero'] ?? '');
$complemento = trim($_POST['complemento'] ?? '');
$bairro = trim($_POST['bairro'] ?? '');
$cep = trim($_POST['cep'] ?? '');
$cidade = trim($_POST['cidade'] ?? '');
$estado = strtoupper(trim($_POST['estado'] ?? ''));

if (empty($usuario_id)) {
    $_SESSION['erro_perfil'] = "Sessão inválida. Faça login novamente.";
    header("Location: index.php");
    exit;
}

if (empty($nome) || empty($email)) {
    $_SESSION['erro_perfil'] = "Nome e e-mail são obrigatórios.";
    header("Location: minha-conta.php");
    exit;
}

if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $_SESSION['erro_perfil'] = "Informe um e-mail válido.";
    header("Location: minha-conta.php");
    exit;
}

try {
    $sqlEmail = "SELECT id FROM usuarios WHERE email = :email AND id != :id LIMIT 1";
    $stmtEmail = $pdo->prepare($sqlEmail);
    $stmtEmail->execute([
        ':email' => $email,
        ':id' => $usuario_id
    ]);

    if ($stmtEmail->fetch()) {
        $_SESSION['erro_perfil'] = "Este e-mail já está sendo usado por outro usuário.";
        header("Location: minha-conta.php");
        exit;
    }

    $sql = "UPDATE usuarios SET
                nome = :nome,
                email = :email,
                telefone = :telefone,
                cpf = :cpf,
                endereco = :endereco,
                numero = :numero,
                complemento = :complemento,
                bairro = :bairro,
                cep = :cep,
                cidade = :cidade,
                estado = :estado
            WHERE id = :id";

    $stmt = $pdo->prepare($sql);

    $stmt->execute([
        ':nome' => $nome,
        ':email' => $email,
        ':telefone' => $telefone,
        ':cpf' => $cpf,
        ':endereco' => $endereco,
        ':numero' => $numero,
        ':complemento' => $complemento,
        ':bairro' => $bairro,
        ':cep' => $cep,
        ':cidade' => $cidade,
        ':estado' => $estado,
        ':id' => $usuario_id
    ]);

    $_SESSION['nome_usuario'] = $nome;
    $_SESSION['email_usuario'] = $email;

    $_SESSION['sucesso_perfil'] = "Dados atualizados com sucesso.";
    header("Location: minha-conta.php");
    exit;

} catch (PDOException $e) {
    $_SESSION['erro_perfil'] = "Erro ao atualizar perfil: " . $e->getMessage();
    header("Location: minha-conta.php");
    exit;
}
?>