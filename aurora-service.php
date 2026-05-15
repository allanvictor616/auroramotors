<?php include 'includes/header.php'; ?>

<style>
    .aurora-service-page {
        background: #f5f5f5;
        min-height: 100vh;
        color: #121212;
    }

    .service-premium-hero {
        position: relative;
        min-height: 520px;
        display: flex;
        align-items: center;
        color: #fff;
        background:
            linear-gradient(90deg, rgba(0,0,0,0.92), rgba(0,0,0,0.68), rgba(0,0,0,0.22)),
            url('assets/img/workshop-premium.png') center/cover;
        border-bottom: 4px solid #c9933b;
    }

    .service-hero-content {
        max-width: 760px;
    }

    .service-kicker {
        color: #c9933b;
        text-transform: uppercase;
        letter-spacing: 3px;
        font-size: 13px;
        font-weight: 600;
        margin-bottom: 18px;
    }

    .service-premium-hero h1 {
        font-size: clamp(2.8rem, 5vw, 5.5rem);
        font-weight: 300;
        margin-bottom: 24px;
        letter-spacing: 1px;
    }

    .service-premium-hero p {
        color: rgba(255,255,255,0.75);
        line-height: 1.9;
        font-size: 1.05rem;
        max-width: 700px;
    }

    .btn-service-light {
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

    .btn-service-light:hover {
        background: #c9933b;
        border-color: #c9933b;
        color: #fff;
    }

    .service-section {
        padding: 85px 0;
    }

    .service-section-title {
        text-align: center;
        margin-bottom: 55px;
    }

    .service-section-title h6 {
        color: #c9933b;
        text-transform: uppercase;
        letter-spacing: 3px;
        font-size: 13px;
        font-weight: 600;
        margin-bottom: 14px;
    }

    .service-section-title h2 {
        font-size: clamp(2rem, 4vw, 4rem);
        font-weight: 300;
        color: #121212;
        margin-bottom: 14px;
    }

    .service-section-title p {
        color: #777;
        max-width: 780px;
        margin: 0 auto;
        line-height: 1.8;
    }

    .service-feature-grid {
        display: grid;
        grid-template-columns: 1.05fr 0.95fr;
        gap: 35px;
        align-items: stretch;
    }

    .service-image-box {
        min-height: 460px;
        background: #121212;
        border-bottom: 4px solid #c9933b;
        overflow: hidden;
        box-shadow: 0 18px 45px rgba(0,0,0,0.12);
    }

    .service-image-box img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        opacity: 0.9;
        transition: 0.4s ease;
    }

    .service-image-box:hover img {
        transform: scale(1.04);
        opacity: 1;
    }

    .service-info-card {
        background: #fff;
        border: 1px solid #e8e8e8;
        border-top: 3px solid #121212;
        padding: 45px;
        box-shadow: 0 12px 32px rgba(0,0,0,0.055);
        display: flex;
        flex-direction: column;
        justify-content: center;
    }

    .service-info-card h3 {
        font-size: clamp(1.8rem, 3vw, 3rem);
        font-weight: 300;
        margin-bottom: 22px;
        color: #121212;
    }

    .service-info-card p {
        color: #666;
        line-height: 1.85;
        margin-bottom: 28px;
    }

    .service-list {
        list-style: none;
        padding: 0;
        margin: 0 0 30px;
    }

    .service-list li {
        display: flex;
        gap: 14px;
        padding: 14px 0;
        border-bottom: 1px solid #eee;
        color: #555;
        line-height: 1.6;
    }

    .service-list li:last-child {
        border-bottom: none;
    }

    .service-list i {
        color: #c9933b;
        font-size: 1.2rem;
        margin-top: 2px;
    }

    .service-benefit-card {
        background: #fff;
        border: 1px solid #e8e8e8;
        border-top: 3px solid #121212;
        padding: 32px;
        height: 100%;
        box-shadow: 0 12px 32px rgba(0,0,0,0.055);
        transition: 0.3s ease;
    }

    .service-benefit-card:hover {
        transform: translateY(-6px);
        box-shadow: 0 18px 42px rgba(0,0,0,0.09);
    }

    .service-benefit-card i {
        font-size: 2.4rem;
        color: #c9933b;
        margin-bottom: 20px;
        display: block;
    }

    .service-benefit-card h4 {
        font-weight: 300;
        margin-bottom: 14px;
        color: #121212;
    }

    .service-benefit-card p {
        color: #777;
        line-height: 1.7;
        margin: 0;
        font-size: 14px;
    }

    .service-dark-band {
        background: #121212;
        color: #fff;
        padding: 85px 0;
    }

    .service-dark-band h2 {
        font-weight: 300;
        font-size: clamp(2rem, 4vw, 4rem);
        margin-bottom: 22px;
    }

    .service-dark-band p {
        color: rgba(255,255,255,0.68);
        line-height: 1.85;
        max-width: 760px;
    }

    .loyalty-card {
        background: rgba(255,255,255,0.04);
        border: 1px solid rgba(255,255,255,0.08);
        border-top: 3px solid #c9933b;
        padding: 32px;
        height: 100%;
        transition: 0.3s ease;
    }

    .loyalty-card:hover {
        background: rgba(255,255,255,0.07);
        transform: translateY(-6px);
    }

    .loyalty-card i {
        font-size: 2.4rem;
        color: #c9933b;
        margin-bottom: 20px;
        display: block;
    }

    .loyalty-card h4 {
        font-weight: 300;
        margin-bottom: 14px;
    }

    .loyalty-card p {
        color: rgba(255,255,255,0.62);
        line-height: 1.7;
        margin: 0;
        font-size: 14px;
    }

    .service-process-card {
        background: #fff;
        border: 1px solid #e8e8e8;
        border-top: 3px solid #121212;
        padding: 30px;
        height: 100%;
        box-shadow: 0 12px 32px rgba(0,0,0,0.055);
    }

    .service-process-number {
        color: #c9933b;
        text-transform: uppercase;
        letter-spacing: 2px;
        font-size: 12px;
        margin-bottom: 16px;
        font-weight: 600;
    }

    .service-process-card h4 {
        font-weight: 300;
        margin-bottom: 12px;
    }

    .service-process-card p {
        color: #777;
        line-height: 1.7;
        margin: 0;
        font-size: 14px;
    }

    .service-cta {
        background: linear-gradient(135deg, #c9933b, #8a5d1e);
        color: #fff;
        padding: 75px 0;
        text-align: center;
    }

    .service-cta h2 {
        font-weight: 300;
        margin-bottom: 18px;
    }

    .service-cta p {
        color: rgba(255,255,255,0.82);
        max-width: 720px;
        margin: 0 auto 30px;
        line-height: 1.8;
    }

    @media (max-width: 992px) {
        .service-feature-grid {
            grid-template-columns: 1fr;
        }

        .service-image-box {
            min-height: 360px;
        }

        .service-section {
            padding: 65px 0;
        }
    }

    @media (max-width: 576px) {
        .service-premium-hero {
            min-height: 430px;
        }

        .service-info-card {
            padding: 30px;
        }
    }
</style>

<main class="aurora-service-page">
    <section class="service-premium-hero">
        <div class="container">
            <div class="service-hero-content">
                <div class="service-kicker">
                    Pós-venda Premium
                </div>

                <h1>Aurora Service & Care</h1>

                <p>
                    A precisão técnica e o cuidado artesanal no pós-venda do seu Aurora. Manutenção, tecnologia, atendimento personalizado e benefícios exclusivos para clientes que esperam mais do que uma simples revisão.
                </p>

                <a href="agendar-revisao.php" class="btn-service-light mt-4">
                    Agendar Revisão
                </a>
            </div>
        </div>
    </section>

    <section class="service-section">
        <div class="container">
            <div class="service-section-title">
                <h6>Manutenção Aurora</h6>
                <h2>Precisão técnica com atendimento de alto padrão.</h2>
                <p>
                    Nossos centros técnicos foram projetados para oferecer diagnóstico avançado, cuidado preventivo e manutenção especializada com peças genuínas Aurora Motors.
                </p>
            </div>

            <div class="service-feature-grid">
                <div class="service-image-box">
                    <img src="assets/img/workshop-premium.png" alt="Oficina Premium Aurora">
                </div>

                <div class="service-info-card">
                    <h3>O Padrão Ouro em Manutenção</h3>

                    <p>
                        Nossos centros técnicos parecem laboratórios. Equipados com telemetria avançada, nossos especialistas diagnosticam o veículo antes mesmo da chegada à concessionária.
                    </p>

                    <ul class="service-list">
                        <li>
                            <i class="bi bi-cpu"></i>
                            <span>Diagnóstico eletrônico completo com leitura de sistemas inteligentes.</span>
                        </li>

                        <li>
                            <i class="bi bi-shield-check"></i>
                            <span>Peças genuínas para preservar segurança, performance e valorização.</span>
                        </li>

                        <li>
                            <i class="bi bi-clock-history"></i>
                            <span>Acompanhamento do histórico de manutenção do veículo.</span>
                        </li>

                        <li>
                            <i class="bi bi-stars"></i>
                            <span>Entrega técnica com revisão visual, limpeza e checklist premium.</span>
                        </li>
                    </ul>

                    <a href="agendar-revisao.php" class="btn btn-dark premium-btn px-5 py-3">
                        Agendar Revisão
                    </a>
                </div>
            </div>
        </div>
    </section>

    <section class="service-section pt-0">
        <div class="container">
            <div class="row g-4">
                <div class="col-md-4">
                    <div class="service-benefit-card">
                        <i class="bi bi-ev-station"></i>
                        <h4>Service Electric</h4>
                        <p>
                            Atendimento especializado para veículos elétricos e híbridos plug-in, incluindo bateria, recarga e sistemas de alta tensão.
                        </p>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="service-benefit-card">
                        <i class="bi bi-activity"></i>
                        <h4>Telemetria Avançada</h4>
                        <p>
                            Monitoramento inteligente para antecipar necessidades de manutenção e reduzir imprevistos no uso diário.
                        </p>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="service-benefit-card">
                        <i class="bi bi-tools"></i>
                        <h4>Oficina Premium</h4>
                        <p>
                            Técnicos especializados, equipamentos modernos e processos padronizados para preservar o desempenho original.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="service-dark-band">
        <div class="container">
            <div class="row align-items-center g-5">
                <div class="col-lg-5">
                    <div class="service-kicker">
                        Programa de Relacionamento
                    </div>

                    <h2>Aurora Fidelidade</h2>

                    <p>
                        Um programa criado para transformar o pós-venda em experiência. Clientes Aurora contam com atendimento prioritário, benefícios exclusivos e condições especiais em serviços e produtos selecionados.
                    </p>
                </div>

                <div class="col-lg-7">
                    <div class="row g-4">
                        <div class="col-md-4">
                            <div class="loyalty-card text-center">
                                <i class="bi bi-star"></i>
                                <h4>Atendimento Prioritário</h4>
                                <p>
                                    Leva e traz VIP, prioridade em agendamentos e suporte emergencial na rede Aurora.
                                </p>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="loyalty-card text-center">
                                <i class="bi bi-ticket-perforated"></i>
                                <h4>Experiências Exclusivas</h4>
                                <p>
                                    Convites para lançamentos, test-drives especiais e eventos premium da marca.
                                </p>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="loyalty-card text-center">
                                <i class="bi bi-tag"></i>
                                <h4>Condições Especiais</h4>
                                <p>
                                    Benefícios em revisões, peças originais e itens da Boutique Aurora Motors.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="service-section">
        <div class="container">
            <div class="service-section-title">
                <h6>Jornada do atendimento</h6>
                <h2>Da solicitação até a entrega do veículo.</h2>
                <p>
                    O atendimento Aurora foi pensado para ser claro, rastreável e premium em todas as etapas.
                </p>
            </div>

            <div class="row g-4">
                <div class="col-md-3">
                    <div class="service-process-card">
                        <div class="service-process-number">Etapa 01</div>
                        <h4>Agendamento</h4>
                        <p>
                            O cliente escolhe o serviço, data e período desejado diretamente pelo portal.
                        </p>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="service-process-card">
                        <div class="service-process-number">Etapa 02</div>
                        <h4>Diagnóstico</h4>
                        <p>
                            A equipe técnica avalia o veículo e registra as necessidades do atendimento.
                        </p>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="service-process-card">
                        <div class="service-process-number">Etapa 03</div>
                        <h4>Execução</h4>
                        <p>
                            O serviço é executado com peças genuínas e processos técnicos certificados.
                        </p>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="service-process-card">
                        <div class="service-process-number">Etapa 04</div>
                        <h4>Entrega</h4>
                        <p>
                            O veículo é entregue com checklist, orientações e registro no histórico do cliente.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="service-cta">
        <div class="container">
            <h2 class="display-6">
                Pronto para cuidar do seu Aurora?
            </h2>

            <p>
                Agende uma revisão, acompanhe seus atendimentos e mantenha seu veículo dentro do padrão de excelência Aurora Motors.
            </p>

            <a href="agendar-revisao.php" class="btn-service-light">
                Agendar Agora
            </a>
        </div>
    </section>
</main>

<?php include 'includes/footer.php'; ?>