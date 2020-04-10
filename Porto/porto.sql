-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 01-Jul-2019 às 23:05
-- Versão do servidor: 10.3.15-MariaDB
-- versão do PHP: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `porto`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `caminhao`
--

CREATE TABLE `caminhao` (
  `idCaminhao` varchar(7) NOT NULL,
  `transportadora` varchar(20) NOT NULL,
  `motorista` varchar(20) NOT NULL,
  `dtChegada` datetime DEFAULT NULL,
  `idTransportador` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `caminhao`
--

INSERT INTO `caminhao` (`idCaminhao`, `transportadora`, `motorista`, `dtChegada`, `idTransportador`) VALUES
('CCC1111', 'Acme', 'Motorista1', NULL, 1),
('CCC2222', 'Acme', 'Motorista2', NULL, 3);

-- --------------------------------------------------------

--
-- Estrutura da tabela `carregamentocaminhao`
--

CREATE TABLE `carregamentocaminhao` (
  `idCarregamentoCaminhao` int(11) NOT NULL,
  `dtCarregamentoCaminhao` date NOT NULL,
  `idCaminhao` varchar(7) NOT NULL,
  `idContainer` varchar(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `carregamentocaminhao`
--

INSERT INTO `carregamentocaminhao` (`idCarregamentoCaminhao`, `dtCarregamentoCaminhao`, `idCaminhao`, `idContainer`) VALUES
(1, '2019-07-01', 'CCC1111', '001'),
(2, '2019-07-01', 'CCC2222', '003'),
(3, '2019-07-01', 'CCC0000', '006');

-- --------------------------------------------------------

--
-- Estrutura da tabela `carregamentonavio`
--

CREATE TABLE `carregamentonavio` (
  `idCarregamentoNavio` int(11) NOT NULL,
  `dtCarregamentoNavio` date NOT NULL,
  `idNavio` varchar(7) NOT NULL,
  `idContainer` varchar(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `carregamentonavio`
--

INSERT INTO `carregamentonavio` (`idCarregamentoNavio`, `dtCarregamentoNavio`, `idNavio`, `idContainer`) VALUES
(1, '2019-07-01', 'NNN1111', '002'),
(2, '2019-07-01', 'NNN0000', '004'),
(3, '2019-07-01', 'NNN1111', '005'),
(4, '2019-07-01', 'NNN1111', '007');

-- --------------------------------------------------------

--
-- Estrutura da tabela `container`
--

CREATE TABLE `container` (
  `idContainer` varchar(3) NOT NULL,
  `descricao` varchar(20) NOT NULL,
  `localizacao` varchar(3) NOT NULL,
  `origem` varchar(7) NOT NULL,
  `destino` varchar(7) NOT NULL,
  `dtEntrada` date NOT NULL,
  `dtSaida` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `container`
--

INSERT INTO `container` (`idContainer`, `descricao`, `localizacao`, `origem`, `destino`, `dtEntrada`, `dtSaida`) VALUES
('008', 'Alimentos', 'A8', 'CCC1111', 'CCC2222', '2019-07-01', NULL),
('009', 'Motos', 'A9', 'CCC1111', 'NNN1111', '2019-07-01', NULL),
('010', 'Celulares', 'A10', 'NNN1111', 'NNN2222', '2019-07-01', NULL),
('011', 'Games', 'A11', 'NNN1111', 'CCC1111', '2019-07-01', NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `navio`
--

CREATE TABLE `navio` (
  `idNavio` varchar(7) NOT NULL,
  `transportadora` varchar(20) NOT NULL,
  `comandante` varchar(20) NOT NULL,
  `dtChegada` datetime DEFAULT NULL,
  `idTransportador` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `navio`
--

INSERT INTO `navio` (`idNavio`, `transportadora`, `comandante`, `dtChegada`, `idTransportador`) VALUES
('NNN1111', 'Acme', 'Comandante1', NULL, 1),
('NNN2222', 'Acme', 'Comandante2', NULL, 3);

-- --------------------------------------------------------

--
-- Estrutura da tabela `transportador`
--

CREATE TABLE `transportador` (
  `idTransportador` int(11) NOT NULL,
  `nome` varchar(20) NOT NULL,
  `senha` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `transportador`
--

INSERT INTO `transportador` (`idTransportador`, `nome`, `senha`) VALUES
(1, 'Diego', '4fb845c67d91bcb3178498fc6fe1fedc'),
(2, 'Admin', 'e3afed0047b08059d0fada10f400c1e5'),
(3, 'Admin2', '21eed4f2e9ab214fdbf00a2a091d63c4');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `caminhao`
--
ALTER TABLE `caminhao`
  ADD PRIMARY KEY (`idCaminhao`),
  ADD KEY `idTransportador` (`idTransportador`);

--
-- Índices para tabela `carregamentocaminhao`
--
ALTER TABLE `carregamentocaminhao`
  ADD PRIMARY KEY (`idCarregamentoCaminhao`);

--
-- Índices para tabela `carregamentonavio`
--
ALTER TABLE `carregamentonavio`
  ADD PRIMARY KEY (`idCarregamentoNavio`);

--
-- Índices para tabela `container`
--
ALTER TABLE `container`
  ADD PRIMARY KEY (`idContainer`);

--
-- Índices para tabela `navio`
--
ALTER TABLE `navio`
  ADD PRIMARY KEY (`idNavio`),
  ADD KEY `idTransportador` (`idTransportador`);

--
-- Índices para tabela `transportador`
--
ALTER TABLE `transportador`
  ADD PRIMARY KEY (`idTransportador`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `carregamentocaminhao`
--
ALTER TABLE `carregamentocaminhao`
  MODIFY `idCarregamentoCaminhao` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `carregamentonavio`
--
ALTER TABLE `carregamentonavio`
  MODIFY `idCarregamentoNavio` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `transportador`
--
ALTER TABLE `transportador`
  MODIFY `idTransportador` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `caminhao`
--
ALTER TABLE `caminhao`
  ADD CONSTRAINT `caminhao_ibfk_1` FOREIGN KEY (`idTransportador`) REFERENCES `transportador` (`idTransportador`);

--
-- Limitadores para a tabela `navio`
--
ALTER TABLE `navio`
  ADD CONSTRAINT `navio_ibfk_1` FOREIGN KEY (`idTransportador`) REFERENCES `transportador` (`idTransportador`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
