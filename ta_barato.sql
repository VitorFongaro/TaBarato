-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 04-Abr-2023 às 05:53
-- Versão do servidor: 10.4.27-MariaDB
-- versão do PHP: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `ta_barato`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `mercados`
--

CREATE TABLE `mercados` (
  `ID_Mercado` int(11) NOT NULL,
  `Nome` varchar(100) NOT NULL,
  `Endereco` varchar(200) NOT NULL,
  `CNPJ` varchar(20) NOT NULL,
  `Email` varchar(200) NOT NULL,
  `Senha` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `mercados`
--

INSERT INTO `mercados` (`ID_Mercado`, `Nome`, `Endereco`, `CNPJ`, `Email`, `Senha`) VALUES
(1, 'Supermercado Avenida', 'Rua Floriano Peixoto, 2040', '44.358.067/0027-07', 'avenida@gmail.com', '12345678'),
(2, 'Supermercado Amigão', 'Rua Floriano Peixoto, 77', '05.774.403/0012-64', 'supermercado.amigao@gmail.com', '12345678'),
(3, 'Supermercado Bom preço', 'Avenida da Saudade, 751', '07.638.713/0001-24', 'mercado_BomPreco@gmail.com', '12345678');

--
-- Acionadores `mercados`
--
DELIMITER $$
CREATE TRIGGER `inserir` AFTER INSERT ON `mercados` FOR EACH ROW BEGIN
    INSERT INTO produtos (ID_Produto, ID_Mercado, Nome) 
    VALUES (1, NEW.ID_Mercado, "Alface"),
           (2, New.ID_Mercado, "Abacaxi"),
           (3, New.ID_Mercado, "Feijão"),
           (4, New.ID_Mercado, "Morango"),
           (5, New.ID_Mercado, "Laranja"),
           (6, New.ID_Mercado, "Limão"),
           (7, New.ID_Mercado, "Banana"),
           (8, New.ID_Mercado, "Água"),
           (9, New.ID_Mercado, "Detergente"),
           (10, New.ID_Mercado, "Batata"),
           (11, New.ID_Mercado, "Cebola"),
           (12, New.ID_Mercado, "Tomate");
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `produtos`
--

CREATE TABLE `produtos` (
  `Codigo_Produto` int(11) NOT NULL,
  `Nome` varchar(100) NOT NULL,
  `ID_Produto` int(11) NOT NULL,
  `Quantidade` int(11) DEFAULT 0,
  `Preco` decimal(10,2) DEFAULT NULL,
  `Valor_Total` decimal(10,2) GENERATED ALWAYS AS (`Quantidade` * `Preco`) STORED,
  `ID_Mercado` int(11) NOT NULL,
  `Data` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `produtos`
--

INSERT INTO `produtos` (`Codigo_Produto`, `Nome`, `ID_Produto`, `Quantidade`, `Preco`, `ID_Mercado`, `Data`) VALUES
(1, 'Alface', 1, 20, '4.50', 1, '2023-03-18'),
(2, 'Alface', 1, 25, '3.99', 2, '2023-04-04'),
(3, 'Alface', 1, 15, '4.19', 3, '2023-03-21'),
(4, 'Abacaxi', 2, 30, '10.99', 1, '2023-04-03'),
(5, 'Abacaxi', 2, 20, '10.89', 2, '2023-03-27'),
(6, 'Abacaxi', 2, 20, '10.89', 3, '2023-03-27'),
(7, 'Feijão', 3, 40, '9.29', 1, '2023-03-27'),
(8, 'Feijão', 3, 35, '9.39', 2, '2023-03-27'),
(9, 'Feijão', 3, 38, '9.49', 3, '2023-03-27'),
(10, 'Morango', 4, 24, '7.99', 1, '2023-03-27'),
(11, 'Morango', 4, 25, '7.59', 2, '2023-03-27'),
(12, 'Morango', 4, 24, '7.99', 3, '2023-03-27'),
(13, 'Laranja', 5, 40, '2.79', 1, '2023-03-27'),
(14, 'Laranja', 5, 60, '2.69', 2, '2023-03-27'),
(15, 'Laranja', 5, 60, '2.89', 3, '2023-03-27'),
(16, 'Limão', 6, 30, '1.99', 1, '2023-03-27'),
(17, 'Limão', 6, 35, '1.79', 2, '2023-03-27'),
(18, 'Limão', 6, 28, '1.59', 3, '2023-03-27'),
(19, 'Banana', 7, 32, '2.59', 1, '2023-03-27'),
(20, 'Banana', 7, 37, '2.59', 2, '2023-03-27'),
(21, 'Banana', 7, 38, '2.59', 3, '2023-03-27'),
(22, 'Água', 8, 45, '1.59', 1, '2023-03-27'),
(23, 'Água', 8, 40, '1.39', 2, '2023-03-27'),
(24, 'Água', 8, 60, '1.49', 3, '2023-03-27'),
(25, 'Detergente', 9, 30, '3.49', 1, '2023-03-27'),
(26, 'Detergente', 9, 25, '3.39', 2, '2023-03-27'),
(27, 'Detergente', 9, 20, '3.59', 3, '2023-03-27'),
(28, 'Batata', 10, 20, '2.59', 1, '2023-03-27'),
(29, 'Batata', 10, 60, '2.49', 2, '2023-03-27'),
(30, 'Batata', 10, 10, '2.49', 3, '2023-03-27'),
(31, 'Cebola', 11, 20, '3.49', 1, '2023-03-27'),
(32, 'Cebola', 11, 40, '3.29', 2, '2023-03-27'),
(33, 'Cebola', 11, 25, '2.79', 3, '2023-03-27'),
(34, 'Tomate', 12, 30, '5.99', 1, '2023-03-27'),
(35, 'Tomate', 12, 42, '6.99', 2, '2023-03-27'),
(36, 'Tomate', 12, 37, '6.59', 3, '2023-03-27');

--
-- Acionadores `produtos`
--
DELIMITER $$
CREATE TRIGGER `atualizacao_data` BEFORE UPDATE ON `produtos` FOR EACH ROW BEGIN
   IF !(NEW.Preco <=> OLD.Preco) THEN
		SET NEW.Data = NOW();
   END IF;
END
$$
DELIMITER ;

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `mercados`
--
ALTER TABLE `mercados`
  ADD PRIMARY KEY (`ID_Mercado`),
  ADD UNIQUE KEY `CNPJ` (`CNPJ`),
  ADD UNIQUE KEY `Email` (`Email`);

--
-- Índices para tabela `produtos`
--
ALTER TABLE `produtos`
  ADD PRIMARY KEY (`Codigo_Produto`),
  ADD KEY `fk_mercados` (`ID_Mercado`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `mercados`
--
ALTER TABLE `mercados`
  MODIFY `ID_Mercado` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `produtos`
--
ALTER TABLE `produtos`
  MODIFY `Codigo_Produto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `produtos`
--
ALTER TABLE `produtos`
  ADD CONSTRAINT `fk_mercados` FOREIGN KEY (`ID_Mercado`) REFERENCES `mercados` (`ID_Mercado`) ON DELETE CASCADE,
  ADD CONSTRAINT `produtos_ibfk_1` FOREIGN KEY (`ID_Mercado`) REFERENCES `mercados` (`ID_Mercado`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
