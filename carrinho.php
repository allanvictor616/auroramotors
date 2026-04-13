<?php include 'includes/header.php'; ?>

<main class="container py-5 cart-page">
    <h1 class="mb-5 text-center fw-light">Seu Carrinho Aurora Motors</h1>

    <div class="row">
        <div class="col-lg-8" id="cartItemsContainer"></div>

        <div class="col-lg-4">
            <div class="cart-summary p-4">
                <h3 class="fw-light mb-4">Resumo da Solicitação</h3>
                <div class="d-flex justify-content-between mb-4">
                    <span>Total de Veículos:</span>
                    <strong id="cartTotalItems">0</strong>
                </div>
                
                <button class="btn btn-outline-danger w-100 mb-3" data-bs-toggle="modal" data-bs-target="#confirmarEsvaziarModal" style="border-radius: 0; font-size: 13px; letter-spacing: 1px;">
                    <i class="bi bi-trash3 me-2"></i> ESVAZIAR CARRINHO
                </button>

                <button class="btn btn-primary premium-btn w-100" data-bs-toggle="modal" data-bs-target="#propostaModal" id="btnSolicitar">
                    Solicitar Proposta
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
                    <p class="text-muted small mb-4">Tem certeza que deseja remover todos os veículos da sua lista? Esta ação não pode ser desfeita.</p>
                    <div class="d-grid gap-2">
                        <button type="button" class="btn btn-danger py-2" id="btnConfirmarEsvaziar" style="border-radius: 0; font-size: 13px; letter-spacing: 1px;">SIM, REMOVER TUDO</button>
                        <button type="button" class="btn btn-outline-dark py-2" data-bs-dismiss="modal" style="border-radius: 0; font-size: 13px; letter-spacing: 1px;">CANCELAR</button>
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
                    <h5 class="fw-light mb-3">REMOVER VEÍCULO?</h5>
                    <p class="text-muted small mb-4">Deseja remover este modelo da sua lista de interesse?</p>
                    <div class="d-grid gap-2">
                        <button type="button" class="btn btn-danger py-2" id="btnConfirmarRemoverItem" style="border-radius: 0; font-size: 13px; letter-spacing: 1px;">REMOVER</button>
                        <button type="button" class="btn btn-outline-dark py-2" data-bs-dismiss="modal" style="border-radius: 0; font-size: 13px; letter-spacing: 1px;">CANCELAR</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="propostaModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content premium-modal">
                <div class="modal-header border-0">
                    <h5 class="modal-title text-center w-100 fw-light" style="letter-spacing: 2px;">SOLICITAR PROPOSTA</h5>
                    <button type="button" class="btn-close btn-close-black" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body p-4">
                    <div id="formContent">
                        <p class="text-center mb-4" style="font-size: 0.9rem; color: #888;">Complete seus dados para receber um atendimento personalizado.</p>
                        <form id="propostaForm">
                            <div class="mb-3">
                                <input type="text" class="form-control premium-input" placeholder="NOME COMPLETO" required>
                            </div>
                            <div class="mb-3">
                                <input type="email" class="form-control premium-input" placeholder="E-MAIL" required>
                            </div>
                            <div class="mb-3">
                                <input type="text" class="form-control premium-input" placeholder="TELEFONE / WHATSAPP" required>
                            </div>
                            <div class="mb-4">
                                <textarea class="form-control premium-input" rows="3" placeholder="MENSAGEM (OPCIONAL)"></textarea>
                            </div>
                            <button type="submit" class="btn btn-primary premium-btn w-100 mb-2">SOLICITAR PROPOSTA</button>
                        </form>
                    </div>

                    <div id="successMessage" class="text-center py-4 d-none">
                        <i class="bi bi-check2-circle" style="font-size: 4rem; color: #c9933b;"></i>
                        <h4 class="mt-3 fw-light">SOLICITAÇÃO ENVIADA</h4>
                        <p style="color: #888;">Um consultor Aurora entrará em contato em até 24 horas.</p>
                        <button type="button" class="btn btn-primary premium-btn w-100 mb-2" data-bs-dismiss="modal">FECHAR</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

</main>

<?php include 'includes/footer.php'; ?>