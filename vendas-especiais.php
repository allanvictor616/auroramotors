<?php include 'includes/header.php'; ?>

<style>
    .special-sales-page {
        background: #f5f5f5;
        min-height: 100vh;
        color: #121212;
    }

    .sales-hero-premium {
        position: relative;
        min-height: 540px;
        display: flex;
        align-items: center;
        color: #fff;
        background:
            linear-gradient(90deg, rgba(0,0,0,0.92), rgba(0,0,0,0.64), rgba(0,0,0,0.18)),
            url('assets/img/hero-finance.png') center/cover;
        border-bottom: 4px solid #c9933b;
    }

    .sales-hero-content {
        max-width: 760px;
    }

    .sales-kicker {
        color: #c9933b;
        text-transform: uppercase;
        letter-spacing: 3px;
        font-size: 13px;
        font-weight: 600;
        margin-bottom: 18px;
    }

    .sales-hero-premium h1 {
        font-size: clamp(2.8rem, 5vw, 5.5rem);
        font-weight: 300;
        margin-bottom: 24px;
        letter-spacing: 1px;
    }

    .sales-hero-premium p {
        color: rgba(255,255,255,0.78);
        line-height: 1.9;
        font-size: 1.05rem;
        max-width: 680px;
    }

    .btn-sales-light {
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

    .btn-sales-light:hover {
        background: #c9933b;
        border-color: #c9933b;
        color: #fff;
    }

    .sales-section {
        padding: 85px 0;
    }

    .sales-section-title {
        text-align: center;
        margin-bottom: 55px;
    }

    .sales-section-title h6 {
        color: #c9933b;
        text-transform: uppercase;
        letter-spacing: 3px;
        font-size: 13px;
        font-weight: 600;
        margin-bottom: 14px;
    }

    .sales-section-title h2 {
        font-size: clamp(2rem, 4vw, 4rem);
        font-weight: 300;
        color: #121212;
        margin-bottom: 14px;
    }

    .sales-section-title p {
        color: #777;
        max-width: 780px;
        margin: 0 auto;
        line-height: 1.8;
    }

    .sales-offer-card {
        background: #fff;
        border: 1px solid #e8e8e8;
        border-top: 3px solid #121212;
        padding: 42px;
        height: 100%;
        box-shadow: 0 12px 32px rgba(0,0,0,0.055);
        transition: 0.3s ease;
        display: flex;
        flex-direction: column;
    }

    .sales-offer-card.gold {
        border-top-color: #c9933b;
    }

    .sales-offer-card:hover {
        transform: translateY(-6px);
        box-shadow: 0 18px 42px rgba(0,0,0,0.09);
    }

    .sales-offer-icon {
        width: 58px;
        height: 58px;
        background: #121212;
        color: #c9933b;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.8rem;
        margin-bottom: 24px;
    }

    .sales-offer-card h3 {
        font-size: clamp(1.8rem, 3vw, 3rem);
        font-weight: 300;
        margin-bottom: 18px;
        color: #121212;
    }

    .sales-offer-card p {
        color: #666;
        line-height: 1.85;
        margin-bottom: 24px;
    }

    .sales-list {
        list-style: none;
        padding: 0;
        margin: 0 0 30px;
    }

    .sales-list li {
        display: flex;
        gap: 14px;
        padding: 13px 0;
        border-bottom: 1px solid #eee;
        color: #555;
        line-height: 1.6;
    }

    .sales-list li:last-child {
        border-bottom: none;
    }

    .sales-list i {
        color: #c9933b;
        font-size: 1.15rem;
        margin-top: 2px;
    }

    .sales-offer-card .btn {
        margin-top: auto;
    }

    .sales-dark-band {
        background: #121212;
        color: #fff;
        padding: 85px 0;
    }

    .sales-dark-band h2 {
        font-weight: 300;
        font-size: clamp(2rem, 4vw, 4rem);
        margin-bottom: 22px;
    }

    .sales-dark-band p {
        color: rgba(255,255,255,0.68);
        line-height: 1.85;
        max-width: 760px;
    }

    .sales-program-card {
        background: rgba(255,255,255,0.04);
        border: 1px solid rgba(255,255,255,0.08);
        border-top: 3px solid #c9933b;
        padding: 30px;
        height: 100%;
        transition: 0.3s ease;
    }

    .sales-program-card:hover {
        background: rgba(255,255,255,0.07);
        transform: translateY(-6px);
    }

    .sales-program-card i {
        font-size: 2.3rem;
        color: #c9933b;
        display: block;
        margin-bottom: 20px;
    }

    .sales-program-card h4 {
        font-weight: 300;
        margin-bottom: 12px;
    }

    .sales-program-card p {
        color: rgba(255,255,255,0.62);
        line-height: 1.7;
        margin: 0;
        font-size: 14px;
    }

    .sales-process-card {
        background: #fff;
        border: 1px solid #e8e8e8;
        border-top: 3px solid #121212;
        padding: 30px;
        height: 100%;
        box-shadow: 0 12px 32px rgba(0,0,0,0.055);
    }

    .sales-process-number {
        color: #c9933b;
        text-transform: uppercase;
        letter-spacing: 2px;
        font-size: 12px;
        margin-bottom: 16px;
        font-weight: 600;
    }

    .sales-process-card h4 {
        font-weight: 300;
        margin-bottom: 12px;
    }

    .sales-process-card p {
        color: #777;
        line-height: 1.7;
        margin: 0;
        font-size: 14px;
    }

    .sales-cta {
        background: linear-gradient(135deg, #c9933b, #8a5d1e);
        color: #fff;
        padding: 75px 0;
        text-align: center;
    }

    .sales-cta h2 {
        font-weight: 300;
        margin-bottom: 18px;
    }

    .sales-cta p {
        color: rgba(255,255,255,0.84);
        max-width: 720px;
        margin: 0 auto 30px;
        line-height: 1.8;
    }

    @media (max-width: 992px) {
        .sales-section {
            padding: 65px 0;
        }

        .sales-offer-card {
            padding: 34px;
        }
    }

    @media (max-width: 576px) {
        .sales-hero-premium {
            min-height: 430px;
        }

        .sales-offer-card,
        .sales-process-card,
        .sales-program-card {
            padding: 28px;
        }
    }
</style>

<main class="special-sales-page">
    <section class="sales-hero-premium">
        <div class="container">
            <div class="sales-hero-content">
                <div class="sales-kicker">
                    Condições & Vendas Corporativas
                </div>

                <h1>O seu Aurora. Do seu jeito.</h1>

                <p>
                    Descubra rotas inteligentes para assumir o volante da inovação. Soluções exclusivas para clientes particulares, empresas, executivos, frotistas e projetos de mobilidade premium.
                </p>

                <a href="simulacao.php" class="btn-sales-light mt-4">
                    Solicitar Simulação
                </a>
            </div>
        </div>
    </section>

    <section class="sales-section">
        <div class="container">
            <div class="sales-section-title">
                <h6>Escolha sua rota</h6>
                <h2>Condições pensadas para cada perfil.</h2>
                <p>
                    A Aurora Motors oferece caminhos personalizados para aquisição, troca ou renovação de frota, sempre com atendimento consultivo e padrão premium de relacionamento.
                </p>
            </div>

            <div class="row g-4">
                <div class="col-lg-6">
                    <div class="sales-offer-card gold">
                        <div class="sales-offer-icon">
                            <i class="bi bi-person-check"></i>
                        </div>

                        <div class="sales-kicker">
                            Para você
                        </div>

                        <h3>Condições Especiais</h3>

                        <p>
                            Aproveite o Plano Aurora Select com estrutura flexível, recompra garantida e valorização do seu seminovo na troca por um Aurora 0km. Uma forma mais inteligente de evoluir para o seu próximo veículo premium.
                        </p>

                        <ul class="sales-list">
                            <li>
                                <i class="bi bi-check2-circle"></i>
                                <span>Financiamento flexível com entrada e prazo personalizados.</span>
                            </li>

                            <li>
                                <i class="bi bi-check2-circle"></i>
                                <span>Super valorização do seu usado na troca por um Aurora novo.</span>
                            </li>

                            <li>
                                <i class="bi bi-check2-circle"></i>
                                <span>Possibilidade de incluir seguro, acessórios e serviços no plano.</span>
                            </li>

                            <li>
                                <i class="bi bi-check2-circle"></i>
                                <span>Atendimento consultivo com retorno de especialista Aurora Motors.</span>
                            </li>
                        </ul>

                        <a href="simulacao.php" class="btn btn-dark w-100 rounded-0 py-3 text-uppercase" style="letter-spacing: 1px;">
                            Solicitar Simulação
                        </a>
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="sales-offer-card">
                        <div class="sales-offer-icon">
                            <i class="bi bi-building"></i>
                        </div>

                        <div class="sales-kicker">
                            Para sua empresa
                        </div>

                        <h3>Vendas Corporativas</h3>

                        <p>
                            Soluções inteligentes para empresas, frotistas, produtores rurais e executivos. Reduza a pegada de carbono do seu negócio com condições diretas de fábrica em veículos elétricos e híbridos.
                        </p>

                        <ul class="sales-list">
                            <li>
                                <i class="bi bi-check2-circle"></i>
                                <span>Faturamento direto da fábrica para empresas elegíveis.</span>
                            </li>

                            <li>
                                <i class="bi bi-check2-circle"></i>
                                <span>Atendimento e manutenção prioritários para veículos corporativos.</span>
                            </li>

                            <li>
                                <i class="bi bi-check2-circle"></i>
                                <span>Condições para renovação de frota e projetos de mobilidade.</span>
                            </li>

                            <li>
                                <i class="bi bi-check2-circle"></i>
                                <span>Consultoria para CNPJ, executivos, parceiros e operações especiais.</span>
                            </li>
                        </ul>

                        <a href="b2b.php" class="btn btn-outline-dark w-100 rounded-0 py-3 text-uppercase" style="letter-spacing: 1px;">
                            Falar com Consultor B2B
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="sales-dark-band">
        <div class="container">
            <div class="row align-items-center g-5">
                <div class="col-lg-5">
                    <div class="sales-kicker">
                        Programas Aurora
                    </div>

                    <h2>Benefícios além da compra.</h2>

                    <p>
                        Nossas condições especiais não terminam no momento da aquisição. A experiência Aurora acompanha o cliente em financiamento, seguros, pós-venda, manutenção e relacionamento.
                    </p>
                </div>

                <div class="col-lg-7">
                    <div class="row g-4">
                        <div class="col-md-4">
                            <div class="sales-program-card text-center">
                                <i class="bi bi-shield-check"></i>
                                <h4>Aurora Seguros</h4>
                                <p>
                                    Proteção completa com rede autorizada, peças genuínas e assistência dedicada.
                                </p>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="sales-program-card text-center">
                                <i class="bi bi-stars"></i>
                                <h4>Aurora Select</h4>
                                <p>
                                    Planos flexíveis para troca inteligente, recompra e evolução para novos modelos.
                                </p>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="sales-program-card text-center">
                                <i class="bi bi-tools"></i>
                                <h4>Service & Care</h4>
                                <p>
                                    Pós-venda premium com manutenção especializada e atendimento prioritário.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="sales-section">
        <div class="container">
            <div class="sales-section-title">
                <h6>Como funciona</h6>
                <h2>Da escolha do modelo até a proposta final.</h2>
                <p>
                    O processo é simples, consultivo e pensado para oferecer clareza em cada etapa da jornada.
                </p>
            </div>

            <div class="row g-4">
                <div class="col-md-3">
                    <div class="sales-process-card">
                        <div class="sales-process-number">Etapa 01</div>
                        <h4>Escolha</h4>
                        <p>
                            Selecione o modelo Aurora desejado ou informe o perfil da sua empresa.
                        </p>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="sales-process-card">
                        <div class="sales-process-number">Etapa 02</div>
                        <h4>Simulação</h4>
                        <p>
                            Solicite uma análise personalizada com entrada, prazo e condições comerciais.
                        </p>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="sales-process-card">
                        <div class="sales-process-number">Etapa 03</div>
                        <h4>Consultoria</h4>
                        <p>
                            Um consultor Aurora Motors retorna com as melhores alternativas para seu cenário.
                        </p>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="sales-process-card">
                        <div class="sales-process-number">Etapa 04</div>
                        <h4>Proposta</h4>
                        <p>
                            Você recebe a proposta final com detalhes de aquisição, serviços e próximos passos.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="sales-cta">
        <div class="container">
            <h2 class="display-6">
                Pronto para receber uma condição Aurora?
            </h2>

            <p>
                Solicite uma simulação personalizada ou fale com nosso atendimento corporativo para encontrar a melhor solução para você ou para sua empresa.
            </p>

            <a href="simulacao.php" class="btn-sales-light">
                Solicitar Simulação
            </a>
        </div>
    </section>
</main>

<?php include 'includes/footer.php'; ?>