-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Tempo de geração: 26-Out-2023 às 10:54
-- Versão do servidor: 10.5.22-MariaDB-cll-lve
-- versão do PHP: 8.1.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `labsoftp_testes`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `tblartigos`
--

CREATE TABLE `tblartigos` (
  `cod_artigo` int(11) NOT NULL,
  `artigo` varchar(255) DEFAULT NULL,
  `descricao` varchar(255) DEFAULT NULL,
  `unidade` varchar(255) DEFAULT NULL,
  `iva` varchar(255) DEFAULT NULL,
  `stock` varchar(255) DEFAULT NULL,
  `pvp1` varchar(255) DEFAULT NULL,
  `pvp2` varchar(255) DEFAULT NULL,
  `pcu` varchar(255) DEFAULT NULL,
  `pcm` varchar(255) DEFAULT NULL,
  `datae` varchar(255) DEFAULT NULL,
  `esimp` varchar(255) DEFAULT NULL,
  `cambioe` varchar(255) DEFAULT NULL,
  `cambiop` varchar(255) DEFAULT NULL,
  `po` varchar(255) DEFAULT NULL,
  `dlct` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Extraindo dados da tabela `tblartigos`
--

INSERT INTO `tblartigos` (`cod_artigo`, `artigo`, `descricao`, `unidade`, `iva`, `stock`, `pvp1`, `pvp2`, `pcu`, `pcm`, `datae`, `esimp`, `cambioe`, `cambiop`, `po`, `dlct`) VALUES
(1, 'A0102220100566', 'QM | SOLUCAO SULFUROSA (1x65L)', 'LT', '14', '0,00', '139.866,00', '153.852,00', '0,00', '', '', '', '', '', '0,00', '0,00'),
(2, 'A0102300100013', 'QM | ACIDO PERACETICO (KG)', 'KG', '14', '0,00', '4.641,00', '5.104,00', '999,93', '1.010,06', '19-10-2022', 'ESIMP 2022A/92', '436,968', '', '0,00', '0,00'),
(3, 'A0102300100024', 'QM | AGUA DESMINERALIZADA (KG)', 'KG', '14', '1.679.538,85', '41,00', '45,00', '8,00', '8,00', '', '', '', '', '0,00', '0,00'),
(4, 'A0102300100061', 'QM | CARBONATO POTASSIO (KG)', 'KG', '14', '1.550,00', '7.970,00', '8.767,00', '1.870,57', '1.870,57', '30-03-2023', 'ESIMP 2023/24', '532,211', '729,213', '0,00', '0,00'),
(5, 'A0102300100120', 'QM | GASOLEO (KG)', 'KG', '14', '0,00', '0,00', '0,00', '162,00', '162,00', '', '', '', '', '0,00', '0,00'),
(6, 'A0102300100121', 'QM | GASOLINA (KG)', 'KG', '14', '0,00', '0,00', '0,00', '0,00', '', '', '', '', '', '0,00', '0,00'),
(7, 'A0102300100275', 'QM | HIPOCLORITO SODIO 8% (KG)', 'KG', '14', '0,03', '1.101,00', '1.211,00', '336,76', '336,76', '', '', '', '', '0,00', '0,00'),
(8, 'A0102300100301', 'QM | VIEUX CHAINE (KG)', 'KG', '14', '0,00', '9.286,00', '10.214,00', '2.329,91', '2.329,91', '', '', '', '', '0,00', '0,00'),
(9, 'A0102300100303', 'QM | OLEO LINHAÇA CRU (KG)', 'KG', '14', '2.014,70', '6.058,00', '6.664,00', '1.520,00', '1.520,00', '', '', '', '', '0,00', '0,00'),
(10, 'A0102300100304', 'QM | SOLUÇÃO AQUOSA PVA (KG)', 'KG', '14', '1.100,00', '8.497,00', '9.347,00', '1.582,74', '1.582,74', '16-03-2023', 'ESIMP 2023/16', '545,518', '729,213', '0,00', '0,00');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tblclientes`
--

CREATE TABLE `tblclientes` (
  `cliente_id` int(11) NOT NULL,
  `cod_cliente` varchar(255) DEFAULT NULL,
  `nomecliente` varchar(255) DEFAULT NULL,
  `nif` varchar(255) DEFAULT NULL,
  `contacto` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `dataregisto` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `dataupdate` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `limitecredito` varchar(255) DEFAULT NULL,
  `limitecreditoidade` varchar(255) DEFAULT NULL,
  `totaldebito` varchar(255) DEFAULT NULL,
  `limiteidadesaldo` varchar(255) DEFAULT NULL,
  `limitevalorsaldo` varchar(255) DEFAULT NULL,
  `descontoc` int(30) NOT NULL,
  `estado` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Extraindo dados da tabela `tblclientes`
--

INSERT INTO `tblclientes` (`cliente_id`, `cod_cliente`, `nomecliente`, `nif`, `contacto`, `email`, `dataregisto`, `dataupdate`, `limitecredito`, `limitecreditoidade`, `totaldebito`, `limiteidadesaldo`, `limitevalorsaldo`, `descontoc`, `estado`) VALUES
(1, '0001', 'MITAM COMERCIO E SERVIÇOS, S.A', '5403104992', '924273110', 'CATCHALL@QUIMICOIL.COM', '2021-12-29 09:01:37', '2023-09-22 16:16:08', '23.649.000,00', 'True', '23.648.659,50', '1', 'True', 0, 0),
(2, '0002', 'LUBORGES, LIMITADA', '5171164657', '928005888', 'CATCHALL@QUIMICOIL.COM', '2021-12-29 09:01:37', '2023-09-28 12:17:07', '94.923.651,26', 'True', '86.313.141,01', '15', 'True', 25, 0),
(3, '0003', 'COMPANHIA U. DE CERVEJAS DE ANGOLA,CUCA S.A.', '5410777816', '940903370', 'CATCHALL@QUIMICOIL.COM', '2021-12-29 09:01:37', '2022-12-16 15:19:09', '0,00', 'True', '224.318,52', '0', 'False', 0, 0),
(4, '0004', 'AUTOEQUIP, LIMITADA', '5419011735', '', 'CAROLINA.MARTINS@AUTOEQUIP.AO', '2021-12-29 09:01:38', '2023-06-20 15:33:28', '15.000.000,00', 'True', '2.102.497,02', '0', 'True', 20, 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbldataupdate`
--

CREATE TABLE `tbldataupdate` (
  `cod_dataupdate` int(11) NOT NULL,
  `tipo` varchar(255) DEFAULT NULL,
  `data` datetime NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Extraindo dados da tabela `tbldataupdate`
--

INSERT INTO `tbldataupdate` (`cod_dataupdate`, `tipo`, `data`) VALUES
(1, 'ARTIGOS', '2023-10-24 15:46:54'),
(2, 'CLIENTES', '2023-10-25 17:08:06');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tblleaves`
--

CREATE TABLE `tblleaves` (
  `id` int(11) NOT NULL,
  `LeaveType` varchar(110) NOT NULL,
  `ToDate` varchar(120) NOT NULL,
  `FromDate` varchar(120) NOT NULL,
  `Description` mediumtext NOT NULL,
  `PostingDate` date NOT NULL,
  `AdminRemark` mediumtext DEFAULT NULL,
  `registra_remarks` mediumtext NOT NULL,
  `AdminRemarkDate` varchar(120) DEFAULT NULL,
  `Status` int(1) NOT NULL,
  `admin_status` int(11) NOT NULL DEFAULT 0,
  `IsRead` int(1) NOT NULL,
  `empid` int(11) DEFAULT NULL,
  `num_days` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Extraindo dados da tabela `tblleaves`
--

INSERT INTO `tblleaves` (`id`, `LeaveType`, `ToDate`, `FromDate`, `Description`, `PostingDate`, `AdminRemark`, `registra_remarks`, `AdminRemarkDate`, `Status`, `admin_status`, `IsRead`, `empid`, `num_days`) VALUES
(13, 'Casual Leave', '2021-05-02', '2021-05-12', 'I want to take a leave.', '2021-05-20', 'Ok', 'ok', '2021-05-24 20:26:19 ', 1, 1, 1, 7, 3),
(14, 'Medical Leave', '08-05-2021', '11-05-2021', 'Noted', '0000-00-00', 'Not this time', '', '2021-05-21 0:31:10 ', 0, 0, 1, 6, 4),
(16, 'Casual Leave', '02-05-2021', '05-05-2021', 'Nice Leave', '2021-05-20', 'Ok', 'Noted', '2021-05-24 20:42:18 ', 1, 1, 1, 7, 4),
(17, 'Casual Leave', '11-05-2021', '15-05-2021', 'Just', '2021-05-21', 'Leave Approved', 'Noted', '2021-05-24 19:56:45 ', 1, 1, 1, 7, 5),
(18, 'Pagamentos', '05-09-2023', '29-09-2023', 'PAGAMENTOS DA CARTA NR FIN/2023/10000 - VALOR DE 5000KZ', '2023-09-05', NULL, '', NULL, 0, 0, 1, 9, 25);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tblleavetype`
--

CREATE TABLE `tblleavetype` (
  `id` int(11) NOT NULL,
  `LeaveType` varchar(200) DEFAULT NULL,
  `Description` mediumtext DEFAULT NULL,
  `date_from` varchar(200) NOT NULL,
  `date_to` varchar(200) NOT NULL,
  `CreationDate` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Extraindo dados da tabela `tblleavetype`
--

INSERT INTO `tblleavetype` (`id`, `LeaveType`, `Description`, `date_from`, `date_to`, `CreationDate`) VALUES
(5, 'Casual Leave', 'Casual Leave', '2021-05-23', '2021-06-20', '2021-05-19 14:32:03'),
(6, 'Medical Leave', 'Medical Leave', '2021-05-05', '2021-05-28', '2021-05-19 15:29:05'),
(8, 'Other', 'Leave all staff', '31-05-2021', '04-06-2021', '2021-05-20 17:17:43'),
(9, 'Pagamentos', 'Pagamento da FIN/20230001 - VALOR DE 5000 AKZ PARA QUALQUER DESTINATÃRIO', '05-09-2023', '30-09-2023', '2023-09-05 19:08:19');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tblon`
--

CREATE TABLE `tblon` (
  `cod_on` int(11) NOT NULL,
  `cod_utilizador` int(10) NOT NULL,
  `cod_cliente` varchar(150) NOT NULL,
  `data` timestamp NOT NULL DEFAULT current_timestamp(),
  `estado` int(1) NOT NULL,
  `desconto` varchar(150) NOT NULL,
  `urla` varchar(255) DEFAULT NULL,
  `valoriva` varchar(150) NOT NULL,
  `valormercadoria` varchar(150) NOT NULL,
  `valordesconto` varchar(150) NOT NULL,
  `valortotal` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Extraindo dados da tabela `tblon`
--

INSERT INTO `tblon` (`cod_on`, `cod_utilizador`, `cod_cliente`, `data`, `estado`, `desconto`, `urla`, `valoriva`, `valormercadoria`, `valordesconto`, `valortotal`) VALUES
(4, 1, '0004', '2023-10-26 09:44:19', 0, '', NULL, '', '', '', '');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tblonlinhas`
--

CREATE TABLE `tblonlinhas` (
  `cod_onlinha` int(11) NOT NULL,
  `cod_on` int(10) NOT NULL,
  `referencia` varchar(250) NOT NULL,
  `nomeartigo` varchar(250) NOT NULL,
  `unidade` varchar(250) NOT NULL,
  `quantidade` int(10) NOT NULL,
  `precounitario` varchar(250) NOT NULL,
  `iva` int(10) NOT NULL,
  `descontol` int(10) NOT NULL,
  `precol` varchar(250) NOT NULL,
  `valoriva` varchar(250) NOT NULL,
  `totallinha` varchar(250) NOT NULL,
  `totaldescontos` varchar(250) NOT NULL,
  `totalmerc` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Extraindo dados da tabela `tblonlinhas`
--

INSERT INTO `tblonlinhas` (`cod_onlinha`, `cod_on`, `referencia`, `nomeartigo`, `unidade`, `quantidade`, `precounitario`, `iva`, `descontol`, `precol`, `valoriva`, `totallinha`, `totaldescontos`, `totalmerc`) VALUES
(7, 4, 'A0102300100024', 'QM | AGUA DESMINERALIZADA (KG)', 'KG', 100, '41,00', 14, 5, '3895', '545.3', '4440.3', '205', '4100'),
(8, 4, 'A0102300100301', 'QM | VIEUX CHAINE (KG)', 'KG', 100, '9.286,00', 14, 0, '928600', '130004', '1058604', '0', '928600');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tblutilizadores`
--

CREATE TABLE `tblutilizadores` (
  `cod_utilizador` int(11) NOT NULL,
  `FirstName` varchar(150) NOT NULL,
  `LastName` varchar(150) NOT NULL,
  `EmailId` varchar(200) NOT NULL,
  `Password` varchar(180) NOT NULL,
  `contacto` char(11) NOT NULL,
  `Status` int(1) NOT NULL,
  `codigoapi` int(5) NOT NULL,
  `codigoprimavera` int(5) NOT NULL,
  `RegDate` timestamp NOT NULL DEFAULT current_timestamp(),
  `role` varchar(30) NOT NULL,
  `location` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Extraindo dados da tabela `tblutilizadores`
--

INSERT INTO `tblutilizadores` (`cod_utilizador`, `FirstName`, `LastName`, `EmailId`, `Password`, `contacto`, `Status`, `codigoapi`, `codigoprimavera`, `RegDate`, `role`, `location`) VALUES
(1, 'testes', 'testes', 'testes@labsoft.pt', '6e7906b7fb3f8e1c6366c0910050e595', '000000000', 1, 1, 0, '2023-09-21 14:42:55', 'Admin', 'pedro.jpg');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `tblartigos`
--
ALTER TABLE `tblartigos`
  ADD PRIMARY KEY (`cod_artigo`);

--
-- Índices para tabela `tblclientes`
--
ALTER TABLE `tblclientes`
  ADD PRIMARY KEY (`cliente_id`);

--
-- Índices para tabela `tbldataupdate`
--
ALTER TABLE `tbldataupdate`
  ADD PRIMARY KEY (`cod_dataupdate`);

--
-- Índices para tabela `tblleaves`
--
ALTER TABLE `tblleaves`
  ADD PRIMARY KEY (`id`),
  ADD KEY `UserEmail` (`empid`);

--
-- Índices para tabela `tblleavetype`
--
ALTER TABLE `tblleavetype`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `tblon`
--
ALTER TABLE `tblon`
  ADD PRIMARY KEY (`cod_on`);

--
-- Índices para tabela `tblonlinhas`
--
ALTER TABLE `tblonlinhas`
  ADD PRIMARY KEY (`cod_onlinha`);

--
-- Índices para tabela `tblutilizadores`
--
ALTER TABLE `tblutilizadores`
  ADD PRIMARY KEY (`cod_utilizador`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `tblartigos`
--
ALTER TABLE `tblartigos`
  MODIFY `cod_artigo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1403;

--
-- AUTO_INCREMENT de tabela `tblclientes`
--
ALTER TABLE `tblclientes`
  MODIFY `cliente_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=774;

--
-- AUTO_INCREMENT de tabela `tbldataupdate`
--
ALTER TABLE `tbldataupdate`
  MODIFY `cod_dataupdate` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `tblleaves`
--
ALTER TABLE `tblleaves`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT de tabela `tblleavetype`
--
ALTER TABLE `tblleavetype`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de tabela `tblon`
--
ALTER TABLE `tblon`
  MODIFY `cod_on` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `tblonlinhas`
--
ALTER TABLE `tblonlinhas`
  MODIFY `cod_onlinha` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de tabela `tblutilizadores`
--
ALTER TABLE `tblutilizadores`
  MODIFY `cod_utilizador` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
