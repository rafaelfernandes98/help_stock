-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 21-Maio-2022 às 00:02
-- Versão do servidor: 10.4.24-MariaDB
-- versão do PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";



CREATE TABLE `categoria` (
  `id` int(11) NOT NULL,
  `nome` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;




INSERT INTO `categoria` (`id`, `nome`) VALUES
(1, 'comida'),
(2, 'higiene'),
(3, 'limpeza'),
(4, 'açougue'),
(5, 'horti fruti');


CREATE TABLE `empresa` (
  `id` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `senha` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


INSERT INTO `empresa` (`id`, `nome`, `email`, `senha`) VALUES
(1, 'rafael', 'rafael@teste.com', '202cb962ac59075b964b07152d234b70'),
(2, 'teste', 'teste@a.com', '202cb962ac59075b964b07152d234b70'),
(3, 'a', 'a@a.com', '202cb962ac59075b964b07152d234b70'),
(4, 'b', 'b@b.com', '202cb962ac59075b964b07152d234b70');


CREATE TABLE `produtos` (
  `id` int(11) NOT NULL,
  `nome` varchar(120) NOT NULL,
  `id_categoria` int(11) NOT NULL,
  `qtd_estoque` int(11) NOT NULL,
  `valor_produto` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

ALTER TABLE `categoria`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `empresa`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `produtos`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `categoria`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

ALTER TABLE `empresa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

ALTER TABLE `produtos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

