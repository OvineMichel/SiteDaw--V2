-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 19/09/2024 às 23:51
-- Versão do servidor: 10.4.32-MariaDB
-- Versão do PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `bancosd`
--
CREATE DATABASE IF NOT EXISTS `bancosd` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `bancosd`;

-- --------------------------------------------------------

--
-- Estrutura para tabela `categoria`
--

CREATE TABLE `categoria` (
  `id_categoria` int(11) NOT NULL,
  `nome` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;



-- --------------------------------------------------------

--
-- Estrutura para tabela `cliente`
--

CREATE TABLE `cliente` (
  `id_cliente` int(11) NOT NULL,
  `email` varchar(60) DEFAULT NULL,
  `senha` varchar(20) DEFAULT NULL,
  `nome_cliente` varchar(60) DEFAULT NULL,
  `adm` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;



-- --------------------------------------------------------

--
-- Estrutura para tabela `produto`
--

CREATE TABLE `produto` (
  `id_produto` int(11) NOT NULL,
  `id_categoria_id` int(11) DEFAULT NULL,
  `valor` float DEFAULT NULL,
  `descricao` varchar(120) DEFAULT NULL,
  `nome_produto` varchar(60) DEFAULT NULL,
  `disponibilidade` tinyint(1) DEFAULT NULL,
  `foto` varchar(60) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


-- --------------------------------------------------------

--
-- Estrutura para tabela `venda`
--

CREATE TABLE `venda` (
  `id_venda` int(11) NOT NULL,
  `id_cliente_id` int(11) DEFAULT NULL,
  `pagamento` varchar(40) DEFAULT NULL,
  `entrega` varchar(120) DEFAULT NULL,
  `data` date DEFAULT NULL,
  `status` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;



-- --------------------------------------------------------

--
-- Estrutura para tabela `venda_produto`
--

CREATE TABLE `venda_produto` (
  `id_venda_produto` int(11) NOT NULL,
  `id_produto_id` int(11) DEFAULT NULL,
  `id_venda_id` int(11) DEFAULT NULL,
  `valor_unit` decimal(10,2) DEFAULT NULL,
  `quantidade` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`id_categoria`);

--
-- Índices de tabela `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`id_cliente`);

--
-- Índices de tabela `produto`
--
ALTER TABLE `produto`
  ADD PRIMARY KEY (`id_produto`),
  ADD KEY `id_categoria_id` (`id_categoria_id`);

--
-- Índices de tabela `venda`
--
ALTER TABLE `venda`
  ADD PRIMARY KEY (`id_venda`),
  ADD KEY `id_cliente_id` (`id_cliente_id`);

--
-- Índices de tabela `venda_produto`
--
ALTER TABLE `venda_produto`
  ADD PRIMARY KEY (`id_venda_produto`),
  ADD KEY `id_produto_id` (`id_produto_id`),
  ADD KEY `id_venda_id` (`id_venda_id`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `categoria`
--
ALTER TABLE `categoria`
  MODIFY `id_categoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de tabela `cliente`
--
ALTER TABLE `cliente`
  MODIFY `id_cliente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de tabela `produto`
--
ALTER TABLE `produto`
  MODIFY `id_produto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de tabela `venda`
--
ALTER TABLE `venda`
  MODIFY `id_venda` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT de tabela `venda_produto`
--
ALTER TABLE `venda_produto`
  MODIFY `id_venda_produto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Restrições para tabelas despejadas
--

--
-- Restrições para tabelas `produto`
--
ALTER TABLE `produto`
  ADD CONSTRAINT `produto_ibfk_1` FOREIGN KEY (`id_categoria_id`) REFERENCES `categoria` (`id_categoria`);

--
-- Restrições para tabelas `venda`
--
ALTER TABLE `venda`
  ADD CONSTRAINT `venda_ibfk_1` FOREIGN KEY (`id_cliente_id`) REFERENCES `cliente` (`id_cliente`);

--
-- Restrições para tabelas `venda_produto`
--
ALTER TABLE `venda_produto`
  ADD CONSTRAINT `venda_produto_ibfk_1` FOREIGN KEY (`id_produto_id`) REFERENCES `produto` (`id_produto`),
  ADD CONSTRAINT `venda_produto_ibfk_2` FOREIGN KEY (`id_venda_id`) REFERENCES `venda` (`id_venda`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
