<?php include 'includes/header.php'; ?>

<style>
    .ps-image-container {
        position: relative;
        height: 500px;
        margin-top: 50px;
    }
    .ps-image-container img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }
    .ps-text-box {
        background: #fff;
        padding: 50px;
        position: absolute;
        bottom: -50px;
        right: 10%;
        max-width: 500px;
        box-shadow: 0 20px 40px rgba(0,0,0,0.08);
    }
</style>

<main style="background-color: #f9f9f9; padding-bottom: 100px;">
    <div class="container pt-5">
        <div class="row text-center mb-4">
            <div class="col-12">
                <h6 class="text-uppercase" style="color: #c9933b; letter-spacing: 2px;">Seminovos Certificados</h6>
                <h1 class="display-5 fw-light text-dark">Aurora Premium Selection</h1>
            </div>
        </div>

        <div class="ps-image-container">
            <img src="assets/img/hero-eletricos.png" alt="Qualidade Certificada">
            
            <div class="ps-text-box">
                <h3 class="fw-light mb-4">O Padrão Ouro de Qualidade</h3>
                <p class="text-muted mb-4" style="line-height: 1.8;">A confiança de um Aurora 0km, com as vantagens de um seminovo. Cada veículo do programa passa por uma rigorosa inspeção técnica de 360°, garantindo que cada milímetro atenda aos nossos exigentes padrões de luxo.</p>
                <ul class="list-unstyled text-muted mb-0">
                    <li class="mb-2"><i class="bi bi-shield-check me-2" style="color:#c9933b;"></i> 24 meses de garantia sem limite de km.</li>
                    <li class="mb-2"><i class="bi bi-headset me-2" style="color:#c9933b;"></i> Assistência 24h em todo o país.</li>
                    <li><i class="bi bi-clipboard-check me-2" style="color:#c9933b;"></i> Histórico de manutenção 100% verificado.</li>
                </ul>
            </div>
        </div>
    </div>
</main>

<?php include 'includes/footer.php'; ?>