<?php include 'includes/header.php'; ?>

<style>
    .form-page-hero {
        padding: 80px 0 40px;
        background-color: #f9f9f9;
        border-bottom: 1px solid #eee;
    }
    .premium-form-box {
        background: #fff;
        padding: 50px;
        box-shadow: 0 10px 30px rgba(0,0,0,0.05);
        border-top: 3px solid #c9933b;
    }
    .form-control {
        border-radius: 0;
        padding: 15px;
        background-color: #fcfcfc;
        border: 1px solid #ddd;
    }
    .form-control:focus {
        border-color: #c9933b;
        box-shadow: none;
        background-color: #fff;
    }
</style>

<main>
    <section class="form-page-hero text-center">
        <div class="container">
            <h6 class="text-uppercase mb-3" style="color: #c9933b; letter-spacing: 2px;">Aurora Select</h6>
            <h1 class="display-5 fw-light mb-3">Simulação de Financiamento</h1>
            <p class="text-muted mx-auto" style="max-width: 600px;">Dê o primeiro passo para a sua próxima conquista. Preencha os dados abaixo e nossos especialistas enviarão uma proposta personalizada em até 2 horas úteis.</p>
        </div>
    </section>

    <section class="container py-5 my-4">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="premium-form-box">
                    <form>
                        <h4 class="fw-light mb-4 pb-2 border-bottom">Dados Pessoais</h4>
                        <div class="row g-3 mb-4">
                            <div class="col-md-6">
                                <label class="text-muted small text-uppercase mb-2">Nome Completo</label>
                                <input type="text" class="form-control" required>
                            </div>
                            <div class="col-md-6">
                                <label class="text-muted small text-uppercase mb-2">CPF</label>
                                <input type="text" class="form-control" required>
                            </div>
                            <div class="col-md-6">
                                <label class="text-muted small text-uppercase mb-2">E-mail</label>
                                <input type="email" class="form-control" required>
                            </div>
                            <div class="col-md-6">
                                <label class="text-muted small text-uppercase mb-2">Celular / WhatsApp</label>
                                <input type="text" class="form-control" required>
                            </div>
                        </div>

                        <h4 class="fw-light mb-4 pb-2 border-bottom">Interesse</h4>
                        <div class="row g-3 mb-5">
                            <div class="col-md-12">
                                <label class="text-muted small text-uppercase mb-2">Modelo Desejado</label>
                                <select class="form-control">
                                    <option>Selecione um modelo...</option>
                                    <option>Aurora Nexus N-Line</option>
                                    <option>Aurora Vanguard M-Line</option>
                                    <option>Aurora Zenith</option>
                                    <option>Aurora Aethel V-12</option>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label class="text-muted small text-uppercase mb-2">Valor de Entrada Previsto (R$)</label>
                                <input type="text" class="form-control" placeholder="Ex: 150.000,00">
                            </div>
                            <div class="col-md-6">
                                <label class="text-muted small text-uppercase mb-2">Dar veículo na troca?</label>
                                <select class="form-control">
                                    <option>Sim</option>
                                    <option>Não</option>
                                </select>
                            </div>
                        </div>

                        <button type="button" class="btn btn-dark w-100 py-3 text-uppercase" style="letter-spacing: 1px;">Enviar Solicitação de Simulação</button>
                    </form>
                </div>
            </div>
        </div>
    </section>
</main>

<?php include 'includes/footer.php'; ?>