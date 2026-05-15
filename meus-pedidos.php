<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

require_once 'conexao.php';

if (!isset($_SESSION['logado']) || $_SESSION['logado'] !== true) {
    header("Location: index.php");
    exit;
}

$usuario_id = $_SESSION['usuario_id'];

$aba = $_GET['aba'] ?? 'propostas';

if (!in_array($aba, ['propostas', 'compras'])) {
    $aba = 'propostas';
}

$stmt = $pdo->prepare("SELECT * FROM propostas WHERE usuario_id = :usuario_id ORDER BY criado_em DESC");
$stmt->bindParam(':usuario_id', $usuario_id);
$stmt->execute();
$propostas = $stmt->fetchAll();

$stmtPedidos = $pdo->prepare("SELECT * FROM pedidos_boutique WHERE usuario_id = :usuario_id ORDER BY criado_em DESC");
$stmtPedidos->bindParam(':usuario_id', $usuario_id);
$stmtPedidos->execute();
$pedidosBoutique = $stmtPedidos->fetchAll();

function formatarValor($valor) {
    return 'R$ ' . number_format((float)$valor, 2, ',', '.');
}

function formatarData($data) {
    return date('d/m/Y H:i', strtotime($data));
}

function buscarItensPedido($pdo, $pedido_id) {
    $stmt = $pdo->prepare("SELECT * FROM pedido_boutique_itens WHERE pedido_id = :pedido_id ORDER BY id ASC");
    $stmt->bindParam(':pedido_id', $pedido_id);
    $stmt->execute();
    return $stmt->fetchAll();
}

function classeTimeline($status, $etapa) {
    if ($status === 'Cancelado') {
        return 'cancelado';
    }

    $ordem = [
        'Pedido recebido' => 1,
        'Em separação' => 2,
        'Enviado' => 3,
        'Entregue' => 4
    ];

    $statusAtual = $ordem[$status] ?? 1;

    return $statusAtual >= $etapa ? 'active' : '';
}

function pedidoPodeCancelar($status) {
    return !in_array($status, ['Enviado', 'Entregue', 'Cancelado']);
}

function pedidoPodeRastrear($status) {
    return in_array($status, ['Enviado', 'Entregue']);
}

include 'includes/header.php';
?>

<style>
    body { 
        background-color: #f5f5f5; 
    }

    .account-hero {
        background-color: #121212;
        color: #fff;
        padding: 60px 0 40px;
    }

    .account-sidebar {
        background: #fff;
        border: 1px solid #eaeaea;
        padding: 30px 0;
        border-top: 3px solid #121212;
        box-shadow: 0 12px 32px rgba(0,0,0,0.055);
    }

    .account-link {
        display: block;
        padding: 12px 30px;
        color: #555;
        text-decoration: none;
        text-transform: uppercase;
        font-size: 13px;
        letter-spacing: 1px;
        transition: 0.3s;
        border-left: 3px solid transparent;
    }

    .account-link:hover, 
    .account-link.active {
        color: #fff;
        background-color: #121212;
        border-left-color: #c9933b;
    }

    .account-link.text-danger:hover {
        background-color: #dc3545;
        color: #fff !important;
        border-left-color: #dc3545;
    }

    .orders-header-row {
        display: flex;
        justify-content: space-between;
        align-items: center;
        gap: 20px;
        margin-bottom: 25px;
        flex-wrap: wrap;
    }

    .orders-title-group {
        display: flex;
        align-items: center;
        gap: 20px;
        flex-wrap: wrap;
    }

    .orders-title-group h4 {
        margin: 0;
        font-weight: 300;
    }

    .orders-toggle {
        display: flex;
        gap: 10px;
        align-items: center;
    }

    .orders-toggle a {
        display: inline-block;
        padding: 10px 22px;
        border: 1px solid #121212;
        color: #121212;
        text-decoration: none;
        text-transform: uppercase;
        letter-spacing: 1px;
        font-size: 13px;
        transition: 0.3s;
        background: #fff;
    }

    .orders-toggle a.active,
    .orders-toggle a:hover {
        background: #121212;
        color: #fff;
    }

    .order-card {
        background: #fff;
        border: 1px solid #eaeaea;
        padding: 35px;
        margin-bottom: 25px;
        box-shadow: 0 12px 32px rgba(0,0,0,0.055);
        border-left: 4px solid #121212;
    }

    .order-card.cancelado {
        border-left-color: #dc3545;
        opacity: 0.92;
    }

    .order-code {
        font-size: 13px;
        letter-spacing: 2px;
        text-transform: uppercase;
        color: #c9933b;
        font-weight: 600;
    }

    .status-badge {
        display: inline-block;
        padding: 8px 14px;
        font-size: 12px;
        text-transform: uppercase;
        letter-spacing: 1px;
        border: 1px solid #c9933b;
        color: #c9933b;
        background: #fff;
    }

    .status-badge.cancelado {
        border-color: #dc3545;
        color: #dc3545;
    }

    .tracking-box {
        background: #f8f8f8;
        border-left: 3px solid #c9933b;
        padding: 18px;
        margin-top: 20px;
    }

    .tracking-box.cancelado {
        border-left-color: #dc3545;
        background: #fff5f5;
    }

    .timeline-entrega {
        display: grid;
        grid-template-columns: repeat(4, 1fr);
        gap: 10px;
        margin-top: 20px;
    }

    .timeline-step {
        background: #f4f4f4;
        padding: 12px;
        text-align: center;
        font-size: 12px;
        color: #777;
        border-top: 3px solid #ddd;
    }

    .timeline-step.active {
        color: #121212;
        border-top-color: #c9933b;
        background: #fff8ed;
        font-weight: 600;
    }

    .timeline-step.cancelado {
        color: #dc3545;
        border-top-color: #dc3545;
        background: #fff5f5;
        font-weight: 600;
    }

    .empty-box {
        background: #fff;
        padding: 50px;
        text-align: center;
        border: 1px solid #eaeaea;
        box-shadow: 0 12px 32px rgba(0,0,0,0.055);
        border-top: 3px solid #121212;
    }

    .product-row {
        display: flex;
        justify-content: space-between;
        gap: 20px;
        border-bottom: 1px solid #ddd;
        padding: 12px 0;
    }

    .product-row:last-child {
        border-bottom: none;
    }

    .product-row small {
        color: #777;
    }

    .order-actions {
        display: flex;
        gap: 10px;
        flex-wrap: wrap;
        margin-top: 22px;
    }

    .btn-order-action {
        border-radius: 0;
        padding: 10px 18px;
        text-transform: uppercase;
        letter-spacing: 1px;
        font-size: 12px;
        text-decoration: none;
        border: 1px solid #121212;
        background: #121212;
        color: #fff;
        transition: 0.3s;
    }

    .btn-order-action:hover {
        background: #c9933b;
        border-color: #c9933b;
        color: #fff;
    }

    .btn-order-cancel {
        border-radius: 0;
        padding: 10px 18px;
        text-transform: uppercase;
        letter-spacing: 1px;
        font-size: 12px;
        border: 1px solid #dc3545;
        background: transparent;
        color: #dc3545;
        transition: 0.3s;
    }

    .btn-order-cancel:hover {
        background: #dc3545;
        color: #fff;
    }

    .tracking-mini-info {
        background: #fff8ed;
        border-left: 3px solid #c9933b;
        padding: 15px;
        margin-top: 18px;
        font-size: 14px;
        color: #555;
    }

    .tracking-mini-info.cancelado {
        background: #fff5f5;
        border-left-color: #dc3545;
        color: #7b2029;
    }

    .tracking-modal-code {
        background: #121212;
        color: #fff;
        padding: 18px;
        text-align: center;
        border-top: 3px solid #c9933b;
        letter-spacing: 2px;
        font-weight: 600;
        margin-bottom: 20px;
        word-break: break-word;
    }

    .modal-status-line {
        background: #f8f8f8;
        border-left: 3px solid #c9933b;
        padding: 12px;
        font-size: 13px;
        color: #555;
        margin-bottom: 20px;
    }

    @media (max-width: 768px) {
        .timeline-entrega {
            grid-template-columns: 1fr;
        }

        .orders-header-row {
            align-items: flex-start;
        }

        .orders-toggle {
            width: 100%;
        }

        .orders-toggle a {
            flex: 1;
            text-align: center;
        }

        .product-row {
            flex-direction: column;
            gap: 8px;
        }
    }
</style>

<main>
    <section class="account-hero">
        <div class="container">
            <div class="d-flex align-items-center gap-4">
                <div class="bg-dark d-flex justify-content-center align-items-center" style="width: 80px; height: 80px; border-radius: 50%; border: 2px solid #c9933b;">
                    <i class="bi bi-box-seam text-white" style="font-size: 2.2rem;"></i>
                </div>

                <div>
                    <h6 class="text-uppercase mb-1" style="color: #c9933b; letter-spacing: 2px;">
                        Portal do Cliente
                    </h6>
                    <h2 class="fw-light mb-0">Meus Pedidos</h2>
                </div>
            </div>
        </div>
    </section>

    <section class="container py-5 my-3">
        <div class="row">
            <div class="col-lg-3 mb-5 mb-lg-0">
                <div class="account-sidebar shadow-sm">
                    <a href="minha-conta.php" class="account-link">
                        <i class="bi bi-person me-3 fs-5"></i> Meu Perfil
                    </a>

                    <a href="meus-pedidos.php" class="account-link active">
                        <i class="bi bi-box-seam me-3 fs-5"></i> Meus Pedidos
                    </a>

                    <a href="meus-veiculos.php" class="account-link">
                        <i class="bi bi-car-front me-3 fs-5"></i> Meus Veículos
                    </a>

                    <a href="agendamentos.php" class="account-link">
                        <i class="bi bi-calendar-check me-3 fs-5"></i> Agendamentos
                    </a>

                    <a href="seguranca.php" class="account-link">
                        <i class="bi bi-shield-lock me-3 fs-5"></i> Segurança
                    </a>

                    <a href="logout.php" class="account-link text-danger">
                        <i class="bi bi-box-arrow-right me-3 fs-5"></i> Sair da Conta
                    </a>
                </div>
            </div>

            <div class="col-lg-9">

                <?php if (isset($_SESSION['sucesso_compra'])): ?>
                    <div class="alert alert-success">
                        <?php echo $_SESSION['sucesso_compra']; unset($_SESSION['sucesso_compra']); ?>
                    </div>
                <?php endif; ?>

                <?php if (isset($_SESSION['erro_pedido'])): ?>
                    <div class="alert alert-danger">
                        <?php echo $_SESSION['erro_pedido']; unset($_SESSION['erro_pedido']); ?>
                    </div>
                <?php endif; ?>

                <?php if (isset($_SESSION['sucesso_proposta'])): ?>
                    <div class="alert alert-success">
                        <?php echo $_SESSION['sucesso_proposta']; unset($_SESSION['sucesso_proposta']); ?>
                    </div>
                <?php endif; ?>

                <div class="orders-header-row">
                    <div class="orders-title-group">
                        <h4>
                            <?php echo $aba === 'compras' ? 'Histórico de Compras' : 'Histórico de Propostas'; ?>
                        </h4>

                        <div class="orders-toggle">
                            <a href="meus-pedidos.php?aba=propostas" class="<?php echo $aba === 'propostas' ? 'active' : ''; ?>">
                                Propostas
                            </a>

                            <a href="meus-pedidos.php?aba=compras" class="<?php echo $aba === 'compras' ? 'active' : ''; ?>">
                                Compras
                            </a>
                        </div>
                    </div>

                    <?php if ($aba === 'compras'): ?>
                        <a href="boutique.php" class="btn btn-dark rounded-0 px-4 py-2 text-uppercase" style="letter-spacing: 1px;">
                            Nova Compra
                        </a>
                    <?php else: ?>
                        <a href="modelos.php" class="btn btn-dark rounded-0 px-4 py-2 text-uppercase" style="letter-spacing: 1px;">
                            Nova Proposta
                        </a>
                    <?php endif; ?>
                </div>

                <?php if ($aba === 'compras'): ?>

                    <?php if (empty($pedidosBoutique)): ?>
                        <div class="empty-box">
                            <i class="bi bi-bag" style="font-size: 48px; color: #c9933b;"></i>
                            <h4 class="fw-light mt-3">Nenhuma compra encontrada</h4>
                            <p class="text-muted mb-4">
                                Você ainda não possui compras registradas na Boutique Aurora Motors.
                            </p>
                            <a href="boutique.php" class="btn btn-dark rounded-0 px-4 py-2">
                                Comprar na Boutique
                            </a>
                        </div>
                    <?php else: ?>

                        <?php foreach ($pedidosBoutique as $pedido): ?>
                            <?php 
                                $itens = buscarItensPedido($pdo, $pedido['id']); 
                                $statusPedido = $pedido['status'] ?? 'Pedido recebido';
                                $codigoRastreio = $pedido['codigo_rastreio'] ?? '';
                            ?>

                            <div class="order-card <?php echo $statusPedido === 'Cancelado' ? 'cancelado' : ''; ?>">
                                <div class="d-flex justify-content-between align-items-start flex-wrap gap-3 mb-3">
                                    <div>
                                        <div class="order-code mb-2">
                                            Compra #<?php echo str_pad($pedido['id'], 5, '0', STR_PAD_LEFT); ?>
                                        </div>

                                        <h3 class="fw-light mb-1">
                                            Aurora Boutique
                                        </h3>

                                        <p class="text-muted mb-0">
                                            Realizada em <?php echo formatarData($pedido['criado_em']); ?>
                                        </p>
                                    </div>

                                    <span class="status-badge <?php echo $statusPedido === 'Cancelado' ? 'cancelado' : ''; ?>">
                                        <?php echo htmlspecialchars($statusPedido); ?>
                                    </span>
                                </div>

                                <hr>

                                <div class="row g-4">
                                    <div class="col-md-4">
                                        <p class="small text-muted text-uppercase mb-1">Valor total</p>
                                        <strong><?php echo formatarValor($pedido['valor_total']); ?></strong>
                                    </div>

                                    <div class="col-md-4">
                                        <p class="small text-muted text-uppercase mb-1">Rastreio</p>
                                        <strong>
                                            <?php echo pedidoPodeRastrear($statusPedido) && !empty($codigoRastreio) ? htmlspecialchars($codigoRastreio) : 'Aguardando envio'; ?>
                                        </strong>
                                    </div>

                                    <div class="col-md-4">
                                        <p class="small text-muted text-uppercase mb-1">Cliente</p>
                                        <strong><?php echo htmlspecialchars($pedido['nome_cliente']); ?></strong>
                                    </div>
                                </div>

                                <div class="tracking-box <?php echo $statusPedido === 'Cancelado' ? 'cancelado' : ''; ?>">
                                    <p class="small text-muted text-uppercase mb-3">Produtos comprados</p>

                                    <?php foreach ($itens as $item): ?>
                                        <div class="product-row">
                                            <div>
                                                <strong><?php echo htmlspecialchars($item['nome_produto']); ?></strong><br>
                                                <small>
                                                    <?php echo htmlspecialchars($item['categoria']); ?> · Quantidade: <?php echo (int)$item['quantidade']; ?>
                                                </small>
                                            </div>

                                            <strong><?php echo formatarValor($item['subtotal']); ?></strong>
                                        </div>
                                    <?php endforeach; ?>
                                </div>

                                <div class="tracking-box <?php echo $statusPedido === 'Cancelado' ? 'cancelado' : ''; ?>">
                                    <p class="small text-muted text-uppercase mb-2">Endereço de entrega</p>
                                    <p class="mb-0">
                                        <?php echo htmlspecialchars($pedido['endereco_entrega']); ?>
                                    </p>
                                </div>

                                <div class="timeline-entrega">
                                    <div class="timeline-step <?php echo classeTimeline($statusPedido, 1); ?>">
                                        Pedido recebido
                                    </div>

                                    <div class="timeline-step <?php echo classeTimeline($statusPedido, 2); ?>">
                                        Em separação
                                    </div>

                                    <div class="timeline-step <?php echo classeTimeline($statusPedido, 3); ?>">
                                        Enviado
                                    </div>

                                    <div class="timeline-step <?php echo classeTimeline($statusPedido, 4); ?>">
                                        Entregue
                                    </div>
                                </div>

                                <div class="tracking-mini-info <?php echo $statusPedido === 'Cancelado' ? 'cancelado' : ''; ?>">
                                    <?php if ($statusPedido === 'Enviado'): ?>
                                        Seu pedido já foi enviado. Utilize o código de rastreio para acompanhar a entrega.
                                    <?php elseif ($statusPedido === 'Entregue'): ?>
                                        Pedido entregue com sucesso. Obrigado por comprar na Boutique Aurora Motors.
                                    <?php elseif ($statusPedido === 'Cancelado'): ?>
                                        Este pedido foi cancelado e não seguirá para separação ou envio.
                                    <?php else: ?>
                                        Seu pedido ainda não foi enviado. O acompanhamento de rastreio ficará disponível assim que a Boutique Aurora Motors realizar o envio.
                                    <?php endif; ?>
                                </div>

                                <div class="order-actions">
                                    <?php if (pedidoPodeRastrear($statusPedido)): ?>
                                        <button 
                                            type="button"
                                            class="btn-order-action"
                                            data-bs-toggle="modal"
                                            data-bs-target="#modalRastreio<?php echo $pedido['id']; ?>"
                                        >
                                            <i class="bi bi-truck me-2"></i>
                                            Acompanhar Rastreio
                                        </button>
                                    <?php endif; ?>

                                    <?php if (pedidoPodeCancelar($statusPedido)): ?>
                                        <button 
                                            type="button"
                                            class="btn-order-cancel"
                                            data-bs-toggle="modal"
                                            data-bs-target="#modalCancelarPedido<?php echo $pedido['id']; ?>"
                                        >
                                            <i class="bi bi-x-circle me-2"></i>
                                            Cancelar Pedido
                                        </button>
                                    <?php endif; ?>
                                </div>
                            </div>

                            <?php if (pedidoPodeRastrear($statusPedido)): ?>
                                <div class="modal fade" id="modalRastreio<?php echo $pedido['id']; ?>" tabindex="-1" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered modal-sm">
                                        <div class="modal-content premium-modal">
                                            <div class="modal-header border-0">
                                                <h5 class="modal-title fw-light text-uppercase" style="letter-spacing: 2px;">
                                                    Rastreio
                                                </h5>
                                                <button type="button" class="btn-close btn-close-black" data-bs-dismiss="modal"></button>
                                            </div>

                                            <div class="modal-body p-4">
                                                <div class="text-center mb-3">
                                                    <i class="bi bi-truck" style="font-size: 2.8rem; color: #c9933b;"></i>
                                                </div>

                                                <p class="text-muted text-center small mb-3">
                                                    Código de acompanhamento do pedido:
                                                </p>

                                                <div class="tracking-modal-code">
                                                    <?php echo !empty($codigoRastreio) ? htmlspecialchars($codigoRastreio) : 'AGUARDANDO ENVIO'; ?>
                                                </div>

                                                <div class="modal-status-line">
                                                    Status atual: 
                                                    <strong><?php echo htmlspecialchars($statusPedido); ?></strong>
                                                </div>

                                                <p class="small text-muted mb-3">
                                                    Você pode consultar o andamento da entrega no site dos Correios ou transportadora parceira usando o código acima.
                                                </p>

                                                <a 
                                                    href="https://rastreamento.correios.com.br/app/index.php" 
                                                    target="_blank"
                                                    class="btn btn-dark rounded-0 w-100 py-2 text-uppercase"
                                                    style="letter-spacing: 1px; font-size: 13px;"
                                                >
                                                    Abrir site de rastreio
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php endif; ?>

                            <?php if (pedidoPodeCancelar($statusPedido)): ?>
                                <div class="modal fade" id="modalCancelarPedido<?php echo $pedido['id']; ?>" tabindex="-1" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered modal-sm">
                                        <div class="modal-content premium-modal text-center">
                                            <div class="modal-body p-4">
                                                <i class="bi bi-x-circle mb-3 d-block" style="font-size: 3rem; color: #dc3545;"></i>

                                                <h5 class="fw-light mb-3">
                                                    Cancelar pedido?
                                                </h5>

                                                <p class="text-muted small mb-4">
                                                    Tem certeza que deseja cancelar a compra 
                                                    <strong>#<?php echo str_pad($pedido['id'], 5, '0', STR_PAD_LEFT); ?></strong>?
                                                    Esta ação alterará o status do pedido para cancelado.
                                                </p>

                                                <form action="processa_cancelar_pedido.php" method="POST" class="d-grid gap-2">
                                                    <input type="hidden" name="pedido_id" value="<?php echo $pedido['id']; ?>">

                                                    <button 
                                                        type="submit" 
                                                        class="btn btn-danger rounded-0 py-2 text-uppercase"
                                                        style="letter-spacing: 1px; font-size: 13px;"
                                                    >
                                                        Sim, cancelar pedido
                                                    </button>

                                                    <button 
                                                        type="button" 
                                                        class="btn btn-outline-dark rounded-0 py-2 text-uppercase" 
                                                        data-bs-dismiss="modal"
                                                        style="letter-spacing: 1px; font-size: 13px;"
                                                    >
                                                        Voltar
                                                    </button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php endif; ?>

                        <?php endforeach; ?>

                    <?php endif; ?>

                <?php else: ?>

                    <?php if (empty($propostas)): ?>
                        <div class="empty-box">
                            <i class="bi bi-car-front" style="font-size: 48px; color: #c9933b;"></i>
                            <h4 class="fw-light mt-3">Nenhuma proposta encontrada</h4>
                            <p class="text-muted mb-4">
                                Você ainda não possui propostas de veículos registradas.
                            </p>
                            <a href="modelos.php" class="btn btn-dark rounded-0 px-4 py-2">
                                Ver Modelos
                            </a>
                        </div>
                    <?php else: ?>

                        <?php foreach ($propostas as $proposta): ?>
                            <div class="order-card">
                                <div class="d-flex justify-content-between align-items-start flex-wrap gap-3 mb-3">
                                    <div>
                                        <div class="order-code mb-2">
                                            Proposta #<?php echo str_pad($proposta['id'], 5, '0', STR_PAD_LEFT); ?>
                                        </div>

                                        <h3 class="fw-light mb-1">
                                            <?php echo htmlspecialchars($proposta['modelo']); ?>
                                        </h3>

                                        <p class="text-muted mb-0">
                                            Solicitada em <?php echo formatarData($proposta['criado_em']); ?>
                                        </p>
                                    </div>

                                    <span class="status-badge">
                                        <?php echo htmlspecialchars($proposta['status']); ?>
                                    </span>
                                </div>

                                <hr>

                                <div class="row g-4">
                                    <div class="col-md-4">
                                        <p class="small text-muted text-uppercase mb-1">Cliente</p>
                                        <strong><?php echo htmlspecialchars($proposta['nome']); ?></strong>
                                    </div>

                                    <div class="col-md-4">
                                        <p class="small text-muted text-uppercase mb-1">Contato</p>
                                        <strong><?php echo htmlspecialchars($proposta['telefone'] ?: 'Não informado'); ?></strong>
                                    </div>

                                    <div class="col-md-4">
                                        <p class="small text-muted text-uppercase mb-1">Valor estimado</p>
                                        <strong><?php echo formatarValor($proposta['valor_total']); ?></strong>
                                    </div>
                                </div>

                                <?php if (!empty($proposta['mensagem'])): ?>
                                    <div class="tracking-box">
                                        <p class="small text-muted text-uppercase mb-1">Observações</p>
                                        <p class="mb-0">
                                            <?php echo nl2br(htmlspecialchars($proposta['mensagem'])); ?>
                                        </p>
                                    </div>
                                <?php endif; ?>
                            </div>
                        <?php endforeach; ?>

                    <?php endif; ?>

                <?php endif; ?>

            </div>
        </div>
    </section>
</main>

<?php include 'includes/footer.php'; ?>