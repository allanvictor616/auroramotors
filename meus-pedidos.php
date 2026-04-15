<?php
// TRAVA DE SEGURANÇA: Inicia a sessão e verifica se está logado
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Se não estiver logado, redireciona para a home
if (!isset($_SESSION['logado']) || $_SESSION['logado'] !== true) {
    header("Location: index.php");
    exit;
}

include 'includes/header.php'; 
?>

<style>
    body { background-color: #f8f9fa; }
    
    .account-hero {
        background-color: #121212;
        color: #fff;
        padding: 60px 0 40px;
    }
    
    .account-sidebar {
        background: #fff;
        border: 1px solid #eaeaea;
        padding: 30px 0;
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
    
    .account-link:hover, .account-link.active {
        color: #c9933b;
        background-color: #fafafa;
        border-left-color: #c9933b;
        font-weight: 500;
    }

    .order-card {
        background: #fff;
        border: 1px solid #eaeaea;
        margin-bottom: 20px;
        transition: 0.3s;
    }

    .order-card:hover {
        border-color: #c9933b;
        box-shadow: 0 10px 20px rgba(0,0,0,0.05);
    }

    .order-header {
        padding: 15px 25px;
        background-color: #fafafa;
        border-bottom: 1px solid #eee;
        display: flex;
        justify-content: space-between;
        align-items: center;
        font-size: 13px;
    }

    .order-body {
        padding: 25px;
    }

    .status-pill {
        padding: 5px 15px;
        border-radius: 0;
        text-transform: uppercase;
        font-size: 10px;
        letter-spacing: 1px;
        font-weight: bold;
    }

    .status-processing { background-color: #e3f2fd; color: #1976d2; }
    .status-delivered { background-color: #e8f5e9; color: #2e7d32; }
</style>

<main>
    <section class="account-hero">
        <div class="container">
            <div class="d-flex align-items-center gap-4">
                <div class="bg-dark d-flex justify-content-center align-items-center" style="width: 80px; height: 80px; border-radius: 50%; border: 2px solid #c9933b;">
                    <i class="bi bi-box-seam text-white" style="font-size: 2.2rem;"></i>
                </div>
                <div>
                    <h6 class="text-uppercase mb-1" style="color: #c9933b; letter-spacing: 2px;">Gestão de Reservas</h6>
                    <h2 class="fw-light mb-0">Seus Pedidos</h2>
                </div>
            </div>
        </div>
    </section>

    <section class="container py-5 my-3">
        <div class="row">
            <div class="col-lg-3 mb-5 mb-lg-0">
                <div class="account-sidebar shadow-sm">
                    <a href="minha-conta.php" class="account-link"><i class="bi bi-person me-3 fs-5"></i> Meu Perfil</a>
                    <a href="meus-pedidos.php" class="account-link active"><i class="bi bi-box-seam me-3 fs-5"></i> Meus Pedidos</a>
                    
                    <a href="meus-veiculos.php" class="account-link"><i class="bi bi-car-front me-3 fs-5"></i> Meus Veículos</a>
                    <a href="agendamentos.php" class="account-link"><i class="bi bi-calendar-check me-3 fs-5"></i> Agendamentos</a>
                    <a href="seguranca.php" class="account-link"><i class="bi bi-shield-lock me-3 fs-5"></i> Segurança</a>
                    
                    <hr class="mx-4 my-3 text-muted">
                    <a href="logout.php" class="account-link text-danger"><i class="bi bi-box-arrow-right me-3 fs-5"></i> Sair da Conta</a>
                </div>
            </div>

            <div class="col-lg-9">
                
                <div class="order-card shadow-sm">
                    <div class="order-header">
                        <div class="d-flex gap-4">
                            <div>
                                <span class="text-muted text-uppercase d-block" style="font-size: 10px;">Data do Pedido</span>
                                <strong>12 de Abril, 2026</strong>
                            </div>
                            <div>
                                <span class="text-muted text-uppercase d-block" style="font-size: 10px;">Total</span>
                                <strong>R$ 549.900,00</strong>
                            </div>
                            <div>
                                <span class="text-muted text-uppercase d-block" style="font-size: 10px;">ID do Pedido</span>
                                <strong>#AUR-88291</strong>
                            </div>
                        </div>
                        <a href="#" class="text-dark text-decoration-none fw-bold" style="font-size: 12px; text-transform: uppercase;" data-bs-toggle="modal" data-bs-target="#modalPedidoCarro">Detalhes <i class="bi bi-chevron-right ms-1"></i></a>
                    </div>
                    <div class="order-body">
                        <div class="row align-items-center">
                            <div class="col-md-2 mb-3 mb-md-0">
                                <img src="assets/img/Vanguard M-Line.png" class="img-fluid border" alt="Veículo">
                            </div>
                            <div class="col-md-7">
                                <span class="status-pill status-processing mb-2 d-inline-block">Aguardando Faturamento</span>
                                <h5 class="fw-light mb-1">Aurora Vanguard M-Line</h5>
                                <p class="text-muted small mb-0">Híbrido Plug-in • Cinza Escandinavo • Interior Couro Nappa</p>
                            </div>
                            <div class="col-md-3 text-md-end">
                                <button class="btn btn-dark btn-sm rounded-0 w-100 text-uppercase" style="letter-spacing: 1px;">Acompanhar Entrega</button>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="order-card shadow-sm">
                    <div class="order-header">
                        <div class="d-flex gap-4">
                            <div>
                                <span class="text-muted text-uppercase d-block" style="font-size: 10px;">Data do Pedido</span>
                                <strong>05 de Março, 2026</strong>
                            </div>
                            <div>
                                <span class="text-muted text-uppercase d-block" style="font-size: 10px;">Total</span>
                                <strong>R$ 8.450,00</strong>
                            </div>
                            <div>
                                <span class="text-muted text-uppercase d-block" style="font-size: 10px;">ID do Pedido</span>
                                <strong>#AUR-77102</strong>
                            </div>
                        </div>
                        <a href="#" class="text-dark text-decoration-none fw-bold" style="font-size: 12px; text-transform: uppercase;" data-bs-toggle="modal" data-bs-target="#modalPedidoWallbox">Detalhes <i class="bi bi-chevron-right ms-1"></i></a>
                    </div>
                    <div class="order-body">
                        <div class="row align-items-center">
                            <div class="col-md-2 mb-3 mb-md-0">
                                <img src="assets/img/wallbox-premium.png" class="img-fluid border" alt="Acessório">
                            </div>
                            <div class="col-md-7">
                                <span class="status-pill status-delivered mb-2 d-inline-block">Entregue e Instalado</span>
                                <h5 class="fw-light mb-1">Aurora Wallbox Premium 22kW</h5>
                                <p class="text-muted small mb-0">Acessório Original • Inclui Instalação Homologada</p>
                            </div>
                            <div class="col-md-3 text-md-end">
                                <button class="btn btn-outline-dark btn-sm rounded-0 w-100 text-uppercase" style="letter-spacing: 1px;">Pedir Suporte</button>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
    
    <div class="modal fade" id="modalPedidoCarro" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content rounded-0 border-0 shadow-lg">
                <div class="modal-header bg-dark text-white rounded-0 border-0 padding-4">
                    <h5 class="modal-title fw-light text-uppercase" style="letter-spacing: 2px;">Resumo do Contrato #AUR-88291</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body p-5 bg-white">
                    <div class="row border-bottom pb-4 mb-4">
                        <div class="col-md-6">
                            <p class="text-muted small text-uppercase mb-1">Veículo Configurado</p>
                            <h4 class="fw-light mb-0">Aurora Vanguard M-Line</h4>
                            <span class="badge bg-primary text-white mt-2 rounded-0 small">AGUARDANDO FATURAMENTO</span>
                        </div>
                        <div class="col-md-6 text-md-end mt-3 mt-md-0">
                            <p class="text-muted small text-uppercase mb-1">Previsão de Faturamento</p>
                            <h5 class="fw-light mb-0">28 de Abril, 2026</h5>
                        </div>
                    </div>
                    
                    <h6 class="text-uppercase fw-bold small text-muted mb-3" style="letter-spacing: 1px;">Especificações do Pedido</h6>
                    <ul class="list-unstyled mb-5" style="font-size: 14px; line-height: 2;">
                        <li class="d-flex justify-content-between border-bottom py-2"><span>Motorização</span> <span>Híbrido Plug-in (PHEV)</span></li>
                        <li class="d-flex justify-content-between border-bottom py-2"><span>Cor Externa</span> <span>Cinza Escandinavo (+ R$ 5.000)</span></li>
                        <li class="d-flex justify-content-between border-bottom py-2"><span>Acabamento Interno</span> <span>Couro Nappa Preto/Dourado</span></li>
                        <li class="d-flex justify-content-between border-bottom py-2"><span>Rodas</span> <span>Aro 21" Forjadas Dark Matrix</span></li>
                        <li class="d-flex justify-content-between border-bottom py-2"><span>Pacote Adicional</span> <span>Autopilot Nível 3 (+ R$ 25.000)</span></li>
                    </ul>

                    <div class="bg-light p-4 border text-end">
                        <p class="text-muted small text-uppercase mb-1">Valor Total (BRL)</p>
                        <h3 class="fw-light mb-0" style="color: #c9933b;">R$ 549.900,00</h3>
                        <p class="small text-muted mt-2 mb-0">Sinal de R$ 50.000,00 pago via PIX.</p>
                    </div>
                </div>
                <div class="modal-footer border-0 p-4 bg-white">
                    <button type="button" class="btn btn-outline-dark rounded-0 px-4 text-uppercase" data-bs-dismiss="modal">Fechar</button>
                    <button type="button" class="btn btn-dark rounded-0 px-4 text-uppercase"><i class="bi bi-file-earmark-pdf me-2"></i> Baixar Contrato</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="modalPedidoWallbox" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content rounded-0 border-0 shadow-lg">
                <div class="modal-header bg-dark text-white rounded-0 border-0 padding-4">
                    <h5 class="modal-title fw-light text-uppercase" style="letter-spacing: 2px;">Recibo de Compra #AUR-77102</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body p-5 bg-white">
                    <div class="row border-bottom pb-4 mb-4">
                        <div class="col-md-6">
                            <p class="text-muted small text-uppercase mb-1">Item Comprado</p>
                            <h4 class="fw-light mb-0">Aurora Wallbox Premium 22kW</h4>
                            <span class="badge bg-success text-white mt-2 rounded-0 small">ENTREGUE E INSTALADO</span>
                        </div>
                        <div class="col-md-6 text-md-end mt-3 mt-md-0">
                            <p class="text-muted small text-uppercase mb-1">Data da Instalação</p>
                            <h5 class="fw-light mb-0">15 de Janeiro, 2026</h5>
                        </div>
                    </div>
                    
                    <h6 class="text-uppercase fw-bold small text-muted mb-3" style="letter-spacing: 1px;">Detalhes do Serviço</h6>
                    <ul class="list-unstyled mb-5" style="font-size: 14px; line-height: 2;">
                        <li class="d-flex justify-content-between border-bottom py-2"><span>Garantia</span> <span>Ativa (Até Jan/2028)</span></li>
                        <li class="d-flex justify-content-between border-bottom py-2"><span>Técnico Responsável</span> <span>CREA-SP 123456/D</span></li>
                        <li class="d-flex justify-content-between border-bottom py-2"><span>Endereço de Instalação</span> <span>Av. Faria Lima, 3000 - São Paulo/SP</span></li>
                    </ul>

                    <div class="bg-light p-4 border text-end">
                        <p class="text-muted small text-uppercase mb-1">Valor Total Pago (BRL)</p>
                        <h3 class="fw-light mb-0" style="color: #c9933b;">R$ 8.450,00</h3>
                        <p class="small text-muted mt-2 mb-0">Aprovado via Cartão de Crédito final 4521.</p>
                    </div>
                </div>
                <div class="modal-footer border-0 p-4 bg-white">
                    <button type="button" class="btn btn-outline-dark rounded-0 px-4 text-uppercase" data-bs-dismiss="modal">Fechar Relatório</button>
                    <button type="button" class="btn btn-dark rounded-0 px-4 text-uppercase"><i class="bi bi-receipt me-2"></i> Segunda Via NF-e</button>
                </div>
            </div>
        </div>
    </div>
</main>

<?php include 'includes/footer.php'; ?>