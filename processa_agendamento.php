<?php
session_start();
require_once 'conexao.php';

if (!isset($_SESSION['logado']) || $_SESSION['logado'] !== true) {
    header("Location: index.php");
    exit;
}

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header("Location: agendar-revisao.php");
    exit;
}

$usuario_id = $_SESSION['usuario_id'] ?? null;

$nome = trim($_POST['nome'] ?? '');
$email = trim($_POST['email'] ?? '');
$telefone = trim($_POST['telefone'] ?? '');
$modelo = trim($_POST['modelo'] ?? '');
$placa = trim($_POST['placa'] ?? '');
$servico = trim($_POST['servico'] ?? '');
$data_agendamento = trim($_POST['data_agendamento'] ?? '');
$horario = trim($_POST['horario'] ?? '');
$observacoes = trim($_POST['observacoes'] ?? '');

if (empty($nome) || empty($email) || empty($modelo) || empty($servico) || empty($data_agendamento) || empty($horario)) {
    $_SESSION['erro_agendamento'] = "Preencha os campos obrigatórios do agendamento.";
    header("Location: agendar-revisao.php");
    exit;
}

try {
    $sql = "INSERT INTO agendamentos 
            (usuario_id, nome, email, telefone, modelo, placa, servico, data_agendamento, horario, observacoes, status)
            VALUES 
            (:usuario_id, :nome, :email, :telefone, :modelo, :placa, :servico, :data_agendamento, :horario, :observacoes, 'Agendado')";

    $stmt = $pdo->prepare($sql);

    $stmt->bindParam(':usuario_id', $usuario_id);
    $stmt->bindParam(':nome', $nome);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':telefone', $telefone);
    $stmt->bindParam(':modelo', $modelo);
    $stmt->bindParam(':placa', $placa);
    $stmt->bindParam(':servico', $servico);
    $stmt->bindParam(':data_agendamento', $data_agendamento);
    $stmt->bindParam(':horario', $horario);
    $stmt->bindParam(':observacoes', $observacoes);

    $stmt->execute();

    $_SESSION['sucesso_agendamento'] = "Agendamento realizado com sucesso!";
    header("Location: agendamentos.php");
    exit;

} catch (PDOException $e) {
    $_SESSION['erro_agendamento'] = "Erro ao salvar agendamento: " . $e->getMessage();
    header("Location: agendar-revisao.php");
    exit;
}
?>