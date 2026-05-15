// ==========================================
// BOUTIQUE AURORA MOTORS
// Filtros e integração com carrinho
// ==========================================

document.addEventListener("DOMContentLoaded", function () {
    iniciarFiltrosBoutique();
    garantirFuncaoCarrinhoBoutique();
});

// ==========================================
// FILTROS DA BOUTIQUE
// ==========================================
function iniciarFiltrosBoutique() {
    const botoesFiltro = document.querySelectorAll('.btn-boutique-filtro');
    const botaoLimpar = document.getElementById('btnLimparFiltrosBoutique');
    const produtos = document.querySelectorAll('.boutique-card');

    if (botoesFiltro.length === 0 || produtos.length === 0) {
        return;
    }

    botoesFiltro.forEach(function (botao) {
        botao.addEventListener('click', function () {
            const categoriaEscolhida = this.getAttribute('data-filter');

            botoesFiltro.forEach(function (btn) {
                btn.classList.remove('ativo');
            });

            this.classList.add('ativo');

            produtos.forEach(function (produto) {
                const categoriaProduto = produto.getAttribute('data-category');

                if (categoriaProduto === categoriaEscolhida) {
                    produto.classList.remove('escondido');
                } else {
                    produto.classList.add('escondido');
                }
            });
        });
    });

    if (botaoLimpar) {
        botaoLimpar.addEventListener('click', function () {
            botoesFiltro.forEach(function (btn) {
                btn.classList.remove('ativo');
            });

            produtos.forEach(function (produto) {
                produto.classList.remove('escondido');
            });
        });
    }
}

// ==========================================
// FALLBACK DO CARRINHO
// Caso o cart.js não tenha sido carregado,
// esta função garante que a boutique funcione.
// ==========================================
function garantirFuncaoCarrinhoBoutique() {
    if (typeof window.addToCart === 'function') {
        return;
    }

    window.addToCart = function (nome, versao, preco, imagemUrl) {
        let cart = [];

        try {
            cart = JSON.parse(localStorage.getItem('aurora_cart')) || [];
        } catch (e) {
            cart = [];
        }

        const indexExistente = cart.findIndex(function (item) {
            return item.nome === nome && item.versao === versao;
        });

        if (indexExistente >= 0) {
            cart[indexExistente].quantidade = Number(cart[indexExistente].quantidade || 1) + 1;
        } else {
            cart.push({
                nome: nome,
                versao: versao,
                preco: preco,
                imagemUrl: imagemUrl,
                quantidade: 1
            });
        }

        localStorage.setItem('aurora_cart', JSON.stringify(cart));

        atualizarContadorBoutique(cart);
        mostrarToastBoutique(nome + ' adicionado ao carrinho');
    };
}

// ==========================================
// ATUALIZA CONTADOR DO HEADER
// ==========================================
function atualizarContadorBoutique(cart) {
    const countElement = document.getElementById('cartCount');

    if (!countElement) {
        return;
    }

    let totalQuantidade = 0;

    cart.forEach(function (item) {
        totalQuantidade += Number(item.quantidade || 1);
    });

    countElement.innerText = totalQuantidade;
}

// ==========================================
// TOAST SIMPLES DA BOUTIQUE
// ==========================================
function mostrarToastBoutique(mensagem) {
    const toastExistente = document.querySelector('.boutique-toast');

    if (toastExistente) {
        toastExistente.remove();
    }

    const toast = document.createElement('div');
    toast.className = 'boutique-toast';
    toast.innerText = mensagem;

    document.body.appendChild(toast);

    setTimeout(function () {
        toast.remove();
    }, 3000);
}