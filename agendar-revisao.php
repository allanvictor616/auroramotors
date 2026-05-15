<?php 
include 'includes/header.php'; 

$nomeUsuario = $_SESSION['nome_usuario'] ?? '';
$emailUsuario = $_SESSION['email_usuario'] ?? '';
?>

<style>
    .service-hero {
        padding: 80px 0 40px;
        background-color: #f4f4f4;
        border-bottom: 1px solid #e0e0e0;
    }

    .service-form-box {
        background: #fff;
        padding: 50px;
        box-shadow: 0 10px 30px rgba(0,0,0,0.05);
        border-top: 3px solid #121212;
    }

    .form-control-service {
        border-radius: 0;
        padding: 12px 15px;
        background-color: #fafafa;
        border: 1px solid #ddd;
        font-size: 15px;
    }

    .form-control-service:focus {
        border-color: #121212;
        box-shadow: none;
        background-color: #fff;
    }

    .alert-aurora {
        border-radius: 0;
        font-size: 14px;
        letter-spacing: .3px;
    }
</style>

<main>
    <section class="service-hero text-center">
        <div class="container">
            <h6 class="text-uppercase mb-3" style="color: #c9933b; letter-spacing: 2px;">
                Aurora Service & Care
            </h6>
            <h1 class="display-5 fw-light mb-3">Agendamento de Oficina</h1>
            <p class="text-muted mx-auto" style="max-width: 600px;">
                A precisão que o seu veículo exige. Escolha a data e o serviço desejado, e nossa equipe técnica preparará o box de atendimento antes mesmo da sua chegada.
            </p>
        </div>
    </section>

    <section class="container py-5 my-4">
        <div class="row justify-content-center">
            <div class="col-lg-9">
                <div class="service-form-box">

                    <?php if (isset($_SESSION['sucesso_agendamento'])): ?>
                        <div class="alert alert-success alert-aurora mb-4">
                            <?php 
                                echo $_SESSION['sucesso_agendamento']; 
                                unset($_SESSION['sucesso_agendamento']);
                            ?>
                        </div>
                    <?php endif; ?>

                    <?php if (isset($_SESSION['erro_agendamento'])): ?>
                        <div class="alert alert-danger alert-aurora mb-4">
                            <?php 
                                echo $_SESSION['erro_agendamento']; 
                                unset($_SESSION['erro_agendamento']);
                            ?>
                        </div>
                    <?php endif; ?>

                    <form action="processa_agendamento.php" method="POST">
                        <h4 class="fw-light mb-4 pb-2 border-bottom">1. Dados do Veículo</h4>

                        <div class="row g-3 mb-5">
                            <div class="col-md-6">
                                <label class="text-muted small text-uppercase mb-2">Modelo do Veículo</label>
                                <select name="modelo" class="form-control-service w-100" required>
                                    <option value="">Selecione seu Aurora...</option>
                                    <option value="Nexus N-Line">Nexus N-Line</option>
                                    <option value="Vanguard M-Line">Vanguard M-Line</option>
                                    <option value="Zenith">Zenith</option>
                                    <option value="Outro modelo">Outro modelo...</option>
                                </select>
                            </div>

                            <div class="col-md-3">
                                <label class="text-muted small text-uppercase mb-2">Placa</label>
                                <input 
                                    type="text" 
                                    name="placa" 
                                    class="form-control-service w-100" 
                                    placeholder="AAA0B12" 
                                    required
                                >
                            </div>

                            <div class="col-md-3">
                                <label class="text-muted small text-uppercase mb-2">Quilometragem</label>
                                <input 
                                    type="text" 
                                    name="quilometragem" 
                                    class="form-control-service w-100" 
                                    placeholder="Ex: 25.000" 
                                    required
                                >
                            </div>
                        </div>

                        <h4 class="fw-light mb-4 pb-2 border-bottom">2. O Serviço</h4>

                        <div class="row g-3 mb-5">
                            <div class="col-md-6">
                                <label class="text-muted small text-uppercase mb-2">Tipo de Atendimento</label>
                                <select name="servico" class="form-control-service w-100" required>
                                    <option value="Revisão Programada">Revisão Programada</option>
                                    <option value="Troca de Óleo / Filtros">Troca de Óleo / Filtros</option>
                                    <option value="Diagnóstico Eletrônico">Diagnóstico Eletrônico</option>
                                    <option value="Alinhamento e Balanceamento">Alinhamento e Balanceamento</option>
                                    <option value="Atualização de Software">Atualização de Software (OTA/Presencial)</option>
                                    <option value="Outros serviços">Outros serviços</option>
                                </select>
                            </div>

                            <div class="col-md-3">
                                <label class="text-muted small text-uppercase mb-2">Data Desejada</label>
                                <input 
                                    type="date" 
                                    name="data_agendamento" 
                                    class="form-control-service w-100" 
                                    required
                                >
                            </div>

                            <div class="col-md-3">
                                <label class="text-muted small text-uppercase mb-2">Período</label>
                                <select name="periodo" id="periodo" class="form-control-service w-100" required>
                                    <option value="08:00:00">Manhã (08h - 12h)</option>
                                    <option value="13:00:00">Tarde (13h - 18h)</option>
                                </select>
                            </div>

                            <input type="hidden" name="horario" id="horario" value="08:00:00">

                            <div class="col-12 mt-3">
                                <label class="text-muted small text-uppercase mb-2">Observações / Sintomas (Opcional)</label>
                                <textarea 
                                    name="observacoes" 
                                    class="form-control-service w-100" 
                                    rows="3" 
                                    placeholder="Descreva qualquer barulho, luz no painel ou solicitação específica..."
                                ></textarea>
                            </div>
                        </div>

                        <h4 class="fw-light mb-4 pb-2 border-bottom">3. Seus Dados</h4>

                        <div class="row g-3 mb-5">
                            <div class="col-md-6">
                                <label class="text-muted small text-uppercase mb-2">Nome Completo</label>
                                <input 
                                    type="text" 
                                    name="nome" 
                                    class="form-control-service w-100" 
                                    value="<?php echo htmlspecialchars($nomeUsuario); ?>"
                                    required
                                >
                            </div>

                            <div class="col-md-6">
                                <label class="text-muted small text-uppercase mb-2">E-mail</label>
                                <input 
                                    type="email" 
                                    name="email" 
                                    class="form-control-service w-100" 
                                    value="<?php echo htmlspecialchars($emailUsuario); ?>"
                                    required
                                >
                            </div>

                            <div class="col-md-12">
                                <label class="text-muted small text-uppercase mb-2">Celular / WhatsApp</label>
                                <input 
                                    type="text" 
                                    name="telefone" 
                                    class="form-control-service w-100" 
                                    placeholder="(11) 99999-9999"
                                    required
                                >
                            </div>
                        </div>

                        <button type="submit" class="btn btn-dark w-100 py-3 text-uppercase" style="letter-spacing: 1px;">
                            Confirmar Agendamento
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </section>
</main>

<script>
    const periodo = document.getElementById('periodo');
    const horario = document.getElementById('horario');

    if (periodo && horario) {
        periodo.addEventListener('change', function () {
            horario.value = this.value;
        });
    }
</script>

<?php include 'includes/footer.php'; ?>