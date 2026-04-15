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
    .agenda-card { background: #fff; border-left: 4px solid #121212; padding: 25px; margin-bottom: 20px; display: flex; justify-content: space-between; align-items: center; box-shadow: 0 4px 10px rgba(0,0,0,0.03); }
    .agenda-date { text-align: center; border-right: 1px solid #eee; padding-right: 25px; margin-right: 25px; min-width: 100px; }
</style>

<main>
    <section class="account-hero">
        <div class="container">
            <div class="d-flex align-items-center gap-4">
                <div class="bg-dark d-flex justify-content-center align-items-center" style="width: 80px; height: 80px; border-radius: 50%; border: 2px solid #c9933b;">
                    <i class="bi bi-calendar-check text-white" style="font-size: 2.2rem;"></i>
                </div>
                <div>
                    <h6 class="text-uppercase mb-1" style="color: #c9933b; letter-spacing: 2px;">Sua Agenda VIP</h6>
                    <h2 class="fw-light mb-0">Meus Agendamentos</h2>
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
                    <a href="meus-veiculos.php" class="account-link"><i class="bi bi-car-front me-3 fs-5"></i> Meus Veículos</a>
                    <a href="agendamentos.php" class="account-link active"><i class="bi bi-calendar-check me-3 fs-5"></i> Agendamentos</a>
                    <a href="seguranca.php" class="account-link"><i class="bi bi-shield-lock me-3 fs-5"></i> Segurança</a>
                    <hr class="mx-4 my-3 text-muted">
                    <a href="logout.php" class="account-link text-danger"><i class="bi bi-box-arrow-right me-3 fs-5"></i> Sair da Conta</a>
                </div>
            </div>

            <div class="col-lg-9">
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h4 class="fw-light mb-0">Próximos Compromissos</h4>
                    <a href="aurora-service.php" class="btn btn-dark btn-sm rounded-0 px-4 text-uppercase" style="letter-spacing: 1px;"><i class="bi bi-plus-lg me-2"></i> Novo Agendamento</a>
                </div>

                <div class="agenda-card">
                    <div class="d-flex align-items-center">
                        <div class="agenda-date">
                            <span class="d-block text-danger fw-bold text-uppercase small" style="letter-spacing: 2px;">Out</span>
                            <span class="display-5 fw-light text-dark">24</span>
                            <span class="d-block text-muted small">09:00 AM</span>
                        </div>
                        <div>
                            <span class="badge bg-dark mb-2 rounded-0 text-uppercase" style="font-size: 10px; letter-spacing: 1px;">Aurora Service</span>
                            <h5 class="fw-light mb-1">Revisão Programada (10.000 km)</h5>
                            <p class="text-muted small mb-0"><i class="bi bi-geo-alt me-1"></i> Concessionária Aurora SP (Flagship Store)</p>
                            <p class="text-muted small mb-0"><i class="bi bi-car-front me-1"></i> Veículo: Vanguard M-Line (AUR-2026)</p>
                        </div>
                    </div>
                    <div>
                        <button class="btn btn-outline-danger btn-sm rounded-0 text-uppercase" style="font-size: 11px; letter-spacing: 1px;">Cancelar</button>
                    </div>
                </div>

                <div class="agenda-card" style="border-left-color: #ddd; opacity: 0.6;">
                    <div class="d-flex align-items-center">
                        <div class="agenda-date">
                            <span class="d-block text-muted fw-bold text-uppercase small" style="letter-spacing: 2px;">Jan</span>
                            <span class="display-5 fw-light text-muted">15</span>
                            <span class="d-block text-muted small">14:30 PM</span>
                        </div>
                        <div>
                            <span class="badge bg-secondary mb-2 rounded-0 text-uppercase" style="font-size: 10px; letter-spacing: 1px;">Concluído</span>
                            <h5 class="fw-light mb-1">Instalação Wallbox Premium</h5>
                            <p class="text-muted small mb-0"><i class="bi bi-geo-alt me-1"></i> Residência Cliente</p>
                        </div>
                    </div>
                    <div>
                        <button class="btn btn-outline-secondary btn-sm rounded-0 text-uppercase disabled" style="font-size: 11px; letter-spacing: 1px;">Finalizado</button>
                    </div>
                </div>

            </div>
        </div>
    </section>
</main>
<?php include 'includes/footer.php'; ?>