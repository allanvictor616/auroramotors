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
    if (botaoLimpar) {
        botaoLimpar.addEventListener('click', function() {
            // Tira o destaque dos botões
            botoesFiltro.forEach(btn => btn.classList.remove('ativo'));
            
            // Mostra todos os carros de novo
            carros.forEach(carro => {
                carro.classList.remove('escondido');
            });
        });
    }
});

// ==========================================
// ANIMAÇÃO DO MODAL DE LOGIN E CADASTRO
// ==========================================
    const btnGoRegister = document.getElementById('btnGoRegister');
    const btnGoLogin = document.getElementById('btnGoLogin');
    const formSlider = document.getElementById('formSlider');

    // Se os elementos existirem na página, ativa a lógica
    if (btnGoRegister && btnGoLogin && formSlider) {
        
        // Quando clicar em "Criar Conta"
        btnGoRegister.addEventListener('click', function(event) {
            event.preventDefault(); // Impede que o link recarregue a página
            formSlider.classList.add('slide-active'); // Adiciona o deslizamento
        });

        // Quando clicar em "Voltar para Login"
        btnGoLogin.addEventListener('click', function(event) {
            event.preventDefault(); // Impede que o link recarregue a página
            formSlider.classList.remove('slide-active'); // Remove o deslizamento (volta)
        });
    }

// ==========================================
// LÓGICA DE FILTROS DA PÁGINA DE MODELOS
// ==========================================
document.addEventListener("DOMContentLoaded", function() {
    const botoesFiltro = document.querySelectorAll('.btn-filtro');
    const botaoLimpar = document.getElementById('btnLimparFiltros');
    const carros = document.querySelectorAll('.car-card');

    // Só roda a lógica se estivermos na página de modelos
    if (botoesFiltro.length > 0) {
        
        // 1. Função de clique nos botões
        botoesFiltro.forEach(botao => {
            botao.addEventListener('click', function() {
                const categoriaEscolhida = this.getAttribute('data-filter');
                
                botoesFiltro.forEach(btn => btn.classList.remove('ativo'));
                this.classList.add('ativo');

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

        // 2. Função do botão "Limpar Seleções"
        if (botaoLimpar) {
            botaoLimpar.addEventListener('click', function() {
                botoesFiltro.forEach(btn => btn.classList.remove('ativo'));
                carros.forEach(carro => carro.classList.remove('escondido'));
            });
        }

        // ==========================================
        // LÓGICA DO FILTRO VIA URL (Vindo do Footer)
        // ==========================================
        const urlParams = new URLSearchParams(window.location.search);
        const categoriaUrl = urlParams.get('cat');

        if (categoriaUrl) {
            // Procura o botão correspondente à URL e simula um clique
            const botaoAlvo = document.querySelector(`.btn-filtro[data-filter="${categoriaUrl}"]`);
            if (botaoAlvo) {
                botaoAlvo.click(); 
            }
        }
    }
});

// ==========================================
// ANIMAÇÃO DO MODAL DE LOGIN E CADASTRO
// ==========================================
document.addEventListener("DOMContentLoaded", function() {
    const btnGoRegister = document.getElementById('btnGoRegister');
    const btnGoLogin = document.getElementById('btnGoLogin');
    const formSlider = document.getElementById('formSlider');

    if (btnGoRegister && btnGoLogin && formSlider) {
        btnGoRegister.addEventListener('click', function(event) {
            event.preventDefault(); 
            formSlider.classList.add('slide-active'); 
        });

        btnGoLogin.addEventListener('click', function(event) {
            event.preventDefault(); 
            formSlider.classList.remove('slide-active'); 
        });
    }
});

// ==========================================
// LÓGICA DO SMART HEADER (APARECER AO SUBIR)
// ==========================================
document.addEventListener("DOMContentLoaded", function() {
    const header = document.querySelector('header'); 
    let lastScrollY = window.scrollY; 

    if (header) {
        window.addEventListener('scroll', function() {
            let currentScrollY = window.scrollY;

            if (currentScrollY > lastScrollY && currentScrollY > 100) {
                header.classList.add('header-hidden');
            } else {
                header.classList.remove('header-hidden');
            }
            lastScrollY = currentScrollY;
        });
    }
});