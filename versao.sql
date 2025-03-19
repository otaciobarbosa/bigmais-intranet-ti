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

-- Copiando estrutura para tabela bigmais_admin.versao
CREATE TABLE IF NOT EXISTS `versao` (
  `versao_id` int(11) NOT NULL AUTO_INCREMENT,
  `versao_descricao` varchar(254) NOT NULL,
  `versao_numero` varchar(254) NOT NULL,
  `versao_patch` varchar(254) NOT NULL,
  PRIMARY KEY (`versao_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- Copiando dados para a tabela bigmais_admin.versao: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `versao` DISABLE KEYS */;
INSERT INTO `versao` (`versao_id`, `versao_descricao`, `versao_numero`, `versao_patch`) VALUES
	(1, 'INTRANET', '1.0.0', '1');
/*!40000 ALTER TABLE `versao` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
