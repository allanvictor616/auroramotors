<?php include 'includes/header.php'; ?>

<style>
    .premium-selection-page {
        background: #f5f5f5;
        min-height: 100vh;
        color: #121212;
    }

    .ps-hero {
        background:
            linear-gradient(90deg, rgba(0,0,0,0.92), rgba(0,0,0,0.62), rgba(0,0,0,0.20)),
            url('assets/img/hero-eletricos.png') center/cover;
        min-height: 520px;
        display: flex;
        align-items: center;
        color: #fff;
        border-bottom: 4px solid #c9933b;
    }

    .ps-hero-content {
        max-width: 720px;
    }

    .ps-kicker {
        color: #c9933b;
        text-transform: uppercase;
        letter-spacing: 3px;
        font-size: 13px;
        font-weight: 600;
        margin-bottom: 18px;
    }

    .ps-hero h1 {
        font-size: clamp(2.8rem, 5vw, 5.5rem);
        font-weight: 300;
        margin-bottom: 24px;
        letter-spacing: 1px;
    }

    .ps-hero p {
        color: rgba(255,255,255,0.75);
        line-height: 1.9;
        font-size: 1.05rem;
        max-width: 680px;
    }

    .ps-section {
        padding: 85px 0;
    }

    .ps-section-title {
        text-align: center;
        margin-bottom: 55px;
    }

    .ps-section-title h6 {
        color: #c9933b;
        text-transform: uppercase;
        letter-spacing: 3px;
        font-size: 13px;
        font-weight: 600;
        margin-bottom: 14px;
    }

    .ps-section-title h2 {
        font-size: clamp(2rem, 4vw, 4rem);
        font-weight: 300;
        color: #121212;
        margin-bottom: 14px;
    }

    .ps-section-title p {
        color: #777;
        max-width: 760px;
        margin: 0 auto;
        line-height: 1.8;
    }

    .ps-quality-grid {
        display: grid;
        grid-template-columns: 1.1fr 0.9fr;
        gap: 35px;
        align-items: stretch;
    }

    .ps-image-box {
        min-height: 470px;
        border-bottom: 4px solid #c9933b;
        overflow: hidden;
        box-shadow: 0 18px 45px rgba(0,0,0,0.12);
        background: #121212;
    }

    .ps-image-box img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        opacity: 0.88;
        transition: 0.4s ease;
    }

    .ps-image-box:hover img {
        transform: scale(1.04);
        opacity: 1;
    }

    .ps-info-card {
        background: #fff;
        border: 1px solid #e8e8e8;
        border-top: 3px solid #121212;
        padding: 45px;
        box-shadow: 0 12px 32px rgba(0,0,0,0.055);
        display: flex;
        flex-direction: column;
        justify-content: center;
    }

    .ps-info-card h3 {
        font-size: clamp(1.8rem, 3vw, 3rem);
        font-weight: 300;
        color: #121212;
        margin-bottom: 22px;
    }

    .ps-info-card p {
        color: #666;
        line-height: 1.85;
        margin-bottom: 28px;
    }

    .ps-list {
        list-style: none;
        padding: 0;
        margin: 0;
    }

    .ps-list li {
        display: flex;
        gap: 14px;
        padding: 14px 0;
        border-bottom: 1px solid #eee;
        color: #555;
        line-height: 1.6;
    }

    .ps-list li:last-child {
        border-bottom: none;
    }

    .ps-list i {
        color: #c9933b;
        font-size: 1.2rem;
        margin-top: 2px;
    }

    .ps-benefit-card {
        background: #fff;
        border: 1px solid #e8e8e8;
        border-top: 3px solid #121212;
        padding: 32px;
        height: 100%;
        box-shadow: 0 12px 32px rgba(0,0,0,0.055);
        transition: 0.3s ease;
    }

    .ps-benefit-card:hover {
        transform: translateY(-6px);
        box-shadow: 0 18px 42px rgba(0,0,0,0.09);
    }

    .ps-benefit-card i {
        font-size: 2.4rem;
        color: #c9933b;
        margin-bottom: 20px;
        display: block;
    }

    .ps-benefit-card h4 {
        font-weight: 300;
        margin-bottom: 14px;
        color: #121212;
    }

    .ps-benefit-card p {
        color: #777;
        line-height: 1.7;
        margin: 0;
        font-size: 14px;
    }

    .ps-dark-band {
        background: #121212;
        color: #fff;
        padding: 85px 0;
    }

    .ps-dark-band h2 {
        font-weight: 300;
        font-size: clamp(2rem, 4vw, 4rem);
        margin-bottom: 22px;
    }

    .ps-dark-band p {
        color: rgba(255,255,255,0.68);
        line-height: 1.85;
        max-width: 760px;
    }

    .ps-step-card {
        background: rgba(255,255,255,0.04);
        border: 1px solid rgba(255,255,255,0.08);
        padding: 28px;
        height: 100%;
        border-top: 3px solid #c9933b;
    }

    .ps-step-number {
        color: #c9933b;
        font-size: 13px;
        letter-spacing: 2px;
        text-transform: uppercase;
        margin-bottom: 16px;
    }

    .ps-step-card h4 {
        font-weight: 300;
        margin-bottom: 12px;
    }

    .ps-step-card p {
        color: rgba(255,255,255,0.62);
        line-height: 1.7;
        margin: 0;
        font-size: 14px;
    }

    .ps-car-card {
        background: #fff;
        border: 1px solid #e8e8e8;
        box-shadow: 0 12px 32px rgba(0,0,0,0.055);
        overflow: hidden;
        height: 100%;
        transition: 0.3s ease;
    }

    .ps-car-card:hover {
        transform: translateY(-6px);
        box-shadow: 0 18px 42px rgba(0,0,0,0.09);
    }

    .ps-car-card img {
        width: 100%;
        height: 245px;
        object-fit: cover;
        background: #eee;
    }

    .ps-car-content {
        padding: 28px;
        border-top: 3px solid #121212;
    }

    .ps-car-badge {
        display: inline-block;
        background: #121212;
        color: #fff;
        padding: 7px 12px;
        font-size: 10px;
        letter-spacing: 1.5px;
        text-transform: uppercase;
        margin-bottom: 14px;
    }

    .ps-car-content h4 {
        font-weight: 300;
        margin-bottom: 10px;
        color: #121212;
    }

    .ps-car-content p {
        color: #777;
        font-size: 14px;
        line-height: 1.7;
        margin-bottom: 20px;
    }

    .ps-price {
        color: #c9933b;
        font-size: 20px;
        font-weight: 500;
        margin-bottom: 22px;
    }

    .ps-cta {
        background: linear-gradient(135deg, #c9933b, #8a5d1e);
        color: #fff;
        padding: 75px 0;
        text-align: center;
    }

    .ps-cta h2 {
        font-weight: 300;
        margin-bottom: 18px;
    }

    .ps-cta p {
        color: rgba(255,255,255,0.82);
        max-width: 720px;
        margin: 0 auto 30px;
        line-height: 1.8;
    }

    .btn-ps-light {
        background: #fff;
        color: #121212;
        border: 1px solid #fff;
        border-radius: 0;
        padding: 14px 42px;
        text-transform: uppercase;
        letter-spacing: 1.5px;
        font-size: 13px;
        text-decoration: none;
        display: inline-block;
        transition: 0.3s;
    }

    .btn-ps-light:hover {
        background: #121212;
        border-color: #121212;
        color: #fff;
    }

    @media (max-width: 992px) {
        .ps-quality-grid {
            grid-template-columns: 1fr;
        }

        .ps-image-box {
            min-height: 360px;
        }

        .ps-section {
            padding: 65px 0;
        }
    }

    @media (max-width: 576px) {
        .ps-hero {
            min-height: 430px;
        }

        .ps-info-card {
            padding: 30px;
        }

        .ps-car-card img {
            height: 210px;
        }
    }
</style>

<main class="premium-selection-page">
    <section class="ps-hero">
        <div class="container">
            <div class="ps-hero-content">
                <div class="ps-kicker">
                    Seminovos Certificados
                </div>

                <h1>Aurora Premium Selection</h1>

                <p>
                    A confiança de um Aurora novo com a inteligência de uma escolha certificada. Veículos selecionados, revisados e preparados para entregar uma experiência premium desde o primeiro contato.
                </p>

                <a href="modelos.php" class="btn-ps-light mt-4">
                    Ver Modelos
                </a>
            </div>
        </div>
    </section>

    <section class="ps-section">
        <div class="container">
            <div class="ps-section-title">
                <h6>Padrão Ouro Aurora</h6>
                <h2>Qualidade certificada do início ao fim.</h2>
                <p>
                    Cada veículo do programa Aurora Premium Selection passa por uma inspeção completa para garantir procedência, segurança, performance e acabamento compatíveis com o padrão Aurora Motors.
                </p>
            </div>

            <div class="ps-quality-grid">
                <div class="ps-image-box">
                    <img src="assets/img/hero-eletricos.png" alt="Aurora Premium Selection">
                </div>

                <div class="ps-info-card">
                    <h3>O Padrão Ouro de Qualidade</h3>

                    <p>
                        A confiança de um Aurora 0km com as vantagens de um seminovo. Cada veículo passa por inspeção técnica de 360°, análise documental e revisão detalhada antes de ser disponibilizado.
                    </p>

                    <ul class="ps-list">
                        <li>
                            <i class="bi bi-shield-check"></i>
                            <span>24 meses de garantia sem limite de quilometragem.</span>
                        </li>

                        <li>
                            <i class="bi bi-headset"></i>
                            <span>Assistência 24h em todo o país.</span>
                        </li>

                        <li>
                            <i class="bi bi-clipboard-check"></i>
                            <span>Histórico de manutenção 100% verificado.</span>
                        </li>

                        <li>
                            <i class="bi bi-stars"></i>
                            <span>Preparação estética e técnica com padrão premium.</span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <section class="ps-section pt-0">
        <div class="container">
            <div class="row g-4">
                <div class="col-md-4">
                    <div class="ps-benefit-card">
                        <i class="bi bi-search"></i>
                        <h4>Inspeção 360°</h4>
                        <p>
                            Conferência técnica completa de mecânica, elétrica, estrutura, acabamento e sistemas digitais.
                        </p>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="ps-benefit-card">
                        <i class="bi bi-file-earmark-check"></i>
                        <h4>Procedência Verificada</h4>
                        <p>
                            Validação documental, histórico de revisões e rastreabilidade do veículo desde a origem.
                        </p>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="ps-benefit-card">
                        <i class="bi bi-gem"></i>
                        <h4>Entrega Premium</h4>
                        <p>
                            Higienização, preparação estética, revisão final e experiência de entrega personalizada.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="ps-dark-band">
        <div class="container">
            <div class="row align-items-center g-5">
                <div class="col-lg-5">
                    <div class="ps-kicker">
                        Como funciona
                    </div>

                    <h2>Do estoque certificado até a sua garagem.</h2>

                    <p>
                        O processo foi pensado para dar transparência e segurança ao cliente: seleção do veículo, inspeção, proposta comercial, documentação e entrega com acompanhamento Aurora.
                    </p>
                </div>

                <div class="col-lg-7">
                    <div class="row g-4">
                        <div class="col-md-6">
                            <div class="ps-step-card">
                                <div class="ps-step-number">Etapa 01</div>
                                <h4>Seleção</h4>
                                <p>
                                    O veículo é escolhido com base em histórico, estado de conservação e critérios internos de qualidade.
                                </p>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="ps-step-card">
                                <div class="ps-step-number">Etapa 02</div>
                                <h4>Certificação</h4>
                                <p>
                                    A equipe técnica realiza a inspeção completa e aprova apenas unidades compatíveis com o padrão Aurora.
                                </p>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="ps-step-card">
                                <div class="ps-step-number">Etapa 03</div>
                                <h4>Proposta</h4>
                                <p>
                                    O cliente recebe uma proposta personalizada com condições, garantia e detalhes do veículo.
                                </p>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="ps-step-card">
                                <div class="ps-step-number">Etapa 04</div>
                                <h4>Entrega</h4>
                                <p>
                                    O veículo é preparado, documentado e entregue com suporte completo da experiência Aurora.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="ps-section">
        <div class="container">
            <div class="ps-section-title">
                <h6>Disponíveis para proposta</h6>
                <h2>Exemplos Premium Selection</h2>
                <p>
                    Conheça algumas configurações que representam o padrão de seminovos certificados Aurora.
                </p>
            </div>

            <div class="row g-4">
                <div class="col-md-4">
                    <div class="ps-car-card">
                        <img src="assets/img/Zenith X-Drive.png" alt="Aurora Zenith X-Drive">

                        <div class="ps-car-content">
                            <span class="ps-car-badge">SUV Certificado</span>
                            <h4>Aurora Zenith X-Drive</h4>
                            <p>
                                SUV elétrico premium com pacote tecnológico completo e inspeção certificada.
                            </p>
                            <div class="ps-price">A partir de R$ 389.950</div>

                            <a href="modelos.php" class="btn btn-dark w-100 premium-btn">
                                Solicitar Proposta
                            </a>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="ps-car-card">
                        <img src="assets/img/Vanguard M-Line.png" alt="Aurora Vanguard M-Line">

                        <div class="ps-car-content">
                            <span class="ps-car-badge">Sedan Certificado</span>
                            <h4>Aurora Vanguard M-Line</h4>
                            <p>
                                Híbrido plug-in com acabamento premium, histórico verificado e garantia Aurora.
                            </p>
                            <div class="ps-price">A partir de R$ 455.850</div>

                            <a href="modelos.php" class="btn btn-dark w-100 premium-btn">
                                Solicitar Proposta
                            </a>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="ps-car-card">
                        <img src="assets/img/Nexus N-Line.png" alt="Aurora Nexus N-Line">

                        <div class="ps-car-content">
                            <span class="ps-car-badge">Hatch Certificado</span>
                            <h4>Aurora Nexus N-Line</h4>
                            <p>
                                Hatch urbano premium com condução ágil, tecnologia embarcada e revisão completa.
                            </p>
                            <div class="ps-price">A partir de R$ 219.950</div>

                            <a href="modelos.php" class="btn btn-dark w-100 premium-btn">
                                Solicitar Proposta
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="ps-cta">
        <div class="container">
            <h2 class="display-6">
                Encontre um Aurora certificado para chamar de seu.
            </h2>

            <p>
                Solicite uma proposta e receba atendimento especializado para conhecer modelos disponíveis, condições comerciais e garantias do programa Premium Selection.
            </p>

            <a href="modelos.php" class="btn-ps-light">
                Solicitar Proposta
            </a>
        </div>
    </section>
</main>

<?php include 'includes/footer.php'; ?>