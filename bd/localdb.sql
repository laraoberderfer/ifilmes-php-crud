-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 30-Set-2020 às 21:50
-- Versão do servidor: 10.4.13-MariaDB
-- versão do PHP: 7.3.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `localdb`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `cliente`
--

CREATE TABLE `cliente` (
  `codigo` int(11) NOT NULL COMMENT 'dados do cliente',
  `nome` varchar(45) NOT NULL,
  `cpf` varchar(45) DEFAULT NULL,
  `telefone` varchar(45) DEFAULT NULL,
  `endereco` varchar(45) DEFAULT NULL COMMENT 'Cliente do sistema popcorntv',
  `email` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `cliente`
--

INSERT INTO `cliente` (`codigo`, `nome`, `cpf`, `telefone`, `endereco`, `email`) VALUES
(1, 'Fulano de Tal', '000.000.000-00', '0000-000000', 'Rua das Flores', 'fulano@ifsc.edu.br');

-- --------------------------------------------------------

--
-- Estrutura da tabela `filme`
--

CREATE TABLE `filme` (
  `codigo` int(11) NOT NULL,
  `titulo` varchar(255) NOT NULL,
  `sinopse` varchar(255) DEFAULT NULL,
  `quantidade` int(11) DEFAULT NULL,
  `trailer` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `filme`
--

INSERT INTO `filme` (`codigo`, `titulo`, `sinopse`, `quantidade`, `trailer`) VALUES
(1, 'Star Wars: Episódio IV - Uma Nova Esperança', ' é um filme épico/space opera norte-americano, o primeiro da saga homônima a ser lançado em 25 de maio de 1977, e o quarto na ordem cronológica da trama, escrito e dirigido por George Lucas.', 1, 'www'),
(2, 'Star Wars: Episódio V - O Império Contra-Ataca', ' é um filme épico/space opera norte-americano de 1980 dirigido por Irvin Kershner e escrito por Leigh Brackett e Lawrence Kasdan, com base na história de George Lucas, sendo o segundo filme da saga Star Wars a ser lançado, embora seja o quinto na ordem cr', 2, 'www'),
(3, 'Star Wars: Episódio VI - O Retorno de Jedi', 'é um filme épico/space opera norte-americano de 1983, dirigido por Richard Marquand e escrito por Lawrence Kasdan e George Lucas', 1, 'www'),
(4, 'Star Wars: Episódio I - A Ameaça Fantasma', 'é um filme épico de space opera estadunidense, pertencente a série de filmes Star Wars, lançado em 1999, dirigido e escrito por George Lucas. É o primeiro filme da trilogia prequela e o quarto da série rodado, embora o primeiro em ordem cronológica.', 2, 'www'),
(5, 'Star Wars: Episódio II – Ataque dos Clones', 'O filme ocorre 10 anos após os acontecimentos de Star Wars Episódio I: A Ameaça Fantasma. A galáxia está à beira de uma guerra civil. Liderado por um ex-Jedi chamado Conde Dooku, milhares de sistemas planetários ameaçam deixar a República Galáctica.', 2, 'www'),
(6, 'Star Wars: Episódio III - A Vingança dos Sith', 'O filme começa três anos após o início das Guerras Clônicas. Os Cavaleiros Jedi estão espalhados por toda a galáxia, liderando uma guerra maciça contra os Separatistas. O Conselho Jedi incumbe o Mestre Jedi Obi-Wan Kenobi de eliminar o notório General Gri', 2, 'www');

-- --------------------------------------------------------

--
-- Estrutura da tabela `funcionario`
--

CREATE TABLE `funcionario` (
  `codigo` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `estado` tinyint(1) DEFAULT NULL,
  `salario` float DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `senha` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `funcionario`
--

INSERT INTO `funcionario` (`codigo`, `nome`, `estado`, `salario`, `email`, `senha`) VALUES
(1, 'teste', 0, 900, 'admin@gmail.com', '123');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`codigo`);

--
-- Índices para tabela `filme`
--
ALTER TABLE `filme`
  ADD PRIMARY KEY (`codigo`);

--
-- Índices para tabela `funcionario`
--
ALTER TABLE `funcionario`
  ADD PRIMARY KEY (`codigo`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `cliente`
--
ALTER TABLE `cliente`
  MODIFY `codigo` int(11) NOT NULL AUTO_INCREMENT COMMENT 'dados do cliente', AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `filme`
--
ALTER TABLE `filme`
  MODIFY `codigo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de tabela `funcionario`
--
ALTER TABLE `funcionario`
  MODIFY `codigo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
