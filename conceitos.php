<?php 

include 'includes/header.php'; 
?>

<main class="conceitos-page">
    <section class="hero-conceito" style="background-image: linear-gradient(rgba(0,0,0,0.4), rgba(0,0,0,0.4)), url('assets/img/hero-conceito.png');">
        <div class="container text-center text-white d-flex flex-column justify-content-center align-items-center" style="height: 60vh;">
            <h1 class="display-3 fw-light mb-3">O Amanhã, Hoje.</h1>
            <p class="lead" style="max-width: 700px; letter-spacing: 1px;">Conheça a Aurora Vision: onde a engenharia de ponta encontra o design transcendental para definir os próximos 50 anos da mobilidade premium.</p>
        </div>
    </section>

    <section class="container pt-5 pb-5">
        <div class="row align-items-center mb-5">
            <div class="col-md-6 mb-4 mb-md-0">
                <h2 class="fw-light mb-4">Design Orgânico e Fluidez</h2>
                <p class="text-muted">Nossos protótipos são esculpidos pelo vento. No laboratório de design da Aurora, utilizamos túneis de vento digitais e inteligência artificial para criar formas que eliminam o arrasto e maximizam a eficiência energética, sem perder a elegância atemporal que define nossa marca.</p>
                <ul class="list-unstyled mt-3 text-muted">
                    <li><i class="bi bi-check2"></i> Coeficiente de arrasto recorde ($C_d < 0.19$)</li>
                    <li><i class="bi bi-check2"></i> Superfícies ativas que se moldam à velocidade</li>
                    <li><i class="bi bi-check2"></i> Pintura auto-regenerativa com nanotecnologia</li>
                </ul>
            </div>
            <div class="col-md-6">
                <img src="assets/img/design-futuro.png" class="img-fluid shadow-lg" alt="Design Futurista Aurora">
            </div>
        </div>

        <hr class="my-5 opacity-25">

        <div class="row align-items-center flex-row-reverse">
            <div class="col-md-6 mb-4 mb-md-0">
                <h2 class="fw-light mb-4">Propulsão Quantum-Electric</h2>
                <p class="text-muted">O futuro não é apenas elétrico, é quântico. Estamos testando células de energia de estado sólido que permitem uma autonomia de até $1.200 \text{ km}$ com uma única carga de apenas 5 minutos. É a liberdade total, sem emissões.</p>
                <div class="p-3 bg-light border-start border-dark border-4">
                    <p class="mb-0 italic text-dark">"Não estamos apenas mudando o motor, estamos mudando a forma como o mundo se move." – Diretor de Engenharia, Aurora Motors.</p>
                </div>
            </div>
            <div class="col-md-6">
                <img src="assets/img/motor-futuro.png" class="img-fluid shadow-lg" alt="Tecnologia de Motor Aurora">
            </div>
        </div>
    </section>

    <section class="bg-dark text-white py-5">
        <div class="container text-center py-4">
            <h3 class="fw-light mb-4">Deseja ser notificado sobre o futuro?</h3>
            <p class="mb-4 opacity-75">Assine nossa newsletter exclusiva para entusiastas e receba convites para eventos de revelação de protótipos.</p>
            <form class="d-flex justify-content-center gap-2 mx-auto" style="max-width: 500px;">
                <input type="email" class="form-control premium-input border-0" placeholder="Seu melhor e-mail" required>
                <button type="submit" class="btn btn-primary premium-btn px-4">INSCREVER</button>
            </form>
        </div>
    </section>
</main>

<style>
/* Estilos específicos para a página de Conceitos */
.conceitos-page .hero-conceito {
    background-size: cover;
    background-position: center;
    background-attachment: fixed; /* Efeito Parallax */
}

.conceitos-page h2 {
    letter-spacing: 2px;
    text-transform: uppercase;
    font-size: 1.8rem;
}

.conceitos-page p {
    line-height: 1.8;
}

.conceitos-page .img-fluid {
    border-radius: 0px; /* Mantém o visual industrial e reto */
}
</style>

<?php 

include 'includes/footer.php'; 
?>