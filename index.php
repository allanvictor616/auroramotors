<?php 
// Puxa o cabeçalho e o menu
include 'includes/header.php';
?>

    <main>
        <section class="hero-home">
            <video autoplay loop muted playsinline class="hero-video">
                <source src="assets/video/aurora-presentation.mp4" type="video/mp4">
                Seu navegador não suporta vídeos HTML5.
            </video>
            <div class="video-overlay"></div>
            <div class="welcome-card">
                <h2>Bem-vindo à Aurora Motors</h2>
                <p>O futuro da mobilidade premium já começou. Explore nossa linha de sedans, SUVs e hatchbacks de alta performance.</p>
            </div>
        </section>

        <section class="destaques-carros">
            
            <div class="car-banner" style="background-image: url('assets/img/Nexus N-Line.png');">
                <div class="banner-gradient"></div>
                
                <div class="car-info">
                    <h3>Aurora Nexus N-Line.</h3>
                    <p>Taxa 0% a.a. + IPVA 2026 pago.<br>Entrada de 60% + Saldo em 24 meses.*</p>
                    <a href="#" class="btn-outline">Saiba mais</a>
                </div>
            </div>

            <div class="car-banner" style="background-image: url('assets/img/zenith-banner.png');">
                <div class="banner-gradient"></div>
                
                <div class="car-info">
                    <h3>Aurora Zenith X-Drive</h3>
                    <p>Taxa 0% a.m. com saldo em 24 meses + Supervalorização do seu seminovo.<br>Consulte condições.</p>
                    <a href="#" class="btn-outline">Descubra</a>
                </div>
            </div>

        </section>
    </main>

<?php 
// Puxa o rodapé
include 'includes/footer.php';
?>