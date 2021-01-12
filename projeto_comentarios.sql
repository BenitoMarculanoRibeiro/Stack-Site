-- phpMyAdmin SQL Dump
-- version 4.6.6deb4
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Tempo de geração: 04/07/2020 às 14:57
-- Versão do servidor: 10.1.38-MariaDB-0+deb9u1
-- Versão do PHP: 7.0.33-0+deb9u3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `projeto_comentarios`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `comentarios`
--

CREATE TABLE `comentarios` (
  `id` int(11) NOT NULL,
  `comentarios` varchar(400) DEFAULT NULL,
  `dia` date DEFAULT NULL,
  `horario` varchar(5) DEFAULT NULL,
  `fk_id_usuario` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Fazendo dump de dados para tabela `comentarios`
--

INSERT INTO `comentarios` (`id`, `comentarios`, `dia`, `horario`, `fk_id_usuario`) VALUES
(28, 'Comente aqui\r\n', '2020-07-04', '09:21', 1),
(30, 'N&atilde;o gostei, pois quando erra-se um campo, tenho que preencher tudo novamente, isso custa tempo, e tempo e dinheiro.', '2020-07-04', '12:52', 7),
(31, 'Em resposta ao Almir (Billy Pelica), estamos orgulhosos em te-lo conosco. logo logo iremos resolver o seu problema e preencher o furmulario automaticamente pra voce :D', '2020-07-04', '13:21', 1);

-- --------------------------------------------------------

--
-- Estrutura para tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nome` varchar(40) DEFAULT NULL,
  `email` varchar(40) DEFAULT NULL,
  `senha` varchar(32) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Fazendo dump de dados para tabela `usuarios`
--

INSERT INTO `usuarios` (`id`, `nome`, `email`, `senha`) VALUES
(1, 'Luiz', 'luiz@gmail.com', '698dc19d489c4e4db73e28a713eab07b'),
(5, 'Testador', 'email@email.com', '0c83f57c786a0b4a39efab23731c7ebc'),
(6, '&lt;h1&gt;luiz&lt;/h1&gt;', 'a@a.com', '202cb962ac59075b964b07152d234b70'),
(7, 'testando', 'senhateste@gmail.com', '698dc19d489c4e4db73e28a713eab07b');

--
-- Índices de tabelas apagadas
--

--  
-- Índices de tabela `comentarios`
--
ALTER TABLE `comentarios`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_id_usuario` (`fk_id_usuario`);

--
-- Índices de tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas apagadas
--

--
-- AUTO_INCREMENT de tabela `comentarios`
--
ALTER TABLE `comentarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;
--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- Restrições para dumps de tabelas
--

--
-- Restrições para tabelas `comentarios`
--
ALTER TABLE `comentarios`
  ADD CONSTRAINT `comentarios_ibfk_1` FOREIGN KEY (`fk_id_usuario`) REFERENCES `usuarios` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
