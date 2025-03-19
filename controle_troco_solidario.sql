-- --------------------------------------------------------
-- Servidor:                     192.168.0.210
-- Versão do servidor:           5.7.26 - MySQL Community Server (GPL)
-- OS do Servidor:               Linux
-- HeidiSQL Versão:              11.0.0.6037
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Copiando estrutura para tabela bigmais_admin.controle_troco_solidario
CREATE TABLE IF NOT EXISTS `controle_troco_solidario` (
  `cts_id` int(11) NOT NULL AUTO_INCREMENT,
  `seqpessoa` int(11) NOT NULL,
  `cts_instituicao` varchar(255) DEFAULT NULL,
  `cts_endereco` varchar(255) DEFAULT NULL,
  `cts_telefone` varchar(255) DEFAULT NULL,
  `cts_tempo` varchar(255) DEFAULT NULL,
  `cts_periodo` varchar(255) DEFAULT NULL,
  `cts_dtinicio` date DEFAULT NULL,
  `cts_dtfinal` date DEFAULT NULL,
  `cts_valor_arrecadado` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`cts_id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;

-- Copiando dados para a tabela bigmais_admin.controle_troco_solidario: ~19 rows (aproximadamente)
/*!40000 ALTER TABLE `controle_troco_solidario` DISABLE KEYS */;
INSERT INTO `controle_troco_solidario` (`cts_id`, `seqpessoa`, `cts_instituicao`, `cts_endereco`, `cts_telefone`, `cts_tempo`, `cts_periodo`, `cts_dtinicio`, `cts_dtfinal`, `cts_valor_arrecadado`) VALUES
	(1, 2476, 'Associação Santa Luzia de Governador Valadares', 'Rua Israel Pinheiro, 77 - São Pedro', '(33) 3225-1420', '03 MESES', '15/01/2019 A 14/04/2019', '2019-01-15', '2019-04-14', ' 14.446,46 '),
	(2, 2981, 'Casa de Recuperação Dona Zulmira ', 'Rua São Vicente, 130 - Santo Antônio ', '(33) 3221-1441', '03 MESES', '15/04/2019 A 14/07/2019', '2019-04-15', '2019-07-14', ' 19.613,46 '),
	(3, 2122, 'Lar dos Velhinhos ', 'Rua Osvaldo Cruz, 88 - Esplanada', '(33) 3271-3680', '45 DIAS', '15/07/2019 A 01/09/2019', '2019-07-15', '2019-09-01', ' 16.810,72 '),
	(4, 1, 'Cidade dos Meninos ', 'Br 116 - Km 402 - Zona Rural', '(33) 3221-1262', '02 MESES', '02/09/2019 A 31/10/2019', '2019-09-02', '2019-10-31', ' 21.815,68 '),
	(5, 2882, 'Casa das Meninas ', 'Rua Esmeralda, 2547 - São Raimundo ', '(33) 3271-0198', '02 MESES', '01/11/2019 A 31/12/2019', '2019-11-01', '2019-12-31', ' 23.456,00 '),
	(6, 2114, 'Instituto Nosso Lar (Turmalina - crianças)', 'Rua Mogno, 10 - Turmalina', '(33) 3221-2549', '02 MESES', '02/01/2020 A 01/03/2020', '2020-01-02', '2020-03-01', ' 17.456,18 '),
	(7, 6204, 'Abrigo Esperança', 'Rua Nizio Peçanha Barcelos, 1384 - Vila Isa', '(33) 3272-2593', '02 MESES', '02/03/2020 A 03/05/2020', '2020-03-02', '2020-05-03', ' 18.873,34 '),
	(8, 3104, 'ADQF - Assoc de Acolh. Dep.Quím. ', 'R. Geraldo Vieira - Santo Antônio', '(33) 3278-7011', '01 MÊS', '04/05/2020 A 02/06/2020', '2020-05-04', '2020-06-02', ' 12.063,44 '),
	(9, 6819, 'Casa de Acolhida Filhos prediletos', 'R. Cláudio Manoel, 15 - Esplanada', '(33) 3225-0413', '01 MÊS', '03/06/2020 A 05/07/2020', '2020-06-03', '2020-07-05', ' 13.269,77 '),
	(10, 2783, 'Acolhevida - Casa de apoio pac ren onc', 'Av. Brasil, 3477 - Centro', '(33) 3273-4855', '01 MÊS', '06/07/2020 A 05/08/2020', '2020-07-06', '2020-08-05', ' 14.844,97 '),
	(11, 8923, 'Missão Vida - Associação Missionária Evangélica Vida ', 'Avenida Moacir Paleta, 5094 - Capim', '(33) 4141-2501 ', '01 MÊS', '06/08/2020 A 07/09/2020', '2020-08-06', '2020-09-07', ' 23.722,93 '),
	(12, 9450, 'Dejord - Desafio Jovem do Rio Doce', 'BR 381- Km152 Anel Rodoviário- Saída para Ipatinga', '(33) 3089-1900', '15 DIAS', '08/09/2020 A 22/09/2020', '2020-09-08', '2020-09-22', ' 16.929,47 '),
	(13, 3028, 'Obra Social Itaka Escolápios ', 'Rua Carlos Chagas, 66 - Santa Helena', '(33) 3203-8248', '15 DIAS', '23/09/2020 A 07/10/2020', '2020-09-23', '2020-10-07', ' 15.072,92 '),
	(14, 10048, 'Programa futuro Feliz', 'Rua U, 232, conjunto Sir', '(33) 3278-7311', '36 DIAS', '08/10/2020 A 12/11/2020', '2020-10-08', '2020-11-12', ' 24.213,12 '),
	(15, 10542, 'Avadde - Associação Valadarense de Assist e Def dos Dir Excepcional', 'Av. Minas Gerais 2100 - A - Nossa Senhora das Graças', '(33) 3271-6767', '18 DIAS', '13/11/2020 A 30/11/2020', '2020-11-13', '2020-11-30', ' 15.163,08 '),
	(16, 10707, 'Assoc de Apoio ao Idoso Raimundo Benevides de Frei Inocêncio', 'Rua Firmo Pereira, 75, Centro - Frei Inocêncio', '(33) 3284-1329', '01 MÊS', '01/12/2020 A 03/01/2021', '2020-12-01', '2021-01-03', ' 28.556,81 '),
	(17, 6204, 'Abrigo Esperança', 'Rua Nizio Peçanha Barcelos, 1384 - Vila Isa', '(33) 3272-2593', '01 MÊS', '04/01/2021 a 31/01/2021', '2021-01-04', '2021-01-31', ' 16.923,54 '),
	(18, 2110, 'Instituto Nosso Lar (Alpercata - idosos)', 'Rodovia BR 116, Km 433, S/Nº bairro Vila Eugênio Franklin, Alpercata-MG', '(33) 3212-3436', '01 MÊS', '01/02/2021 a 28/02/2021', '2021-02-01', '2021-02-28', ' 16.833,33 '),
	(19, 2981, 'Casa de Recuperação Dona Zulmira ', 'Rua São Vicente, 130 - Santo Antônio ', '(33) 3221-1441', '01 MÊS', '01/03/2021 a 31/03/2021', '2021-03-01', '2021-03-31', NULL),
	(20, 6993, 'CRUZ VERMELHA BRASILEIRA', 'ALAMEDA EZEQUIEL DIAS, 427, BELO HORIZONTE, MG, CEP 30130110', '(31) 3226-4233', '01 MÊS', '01/04/2021 a 02/', '2021-04-01', '2021-05-02', NULL);
/*!40000 ALTER TABLE `controle_troco_solidario` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
