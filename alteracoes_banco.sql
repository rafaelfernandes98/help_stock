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

ALTER TABLE `categoria`
  ADD PRIMARY KEY (`id`);

  ALTER TABLE `categoria`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;