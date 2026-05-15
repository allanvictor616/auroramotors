<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

$nomeExibicao = 'Cliente';

if (!empty($_SESSION['nome_usuario'])) {
    $partesNome = explode(' ', trim($_SESSION['nome_usuario']));

    if (count($partesNome) >= 2) {
        $nomeExibicao = $partesNome[0] . ' ' . end($partesNome);
    } else {
        $nomeExibicao = $partesNome[0];
    }
}

$erroLogin = $_SESSION['erro_login'] ?? '';
$erroCadastro = $_SESSION['erro_cadastro'] ?? '';
$sucessoCadastro = $_SESSION['sucesso_cadastro'] ?? '';

$deveAbrirModalLogin = !empty($erroLogin) || !empty($erroCadastro) || !empty($sucessoCadastro);
$deveMostrarCadastro = !empty($erroCadastro);

unset($_SESSION['erro_login']);
unset($_SESSION['erro_cadastro']);
unset($_SESSION['sucesso_cadastro']);
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aurora Motors | Premium Cars</title>

    <link rel="icon" type="image/png" href="assets/img/favicon.png">
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/header.css">
    <link rel="stylesheet" href="assets/css/footer.css">
    <link rel="stylesheet" href="assets/css/cart.css">
</head>

<body>
    <?php if (!empty($erroLogin) || !empty($erroCadastro) || !empty($sucessoCadastro)): ?>
        <div class="aurora-system-alert-wrapper">
            <?php if (!empty($erroLogin)): ?>
                <div class="aurora-system-alert aurora-system-alert-error">
                    <i class="bi bi-exclamation-circle me-2"></i>
                    <?php echo htmlspecialchars($erroLogin); ?>
                </div>
            <?php endif; ?>

            <?php if (!empty($erroCadastro)): ?>
                <div class="aurora-system-alert aurora-system-alert-error">
                    <i class="bi bi-exclamation-circle me-2"></i>
                    <?php echo htmlspecialchars($erroCadastro); ?>
                </div>
            <?php endif; ?>

            <?php if (!empty($sucessoCadastro)): ?>
                <div class="aurora-system-alert aurora-system-alert-success">
                    <i class="bi bi-check-circle me-2"></i>
                    <?php echo htmlspecialchars($sucessoCadastro); ?>
                </div>
            <?php endif; ?>
        </div>
    <?php endif; ?>

    <style>
        .aurora-system-alert-wrapper {
            position: fixed;
            top: 95px;
            right: 24px;
            z-index: 9999;
            width: min(420px, calc(100% - 48px));
        }

        .aurora-system-alert {
            background: #fff;
            border: 1px solid #e5e5e5;
            border-left: 4px solid #121212;
            padding: 16px 18px;
            margin-bottom: 10px;
            box-shadow: 0 15px 35px rgba(0,0,0,0.12);
            font-size: 14px;
            color: #333;
            animation: auroraAlertIn 0.35s ease;
        }

        .aurora-system-alert-error {
            border-left-color: #dc3545;
        }

        .aurora-system-alert-error i {
            color: #dc3545;
        }

        .aurora-system-alert-success {
            border-left-color: #c9933b;
        }

        .aurora-system-alert-success i {
            color: #c9933b;
        }

        @keyframes auroraAlertIn {
            from {
                opacity: 0;
                transform: translateY(-8px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @media (max-width: 576px) {
            .aurora-system-alert-wrapper {
                top: 80px;
                right: 12px;
                width: calc(100% - 24px);
            }
        }
    </style>

    <div id="cartToast" class="cart-toast d-none">
        <i class="bi bi-check-lg me-2"></i>
        <span id="toastMessage">Item adicionado com sucesso!</span>
    </div>

    <header class="aurora-header">
        <div class="header-left">
            <a href="index.php" class="logo-link">
                <img src="assets/img/logo_aurora_motors.png" alt="Aurora Motors Logo" class="main-logo">
            </a>
        </div>

        <nav class="main-nav">
            <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="modelos.php">Modelos</a></li>
                <li><a href="boutique.php">Boutique</a></li>
                
                <li class="has-megamenu">
                    <a href="#">
                        Compre Online 
                        <i class="bi bi-chevron-down ms-1" style="font-size: 10px;"></i>
                    </a>

                    <div class="megamenu">
                        <div class="megamenu-content">
                            <div class="megamenu-column">
                                <h4>COMPRE ONLINE</h4>
                                <ul>
                                    <li><a href="vendas-especiais.php">Condições & Vendas Corporativas</a></li>
                                    <li><a href="premium-selection.php">Aurora Premium Selection</a></li>
                                    <li><a href="aurora-exclusive.php">Aurora Exclusive & Tech</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </li>

                <li class="has-megamenu">
                    <a href="#">
                        Descubra a Aurora 
                        <i class="bi bi-chevron-down ms-1" style="font-size: 10px;"></i>
                    </a>

                    <div class="megamenu">
                        <div class="megamenu-content">
                            <div class="megamenu-column">
                                <h4>DESCUBRA A AURORA</h4>
                                <ul>
                                    <li><a href="servicos-financeiros.php">Serviços Financeiros</a></li>
                                    <li><a href="aurora-service.php">Aurora Service & Fidelidade</a></li>
                                    <li><a href="lifestyle-acessorios.php">Acessórios & Lifestyle</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </li>
            </ul>
        </nav>

        <div class="header-actions">
            <div class="dropdown">
                <button 
                    type="button" 
                    class="btn-help-header dropdown-toggle" 
                    data-bs-toggle="dropdown" 
                    aria-expanded="false"
                >
                    <i class="bi bi-question-circle"></i>
                    <span>Ajuda</span>
                </button>

                <ul class="dropdown-menu dropdown-menu-end rounded-0 shadow border-0 mt-3 help-dropdown">
                    <li class="dropdown-header text-uppercase small text-muted">
                        Central de Ajuda
                    </li>

                    <li>
                        <a 
                            class="dropdown-item py-2" 
                            href="#" 
                            data-bs-toggle="modal" 
                            data-bs-target="#modalAjudaPedido"
                        >
                            <i class="bi bi-box-seam me-2"></i> Problema com pedido?
                        </a>
                    </li>

                    <li>
                        <a 
                            class="dropdown-item py-2" 
                            href="#" 
                            data-bs-toggle="modal" 
                            data-bs-target="#modalAjudaProposta"
                        >
                            <i class="bi bi-file-earmark-text me-2"></i> Problema com proposta?
                        </a>
                    </li>

                    <li>
                        <a class="dropdown-item py-2" href="aurora-service.php">
                            <i class="bi bi-tools me-2"></i> Suporte e Serviços
                        </a>
                    </li>

                    <li>
                        <a class="dropdown-item py-2" href="agendar-revisao.php">
                            <i class="bi bi-calendar-check me-2"></i> Agendar Atendimento
                        </a>
                    </li>

                    <li>
                        <a class="dropdown-item py-2" href="meus-pedidos.php?aba=compras">
                            <i class="bi bi-truck me-2"></i> Acompanhar Pedido
                        </a>
                    </li>

                    <li><hr class="dropdown-divider"></li>

                    <li>
                        <a class="dropdown-item py-2" href="mailto:suporte@auroramotors.com.br">
                            <i class="bi bi-envelope me-2"></i> suporte@auroramotors.com.br
                        </a>
                    </li>

                    <li>
                        <a 
                            class="dropdown-item py-2" 
                            href="https://wa.me/551140022026" 
                            target="_blank"
                        >
                            <i class="bi bi-whatsapp me-2"></i> WhatsApp: (11) 4002-2026
                        </a>
                    </li>
                </ul>
            </div>
            
            <?php if (isset($_SESSION['logado']) && $_SESSION['logado'] === true): ?>
                <div class="dropdown user-dropdown">
                    <a 
                        href="#" 
                        class="user-header-link dropdown-toggle" 
                        data-bs-toggle="dropdown" 
                        aria-expanded="false"
                    >
                        <i class="bi bi-person-circle"></i>

                        <span class="user-greeting">
                            Olá, <?php echo htmlspecialchars($nomeExibicao); ?>
                        </span>
                    </a>

                    <ul class="dropdown-menu dropdown-menu-end rounded-0 shadow border-0 mt-3" style="min-width: 220px;">
                        <li>
                            <a class="dropdown-item py-2" href="minha-conta.php">
                                <i class="bi bi-person me-2"></i> Minha Conta
                            </a>
                        </li>

                        <li>
                            <a class="dropdown-item py-2" href="meus-pedidos.php">
                                <i class="bi bi-box-seam me-2"></i> Meus Pedidos
                            </a>
                        </li>

                        <li>
                            <a class="dropdown-item py-2" href="agendamentos.php">
                                <i class="bi bi-calendar-check me-2"></i> Agendamentos
                            </a>
                        </li>

                        <li><hr class="dropdown-divider"></li>

                        <li>
                            <a class="dropdown-item py-2 text-danger" href="logout.php">
                                <i class="bi bi-box-arrow-right me-2"></i> Sair
                            </a>
                        </li>
                    </ul>
                </div>
            <?php else: ?>
                <button type="button" class="btn btn-login-header" data-bs-toggle="modal" data-bs-target="#loginModal">
                    Login
                </button>
            <?php endif; ?>

            <a href="carrinho.php" class="cart-icon-link" title="Carrinho">
                <i class="bi bi-cart2"></i> 
                <span class="cart-counter" id="cartCount">0</span>
            </a>
        </div>
    </header>

    <div class="modal fade" id="loginModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content premium-modal">
                <div class="modal-header border-0 pb-0">
                    <button type="button" class="btn-close ms-auto" data-bs-dismiss="modal"></button>
                </div>
                
                <div class="modal-body overflow-hidden pt-0">
                    <div class="form-slider-wrapper" id="formSlider">
                        
                        <div class="form-section">
                            <h5 class="text-center mb-4" style="font-weight: 300; letter-spacing: 3px; text-transform: uppercase; color: #121212;">
                                Login Aurora
                            </h5>
                            
                            <form action="processa_login.php" method="POST" id="formLogin">
                                <div class="mb-3">
                                    <label class="form-label" style="color: #666; font-size: 12px; letter-spacing: 1px; text-transform: uppercase;">
                                        E-mail
                                    </label>

                                    <input 
                                        type="email" 
                                        name="email" 
                                        class="form-control premium-input" 
                                        placeholder="seu@email.com" 
                                        required
                                    >
                                </div>

                                <div class="mb-4">
                                    <label class="form-label" style="color: #666; font-size: 12px; letter-spacing: 1px; text-transform: uppercase;">
                                        Senha
                                    </label>

                                    <input 
                                        type="password" 
                                        name="senha" 
                                        class="form-control premium-input" 
                                        placeholder="••••••••" 
                                        required
                                    >
                                </div>

                                <button type="submit" class="btn btn-primary w-100 premium-btn mb-3">
                                    Entrar
                                </button>
                                
                                <div class="text-center">
                                    <a href="#" id="btnGoRegister" class="text-decoration-none" style="font-size: 14px; color: #555; transition: 0.3s;">
                                        Não possui conta? <strong style="color: #c9933b;">Criar agora</strong>
                                    </a>
                                </div>
                            </form>
                        </div>

                        <div class="form-section">
                            <h5 class="text-center mb-4" style="font-weight: 300; letter-spacing: 3px; text-transform: uppercase; color: #121212;">
                                Criar Conta
                            </h5>
                            
                            <form action="processa_cadastro.php" method="POST" id="formRegister">
                                <div class="mb-3">
                                    <label class="form-label" style="color: #666; font-size: 12px; letter-spacing: 1px; text-transform: uppercase;">
                                        Nome Completo
                                    </label>

                                    <input 
                                        type="text" 
                                        name="nome" 
                                        class="form-control premium-input" 
                                        placeholder="João da Silva" 
                                        required
                                    >
                                </div>

                                <div class="mb-3">
                                    <label class="form-label" style="color: #666; font-size: 12px; letter-spacing: 1px; text-transform: uppercase;">
                                        E-mail
                                    </label>

                                    <input 
                                        type="email" 
                                        name="email" 
                                        class="form-control premium-input" 
                                        placeholder="seu@email.com" 
                                        required
                                    >
                                </div>

                                <div class="mb-3">
                                    <label class="form-label" style="color: #666; font-size: 12px; letter-spacing: 1px; text-transform: uppercase;">
                                        Telefone
                                    </label>

                                    <input 
                                        type="text" 
                                        name="telefone" 
                                        class="form-control premium-input" 
                                        placeholder="(11) 99999-9999"
                                    >
                                </div>

                                <div class="mb-4">
                                    <label class="form-label" style="color: #666; font-size: 12px; letter-spacing: 1px; text-transform: uppercase;">
                                        Criar Senha
                                    </label>

                                    <input 
                                        type="password" 
                                        name="senha" 
                                        class="form-control premium-input" 
                                        placeholder="••••••••" 
                                        required
                                    >
                                </div>

                                <button type="submit" class="btn btn-primary w-100 premium-btn mb-3">
                                    Finalizar Cadastro
                                </button>
                                
                                <div class="text-center">
                                    <a href="#" id="btnGoLogin" class="text-decoration-none" style="font-size: 14px; color: #555; transition: 0.3s;">
                                        <i class="bi bi-arrow-left"></i> Voltar para Login
                                    </a>
                                </div>
                            </form>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="modalAjudaPedido" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-sm">
            <div class="modal-content premium-modal">
                <div class="modal-header border-0">
                    <h5 class="modal-title fw-light text-uppercase" style="letter-spacing: 2px;">
                        Problema com pedido?
                    </h5>
                    <button type="button" class="btn-close btn-close-black" data-bs-dismiss="modal"></button>
                </div>

                <div class="modal-body p-4 text-center">
                    <i class="bi bi-box-seam mb-3 d-block" style="font-size: 3rem; color: #c9933b;"></i>

                    <p class="text-muted small mb-4">
                        Nossa equipe pode ajudar com status de compra, cancelamento, entrega ou rastreio do seu pedido.
                    </p>

                    <a 
                        href="https://wa.me/551140022026?text=Olá,%20preciso%20de%20ajuda%20com%20um%20pedido%20da%20Aurora%20Motors." 
                        target="_blank"
                        class="btn btn-dark rounded-0 w-100 py-2 text-uppercase"
                        style="letter-spacing: 1px; font-size: 13px;"
                    >
                        Chamar no WhatsApp
                    </a>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="modalAjudaProposta" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-sm">
            <div class="modal-content premium-modal">
                <div class="modal-header border-0">
                    <h5 class="modal-title fw-light text-uppercase" style="letter-spacing: 2px;">
                        Problema com proposta?
                    </h5>
                    <button type="button" class="btn-close btn-close-black" data-bs-dismiss="modal"></button>
                </div>

                <div class="modal-body p-4 text-center">
                    <i class="bi bi-file-earmark-text mb-3 d-block" style="font-size: 3rem; color: #c9933b;"></i>

                    <p class="text-muted small mb-4">
                        Fale com um consultor para revisar dados da proposta, valores, modelo escolhido ou condições comerciais.
                    </p>

                    <a 
                        href="https://wa.me/551140022026?text=Olá,%20preciso%20de%20ajuda%20com%20uma%20proposta%20da%20Aurora%20Motors." 
                        target="_blank"
                        class="btn btn-dark rounded-0 w-100 py-2 text-uppercase"
                        style="letter-spacing: 1px; font-size: 13px;"
                    >
                        Chamar no WhatsApp
                    </a>
                </div>
            </div>
        </div>
    </div>

<?php if ($deveAbrirModalLogin): ?>
    <script>
        window.addEventListener('load', function () {
            const loginModalElement = document.getElementById('loginModal');

            if (!loginModalElement || typeof bootstrap === 'undefined') {
                return;
            }

            const loginModal = new bootstrap.Modal(loginModalElement);
            loginModal.show();

            const formSlider = document.getElementById('formSlider');

            <?php if ($deveMostrarCadastro): ?>
                if (formSlider) {
                    formSlider.style.transform = 'translateX(-50%)';
                }
            <?php else: ?>
                if (formSlider) {
                    formSlider.style.transform = 'translateX(0)';
                }
            <?php endif; ?>
        });
    </script>
<?php endif; ?>

<script>
    window.addEventListener('load', function () {
        const alerts = document.querySelectorAll('.aurora-system-alert');

        if (alerts.length > 0) {
            setTimeout(function () {
                alerts.forEach(function (alert) {
                    alert.style.transition = '0.35s ease';
                    alert.style.opacity = '0';
                    alert.style.transform = 'translateY(-8px)';

                    setTimeout(function () {
                        alert.remove();
                    }, 400);
                });
            }, 5500);
        }
    });
</script>