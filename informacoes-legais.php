<?php 
include 'includes/header.php'; 
?>

<style>
    body {
        background-color: #f5f5f5;
    }

    .legal-premium-hero {
        background:
            linear-gradient(90deg, rgba(0,0,0,0.92), rgba(0,0,0,0.65), rgba(0,0,0,0.25)),
            url('assets/img/hero-finance.png') center/cover;
        min-height: 420px;
        display: flex;
        align-items: center;
        color: #fff;
        border-bottom: 4px solid #c9933b;
    }

    .legal-premium-hero .eyebrow {
        color: #c9933b;
        text-transform: uppercase;
        letter-spacing: 3px;
        font-size: 13px;
        font-weight: 600;
        margin-bottom: 18px;
        display: inline-block;
    }

    .legal-premium-hero h1 {
        font-size: clamp(2.4rem, 5vw, 4.8rem);
        font-weight: 300;
        letter-spacing: 1px;
        margin-bottom: 20px;
    }

    .legal-premium-hero p {
        max-width: 680px;
        color: #e0e0e0;
        line-height: 1.8;
        font-size: 1.05rem;
        margin-bottom: 0;
    }

    .legal-premium-wrapper {
        padding: 70px 0 90px;
    }

    .legal-premium-layout {
        display: grid;
        grid-template-columns: 320px 1fr;
        gap: 40px;
        align-items: flex-start;
    }

    .legal-summary-card {
        background: #121212;
        color: #fff;
        padding: 34px 30px;
        border-top: 4px solid #c9933b;
        box-shadow: 0 18px 45px rgba(0,0,0,0.12);
        position: sticky;
        top: 110px;
    }

    .legal-summary-card h3 {
        font-size: 18px;
        font-weight: 300;
        text-transform: uppercase;
        letter-spacing: 2px;
        margin-bottom: 24px;
    }

    .legal-summary-item {
        border-bottom: 1px solid rgba(255,255,255,0.12);
        padding: 16px 0;
    }

    .legal-summary-item:last-child {
        border-bottom: none;
        padding-bottom: 0;
    }

    .legal-summary-item span {
        display: block;
        color: #c9933b;
        text-transform: uppercase;
        letter-spacing: 1.5px;
        font-size: 11px;
        margin-bottom: 6px;
    }

    .legal-summary-item strong {
        display: block;
        color: #fff;
        font-size: 15px;
        font-weight: 400;
        line-height: 1.6;
    }

    .legal-premium-content {
        background: #fff;
        border: 1px solid #e8e8e8;
        border-top: 4px solid #121212;
        box-shadow: 0 18px 45px rgba(0,0,0,0.07);
        padding: 50px;
    }

    .legal-premium-content h2 {
        font-weight: 300;
        color: #121212;
        font-size: 32px;
        margin-bottom: 20px;
    }

    .legal-premium-content .intro {
        color: #666;
        font-size: 16px;
        line-height: 1.9;
        margin-bottom: 42px;
        padding-bottom: 30px;
        border-bottom: 1px solid #e5e5e5;
    }

    .legal-section {
        padding: 34px 0;
        border-bottom: 1px solid #eeeeee;
    }

    .legal-section:last-child {
        border-bottom: none;
        padding-bottom: 0;
    }

    .legal-section h3 {
        display: flex;
        align-items: center;
        gap: 14px;
        color: #121212;
        font-size: 22px;
        font-weight: 300;
        margin-bottom: 18px;
    }

    .legal-number {
        width: 34px;
        height: 34px;
        background: #121212;
        color: #c9933b;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        font-size: 13px;
        font-weight: 600;
        border-radius: 50%;
        flex: 0 0 auto;
    }

    .legal-section p {
        color: #666;
        line-height: 1.85;
        font-size: 15.5px;
        margin-bottom: 15px;
    }

    .legal-section p:last-child {
        margin-bottom: 0;
    }

    .company-data-box {
        background: #f7f7f7;
        border-left: 4px solid #c9933b;
        padding: 24px;
        margin-top: 20px;
    }

    .company-data-box p {
        margin-bottom: 10px;
        color: #444;
    }

    .company-data-box p:last-child {
        margin-bottom: 0;
    }

    .company-data-box strong {
        color: #121212;
    }

    .legal-update-box {
        margin-top: 40px;
        background: #121212;
        color: #fff;
        padding: 24px;
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 20px;
        border-top: 3px solid #c9933b;
    }

    .legal-update-box span {
        color: #c9933b;
        text-transform: uppercase;
        letter-spacing: 2px;
        font-size: 12px;
        display: block;
        margin-bottom: 6px;
    }

    .legal-update-box p {
        margin: 0;
        color: #fff;
    }

    .legal-update-box i {
        font-size: 2rem;
        color: #c9933b;
    }

    @media (max-width: 992px) {
        .legal-premium-layout {
            grid-template-columns: 1fr;
        }

        .legal-summary-card {
            position: static;
        }
    }

    @media (max-width: 576px) {
        .legal-premium-hero {
            min-height: 360px;
            padding: 60px 0;
        }

        .legal-premium-wrapper {
            padding: 45px 0 70px;
        }

        .legal-premium-content {
            padding: 32px 24px;
        }

        .legal-section h3 {
            font-size: 20px;
            align-items: flex-start;
        }

        .legal-update-box {
            flex-direction: column;
            align-items: flex-start;
        }
    }
</style>

<main>
    <section class="legal-premium-hero">
        <div class="container">
            <span class="eyebrow">Aurora Motors do Brasil</span>

            <h1>Informações Legais</h1>

            <p>
                Transparência, responsabilidade institucional e proteção da experiência Aurora. 
                Consulte abaixo as informações corporativas, condições de uso e diretrizes legais 
                aplicáveis à navegação neste ambiente digital.
            </p>
        </div>
    </section>

    <section class="legal-premium-wrapper">
        <div class="container">
            <div class="legal-premium-layout">

                <aside class="legal-summary-card">
                    <h3>Resumo Corporativo</h3>

                    <div class="legal-summary-item">
                        <span>Razão Social</span>
                        <strong>Aurora Motors do Brasil S.A.</strong>
                    </div>

                    <div class="legal-summary-item">
                        <span>CNPJ</span>
                        <strong>00.123.456/0001-00</strong>
                    </div>

                    <div class="legal-summary-item">
                        <span>Matriz</span>
                        <strong>Av. Brigadeiro Faria Lima, 3500<br>Itaim Bibi, São Paulo - SP</strong>
                    </div>

                    <div class="legal-summary-item">
                        <span>Atualização</span>
                        <strong>Março de 2026</strong>
                    </div>
                </aside>

                <article class="legal-premium-content">
                    <h2>Termos institucionais de navegação</h2>

                    <p class="intro">
                        Bem-vindo ao site oficial da Aurora Motors. Ao acessar, navegar ou utilizar 
                        qualquer recurso deste ambiente digital, você declara estar ciente e de acordo 
                        com os termos, condições e diretrizes descritos nesta página.
                    </p>

                    <section class="legal-section">
                        <h3>
                            <span class="legal-number">1</span>
                            Dados Corporativos
                        </h3>

                        <p>
                            A Aurora Motors atua como uma marca automotiva premium, dedicada à inovação, 
                            engenharia de alto desempenho, mobilidade inteligente e experiências digitais 
                            integradas para seus clientes.
                        </p>

                        <div class="company-data-box">
                            <p><strong>Razão Social:</strong> Aurora Motors do Brasil S.A.</p>
                            <p><strong>CNPJ:</strong> 00.123.456/0001-00</p>
                            <p><strong>Endereço Matriz:</strong> Av. Brigadeiro Faria Lima, 3500 - Itaim Bibi, São Paulo - SP, Brasil.</p>
                        </div>
                    </section>

                    <section class="legal-section">
                        <h3>
                            <span class="legal-number">2</span>
                            Propriedade Intelectual
                        </h3>

                        <p>
                            Todos os textos, imagens, logotipos, elementos visuais, vídeos, animações, 
                            interfaces, nomes de modelos, identidade visual e demais materiais presentes 
                            neste site são protegidos por direitos autorais e propriedade intelectual da 
                            Aurora Motors.
                        </p>

                        <p>
                            É proibida a reprodução, modificação, distribuição, publicação, transmissão 
                            ou exploração comercial de qualquer conteúdo sem autorização prévia e expressa 
                            da Aurora Motors.
                        </p>
                    </section>

                    <section class="legal-section">
                        <h3>
                            <span class="legal-number">3</span>
                            Precisão das Informações
                        </h3>

                        <p>
                            A Aurora Motors busca manter as informações deste site atualizadas e precisas. 
                            Ainda assim, especificações técnicas, equipamentos opcionais, cores, versões, 
                            valores estimados, condições comerciais e dados de performance podem sofrer 
                            alterações sem aviso prévio.
                        </p>

                        <p>
                            Informações sobre modelos como Vanguard, Zenith, Nexus e linha Aethel possuem 
                            finalidade ilustrativa e devem ser confirmadas junto a uma concessionária 
                            oficial Aurora Motors.
                        </p>

                        <p>
                            Os preços sugeridos podem variar conforme região, tributação, disponibilidade, 
                            configuração do veículo, frete, seguro e condições comerciais vigentes.
                        </p>
                    </section>

                    <section class="legal-section">
                        <h3>
                            <span class="legal-number">4</span>
                            Responsabilidade de Uso
                        </h3>

                        <p>
                            A Aurora Motors não se responsabiliza por danos diretos, indiretos, incidentais 
                            ou consequenciais decorrentes do uso inadequado deste site, indisponibilidade 
                            temporária, falhas técnicas, vírus, interrupções de conexão ou uso de informações 
                            por terceiros.
                        </p>

                        <p>
                            O usuário é responsável por fornecer informações verdadeiras nos formulários de 
                            cadastro, propostas, agendamentos, simulações e pedidos realizados dentro do 
                            ambiente digital Aurora Motors.
                        </p>
                    </section>

                    <section class="legal-section">
                        <h3>
                            <span class="legal-number">5</span>
                            Dados, Cadastro e Área do Cliente
                        </h3>

                        <p>
                            As informações fornecidas pelos usuários em cadastros, propostas, agendamentos, 
                            compras e formulários são utilizadas exclusivamente para simulação de atendimento, 
                            relacionamento com o cliente e funcionamento acadêmico do projeto.
                        </p>

                        <p>
                            Este sistema foi desenvolvido para fins educacionais e representa uma simulação 
                            de ambiente digital corporativo, sem vínculo com uma empresa real.
                        </p>
                    </section>

                    <div class="legal-update-box">
                        <div>
                            <span>Última atualização</span>
                            <p>Março de 2026</p>
                        </div>

                        <i class="bi bi-shield-check"></i>
                    </div>
                </article>

            </div>
        </div>
    </section>
</main>

<?php 
include 'includes/footer.php'; 
?>