<?php include 'includes/header.php'; ?>

<style>
    /* Força o fundo do site inteiro a ficar escuro nessa página */
    body { background-color: #0a0a0a !important; color: #fff; }
    
    .concept-hero {
        position: relative;
        height: 100vh; /* Ocupa a tela inteira */
        background-attachment: fixed; /* Efeito Parallax */
        background-size: cover;
        background-position: center;
        display: flex;
        align-items: center;
        justify-content: center;
    }
    .concept-title {
        font-size: 5rem;
        font-weight: 200;
        letter-spacing: 5px;
        text-transform: uppercase;
    }
    .editorial-block {
        padding: 120px 0;
    }
    .neon-accent {
        color: #00d2ff; /* Um azul elétrico/neon comum em carros elétricos/conceito */
    }
    .spec-line {
        border-bottom: 1px solid rgba(255,255,255,0.1);
        padding: 15px 0;
        display: flex;
        justify-content: space-between;
    }
</style>

<main>
    <section class="concept-hero" style="background-image: linear-gradient(rgba(0,0,0,0.6), rgba(0,0,0,0.2)), url('assets/img/hero-conceito.png');">
        <div class="text-center text-white">
            <h1 class="concept-title mb-4">Aurora Vision</h1>
            <p class="lead" style="max-width: 700px; margin: 0 auto; font-weight: 300;">Onde a engenharia de ponta encontra o design transcendental para definir os próximos 50 anos da mobilidade premium.</p>
        </div>
    </section>

    <section class="editorial-block container">
        <div class="row align-items-center">
            <div class="col-lg-6">
                <h6 class="neon-accent text-uppercase mb-3" style="letter-spacing: 2px;">01. A Forma</h6>
                <h2 class="display-4 fw-light mb-4">Design Orgânico <br>e Fluidez</h2>
                <p class="text-white-50" style="line-height: 1.8; font-size: 1.1rem;">Nossos protótipos são esculpidos pelo vento. No laboratório de design da Aurora, utilizamos túneis de vento digitais e inteligência artificial para criar formas que eliminam o arrasto aerodinâmico, parecendo estar em movimento mesmo quando parados.</p>
            </div>
            <div class="col-lg-5 offset-lg-1 mt-5 mt-lg-0">
                 <img src="assets/img/lab-aurora.jpg" class="img-fluid" style="border: 1px solid rgba(255,255,255,0.1);" alt="Aurora Design Lab">
            </div>
        </div>
    </section>

    <section class="editorial-block" style="background-color: #111;">
        <div class="container">
            <div class="row text-center mb-5">
                <div class="col-12">
                    <h6 class="neon-accent text-uppercase mb-2" style="letter-spacing: 2px;">Projeto Hyper-GT</h6>
                    <h2 class="display-5 fw-light">O Conceito "Nebula"</h2>
                </div>
            </div>
            
            <div class="row align-items-center">
                <div class="col-lg-7 mb-5 mb-lg-0">
                    <img src="assets/img/lab-nebulacar.png" alt="Concept Car Nebula" class="img-fluid w-100" style="height: 400px; object-fit: cover; border: 1px solid rgba(255,255,255,0.1);">
                </div>
                <div class="col-lg-4 offset-lg-1">
                    <h4 class="fw-light mb-4">Especificações Projetadas</h4>
                    <div class="spec-line">
                        <span class="text-white-50">Propulsão</span>
                        <span class="fw-bold">Bateria de Estado Sólido</span>
                    </div>
                    <div class="spec-line">
                        <span class="text-white-50">Autonomia Est.</span>
                        <span class="fw-bold">1.200 km</span>
                    </div>
                    <div class="spec-line">
                        <span class="text-white-50">0 a 100 km/h</span>
                        <span class="fw-bold text-white">1.8 Segundos</span>
                    </div>
                    <div class="spec-line">
                        <span class="text-white-50">Condução</span>
                        <span class="fw-bold">Nível 5 (100% Autônomo)</span>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>

<?php include 'includes/footer.php'; ?>