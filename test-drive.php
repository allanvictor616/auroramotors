<?php include 'includes/header.php'; ?>

<style>
    /* Estética de Teaser / Em desenvolvimento */
    .coming-soon-hero {
        height: 85vh;
        background: linear-gradient(rgba(0,0,0,0.8), rgba(0,0,0,0.5)), url('assets/img/design-futuro.png') center/cover;
        display: flex;
        align-items: center;
        justify-content: center;
        text-align: center;
        color: #fff;
    }

    .coming-soon-content {
        max-width: 800px;
        padding: 20px;
    }

    .accent-line {
        width: 60px;
        height: 2px;
        background-color: #c9933b;
        margin: 20px auto;
    }

    .countdown-placeholder {
        font-family: 'Courier New', Courier, monospace;
        letter-spacing: 5px;
        font-size: 1.2rem;
        color: #c9933b;
        margin-top: 30px;
        text-transform: uppercase;
    }

    .back-link {
        color: #fff;
        text-decoration: none;
        font-size: 12px;
        letter-spacing: 2px;
        text-transform: uppercase;
        transition: 0.3s;
        border-bottom: 1px solid rgba(255,255,255,0.2);
        padding-bottom: 5px;
    }

    .back-link:hover {
        color: #c9933b;
        border-bottom-color: #c9933b;
    }
</style>

<main style="background-color: #000;">
    <section class="coming-soon-hero">
        <div class="coming-soon-content">
            <h6 class="text-uppercase mb-3" style="color: #c9933b; letter-spacing: 3px;">Experiência Aurora</h6>
            <h1 class="display-2 fw-light mb-4">Aguarde o Inesperado.</h1>
            
            <div class="accent-line"></div>
            
            <p class="lead text-white-50 mb-5" style="font-weight: 300; line-height: 1.8;">
                Estamos refinando o nosso sistema de agendamento online para garantir que o seu primeiro contato com um Aurora seja tão perfeito quanto a nossa engenharia. <br>
                <strong>O sistema de Test-Drive estará disponível em breve.</strong>
            </p>

            <div class="mb-5">
                <p class="text-uppercase small mb-3" style="letter-spacing: 1px; color: #888;">Quer ser o primeiro a pilotar?</p>
                <button class="btn btn-outline-light px-5 py-3 rounded-0 text-uppercase" style="letter-spacing: 1px;" data-bs-toggle="modal" data-bs-target="#testDriveModal">
                    Me avise quando disponível
                </button>
            </div>

            <div class="mt-5">
                <a href="index.php" class="back-link">
                    <i class="bi bi-arrow-left me-2"></i> Voltar para a Home
                </a>
            </div>

            <div class="countdown-placeholder">
                // System Status: Calibrating Experience
            </div>
        </div>
    </section>

    <div class="modal fade" id="testDriveModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content" style="background-color: #121212 !important; border: 1px solid #444; border-radius: 0;">
                <div class="modal-header border-0">
                    <h5 class="modal-title text-center w-100 fw-light" style="letter-spacing: 2px; color: #fff;">LISTA VIP - TEST DRIVE</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body p-4">
                    <div id="testDriveFormContent">
                        <p class="text-center mb-4" style="font-size: 0.9rem; color: #aaa;">Insira seus dados para entrar na nossa lista de prioridade. Avisaremos você assim que a agenda for liberada.</p>
                        <form id="testDriveForm">
                            <div class="mb-3">
                                <label class="small text-uppercase mb-1" style="letter-spacing: 1px; color: #888;">Nome Completo</label>
                                <input type="text" class="form-control rounded-0" style="background-color: #1a1a1a; border: 1px solid #333; color: #fff;" required>
                            </div>
                            <div class="mb-3">
                                <label class="small text-uppercase mb-1" style="letter-spacing: 1px; color: #888;">E-mail</label>
                                <input type="email" class="form-control rounded-0" style="background-color: #1a1a1a; border: 1px solid #333; color: #fff;" required>
                            </div>
                            <div class="mb-3">
                                <label class="small text-uppercase mb-1" style="letter-spacing: 1px; color: #888;">Telefone / WhatsApp</label>
                                <input type="text" class="form-control rounded-0" style="background-color: #1a1a1a; border: 1px solid #333; color: #fff;" required>
                            </div>
                            <div class="mb-4">
                                <label class="small text-uppercase mb-1" style="letter-spacing: 1px; color: #888;">Modelo de Interesse</label>
                                <select class="form-control rounded-0" style="background-color: #1a1a1a; border: 1px solid #333; color: #fff; appearance: auto;">
                                    <option value="" style="color: #ccc;">Selecione o modelo...</option>
                                    <option value="hibrido" style="color: #fff;">Linha Híbrida Plug-in</option>
                                    <option value="eletrico" style="color: #fff;">Linha 100% Elétrica</option>
                                    <option value="indefinido" style="color: #fff;">Ainda não decidi</option>
                                </select>
                            </div>
                            <button type="button" class="btn w-100 py-3 rounded-0 text-uppercase mt-2" style="background-color: #c9933b; color: #fff; border: none; letter-spacing: 1px;" data-bs-dismiss="modal" onclick="alert('Inscrição confirmada na Lista VIP! Entraremos em contato em breve.')">
                                Confirmar Inscrição
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

<?php include 'includes/footer.php'; ?>