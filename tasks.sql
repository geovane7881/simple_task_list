-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               10.1.26-MariaDB-0+deb9u1 - Debian 9.1
-- Server OS:                    debian-linux-gnu
-- HeidiSQL Version:             9.4.0.5125
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Dumping structure for table tarefas.tasks
CREATE TABLE IF NOT EXISTS `tasks` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `desc` varchar(300) NOT NULL,
  `hour_add` datetime DEFAULT NULL,
  `hour_start` time DEFAULT NULL,
  `hour_finish` time DEFAULT NULL,
  `duration` int(2) DEFAULT NULL,
  `finish` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table tarefas.tasks: ~1 rows (approximately)
/*!40000 ALTER TABLE `tasks` DISABLE KEYS */;
INSERT INTO `tasks` (`id`, `desc`, `hour_add`, `hour_start`, `hour_finish`, `duration`, `finish`) VALUES
	(15, 'estudar programaÃ§Ã£o', '2017-12-24 21:03:15', '18:30:00', '22:00:00', NULL, 1),
	(16, 'lavar a louÃ§a', '2017-12-24 21:03:38', '17:00:00', '18:00:00', NULL, 0);
/*!40000 ALTER TABLE `tasks` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
