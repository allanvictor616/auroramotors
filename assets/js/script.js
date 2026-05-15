// ==========================================
// SCRIPT PRINCIPAL - AURORA MOTORS
// ==========================================

document.addEventListener("DOMContentLoaded", function () {
    iniciarFiltrosModelos();
    iniciarModalLoginCadastro();
    iniciarSmartHeader();
    iniciarModalPropostaModelos();
});

// ==========================================
// FILTROS DA PÁGINA DE MODELOS
// ==========================================
function iniciarFiltrosModelos() {
    const botoesFiltro = document.querySelectorAll('.btn-filtro');
    const botaoLimpar = document.getElementById('btnLimparFiltros');
    const carros = document.querySelectorAll('.car-card');

    if (botoesFiltro.length === 0 || carros.length === 0) {
        return;
    }

    botoesFiltro.forEach(function (botao) {
        botao.addEventListener('click', function () {
            const categoriaEscolhida = this.getAttribute('data-filter');

            botoesFiltro.forEach(function (btn) {
                btn.classList.remove('ativo');
            });

            this.classList.add('ativo');

            carros.forEach(function (carro) {
                const categoriaDoCarro = carro.getAttribute('data-category');

                if (categoriaDoCarro === categoriaEscolhida) {
                    carro.classList.remove('escondido');
                } else {
                    carro.classList.add('escondido');
                }
            });
        });
    });

    if (botaoLimpar) {
        botaoLimpar.addEventListener('click', function () {
            botoesFiltro.forEach(function (btn) {
                btn.classList.remove('ativo');
            });

            carros.forEach(function (carro) {
                carro.classList.remove('escondido');
            });
        });
    }

    const urlParams = new URLSearchParams(window.location.search);
    const categoriaUrl = urlParams.get('cat');

    if (categoriaUrl) {
        const botaoAlvo = document.querySelector('.btn-filtro[data-filter="' + categoriaUrl + '"]');

        if (botaoAlvo) {
            botaoAlvo.click();
        }
    }
}

// ==========================================
// MODAL DE LOGIN E CADASTRO
// ==========================================
function iniciarModalLoginCadastro() {
    const btnGoRegister = document.getElementById('btnGoRegister');
    const btnGoLogin = document.getElementById('btnGoLogin');
    const formSlider = document.getElementById('formSlider');

    if (!btnGoRegister || !btnGoLogin || !formSlider) {
        return;
    }

    btnGoRegister.addEventListener('click', function (event) {
        event.preventDefault();
        formSlider.classList.add('slide-active');
    });

    btnGoLogin.addEventListener('click', function (event) {
        event.preventDefault();
        formSlider.classList.remove('slide-active');
    });
}

// ==========================================
// SMART HEADER
// ==========================================
function iniciarSmartHeader() {
    const header = document.querySelector('header');
    let lastScrollY = window.scrollY;

    if (!header) {
        return;
    }

    window.addEventListener('scroll', function () {
        const currentScrollY = window.scrollY;

        if (currentScrollY > lastScrollY && currentScrollY > 100) {
            header.classList.add('header-hidden');
        } else {
            header.classList.remove('header-hidden');
        }

        lastScrollY = currentScrollY;
    });
}

// ==========================================
// MODAL DE PROPOSTA NA PÁGINA MODELOS
// ==========================================
function iniciarModalPropostaModelos() {
    const botoesProposta = document.querySelectorAll('.btn-proposta');

    if (botoesProposta.length === 0) {
        return;
    }

    const modeloInput = document.getElementById('modeloProposta');
    const valorInput = document.getElementById('valorTotalProposta');
    const modeloTexto = document.getElementById('modeloSelecionadoTexto');
    const detalheTexto = document.getElementById('detalheSelecionadoTexto');

    botoesProposta.forEach(function (botao) {
        botao.addEventListener('click', function () {
            const modelo = this.getAttribute('data-modelo') || '';
            const motor = this.getAttribute('data-motor') || '';
            const preco = this.getAttribute('data-preco') || '0.00';
            const precoFormatado = this.getAttribute('data-preco-formatado') || '';

            if (modeloInput) {
                modeloInput.value = modelo;
            }

            if (valorInput) {
                valorInput.value = preco;
            }

            if (modeloTexto) {
                modeloTexto.textContent = modelo;
            }

            if (detalheTexto) {
                detalheTexto.textContent = motor + ' • ' + precoFormatado;
            }
        });
    });
}