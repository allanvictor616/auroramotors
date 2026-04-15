<?php include 'includes/header.php'; ?>

<style>
    .charge-hero {
        background-color: #121212;
        color: #fff;
        padding: 100px 0;
    }
    .wallbox-feature {
        padding: 30px;
        background: #fafafa;
        border: 1px solid #eee;
    }
</style>

<main>
    <section class="charge-hero text-center">
        <div class="container">
            <h6 class="text-uppercase mb-3" style="color: #c9933b; letter-spacing: 2px;">Ecossistema Aurora</h6>
            <h1 class="display-5 fw-light mb-3">Sua Garagem, Seu Posto de Combustível.</h1>
            <p class="text-white-50 mx-auto" style="max-width: 650px;">Acordar todos os dias com a bateria 100% carregada. A infraestrutura de carregamento residencial da Aurora foi desenhada para se integrar perfeitamente à sua casa inteligente.</p>
        </div>
    </section>

    <section class="container py-5 my-4">
        <div class="row align-items-center flex-row-reverse mb-5">
            <div class="col-lg-6 ps-lg-5 mb-4 mb-lg-0">
                <h2 class="fw-light mb-4">Aurora Wallbox Premium</h2>
                <p class="text-muted mb-4" style="line-height: 1.8;">Design elegante e tecnologia de ponta. O nosso Wallbox proporciona um carregamento até 6x mais rápido que as tomadas convencionais.</p>
                <ul class="list-unstyled text-muted" style="line-height: 2;">
                    <li><i class="bi bi-check2 text-dark me-2"></i> Design minimalista e resistente a intempéries.</li>
                    <li><i class="bi bi-check2 text-dark me-2"></i> Controle e monitoramento via Aurora App.</li>
                    <li><i class="bi bi-check2 text-dark me-2"></i> Instalação certificada por técnicos homologados.</li>
                    <li><i class="bi bi-check2 text-dark me-2"></i> Integração com painéis solares residenciais.</li>
                </ul>
                <button class="btn btn-dark px-4 py-2 mt-3 rounded-0 text-uppercase" style="letter-spacing: 1px;" data-bs-toggle="modal" data-bs-target="#instalacaoModal">Solicitar Instalação</button>
            </div>
            <div class="col-lg-6">
                <div class="bg-light d-flex align-items-center justify-content-center" style="height: 450px; border: 1px solid #eee;">
                    <img src="assets/img/wallbox-premium.png" alt="Aurora Wallbox" class="img-fluid" style="max-height: 100%; object-fit: contain;">
                </div>
            </div>
        </div>
    </section>

    <section class="bg-light py-5">
        <div class="container text-center">
            <h3 class="fw-light mb-4">Recarga Pública Descomplicada</h3>
            <p class="text-muted mx-auto mb-4" style="max-width: 700px;">Proprietários Aurora possuem acesso exclusivo à rede de recarga ultra-rápida em rodovias e shoppings parceiros, com faturamento simplificado direto no aplicativo do veículo.</p>
            <a href="#" class="text-decoration-none fw-bold" style="color: #c9933b; text-transform: uppercase; font-size: 14px;" data-bs-toggle="modal" data-bs-target="#mapaModal">Ver Locais Premium <i class="bi bi-arrow-right ms-1"></i></a>
        </div>
    </section>

    <div class="modal fade" id="instalacaoModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content" style="background-color: #121212 !important; border: 1px solid #444; border-radius: 0;">
                <div class="modal-header border-0">
                    <h5 class="modal-title text-center w-100 fw-light" style="letter-spacing: 2px; color: #fff;">SOLICITAR INSTALAÇÃO WALLBOX</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body p-4">
                    <p class="text-center mb-4" style="font-size: 0.9rem; color: #aaa;">Nossa equipe técnica entrará em contato para agendar a visita de viabilidade e instalação.</p>
                    <form>
                        <div class="mb-3">
                            <label class="small text-uppercase mb-1" style="letter-spacing: 1px; color: #888;">Nome Completo</label>
                            <input type="text" class="form-control rounded-0" style="background-color: #1a1a1a; border: 1px solid #333; color: #fff;" required>
                        </div>
                        <div class="row g-3 mb-3">
                            <div class="col-md-6">
                                <label class="small text-uppercase mb-1" style="letter-spacing: 1px; color: #888;">Telefone</label>
                                <input type="text" class="form-control rounded-0" style="background-color: #1a1a1a; border: 1px solid #333; color: #fff;" required>
                            </div>
                            <div class="col-md-6">
                                <label class="small text-uppercase mb-1" style="letter-spacing: 1px; color: #888;">Tipo de Residência</label>
                                <select class="form-control rounded-0" style="background-color: #1a1a1a; border: 1px solid #333; color: #fff; appearance: auto;">
                                    <option value="casa">Casa</option>
                                    <option value="predio">Prédio / Condomínio</option>
                                    <option value="empresa">Empresa</option>
                                </select>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="small text-uppercase mb-1" style="letter-spacing: 1px; color: #888;">CEP da Instalação</label>
                            <input type="text" class="form-control rounded-0" style="background-color: #1a1a1a; border: 1px solid #333; color: #fff;" required>
                        </div>
                        <div class="mb-4">
                            <label class="small text-uppercase mb-1" style="letter-spacing: 1px; color: #888;">Mensagem Adicional (Opcional)</label>
                            <textarea class="form-control rounded-0" style="background-color: #1a1a1a; border: 1px solid #333; color: #fff;" rows="2"></textarea>
                        </div>
                        <button type="button" class="btn w-100 py-3 rounded-0 text-uppercase mt-2" style="background-color: #c9933b; color: #fff; border: none; letter-spacing: 1px;" data-bs-dismiss="modal" onclick="alert('Pedido de instalação enviado! Nossos técnicos entrarão em contato em até 24h.')">
                            Solicitar Orçamento de Instalação
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="mapaModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content" style="background-color: #121212 !important; border: 1px solid #444; border-radius: 0;">
                <div class="modal-header border-0 pb-0">
                    <h5 class="modal-title w-100 fw-light" style="letter-spacing: 2px; color: #fff;">REDE AURORA SUPERCHARGE</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body p-4 pt-3">
                    <p class="mb-4" style="font-size: 0.9rem; color: #aaa;">Estações de recarga ultra-rápida exclusivas para proprietários Aurora em pontos estratégicos de São Paulo.</p>
                    
                    <div class="row g-4">
                        <div class="col-md-6">
                            <h6 class="text-uppercase mb-3" style="color: #c9933b; letter-spacing: 1px; font-size: 12px;">Shoppings Premium (Capital)</h6>
                            <ul class="list-unstyled mb-4" style="color: #fff; font-size: 14px; line-height: 1.8;">
                                <li class="mb-2"><i class="bi bi-geo-alt me-2" style="color: #c9933b;"></i> <strong>JK Iguatemi</strong> - Vila Olímpia (4 Vagas)</li>
                                <li class="mb-2"><i class="bi bi-geo-alt me-2" style="color: #c9933b;"></i> <strong>Shopping Cidade Jardim</strong> - Morumbi (6 Vagas)</li>
                                <li class="mb-2"><i class="bi bi-geo-alt me-2" style="color: #c9933b;"></i> <strong>Shops Jardins</strong> - Jardins (2 Vagas)</li>
                                <li><i class="bi bi-geo-alt me-2" style="color: #c9933b;"></i> <strong>Iguatemi São Paulo</strong> - Faria Lima (4 Vagas)</li>
                            </ul>

                            <h6 class="text-uppercase mb-3" style="color: #c9933b; letter-spacing: 1px; font-size: 12px;">Rodovias (Rotas de Fuga)</h6>
                            <ul class="list-unstyled mb-0" style="color: #fff; font-size: 14px; line-height: 1.8;">
                                <li class="mb-2"><i class="bi bi-signpost-split me-2" style="color: #c9933b;"></i> <strong>Rod. Castello Branco (Km 28)</strong> - Sentido Interior</li>
                                <li><i class="bi bi-signpost-split me-2" style="color: #c9933b;"></i> <strong>Rod. dos Bandeirantes (Km 56)</strong> - Sentido Capital</li>
                            </ul>
                        </div>

                        <div class="col-md-6">
                            <div class="w-100 h-100 d-flex align-items-center justify-content-center flex-column" style="background-color: #1a1a1a; border: 1px solid #333; min-height: 250px;">
                                <i class="bi bi-map text-white-50 mb-3" style="font-size: 3rem;"></i>
                                <span class="text-uppercase text-white-50" style="font-size: 12px; letter-spacing: 2px;">Navegação via GPS do Veículo</span>
                                <span class="text-muted mt-2 text-center px-3" style="font-size: 11px;">A rota detalhada é enviada diretamente para o painel do seu Aurora.</span>
                            </div>
                        </div>
                    </div>

                    <div class="mt-4 pt-3 border-top" style="border-color: #333 !important;">
                        <button type="button" class="btn w-100 py-3 rounded-0 text-uppercase" style="background-color: #222; color: #fff; border: 1px solid #444; letter-spacing: 1px;" data-bs-dismiss="modal">
                            Fechar Relatório de Rotas
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

<?php include 'includes/footer.php'; ?>