<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

require_once 'conexao.php';

if (!isset($_SESSION['logado']) || $_SESSION['logado'] !== true) {
    header("Location: index.php");
    exit;
}

$usuario_id = $_SESSION['usuario_id'];

$stmt = $pdo->prepare("SELECT * FROM veiculos WHERE usuario_id = :usuario_id ORDER BY id DESC");
$stmt->bindParam(':usuario_id', $usuario_id);
$stmt->execute();
$veiculos = $stmt->fetchAll();

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

    .vehicle-card {
        background: #fff;
        border: 1px solid #eaeaea;
        transition: 0.3s;
        overflow: hidden;
    }

    .vehicle-card img {
        width: 100%;
        height: 260px;
        object-fit: cover;
        background: #111;
    }

    .vehicle-info {
        padding: 35px;
    }

    .vehicle-telemetry {
        background-color: #121212;
        color: #fff;
        padding: 20px;
        font-family: monospace;
        font-size: 13px;
    }
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
                    <a href="logout.php" class="account-link text-danger"><i class="bi bi-box-arrow-right me-3 fs-5"></i> Sair da Conta</a>
                </div>
            </div>

            <div class="col-lg-9">
                <h4 class="fw-light mb-4">Veículos Vinculados</h4>

                <?php if (empty($veiculos)): ?>
                    <div class="vehicle-card shadow-sm p-5 text-center">
                        <i class="bi bi-car-front" style="font-size: 48px; color: #c9933b;"></i>
                        <h4 class="fw-light mt-3">Nenhum veículo encontrado</h4>
                        <p class="text-muted mb-0">Você ainda não possui veículos vinculados à sua conta.</p>
                    </div>
                <?php endif; ?>

                <?php foreach ($veiculos as $veiculo): ?>
                    <div class="vehicle-card shadow-sm mb-4">
                        <img src="<?php echo htmlspecialchars($veiculo['imagem']); ?>" alt="<?php echo htmlspecialchars($veiculo['modelo']); ?>">

                        <div class="vehicle-info">
                            <div class="d-flex justify-content-between align-items-start flex-wrap gap-3">
                                <div>
                                    <span class="badge bg-dark rounded-0 mb-2 text-uppercase">
                                        <?php echo htmlspecialchars($veiculo['status']); ?>
                                    </span>

                                    <h3 class="fw-light mb-2">
                                        <?php echo htmlspecialchars($veiculo['modelo']); ?>
                                    </h3>

                                    <p class="text-muted mb-0">
                                        <?php echo htmlspecialchars($veiculo['versao']); ?>
                                    </p>
                                </div>

                                <div class="text-end">
                                    <p class="small text-muted text-uppercase mb-1">Placa</p>
                                    <h5 class="mb-0"><?php echo htmlspecialchars($veiculo['placa']); ?></h5>
                                </div>
                            </div>

                            <hr class="my-4">

                            <div class="row g-4">
                                <div class="col-md-3">
                                    <p class="small text-muted text-uppercase mb-1">Motorização</p>
                                    <strong><?php echo htmlspecialchars($veiculo['motorizacao']); ?></strong>
                                </div>

                                <div class="col-md-3">
                                    <p class="small text-muted text-uppercase mb-1">Cor</p>
                                    <strong><?php echo htmlspecialchars($veiculo['cor']); ?></strong>
                                </div>

                                <div class="col-md-3">
                                    <p class="small text-muted text-uppercase mb-1">Ano</p>
                                    <strong><?php echo htmlspecialchars($veiculo['ano']); ?></strong>
                                </div>

                                <div class="col-md-3">
                                    <p class="small text-muted text-uppercase mb-1">Cadastro</p>
                                    <strong><?php echo date('d/m/Y', strtotime($veiculo['criado_em'])); ?></strong>
                                </div>
                            </div>
                        </div>

                        <div class="vehicle-telemetry">
                            STATUS: SISTEMA CONECTADO • GARANTIA: ATIVA • ÚLTIMA SINCRONIZAÇÃO: <?php echo date('d/m/Y H:i'); ?>
                        </div>
                    </div>
                <?php endforeach; ?>

            </div>
        </div>
    </section>
</main>

<?php include 'includes/footer.php'; ?>