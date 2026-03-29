<?php include 'includes/header.php'; ?>

<main class="container py-5 cart-page">
    <h1 class="mb-5 text-center fw-light">Seu Carrinho Aurora Motors</h1>

    <div class="row">
        <div class="col-lg-8" id="cartItemsContainer">
        </div>

        <div class="col-lg-4">
            <div class="cart-summary p-4">
                <h3 class="fw-light mb-4">Resumo da Solicitação</h3>
                <div class="d-flex justify-content-between mb-4">
                    <span>Total de Veículos:</span>
                    <strong id="cartTotalItems">0</strong>
                </div>
                
                <button class="btn btn-primary premium-btn w-100" data-bs-toggle="modal" data-bs-target="#propostaModal" id="btnSolicitar">
                    Solicitar Proposta
                </button>
            </div>
        </div>
    </div>
</main>

<div class="modal fade" id="propostaModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content premium-modal">
            <div class="modal-header border-0">
                <h5 class="modal-title text-center w-100">Solicitar Proposta</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="mb-3"><input type="text" class="form-control premium-input" placeholder="Seu Nome Completo"></div>
                    <div class="mb-3"><input type="email" class="form-control premium-input" placeholder="E-mail"></div>
                    <div class="mb-3"><input type="text" class="form-control premium-input" placeholder="Telefone / WhatsApp"></div>
                    <div class="mb-4"><textarea class="form-control premium-input" rows="3" placeholder="Mensagem ou dúvidas adicionais..."></textarea></div>
                    
                    <button type="button" class="btn btn-primary premium-btn w-100 mb-2" data-bs-dismiss="modal" onclick="alert('Proposta enviada com sucesso!')">Enviar Proposta</button>
                    <button type="button" class="btn btn-outline-light w-100" data-bs-dismiss="modal">Solicitar Contato via Telefone</button>
                </form>
            </div>
        </div>
    </div>
</div>

<?php include 'includes/footer.php'; ?>