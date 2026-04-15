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
    .security-card { background: #fff; border: 1px solid #eaeaea; padding: 40px; margin-bottom: 30px; }
    .form-control-security { border-radius: 0; background-color: #fafafa; border: 1px solid #ddd; padding: 12px 15px; }
    .form-control-security:focus { border-color: #121212; box-shadow: none; background-color: #fff; }
</style>

<main>
    <section class="account-hero">
        <div class="container">
            <div class="d-flex align-items-center gap-4">
                <div class="bg-dark d-flex justify-content-center align-items-center" style="width: 80px; height: 80px; border-radius: 50%; border: 2px solid #c9933b;">
                    <i class="bi bi-shield-lock text-white" style="font-size: 2.2rem;"></i>
                </div>
                <div>
                    <h6 class="text-uppercase mb-1" style="color: #c9933b; letter-spacing: 2px;">Privacidade e Acesso</h6>
                    <h2 class="fw-light mb-0">Segurança da Conta</h2>
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
                    <a href="agendamentos.php" class="account-link"><i class="bi bi-calendar-check me-3 fs-5"></i> Agendamentos</a>
                    <a href="seguranca.php" class="account-link active"><i class="bi bi-shield-lock me-3 fs-5"></i> Segurança</a>
                    <hr class="mx-4 my-3 text-muted">
                    <a href="logout.php" class="account-link text-danger"><i class="bi bi-box-arrow-right me-3 fs-5"></i> Sair da Conta</a>
                </div>
            </div>

            <div class="col-lg-9">
                <h4 class="fw-light mb-4">Alterar Senha</h4>
                <div class="security-card shadow-sm">
                    <form>
                        <div class="mb-4">
                            <label class="small text-uppercase mb-2 text-muted fw-bold">Senha Atual</label>
                            <input type="password" class="form-control-security w-100" placeholder="Digite sua senha atual">
                        </div>
                        <div class="row g-4 mb-4">
                            <div class="col-md-6">
                                <label class="small text-uppercase mb-2 text-muted fw-bold">Nova Senha</label>
                                <input type="password" class="form-control-security w-100" placeholder="Pelo menos 8 caracteres">
                            </div>
                            <div class="col-md-6">
                                <label class="small text-uppercase mb-2 text-muted fw-bold">Confirmar Nova Senha</label>
                                <input type="password" class="form-control-security w-100" placeholder="Repita a nova senha">
                            </div>
                        </div>
                        <button type="button" class="btn btn-dark rounded-0 px-5 py-2 text-uppercase" style="letter-spacing: 1px;">Atualizar Senha</button>
                    </form>
                </div>

                <h4 class="fw-light mb-4">Autenticação em Duas Etapas (2FA)</h4>
                <div class="security-card shadow-sm d-flex justify-content-between align-items-center">
                    <div>
                        <h6 class="mb-1">Autenticação via SMS/E-mail</h6>
                        <p class="text-muted small mb-0">Adicione uma camada extra de segurança ao seu Portal Aurora.</p>
                    </div>
                    <div class="form-check form-switch fs-4">
                        <input class="form-check-input" type="checkbox" role="switch" id="switch2FA" checked>
                    </div>
                </div>

            </div>
        </div>
    </section>
</main>
<?php include 'includes/footer.php'; ?>