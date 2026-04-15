<?php
// TRAVA DE SEGURANÇA: Inicia a sessão e verifica se está logado
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Se não estiver logado, redireciona para a home
if (!isset($_SESSION['logado']) || $_SESSION['logado'] !== true) {
    header("Location: index.php");
    exit;
}

include 'includes/header.php'; 
?>

<style>
    body { background-color: #f8f9fa; }
    
    .account-hero {
        background-color: #121212;
        color: #fff;
        padding: 60px 0 40px;
    }
    
    .account-sidebar {
        background: #fff;
        border: 1px solid #eaeaea;
        padding: 30px 0;
    }
    
    .account-link {
        display: block;
        padding: 12px 30px;
        color: #555;
        text-decoration: none;
        text-transform: uppercase;
        font-size: 13px;
        letter-spacing: 1px;
        transition: 0.3s;
        border-left: 3px solid transparent;
    }
    
    .account-link:hover, .account-link.active {
        color: #c9933b;
        background-color: #fafafa;
        border-left-color: #c9933b;
        font-weight: 500;
    }
    
    .dashboard-card {
        background: #fff;
        border: 1px solid #eaeaea;
        padding: 40px;
        margin-bottom: 30px;
    }
    
    .garage-card {
        position: relative;
        height: 250px;
        background: linear-gradient(rgba(0,0,0,0.2), rgba(0,0,0,0.8)), url('assets/img/Vanguard M-Line.png') center/cover;
        display: flex;
        align-items: flex-end;
        padding: 30px;
        color: #fff;
        border-bottom: 4px solid #c9933b;
    }
    
    .form-control-profile {
        border-radius: 0;
        background-color: #fafafa;
        border: 1px solid #ddd;
        padding: 12px 15px;
        color: #555;
    }
    
    .form-control-profile:disabled {
        background-color: #f1f1f1;
        cursor: not-allowed;
    }
</style>

<main>
    <section class="account-hero">
        <div class="container">
            <div class="d-flex align-items-center gap-4">
                <div class="bg-dark d-flex justify-content-center align-items-center" style="width: 80px; height: 80px; border-radius: 50%; border: 2px solid #c9933b;">
                    <i class="bi bi-person text-white" style="font-size: 2.5rem;"></i>
                </div>
                <div>
                    <h6 class="text-uppercase mb-1" style="color: #c9933b; letter-spacing: 2px;">Portal do Cliente</h6>
                    <h2 class="fw-light mb-0">Bem-vindo de volta, <?= $_SESSION['nome_usuario']; ?></h2>
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
                    <a href="seguranca.php" class="account-link"><i class="bi bi-shield-lock me-3 fs-5"></i> Segurança</a>
                    <a href="logout.php" class="account-link text-danger"><i class="bi bi-box-arrow-right me-3 fs-5"></i> Sair da Conta</a>
                </div>
            </div>

            <div class="col-lg-9">
                
                <h4 class="fw-light mb-4">Minha Garagem</h4>
                <div class="garage-card mb-5 shadow-sm">
                    <div>
                        <span class="badge bg-dark mb-2 border border-secondary text-uppercase" style="letter-spacing: 1px;">Veículo Ativo</span>
                        <h3 class="fw-light mb-1">Aurora Vanguard M-Line</h3>
                        <p class="mb-0 text-white-50"><i class="bi bi-ev-station me-2"></i>Híbrido Plug-in • Placa: AUR-2026</p>
                    </div>
                </div>

                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h4 class="fw-light mb-0">Dados Pessoais</h4>
                    <button class="btn btn-outline-dark btn-sm rounded-0 px-4 text-uppercase" style="letter-spacing: 1px;"><i class="bi bi-pencil me-2"></i> Editar Dados</button>
                </div>
                
                <div class="dashboard-card shadow-sm">
                    <form>
                        <div class="row g-4">
                            <div class="col-md-6">
                                <label class="small text-uppercase mb-2 text-muted fw-bold">Nome Completo</label>
                                <input type="text" class="form-control-profile w-100" value="<?= $_SESSION['nome_usuario']; ?>" disabled>
                            </div>
                            <div class="col-md-6">
                                <label class="small text-uppercase mb-2 text-muted fw-bold">CPF</label>
                                <input type="text" class="form-control-profile w-100" value="***.456.789-**" disabled>
                            </div>
                            <div class="col-md-6">
                                <label class="small text-uppercase mb-2 text-muted fw-bold">E-mail</label>
                                <input type="email" class="form-control-profile w-100" value="cliente.vip@email.com" disabled>
                            </div>
                            <div class="col-md-6">
                                <label class="small text-uppercase mb-2 text-muted fw-bold">Telefone / WhatsApp</label>
                                <input type="text" class="form-control-profile w-100" value="(11) 98765-4321" disabled>
                            </div>
                        </div>

                        <hr class="my-5 text-muted">

                        <h5 class="fw-light mb-4">Endereço de Faturamento</h5>
                        <div class="row g-4">
                            <div class="col-md-8">
                                <label class="small text-uppercase mb-2 text-muted fw-bold">Logradouro</label>
                                <input type="text" class="form-control-profile w-100" value="Av. Brigadeiro Faria Lima, 3000" disabled>
                            </div>
                            <div class="col-md-4">
                                <label class="small text-uppercase mb-2 text-muted fw-bold">CEP</label>
                                <input type="text" class="form-control-profile w-100" value="01451-000" disabled>
                            </div>
                            <div class="col-md-4">
                                <label class="small text-uppercase mb-2 text-muted fw-bold">Cidade</label>
                                <input type="text" class="form-control-profile w-100" value="São Paulo" disabled>
                            </div>
                            <div class="col-md-4">
                                <label class="small text-uppercase mb-2 text-muted fw-bold">Estado</label>
                                <input type="text" class="form-control-profile w-100" value="SP" disabled>
                            </div>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </section>
</main>

<?php include 'includes/footer.php'; ?>