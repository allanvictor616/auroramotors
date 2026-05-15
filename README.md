# 🚗 Aurora Motors

Projeto acadêmico desenvolvido para simular o site completo de uma concessionária premium, com páginas institucionais, área do cliente, sistema de login, propostas, agendamentos, boutique, carrinho de compras e integração com banco de dados MySQL.

---

## 📌 Sobre o Projeto

O **Aurora Motors** é um sistema web desenvolvido em PHP, MySQL, HTML, CSS, JavaScript e Bootstrap, simulando a experiência digital de uma marca automotiva premium.

O projeto possui interface visual sofisticada, páginas comerciais, área autenticada para clientes e funcionalidades conectadas ao banco de dados, permitindo demonstrar operações de CRUD e fluxo completo de navegação.

---

## 🎯 Objetivos

- Criar um site institucional premium para uma concessionária fictícia.
- Aplicar conceitos de front-end e back-end.
- Trabalhar com banco de dados MySQL.
- Demonstrar operações de CRUD.
- Simular cadastro, login, edição de perfil, propostas, agendamentos e pedidos.
- Organizar o projeto para apresentação acadêmica.

---

## 🖥️ Funcionalidades

### Área pública

- Página inicial com identidade visual premium.
- Página de modelos de veículos.
- Página de boutique com produtos.
- Página de serviços financeiros.
- Página Aurora Service & Care.
- Página de vendas especiais.
- Página Aurora Premium Selection.
- Página Aurora Exclusive & Tech.
- Página Lifestyle & Acessórios.
- Página de simulação de financiamento.

### Área do cliente

- Cadastro de usuário.
- Login e logout.
- Exibição do nome do cliente no header.
- Página Minha Conta.
- Edição de dados pessoais.
- Cadastro, edição e exclusão de endereço.
- Visualização de veículo vinculado ao cliente.
- Página Meus Veículos.
- Página de Segurança.
- Histórico de propostas.
- Histórico de compras.
- Acompanhamento de pedidos.
- Cancelamento de pedido.
- Exibição de rastreio somente quando o pedido estiver enviado ou entregue.

### Boutique e carrinho

- Listagem de produtos fixos.
- Listagem de produtos cadastrados no banco.
- Filtro por categorias.
- Adição de produtos ao carrinho.
- Controle de quantidade.
- Remoção de produtos.
- Esvaziar carrinho.
- Checkout com dados do cliente.
- Registro da compra no banco.
- Registro dos itens comprados no banco.

### Banco de dados

O projeto utiliza o banco:

```txt
aurora_motors

Com tabelas como:

usuarios
enderecos_usuario
veiculos
propostas
agendamentos
produtos_boutique
pedidos_boutique
pedido_boutique_itens
contatos

🛠️ Tecnologias Utilizadas
PHP
MySQL
phpMyAdmin
HTML5
CSS3
JavaScript
Bootstrap 5
Bootstrap Icons
XAMPP

📂 Estrutura do Projeto
auroramotors/
│
├── assets/
│   ├── css/
│   ├── js/
│   ├── img/
│   └── video/
│
├── includes/
│   ├── header.php
│   └── footer.php
│
├── sql/
│   └── aurora_motors.sql
│
├── index.php
├── modelos.php
├── boutique.php
├── carrinho.php
├── minha-conta.php
├── meus-pedidos.php
├── meus-veiculos.php
├── agendamentos.php
├── agendar-revisao.php
├── seguranca.php
├── simulacao.php
├── vendas-especiais.php
├── servicos-financeiros.php
├── aurora-service.php
├── premium-selection.php
├── aurora-exclusive.php
├── lifestyle-acessorios.php
├── conexao.php
├── processa_login.php
├── processa_cadastro.php
├── processa_atualizar_perfil.php
├── processa_compra_boutique.php
├── processa_cancelar_pedido.php
└── README.md

🚀 Como Executar o Projeto
1. Copiar o projeto para o XAMPP

Copie a pasta do projeto para:

C:\xampp\htdocs\

A estrutura deve ficar assim:

C:\xampp\htdocs\auroramotors
2. Iniciar o XAMPP

Abra o XAMPP e inicie:

Apache
MySQL
3. Importar o banco de dados

Acesse o phpMyAdmin:

http://localhost/phpmyadmin

Depois:

Clique em Importar.
Selecione o arquivo:
sql/aurora_motors.sql
Clique em Executar.
4. Acessar o projeto

No navegador, acesse:

http://localhost/auroramotors/

🔐 Dados de Teste

Você pode criar um novo usuário diretamente pelo site usando o botão de cadastro.

Após criar a conta, é possível testar:

Login.
Edição de dados pessoais.
Cadastro de endereço.
Exclusão de endereço.
Solicitação de proposta.
Agendamento de revisão.
Compra na boutique.
Cancelamento de pedido.
Alteração de status no banco para testar rastreio.

🧪 Demonstração do CRUD

O projeto permite demonstrar operações de CRUD em diferentes partes do sistema.

Create
Cadastro de usuário.
Cadastro de endereço.
Criação de proposta.
Criação de agendamento.
Criação de pedido na boutique.
Read
Exibição dos dados do cliente.
Exibição de veículos.
Exibição de propostas.
Exibição de agendamentos.
Exibição de compras e itens do pedido.
Update
Atualização dos dados pessoais.
Atualização de endereço.
Atualização de status do pedido pelo banco.
Delete
Exclusão de endereço.
Cancelamento de pedido por alteração de status.

📦 Observações sobre Imagens

As imagens do projeto ficam salvas na pasta:

assets/img/

O banco de dados armazena apenas o caminho da imagem, por exemplo:

assets/img/boutique-limpeza.png

👨‍💻 Autor

Desenvolvido por Allan Victor Pehlivanidis França

Projeto acadêmico desenvolvido para fins de estudo e apresentação.

📚 Considerações Finais

O Aurora Motors foi desenvolvido como um projeto acadêmico completo, simulando um ambiente real de concessionária premium com integração entre front-end, back-end e banco de dados.

O sistema demonstra conceitos de navegação, autenticação, manipulação de dados, organização de interface, carrinho de compras e relacionamento entre tabelas no MySQL.


Pode copiar **somente esse bloco acima** e substituir tudo no `README.md`. Não coloca aquelas frases finais tipo “Pode manter esse arquivo...” dentro do README, porque aquilo era só orientação minha para você, não faz parte do arquivo.