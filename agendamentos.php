<?php
session_start();
require_once 'conexao.php';

if (!isset($_SESSION['logado']) || $_SESSION['logado'] !== true) {
    header("Location: index.php");
    exit;
}

$usuario_id = $_SESSION['usuario_id'] ?? null;

$sql = "SELECT * FROM agendamentos 
        WHERE usuario_id = :usuario_id 
        ORDER BY data_agendamento ASC, horario ASC";

$stmt = $pdo->prepare($sql);
$stmt->bindParam(':usuario_id', $usuario_id);
$stmt->execute();

$agendamentos = $stmt->fetchAll();

function mesAbreviado($data) {
    $meses = [
        '01' => 'JAN',
        '02' => 'FEV',
        '03' => 'MAR',
        '04' => 'ABR',
        '05' => 'MAI',
        '06' => 'JUN',
        '07' => 'JUL',
        '08' => 'AGO',
        '09' => 'SET',
        '10' => 'OUT',
        '11' => 'NOV',
        '12' => 'DEZ'
    ];

    $mes = date('m', strtotime($data));
    return $meses[$mes] ?? '';
}

function diaData($data) {
    return date('d', strtotime($data));
}

function horarioFormatado($horario) {
    return date('H:i', strtotime($horario));
}
?>

<?php include 'includes/header.php'; ?>

<style>
    .account-section {
        background-color: #f7f7f7;
        padding: 70px 0;
        min-height: 70vh;
    }

    .account-sidebar {
        background: #fff;
        padding: 35px 25px;
        box-shadow: 0 5px 20px rgba(0,0,0,0.05);
    }

    .account-sidebar a {
        display: flex;
        align-items: center;
        gap: 18px;
        padding: 16px 10px;
        color: #555;
        text-decoration: none;
        text-transform: uppercase;
        font-size: 13px;
        letter-spacing: 2px;
        transition: .3s;
    }

    .account-sidebar a:hover,
    .account-sidebar a.active {
        color: #c9933b;
        background-color: #fafafa;
    }

    .account-sidebar i {
        font-size: 20px;
    }

    .logout-link {
        color: #dc3545 !important;
        border-top: 1px solid #ddd;
        margin-top: 20px;
        padding-top: 25px !important;
    }

    .appointment-card {
        background: #fff;
        display: flex;
        align-items: center;
        padding: 30px;
        margin-bottom: 20px;
        box-shadow: 0 5px 20px rgba(0,0,0,0.03);
        border-left: 4px solid #121212;
    }

    .appointment-date {
        width: 120px;
        text-align: center;
        border-right: 1px solid #ddd;
        margin-right: 30px;
        flex-shrink: 0;
    }

    .appointment-date .month {
        color: #dc3545;
        font-weight: 700;
        letter-spacing: 3px;
        font-size: 14px;
    }

    .appointment-date .day {
        font-size: 48px;
        font-weight: 300;
        line-height: 1;
        color: #121212;
    }

    .appointment-date .time {
        color: #666;
        font-size: 14px;
        margin-top: 8px;
    }

    .appointment-info {
        flex: 1;
    }

    .appointment-info .badge-service {
        background: #121212;
        color: #fff;
        font-size: 11px;
        text-transform: uppercase;
        letter-spacing: 1px;
        padding: 4px 8px;
        display: inline-block;
        margin-bottom: 10px;
    }

    .appointment-info h4 {
        font-weight: 300;
        margin-bottom: 8px;
        color: #333;
    }

    .appointment-info p {
        margin-bottom: 4px;
        color: #666;
    }

    .appointment-status {
        margin-left: 20px;
    }

    .empty-box {
        background: #fff;
        padding: 50px;
        text-align: center;
        box-shadow: 0 5px 20px rgba(0,0,0,0.03);
    }

    @media (max-width: 768px) {
        .appointment-card {
            flex-direction: column;
            align-items: flex-start;
        }

        .appointment-date {
            border-right: none;
            border-bottom: 1px solid #ddd;
            margin-right: 0;
            margin-bottom: 20px;
            padding-bottom: 20px;
            width: 100%;
        }

        .appointment-status {
            margin-left: 0;
            margin-top: 20px;
        }
    }
</style>

<main>
    <section class="account-section">
        <div class="container">
            <div class="row g-4">

                <div class="col-lg-3">
                    <div class="account-sidebar">
                        <a href="minha-conta.php">
                            <i class="bi bi-person"></i>
                            Meu Perfil
                        </a>

                        <a href="meus-pedidos.php">
                            <i class="bi bi-box-seam"></i>
                            Meus Pedidos
                        </a>

                        <a href="meus-veiculos.php">
                            <i class="bi bi-car-front"></i>
                            Meus Veículos
                        </a>

                        <a href="agendamentos.php" class="active">
                            <i class="bi bi-calendar-check"></i>
                            Agendamentos
                        </a>

                        <a href="seguranca.php">
                            <i class="bi bi-shield-lock"></i>
                            Segurança
                        </a>

                        <a href="logout.php" class="logout-link">
                            <i class="bi bi-box-arrow-right"></i>
                            Sair da Conta
                        </a>
                    </div>
                </div>

                <div class="col-lg-9">
                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <h2 class="fw-light mb-0">Próximos Compromissos</h2>

                        <a href="agendar-revisao.php" class="btn btn-dark px-4 py-2 text-uppercase" style="letter-spacing: 1px;">
                            <i class="bi bi-plus-lg me-2"></i>
                            Novo Agendamento
                        </a>
                    </div>

                    <?php if (isset($_SESSION['sucesso_agendamento'])): ?>
                        <div class="alert alert-success">
                            <?php 
                                echo $_SESSION['sucesso_agendamento']; 
                                unset($_SESSION['sucesso_agendamento']);
                            ?>
                        </div>
                    <?php endif; ?>

                    <?php if (empty($agendamentos)): ?>

                        <div class="empty-box">
                            <i class="bi bi-calendar-x" style="font-size: 48px; color: #c9933b;"></i>
                            <h4 class="fw-light mt-3">Nenhum agendamento encontrado</h4>
                            <p class="text-muted mb-4">
                                Você ainda não possui compromissos agendados na Aurora Motors.
                            </p>
                            <a href="agendar-revisao.php" class="btn btn-dark px-4 py-2">
                                Agendar agora
                            </a>
                        </div>

                    <?php else: ?>

                        <?php foreach ($agendamentos as $agendamento): ?>
                            <div class="appointment-card">
                                <div class="appointment-date">
                                    <div class="month">
                                        <?php echo mesAbreviado($agendamento['data_agendamento']); ?>
                                    </div>

                                    <div class="day">
                                        <?php echo diaData($agendamento['data_agendamento']); ?>
                                    </div>

                                    <div class="time">
                                        <?php echo horarioFormatado($agendamento['horario']); ?>
                                    </div>
                                </div>

                                <div class="appointment-info">
                                    <span class="badge-service">
                                        Aurora Service
                                    </span>

                                    <h4>
                                        <?php echo htmlspecialchars($agendamento['servico']); ?>
                                    </h4>

                                    <p>
                                        <i class="bi bi-geo-alt"></i>
                                        Concessionária Aurora SP - Flagship Store
                                    </p>

                                    <p>
                                        <i class="bi bi-car-front"></i>
                                        Veículo: 
                                        <?php echo htmlspecialchars($agendamento['modelo']); ?>

                                        <?php if (!empty($agendamento['placa'])): ?>
                                            - Placa: <?php echo htmlspecialchars($agendamento['placa']); ?>
                                        <?php endif; ?>
                                    </p>

                                    <?php if (!empty($agendamento['observacoes'])): ?>
                                        <p>
                                            <i class="bi bi-chat-left-text"></i>
                                            <?php echo nl2br(htmlspecialchars($agendamento['observacoes'])); ?>
                                        </p>
                                    <?php endif; ?>
                                </div>

                                <div class="appointment-status">
                                    <?php if ($agendamento['status'] === 'Agendado'): ?>
                                        <span class="btn btn-outline-dark btn-sm text-uppercase">
                                            <?php echo htmlspecialchars($agendamento['status']); ?>
                                        </span>
                                    <?php else: ?>
                                        <span class="btn btn-outline-secondary btn-sm text-uppercase disabled">
                                            <?php echo htmlspecialchars($agendamento['status']); ?>
                                        </span>
                                    <?php endif; ?>
                                </div>
                            </div>
                        <?php endforeach; ?>

                    <?php endif; ?>

                </div>
            </div>
        </div>
    </section>
</main>

<?php include 'includes/footer.php'; ?>