<?php include 'includes/header.php'; ?>

<main class="container pt-2 pb-5">
    <div class="legal-content">
        <h1 class="text-center fw-light mb-4">Comunicados de Recall</h1>
        <p class="text-center text-muted mb-5">A sua segurança e a excelência do seu veículo são as nossas maiores prioridades.</p>

        <h3>Compromisso com a Segurança</h3>
        <p>Na Aurora Motors, a qualidade não termina quando o veículo sai da concessionária. Monitoramos continuamente nossos modelos em circulação para garantir que eles mantenham os mais altos padrões de segurança, desempenho e confiabilidade. Quando necessário, agimos de forma transparente e imediata.</p>

        <h3>O que é um Recall?</h3>
        <p>Um recall é uma convocação preventiva e gratuita realizada pela montadora quando é identificada a necessidade de substituição ou reparo de algum componente. O objetivo é garantir a segurança dos ocupantes e de terceiros. Todos os serviços de recall são totalmente gratuitos, independentemente do ano de fabricação ou de o veículo estar dentro do período de garantia.</p>

        <h3>Consulte o seu Veículo</h3>
        <p>Para verificar se o seu veículo Aurora possui algum chamado pendente, tenha em mãos o número do chassi (VIN) - contendo 17 caracteres. Você pode encontrá-lo no documento do carro (CRLV) ou gravado no vidro do para-brisa.</p>

        <div class="mt-5 p-4" style="background: #fff; border: 1px solid #eee; box-shadow: 0 10px 30px rgba(0,0,0,0.03);">
            <form id="formRecall" onsubmit="event.preventDefault(); alert('Sistema de verificação de chassi em implementação no banco de dados. Por favor, contate uma concessionária.');">
                <div class="row align-items-end">
                    <div class="col-md-8 mb-3 mb-md-0">
                        <label class="form-label text-muted" style="font-size: 12px; letter-spacing: 1px; text-transform: uppercase;">Digite o número do Chassi (VIN)</label>
                        <input type="text" class="form-control premium-input" placeholder="Ex: 9BWZZZ..." maxlength="17" required style="text-transform: uppercase;">
                    </div>
                    <div class="col-md-4">
                        <button type="submit" class="btn btn-primary premium-btn w-100" style="padding: 13px 10px;">CONSULTAR</button>
                    </div>
                </div>
            </form>
        </div>

        <h3 class="mt-5">Dúvidas Frequentes</h3>
        <ul>
            <li><strong>O serviço tem algum custo?</strong> Não. Todo o procedimento, incluindo peças e mão de obra, é 100% gratuito.</li>
            <li><strong>Comprei o carro de terceiros, tenho direito?</strong> Sim. O recall é atrelado ao chassi do veículo, não ao proprietário atual.</li>
            <li><strong>Onde posso realizar o serviço?</strong> Em qualquer centro de serviço autorizado Aurora Motors.</li>
        </ul>

        <div class="text-center mt-5">
            <a href="concessionarias.php" class="btn btn-outline-dark" style="border-radius: 0; padding: 10px 30px; letter-spacing: 1px;">ENCONTRAR CONCESSIONÁRIA</a>
        </div>
    </div>
</main>

<?php include 'includes/footer.php'; ?>