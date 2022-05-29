SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

CREATE TABLE `produto` (
  `produto_id` int(20) NOT NULL,
  `produto_nome` varchar(30) NOT NULL,
  `preco` float NOT NULL,
  `quantidade` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


INSERT INTO `produto` (`produto_id`, `produto_nome`, `preco`, `quantidade`) VALUES
(4, 'sabonete', 12, 3);


CREATE TABLE `cadastro` (
  `username` varchar(20) NOT NULL,
  `nome` varchar(30) NOT NULL,
  `sobrenome` varchar(30) NOT NULL,
  `celular` int(15) NOT NULL,
  `email` varchar(30) NOT NULL,
  `password_1` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


INSERT INTO `cadastro` (`username`, `nome`, `sobrenome`, `celular`, `email`, `password_1`) VALUES
('fkafka', 'Franz', 'Kafka', 8193338899, 'fkafka@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b');



ALTER TABLE `produto`
  ADD PRIMARY KEY (`produto_id`);



ALTER TABLE `cadastro`
  ADD PRIMARY KEY (`username`);



ALTER TABLE `produto`
  MODIFY `produto_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;