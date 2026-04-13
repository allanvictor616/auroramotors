document.addEventListener("DOMContentLoaded", function () {
    updateCartCount();

    // Se estivermos na página do carrinho, renderiza os itens
    if (document.getElementById('cartItemsContainer')) {
        renderCart();
    }
});

// Pegar carrinho do LocalStorage
function getCart() {
    return JSON.parse(localStorage.getItem('aurora_cart')) || [];
}

// Atualizar número na bolinha vermelha do header
function updateCartCount() {
    const cart = getCart();
    const countElement = document.getElementById('cartCount');
    if (countElement) {
        countElement.innerText = cart.length;
    }
}

// Adicionar ao carrinho (com notificação Toast)
window.addToCart = function (nome, versao, preco, imagemUrl) {
    const cart = getCart();
    const novoCarro = { nome, versao, preco, imagemUrl };

    cart.push(novoCarro);
    localStorage.setItem('aurora_cart', JSON.stringify(cart));

    updateCartCount();

    const toast = document.getElementById('cartToast');
    const toastMsg = document.getElementById('toastMessage');

    if (toast && toastMsg) {
        toastMsg.innerText = nome + ' ADICIONADO À LISTA';
        toast.classList.remove('d-none');
        setTimeout(() => { toast.classList.add('d-none'); }, 3000);
    } else {
        alert(nome + ' adicionado à sua lista de solicitações!');
    }
}

// Remover carro do carrinho (Lógica principal)
window.removeFromCart = function (index) {
    let cart = getCart();
    cart.splice(index, 1);
    localStorage.setItem('aurora_cart', JSON.stringify(cart));

    updateCartCount();
    if (typeof renderCart === "function") renderCart(); // Recarrega a lista na tela
}

// Renderizar itens na página carrinho.php
function renderCart() {
    const cart = getCart();
    const container = document.getElementById('cartItemsContainer');
    const totalItems = document.getElementById('cartTotalItems');
    const btnSolicitar = document.getElementById('btnSolicitar');

    if (!container) return; // Segurança caso não esteja na página do carrinho

    container.innerHTML = ''; // Limpa antes de renderizar

    if (cart.length === 0) {
        container.innerHTML = '<p class="text-muted text-center py-5">Seu carrinho está vazio. Explore nossos <a href="modelos.php">modelos</a>.</p>';
        if (btnSolicitar) btnSolicitar.disabled = true;
        if (totalItems) totalItems.innerText = '0';
        return;
    }

    if (btnSolicitar) btnSolicitar.disabled = false;
    if (totalItems) totalItems.innerText = cart.length;

    cart.forEach((carro, index) => {
        const itemHtml = `
            <div class="cart-item">
                <img src="${carro.imagemUrl}" alt="${carro.nome}">
                <div class="cart-item-details">
                    <h4>${carro.nome}</h4>
                    <p>Versão: ${carro.versao}</p>
                    <p class="fw-bold mt-2">${carro.preco}</p>
                </div>
                <button class="btn-remove-cart" 
                        data-bs-toggle="modal" 
                        data-bs-target="#confirmarRemoverItemModal" 
                        onclick="prepararRemocao(${index})">
                    Remover
                </button>
            </div>
        `;
        container.innerHTML += itemHtml;
    });
}

// ==========================================
// LÓGICA DE PROPOSTA
// ==========================================
document.addEventListener('submit', function (e) {
    if (e.target && e.target.id === 'propostaForm') {
        e.preventDefault(); 
        const formContent = document.getElementById('formContent');
        const successMessage = document.getElementById('successMessage');

        if (formContent) formContent.classList.add('d-none');
        if (successMessage) successMessage.classList.remove('d-none');

        localStorage.removeItem('aurora_cart');
        updateCartCount();
        if (typeof renderCart === "function") renderCart();
    }
});

// ==========================================
// LÓGICA DOS MODAIS: REMOVER E ESVAZIAR
// ==========================================
let itemParaRemover = null;

// Função chamada pelo botão no item do carrinho
window.prepararRemocao = function(index) {
    itemParaRemover = index;
}

document.addEventListener('DOMContentLoaded', function() {
    
    // 1. Confirmação do Modal de Remover Item Individual
    const btnConfirmarIndividual = document.getElementById('btnConfirmarRemoverItem');
    if (btnConfirmarIndividual) {
        btnConfirmarIndividual.addEventListener('click', function() {
            if (itemParaRemover !== null) {
                removeFromCart(itemParaRemover);
                
                const modalElement = document.getElementById('confirmarRemoverItemModal');
                if (modalElement) {
                    const modalInstance = bootstrap.Modal.getInstance(modalElement) || new bootstrap.Modal(modalElement);
                    if (modalInstance) modalInstance.hide();
                }
                
                itemParaRemover = null;
            }
        });
    }

    // 2. Confirmação do Modal de Esvaziar Tudo
    const btnConfirmarEsvaziar = document.getElementById('btnConfirmarEsvaziar');
    if (btnConfirmarEsvaziar) {
        btnConfirmarEsvaziar.addEventListener('click', function() {
            localStorage.removeItem('aurora_cart');
            
            if (typeof updateCartCount === "function") updateCartCount();
            if (typeof renderCart === "function") renderCart();
            
            const modalElement = document.getElementById('confirmarEsvaziarModal');
            if (modalElement) {
                const modalInstance = bootstrap.Modal.getInstance(modalElement) || new bootstrap.Modal(modalElement);
                if (modalInstance) modalInstance.hide();
            }
            
            const toast = document.getElementById('cartToast');
            const toastMsg = document.getElementById('toastMessage');
            if (toast && toastMsg) {
                toastMsg.innerText = 'CARRINHO ESVAZIADO';
                toast.classList.remove('d-none');
                setTimeout(() => { toast.classList.add('d-none'); }, 3000);
            }
        });
    }
});