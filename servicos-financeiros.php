<?php include 'includes/header.php'; ?>

<style>
    .finance-premium-page {
        background: #f5f5f5;
        min-height: 100vh;
        color: #121212;
    }

    .finance-hero {
        position: relative;
        min-height: 540px;
        display: flex;
        align-items: center;
        color: #fff;
        background:
            linear-gradient(90deg, rgba(0,0,0,0.92), rgba(0,0,0,0.68), rgba(0,0,0,0.20)),
            url('assets/img/hero-finance.png') center/cover;
        border-bottom: 4px solid #c9933b;
    }

    .finance-hero-content {
        max-width: 780px;
    }

    .finance-kicker {
        color: #c9933b;
        text-transform: uppercase;
        letter-spacing: 3px;
        font-size: 13px;
        font-weight: 600;
        margin-bottom: 18px;
    }

    .finance-hero h1 {
        font-size: clamp(2.8rem, 5vw, 5.4rem);
        font-weight: 300;
        margin-bottom: 24px;
        letter-spacing: 1px;
    }

    .finance-hero p {
        color: rgba(255,255,255,0.78);
        line-height: 1.9;
        font-size: 1.05rem;
        max-width: 680px;
    }

    .btn-finance-light {
        display: inline-block;
        background: #fff;
        color: #121212;
        border: 1px solid #fff;
        border-radius: 0;
        padding: 14px 42px;
        text-transform: uppercase;
        letter-spacing: 1.5px;
        font-size: 13px;
        text-decoration: none;
        transition: 0.3s ease;
    }

    .btn-finance-light:hover {
        background: #c9933b;
        border-color: #c9933b;
        color: #fff;
    }

    .finance-section {
        padding: 85px 0;
    }

    .finance-section-title {
        text-align: center;
        margin-bottom: 55px;
    }

    .finance-section-title h6 {
        color: #c9933b;
        text-transform: uppercase;
        letter-spacing: 3px;
        font-size: 13px;
        font-weight: 600;
        margin-bottom: 14px;
    }

    .finance-section-title h2 {
        font-size: clamp(2rem, 4vw, 4rem);
        font-weight: 300;
        color: #121212;
        margin-bottom: 14px;
    }

    .finance-section-title p {
        color: #777;
        max-width: 760px;
        margin: 0 auto;
        line-height: 1.8;
    }

    .finance-feature-grid {
        display: grid;
        grid-template-columns: 1.05fr 0.95fr;
        gap: 35px;
        align-items: stretch;
    }

    .finance-info-card {
        background: #fff;
        border: 1px solid #e8e8e8;
        border-top: 3px solid #121212;
        padding: 45px;
        box-shadow: 0 12px 32px rgba(0,0,0,0.055);
        display: flex;
        flex-direction: column;
        justify-content: center;
    }

    .finance-info-card h3 {
        font-size: clamp(1.8rem, 3vw, 3rem);
        font-weight: 300;
        margin-bottom: 22px;
        color: #121212;
    }

    .finance-info-card p {
        color: #666;
        line-height: 1.85;
        margin-bottom: 26px;
    }

    .finance-list {
        list-style: none;
        padding: 0;
        margin: 0;
    }

    .finance-list li {
        display: flex;
        gap: 14px;
        padding: 14px 0;
        border-bottom: 1px solid #eee;
        color: #555;
        line-height: 1.6;
    }

    .finance-list li:last-child {
        border-bottom: none;
    }

    .finance-list i {
        color: #c9933b;
        font-size: 1.15rem;
        margin-top: 2px;
    }

    .finance-highlight-box {
        background: linear-gradient(135deg, #121212, #1d1d1d);
        color: #fff;
        padding: 45px;
        border-top: 3px solid #c9933b;
        box-shadow: 0 18px 45px rgba(0,0,0,0.12);
        display: flex;
        flex-direction: column;
        justify-content: center;
    }

    .finance-highlight-box h4 {
        font-weight: 300;
        margin-bottom: 18px;
        font-size: 1.8rem;
    }

    .finance-highlight-box p {
        color: rgba(255,255,255,0.72);
        line-height: 1.8;
        margin-bottom: 22px;
    }

    .finance-highlight-box ul {
        list-style: none;
        padding: 0;
        margin: 0;
    }

    .finance-highlight-box ul li {
        padding: 10px 0;
        color: rgba(255,255,255,0.84);
        border-bottom: 1px solid rgba(255,255,255,0.08);
    }

    .finance-highlight-box ul li:last-child {
        border-bottom: none;
    }

    .finance-highlight-box ul li i {
        color: #c9933b;
        margin-right: 10px;
    }

    .finance-solution-card {
        background: #fff;
        border: 1px solid #e8e8e8;
        border-top: 3px solid #121212;
        padding: 32px;
        height: 100%;
        box-shadow: 0 12px 32px rgba(0,0,0,0.055);
        transition: 0.3s ease;
    }

    .finance-solution-card:hover {
        transform: translateY(-6px);
        box-shadow: 0 18px 42px rgba(0,0,0,0.09);
    }

    .finance-solution-card i {
        font-size: 2.4rem;
        color: #c9933b;
        margin-bottom: 20px;
        display: block;
    }

    .finance-solution-card h4 {
        font-weight: 300;
        margin-bottom: 14px;
        color: #121212;
    }

    .finance-solution-card p {
        color: #777;
        line-height: 1.7;
        margin: 0;
        font-size: 14px;
    }

    .finance-dark-band {
        background: #121212;
        color: #fff;
        padding: 85px 0;
    }

    .finance-dark-band h2 {
        font-weight: 300;
        font-size: clamp(2rem, 4vw, 4rem);
        margin-bottom: 22px;
    }

    .finance-dark-band p {
        color: rgba(255,255,255,0.68);
        line-height: 1.85;
        max-width: 760px;
    }

    .finance-step-card {
        background: rgba(255,255,255,0.04);
        border: 1px solid rgba(255,255,255,0.08);
        border-top: 3px solid #c9933b;
        padding: 28px;
        height: 100%;
        transition: 0.3s ease;
    }

    .finance-step-card:hover {
        background: rgba(255,255,255,0.07);
        transform: translateY(-6px);
    }

    .finance-step-number {
        color: #c9933b;
        font-size: 12px;
        letter-spacing: 2px;
        text-transform: uppercase;
        margin-bottom: 16px;
        font-weight: 600;
    }

    .finance-step-card h4 {
        font-weight: 300;
        margin-bottom: 12px;
    }

    .finance-step-card p {
        color: rgba(255,255,255,0.62);
        line-height: 1.7;
        margin: 0;
        font-size: 14px;
    }

    .finance-cta {
        background: linear-gradient(135deg, #c9933b, #8a5d1e);
        color: #fff;
        padding: 75px 0;
        text-align: center;
    }

    .finance-cta h2 {
        font-weight: 300;
        margin-bottom: 18px;
    }

    .finance-cta p {
        color: rgba(255,255,255,0.84);
        max-width: 720px;
        margin: 0 auto 30px;
        line-height: 1.8;
    }

    @media (max-width: 992px) {
        .finance-feature-grid {
            grid-template-columns: 1fr;
        }

        .finance-section {
            padding: 65px 0;
        }
    }

    @media (max-width: 576px) {
        .finance-hero {
            min-height: 440px;
        }

        .finance-info-card,
        .finance-highlight-box {
            padding: 30px;
        }
    }
</style>

<main class="finance-premium-page">
    <section class="finance-hero">
        <div class="container">
            <div class="finance-hero-content">
                <div class="finance-kicker">
                    Aurora Financial Services
                </div>

                <h1>Sua conquista, planejada com excelência.</h1>

                <p>
                    Soluções financeiras sob medida, seguros exclusivos e consórcios flexíveis para você focar apenas no prazer de dirigir, com a sofisticação e a segurança que fazem parte do universo Aurora Motors.
                </p>

                <a href="modelos.php" class="btn-finance-light mt-4">
                    Solicitar Proposta
                </a>
            </div>
        </div>
    </section>

    <section class="finance-section">
        <div class="container">
            <div class="finance-section-title">
                <h6>Soluções Financeiras</h6>
                <h2>Planejamento inteligente para uma experiência premium.</h2>
                <p>
                    Da aquisição ao pós-venda, a Aurora Financial Services oferece alternativas pensadas para diferentes perfis de cliente, sempre com flexibilidade, previsibilidade e alto padrão de atendimento.
                </p>
            </div>

            <div class="finance-feature-grid">
                <div class="finance-info-card">
                    <h3>Opções de Financiamento</h3>

                    <p>
                        Desenhamos planos de financiamento que se adaptam ao seu fluxo de caixa. Com o <strong>Aurora Select</strong>, você define entrada, escolhe parcelas reduzidas e conta com garantia de recompra ao final do contrato.
                    </p>

                    <ul class="finance-list">
                        <li>
                            <i class="bi bi-check2-circle"></i>
                            <span>Aprovação de crédito ágil e simplificada.</span>
                        </li>

                        <li>
                            <i class="bi bi-check2-circle"></i>
                            <span>Taxas customizadas de acordo com o relacionamento do cliente.</span>
                        </li>

                        <li>
                            <i class="bi bi-check2-circle"></i>
                            <span>Inclusão de acessórios, proteção e serviços no contrato.</span>
                        </li>

                        <li>
                            <i class="bi bi-check2-circle"></i>
                            <span>Troca inteligente para evolução do seu próximo Aurora.</span>
                        </li>
                    </ul>
                </div>

                <div class="finance-highlight-box">
                    <h4>Vantagens do Aurora Select</h4>

                    <p>
                        Mais do que financiar um veículo, você estrutura sua jornada com previsibilidade, atendimento consultivo e soluções compatíveis com o padrão premium da marca.
                    </p>

                    <ul>
                        <li><i class="bi bi-gem"></i> Parcelas planejadas conforme seu perfil.</li>
                        <li><i class="bi bi-arrow-repeat"></i> Opção de recompra ao final do ciclo.</li>
                        <li><i class="bi bi-shield-check"></i> Coberturas e proteção integradas.</li>
                        <li><i class="bi bi-briefcase"></i> Condições especiais para pessoa física e frotas.</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <section class="finance-section pt-0">
        <div class="container">
            <div class="row g-4">
                <div class="col-md-4">
                    <div class="finance-solution-card">
                        <i class="bi bi-bank"></i>
                        <h4>Financiamento Premium</h4>
                        <p>
                            Estruturas flexíveis, entrada personalizada e parcelas planejadas para tornar a aquisição do seu Aurora mais estratégica.
                        </p>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="finance-solution-card">
                        <i class="bi bi-shield-check"></i>
                        <h4>Aurora Seguros</h4>
                        <p>
                            Cobertura completa, reparos em rede autorizada, peças genuínas e carro reserva de padrão equivalente ao seu modelo.
                        </p>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="finance-solution-card">
                        <i class="bi bi-pie-chart"></i>
                        <h4>Consórcio Premium</h4>
                        <p>
                            Planejamento de aquisição com isenção de juros, grupos exclusivos e flexibilidade de lances para contemplação.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="finance-dark-band">
        <div class="container">
            <div class="row align-items-center g-5">
                <div class="col-lg-5">
                    <div class="finance-kicker">
                        Jornada financeira
                    </div>

                    <h2>Do planejamento à conquista do seu Aurora.</h2>

                    <p>
                        Nosso processo foi desenhado para simplificar a tomada de decisão, com suporte consultivo e clareza em todas as etapas do relacionamento financeiro.
                    </p>
                </div>

                <div class="col-lg-7">
                    <div class="row g-4">
                        <div class="col-md-6">
                            <div class="finance-step-card">
                                <div class="finance-step-number">Etapa 01</div>
                                <h4>Consultoria</h4>
                                <p>
                                    Entendemos o perfil do cliente e indicamos a solução financeira mais adequada.
                                </p>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="finance-step-card">
                                <div class="finance-step-number">Etapa 02</div>
                                <h4>Simulação</h4>
                                <p>
                                    Apresentamos cenários personalizados com entrada, parcelas e condições compatíveis.
                                </p>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="finance-step-card">
                                <div class="finance-step-number">Etapa 03</div>
                                <h4>Aprovação</h4>
                                <p>
                                    O processo de análise é conduzido com agilidade, transparência e suporte dedicado.
                                </p>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="finance-step-card">
                                <div class="finance-step-number">Etapa 04</div>
                                <h4>Entrega</h4>
                                <p>
                                    Após a formalização, você conclui a jornada com tranquilidade e experiência premium.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="finance-cta">
        <div class="container">
            <h2 class="display-6">
                Pronto para planejar o seu próximo Aurora?
            </h2>

            <p>
                Fale com nossa equipe, simule condições exclusivas e descubra a melhor solução para conquistar seu veículo com inteligência e sofisticação.
            </p>

            <a href="simulacao.php" class="btn-finance-light">
                Simular Agora
            </a>
        </div>
    </section>
</main>

<?php include 'includes/footer.php'; ?>