<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

require_once 'conexao.php';

if (!isset($_SESSION['logado']) || $_SESSION['logado'] !== true) {
    header("Location: index.php");
    exit;
}

$usuario_id = $_SESSION['usuario_id'];

$stmt = $pdo->prepare("SELECT * FROM usuarios WHERE id = :id LIMIT 1");
$stmt->bindParam(':id', $usuario_id);
$stmt->execute();
$usuario = $stmt->fetch();

$stmtVeiculo = $pdo->prepare("SELECT * FROM veiculos WHERE usuario_id = :usuario_id ORDER BY id DESC LIMIT 1");
$stmtVeiculo->bindParam(':usuario_id', $usuario_id);
$stmtVeiculo->execute();
$veiculo = $stmtVeiculo->fetch();

$stmtEnderecos = $pdo->prepare("
    SELECT * 
    FROM enderecos_usuario 
    WHERE usuario_id = :usuario_id 
    ORDER BY principal DESC, id DESC
");
$stmtEnderecos->bindParam(':usuario_id', $usuario_id);
$stmtEnderecos->execute();
$enderecos = $stmtEnderecos->fetchAll();

include 'includes/header.php';
?>

<style>
    body { 
        background-color: #f8f9fa; 
    }

    .account-hero {
        background-color: #121212;
        color: #fff;
        padding: 60px 0 40px;
    }

    .account-sidebar {
        background: #fff;
        border: 1px solid #eaeaea;
        padding: 30px 0;
        border-top: 3px solid #121212;
    }

    .account-link {
        display: block;
        padding: 12px 30px;
        color: #555;
        text-decoration: none;
        text-transform: uppercase;
        font-size: 13px;
        letter-spacing: 1px;
        transition: 0.3s;
        border-left: 3px solid transparent;
    }

    .account-link:hover, 
    .account-link.active {
        color: #fff;
        background-color: #121212;
        border-left-color: #c9933b;
        font-weight: 500;
    }

    .account-link.text-danger:hover {
        background-color: #dc3545;
        color: #fff !important;
        border-left-color: #dc3545;
    }

    .dashboard-card {
        background: #fff;
        border: 1px solid #eaeaea;
        border-top: 3px solid #121212;
        padding: 40px;
        margin-bottom: 30px;
        box-shadow: 0 12px 32px rgba(0,0,0,0.055);
    }

    .garage-card {
        position: relative;
        height: 250px;
        background: linear-gradient(rgba(0,0,0,0.2), rgba(0,0,0,0.8)), url('<?php echo $veiculo ? htmlspecialchars($veiculo['imagem']) : "assets/img/Vanguard M-Line.png"; ?>') center/cover;
        display: flex;
        align-items: flex-end;
        padding: 30px;
        color: #fff;
        border-bottom: 4px solid #c9933b;
    }

    .form-control-profile {
        border-radius: 0;
        background-color: #fafafa;
        border: 1px solid #ddd;
        padding: 12px 15px;
        color: #555;
    }

    .form-control-profile:focus {
        border-color: #c9933b;
        box-shadow: none;
        background-color: #fff;
    }

    .address-card {
        background: #fff;
        border: 1px solid #eaeaea;
        border-top: 3px solid #121212;
        padding: 24px;
        height: 100%;
        box-shadow: 0 12px 32px rgba(0,0,0,0.055);
        transition: 0.3s ease;
    }

    .address-card:hover {
        transform: translateY(-4px);
        box-shadow: 0 18px 42px rgba(0,0,0,0.09);
    }

    .address-card p {
        font-size: 14px;
    }

    .address-icon {
        width: 46px;
        height: 46px;
        border-radius: 50%;
        background: #121212;
        color: #c9933b;
        display: flex;
        align-items: center;
        justify-content: center;
        flex-shrink: 0;
    }

    .address-actions {
        display: flex;
        flex-wrap: wrap;
        gap: 8px;
    }

    .address-actions form {
        display: inline-block;
    }

    .empty-address-box {
        background: #fff;
        border: 1px dashed #ccc;
        padding: 30px;
        text-align: center;
    }

    @media (max-width: 768px) {
        .dashboard-card {
            padding: 28px;
        }

        .garage-card {
            height: 220px;
        }
    }
</style>

<main>
    <section class="account-hero">
        <div class="container">
            <div class="d-flex align-items-center gap-4">
                <div class="bg-dark d-flex justify-content-center align-items-center" style="width: 80px; height: 80px; border-radius: 50%; border: 2px solid #c9933b;">
                    <i class="bi bi-person text-white" style="font-size: 2.5rem;"></i>
                </div>

                <div>
                    <h6 class="text-uppercase mb-1" style="color: #c9933b; letter-spacing: 2px;">
                        Portal do Cliente
                    </h6>

                    <h2 class="fw-light mb-0">
                        Bem-vindo de volta, <?php echo htmlspecialchars($usuario['nome']); ?>
                    </h2>
                </div>
            </div>
        </div>
    </section>

    <section class="container py-5 my-3">
        <div class="row">
            <div class="col-lg-3 mb-5 mb-lg-0">
                <div class="account-sidebar shadow-sm">
                    <a href="minha-conta.php" class="account-link active">
                        <i class="bi bi-person me-3 fs-5"></i> Meu Perfil
                    </a>

                    <a href="meus-pedidos.php" class="account-link">
                        <i class="bi bi-box-seam me-3 fs-5"></i> Meus Pedidos
                    </a>

                    <a href="meus-veiculos.php" class="account-link">
                        <i class="bi bi-car-front me-3 fs-5"></i> Meus Veículos
                    </a>

                    <a href="agendamentos.php" class="account-link">
                        <i class="bi bi-calendar-check me-3 fs-5"></i> Agendamentos
                    </a>

                    <a href="seguranca.php" class="account-link">
                        <i class="bi bi-shield-lock me-3 fs-5"></i> Segurança
                    </a>

                    <a href="logout.php" class="account-link text-danger">
                        <i class="bi bi-box-arrow-right me-3 fs-5"></i> Sair da Conta
                    </a>
                </div>
            </div>

            <div class="col-lg-9">

                <?php if (isset($_SESSION['sucesso_perfil'])): ?>
                    <div class="alert alert-success">
                        <?php echo $_SESSION['sucesso_perfil']; unset($_SESSION['sucesso_perfil']); ?>
                    </div>
                <?php endif; ?>

                <?php if (isset($_SESSION['erro_perfil'])): ?>
                    <div class="alert alert-danger">
                        <?php echo $_SESSION['erro_perfil']; unset($_SESSION['erro_perfil']); ?>
                    </div>
                <?php endif; ?>

                <h4 class="fw-light mb-4">Minha Garagem</h4>

                <?php if ($veiculo): ?>
                    <div class="garage-card mb-5 shadow-sm">
                        <div>
                            <span class="badge bg-dark mb-2 border border-secondary text-uppercase" style="letter-spacing: 1px;">
                                Veículo <?php echo htmlspecialchars($veiculo['status']); ?>
                            </span>

                            <h3 class="fw-light mb-1">
                                <?php echo htmlspecialchars($veiculo['modelo']); ?>
                            </h3>

                            <p class="mb-0 text-white-50">
                                <i class="bi bi-ev-station me-2"></i>
                                <?php echo htmlspecialchars($veiculo['motorizacao']); ?>
                                • Placa: <?php echo htmlspecialchars($veiculo['placa']); ?>
                            </p>
                        </div>
                    </div>
                <?php else: ?>
                    <div class="dashboard-card shadow-sm mb-5">
                        <h5 class="fw-light mb-2">Nenhum veículo cadastrado</h5>
                        <p class="text-muted mb-0">
                            Você ainda não possui veículos vinculados ao seu perfil.
                        </p>
                    </div>
                <?php endif; ?>

                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h4 class="fw-light mb-0">Dados Pessoais</h4>
                </div>

                <div class="dashboard-card shadow-sm">
                    <form action="processa_atualizar_perfil.php" method="POST">
                        <div class="row g-4">
                            <div class="col-md-6">
                                <label class="small text-uppercase mb-2 text-muted fw-bold">Nome Completo</label>
                                <input 
                                    type="text" 
                                    name="nome" 
                                    class="form-control-profile w-100" 
                                    value="<?php echo htmlspecialchars($usuario['nome'] ?? ''); ?>" 
                                    required
                                >
                            </div>

                            <div class="col-md-6">
                                <label class="small text-uppercase mb-2 text-muted fw-bold">CPF</label>
                                <input 
                                    type="text" 
                                    name="cpf" 
                                    class="form-control-profile w-100" 
                                    value="<?php echo htmlspecialchars($usuario['cpf'] ?? ''); ?>" 
                                    placeholder="000.000.000-00"
                                >
                            </div>

                            <div class="col-md-6">
                                <label class="small text-uppercase mb-2 text-muted fw-bold">E-mail</label>
                                <input 
                                    type="email" 
                                    name="email" 
                                    class="form-control-profile w-100" 
                                    value="<?php echo htmlspecialchars($usuario['email'] ?? ''); ?>" 
                                    required
                                >
                            </div>

                            <div class="col-md-6">
                                <label class="small text-uppercase mb-2 text-muted fw-bold">Telefone / WhatsApp</label>
                                <input 
                                    type="text" 
                                    name="telefone" 
                                    class="form-control-profile w-100" 
                                    value="<?php echo htmlspecialchars($usuario['telefone'] ?? ''); ?>"
                                    placeholder="(11) 99999-9999"
                                >
                            </div>
                        </div>

                        <div class="mt-5 text-end">
                            <button 
                                type="submit" 
                                class="btn btn-dark rounded-0 px-5 py-2 text-uppercase" 
                                style="letter-spacing: 1px;"
                            >
                                Salvar Dados Pessoais
                            </button>
                        </div>
                    </form>
                </div>

                <div class="dashboard-card shadow-sm">
                    <div class="d-flex justify-content-between align-items-center mb-4 flex-wrap gap-3">
                        <div>
                            <h4 class="fw-light mb-1">Meus Endereços</h4>
                            <p class="text-muted mb-0 small">
                                Cadastre, edite, exclua ou defina o endereço principal da sua conta.
                            </p>
                        </div>

                        <button 
                            type="button" 
                            class="btn btn-dark rounded-0 px-4 py-2 text-uppercase" 
                            style="letter-spacing: 1px;"
                            data-bs-toggle="modal"
                            data-bs-target="#modalNovoEndereco"
                        >
                            Adicionar Endereço
                        </button>
                    </div>

                    <?php if (empty($enderecos)): ?>
                        <div class="empty-address-box">
                            <i class="bi bi-geo-alt" style="font-size: 42px; color: #c9933b;"></i>
                            <h5 class="fw-light mt-3">Nenhum endereço cadastrado</h5>
                            <p class="text-muted mb-0">
                                Clique em <strong>Adicionar Endereço</strong> para cadastrar seu primeiro endereço.
                            </p>
                        </div>
                    <?php else: ?>
                        <div class="row g-4">
                            <?php foreach ($enderecos as $endereco): ?>
                                <div class="col-md-6">
                                    <div class="address-card">
                                        <div class="d-flex justify-content-between align-items-start mb-3 gap-3">
                                            <div>
                                                <h6 class="text-uppercase mb-1" style="letter-spacing: 1px;">
                                                    <?php echo htmlspecialchars($endereco['titulo']); ?>
                                                </h6>

                                                <?php if ((int)$endereco['principal'] === 1): ?>
                                                    <span class="badge bg-dark rounded-0">
                                                        Principal
                                                    </span>
                                                <?php else: ?>
                                                    <span class="badge bg-secondary rounded-0">
                                                        Endereço adicional
                                                    </span>
                                                <?php endif; ?>
                                            </div>

                                            <div class="address-icon">
                                                <i class="bi bi-geo-alt"></i>
                                            </div>
                                        </div>

                                        <p class="mb-1">
                                            <?php echo htmlspecialchars($endereco['logradouro']); ?>, 
                                            <?php echo htmlspecialchars($endereco['numero']); ?>
                                        </p>

                                        <?php if (!empty($endereco['complemento'])): ?>
                                            <p class="mb-1 text-muted">
                                                <?php echo htmlspecialchars($endereco['complemento']); ?>
                                            </p>
                                        <?php endif; ?>

                                        <p class="mb-1 text-muted">
                                            <?php echo htmlspecialchars($endereco['bairro']); ?>
                                        </p>

                                        <p class="mb-1 text-muted">
                                            <?php echo htmlspecialchars($endereco['cidade']); ?>/<?php echo htmlspecialchars($endereco['estado']); ?>
                                        </p>

                                        <p class="mb-4 text-muted">
                                            CEP: <?php echo htmlspecialchars($endereco['cep']); ?>
                                        </p>

                                        <div class="address-actions">
                                            <button 
                                                type="button" 
                                                class="btn btn-outline-dark rounded-0 btn-sm text-uppercase"
                                                data-bs-toggle="modal"
                                                data-bs-target="#modalEditarEndereco<?php echo $endereco['id']; ?>"
                                            >
                                                Editar Endereço
                                            </button>

                                            <?php if ((int)$endereco['principal'] !== 1): ?>
                                                <form action="processa_endereco_principal.php" method="POST">
                                                    <input type="hidden" name="endereco_id" value="<?php echo $endereco['id']; ?>">

                                                    <button 
                                                        type="submit" 
                                                        class="btn btn-outline-secondary rounded-0 btn-sm text-uppercase"
                                                    >
                                                        Definir Principal
                                                    </button>
                                                </form>
                                            <?php endif; ?>

                                            <form action="processa_excluir_endereco.php" method="POST">
                                                <input type="hidden" name="endereco_id" value="<?php echo $endereco['id']; ?>">

                                                <button 
                                                    type="submit" 
                                                    class="btn btn-outline-danger rounded-0 btn-sm text-uppercase"
                                                    onclick="return confirm('Tem certeza que deseja excluir este endereço?');"
                                                >
                                                    Excluir
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                </div>

                                <div class="modal fade" id="modalEditarEndereco<?php echo $endereco['id']; ?>" tabindex="-1" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered modal-lg">
                                        <div class="modal-content premium-modal">
                                            <div class="modal-header border-0">
                                                <h5 class="modal-title fw-light text-uppercase" style="letter-spacing: 2px;">
                                                    Editar Endereço
                                                </h5>

                                                <button type="button" class="btn-close btn-close-black" data-bs-dismiss="modal"></button>
                                            </div>

                                            <form action="processa_salvar_endereco.php" method="POST">
                                                <div class="modal-body p-4">
                                                    <input type="hidden" name="endereco_id" value="<?php echo $endereco['id']; ?>">

                                                    <div class="row g-3">
                                                        <div class="col-md-6">
                                                            <label class="small text-uppercase mb-2 text-muted fw-bold">Título</label>
                                                            <input 
                                                                type="text" 
                                                                name="titulo" 
                                                                class="form-control-profile w-100" 
                                                                value="<?php echo htmlspecialchars($endereco['titulo']); ?>" 
                                                                required
                                                            >
                                                        </div>

                                                        <div class="col-md-6">
                                                            <label class="small text-uppercase mb-2 text-muted fw-bold">CEP</label>
                                                            <input 
                                                                type="text" 
                                                                name="cep" 
                                                                class="form-control-profile w-100" 
                                                                value="<?php echo htmlspecialchars($endereco['cep']); ?>" 
                                                                required
                                                            >
                                                        </div>

                                                        <div class="col-md-8">
                                                            <label class="small text-uppercase mb-2 text-muted fw-bold">Logradouro</label>
                                                            <input 
                                                                type="text" 
                                                                name="logradouro" 
                                                                class="form-control-profile w-100" 
                                                                value="<?php echo htmlspecialchars($endereco['logradouro']); ?>" 
                                                                required
                                                            >
                                                        </div>

                                                        <div class="col-md-4">
                                                            <label class="small text-uppercase mb-2 text-muted fw-bold">Número</label>
                                                            <input 
                                                                type="text" 
                                                                name="numero" 
                                                                class="form-control-profile w-100" 
                                                                value="<?php echo htmlspecialchars($endereco['numero']); ?>" 
                                                                required
                                                            >
                                                        </div>

                                                        <div class="col-md-6">
                                                            <label class="small text-uppercase mb-2 text-muted fw-bold">Complemento</label>
                                                            <input 
                                                                type="text" 
                                                                name="complemento" 
                                                                class="form-control-profile w-100" 
                                                                value="<?php echo htmlspecialchars($endereco['complemento'] ?? ''); ?>"
                                                            >
                                                        </div>

                                                        <div class="col-md-6">
                                                            <label class="small text-uppercase mb-2 text-muted fw-bold">Bairro</label>
                                                            <input 
                                                                type="text" 
                                                                name="bairro" 
                                                                class="form-control-profile w-100" 
                                                                value="<?php echo htmlspecialchars($endereco['bairro']); ?>" 
                                                                required
                                                            >
                                                        </div>

                                                        <div class="col-md-8">
                                                            <label class="small text-uppercase mb-2 text-muted fw-bold">Cidade</label>
                                                            <input 
                                                                type="text" 
                                                                name="cidade" 
                                                                class="form-control-profile w-100" 
                                                                value="<?php echo htmlspecialchars($endereco['cidade']); ?>" 
                                                                required
                                                            >
                                                        </div>

                                                        <div class="col-md-4">
                                                            <label class="small text-uppercase mb-2 text-muted fw-bold">Estado</label>
                                                            <input 
                                                                type="text" 
                                                                name="estado" 
                                                                maxlength="2" 
                                                                class="form-control-profile w-100" 
                                                                value="<?php echo htmlspecialchars($endereco['estado']); ?>" 
                                                                required
                                                            >
                                                        </div>

                                                        <div class="col-12">
                                                            <div class="form-check mt-2">
                                                                <input 
                                                                    class="form-check-input" 
                                                                    type="checkbox" 
                                                                    name="principal" 
                                                                    id="principalEditar<?php echo $endereco['id']; ?>"
                                                                    <?php echo (int)$endereco['principal'] === 1 ? 'checked' : ''; ?>
                                                                >

                                                                <label class="form-check-label" for="principalEditar<?php echo $endereco['id']; ?>">
                                                                    Definir como endereço principal
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="modal-footer border-0 px-4 pb-4">
                                                    <button type="button" class="btn btn-outline-dark rounded-0 px-4" data-bs-dismiss="modal">
                                                        Cancelar
                                                    </button>

                                                    <button type="submit" class="btn btn-dark rounded-0 px-5">
                                                        Salvar Endereço
                                                    </button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    <?php endif; ?>
                </div>

            </div>
        </div>
    </section>

    <div class="modal fade" id="modalNovoEndereco" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content premium-modal">
                <div class="modal-header border-0">
                    <h5 class="modal-title fw-light text-uppercase" style="letter-spacing: 2px;">
                        Adicionar Endereço
                    </h5>

                    <button type="button" class="btn-close btn-close-black" data-bs-dismiss="modal"></button>
                </div>

                <form action="processa_salvar_endereco.php" method="POST">
                    <div class="modal-body p-4">
                        <input type="hidden" name="endereco_id" value="">

                        <div class="row g-3">
                            <div class="col-md-6">
                                <label class="small text-uppercase mb-2 text-muted fw-bold">Título</label>
                                <input 
                                    type="text" 
                                    name="titulo" 
                                    class="form-control-profile w-100" 
                                    placeholder="Casa, Trabalho, Apartamento..." 
                                    required
                                >
                            </div>

                            <div class="col-md-6">
                                <label class="small text-uppercase mb-2 text-muted fw-bold">CEP</label>
                                <input 
                                    type="text" 
                                    name="cep" 
                                    class="form-control-profile w-100" 
                                    placeholder="00000-000" 
                                    required
                                >
                            </div>

                            <div class="col-md-8">
                                <label class="small text-uppercase mb-2 text-muted fw-bold">Logradouro</label>
                                <input 
                                    type="text" 
                                    name="logradouro" 
                                    class="form-control-profile w-100" 
                                    placeholder="Rua, avenida, travessa..." 
                                    required
                                >
                            </div>

                            <div class="col-md-4">
                                <label class="small text-uppercase mb-2 text-muted fw-bold">Número</label>
                                <input 
                                    type="text" 
                                    name="numero" 
                                    class="form-control-profile w-100" 
                                    placeholder="123" 
                                    required
                                >
                            </div>

                            <div class="col-md-6">
                                <label class="small text-uppercase mb-2 text-muted fw-bold">Complemento</label>
                                <input 
                                    type="text" 
                                    name="complemento" 
                                    class="form-control-profile w-100" 
                                    placeholder="Apartamento, bloco, casa..."
                                >
                            </div>

                            <div class="col-md-6">
                                <label class="small text-uppercase mb-2 text-muted fw-bold">Bairro</label>
                                <input 
                                    type="text" 
                                    name="bairro" 
                                    class="form-control-profile w-100" 
                                    placeholder="Bairro" 
                                    required
                                >
                            </div>

                            <div class="col-md-8">
                                <label class="small text-uppercase mb-2 text-muted fw-bold">Cidade</label>
                                <input 
                                    type="text" 
                                    name="cidade" 
                                    class="form-control-profile w-100" 
                                    placeholder="Cidade" 
                                    required
                                >
                            </div>

                            <div class="col-md-4">
                                <label class="small text-uppercase mb-2 text-muted fw-bold">Estado</label>
                                <input 
                                    type="text" 
                                    name="estado" 
                                    maxlength="2" 
                                    class="form-control-profile w-100" 
                                    placeholder="SP" 
                                    required
                                >
                            </div>

                            <div class="col-12">
                                <div class="form-check mt-2">
                                    <input 
                                        class="form-check-input" 
                                        type="checkbox" 
                                        name="principal" 
                                        id="principalNovo"
                                    >

                                    <label class="form-check-label" for="principalNovo">
                                        Definir como endereço principal
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="modal-footer border-0 px-4 pb-4">
                        <button type="button" class="btn btn-outline-dark rounded-0 px-4" data-bs-dismiss="modal">
                            Cancelar
                        </button>

                        <button type="submit" class="btn btn-dark rounded-0 px-5">
                            Cadastrar Endereço
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</main>

<?php include 'includes/footer.php'; ?>