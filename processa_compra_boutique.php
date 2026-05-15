<?php
session_start();
require_once 'conexao.php';

if (!isset($_SESSION['logado']) || $_SESSION['logado'] !== true) {
    $_SESSION['erro_compra'] = "Faça login para finalizar a compra.";
    header("Location: carrinho.php");
    exit;
}

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header("Location: carrinho.php");
    exit;
}

$usuario_id = $_SESSION['usuario_id'] ?? null;

$nome = trim($_POST['nome'] ?? '');
$email = trim($_POST['email'] ?? '');
$telefone = trim($_POST['telefone'] ?? '');

$cep = trim($_POST['cep'] ?? '');
$logradouro = trim($_POST['logradouro'] ?? '');
$numero = trim($_POST['numero'] ?? '');
$complemento = trim($_POST['complemento'] ?? '');
$bairro = trim($_POST['bairro'] ?? '');
$cidade = trim($_POST['cidade'] ?? '');
$estado = strtoupper(trim($_POST['estado'] ?? ''));

$forma_entrega = trim($_POST['forma_entrega'] ?? 'Entrega padrão');
$forma_pagamento = trim($_POST['forma_pagamento'] ?? 'Cartão de crédito');

$itensJson = $_POST['itens_carrinho'] ?? '';

if (
    empty($usuario_id) ||
    empty($nome) ||
    empty($email) ||
    empty($telefone) ||
    empty($cep) ||
    empty($logradouro) ||
    empty($numero) ||
    empty($bairro) ||
    empty($cidade) ||
    empty($estado) ||
    empty($itensJson)
) {
    $_SESSION['erro_compra'] = "Preencha todos os dados de entrega e confirme se há produtos no carrinho.";
    header("Location: carrinho.php");
    exit;
}

if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $_SESSION['erro_compra'] = "Informe um e-mail válido.";
    header("Location: carrinho.php");
    exit;
}

$itens = json_decode($itensJson, true);

if (!is_array($itens) || count($itens) === 0) {
    $_SESSION['erro_compra'] = "Seu carrinho está vazio.";
    header("Location: carrinho.php");
    exit;
}

$endereco = $logradouro . ', ' . $numero;

if (!empty($complemento)) {
    $endereco .= ' - ' . $complemento;
}

$endereco .= ' - ' . $bairro . ' - ' . $cidade . '/' . $estado . ' - CEP: ' . $cep;
$endereco .= ' | Entrega: ' . $forma_entrega;
$endereco .= ' | Pagamento: ' . $forma_pagamento;

function converterPrecoBoutique($preco) {
    $valor = str_replace(['R$', ' ', '.'], ['', '', ''], $preco);
    $valor = str_replace(',', '.', $valor);

    return is_numeric($valor) ? (float)$valor : 0;
}

try {
    $pdo->beginTransaction();

    $valor_total = 0;

    foreach ($itens as $item) {
        $preco = converterPrecoBoutique($item['preco'] ?? '0');
        $quantidade = (int)($item['quantidade'] ?? 1);

        if ($quantidade < 1) {
            $quantidade = 1;
        }

        $valor_total += $preco * $quantidade;
    }

    if ($valor_total <= 0) {
        $_SESSION['erro_compra'] = "Não foi possível calcular o valor da compra.";
        header("Location: carrinho.php");
        exit;
    }

    $codigo_rastreio = 'AUR-' . date('Ymd') . '-' . strtoupper(substr(md5(uniqid('', true)), 0, 6));

    $sqlPedido = "INSERT INTO pedidos_boutique 
        (
            usuario_id, 
            nome_cliente, 
            email_cliente, 
            telefone_cliente, 
            endereco_entrega, 
            valor_total, 
            status, 
            codigo_rastreio
        )
        VALUES 
        (
            :usuario_id, 
            :nome_cliente, 
            :email_cliente, 
            :telefone_cliente, 
            :endereco_entrega, 
            :valor_total, 
            'Pedido recebido', 
            :codigo_rastreio
        )";

    $stmtPedido = $pdo->prepare($sqlPedido);

    $stmtPedido->execute([
        ':usuario_id' => $usuario_id,
        ':nome_cliente' => $nome,
        ':email_cliente' => $email,
        ':telefone_cliente' => $telefone,
        ':endereco_entrega' => $endereco,
        ':valor_total' => $valor_total,
        ':codigo_rastreio' => $codigo_rastreio
    ]);

    $pedido_id = $pdo->lastInsertId();

    $sqlItem = "INSERT INTO pedido_boutique_itens 
        (
            pedido_id, 
            nome_produto, 
            categoria, 
            preco_unitario, 
            quantidade, 
            subtotal
        )
        VALUES
        (
            :pedido_id, 
            :nome_produto, 
            :categoria, 
            :preco_unitario, 
            :quantidade, 
            :subtotal
        )";

    $stmtItem = $pdo->prepare($sqlItem);

    foreach ($itens as $item) {
        $nome_produto = trim($item['nome'] ?? 'Produto Aurora');
        $categoria = trim($item['versao'] ?? 'Boutique Aurora');
        $preco_unitario = converterPrecoBoutique($item['preco'] ?? '0');
        $quantidade = (int)($item['quantidade'] ?? 1);

        if ($quantidade < 1) {
            $quantidade = 1;
        }

        $subtotal = $preco_unitario * $quantidade;

        $stmtItem->execute([
            ':pedido_id' => $pedido_id,
            ':nome_produto' => $nome_produto,
            ':categoria' => $categoria,
            ':preco_unitario' => $preco_unitario,
            ':quantidade' => $quantidade,
            ':subtotal' => $subtotal
        ]);
    }

    /*
        Atualiza o perfil do usuário com os dados mais recentes do checkout.
        Isso ajuda o próximo checkout a vir preenchido automaticamente.
        Se alguma dessas colunas ainda não existir, rode antes no phpMyAdmin:

        ALTER TABLE usuarios ADD COLUMN numero VARCHAR(20) NULL;
        ALTER TABLE usuarios ADD COLUMN complemento VARCHAR(120) NULL;
        ALTER TABLE usuarios ADD COLUMN bairro VARCHAR(100) NULL;
    */
    $sqlAtualizaUsuario = "UPDATE usuarios SET
        nome = :nome,
        email = :email,
        telefone = :telefone,
        cep = :cep,
        endereco = :endereco,
        numero = :numero,
        complemento = :complemento,
        bairro = :bairro,
        cidade = :cidade,
        estado = :estado
        WHERE id = :usuario_id";

    $stmtUsuario = $pdo->prepare($sqlAtualizaUsuario);

    $stmtUsuario->execute([
        ':nome' => $nome,
        ':email' => $email,
        ':telefone' => $telefone,
        ':cep' => $cep,
        ':endereco' => $logradouro,
        ':numero' => $numero,
        ':complemento' => $complemento,
        ':bairro' => $bairro,
        ':cidade' => $cidade,
        ':estado' => $estado,
        ':usuario_id' => $usuario_id
    ]);

    $_SESSION['nome_usuario'] = $nome;
    $_SESSION['email_usuario'] = $email;

    $pdo->commit();

    $_SESSION['sucesso_compra'] = "Compra realizada com sucesso. Pedido #" . str_pad($pedido_id, 5, '0', STR_PAD_LEFT) . " registrado.";

    echo "<script>
        localStorage.removeItem('aurora_cart');
        localStorage.removeItem('aurora_compra_enviada');
        window.location.href = 'meus-pedidos.php?aba=compras';
    </script>";
    exit;

} catch (PDOException $e) {
    if ($pdo->inTransaction()) {
        $pdo->rollBack();
    }

    $_SESSION['erro_compra'] = "Erro ao finalizar compra: " . $e->getMessage();
    header("Location: carrinho.php");
    exit;
}
?>