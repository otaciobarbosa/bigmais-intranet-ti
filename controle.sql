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

-- Copiando estrutura para tabela bigmais_admin.controle
CREATE TABLE IF NOT EXISTS `controle` (
  `controle_id` int(11) NOT NULL AUTO_INCREMENT,
  `controle_loja` varchar(254) NOT NULL,
  `controle_descricao` text NOT NULL,
  `controle_log` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`controle_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

-- Copiando dados para a tabela bigmais_admin.controle: ~6 rows (aproximadamente)
/*!40000 ALTER TABLE `controle` DISABLE KEYS */;
INSERT INTO `controle` (`controle_id`, `controle_loja`, `controle_descricao`, `controle_log`) VALUES
	(1, '210', 'Sist. Arq.      Tam. Usado Disp. Uso% Montado em\nudev             10M     0   10M   0% /dev\ntmpfs           3,2G  162M  3,0G   6% /run\n/dev/sda5        64G   58G  3,5G  95% /\ntmpfs           7,9G  4,0K  7,9G   1% /dev/shm\ntmpfs           5,0M     0  5,0M   0% /run/lock\ntmpfs           7,9G     0  7,9G   0% /sys/fs/cgroup\n/dev/sdb1       157G   23G  126G  16% /var/lib/postgresql\n/dev/sda1       180M   58M  109M  35% /boot\ntmpfs           1,6G     0  1,6G   0% /run/user/0', '2021-03-24 20:02:14'),
	(2, '1', 'Sist. Arq.      Tam. Usado Disp. Uso% Montado em\n/dev/sda1       213G  200G  2,2G  99% /\nnone            4,0K     0  4,0K   0% /sys/fs/cgroup\nudev            3,9G  4,0K  3,9G   1% /dev\ntmpfs           798M  1,1M  797M   1% /run\nnone            5,0M     0  5,0M   0% /run/lock\nnone            3,9G     0  3,9G   0% /run/shm\nnone            100M   16K  100M   1% /run/user\n/dev/sdb1       459G  161G  276G  37% /media/pendrive', '2021-03-24 20:02:14'),
	(3, '2', 'Sist. Arq.      Tam. Usado Disp. Uso% Montado em\nudev            3,9G  4,0K  3,9G   1% /dev\ntmpfs           799M  1,1M  798M   1% /run\n/dev/sdb1       213G  188G   15G  93% /\nnone            4,0K     0  4,0K   0% /sys/fs/cgroup\nnone            5,0M     0  5,0M   0% /run/lock\nnone            3,9G     0  3,9G   0% /run/shm\nnone            100M  4,0K  100M   1% /run/user\n/dev/sda1       917G  180G  691G  21% /var/lib/mysql', '2021-03-24 20:02:14'),
	(4, '4', 'Sist. Arq.      Tam. Usado Disp. Uso% Montado emudev            3,9G  4,0K  3,9G   1% /devtmpfs           798M  2,0M  796M   1% /run/dev/sda1       213G  196G  6,1G  98% /none            4,0K     0  4,0K   0% /sys/fs/cgroupnone            5,0M     0  5,0M   0% /run/locknone            3,9G     0  3,9G   0% /run/shmnone            100M  4,0K  100M   1% /run/user', '2021-03-24 20:02:14'),
	(5, '5', 'Sist. Arq.      Tam. Usado Disp. Uso% Montado em\n/dev/sda1       213G   89G  114G  44% /\nnone            4,0K     0  4,0K   0% /sys/fs/cgroup\nudev            3,9G  4,0K  3,9G   1% /dev\ntmpfs           798M  1,3M  797M   1% /run\nnone            5,0M     0  5,0M   0% /run/lock\nnone            3,9G     0  3,9G   0% /run/shm\nnone            100M   16K  100M   1% /run/user\n/dev/sdb1       459G   73G  363G  17% /media/pendrive', '2021-03-24 20:02:14'),
	(6, '9', 'Sist. Arq.      Tam. Usado Disp. Uso% Montado em\nudev            1,9G     0  1,9G   0% /dev\ntmpfs           386M  1,3M  385M   1% /run\n/dev/sda1       110G   76G   29G  73% /\ntmpfs           1,9G     0  1,9G   0% /dev/shm\ntmpfs           5,0M  8,0K  5,0M   1% /run/lock\ntmpfs           1,9G     0  1,9G   0% /sys/fs/cgroup\ntmpfs           386M  4,0K  386M   1% /run/user/0', '2021-03-24 20:02:14');
/*!40000 ALTER TABLE `controle` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
