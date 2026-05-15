<?php
require_once 'conexao.php';
include 'includes/header.php';

/*
    Produtos fixos da Boutique:
    - São os produtos principais do projeto.
    - Produtos vindos do banco podem ser adicionados na tabela produtos_boutique.
    - Se a tabela não existir, a página continua funcionando normalmente.
*/

$produtosBanco = [];

try {
    $stmtTabela = $pdo->query("SHOW TABLES LIKE 'produtos_boutique'");
    $tabelaExiste = $stmtTabela->fetchColumn();

    if ($tabelaExiste) {
        $stmtProdutos = $pdo->query("
            SELECT 
                id,
                nome,
                categoria,
                descricao,
                preco,
                imagem,
                ativo
            FROM produtos_boutique
            WHERE ativo = 1
            ORDER BY id DESC
        ");

        $produtosBanco = $stmtProdutos->fetchAll();
    }
} catch (PDOException $e) {
    $produtosBanco = [];
}

function formatarPrecoBoutique($valor) {
    return 'R$ ' . number_format((float)$valor, 2, ',', '.');
}

function jsBoutique($valor) {
    return htmlspecialchars(json_encode((string)$valor), ENT_QUOTES, 'UTF-8');
}
?>

<main class="boutique-page">
    <section class="boutique-header">
        <h1>Boutique Aurora Motors</h1>
        <p>
            Explore uma seleção exclusiva de acessórios, vestuário e itens premium inspirados no universo Aurora Motors.
        </p>
    </section>

    <section class="boutique-container">
        <aside class="boutique-sidebar">
            <h3>Categorias</h3>

            <div class="boutique-filtros-grid">
                <button class="btn-boutique-filtro" data-filter="vestuario">Vestuário</button>
                <button class="btn-boutique-filtro" data-filter="acessorios">Acessórios</button>
                <button class="btn-boutique-filtro" data-filter="colecionaveis">Colecionáveis</button>
                <button class="btn-boutique-filtro" data-filter="lifestyle">Lifestyle</button>
            </div>

            <button class="btn-boutique-limpar" id="btnLimparFiltrosBoutique">
                Limpar Seleções
            </button>
        </aside>

        <section class="boutique-vitrine">

            <div class="boutique-card" data-category="vestuario">
                <span class="boutique-badge">Vestuário</span>

                <div class="boutique-img-box">
                    <img src="assets/img/boutique-jaqueta.png" alt="Jaqueta Aurora Heritage">
                </div>

                <h2>Jaqueta Aurora Heritage</h2>

                <p class="boutique-description">
                    Jaqueta premium com acabamento minimalista e assinatura Aurora Motors.
                </p>

                <p class="boutique-price">
                    <strong>R$ 899,90</strong>
                </p>

                <button 
                    class="btn btn-dark w-100 premium-btn mt-3"
                    onclick="addToCart('Jaqueta Aurora Heritage', 'Vestuário Premium', 'R$ 899,90', 'assets/img/boutique-jaqueta.png')"
                >
                    Adicionar ao Carrinho
                </button>
            </div>

            <div class="boutique-card" data-category="vestuario">
                <span class="boutique-badge">Vestuário</span>

                <div class="boutique-img-box">
                    <img src="assets/img/boutique-camiseta.png" alt="Camiseta Aurora Black Edition">
                </div>

                <h2>Camiseta Aurora Black Edition</h2>

                <p class="boutique-description">
                    Camiseta preta com logo Aurora em acabamento dourado discreto.
                </p>

                <p class="boutique-price">
                    <strong>R$ 189,90</strong>
                </p>

                <button 
                    class="btn btn-dark w-100 premium-btn mt-3"
                    onclick="addToCart('Camiseta Aurora Black Edition', 'Vestuário Casual', 'R$ 189,90', 'assets/img/boutique-camiseta.png')"
                >
                    Adicionar ao Carrinho
                </button>
            </div>

            <div class="boutique-card" data-category="acessorios">
                <span class="boutique-badge">Acessórios</span>

                <div class="boutique-img-box">
                    <img src="assets/img/boutique-chaveiro.png" alt="Chaveiro Aurora Titanium">
                </div>

                <h2>Chaveiro Aurora Titanium</h2>

                <p class="boutique-description">
                    Chaveiro metálico inspirado no acabamento interno dos modelos Aurora.
                </p>

                <p class="boutique-price">
                    <strong>R$ 129,90</strong>
                </p>

                <button 
                    class="btn btn-dark w-100 premium-btn mt-3"
                    onclick="addToCart('Chaveiro Aurora Titanium', 'Acessório Oficial', 'R$ 129,90', 'assets/img/boutique-chaveiro.png')"
                >
                    Adicionar ao Carrinho
                </button>
            </div>

            <div class="boutique-card" data-category="acessorios">
                <span class="boutique-badge">Acessórios</span>

                <div class="boutique-img-box">
                    <img src="assets/img/boutique-bone.png" alt="Boné Aurora Performance">
                </div>

                <h2>Boné Aurora Performance</h2>

                <p class="boutique-description">
                    Boné estruturado com logo frontal e ajuste traseiro premium.
                </p>

                <p class="boutique-price">
                    <strong>R$ 159,90</strong>
                </p>

                <button 
                    class="btn btn-dark w-100 premium-btn mt-3"
                    onclick="addToCart('Boné Aurora Performance', 'Acessório Lifestyle', 'R$ 159,90', 'assets/img/boutique-bone.png')"
                >
                    Adicionar ao Carrinho
                </button>
            </div>

            <div class="boutique-card" data-category="colecionaveis">
                <span class="boutique-badge">Colecionáveis</span>

                <div class="boutique-img-box">
                    <img src="assets/img/boutique-miniatura-vanguard.png" alt="Miniatura Aurora Vanguard M-Line">
                </div>

                <h2>Miniatura Vanguard M-Line</h2>

                <p class="boutique-description">
                    Miniatura colecionável em escala reduzida do Aurora Vanguard M-Line.
                </p>

                <p class="boutique-price">
                    <strong>R$ 349,90</strong>
                </p>

                <button 
                    class="btn btn-dark w-100 premium-btn mt-3"
                    onclick="addToCart('Miniatura Vanguard M-Line', 'Colecionável Oficial', 'R$ 349,90', 'assets/img/boutique-miniatura.png')"
                >
                    Adicionar ao Carrinho
                </button>
            </div>

            <div class="boutique-card" data-category="colecionaveis">
                <span class="boutique-badge">Colecionáveis</span>

                <div class="boutique-img-box">
                    <img src="assets/img/boutique-poster-aethelv12.png" alt="Pôster Aurora Aethel V12">
                </div>

                <h2>Pôster Aurora Aethel V12</h2>

                <p class="boutique-description">
                    Pôster premium do hypercarro Aurora Aethel V12 em edição de garagem.
                </p>

                <p class="boutique-price">
                    <strong>R$ 89,90</strong>
                </p>

                <button 
                    class="btn btn-dark w-100 premium-btn mt-3"
                    onclick="addToCart('Pôster Aurora Aethel V12', 'Colecionável Decorativo', 'R$ 89,90', 'assets/img/boutique-poster.png')"
                >
                    Adicionar ao Carrinho
                </button>
            </div>

            <div class="boutique-card" data-category="lifestyle">
                <span class="boutique-badge">Lifestyle</span>

                <div class="boutique-img-box">
                    <img src="assets/img/boutique-garrafa-thermal.png" alt="Garrafa Aurora Thermal">
                </div>

                <h2>Garrafa Aurora Thermal</h2>

                <p class="boutique-description">
                    Garrafa térmica em aço inox com assinatura Aurora Motors.
                </p>

                <p class="boutique-price">
                    <strong>R$ 219,90</strong>
                </p>

                <button 
                    class="btn btn-dark w-100 premium-btn mt-3"
                    onclick="addToCart('Garrafa Aurora Thermal', 'Lifestyle Premium', 'R$ 219,90', 'assets/img/boutique-garrafa.png')"
                >
                    Adicionar ao Carrinho
                </button>
            </div>

            <div class="boutique-card" data-category="lifestyle">
                <span class="boutique-badge">Lifestyle</span>

                <div class="boutique-img-box">
                    <img src="assets/img/boutique-mochila.png" alt="Mochila Aurora Executive">
                </div>

                <h2>Mochila Aurora Executive</h2>

                <p class="boutique-description">
                    Mochila executiva com compartimento para notebook e acabamento premium.
                </p>

                <p class="boutique-price">
                    <strong>R$ 499,90</strong>
                </p>

                <button 
                    class="btn btn-dark w-100 premium-btn mt-3"
                    onclick="addToCart('Mochila Aurora Executive', 'Lifestyle Executivo', 'R$ 499,90', 'assets/img/boutique-mochila.png')"
                >
                    Adicionar ao Carrinho
                </button>
            </div>

            <div class="boutique-card" data-category="lifestyle">
                <span class="boutique-badge">Home Charge</span>

                <div class="boutique-img-box">
                    <img src="assets/img/wallbox-premium.png" alt="Wallbox Aurora Home Charge">
                </div>

                <h2>Wallbox Aurora Home Charge</h2>

                <p class="boutique-description">
                    Estação individual de carregamento residencial para veículos elétricos e híbridos plug-in Aurora.
                </p>

                <p class="boutique-price">
                    <strong>R$ 6.499,90</strong>
                </p>

                <button 
                    class="btn btn-dark w-100 premium-btn mt-3"
                    onclick="addToCart('Wallbox Aurora Home Charge', 'Carregador Residencial', 'R$ 6.499,90', 'assets/img/boutique-wallbox.png')"
                >
                    Adicionar ao Carrinho
                </button>
            </div>

            <?php if (!empty($produtosBanco)): ?>
                <?php foreach ($produtosBanco as $produto): ?>
                    <?php
                        $nomeProduto = $produto['nome'] ?? 'Produto Aurora';
                        $categoriaProduto = $produto['categoria'] ?? 'lifestyle';
                        $descricaoProduto = $produto['descricao'] ?? '';
                        $precoProduto = formatarPrecoBoutique($produto['preco'] ?? 0);
                        $imagemProduto = !empty($produto['imagem']) ? $produto['imagem'] : 'assets/img/boutique-itens.png';
                    ?>

                    <div class="boutique-card" data-category="<?php echo htmlspecialchars(strtolower($categoriaProduto)); ?>">
                        <span class="boutique-badge">
                            <?php echo htmlspecialchars($categoriaProduto); ?>
                        </span>

                        <div class="boutique-img-box">
                            <img 
                                src="<?php echo htmlspecialchars($imagemProduto); ?>" 
                                alt="<?php echo htmlspecialchars($nomeProduto); ?>"
                            >
                        </div>

                        <h2><?php echo htmlspecialchars($nomeProduto); ?></h2>

                        <p class="boutique-description">
                            <?php echo htmlspecialchars($descricaoProduto); ?>
                        </p>

                        <p class="boutique-price">
                            <strong><?php echo htmlspecialchars($precoProduto); ?></strong>
                        </p>

                        <button 
                            class="btn btn-dark w-100 premium-btn mt-3"
                            onclick="addToCart(
                                <?php echo jsBoutique($nomeProduto); ?>,
                                <?php echo jsBoutique($categoriaProduto); ?>,
                                <?php echo jsBoutique($precoProduto); ?>,
                                <?php echo jsBoutique($imagemProduto); ?>
                            )"
                        >
                            Adicionar ao Carrinho
                        </button>
                    </div>
                <?php endforeach; ?>
            <?php endif; ?>

        </section>
    </section>
</main>

<script src="assets/js/boutique.js"></script>

<?php 
include 'includes/footer.php'; 
?>
