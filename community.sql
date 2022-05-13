-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 13-Maio-2022 às 03:20
-- Versão do servidor: 10.4.24-MariaDB
-- versão do PHP: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `community`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `comentarios`
--

CREATE TABLE `comentarios` (
  `id` int(11) NOT NULL,
  `id_post` int(11) DEFAULT NULL,
  `id_usuario` int(11) DEFAULT NULL,
  `dt_criacao` datetime DEFAULT NULL,
  `corpo` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `tipo` varchar(20) NOT NULL,
  `dt_criacao` datetime DEFAULT NULL,
  `corpo` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `relacoes_usuarios`
--

CREATE TABLE `relacoes_usuarios` (
  `id` int(11) NOT NULL,
  `usuario_from` int(11) DEFAULT NULL,
  `usuario_to` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `senha` varchar(200) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `dt_nascimento` date DEFAULT NULL,
  `cidade` varchar(100) DEFAULT NULL,
  `avatar` varchar(100) DEFAULT 'default.png',
  `capa` varchar(100) DEFAULT 'cover.jpg',
  `token` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`id`, `email`, `senha`, `nome`, `dt_nascimento`, `cidade`, `avatar`, `capa`, `token`) VALUES
(2, 'isabelghc@yahoo.com.br', '$2y$10$3SWdCkZaRNpYWQecyrVUF.YagCHzIMit1fodb7.n68GMW9ZdXFwNK', 'Henrique Bastos da Silva', NULL, NULL, 'default.png', 'cover.jpg', '92457df23bf36cc041492afa2bb83ae8'),
(3, 'henriqueacker@gmail.com', '$2y$10$vBk2jdnPmJcUgqBaDphz9eqMOS1oFBCaFK7LvqQE0O9/RriZIj1qu', 'Henrique Bastos da Silva', NULL, NULL, 'default.png', 'cover.jpg', 'c16d691cceb792fac90ca695c4c6e6c5'),
(4, 'henriqueacker@gmail.com1', '$2y$10$5TdyndcMiNBT0ij.iCVLPuQpIZXqi6kaWKnbugxjBC5kELwhAmpfG', 'Henrique Bastos da Silva', NULL, NULL, 'default.png', 'cover.jpg', '58c7cb9b04558ca846533474511eaeef');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `comentarios`
--
ALTER TABLE `comentarios`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `relacoes_usuarios`
--
ALTER TABLE `relacoes_usuarios`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `comentarios`
--
ALTER TABLE `comentarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `relacoes_usuarios`
--
ALTER TABLE `relacoes_usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
