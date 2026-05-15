<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

require_once 'conexao.php';

$nomeUsuario = $_SESSION['nome_usuario'] ?? '';
$emailUsuario = $_SESSION['email_usuario'] ?? '';

$telefoneUsuario = '';
$cepUsuario = '';
$enderecoUsuario = '';
$numeroUsuario = '';
$complementoUsuario = '';
$bairroUsuario = '';
$cidadeUsuario = '';
$estadoUsuario = '';

if (isset($_SESSION['usuario_id'])) {
    $usuario_id = $_SESSION['usuario_id'];

    $stmtUsuario = $pdo->prepare("
        SELECT telefone, cep, endereco, numero, complemento, bairro, cidade, estado 
        FROM usuarios 
        WHERE id = :id 
        LIMIT 1
    ");
    $stmtUsuario->bindParam(':id', $usuario_id);
    $stmtUsuario->execute();
    $usuario = $stmtUsuario->fetch();

    if ($usuario) {
        $telefoneUsuario = $usuario['telefone'] ?? '';
        $cepUsuario = $usuario['cep'] ?? '';
        $enderecoUsuario = $usuario['endereco'] ?? '';
        $numeroUsuario = $usuario['numero'] ?? '';
        $complementoUsuario = $usuario['complemento'] ?? '';
        $bairroUsuario = $usuario['bairro'] ?? '';
        $cidadeUsuario = $usuario['cidade'] ?? '';
        $estadoUsuario = $usuario['estado'] ?? '';
    }

    try {
        $stmtEnderecoPrincipal = $pdo->prepare("
            SELECT cep, logradouro, numero, complemento, bairro, cidade, estado
            FROM enderecos_usuario
            WHERE usuario_id = :usuario_id
            ORDER BY principal DESC, id DESC
            LIMIT 1
        ");
        $stmtEnderecoPrincipal->bindParam(':usuario_id', $usuario_id);
        $stmtEnderecoPrincipal->execute();
        $enderecoPrincipal = $stmtEnderecoPrincipal->fetch();

        if ($enderecoPrincipal) {
            $cepUsuario = $enderecoPrincipal['cep'] ?? '';
            $enderecoUsuario = $enderecoPrincipal['logradouro'] ?? '';
            $numeroUsuario = $enderecoPrincipal['numero'] ?? '';
            $complementoUsuario = $enderecoPrincipal['complemento'] ?? '';
            $bairroUsuario = $enderecoPrincipal['bairro'] ?? '';
            $cidadeUsuario = $enderecoPrincipal['cidade'] ?? '';
            $estadoUsuario = $enderecoPrincipal['estado'] ?? '';
        }
    } catch (PDOException $e) {
        // Se a tabela enderecos_usuario ainda não existir, o carrinho continua usando os dados antigos da tabela usuarios.
    }
}

include 'includes/header.php';
?>

<style>
    .checkout-grid {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 22px;
    }

    .checkout-box {
        background: #f8f8f8;
        border: 1px solid #e5e5e5;
        padding: 22px;
        border-top: 3px solid #121212;
    }

    .checkout-box h6 {
        text-transform: uppercase;
        letter-spacing: 1.5px;
        font-size: 12px;
        color: #c9933b;
        margin-bottom: 16px;
    }

    .checkout-summary-box {
        background: #121212;
        color: #fff;
        padding: 22px;
        border-top: 3px solid #c9933b;
    }

    .checkout-summary-box p,
    .checkout-summary-box small {
        color: #cfcfcf;
    }

    .checkout-step {
        display: flex;
        align-items: center;
        gap: 12px;
        margin-bottom: 14px;
        color: #666;
        font-size: 14px;
    }

    .checkout-step span {
        width: 28px;
        height: 28px;
        border-radius: 50%;
        background: #121212;
        color: #fff;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        font-size: 12px;
        flex-shrink: 0;
    }

    .checkout-address-grid {
        display: grid;
        grid-template-columns: 1fr 120px;
        gap: 15px;
    }

    .checkout-city-grid {
        display: grid;
        grid-template-columns: 1fr 100px;
        gap: 15px;
    }

    .checkout-input {
        width: 100%;
        border-radius: 0 !important;
        padding: 14px 15px;
        background-color: #e2e2e2 !important;
        border: 1px solid #ddd !important;
        color: #333 !important;
        font-size: 15px;
        box-shadow: none !important;
    }

    .checkout-input:focus {
        outline: none;
        border-color: #c9933b !important;
        background-color: #fff !important;
        box-shadow: none !important;
    }

    .checkout-select {
        appearance: none;
        -webkit-appearance: none;
        -moz-appearance: none;

        width: 100%;
        border-radius: 0 !important;
        padding: 14px 46px 14px 15px;
        background-color: #e2e2e2 !important;
        border: 1px solid #ddd !important;
        color: #333 !important;
        font-size: 15px;
        box-shadow: none !important;
        cursor: pointer;

        background-image: url("data:image/svg+xml,%3Csvg width='14' height='8' viewBox='0 0 14 8' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath d='M1 1L7 7L13 1' stroke='%23121212' stroke-width='1.8' fill='none' stroke-linecap='round' stroke-linejoin='round'/%3E%3C/svg%3E") !important;
        background-repeat: no-repeat !important;
        background-position: right 16px center !important;
        background-size: 14px 8px !important;
    }

    .checkout-select:focus {
        outline: none;
        border-color: #c9933b !important;
        background-color: #fff !important;
        box-shadow: none !important;
    }

    .checkout-input[readonly] {
        cursor: not-allowed;
        color: #555 !important;
    }

    .checkout-label {
        color: #777;
        font-size: 12px;
        text-transform: uppercase;
        letter-spacing: 1px;
        margin-bottom: 8px;
    }

    @media (max-width: 768px) {
        .checkout-grid,
        .checkout-address-grid,
        .checkout-city-grid {
            grid-template-columns: 1fr;
        }
    }
</style>

<main class="container py-5 cart-page">
    <h1 class="mb-3 text-center fw-light">Carrinho Boutique Aurora Motors</h1>

    <p class="text-center text-muted mb-5">
        Confira os produtos selecionados da Boutique Aurora Motors antes de finalizar sua compra.
    </p>

    <?php if (isset($_SESSION['erro_compra'])): ?>
        <div class="alert alert-danger">
            <?php 
                echo $_SESSION['erro_compra']; 
                unset($_SESSION['erro_compra']);
            ?>
        </div>
    <?php endif; ?>

    <div class="row">
        <div class="col-lg-8" id="cartItemsContainer"></div>

        <div class="col-lg-4">
            <div class="cart-summary p-4">
                <h3 class="fw-light mb-4">Resumo da Compra</h3>

                <div class="d-flex justify-content-between mb-3">
                    <span>Total de Produtos:</span>
                    <strong id="cartTotalItems">0</strong>
                </div>

                <div class="d-flex justify-content-between mb-4">
                    <span>Valor Total:</span>
                    <strong id="cartTotalValue">R$ 0,00</strong>
                </div>
                
                <button 
                    class="btn btn-outline-danger w-100 mb-3" 
                    data-bs-toggle="modal" 
                    data-bs-target="#confirmarEsvaziarModal" 
                    style="border-radius: 0; font-size: 13px; letter-spacing: 1px;"
                >
                    <i class="bi bi-trash3 me-2"></i> ESVAZIAR CARRINHO
                </button>

                <button 
                    class="btn btn-primary premium-btn w-100" 
                    data-bs-toggle="modal" 
                    data-bs-target="#checkoutBoutiqueModal" 
                    id="btnFinalizarCompra"
                >
                    Finalizar Compra
                </button>
            </div>
        </div>
    </div>

    <div class="modal fade" id="confirmarEsvaziarModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-sm">
            <div class="modal-content premium-modal text-center">
                <div class="modal-body p-4">
                    <i class="bi bi-exclamation-circle mb-3 d-block" style="font-size: 3rem; color: #dc3545;"></i>
                    <h5 class="fw-light mb-3">ESVAZIAR CARRINHO?</h5>
                    <p class="text-muted small mb-4">
                        Tem certeza que deseja remover todos os produtos da sua lista? Esta ação não pode ser desfeita.
                    </p>

                    <div class="d-grid gap-2">
                        <button type="button" class="btn btn-danger py-2" id="btnConfirmarEsvaziar" style="border-radius: 0; font-size: 13px; letter-spacing: 1px;">
                            SIM, REMOVER TUDO
                        </button>

                        <button type="button" class="btn btn-outline-dark py-2" data-bs-dismiss="modal" style="border-radius: 0; font-size: 13px; letter-spacing: 1px;">
                            CANCELAR
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="confirmarRemoverItemModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-sm">
            <div class="modal-content premium-modal text-center">
                <div class="modal-body p-4">
                    <i class="bi bi-trash3 mb-3 d-block" style="font-size: 2.5rem; color: #dc3545;"></i>
                    <h5 class="fw-light mb-3">REMOVER PRODUTO?</h5>
                    <p class="text-muted small mb-4">
                        Deseja remover este produto da sua lista de compra?
                    </p>

                    <div class="d-grid gap-2">
                        <button type="button" class="btn btn-danger py-2" id="btnConfirmarRemoverItem" style="border-radius: 0; font-size: 13px; letter-spacing: 1px;">
                            REMOVER
                        </button>

                        <button type="button" class="btn btn-outline-dark py-2" data-bs-dismiss="modal" style="border-radius: 0; font-size: 13px; letter-spacing: 1px;">
                            CANCELAR
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="checkoutBoutiqueModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-xl">
            <div class="modal-content premium-modal">
                <div class="modal-header border-0">
                    <h5 class="modal-title text-center w-100 fw-light" style="letter-spacing: 2px;">
                        CHECKOUT AURORA BOUTIQUE
                    </h5>
                    <button type="button" class="btn-close btn-close-black" data-bs-dismiss="modal"></button>
                </div>

                <div class="modal-body p-4">
                    <form action="processa_compra_boutique.php" method="POST" id="formCompraBoutique">
                        <input type="hidden" name="itens_carrinho" id="itensCarrinhoInput">

                        <div class="checkout-grid">
                            <div>
                                <div class="checkout-box mb-4">
                                    <h6>1. Identificação</h6>

                                    <div class="mb-3">
                                        <label class="checkout-label">Nome completo</label>
                                        <input 
                                            type="text" 
                                            name="nome" 
                                            class="checkout-input" 
                                            value="<?php echo htmlspecialchars($nomeUsuario); ?>"
                                            required
                                        >
                                    </div>

                                    <div class="mb-3">
                                        <label class="checkout-label">E-mail</label>
                                        <input 
                                            type="email" 
                                            name="email" 
                                            class="checkout-input" 
                                            value="<?php echo htmlspecialchars($emailUsuario); ?>"
                                            required
                                        >
                                    </div>

                                    <div class="mb-0">
                                        <label class="checkout-label">Telefone / WhatsApp</label>
                                        <input 
                                            type="text" 
                                            name="telefone" 
                                            class="checkout-input" 
                                            placeholder="(11) 99999-9999"
                                            value="<?php echo htmlspecialchars($telefoneUsuario); ?>"
                                            required
                                        >
                                    </div>
                                </div>

                                <div class="checkout-box">
                                    <h6>2. Endereço de entrega</h6>

                                    <div class="mb-3">
                                        <label class="checkout-label">CEP</label>
                                        <input 
                                            type="text" 
                                            name="cep" 
                                            class="checkout-input" 
                                            placeholder="00000-000"
                                            value="<?php echo htmlspecialchars($cepUsuario); ?>"
                                            required
                                        >
                                    </div>

                                    <div class="checkout-address-grid mb-3">
                                        <div>
                                            <label class="checkout-label">Logradouro</label>
                                            <input 
                                                type="text" 
                                                name="logradouro" 
                                                class="checkout-input" 
                                                placeholder="Rua, avenida, travessa..."
                                                value="<?php echo htmlspecialchars($enderecoUsuario); ?>"
                                                required
                                            >
                                        </div>

                                        <div>
                                            <label class="checkout-label">Número</label>
                                            <input 
                                                type="text" 
                                                name="numero" 
                                                class="checkout-input" 
                                                placeholder="123"
                                                value="<?php echo htmlspecialchars($numeroUsuario); ?>"
                                                required
                                            >
                                        </div>
                                    </div>

                                    <div class="mb-3">
                                        <label class="checkout-label">Complemento</label>
                                        <input 
                                            type="text" 
                                            name="complemento" 
                                            class="checkout-input" 
                                            placeholder="Apartamento, bloco, referência..."
                                            value="<?php echo htmlspecialchars($complementoUsuario); ?>"
                                        >
                                    </div>

                                    <div class="mb-3">
                                        <label class="checkout-label">Bairro</label>
                                        <input 
                                            type="text" 
                                            name="bairro" 
                                            class="checkout-input" 
                                            placeholder="Bairro"
                                            value="<?php echo htmlspecialchars($bairroUsuario); ?>"
                                            required
                                        >
                                    </div>

                                    <div class="checkout-city-grid mb-3">
                                        <div>
                                            <label class="checkout-label">Cidade</label>
                                            <input 
                                                type="text" 
                                                name="cidade" 
                                                class="checkout-input" 
                                                placeholder="Cidade"
                                                value="<?php echo htmlspecialchars($cidadeUsuario); ?>"
                                                required
                                            >
                                        </div>

                                        <div>
                                            <label class="checkout-label">Estado</label>
                                            <input 
                                                type="text" 
                                                name="estado" 
                                                maxlength="2"
                                                class="checkout-input" 
                                                placeholder="SP"
                                                value="<?php echo htmlspecialchars($estadoUsuario); ?>"
                                                required
                                            >
                                        </div>
                                    </div>

                                    <div class="mb-0">
                                        <label class="checkout-label">Forma de entrega</label>
                                        <select name="forma_entrega" class="checkout-select" required>
                                            <option value="Entrega padrão - até 7 dias úteis">Entrega padrão - até 7 dias úteis</option>
                                            <option value="Entrega expressa - até 3 dias úteis">Entrega expressa - até 3 dias úteis</option>
                                            <option value="Retirada na concessionária Aurora">Retirada na concessionária Aurora</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div>
                                <div class="checkout-summary-box mb-4">
                                    <h6 class="text-uppercase mb-3" style="color: #c9933b; letter-spacing: 2px;">
                                        Resumo do pedido
                                    </h6>

                                    <div id="resumoCompraBoutique" class="small">
                                        Nenhum produto selecionado.
                                    </div>
                                </div>

                                <div class="checkout-box mb-4">
                                    <h6>3. Acompanhamento</h6>

                                    <div class="checkout-step">
                                        <span>1</span>
                                        Pedido recebido
                                    </div>

                                    <div class="checkout-step">
                                        <span>2</span>
                                        Separação dos produtos
                                    </div>

                                    <div class="checkout-step">
                                        <span>3</span>
                                        Envio com código de rastreio
                                    </div>

                                    <div class="checkout-step mb-0">
                                        <span>4</span>
                                        Entrega concluída
                                    </div>
                                </div>

                                <div class="checkout-box">
                                    <h6>4. Pagamento</h6>

                                    <div class="mb-3">
                                        <label class="checkout-label">Forma de pagamento</label>
                                        <select name="forma_pagamento" class="checkout-select" required>
                                            <option value="Cartão de crédito">Cartão de crédito</option>
                                            <option value="Pix">Pix</option>
                                            <option value="Boleto bancário">Boleto bancário</option>
                                            <option value="Pagamento na concessionária">Pagamento na concessionária</option>
                                        </select>
                                    </div>

                                    <p class="small text-muted mb-4">
                                        Para fins acadêmicos, esta compra será registrada diretamente no banco de dados como pedido recebido.
                                    </p>

                                    <button type="submit" class="btn btn-primary premium-btn w-100 py-3" id="btnConfirmarCompraBoutique">
                                        Confirmar Pedido
                                    </button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
</main>

<?php include 'includes/footer.php'; ?>