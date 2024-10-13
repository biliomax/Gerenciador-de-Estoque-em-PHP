-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 24/04/2017 às 21:53
-- Versão do servidor: 5.7.14
-- Versão do PHP: 7.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `max`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `niveis_acessos`
--

CREATE TABLE `niveis_acessos` (
  `id` int(11) NOT NULL,
  `nome_nivel_acesso` varchar(50) NOT NULL,
  `ordem` int(11) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Fazendo dump de dados para tabela `niveis_acessos`
--

INSERT INTO `niveis_acessos` (`id`, `nome_nivel_acesso`, `ordem`, `created`, `modified`) VALUES
(1, 'Administrador', 1, '2017-04-21 00:00:00', NULL),
(2, 'Financeiro', 3, '2017-04-24 00:00:00', NULL),
(3, 'Gerente Financeiro', 2, '2017-04-24 00:00:00', NULL);

-- --------------------------------------------------------

--
-- Estrutura para tabela `niveis_acessos_paginas`
--

CREATE TABLE `niveis_acessos_paginas` (
  `id` int(11) NOT NULL,
  `niveis_acesso_id` int(11) NOT NULL,
  `pagina_id` int(11) NOT NULL,
  `permissao` int(11) NOT NULL,
  `menu` int(11) NOT NULL DEFAULT '2',
  `ordem` int(11) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Fazendo dump de dados para tabela `niveis_acessos_paginas`
--

INSERT INTO `niveis_acessos_paginas` (`id`, `niveis_acesso_id`, `pagina_id`, `permissao`, `menu`, `ordem`, `created`, `modified`) VALUES
(1, 2, 1, 1, 2, 1, '2017-04-24 00:00:00', NULL),
(2, 2, 2, 1, 2, 2, '2017-04-24 00:00:00', NULL),
(3, 2, 7, 1, 2, 3, '2017-04-24 00:00:00', NULL),
(4, 3, 7, 1, 2, 1, '2017-04-24 00:00:00', NULL);

-- --------------------------------------------------------

--
-- Estrutura para tabela `paginas`
--

CREATE TABLE `paginas` (
  `id` int(11) NOT NULL,
  `endereco` varchar(120) NOT NULL,
  `nome_pagina` varchar(120) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Fazendo dump de dados para tabela `paginas`
--

INSERT INTO `paginas` (`id`, `endereco`, `nome_pagina`, `created`, `modified`) VALUES
(1, 'listar/list_usuarios', 'Listar Usuários', '2017-04-24 00:00:00', NULL),
(2, 'cadastrar/cad_usuarios', 'Cadastrar Usuário', '2017-04-24 00:00:00', NULL),
(3, 'editar/edit_usuarios', 'Editar Usuário', '2017-04-24 00:00:00', NULL),
(4, 'processa/proc_cad_usuarios', 'Proc cad Usuário', '2017-04-24 00:00:00', NULL),
(5, 'processa/proc_edit_usuarios', 'Proc edit Usuário', '2017-04-24 00:00:00', NULL),
(6, 'processa/proc_apagar_usuarios', 'Proc apagar Usuário', '2017-04-24 00:00:00', NULL),
(7, 'home', 'Home', '2017-04-24 00:00:00', NULL);

-- --------------------------------------------------------

--
-- Estrutura para tabela `situacoes_usuarios`
--

CREATE TABLE `situacoes_usuarios` (
  `id` int(11) NOT NULL,
  `nome_situacao` varchar(50) NOT NULL,
  `cor_situacao` varchar(20) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Fazendo dump de dados para tabela `situacoes_usuarios`
--

INSERT INTO `situacoes_usuarios` (`id`, `nome_situacao`, `cor_situacao`, `created`, `modified`) VALUES
(1, 'Ativo', 'success', '2017-04-21 00:00:00', NULL);

-- --------------------------------------------------------

--
-- Estrutura para tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nome` varchar(220) NOT NULL,
  `email` varchar(220) NOT NULL,
  `usuario` varchar(220) NOT NULL,
  `senha` varchar(220) NOT NULL,
  `recuperar_senha` varchar(220) DEFAULT NULL,
  `chave_descadastro` varchar(220) DEFAULT NULL,
  `foto` varchar(50) DEFAULT NULL,
  `niveis_acesso_id` int(11) NOT NULL,
  `situacoes_usuario_id` int(11) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Fazendo dump de dados para tabela `usuarios`
--

INSERT INTO `usuarios` (`id`, `nome`, `email`, `usuario`, `senha`, `recuperar_senha`, `chave_descadastro`, `foto`, `niveis_acesso_id`, `situacoes_usuario_id`, `created`, `modified`) VALUES
(1, 'Max', 'max@gmail.com.br', 'max@gmail.com.br', '$2y$10$7G.7w45HqXzTv1RHNDl5ouj0HonudyBbvvEekU2Y4bEiDmGEoGroe', NULL, NULL, NULL, 1, 1, '2017-04-21 00:00:00', NULL),
(2, 'Kelly', 'kelly@gmail.com.br', 'kelly@gmail.com.br', '$2y$10$7G.7w45HqXzTv1RHNDl5ouj0HonudyBbvvEekU2Y4bEiDmGEoGroe', NULL, NULL, NULL, 2, 1, '2017-04-24 00:00:00', NULL);

--
-- Índices de tabelas apagadas
--

--
-- Índices de tabela `niveis_acessos`
--
ALTER TABLE `niveis_acessos`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `niveis_acessos_paginas`
--
ALTER TABLE `niveis_acessos_paginas`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `paginas`
--
ALTER TABLE `paginas`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `situacoes_usuarios`
--
ALTER TABLE `situacoes_usuarios`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas apagadas
--

--
-- AUTO_INCREMENT de tabela `niveis_acessos`
--
ALTER TABLE `niveis_acessos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de tabela `niveis_acessos_paginas`
--
ALTER TABLE `niveis_acessos_paginas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de tabela `paginas`
--
ALTER TABLE `paginas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT de tabela `situacoes_usuarios`
--
ALTER TABLE `situacoes_usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
