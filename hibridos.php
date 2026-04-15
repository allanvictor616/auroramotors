<?php include 'includes/header.php'; ?>

<style>
    .phev-hero {
        position: relative;
        height: 70vh;
        background: linear-gradient(to right, rgba(18,18,18,0.9) 0%, rgba(18,18,18,0.3) 100%), url('assets/img/hibrido-banner.png') center/cover;
        display: flex;
        align-items: center;
    }
    .mode-card {
        border-left: 3px solid #333;
        padding-left: 20px;
        margin-bottom: 30px;
    }
</style>

<main>
    <section class="phev-hero">
        <div class="container text-white">
            <div class="col-lg-6">
                <h6 class="text-uppercase mb-3" style="color: #00d2ff; letter-spacing: 2px;">Tecnologia PHEV</h6>
                <h1 class="display-4 fw-light mb-4">O Melhor dos <br>Dois Mundos.</h1>
                <p class="lead text-white-50 mb-5" style="font-weight: 300;">A eficiência urbana do motor elétrico combinada com a liberdade na estrada do motor a combustão da Aurora.</p>
                <a href="test-drive.php" class="btn btn-outline-light px-5 py-3 text-uppercase rounded-0" style="letter-spacing: 1px;">Agende um Test-Drive</a>
            </div>
        </div>
    </section>

    <section class="container py-5 my-5">
        <div class="row align-items-center">
            <div class="col-lg-5 pe-lg-5 mb-5 mb-lg-0">
                <h2 class="display-6 fw-light mb-5">Inteligência Dinâmica</h2>
                
                <div class="mode-card">
                    <h5 class="fw-normal">Modo E-Drive (Puro Elétrico)</h5>
                    <p class="text-muted small">Ideal para o dia a dia na cidade. Condução 100% silenciosa e sem gastar uma gota de combustível, com autonomia para o trajeto casa-trabalho.</p>
                </div>
                
                <div class="mode-card">
                    <h5 class="fw-normal">Modo Hybrid Auto</h5>
                    <p class="text-muted small">O cérebro do veículo decide. O sistema alterna imperceptivelmente entre os motores para garantir a máxima eficiência com base na sua rota do GPS.</p>
                </div>

                <div class="mode-card" style="border-left-color: #c9933b;">
                    <h5 class="fw-normal">Modo Aurora Sport</h5>
                    <p class="text-muted small">Potência máxima. Os dois motores trabalham em conjunto para entregar uma aceleração visceral, ativando o verdadeiro DNA da Aurora Motors.</p>
                </div>
            </div>
            
            <div class="col-lg-7">
                <img src="assets/img/motor-futuro.png" alt="Motor Híbrido Aurora" class="img-fluid bg-light p-5" style="border: 1px solid #eee;">
            </div>
        </div>
    </section>
</main>

<?php include 'includes/footer.php'; ?>