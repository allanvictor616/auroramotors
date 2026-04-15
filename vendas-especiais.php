<?php include 'includes/header.php'; ?>

<style>
    .sales-hero {
        height: 60vh;
        background: linear-gradient(rgba(0,0,0,0.5), rgba(0,0,0,0.3)), url('assets/img/hero-finance.png') center/cover;
        display: flex;
        align-items: center;
        color: white;
    }
    .offer-card {
        padding: 50px 40px;
        background: #fff;
        border-top: 4px solid #c9933b;
        box-shadow: 0 15px 35px rgba(0,0,0,0.05);
        transition: transform 0.3s ease;
        height: 100%;
    }
    .offer-card:hover { transform: translateY(-5px); }
</style>

<main>
    <section class="sales-hero">
        <div class="container">
            <h1 class="display-4 fw-light mb-3">O Seu Aurora. <br>Do Seu Jeito.</h1>
            <p class="lead fw-light" style="max-width: 500px;">Descubra as rotas mais inteligentes para assumir o volante da inovação, seja para você ou para sua empresa.</p>
        </div>
    </section>

    <section class="container py-5 my-5">
        <div class="row g-5">
            <div class="col-lg-6">
                <div class="offer-card">
                    <h6 class="text-uppercase mb-3" style="color: #c9933b; letter-spacing: 2px;">Para Você</h6>
                    <h2 class="fw-light mb-4">Condições Especiais</h2>
                    <p class="text-muted mb-4" style="line-height: 1.8;">Aproveite o Plano Aurora Select com taxas a partir de 0% e recompra garantida. Valorizamos o seu seminovo na troca por um Aurora 0km com bônus exclusivos de até R$ 25.000.</p>
                    <ul class="list-unstyled text-muted mb-4" style="line-height: 2;">
                        <li><i class="bi bi-check2 text-dark me-2"></i> Financiamento Flexível em até 36x.</li>
                        <li><i class="bi bi-check2 text-dark me-2"></i> Super Valorização do seu usado.</li>
                        <li><i class="bi bi-check2 text-dark me-2"></i> Seguro Aurora incluso no primeiro ano.</li>
                    </ul>
                    <a href="simulacao.php" class="btn btn-dark w-100 rounded-0 py-3 text-uppercase" style="letter-spacing: 1px;">Solicitar Simulação</a>
                </div>
            </div>

            <div class="col-lg-6">
                <div class="offer-card" style="border-top-color: #121212;">
                    <h6 class="text-uppercase mb-3" style="color: #888; letter-spacing: 2px;">Para Sua Empresa</h6>
                    <h2 class="fw-light mb-4">Vendas Corporativas</h2>
                    <p class="text-muted mb-4" style="line-height: 1.8;">Soluções inteligentes para frotistas, produtores rurais e executivos. Reduza a pegada de carbono do seu negócio com descontos diretos de fábrica em nossa linha de veículos elétricos e híbridos.</p>
                    <ul class="list-unstyled text-muted mb-4" style="line-height: 2;">
                        <li><i class="bi bi-check2 text-dark me-2"></i> Faturamento direto da fábrica.</li>
                        <li><i class="bi bi-check2 text-dark me-2"></i> Atendimento e manutenção prioritários.</li>
                        <li><i class="bi bi-check2 text-dark me-2"></i> Isenções fiscais aplicáveis (CNPJ).</li>
                    </ul>
                    <a href="b2b.php" class="btn btn-outline-dark w-100 rounded-0 py-3 text-uppercase" style="letter-spacing: 1px;">Falar com Consultor B2B</a>
                </div>
            </div>
        </div>
    </section>
</main>

<?php include 'includes/footer.php'; ?>