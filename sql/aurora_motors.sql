-- phpMyAdmin SQL Dump
-- version 5.2.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: May 15, 2026 at 06:44 PM
-- Server version: 8.4.3
-- PHP Version: 8.3.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `aurora_motors`
--
CREATE DATABASE IF NOT EXISTS `aurora_motors` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci;
USE `aurora_motors`;

-- --------------------------------------------------------

--
-- Table structure for table `agendamentos`
--

DROP TABLE IF EXISTS `agendamentos`;
CREATE TABLE `agendamentos` (
  `id` int NOT NULL,
  `usuario_id` int DEFAULT NULL,
  `nome` varchar(120) NOT NULL,
  `email` varchar(160) NOT NULL,
  `telefone` varchar(30) DEFAULT NULL,
  `modelo` varchar(120) DEFAULT NULL,
  `placa` varchar(20) DEFAULT NULL,
  `servico` varchar(120) DEFAULT NULL,
  `data_agendamento` date DEFAULT NULL,
  `horario` time DEFAULT NULL,
  `observacoes` text,
  `status` varchar(50) DEFAULT 'Agendado',
  `criado_em` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `contatos`
--

DROP TABLE IF EXISTS `contatos`;
CREATE TABLE `contatos` (
  `id` int NOT NULL,
  `nome` varchar(120) NOT NULL,
  `email` varchar(160) NOT NULL,
  `telefone` varchar(30) DEFAULT NULL,
  `assunto` varchar(160) DEFAULT NULL,
  `mensagem` text NOT NULL,
  `criado_em` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `enderecos_usuario`
--

DROP TABLE IF EXISTS `enderecos_usuario`;
CREATE TABLE `enderecos_usuario` (
  `id` int NOT NULL,
  `usuario_id` int NOT NULL,
  `titulo` varchar(80) DEFAULT 'Endereço',
  `cep` varchar(20) NOT NULL,
  `logradouro` varchar(180) NOT NULL,
  `numero` varchar(20) NOT NULL,
  `complemento` varchar(120) DEFAULT NULL,
  `bairro` varchar(100) NOT NULL,
  `cidade` varchar(100) NOT NULL,
  `estado` varchar(2) NOT NULL,
  `principal` tinyint(1) DEFAULT '0',
  `criado_em` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `enderecos_usuario`
--

INSERT INTO `enderecos_usuario` (`id`, `usuario_id`, `titulo`, `cep`, `logradouro`, `numero`, `complemento`, `bairro`, `cidade`, `estado`, `principal`, `criado_em`) VALUES
(1, 1, 'Endereço principal', '04538132', 'Av. Brigadeiro Faria Lima', '3500', 'Aurora Motors do Brasil S.A. - Sede Matriz', 'Itaim Bibi', 'São Paulo', 'SP', 1, '2026-05-15 18:41:04');

-- --------------------------------------------------------

--
-- Table structure for table `pedidos_boutique`
--

DROP TABLE IF EXISTS `pedidos_boutique`;
CREATE TABLE `pedidos_boutique` (
  `id` int NOT NULL,
  `usuario_id` int NOT NULL,
  `nome_cliente` varchar(120) NOT NULL,
  `email_cliente` varchar(160) NOT NULL,
  `telefone_cliente` varchar(30) DEFAULT NULL,
  `endereco_entrega` varchar(255) DEFAULT NULL,
  `valor_total` decimal(12,2) DEFAULT '0.00',
  `status` varchar(50) DEFAULT 'Pedido recebido',
  `codigo_rastreio` varchar(80) DEFAULT NULL,
  `criado_em` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pedido_boutique_itens`
--

DROP TABLE IF EXISTS `pedido_boutique_itens`;
CREATE TABLE `pedido_boutique_itens` (
  `id` int NOT NULL,
  `pedido_id` int NOT NULL,
  `nome_produto` varchar(160) NOT NULL,
  `categoria` varchar(120) DEFAULT NULL,
  `preco_unitario` decimal(12,2) DEFAULT '0.00',
  `quantidade` int DEFAULT '1',
  `subtotal` decimal(12,2) DEFAULT '0.00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `produtos_boutique`
--

DROP TABLE IF EXISTS `produtos_boutique`;
CREATE TABLE `produtos_boutique` (
  `id` int NOT NULL,
  `nome` varchar(160) NOT NULL,
  `categoria` varchar(80) NOT NULL,
  `descricao` text,
  `preco` decimal(12,2) NOT NULL,
  `imagem` varchar(255) DEFAULT NULL,
  `ativo` tinyint(1) DEFAULT '1',
  `criado_em` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `produtos_boutique`
--

INSERT INTO `produtos_boutique` (`id`, `nome`, `categoria`, `descricao`, `preco`, `imagem`, `ativo`, `criado_em`) VALUES
(1, 'Kit Limpeza Aurora Premium', 'acessorios', 'Kit de limpeza automotiva premium com acabamento Aurora Motors.', 299.90, 'assets/img/boutique-limpeza.png', 1, '2026-05-15 11:40:36');

-- --------------------------------------------------------

--
-- Table structure for table `propostas`
--

DROP TABLE IF EXISTS `propostas`;
CREATE TABLE `propostas` (
  `id` int NOT NULL,
  `usuario_id` int DEFAULT NULL,
  `nome` varchar(120) NOT NULL,
  `email` varchar(160) NOT NULL,
  `telefone` varchar(30) DEFAULT NULL,
  `modelo` varchar(120) DEFAULT NULL,
  `mensagem` text,
  `valor_total` decimal(12,2) DEFAULT '0.00',
  `status` varchar(50) DEFAULT 'Pendente',
  `criado_em` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
CREATE TABLE `usuarios` (
  `id` int NOT NULL,
  `nome` varchar(120) NOT NULL,
  `email` varchar(160) NOT NULL,
  `telefone` varchar(30) DEFAULT NULL,
  `senha` varchar(255) NOT NULL,
  `criado_em` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `cpf` varchar(20) DEFAULT NULL,
  `endereco` varchar(180) DEFAULT NULL,
  `cep` varchar(20) DEFAULT NULL,
  `cidade` varchar(100) DEFAULT NULL,
  `estado` varchar(2) DEFAULT NULL,
  `numero` varchar(20) DEFAULT NULL,
  `complemento` varchar(120) DEFAULT NULL,
  `bairro` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `usuarios`
--

INSERT INTO `usuarios` (`id`, `nome`, `email`, `telefone`, `senha`, `criado_em`, `cpf`, `endereco`, `cep`, `cidade`, `estado`, `numero`, `complemento`, `bairro`) VALUES
(1, 'Cliente Aurora', 'cliente@aurora.com', '11999999999', '$2y$10$J4/NwvVV.BVg80ZI6N.cp.PdH23ZbauoJjta/fsBdJSHGkBz6j.Z2', '2026-05-15 18:36:04', '1234567890', '', '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `veiculos`
--

DROP TABLE IF EXISTS `veiculos`;
CREATE TABLE `veiculos` (
  `id` int NOT NULL,
  `usuario_id` int NOT NULL,
  `modelo` varchar(120) NOT NULL,
  `versao` varchar(120) DEFAULT NULL,
  `placa` varchar(20) NOT NULL,
  `motorizacao` varchar(120) DEFAULT NULL,
  `cor` varchar(80) DEFAULT NULL,
  `ano` int DEFAULT NULL,
  `status` varchar(50) DEFAULT 'Ativo',
  `imagem` varchar(255) DEFAULT 'assets/img/Vanguard M-Line.png',
  `criado_em` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `veiculos`
--

INSERT INTO `veiculos` (`id`, `usuario_id`, `modelo`, `versao`, `placa`, `motorizacao`, `cor`, `ano`, `status`, `imagem`, `criado_em`) VALUES
(1, 1, 'Aurora Vanguard M-Line', 'Premium Hybrid', 'ABC1D23', 'Híbrido Plug-in', 'Cinza Escandinavo', 2026, 'Ativo', 'assets/img/Vanguard M-Line.png', '2026-05-15 18:37:52');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `agendamentos`
--
ALTER TABLE `agendamentos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `usuario_id` (`usuario_id`);

--
-- Indexes for table `contatos`
--
ALTER TABLE `contatos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `enderecos_usuario`
--
ALTER TABLE `enderecos_usuario`
  ADD PRIMARY KEY (`id`),
  ADD KEY `usuario_id` (`usuario_id`);

--
-- Indexes for table `pedidos_boutique`
--
ALTER TABLE `pedidos_boutique`
  ADD PRIMARY KEY (`id`),
  ADD KEY `usuario_id` (`usuario_id`);

--
-- Indexes for table `pedido_boutique_itens`
--
ALTER TABLE `pedido_boutique_itens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pedido_id` (`pedido_id`);

--
-- Indexes for table `produtos_boutique`
--
ALTER TABLE `produtos_boutique`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `propostas`
--
ALTER TABLE `propostas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `usuario_id` (`usuario_id`);

--
-- Indexes for table `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `veiculos`
--
ALTER TABLE `veiculos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `usuario_id` (`usuario_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `agendamentos`
--
ALTER TABLE `agendamentos`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `contatos`
--
ALTER TABLE `contatos`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `enderecos_usuario`
--
ALTER TABLE `enderecos_usuario`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `pedidos_boutique`
--
ALTER TABLE `pedidos_boutique`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pedido_boutique_itens`
--
ALTER TABLE `pedido_boutique_itens`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `produtos_boutique`
--
ALTER TABLE `produtos_boutique`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `propostas`
--
ALTER TABLE `propostas`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `veiculos`
--
ALTER TABLE `veiculos`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `agendamentos`
--
ALTER TABLE `agendamentos`
  ADD CONSTRAINT `agendamentos_ibfk_1` FOREIGN KEY (`usuario_id`) REFERENCES `usuarios` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `enderecos_usuario`
--
ALTER TABLE `enderecos_usuario`
  ADD CONSTRAINT `enderecos_usuario_ibfk_1` FOREIGN KEY (`usuario_id`) REFERENCES `usuarios` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `pedidos_boutique`
--
ALTER TABLE `pedidos_boutique`
  ADD CONSTRAINT `pedidos_boutique_ibfk_1` FOREIGN KEY (`usuario_id`) REFERENCES `usuarios` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `pedido_boutique_itens`
--
ALTER TABLE `pedido_boutique_itens`
  ADD CONSTRAINT `pedido_boutique_itens_ibfk_1` FOREIGN KEY (`pedido_id`) REFERENCES `pedidos_boutique` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `propostas`
--
ALTER TABLE `propostas`
  ADD CONSTRAINT `propostas_ibfk_1` FOREIGN KEY (`usuario_id`) REFERENCES `usuarios` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `veiculos`
--
ALTER TABLE `veiculos`
  ADD CONSTRAINT `veiculos_ibfk_1` FOREIGN KEY (`usuario_id`) REFERENCES `usuarios` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
