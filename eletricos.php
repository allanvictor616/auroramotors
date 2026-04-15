<?php include 'includes/header.php'; ?>

<style>
    .ev-hero {
        padding: 120px 0 80px;
        background-color: #f8f9fa;
        text-align: center;
    }
    .ev-feature-box {
        padding: 40px;
        background: #fff;
        border: 1px solid #eee;
        transition: 0.3s ease;
        height: 100%;
    }
    .ev-feature-box:hover {
        box-shadow: 0 15px 30px rgba(0,0,0,0.05);
        border-color: #c9933b;
    }
    .icon-gold { color: #c9933b; font-size: 2.5rem; margin-bottom: 20px; }
</style>

<main>
    <section class="ev-hero">
        <div class="container">
            <h6 class="text-uppercase mb-3" style="color: #c9933b; letter-spacing: 2px;">100% Elétricos</h6>
            <h1 class="display-3 fw-light mb-4">O Futuro é Silencioso.<br>E Extremamente Rápido.</h1>
            <p class="lead text-muted mx-auto" style="max-width: 700px;">A linha Aurora EV redefine a mobilidade premium. Sem emissões, sem ruídos, mas com um torque instantâneo que desafia a gravidade.</p>
        </div>
    </section>

    <section class="container py-5 my-4">
        <div class="row mb-5">
            <div class="col-12">
                <img src="assets/img/hero-eletricos.png" alt="Aurora Veículos Elétricos" class="img-fluid w-100" style="height: 500px; object-fit: cover;">
            </div>
        </div>

        <div class="row g-4">
            <div class="col-md-4">
                <div class="ev-feature-box text-center">
                    <i class="bi bi-lightning-charge icon-gold"></i>
                    <h4 class="fw-light mb-3">Torque Instantâneo</h4>
                    <p class="text-muted small mb-0">Sinta a resposta imediata. Nossos motores elétricos entregam 100% da potência a partir de zero RPM, garantindo acelerações de tirar o fôlego.</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="ev-feature-box text-center">
                    <i class="bi bi-battery-full icon-gold"></i>
                    <h4 class="fw-light mb-3">Autonomia Estendida</h4>
                    <p class="text-muted small mb-0">Baterias de alta densidade arquitetadas para longas jornadas. Viaje com tranquilidade com autonomias que ultrapassam os 600 km por carga.</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="ev-feature-box text-center">
                    <i class="bi bi-tree icon-gold"></i>
                    <h4 class="fw-light mb-3">Zero Emissões</h4>
                    <p class="text-muted small mb-0">Luxo com consciência. Dirija sabendo que sua pegada de carbono é nula, utilizando materiais reciclados nobres no interior da cabine.</p>
                </div>
            </div>
        </div>
        
        <div class="text-center mt-5 pt-4">
            <a href="modelos.php" class="btn btn-dark px-5 py-3 text-uppercase rounded-0" style="letter-spacing: 1px;">Descubra a Linha EV</a>
        </div>
    </section>
</main>

<?php include 'includes/footer.php'; ?>