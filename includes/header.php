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
    <div id="cartToast" class="cart-toast d-none">
        <i class="bi bi-check-lg me-2"></i>
        <span id="toastMessage">Item adicionado com sucesso!</span>
    </div>

    <header class="aurora-header">
        <div class="logo">
            <a href="index.php">
                <img src="assets/img/logo_aurora_motors.png" alt="Aurora Motors Logo" class="main-logo">
            </a>
        </div>

        <nav class="main-nav">
            <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="modelos.php">Modelos</a></li>
                
                <li class="has-megamenu">
                    <a href="#">Compre Online <i class="bi bi-chevron-down ms-1" style="font-size: 10px;"></i></a>
                    <div class="megamenu">
                        <div class="megamenu-content">
                            <div class="megamenu-column">
                                <h4>COMPRE ONLINE</h4>
                                <ul>
                                    <li><a href="condicoes-especiais.php">Condições Especiais</a></li>
                                    <li><a href="vendas-corporativas.php">Aurora Vendas Corporativas</a></li>
                                    <li><a href="premium-selection.php">Aurora Premium Selection</a></li>
                                    <li><a href="aurora-individual.php">Aurora Individual</a></li>
                                    <li><a href="connecteddrive-store.php">Aurora ConnectedDrive Store</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </li>

                <li class="has-megamenu">
                    <a href="#">Descubra a Aurora <i class="bi bi-chevron-down ms-1" style="font-size: 10px;"></i></a>
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
            <button type="button" class="btn btn-login-header" data-bs-toggle="modal" data-bs-target="#loginModal">
                Login
            </button>
            <a href="carrinho.php" class="cart-icon-link" style="color: #333; text-decoration: none;">
                <i class="bi bi-cart2"></i> <span class="cart-counter" id="cartCount">0</span>
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
                            <h5 class="text-center mb-4" style="font-weight: 300; letter-spacing: 3px; text-transform: uppercase; color: #121212;">Login Aurora</h5>
                            <form id="formLogin">
                                <div class="mb-3">
                                    <label class="form-label" style="color: #666; font-size: 12px; letter-spacing: 1px; text-transform: uppercase;">E-mail</label>
                                    <input type="email" class="form-control premium-input" placeholder="seu@email.com">
                                </div>
                                <div class="mb-4">
                                    <label class="form-label" style="color: #666; font-size: 12px; letter-spacing: 1px; text-transform: uppercase;">Senha</label>
                                    <input type="password" class="form-control premium-input" placeholder="••••••••">
                                </div>
                                <button type="button" class="btn btn-primary w-100 premium-btn mb-3" data-bs-dismiss="modal">Entrar</button>
                                
                                <div class="text-center">
                                    <a href="#" id="btnGoRegister" class="text-decoration-none" style="font-size: 14px; color: #555; transition: 0.3s;">Não possui conta? <strong style="color: #c9933b;">Criar agora</strong></a>
                                </div>
                            </form>
                        </div>

                        <div class="form-section">
                            <h5 class="text-center mb-4" style="font-weight: 300; letter-spacing: 3px; text-transform: uppercase; color: #121212;">Criar Conta</h5>
                            <form id="formRegister">
                                <div class="mb-3">
                                    <label class="form-label" style="color: #666; font-size: 12px; letter-spacing: 1px; text-transform: uppercase;">Nome Completo</label>
                                    <input type="text" class="form-control premium-input" placeholder="João da Silva">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label" style="color: #666; font-size: 12px; letter-spacing: 1px; text-transform: uppercase;">E-mail</label>
                                    <input type="email" class="form-control premium-input" placeholder="seu@email.com">
                                </div>
                                <div class="mb-4">
                                    <label class="form-label" style="color: #666; font-size: 12px; letter-spacing: 1px; text-transform: uppercase;">Criar Senha</label>
                                    <input type="password" class="form-control premium-input" placeholder="••••••••">
                                </div>
                                <button type="button" class="btn btn-primary w-100 premium-btn mb-3" data-bs-dismiss="modal">Finalizar Cadastro</button>
                                
                                <div class="text-center">
                                    <a href="#" id="btnGoLogin" class="text-decoration-none" style="font-size: 14px; color: #555; transition: 0.3s;"><i class="bi bi-arrow-left"></i> Voltar para Login</a>
                                </div>
                            </form>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>