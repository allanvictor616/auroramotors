<?php include 'includes/header.php'; ?>

<main class="container pt-2 pb-5">
    <h1 class="text-center fw-light mb-4">Fale Conosco</h1>
    <p class="text-center text-muted mb-5">Nossa equipe executiva está à disposição para oferecer o atendimento premium que você espera.</p>

    <div class="row justify-content-center">
        <div class="col-md-6">
            <form style="background: #fff; padding: 40px; border: 1px solid #eee; box-shadow: 0 10px 30px rgba(0,0,0,0.03);">
                <div class="mb-4">
                    <label class="form-label text-muted" style="font-size: 12px; letter-spacing: 1px; text-transform: uppercase;">Assunto</label>
                    <select class="form-select premium-input" style="border: none; border-bottom: 1px solid #ccc; border-radius: 0;">
                        <option>Dúvidas Comerciais</option>
                        <option>Agendamento de Serviço</option>
                        <option>Elogios ou Reclamações</option>
                    </select>
                </div>
                
                <div class="mb-4">
                    <label class="form-label text-muted" style="font-size: 12px; letter-spacing: 1px; text-transform: uppercase;">Nome Completo</label>
                    <input type="text" class="form-control premium-input" placeholder="Seu nome">
                </div>

                <div class="mb-4">
                    <label class="form-label text-muted" style="font-size: 12px; letter-spacing: 1px; text-transform: uppercase;">E-mail</label>
                    <input type="email" class="form-control premium-input" placeholder="seu@email.com">
                </div>

                <div class="mb-4">
                    <label class="form-label text-muted" style="font-size: 12px; letter-spacing: 1px; text-transform: uppercase;">Mensagem</label>
                    <textarea class="form-control premium-input" rows="4" placeholder="Como podemos ajudar?"></textarea>
                </div>

                <button type="submit" class="btn btn-primary premium-btn w-100">ENVIAR MENSAGEM</button>
            </form>
        </div>
    </div>
</main>

<?php include 'includes/footer.php'; ?>