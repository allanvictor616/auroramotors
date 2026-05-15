<?php include 'includes/header.php'; ?>

<style>
    body {
        background-color: #101010 !important;
    }

    .exclusive-page {
        background-color: #101010 !important;
        color: #ffffff;
        min-height: 100vh;
    }

    .exclusive-hero {
        position: relative;
        min-height: 520px;
        display: flex;
        align-items: center;
        background:
            linear-gradient(90deg, rgba(0,0,0,0.90) 0%, rgba(0,0,0,0.65) 45%, rgba(0,0,0,0.25) 100%),
            url('assets/img/motor-futuro.png') center/cover;
        border-bottom: 4px solid #c9933b;
    }

    .exclusive-hero-content {
        max-width: 760px;
    }

    .exclusive-kicker {
        color: #c9933b;
        text-transform: uppercase;
        letter-spacing: 3px;
        font-size: 13px;
        font-weight: 600;
        margin-bottom: 18px;
    }

    .exclusive-hero h1 {
        font-size: clamp(2.8rem, 6vw, 5.8rem);
        font-weight: 300;
        letter-spacing: 1px;
        margin-bottom: 24px;
    }

    .exclusive-hero p {
        color: rgba(255,255,255,0.72);
        font-size: 1.05rem;
        line-height: 1.9;
        max-width: 690px;
    }

    .exclusive-section {
        padding: 90px 0;
        border-bottom: 1px solid rgba(255,255,255,0.08);
    }

    .exclusive-section.alt {
        background: #151515;
    }

    .exclusive-title {
        font-size: clamp(2rem, 4vw, 4rem);
        font-weight: 300;
        margin-bottom: 24px;
    }

    .exclusive-text {
        color: rgba(255,255,255,0.68);
        line-height: 1.85;
        font-size: 1rem;
    }

    .gold-text {
        color: #c9933b;
    }

    .blue-text {
        color: #47c7ff;
    }

    .feature-box {
        height: 100%;
        padding: 34px 28px;
        background: rgba(255,255,255,0.035);
        border: 1px solid rgba(255,255,255,0.08);
        border-top: 3px solid #c9933b;
        transition: 0.3s ease;
    }

    .feature-box:hover {
        transform: translateY(-6px);
        background: rgba(255,255,255,0.06);
        box-shadow: 0 18px 42px rgba(0,0,0,0.28);
    }

    .feature-box i {
        font-size: 2.5rem;
        color: #c9933b;
        margin-bottom: 18px;
        display: block;
    }

    .feature-box h5 {
        font-weight: 300;
        letter-spacing: 1px;
        margin-bottom: 12px;
    }

    .feature-box p {
        color: rgba(255,255,255,0.58);
        font-size: 14px;
        line-height: 1.7;
        margin: 0;
    }

    .exclusive-image-box {
        position: relative;
        height: 430px;
        background: #0c0c0c;
        border: 1px solid rgba(255,255,255,0.08);
        border-bottom: 4px solid #c9933b;
        overflow: hidden;
        box-shadow: 0 20px 50px rgba(0,0,0,0.35);
    }

    .exclusive-image-box img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        opacity: 0.78;
        transition: 0.4s ease;
    }

    .exclusive-image-box:hover img {
        transform: scale(1.04);
        opacity: 0.92;
    }

    .exclusive-list {
        margin: 28px 0 0;
        padding: 0;
        list-style: none;
    }

    .exclusive-list li {
        display: flex;
        gap: 14px;
        padding: 16px 0;
        border-bottom: 1px solid rgba(255,255,255,0.08);
        color: rgba(255,255,255,0.68);
        line-height: 1.7;
    }

    .exclusive-list li:last-child {
        border-bottom: none;
    }

    .exclusive-list i {
        color: #c9933b;
        font-size: 1.2rem;
        margin-top: 3px;
    }

    .exclusive-cta {
        background: linear-gradient(135deg, #c9933b, #8a5d1e);
        color: #fff;
        padding: 70px 0;
    }

    .exclusive-cta h2 {
        font-weight: 300;
        margin-bottom: 18px;
    }

    .exclusive-cta p {
        color: rgba(255,255,255,0.82);
        max-width: 720px;
        margin: 0 auto 30px;
        line-height: 1.8;
    }

    .btn-exclusive-light {
        background: #fff;
        color: #121212;
        border: 1px solid #fff;
        border-radius: 0;
        padding: 14px 42px;
        text-transform: uppercase;
        letter-spacing: 1.5px;
        font-size: 13px;
        transition: 0.3s;
        text-decoration: none;
        display: inline-block;
    }

    .btn-exclusive-light:hover {
        background: #121212;
        color: #fff;
        border-color: #121212;
    }

    @media (max-width: 992px) {
        .exclusive-hero {
            min-height: 460px;
        }

        .exclusive-section {
            padding: 70px 0;
        }

        .exclusive-image-box {
            height: 340px;
            margin-top: 35px;
        }
    }

    @media (max-width: 576px) {
        .exclusive-hero {
            min-height: 420px;
        }

        .exclusive-hero p,
        .exclusive-text {
            font-size: 0.95rem;
        }

        .feature-box {
            padding: 28px 22px;
        }
    }
</style>

<main class="exclusive-page">
    <section class="exclusive-hero">
        <div class="container">
            <div class="exclusive-hero-content">
                <div class="exclusive-kicker">
                    Aurora Exclusive & Tech
                </div>

                <h1>Aurora Individual</h1>

                <p>
                    Um Aurora tão único quanto sua assinatura. Personalize acabamento, tecnologia, materiais internos e recursos digitais para transformar o veículo em uma extensão do seu próprio estilo.
                </p>

                <a href="modelos.php" class="btn-exclusive-light mt-4">
                    Explorar Modelos
                </a>
            </div>
        </div>
    </section>

    <section class="exclusive-section">
        <div class="container">
            <div class="row align-items-center g-5">
                <div class="col-lg-6">
                    <div class="exclusive-kicker">
                        Bespoke Design
                    </div>

                    <h2 class="exclusive-title">
                        Feito sob medida para quem não aceita o comum.
                    </h2>

                    <p class="exclusive-text">
                        O programa Aurora Individual oferece uma seleção premium de pinturas personalizadas, couros raros, costuras exclusivas, acabamentos internos nobres e detalhes criados sob medida. Cada escolha é pensada para deixar o veículo com uma identidade única.
                    </p>
                </div>

                <div class="col-lg-6">
                    <div class="row g-4">
                        <div class="col-md-6">
                            <div class="feature-box text-center">
                                <i class="bi bi-palette"></i>
                                <h5>Pinturas Customizadas</h5>
                                <p>
                                    Cores exclusivas desenvolvidas para destacar a presença do seu Aurora.
                                </p>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="feature-box text-center">
                                <i class="bi bi-scissors"></i>
                                <h5>Couros Raros</h5>
                                <p>
                                    Materiais premium, costuras artesanais e acabamento interno personalizado.
                                </p>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="feature-box text-center">
                                <i class="bi bi-gem"></i>
                                <h5>Acabamentos Nobres</h5>
                                <p>
                                    Madeira, fibra de carbono, metais escovados e detalhes exclusivos.
                                </p>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="feature-box text-center">
                                <i class="bi bi-stars"></i>
                                <h5>Assinatura Aurora</h5>
                                <p>
                                    Identidade visual própria para criar uma experiência realmente individual.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="exclusive-section alt">
        <div class="container">
            <div class="row align-items-center g-5">
                <div class="col-lg-6">
                    <div class="exclusive-image-box">
                        <img src="assets/img/motor-futuro.png" alt="Connected Store Aurora Motors">
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="exclusive-kicker blue-text">
                        Digital Upgrade
                    </div>

                    <h2 class="exclusive-title">
                        Connected Store
                    </h2>

                    <p class="exclusive-text">
                        Sua central de serviços digitais. O seu Aurora evolui com o tempo por meio de recursos ativados remotamente. Adquira novas funções, personalize a experiência de condução e mantenha seu veículo sempre atualizado.
                    </p>

                    <ul class="exclusive-list">
                        <li>
                            <i class="bi bi-phone"></i>
                            <span>
                                <strong class="text-white">Remote Engine Start:</strong> climatize o veículo pelo smartphone antes mesmo de entrar.
                            </span>
                        </li>

                        <li>
                            <i class="bi bi-map"></i>
                            <span>
                                <strong class="text-white">Navegação Inteligente:</strong> rotas com tráfego em tempo real e integração com serviços conectados.
                            </span>
                        </li>

                        <li>
                            <i class="bi bi-camera-video"></i>
                            <span>
                                <strong class="text-white">Drive Recorder:</strong> utilize as câmeras do veículo como sistema de gravação inteligente.
                            </span>
                        </li>

                        <li>
                            <i class="bi bi-cloud-arrow-down"></i>
                            <span>
                                <strong class="text-white">Atualizações OTA:</strong> novos recursos ativados remotamente, sem visita à concessionária.
                            </span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <section class="exclusive-section">
        <div class="container">
            <div class="row align-items-center g-5">
                <div class="col-lg-6">
                    <div class="exclusive-kicker">
                        Aurora Experience
                    </div>

                    <h2 class="exclusive-title">
                        Um veículo, várias experiências.
                    </h2>

                    <p class="exclusive-text">
                        A Aurora Motors combina design artesanal com tecnologia avançada para criar uma experiência premium completa: da configuração visual ao acompanhamento digital, da performance ao conforto no uso diário.
                    </p>

                    <ul class="exclusive-list">
                        <li>
                            <i class="bi bi-check2-circle"></i>
                            <span>Pacotes de personalização para interior e exterior.</span>
                        </li>

                        <li>
                            <i class="bi bi-check2-circle"></i>
                            <span>Recursos digitais ativados conforme o perfil do cliente.</span>
                        </li>

                        <li>
                            <i class="bi bi-check2-circle"></i>
                            <span>Integração com serviços Aurora Service e Boutique Aurora Motors.</span>
                        </li>
                    </ul>
                </div>

                <div class="col-lg-6">
                    <div class="row g-4">
                        <div class="col-md-6">
                            <div class="feature-box">
                                <i class="bi bi-speedometer2"></i>
                                <h5>Performance</h5>
                                <p>
                                    Configurações pensadas para diferentes estilos de condução.
                                </p>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="feature-box">
                                <i class="bi bi-shield-check"></i>
                                <h5>Segurança</h5>
                                <p>
                                    Pacotes inteligentes de assistência e monitoramento.
                                </p>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="feature-box">
                                <i class="bi bi-lightning-charge"></i>
                                <h5>Eficiência</h5>
                                <p>
                                    Recursos para otimizar autonomia, recarga e consumo.
                                </p>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="feature-box">
                                <i class="bi bi-person-check"></i>
                                <h5>Perfil do Cliente</h5>
                                <p>
                                    Experiência adaptada ao uso e preferências do proprietário.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="exclusive-cta text-center">
        <div class="container">
            <h2 class="display-6">
                Configure o Aurora ideal para você.
            </h2>

            <p>
                Escolha um modelo, solicite uma proposta e personalize sua experiência com os recursos exclusivos da Aurora Motors.
            </p>

            <a href="modelos.php" class="btn-exclusive-light">
                Solicitar Proposta
            </a>
        </div>
    </section>
</main>

<?php include 'includes/footer.php'; ?>