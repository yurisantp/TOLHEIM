-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 09-Ago-2018 às 21:46
-- Versão do servidor: 5.7.14
-- PHP Version: 5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bdtrab`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `cliente`
--

CREATE TABLE `cliente` (
  `ID` int(10) UNSIGNED NOT NULL,
  `CPF` char(14) NOT NULL,
  `NOME` varchar(45) NOT NULL,
  `EMAIL` varchar(100) NOT NULL,
  `TELEFONE` char(15) NOT NULL,
  `CELULAR` char(15) NOT NULL,
  `UF` char(2) NOT NULL,
  `CIDADE` varchar(180) NOT NULL,
  `BAIRRO` varchar(45) NOT NULL,
  `RUA` varchar(45) NOT NULL,
  `CEP` char(10) NOT NULL,
  `NUMERO` int(10) NOT NULL,
  `COMPLEMENTO` varchar(45) DEFAULT NULL,
  `ENDERECO` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `cliente`
--

INSERT INTO `cliente` (`ID`, `CPF`, `NOME`, `EMAIL`, `TELEFONE`, `CELULAR`, `UF`, `CIDADE`, `BAIRRO`, `RUA`, `CEP`, `NUMERO`, `COMPLEMENTO`, `ENDERECO`) VALUES
(1, '231.231.231-23', 'Jonas', 'jonas@gmail.com', '(31)2313-1231', '(31)13123-2131', 'mg', 'Belo Horizonte', 'cidade nova', 'quadrado', '31313-131', 157, 'CASA', 'Rua quadrado,157 CASA- Bairrocidade nova/ CEP-31313-131-Belo Horizonte mg'),
(2, '756.756.756-75', 'Alberto', 'alberto@gmail.com', '(31)3534-5345', '(31)31313-1313', 'mg', 'dasdas', 'asdasdas', 'sdasd', '65475-675', 2312, '3123', 'Rua sdasd,2312 3123- Bairroasdasdas/ CEP-65475-675-dasdas mg');

-- --------------------------------------------------------

--
-- Estrutura da tabela `despesa`
--

CREATE TABLE `despesa` (
  `ID` int(10) UNSIGNED NOT NULL,
  `NOME` varchar(100) NOT NULL,
  `VALOR` double(9,2) NOT NULL,
  `DATA_VENCIMENTO` date NOT NULL,
  `EMPRESA_ID` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `despesa`
--

INSERT INTO `despesa` (`ID`, `NOME`, `VALOR`, `DATA_VENCIMENTO`, `EMPRESA_ID`) VALUES
(1, 'Equipamentos', 4000.00, '2017-01-25', 4),
(2, 'Bala', 500.00, '2017-10-26', 4),
(3, 'Equipamento', 2000.00, '2017-02-01', 4),
(4, 'Equipamento', 2000.00, '2017-02-01', 4),
(5, 'Equipamento', 2320.00, '2017-03-01', 4),
(6, 'Equipamento', 1610.00, '2017-04-01', 4),
(7, 'Equipamento', 1792.00, '2017-05-01', 4),
(8, 'Equipamento', 2210.00, '2017-06-01', 4),
(9, 'Equipamento', 3178.00, '2017-07-01', 4),
(10, 'Equipamento', 2500.00, '2017-08-01', 4),
(11, 'Equipamento', 1000.00, '2017-09-01', 4);

-- --------------------------------------------------------

--
-- Estrutura da tabela `empresa`
--

CREATE TABLE `empresa` (
  `ID` int(10) UNSIGNED NOT NULL,
  `NOME` varchar(45) NOT NULL,
  `RESPONSAVEL` varchar(45) NOT NULL,
  `ENDERECO` varchar(100) NOT NULL,
  `TELEFONE` char(14) NOT NULL,
  `CNPJ` char(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `empresa`
--

INSERT INTO `empresa` (`ID`, `NOME`, `RESPONSAVEL`, `ENDERECO`, `TELEFONE`, `CNPJ`) VALUES
(4, 'TryFall', 'Rafael Papastamotiou', 'R. Itajubá - Floresta, Belo Horizonte - MG', '(31)4002-8922', '57.412.263/0001-25');

-- --------------------------------------------------------

--
-- Estrutura da tabela `fornecedor`
--

CREATE TABLE `fornecedor` (
  `ID` int(10) UNSIGNED NOT NULL,
  `RESPONSAVEL` varchar(45) NOT NULL,
  `TELEFONE` char(14) NOT NULL,
  `ENDERECO` varchar(100) NOT NULL,
  `MATERIA_PRIMA` varchar(45) NOT NULL,
  `CNPJ` char(20) NOT NULL,
  `EMPRESA_ID` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `funcionario`
--

CREATE TABLE `funcionario` (
  `ID` int(10) UNSIGNED NOT NULL,
  `CELULAR` char(15) NOT NULL,
  `TELEFONE` char(14) NOT NULL,
  `DATA_ADMISSAO` date NOT NULL,
  `ENDERECO` varchar(10000) NOT NULL,
  `RUA` varchar(80) NOT NULL,
  `BAIRRO` varchar(80) NOT NULL,
  `CIDADE` varchar(80) NOT NULL,
  `ESTADO` char(2) NOT NULL,
  `NUMERO` varchar(80) NOT NULL,
  `COMPLEMENTO` varchar(80) NOT NULL,
  `cep` char(10) NOT NULL,
  `NOME` varchar(45) NOT NULL,
  `CPF` char(14) NOT NULL,
  `RG` char(13) NOT NULL,
  `SALARIO` double(9,2) NOT NULL,
  `EMPRESA_ID` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `funcionario`
--

INSERT INTO `funcionario` (`ID`, `CELULAR`, `TELEFONE`, `DATA_ADMISSAO`, `ENDERECO`, `RUA`, `BAIRRO`, `CIDADE`, `ESTADO`, `NUMERO`, `COMPLEMENTO`, `cep`, `NOME`, `CPF`, `RG`, `SALARIO`, `EMPRESA_ID`) VALUES
(1, '(31)99167-4015', '(31)4002-8922', '2017-10-26', 'Rua Delfinopolis,230 Normal- BairroRenascença/ CEP-31130-650-Belo Horizonte mg', 'Delfinopolis', 'Renascença', 'Belo Horizonte', 'mg', '230', 'Normal', '31130-650', 'Administrador', '563.474.233-23', '74.674.356-43', 10000.00, 4),
(2, '(31)23123-1233', '(23)1231-2312', '2017-10-25', 'Rua Ismail Vilela Lima,25 1ÂºANDAR- BairroBraunas/ CEP-23123-123-Belo Horizonte mg', 'Ismail Vilela Lima', 'Braunas', 'Belo Horizonte', 'mg', '25', '1ÂºANDAR', '23123-123', 'Funcionario', '213.123.123-12', '12.312.312-31', 2000.00, 4),
(3, '(31)99556-2700', '(31)3421-4890', '2017-10-25', 'Rua Vicente Castano,16 2ÂºANDAR- BairroCachoeirinha/ CEP-31150-320-Belo Horizonte mg', 'Vicente Castano', 'Cachoeirinha', 'Belo Horizonte', 'mg', '16', '2ÂºANDAR', '31150-320', 'Yuri Santana Pereira', '312.312.312-31', '23.123.123-12', 10000.00, 4),
(4, '(31)23131-2312', '(31)2312-3123', '1970-01-01', 'Rua Almirante Jonas,2333 CASA- BairroSanta Cruz/ CEP-31231-231-Belo Horizonte mg', 'Almirante Jonas', 'Santa Cruz', 'Belo Horizonte', 'mg', '2333', 'CASA', '31231-231', 'Gerente', '231.231.231-23', '23.123.123-12', 5000.00, 4);

-- --------------------------------------------------------

--
-- Estrutura da tabela `item_venda`
--

CREATE TABLE `item_venda` (
  `ID` int(10) UNSIGNED NOT NULL,
  `QUANTIDADE` int(11) NOT NULL,
  `NOME` varchar(200) NOT NULL,
  `DESCRICAO` varchar(80) NOT NULL,
  `VALOR_UNITARIO` double(9,2) NOT NULL,
  `TOTAL` double(9,2) NOT NULL,
  `PRODUTO_ID` int(10) UNSIGNED NOT NULL,
  `VENDA_ID` bigint(100) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `item_venda`
--

INSERT INTO `item_venda` (`ID`, `QUANTIDADE`, `NOME`, `DESCRICAO`, `VALOR_UNITARIO`, `TOTAL`, `PRODUTO_ID`, `VENDA_ID`) VALUES
(1, 10, 'Coca Cola 350ml', 'Coca Cola 350ml', 4.00, 40.00, 1, 1),
(2, 10, 'Coca Cola 350ml', 'Coca Cola 350ml', 4.00, 40.00, 1, 4),
(3, 5, 'Coca Cola 350ml', 'Coca Cola 350ml', 4.00, 20.00, 1, 5),
(4, 5, 'Coca Cola 350ml', 'Coca Cola 350ml', 4.00, 20.00, 1, 6),
(5, 10, 'George Foremann Grill', 'George Foremann Grill', 278.00, 2780.00, 2, 6),
(6, 30, 'Coca Cola 350ml', 'Coca Cola 350ml', 4.00, 120.00, 1, 7),
(7, 6, 'George Foremann Grill', 'George Foremann Grill', 278.00, 1668.00, 2, 7),
(8, 10, 'Coca Cola 350ml', 'Coca Cola 350ml', 4.00, 40.00, 1, 8),
(9, 50, 'George Foremann Grill', 'George Foremann Grill', 278.00, 13900.00, 2, 8),
(10, 10, 'Coca Cola 350ml', 'Coca Cola 350ml', 4.00, 40.00, 1, 9),
(11, 30, 'George Foremann Grill', 'George Foremann Grill', 278.00, 8340.00, 2, 9),
(12, 21, 'George Foremann Grill', 'George Foremann Grill', 278.00, 5838.00, 2, 10),
(13, 3, 'Coca Cola 350ml', 'Coca Cola 350ml', 4.00, 12.00, 1, 11),
(14, 5, 'George Foremann Grill', 'George Foremann Grill', 278.00, 1390.00, 2, 11),
(15, 1, 'Coca Cola 350ml', 'Coca Cola 350ml', 4.00, 4.00, 1, 12),
(16, 5, 'George Foremann Grill', 'George Foremann Grill', 278.00, 1390.00, 2, 12),
(17, 50, 'Coca Cola 350ml', 'Coca Cola 350ml', 4.00, 200.00, 1, 13),
(18, 60, 'George Foremann Grill', 'George Foremann Grill', 278.00, 16680.00, 2, 13),
(19, 20, 'Coca Cola 350ml', 'Coca Cola 350ml', 4.00, 80.00, 1, 14),
(20, 40, 'George Foremann Grill', 'George Foremann Grill', 278.00, 11120.00, 2, 14),
(21, 150, 'Coca Cola 350ml', 'Coca Cola 350ml', 4.00, 600.00, 1, 15),
(22, 20, 'George Foremann Grill', 'George Foremann Grill', 278.00, 5560.00, 2, 15);

-- --------------------------------------------------------

--
-- Estrutura da tabela `produto`
--

CREATE TABLE `produto` (
  `ID` int(10) UNSIGNED NOT NULL,
  `QUANTIDADE` bigint(11) NOT NULL,
  `NOME` varchar(45) NOT NULL,
  `DESCRICAO` varchar(80) NOT NULL,
  `VALOR` double(9,2) NOT NULL,
  `EMPRESA_ID` int(10) UNSIGNED NOT NULL,
  `img` varchar(10000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `produto`
--

INSERT INTO `produto` (`ID`, `QUANTIDADE`, `NOME`, `DESCRICAO`, `VALOR`, `EMPRESA_ID`, `img`) VALUES
(1, 96, 'Coca Cola 350ml', 'Coca Cola 350ml', 4.00, 4, NULL),
(2, 9753, 'George Foremann Grill', 'Otimo', 278.00, 4, NULL),
(3, 200, 'Bolsa', 'Louis', 150.00, 4, NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

CREATE TABLE `usuario` (
  `id` int(10) UNSIGNED NOT NULL,
  `login` varchar(80) NOT NULL,
  `senha` varchar(80) NOT NULL,
  `tipo` varchar(80) NOT NULL,
  `funcionario_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`id`, `login`, `senha`, `tipo`, `funcionario_id`) VALUES
(1, 'admin', 'admin', 'Administrador', 1),
(2, 'funcionario', 'funcionario', 'FuncionÃ¡rio', 2),
(3, 'yuri', 'yuri', 'Administrador', 3),
(4, 'gerente', 'gerente', 'Gerente', 4);

-- --------------------------------------------------------

--
-- Estrutura da tabela `venda`
--

CREATE TABLE `venda` (
  `ID` bigint(100) UNSIGNED NOT NULL,
  `VALOR` double(9,2) UNSIGNED DEFAULT NULL,
  `DESCRICAO` varchar(1000) DEFAULT NULL,
  `OBSERVACAO` varchar(1000) DEFAULT NULL,
  `DATA_VENDA` date NOT NULL,
  `HORA_VENDA` time NOT NULL,
  `CLIENTE_CPF` char(14) NOT NULL,
  `FUNCIONARIO_ID` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `venda`
--

INSERT INTO `venda` (`ID`, `VALOR`, `DESCRICAO`, `OBSERVACAO`, `DATA_VENDA`, `HORA_VENDA`, `CLIENTE_CPF`, `FUNCIONARIO_ID`) VALUES
(1, 40.00, '10 x Coca Cola 350ml - 40/', NULL, '2017-10-26', '09:26:26', '231.231.231-23', 1),
(4, 40.00, '10 x Coca Cola 350ml - 40/', NULL, '2017-10-26', '09:37:28', '231.231.231-23', 1),
(5, 20.00, '5 x Coca Cola 350ml - 20/', NULL, '2017-10-26', '09:38:24', '231.231.231-23', 1),
(6, 2800.00, '5 x Coca Cola 350ml - 20/10 x George Foremann Grill - 2780/', NULL, '2017-01-25', '09:44:14', '231.231.231-23', 1),
(7, 1788.00, '30 x Coca Cola 350ml - 120/6 x George Foremann Grill - 1668/', NULL, '2017-02-25', '09:45:35', '756.756.756-75', 1),
(8, 13940.00, '10 x Coca Cola 350ml - 40/50 x George Foremann Grill - 13900/', NULL, '2017-03-25', '09:46:05', '756.756.756-75', 1),
(9, 8380.00, '10 x Coca Cola 350ml - 40/30 x George Foremann Grill - 8340/', NULL, '2017-04-25', '09:46:22', '231.231.231-23', 1),
(10, 5838.00, '21 x George Foremann Grill - 5838/', NULL, '2017-05-25', '09:46:40', '231.231.231-23', 1),
(11, 1402.00, '3 x Coca Cola 350ml - 12/5 x George Foremann Grill - 1390/', NULL, '2017-06-25', '09:46:57', '231.231.231-23', 1),
(12, 1394.00, '1 x Coca Cola 350ml - 4/5 x George Foremann Grill - 1390/', NULL, '2017-06-25', '09:47:11', '756.756.756-75', 1),
(13, 16880.00, '50 x Coca Cola 350ml - 200/60 x George Foremann Grill - 16680/', NULL, '2017-07-25', '09:48:28', '756.756.756-75', 3),
(14, 11200.00, '20 x Coca Cola 350ml - 80/40 x George Foremann Grill - 11120/', NULL, '2017-08-25', '09:49:03', '231.231.231-23', 3),
(15, 6160.00, '150 x Coca Cola 350ml - 600/20 x George Foremann Grill - 5560/', NULL, '2017-09-25', '09:49:19', '231.231.231-23', 3);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `CPF` (`CPF`);

--
-- Indexes for table `despesa`
--
ALTER TABLE `despesa`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `EMPRESA_ID` (`EMPRESA_ID`);

--
-- Indexes for table `empresa`
--
ALTER TABLE `empresa`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `fornecedor`
--
ALTER TABLE `fornecedor`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `EMPRESA_ID` (`EMPRESA_ID`);

--
-- Indexes for table `funcionario`
--
ALTER TABLE `funcionario`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `EMPRESA_ID` (`EMPRESA_ID`);

--
-- Indexes for table `item_venda`
--
ALTER TABLE `item_venda`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `PRODUTO_ID` (`PRODUTO_ID`),
  ADD KEY `VENDA_ID` (`VENDA_ID`);

--
-- Indexes for table `produto`
--
ALTER TABLE `produto`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `EMPRESA_ID` (`EMPRESA_ID`);

--
-- Indexes for table `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id`),
  ADD KEY `funcionario_id` (`funcionario_id`);

--
-- Indexes for table `venda`
--
ALTER TABLE `venda`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `CLIENTE_CPF` (`CLIENTE_CPF`),
  ADD KEY `FUNCIONARIO_ID` (`FUNCIONARIO_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cliente`
--
ALTER TABLE `cliente`
  MODIFY `ID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `despesa`
--
ALTER TABLE `despesa`
  MODIFY `ID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `empresa`
--
ALTER TABLE `empresa`
  MODIFY `ID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `fornecedor`
--
ALTER TABLE `fornecedor`
  MODIFY `ID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `funcionario`
--
ALTER TABLE `funcionario`
  MODIFY `ID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `item_venda`
--
ALTER TABLE `item_venda`
  MODIFY `ID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT for table `produto`
--
ALTER TABLE `produto`
  MODIFY `ID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `venda`
--
ALTER TABLE `venda`
  MODIFY `ID` bigint(100) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `despesa`
--
ALTER TABLE `despesa`
  ADD CONSTRAINT `despesa_ibfk_1` FOREIGN KEY (`EMPRESA_ID`) REFERENCES `empresa` (`ID`);

--
-- Limitadores para a tabela `fornecedor`
--
ALTER TABLE `fornecedor`
  ADD CONSTRAINT `fornecedor_ibfk_1` FOREIGN KEY (`EMPRESA_ID`) REFERENCES `empresa` (`ID`);

--
-- Limitadores para a tabela `funcionario`
--
ALTER TABLE `funcionario`
  ADD CONSTRAINT `funcionario_ibfk_1` FOREIGN KEY (`EMPRESA_ID`) REFERENCES `empresa` (`ID`);

--
-- Limitadores para a tabela `item_venda`
--
ALTER TABLE `item_venda`
  ADD CONSTRAINT `item_venda_ibfk_1` FOREIGN KEY (`PRODUTO_ID`) REFERENCES `produto` (`ID`),
  ADD CONSTRAINT `item_venda_ibfk_2` FOREIGN KEY (`VENDA_ID`) REFERENCES `venda` (`ID`);

--
-- Limitadores para a tabela `produto`
--
ALTER TABLE `produto`
  ADD CONSTRAINT `produto_ibfk_1` FOREIGN KEY (`EMPRESA_ID`) REFERENCES `empresa` (`ID`);

--
-- Limitadores para a tabela `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `usuario_ibfk_1` FOREIGN KEY (`funcionario_id`) REFERENCES `funcionario` (`ID`);

--
-- Limitadores para a tabela `venda`
--
ALTER TABLE `venda`
  ADD CONSTRAINT `venda_ibfk_1` FOREIGN KEY (`CLIENTE_CPF`) REFERENCES `cliente` (`CPF`),
  ADD CONSTRAINT `venda_ibfk_2` FOREIGN KEY (`FUNCIONARIO_ID`) REFERENCES `funcionario` (`ID`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
