<?php 
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

$nomeUsuario = $_SESSION['nome_usuario'] ?? '';
$emailUsuario = $_SESSION['email_usuario'] ?? '';

include 'includes/header.php'; 
?>

<main class="modelos-page">
    <div class="modelos-header">
        <h1>Descubra e configure todos os modelos Aurora.</h1>
        <p>
            Explore nossos modelos de carros mais recentes para encontrar a tecnologia inteligente, os recursos inovadores e o tipo de motor certo para você.
        </p>
    </div>

    <?php if (isset($_SESSION['erro_proposta'])): ?>
        <div class="alert alert-danger">
            <?php 
                echo $_SESSION['erro_proposta']; 
                unset($_SESSION['erro_proposta']);
            ?>
        </div>
    <?php endif; ?>

    <?php if (isset($_SESSION['sucesso_proposta'])): ?>
        <div class="alert alert-success">
            <?php 
                echo $_SESSION['sucesso_proposta']; 
                unset($_SESSION['sucesso_proposta']);
            ?>
        </div>
    <?php endif; ?>

    <div class="modelos-container">
        <aside class="filtros-sidebar">
            <h3>Categorias</h3>

            <div class="filtros-grid">
                <button class="btn-filtro" data-filter="suv">SUV</button>
                <button class="btn-filtro" data-filter="sedan">Sedan</button>
                <button class="btn-filtro" data-filter="hatch">Hatch</button>
                <button class="btn-filtro" data-filter="hypercarro">Hypercarro</button>
            </div>

            <button class="btn-limpar" id="btnLimparFiltros">
                Limpar Seleções
            </button>
        </aside>

        <section class="carros-vitrine">
            
            <div class="car-card" data-category="suv">
                <span class="car-badge">SUV</span>
                <h2>Aurora Zenith X-Drive</h2>
                <img src="assets/img/zenith-banner.png" alt="Aurora Zenith">

                <p class="car-price">
                    Elétrico<br>
                    <strong>A partir de R$ 415.950</strong>
                </p>

                <button 
                    class="btn btn-dark w-100 premium-btn mt-3 btn-proposta"
                    data-bs-toggle="modal"
                    data-bs-target="#propostaModeloModal"
                    data-modelo="Aurora Zenith X-Drive"
                    data-motor="Elétrico"
                    data-preco="415950.00"
                    data-preco-formatado="A partir de R$ 415.950"
                >
                    Solicitar Proposta
                </button>
            </div>

            <div class="car-card" data-category="sedan">
                <span class="car-badge">Sedan</span>
                <h2>Aurora Vanguard M-Line</h2>
                <img src="assets/img/Vanguard M-Line.png" alt="Aurora Vanguard">

                <p class="car-price">
                    Híbrido<br>
                    <strong>A partir de R$ 480.850</strong>
                </p>

                <button 
                    class="btn btn-dark w-100 premium-btn mt-3 btn-proposta"
                    data-bs-toggle="modal"
                    data-bs-target="#propostaModeloModal"
                    data-modelo="Aurora Vanguard M-Line"
                    data-motor="Híbrido"
                    data-preco="480850.00"
                    data-preco-formatado="A partir de R$ 480.850"
                >
                    Solicitar Proposta
                </button>
            </div>

            <div class="car-card" data-category="hatch">
                <span class="car-badge">Hatch</span>
                <h2>Aurora Nexus N-Line</h2>
                <img src="assets/img/Nexus N-Line.png" alt="Aurora Nexus"> 

                <p class="car-price">
                    Combustão<br>
                    <strong>A partir de R$ 380.950</strong>
                </p>

                <button 
                    class="btn btn-dark w-100 premium-btn mt-3 btn-proposta"
                    data-bs-toggle="modal"
                    data-bs-target="#propostaModeloModal"
                    data-modelo="Aurora Nexus N-Line"
                    data-motor="Combustão"
                    data-preco="380950.00"
                    data-preco-formatado="A partir de R$ 380.950"
                >
                    Solicitar Proposta
                </button>
            </div>

            <div class="car-card" data-category="hypercarro">
                <span class="car-badge">Hypercarro</span>
                <h2>Aurora Aethel V12</h2>
                <img src="assets/img/Aethel V-12.png" alt="Aurora Aethel"> 

                <p class="car-price">
                    Híbrido Plug-in<br>
                    <strong>Consulte Condições</strong>
                </p>

                <button 
                    class="btn btn-dark w-100 premium-btn mt-3 btn-proposta"
                    data-bs-toggle="modal"
                    data-bs-target="#propostaModeloModal"
                    data-modelo="Aurora Aethel V12"
                    data-motor="Híbrido Plug-in"
                    data-preco="0.00"
                    data-preco-formatado="Consulte Condições"
                >
                    Solicitar Proposta
                </button>
            </div>

        </section>
    </div>
</main>

<div class="modal fade" id="propostaModeloModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content premium-modal">
            <div class="modal-header border-0">
                <h5 class="modal-title text-center w-100 fw-light" style="letter-spacing: 2px;">
                    SOLICITAR PROPOSTA
                </h5>

                <button type="button" class="btn-close btn-close-black" data-bs-dismiss="modal"></button>
            </div>

            <div class="modal-body p-4">
                <p class="text-center mb-4" style="font-size: 0.9rem; color: #888;">
                    Complete seus dados para receber um atendimento personalizado.
                </p>

                <div class="bg-light p-3 mb-4">
                    <p class="small text-uppercase text-muted mb-2" style="letter-spacing: 1px;">
                        Modelo selecionado
                    </p>

                    <h5 class="fw-light mb-1" id="modeloSelecionadoTexto">
                        Aurora Motors
                    </h5>

                    <p class="mb-0 text-muted small" id="detalheSelecionadoTexto">
                        Escolha um modelo para solicitar proposta.
                    </p>
                </div>

                <form id="propostaModeloForm" action="processa_proposta.php" method="POST">
                    <input type="hidden" name="modelo" id="modeloProposta">
                    <input type="hidden" name="valor_total" id="valorTotalProposta">

                    <div class="mb-3">
                        <input 
                            type="text" 
                            name="nome" 
                            class="form-control premium-input" 
                            placeholder="NOME COMPLETO" 
                            value="<?php echo htmlspecialchars($nomeUsuario); ?>"
                            required
                        >
                    </div>

                    <div class="mb-3">
                        <input 
                            type="email" 
                            name="email" 
                            class="form-control premium-input" 
                            placeholder="E-MAIL" 
                            value="<?php echo htmlspecialchars($emailUsuario); ?>"
                            required
                        >
                    </div>

                    <div class="mb-3">
                        <input 
                            type="text" 
                            name="telefone" 
                            class="form-control premium-input" 
                            placeholder="TELEFONE / WHATSAPP" 
                            required
                        >
                    </div>

                    <div class="mb-4">
                        <textarea 
                            name="mensagem" 
                            class="form-control premium-input" 
                            rows="3" 
                            placeholder="MENSAGEM (OPCIONAL)"
                        ></textarea>
                    </div>

                    <button type="submit" class="btn btn-primary premium-btn w-100 mb-2">
                        ENVIAR PROPOSTA
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>

<?php 
include 'includes/footer.php'; 
?>