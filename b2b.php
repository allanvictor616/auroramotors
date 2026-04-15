<?php include 'includes/header.php'; ?>

<style>
    .b2b-hero {
        padding: 80px 0;
        background-color: #121212;
        color: #fff;
    }
    .b2b-form-box {
        background: #fff;
        padding: 50px;
        box-shadow: 0 10px 30px rgba(0,0,0,0.1);
        margin-top: -80px;
    }
    .form-control-b2b {
        border-radius: 0;
        border: none;
        border-bottom: 1px solid #ccc;
        padding: 10px 0;
        background: transparent;
    }
    .form-control-b2b:focus {
        box-shadow: none;
        border-bottom: 2px solid #121212;
    }
</style>

<main style="background-color: #f4f4f4; padding-bottom: 80px;">
    <section class="b2b-hero">
        <div class="container text-center pb-5">
            <h6 class="text-uppercase mb-3" style="color: #c9933b; letter-spacing: 2px;">Vendas Corporativas</h6>
            <h1 class="display-4 fw-light mb-3">Atendimento Exclusivo para Empresas</h1>
            <p class="text-white-50 mx-auto" style="max-width: 600px;">Condições diferenciadas de fábrica, blindagem certificada e gestão de frota premium para executivos e diretoria.</p>
        </div>
    </section>

    <section class="container">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <div class="b2b-form-box row">
                    <div class="col-md-5 pe-lg-5 mb-5 mb-md-0 border-end d-none d-md-block">
                        <h4 class="fw-light mb-4">Por que escolher a Aurora para sua frota?</h4>
                        <ul class="list-unstyled text-muted" style="line-height: 2;">
                            <li class="mb-3"><i class="bi bi-briefcase me-2 fs-5 text-dark"></i> Consultoria de blindagem homologada pela fábrica.</li>
                            <li class="mb-3"><i class="bi bi-geo-alt me-2 fs-5 text-dark"></i> Serviço de Leva e Traz VIP para revisões.</li>
                            <li class="mb-3"><i class="bi bi-lightning-charge me-2 fs-5 text-dark"></i> Infraestrutura de recarga para frotas eletrificadas.</li>
                            <li><i class="bi bi-percent me-2 fs-5 text-dark"></i> Faturamento direto com isenções (CNPJ/Produtor Rural).</li>
                        </ul>
                    </div>
                    
                    <div class="col-md-7 ps-lg-5">
                        <h4 class="fw-light mb-4">Fale com um Consultor</h4>
                        <form>
                            <div class="mb-4">
                                <label class="text-muted small text-uppercase mb-1">Razão Social / Nome da Empresa</label>
                                <input type="text" class="form-control-b2b w-100" required>
                            </div>
                            <div class="row g-4 mb-4">
                                <div class="col-md-6">
                                    <label class="text-muted small text-uppercase mb-1">CNPJ</label>
                                    <input type="text" class="form-control-b2b w-100" required>
                                </div>
                                <div class="col-md-6">
                                    <label class="text-muted small text-uppercase mb-1">Tamanho da Frota Atual</label>
                                    <select class="form-control-b2b w-100">
                                        <option>1 a 5 veículos</option>
                                        <option>6 a 10 veículos</option>
                                        <option>11 à 20 veículos</option>
                                        <option>Acima de 20 veículos</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row g-4 mb-4">
                                <div class="col-md-6">
                                    <label class="text-muted small text-uppercase mb-1">Nome do Contato</label>
                                    <input type="text" class="form-control-b2b w-100" required>
                                </div>
                                <div class="col-md-6">
                                    <label class="text-muted small text-uppercase mb-1">Telefone Corporativo</label>
                                    <input type="text" class="form-control-b2b w-100" required>
                                </div>
                            </div>
                            <div class="mb-5">
                                <label class="text-muted small text-uppercase mb-1">E-mail Corporativo</label>
                                <input type="email" class="form-control-b2b w-100" required>
                            </div>
                            
                            <button type="button" class="btn btn-outline-dark w-100 py-3 text-uppercase" style="letter-spacing: 1px; border-width: 2px;">Solicitar Contato B2B</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>

<?php include 'includes/footer.php'; ?>