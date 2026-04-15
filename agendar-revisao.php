<?php include 'includes/header.php'; ?>

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
</style>

<main>
    <section class="service-hero text-center">
        <div class="container">
            <h6 class="text-uppercase mb-3" style="color: #c9933b; letter-spacing: 2px;">Aurora Service & Care</h6>
            <h1 class="display-5 fw-light mb-3">Agendamento de Oficina</h1>
            <p class="text-muted mx-auto" style="max-width: 600px;">A precisão que o seu veículo exige. Escolha a data e o serviço desejado, e nossa equipe técnica preparará o box de atendimento antes mesmo da sua chegada.</p>
        </div>
    </section>

    <section class="container py-5 my-4">
        <div class="row justify-content-center">
            <div class="col-lg-9">
                <div class="service-form-box">
                    <form>
                        <h4 class="fw-light mb-4 pb-2 border-bottom">1. Dados do Veículo</h4>
                        <div class="row g-3 mb-5">
                            <div class="col-md-6">
                                <label class="text-muted small text-uppercase mb-2">Modelo do Veículo</label>
                                <select class="form-control-service w-100">
                                    <option>Selecione seu Aurora...</option>
                                    <option>Nexus N-Line</option>
                                    <option>Vanguard M-Line</option>
                                    <option>Zenith</option>
                                    <option>Outro modelo...</option>
                                </select>
                            </div>
                            <div class="col-md-3">
                                <label class="text-muted small text-uppercase mb-2">Placa</label>
                                <input type="text" class="form-control-service w-100" placeholder="AAA-0000" required>
                            </div>
                            <div class="col-md-3">
                                <label class="text-muted small text-uppercase mb-2">Quilometragem</label>
                                <input type="text" class="form-control-service w-100" placeholder="Ex: 25.000" required>
                            </div>
                        </div>

                        <h4 class="fw-light mb-4 pb-2 border-bottom">2. O Serviço</h4>
                        <div class="row g-3 mb-5">
                            <div class="col-md-6">
                                <label class="text-muted small text-uppercase mb-2">Tipo de Atendimento</label>
                                <select class="form-control-service w-100">
                                    <option>Revisão Programada</option>
                                    <option>Troca de Óleo / Filtros</option>
                                    <option>Diagnóstico Eletrônico</option>
                                    <option>Alinhamento e Balanceamento</option>
                                    <option>Atualização de Software (OTA/Presencial)</option>
                                    <option>Outros serviços</option>
                                </select>
                            </div>
                            <div class="col-md-3">
                                <label class="text-muted small text-uppercase mb-2">Data Desejada</label>
                                <input type="date" class="form-control-service w-100" required>
                            </div>
                            <div class="col-md-3">
                                <label class="text-muted small text-uppercase mb-2">Período</label>
                                <select class="form-control-service w-100">
                                    <option>Manhã (08h - 12h)</option>
                                    <option>Tarde (13h - 18h)</option>
                                </select>
                            </div>
                            <div class="col-12 mt-3">
                                <label class="text-muted small text-uppercase mb-2">Observações / Sintomas (Opcional)</label>
                                <textarea class="form-control-service w-100" rows="3" placeholder="Descreva qualquer barulho, luz no painel ou solicitação específica..."></textarea>
                            </div>
                        </div>

                        <h4 class="fw-light mb-4 pb-2 border-bottom">3. Seus Dados</h4>
                        <div class="row g-3 mb-5">
                            <div class="col-md-6">
                                <label class="text-muted small text-uppercase mb-2">Nome Completo</label>
                                <input type="text" class="form-control-service w-100" required>
                            </div>
                            <div class="col-md-6">
                                <label class="text-muted small text-uppercase mb-2">Celular / WhatsApp</label>
                                <input type="text" class="form-control-service w-100" required>
                            </div>
                        </div>

                        <button type="button" class="btn btn-dark w-100 py-3 text-uppercase" style="letter-spacing: 1px;">Confirmar Agendamento</button>
                    </form>
                </div>
            </div>
        </div>
    </section>
</main>

<?php include 'includes/footer.php'; ?>