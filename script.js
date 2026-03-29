document.addEventListener("DOMContentLoaded", function() {
    const botoesFiltro = document.querySelectorAll('.btn-filtro');
    const botaoLimpar = document.getElementById('btnLimparFiltros');
    const carros = document.querySelectorAll('.car-card');

    // Função para quando clicar em um botão de categoria
    botoesFiltro.forEach(botao => {
        botao.addEventListener('click', function() {
            // 1. Descobre qual categoria foi clicada (ex: 'suv')
            const categoriaEscolhida = this.getAttribute('data-filter');

            // 2. Remove a classe 'ativo' de todos os botões e coloca só no clicado
            botoesFiltro.forEach(btn => btn.classList.remove('ativo'));
            this.classList.add('ativo');

            // 3. Mostra/Esconde os carros
            carros.forEach(carro => {
                const categoriaDoCarro = carro.getAttribute('data-category');
                
                if (categoriaDoCarro === categoriaEscolhida) {
                    carro.classList.remove('escondido'); // Mostra
                } else {
                    carro.classList.add('escondido'); // Esconde
                }
            });
        });
    });

    // Função do botão "Limpar Seleções"
    botaoLimpar.addEventListener('click', function() {
        // Tira o destaque dos botões
        botoesFiltro.forEach(btn => btn.classList.remove('ativo'));
        
        // Mostra todos os carros de novo
        carros.forEach(carro => {
            carro.classList.remove('escondido');
        });
    });
});