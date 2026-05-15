<?php include 'includes/header.php'; ?>

<style>
    .simulation-page {
        background: #f5f5f5;
        min-height: 100vh;
        color: #121212;
    }

    .simulation-hero {
        position: relative;
        min-height: 460px;
        display: flex;
        align-items: center;
        color: #fff;
        background:
            linear-gradient(90deg, rgba(0,0,0,0.92), rgba(0,0,0,0.68), rgba(0,0,0,0.25)),
            url('assets/img/hero-finance.png') center/cover;
        border-bottom: 4px solid #c9933b;
    }

    .simulation-hero-content {
        max-width: 760px;
    }

    .simulation-kicker {
        color: #c9933b;
        text-transform: uppercase;
        letter-spacing: 3px;
        font-size: 13px;
        font-weight: 600;
        margin-bottom: 18px;
    }

    .simulation-hero h1 {
        font-size: clamp(2.6rem, 5vw, 5rem);
        font-weight: 300;
        margin-bottom: 22px;
        letter-spacing: 1px;
    }

    .simulation-hero p {
        color: rgba(255,255,255,0.78);
        line-height: 1.9;
        font-size: 1.05rem;
        max-width: 680px;
    }

    .simulation-section {
        padding: 80px 0;
    }

    .simulation-form-box {
        background: #fff;
        border: 1px solid #e8e8e8;
        border-top: 3px solid #121212;
        padding: 45px;
        box-shadow: 0 12px 32px rgba(0,0,0,0.055);
    }

    .simulation-side-card {
        background: #121212;
        color: #fff;
        border-top: 3px solid #c9933b;
        padding: 38px;
        height: 100%;
        box-shadow: 0 18px 45px rgba(0,0,0,0.12);
    }

    .simulation-side-card h3 {
        font-weight: 300;
        margin-bottom: 18px;
    }

    .simulation-side-card p {
        color: rgba(255,255,255,0.68);
        line-height: 1.8;
        font-size: 14px;
    }

    .simulation-step {
        display: flex;
        gap: 14px;
        padding: 16px 0;
        border-bottom: 1px solid rgba(255,255,255,0.09);
    }

    .simulation-step:last-child {
        border-bottom: none;
    }

    .simulation-step span {
        width: 30px;
        height: 30px;
        background: #c9933b;
        color: #fff;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        font-size: 12px;
        flex-shrink: 0;
    }

    .simulation-step strong {
        display: block;
        font-weight: 500;
        margin-bottom: 4px;
    }

    .simulation-step small {
        color: rgba(255,255,255,0.62);
        line-height: 1.6;
    }

    .form-section-title {
        display: flex;
        align-items: center;
        gap: 14px;
        margin-bottom: 28px;
        padding-bottom: 16px;
        border-bottom: 1px solid #e5e5e5;
    }

    .form-section-number {
        width: 34px;
        height: 34px;
        background: #121212;
        color: #c9933b;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        font-size: 13px;
        font-weight: 600;
        flex-shrink: 0;
    }

    .form-section-title h4 {
        font-weight: 300;
        margin: 0;
    }

    .form-label-premium {
        color: #666;
        font-size: 12px;
        text-transform: uppercase;
        letter-spacing: 1px;
        margin-bottom: 8px;
    }

    .form-control-simulation {
        border-radius: 0;
        padding: 14px 15px;
        background-color: #fafafa;
        border: 1px solid #ddd;
        color: #333;
        width: 100%;
    }

    .form-control-simulation:focus {
        border-color: #c9933b;
        box-shadow: none;
        background-color: #fff;
        outline: none;
    }

    .approval-notice {
        background: #fff8ed;
        border: 1px solid #ead1a8;
        border-left: 4px solid #c9933b;
        padding: 20px;
        margin-bottom: 35px;
    }

    .approval-notice h6 {
        color: #121212;
        text-transform: uppercase;
        letter-spacing: 1.5px;
        font-size: 13px;
        margin-bottom: 8px;
        font-weight: 600;
    }

    .approval-notice p {
        color: #666;
        margin: 0;
        line-height: 1.7;
        font-size: 14px;
    }

    .summary-box {
        background: #f8f8f8;
        border: 1px solid #e5e5e5;
        padding: 24px;
        margin-top: 35px;
    }

    .summary-box h5 {
        font-weight: 300;
        margin-bottom: 16px;
    }

    .summary-item {
        display: flex;
        justify-content: space-between;
        gap: 16px;
        padding: 10px 0;
        border-bottom: 1px solid #e5e5e5;
        font-size: 14px;
    }

    .summary-item:last-child {
        border-bottom: none;
    }

    .summary-item span {
        color: #777;
    }

    .summary-item strong {
        color: #121212;
        text-align: right;
    }

    .btn-simulation {
        background: #121212;
        border: 1px solid #121212;
        color: #fff;
        width: 100%;
        padding: 16px 20px;
        text-transform: uppercase;
        letter-spacing: 1.5px;
        font-size: 13px;
        transition: 0.3s ease;
    }

    .btn-simulation:hover {
        background: #c9933b;
        border-color: #c9933b;
        color: #fff;
    }

    .simulation-disclaimer {
        color: #888;
        font-size: 12px;
        line-height: 1.7;
        margin-top: 18px;
        text-align: center;
    }

    @media (max-width: 992px) {
        .simulation-side-card {
            margin-top: 30px;
        }

        .simulation-section {
            padding: 60px 0;
        }
    }

    @media (max-width: 576px) {
        .simulation-hero {
            min-height: 420px;
        }

        .simulation-form-box,
        .simulation-side-card {
            padding: 28px;
        }
    }
</style>

<main class="simulation-page">
    <section class="simulation-hero">
        <div class="container">
            <div class="simulation-hero-content">
                <div class="simulation-kicker">
                    Aurora Select
                </div>

                <h1>Simulação de Financiamento</h1>

                <p>
                    Solicite uma análise personalizada para o seu próximo Aurora. Nossa equipe financeira avaliará seu perfil e retornará com uma proposta sob medida por meio de um consultor especializado.
                </p>
            </div>
        </div>
    </section>

    <section class="simulation-section">
        <div class="container">
            <div class="row g-4 align-items-start">
                <div class="col-lg-8">
                    <div class="simulation-form-box">
                        <div class="approval-notice">
                            <h6>
                                <i class="bi bi-shield-check me-2"></i>
                                Solicitação sujeita à aprovação
                            </h6>

                            <p>
                                O envio deste formulário não representa aprovação automática de crédito. Após a solicitação, um consultor da Aurora Motors entrará em contato para validar os dados, entender seu perfil e apresentar as melhores condições disponíveis.
                            </p>
                        </div>

                        <form action="#" method="POST">
                            <div class="form-section-title">
                                <div class="form-section-number">1</div>
                                <h4>Dados Pessoais</h4>
                            </div>

                            <div class="row g-3 mb-5">
                                <div class="col-md-6">
                                    <label class="form-label-premium">Nome Completo</label>
                                    <input type="text" name="nome" class="form-control-simulation" required>
                                </div>

                                <div class="col-md-6">
                                    <label class="form-label-premium">CPF</label>
                                    <input type="text" name="cpf" class="form-control-simulation" placeholder="000.000.000-00" required>
                                </div>

                                <div class="col-md-6">
                                    <label class="form-label-premium">E-mail</label>
                                    <input type="email" name="email" class="form-control-simulation" required>
                                </div>

                                <div class="col-md-6">
                                    <label class="form-label-premium">Celular / WhatsApp</label>
                                    <input type="text" name="telefone" class="form-control-simulation" placeholder="(11) 99999-9999" required>
                                </div>
                            </div>

                            <div class="form-section-title">
                                <div class="form-section-number">2</div>
                                <h4>Veículo de Interesse</h4>
                            </div>

                            <div class="row g-3 mb-5">
                                <div class="col-md-12">
                                    <label class="form-label-premium">Modelo Desejado</label>
                                    <select name="modelo" class="form-control-simulation" required>
                                        <option value="">Selecione um modelo...</option>
                                        <option>Aurora Nexus N-Line</option>
                                        <option>Aurora Vanguard M-Line</option>
                                        <option>Aurora Zenith X-Drive</option>
                                        <option>Aurora Aethel V-12</option>
                                    </select>
                                </div>

                                <div class="col-md-6">
                                    <label class="form-label-premium">Valor Estimado do Veículo</label>
                                    <select name="valor_veiculo" class="form-control-simulation" required>
                                        <option value="">Selecione uma faixa...</option>
                                        <option>Até R$ 250.000</option>
                                        <option>R$ 250.000 a R$ 400.000</option>
                                        <option>R$ 400.000 a R$ 600.000</option>
                                        <option>Acima de R$ 600.000</option>
                                    </select>
                                </div>

                                <div class="col-md-6">
                                    <label class="form-label-premium">Valor de Entrada Previsto</label>
                                    <input type="text" name="entrada" class="form-control-simulation" placeholder="Ex: R$ 150.000,00">
                                </div>
                            </div>

                            <div class="form-section-title">
                                <div class="form-section-number">3</div>
                                <h4>Perfil da Simulação</h4>
                            </div>

                            <div class="row g-3 mb-5">
                                <div class="col-md-6">
                                    <label class="form-label-premium">Prazo Desejado</label>
                                    <select name="prazo" class="form-control-simulation" required>
                                        <option value="">Selecione...</option>
                                        <option>12 meses</option>
                                        <option>24 meses</option>
                                        <option>36 meses</option>
                                        <option>48 meses</option>
                                        <option>60 meses</option>
                                    </select>
                                </div>

                                <div class="col-md-6">
                                    <label class="form-label-premium">Dar veículo na troca?</label>
                                    <select name="veiculo_troca" class="form-control-simulation" required>
                                        <option value="">Selecione...</option>
                                        <option>Sim</option>
                                        <option>Não</option>
                                        <option>Ainda estou avaliando</option>
                                    </select>
                                </div>

                                <div class="col-md-6">
                                    <label class="form-label-premium">Tipo de Pessoa</label>
                                    <select name="tipo_pessoa" class="form-control-simulation" required>
                                        <option value="">Selecione...</option>
                                        <option>Pessoa Física</option>
                                        <option>Pessoa Jurídica</option>
                                    </select>
                                </div>

                                <div class="col-md-6">
                                    <label class="form-label-premium">Melhor horário para contato</label>
                                    <select name="horario_contato" class="form-control-simulation" required>
                                        <option value="">Selecione...</option>
                                        <option>Manhã</option>
                                        <option>Tarde</option>
                                        <option>Noite</option>
                                    </select>
                                </div>

                                <div class="col-12">
                                    <label class="form-label-premium">Observações para o consultor</label>
                                    <textarea 
                                        name="observacoes" 
                                        class="form-control-simulation" 
                                        rows="4" 
                                        placeholder="Ex: gostaria de avaliar entrada reduzida, incluir seguro, simular com veículo usado na troca..."
                                    ></textarea>
                                </div>
                            </div>

                            <div class="summary-box">
                                <h5>O que acontece após o envio?</h5>

                                <div class="summary-item">
                                    <span>Status inicial</span>
                                    <strong>Solicitação recebida</strong>
                                </div>

                                <div class="summary-item">
                                    <span>Análise</span>
                                    <strong>Validação de perfil e crédito</strong>
                                </div>

                                <div class="summary-item">
                                    <span>Retorno</span>
                                    <strong>Consultor Aurora Motors</strong>
                                </div>

                                <div class="summary-item">
                                    <span>Prazo estimado</span>
                                    <strong>Até 2 horas úteis</strong>
                                </div>
                            </div>

                            <div class="mt-4">
                                <button type="submit" class="btn-simulation">
                                    Enviar Solicitação de Simulação
                                </button>

                                <p class="simulation-disclaimer">
                                    A simulação é informativa e está sujeita à análise cadastral, aprovação de crédito, disponibilidade do modelo escolhido e validação das condições comerciais no momento do atendimento.
                                </p>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="col-lg-4">
                    <div class="simulation-side-card">
                        <div class="simulation-kicker">
                            Atendimento Consultivo
                        </div>

                        <h3>Um especialista Aurora acompanhará sua solicitação.</h3>

                        <p>
                            Após o envio, nossa equipe financeira entra em contato para confirmar informações, entender sua necessidade e apresentar a melhor estrutura de aquisição.
                        </p>

                        <div class="simulation-step">
                            <span>1</span>
                            <div>
                                <strong>Recebimento</strong>
                                <small>Sua solicitação é registrada para análise inicial.</small>
                            </div>
                        </div>

                        <div class="simulation-step">
                            <span>2</span>
                            <div>
                                <strong>Validação</strong>
                                <small>O consultor verifica dados, modelo desejado e perfil de compra.</small>
                            </div>
                        </div>

                        <div class="simulation-step">
                            <span>3</span>
                            <div>
                                <strong>Simulação</strong>
                                <small>São preparadas condições personalizadas para o seu cenário.</small>
                            </div>
                        </div>

                        <div class="simulation-step">
                            <span>4</span>
                            <div>
                                <strong>Contato</strong>
                                <small>Você recebe o retorno por telefone, WhatsApp ou e-mail.</small>
                            </div>
                        </div>

                        <div class="mt-4 p-3" style="background: rgba(255,255,255,0.05); border-left: 3px solid #c9933b;">
                            <p class="mb-0 small">
                                <strong class="text-white">Importante:</strong> esta etapa não gera contrato automático. É apenas uma solicitação de análise e proposta personalizada.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>

<?php include 'includes/footer.php'; ?>