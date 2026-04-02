document.addEventListener("DOMContentLoaded", function() {
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

// Função para adicionar carro (Será chamada nos botões da página modelos.php)
window.addToCart = function(nome, versao, preco, imagemUrl) {
    const cart = getCart();
    const novoCarro = { nome, versao, preco, imagemUrl };
    
    cart.push(novoCarro);
    localStorage.setItem('aurora_cart', JSON.stringify(cart));
    
    updateCartCount();
    alert(nome + ' adicionado à sua lista de solicitações!');
}

// Remover carro do carrinho
window.removeFromCart = function(index) {
    let cart = getCart();
    cart.splice(index, 1);
    localStorage.setItem('aurora_cart', JSON.stringify(cart));
    
    updateCartCount();
    renderCart(); // Recarrega a lista na tela
}

// Renderizar itens na página carrinho.php
function renderCart() {
    const cart = getCart();
    const container = document.getElementById('cartItemsContainer');
    const totalItems = document.getElementById('cartTotalItems');
    const btnSolicitar = document.getElementById('btnSolicitar');
    
    container.innerHTML = ''; // Limpa antes de renderizar
    
    if (cart.length === 0) {
        container.innerHTML = '<p class="text-muted text-center py-5">Seu carrinho está vazio. Explore nossos <a href="modelos.php">modelos</a>.</p>';
        btnSolicitar.disabled = true;
        totalItems.innerText = '0';
        return;
    }

    btnSolicitar.disabled = false;
    totalItems.innerText = cart.length;

    cart.forEach((carro, index) => {
        const itemHtml = `
            <div class="cart-item">
                <img src="${carro.imagemUrl}" alt="${carro.nome}">
                <div class="cart-item-details">
                    <h4>${carro.nome}</h4>
                    <p>Versão: ${carro.versao}</p>
                    <p class="fw-bold mt-2">${carro.preco}</p>
                </div>
                <button class="btn-remove-cart" onclick="removeFromCart(${index})">Remover</button>
            </div>
        `;
        container.innerHTML += itemHtml;
    });
}

// Lógica para envio da proposta profissional
document.addEventListener('submit', function(e) {
    if (e.target && e.target.id === 'propostaForm') {
        e.preventDefault(); // Impede o envio real (que recarregaria a página)

        const formContent = document.getElementById('formContent');
        const successMessage = document.getElementById('successMessage');

        // Esconde o formulário e mostra o sucesso com uma transição suave
        formContent.classList.add('d-none');
        successMessage.classList.remove('d-none');

        // Limpa o carrinho local após a proposta ser "enviada"
        localStorage.removeItem('aurora_cart');
        
        // Atualiza a contagem no header e a lista na página
        if (typeof updateCartCount === "function") updateCartCount();
        if (typeof renderCart === "function") renderCart();
    }
});

window.addToCart = function(nome, versao, preco, imagemUrl) {
    const cart = getCart();
    const novoCarro = { nome, versao, preco, imagemUrl };
    
    cart.push(novoCarro);
    localStorage.setItem('aurora_cart', JSON.stringify(cart));
    
    updateCartCount();


    const toast = document.getElementById('cartToast');
    const toastMsg = document.getElementById('toastMessage');
    
    if (toast) {
        toastMsg.innerText = nome + ' ADICIONADO À LISTA';
        toast.classList.remove('d-none');
        
        // Esconde automaticamente após 3 segundos
        setTimeout(() => {
            toast.classList.add('d-none');
        }, 3000);
    }
}

// ==========================================
// LÓGICA PARA ESVAZIAR O CARRINHO
// ==========================================
document.addEventListener('click', function(e) {
    // Usamos o 'closest' para garantir que funcione mesmo se o usuário clicar exatamente em cima do ícone da lixeira
    const btnLimpar = e.target.closest('#btnLimparCarrinho');
    
    if (btnLimpar) {
        // Confirmação de segurança (UX)
        if (confirm("Tem certeza que deseja remover todos os veículos da sua lista?")) {
            
            // 1. Remove os dados salvos no navegador
            localStorage.removeItem('aurora_cart');
            
            // 2. Atualiza a bolinha vermelha no header (se a função existir)
            if (typeof updateCartCount === "function") {
                updateCartCount();
            }
            
            // 3. Recarrega a lista na tela para mostrar que está vazio
            if (typeof renderCart === "function") {
                renderCart();
            }
            
            // 4. Dispara a notificação visual (Toast)
            const toast = document.getElementById('cartToast');
            const toastMsg = document.getElementById('toastMessage');
            
            if (toast && toastMsg) {
                toastMsg.innerText = 'CARRINHO ESVAZIADO';
                toast.classList.remove('d-none');
                
                setTimeout(() => {
                    toast.classList.add('d-none');
                }, 3000);
            }
        }
    }
});