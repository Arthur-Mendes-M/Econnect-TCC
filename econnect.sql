-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Tempo de geração: 21/11/2022 às 01:56
-- Versão do servidor: 10.4.21-MariaDB
-- Versão do PHP: 8.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `econnect`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `complaints`
--

CREATE TABLE `complaints` (
  `Id_complaint` int(11) NOT NULL,
  `User_id` int(11) DEFAULT NULL,
  `Address` varchar(255) DEFAULT NULL,
  `Location_number` varchar(15) DEFAULT NULL,
  `Reference` varchar(255) DEFAULT NULL,
  `Description` varchar(255) DEFAULT NULL,
  `Photo_path` varchar(255) DEFAULT NULL,
  `Stage` int(11) DEFAULT 0,
  `Supporters` varchar(255) DEFAULT '0/0',
  `Petition` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura para tabela `users`
--

CREATE TABLE `users` (
  `Id_user` int(11) NOT NULL,
  `Complaints_id` varchar(255) DEFAULT NULL,
  `Photo_path` varchar(100) DEFAULT NULL,
  `Name_user` varchar(255) NOT NULL,
  `Identity_document_user` varchar(20) NOT NULL,
  `Email_user` varchar(255) NOT NULL,
  `Password_user` varchar(32) NOT NULL,
  `Support` int(11) DEFAULT NULL,
  `Complaints_support` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `complaints`
--
ALTER TABLE `complaints`
  ADD PRIMARY KEY (`Id_complaint`);

--
-- Índices de tabela `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`Id_user`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `complaints`
--
ALTER TABLE `complaints`
  MODIFY `Id_complaint` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `users`
--
ALTER TABLE `users`
  MODIFY `Id_user` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
