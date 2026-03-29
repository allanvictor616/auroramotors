<?php 
// Puxa o cabeçalho e o menu
include 'includes/header.php'; 
?>

    <main class="modelos-page">
        <div class="modelos-header">
            <h1>Descubra e configure todos os modelos Aurora.</h1>
            <p>Explore nossos modelos de carros mais recentes para encontrar a tecnologia inteligente, os recursos inovadores e o tipo de motor certo para você.</p>
        </div>

        <div class="modelos-container">
            <aside class="filtros-sidebar">
                <h3>Categorias</h3>
                <div class="filtros-grid">
                    <button class="btn-filtro" data-filter="suv">SUV</button>
                    <button class="btn-filtro" data-filter="seda">Sedã</button>
                    <button class="btn-filtro" data-filter="hatch">Hatch</button>
                    <button class="btn-filtro" data-filter="hyper">Hypercarro</button>
                </div>
                <button class="btn-limpar" id="btnLimparFiltros">Limpar Seleções</button>
            </aside>

            <section class="carros-vitrine">
                
                <div class="car-card" data-category="suv">
                    <span class="car-badge">SUV</span>
                    <h2>Aurora Zenith X-Drive</h2>
                    <img src="assets/img/zenith-banner.png" alt="Aurora Zenith">
                    <p class="car-price">Elétrico<br><strong>A partir de R$ 415.950</strong></p>
                </div>

                <div class="car-card" data-category="seda">
                    <span class="car-badge">Sedã</span>
                    <h2>Aurora Vanguard M-Line</h2>
                    <img src="assets/img/Vanguard M-Line.png" alt="Aurora Vanguard">
                    <p class="car-price">Híbrido<br><strong>A partir de R$ 480.850</strong></p>
                </div>

                <div class="car-card" data-category="hatch">
                    <span class="car-badge">Hatch</span>
                    <h2>Aurora Nexus N-Line</h2>
                    <img src="assets/img/Nexus N-Line.png" alt="Aurora Nexus">
                    <p class="car-price">Combustão<br><strong>A partir de R$ 320.950</strong></p>
                </div>

                <div class="car-card" data-category="hyper">
                    <span class="car-badge">Hypercarro</span>
                    <h2>Aurora Aethel V12</h2>
                    <img src="assets/img/Aethel V-12.png" alt="Aurora Aethel"> <p class="car-price">Híbrido Plug-in<br><strong>Consulte Condições</strong></p>
                </div>

            </section>
        </div>
    </main>

<?php 
// Puxa o rodapé
include 'includes/footer.php'; 
?>