<?php
if (session_status() === PHP_SESSION_NONE) { session_start(); }
if (!isset($_SESSION['logado']) || $_SESSION['logado'] !== true) { header("Location: index.php"); exit; }
include 'includes/header.php'; 
?>

<style>
    body { background-color: #f8f9fa; }
    .account-hero { background-color: #121212; color: #fff; padding: 60px 0 40px; }
    .account-sidebar { background: #fff; border: 1px solid #eaeaea; padding: 30px 0; }
    .account-link { display: block; padding: 12px 30px; color: #555; text-decoration: none; text-transform: uppercase; font-size: 13px; letter-spacing: 1px; transition: 0.3s; border-left: 3px solid transparent; }
    .account-link:hover, .account-link.active { color: #c9933b; background-color: #fafafa; border-left-color: #c9933b; font-weight: 500; }
    .vehicle-card { background: #fff; border: 1px solid #eaeaea; transition: 0.3s; }
    .vehicle-telemetry { background-color: #121212; color: #fff; padding: 20px; font-family: monospace; font-size: 13px; }
</style>

<main>
    <section class="account-hero">
        <div class="container">
            <div class="d-flex align-items-center gap-4">
                <div class="bg-dark d-flex justify-content-center align-items-center" style="width: 80px; height: 80px; border-radius: 50%; border: 2px solid #c9933b;">
                    <i class="bi bi-car-front text-white" style="font-size: 2.2rem;"></i>
                </div>
                <div>
                    <h6 class="text-uppercase mb-1" style="color: #c9933b; letter-spacing: 2px;">Garagem Virtual</h6>
                    <h2 class="fw-light mb-0">Meus Veículos</h2>
                </div>
            </div>
        </div>
    </section>

    <section class="container py-5 my-3">
        <div class="row">
            <div class="col-lg-3 mb-5 mb-lg-0">
                <div class="account-sidebar shadow-sm">
                    <a href="minha-conta.php" class="account-link"><i class="bi bi-person me-3 fs-5"></i> Meu Perfil</a>
                    <a href="meus-pedidos.php" class="account-link"><i class="bi bi-box-seam me-3 fs-5"></i> Meus Pedidos</a>
                    <a href="meus-veiculos.php" class="account-link active"><i class="bi bi-car-front me-3 fs-5"></i> Meus Veículos</a>
                    <a href="agendamentos.php" class="account-link"><i class="bi bi-calendar-check me-3 fs-5"></i> Agendamentos</a>
                    <a href="seguranca.php" class="account-link"><i class="bi bi-shield-lock me-3 fs-5"></i> Segurança</a>
                    <hr class="mx-4 my-3 text-muted">
                    <a href="logout.php" class="account-link text-danger"><i class="bi bi-box-arrow-right me-3 fs-5"></i> Sair da Conta</a>
                </div>
            </div>

            <div class="col-lg-9">
                <div class="vehicle-card shadow-sm mb-4">
                    <div class="row g-0">
                        <div class="col-md-5" style="background: url('assets/img/Vanguard M-Line.png') center/cover; min-height: 250px;"></div>
                        <div class="col-md-7 p-4 p-lg-5">
                            <div class="d-flex justify-content-between align-items-start mb-3">
                                <div>
                                    <h4 class="fw-light mb-1">Aurora Vanguard M-Line</h4>
                                    <p class="text-muted small mb-0">Híbrido Plug-in • Ano 2026/2026</p>
                                </div>
                                <span class="badge bg-success border-0 text-uppercase" style="letter-spacing: 1px;"><i class="bi bi-wifi me-1"></i> Online</span>
                            </div>
                            
                            <hr class="text-muted my-4">
                            
                            <div class="row mb-4">
                                <div class="col-6">
                                    <p class="small text-uppercase text-muted mb-1 fw-bold">Placa</p>
                                    <p class="mb-0">AUR-2026</p>
                                </div>
                                <div class="col-6">
                                    <p class="small text-uppercase text-muted mb-1 fw-bold">Chassi (VIN)</p>
                                    <p class="mb-0">9BW ZZZ 3B Z P T 000001</p>
                                </div>
                            </div>
                            
                            <div class="d-flex gap-2">
                                <button class="btn btn-dark rounded-0 px-4 text-uppercase" style="font-size: 12px; letter-spacing: 1px;"><i class="bi bi-journal-text me-2"></i> Manual Digital</button>
                                <button class="btn btn-outline-dark rounded-0 px-4 text-uppercase" style="font-size: 12px; letter-spacing: 1px;">Connected Store</button>
                            </div>
                        </div>
                    </div>
                    <div class="vehicle-telemetry d-flex justify-content-around text-center">
                        <div><i class="bi bi-speedometer2 text-white-50 mb-2 fs-4 d-block"></i> Odômetro: <strong>1.450 km</strong></div>
                        <div><i class="bi bi-battery-charging text-white-50 mb-2 fs-4 d-block"></i> Bateria: <strong class="text-success">85%</strong></div>
                        <div><i class="bi bi-geo-alt text-white-50 mb-2 fs-4 d-block"></i> Localização: <strong>Protegida</strong></div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>
<?php include 'includes/footer.php'; ?>