// ==========================================
// CARRINHO - BOUTIQUE AURORA MOTORS
// ==========================================

document.addEventListener("DOMContentLoaded", function () {
    updateCartCount();

    if (document.getElementById('cartItemsContainer')) {
        renderCart();
    }

    iniciarModaisCarrinho();
    iniciarCheckoutBoutique();
});

// ==========================================
// PEGAR CARRINHO DO LOCALSTORAGE
// ==========================================
function getCart() {
    try {
        return JSON.parse(localStorage.getItem('aurora_cart')) || [];
    } catch (e) {
        return [];
    }
}

// ==========================================
// SALVAR CARRINHO NO LOCALSTORAGE
// ==========================================
function saveCart(cart) {
    localStorage.setItem('aurora_cart', JSON.stringify(cart));
}

// ==========================================
// ATUALIZAR CONTADOR DO HEADER
// ==========================================
function updateCartCount() {
    const cart = getCart();
    const countElement = document.getElementById('cartCount');

    let totalQuantidade = 0;

    cart.forEach(function (item) {
        totalQuantidade += Number(item.quantidade || 1);
    });

    if (countElement) {
        countElement.innerText = totalQuantidade;
    }
}

// ==========================================
// LIMPAR PREÇO PARA CÁLCULO
// ==========================================
function limparPreco(preco) {
    if (!preco) {
        return 0;
    }

    let valor = String(preco)
        .replace('R$', '')
        .replace(/\s/g, '')
        .replace(/\./g, '')
        .replace(',', '.')
        .replace(/[^\d.]/g, '');

    return parseFloat(valor) || 0;
}

// ==========================================
// FORMATAR MOEDA
// ==========================================
function formatarMoeda(valor) {
    return valor.toLocaleString('pt-BR', {
        style: 'currency',
        currency: 'BRL'
    });
}

// ==========================================
// ADICIONAR PRODUTO AO CARRINHO
// ==========================================
window.addToCart = function (nome, versao, preco, imagemUrl) {
    let cart = getCart();

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

    saveCart(cart);
    updateCartCount();

    mostrarToast(nome + ' ADICIONADO AO CARRINHO');

    if (typeof renderCart === "function") {
        renderCart();
    }
};

// ==========================================
// ALTERAR QUANTIDADE
// ==========================================
window.alterarQuantidade = function (index, acao) {
    let cart = getCart();

    if (!cart[index]) {
        return;
    }

    let quantidadeAtual = Number(cart[index].quantidade || 1);

    if (acao === 'mais') {
        quantidadeAtual++;
    }

    if (acao === 'menos') {
        quantidadeAtual--;
    }

    if (quantidadeAtual <= 0) {
        prepararRemocao(index);

        const modalElement = document.getElementById('confirmarRemoverItemModal');

        if (modalElement) {
            const modalInstance = new bootstrap.Modal(modalElement);
            modalInstance.show();
        }

        return;
    }

    cart[index].quantidade = quantidadeAtual;
    saveCart(cart);

    updateCartCount();
    renderCart();
};

// ==========================================
// REMOVER PRODUTO
// ==========================================
window.removeFromCart = function (index) {
    let cart = getCart();

    if (!cart[index]) {
        return;
    }

    cart.splice(index, 1);

    saveCart(cart);
    updateCartCount();

    if (typeof renderCart === "function") {
        renderCart();
    }
};

// ==========================================
// RENDERIZAR CARRINHO
// ==========================================
function renderCart() {
    const cart = getCart();

    const container = document.getElementById('cartItemsContainer');
    const totalItems = document.getElementById('cartTotalItems');
    const totalValue = document.getElementById('cartTotalValue');
    const btnFinalizarCompra = document.getElementById('btnFinalizarCompra');

    if (!container) {
        return;
    }

    container.innerHTML = '';

    let totalQuantidade = 0;
    let valorTotal = 0;

    cart.forEach(function (item) {
        const quantidade = Number(item.quantidade || 1);
        const precoUnitario = limparPreco(item.preco);

        totalQuantidade += quantidade;
        valorTotal += precoUnitario * quantidade;
    });

    if (totalItems) {
        totalItems.innerText = totalQuantidade;
    }

    if (totalValue) {
        totalValue.innerText = formatarMoeda(valorTotal);
    }

    if (cart.length === 0) {
        container.innerHTML = `
            <div class="text-center py-5 bg-white shadow-sm">
                <i class="bi bi-bag-x" style="font-size: 48px; color: #c9933b;"></i>
                <h4 class="fw-light mt-3">Seu carrinho está vazio</h4>
                <p class="text-muted mb-4">
                    Explore os produtos da Boutique Aurora Motors.
                </p>
                <a href="boutique.php" class="btn btn-dark rounded-0 px-4 py-2">
                    Ver Boutique
                </a>
            </div>
        `;

        if (btnFinalizarCompra) {
            btnFinalizarCompra.disabled = true;
        }

        return;
    }

    if (btnFinalizarCompra) {
        btnFinalizarCompra.disabled = false;
    }

    cart.forEach(function (produto, index) {
        const quantidade = Number(produto.quantidade || 1);
        const precoUnitario = limparPreco(produto.preco);
        const subtotal = precoUnitario * quantidade;

        const imagem = produto.imagemUrl || 'assets/img/boutique-itens.png';
        const nome = produto.nome || 'Produto Boutique Aurora';
        const versao = produto.versao || 'Produto Boutique Aurora';
        const preco = produto.preco || formatarMoeda(precoUnitario);

        const itemHtml = `
            <div class="cart-item">
                <img src="${imagem}" alt="${nome}">

                <div class="cart-item-details">
                    <h4>${nome}</h4>
                    <p>${versao}</p>
                    <p class="fw-bold mt-2">${preco}</p>

                    <div class="d-flex align-items-center gap-2 mt-3">
                        <button 
                            type="button" 
                            class="btn btn-outline-dark btn-sm rounded-0" 
                            onclick="alterarQuantidade(${index}, 'menos')"
                        >
                            -
                        </button>

                        <span class="px-3">${quantidade}</span>

                        <button 
                            type="button" 
                            class="btn btn-outline-dark btn-sm rounded-0" 
                            onclick="alterarQuantidade(${index}, 'mais')"
                        >
                            +
                        </button>
                    </div>

                    <p class="small text-muted mt-3 mb-0">
                        Subtotal: <strong>${formatarMoeda(subtotal)}</strong>
                    </p>
                </div>

                <button 
                    type="button"
                    class="btn-remove-cart"
                    data-bs-toggle="modal"
                    data-bs-target="#confirmarRemoverItemModal"
                    onclick="prepararRemocao(${index})"
                >
                    Remover
                </button>
            </div>
        `;

        container.innerHTML += itemHtml;
    });
}

// ==========================================
// MODAIS DE REMOVER E ESVAZIAR
// ==========================================
let itemParaRemover = null;

window.prepararRemocao = function (index) {
    itemParaRemover = index;
};

function iniciarModaisCarrinho() {
    const btnConfirmarIndividual = document.getElementById('btnConfirmarRemoverItem');

    if (btnConfirmarIndividual) {
        btnConfirmarIndividual.addEventListener('click', function () {
            if (itemParaRemover !== null) {
                removeFromCart(itemParaRemover);

                const modalElement = document.getElementById('confirmarRemoverItemModal');

                if (modalElement) {
                    const modalInstance = bootstrap.Modal.getInstance(modalElement) || new bootstrap.Modal(modalElement);
                    modalInstance.hide();
                }

                itemParaRemover = null;
                mostrarToast('PRODUTO REMOVIDO DO CARRINHO');
            }
        });
    }

    const btnConfirmarEsvaziar = document.getElementById('btnConfirmarEsvaziar');

    if (btnConfirmarEsvaziar) {
        btnConfirmarEsvaziar.addEventListener('click', function () {
            localStorage.removeItem('aurora_cart');

            updateCartCount();

            if (typeof renderCart === "function") {
                renderCart();
            }

            const modalElement = document.getElementById('confirmarEsvaziarModal');

            if (modalElement) {
                const modalInstance = bootstrap.Modal.getInstance(modalElement) || new bootstrap.Modal(modalElement);
                modalInstance.hide();
            }

            mostrarToast('CARRINHO ESVAZIADO');
        });
    }
}

// ==========================================
// CHECKOUT REAL DA BOUTIQUE
// Envia os itens para processa_compra_boutique.php
// ==========================================
function iniciarCheckoutBoutique() {
    const checkoutModal = document.getElementById('checkoutBoutiqueModal');
    const resumoCompra = document.getElementById('resumoCompraBoutique');
    const formCompra = document.getElementById('formCompraBoutique');
    const itensInput = document.getElementById('itensCarrinhoInput');

    function prepararResumoCompra() {
        const cart = getCart();

        if (itensInput) {
            itensInput.value = JSON.stringify(cart);
        }

        if (!resumoCompra) {
            return;
        }

        if (cart.length === 0) {
            resumoCompra.innerHTML = 'Nenhum produto selecionado.';
            return;
        }

        let total = 0;

        const linhas = cart.map(function (item) {
            const quantidade = Number(item.quantidade || 1);
            const precoUnitario = limparPreco(item.preco);
            const subtotal = precoUnitario * quantidade;

            total += subtotal;

            return `
                <div class="d-flex justify-content-between border-bottom py-2">
                    <span>
                        ${item.nome}
                        <small class="text-muted">x${quantidade}</small>
                    </span>
                    <strong>${formatarMoeda(subtotal)}</strong>
                </div>
            `;
        });

        resumoCompra.innerHTML = linhas.join('') + `
            <div class="d-flex justify-content-between mt-3 pt-3 border-top">
                <span>Total</span>
                <strong>${formatarMoeda(total)}</strong>
            </div>
        `;
    }

    if (checkoutModal) {
        checkoutModal.addEventListener('show.bs.modal', function () {
            prepararResumoCompra();
        });
    }

    if (formCompra) {
        formCompra.addEventListener('submit', function (event) {
            const cart = getCart();

            if (cart.length === 0) {
                event.preventDefault();
                alert('Seu carrinho está vazio.');
                return;
            }

            if (itensInput) {
                itensInput.value = JSON.stringify(cart);
            }

            const botaoSubmit = document.getElementById('btnConfirmarCompraBoutique');

            if (botaoSubmit) {
                botaoSubmit.disabled = true;
                botaoSubmit.innerText = 'PROCESSANDO PEDIDO...';
            }

            localStorage.setItem('aurora_compra_enviada', '1');
        });
    }
}

// ==========================================
// TOAST
// ==========================================
function mostrarToast(mensagem) {
    const toast = document.getElementById('cartToast');
    const toastMsg = document.getElementById('toastMessage');

    if (toast && toastMsg) {
        toastMsg.innerText = mensagem;
        toast.classList.remove('d-none');

        setTimeout(function () {
            toast.classList.add('d-none');
        }, 3000);
    }
}