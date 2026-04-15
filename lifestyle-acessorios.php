<?php include 'includes/header.php'; ?>

<style>
    .lifestyle-hero {
        position: relative;
        height: 85vh;
        background-size: cover;
        background-position: center;
        display: flex;
        align-items: center;
    }
    .dark-section {
        background-color: #121212;
        color: #ffffff;
    }
    .product-card {
        border: none;
        background: transparent;
        transition: transform 0.4s ease;
    }
    .product-card:hover {
        transform: translateY(-10px);
    }
    .product-card img {
        border-radius: 0;
        margin-bottom: 20px;
    }
    .product-title {
        font-weight: 300;
        letter-spacing: 1px;
        font-size: 1.2rem;
    }
</style>

<main>
    <section class="lifestyle-hero" style="background-image: linear-gradient(rgba(0,0,0,0.4), rgba(0,0,0,0.4)), url('assets/img/hero-lifestyle.png');">
        <div class="container text-end text-white">
            <h1 class="display-3 fw-light mb-3">A paixão não fica na garagem.</h1>
            <p class="lead float-end" style="max-width: 500px;">Acessórios originais para potencializar o seu veículo e a coleção exclusiva Aurora Lifestyle para vestir a marca.</p>
        </div>
    </section>

    <section class="container py-5 my-5">
        <div class="row text-center mb-5">
            <div class="col-lg-8 mx-auto">
                <h6 class="text-uppercase" style="color: #c9933b; letter-spacing: 2px;">Equipamentos Originais</h6>
                <h2 class="display-6 fw-light text-dark">Performance e Praticidade</h2>
            </div>
        </div>
        
        <div class="row g-5">
            <div class="col-md-4">
                <div class="product-card text-center">
                    <div class="bg-light p-4 mb-3" style="height: 250px; display: flex; align-items: center; justify-content: center;">
                        <i class="bi bi-vinyl" style="font-size: 4rem; color: #555;"></i>
                    </div>
                    <h4 class="product-title text-dark">Rodas Forjadas 22"</h4>
                    <p class="text-muted small">Design aerodinâmico para máxima eficiência.</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="product-card text-center">
                    <div class="bg-light p-4 mb-3" style="height: 250px; display: flex; align-items: center; justify-content: center;">
                        <i class="bi bi-briefcase" style="font-size: 4rem; color: #555;"></i>
                    </div>
                    <h4 class="product-title text-dark">Travel Pack</h4>
                    <p class="text-muted small">Suportes de teto e malas sob medida.</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="product-card text-center">
                    <div class="bg-light p-4 mb-3" style="height: 250px; display: flex; align-items: center; justify-content: center;">
                        <i class="bi bi-ev-station" style="font-size: 4rem; color: #555;"></i>
                    </div>
                    <h4 class="product-title text-dark">Wallbox Premium</h4>
                    <p class="text-muted small">Carregamento ultrarrápido residencial.</p>
                </div>
            </div>
        </div>
    </section>

    <section class="dark-section py-5">
        <div class="container py-5">
            <div class="row align-items-center">
                <div class="col-lg-5 mb-5 mb-lg-0">
                    <h6 class="text-uppercase" style="color: #c9933b; letter-spacing: 2px;">A Coleção</h6>
                    <h2 class="display-5 fw-light mb-4">Aurora Boutique</h2>
                    <p class="text-white-50 mb-4" style="line-height: 1.8;">Vista o espírito da inovação. Nossa linha de roupas e acessórios pessoais é desenhada com os mesmos materiais nobres dos nossos veículos: fibra de carbono, couro legítimo e metais escovados.</p>
                    <button class="btn btn-outline-light px-5 py-3" style="border-radius: 0; letter-spacing: 1px;">EXPLORAR CATÁLOGO</button>
                </div>
                    <div class="col-lg-6 offset-lg-1">
                        <img src="assets/img/boutique-itens.png" alt="Coleção Aurora Boutique" class="img-fluid rounded-0" style="height: 500px; width: 100%; object-fit: cover; box-shadow: 0 10px 30px rgba(0,0,0,0.5);">
                    </div>
            </div>
        </div>
    </section>
</main>

<?php include 'includes/footer.php'; ?>