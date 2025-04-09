-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               8.0.30 - MySQL Community Server - GPL
-- Server OS:                    Win64
-- HeidiSQL Version:             12.1.0.6537
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Dumping database structure for ci4
CREATE DATABASE IF NOT EXISTS `ci4` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `ci4`;

-- Dumping structure for table ci4.kelas
CREATE TABLE IF NOT EXISTS `kelas` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nama_kelas` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `unit` int DEFAULT NULL,
  `wali_kelas` int DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  KEY `FK_kelas_users` (`wali_kelas`),
  KEY `FK_kelas_units` (`unit`),
  CONSTRAINT `FK_kelas_units` FOREIGN KEY (`unit`) REFERENCES `units` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_kelas_users` FOREIGN KEY (`wali_kelas`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Data exporting was unselected.

-- Dumping structure for table ci4.nilaideskripsimid
CREATE TABLE IF NOT EXISTS `nilaideskripsimid` (
  `id` int NOT NULL AUTO_INCREMENT,
  `siswa_id` int DEFAULT NULL,
  `deskripsi` text,
  PRIMARY KEY (`id`),
  KEY `FK_nilaimiddeskripsi_siswa` (`siswa_id`),
  CONSTRAINT `FK_nilaimiddeskripsi_siswa` FOREIGN KEY (`siswa_id`) REFERENCES `siswa` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=282 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Data exporting was unselected.

-- Dumping structure for table ci4.nilaifinal
CREATE TABLE IF NOT EXISTS `nilaifinal` (
  `id` int NOT NULL AUTO_INCREMENT,
  `siswa_id` int NOT NULL,
  `pelajaran_id` int DEFAULT NULL,
  `jenisnilai` enum('ex','hw','ft') NOT NULL,
  `nilai` decimal(5,2) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `siswa_id` (`siswa_id`),
  KEY `FK_nilaifinal_pelajaran` (`pelajaran_id`),
  CONSTRAINT `FK_nilaifinal_pelajaran` FOREIGN KEY (`pelajaran_id`) REFERENCES `pelajaran` (`id`),
  CONSTRAINT `nilaifinal_ibfk_1` FOREIGN KEY (`siswa_id`) REFERENCES `siswa` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=673 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Data exporting was unselected.

-- Dumping structure for table ci4.nilaimid
CREATE TABLE IF NOT EXISTS `nilaimid` (
  `id` int NOT NULL AUTO_INCREMENT,
  `kelas_id` int DEFAULT NULL,
  `siswa_id` int DEFAULT NULL,
  `pelajaran_id` int DEFAULT NULL,
  `nilai_pt` int DEFAULT NULL,
  `nilai_mt` int DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_rapormidsemester_kelas` (`kelas_id`),
  KEY `FK_rapormidsemester_pelajaran` (`pelajaran_id`),
  KEY `FK_rapormidsemester_siswa` (`siswa_id`),
  CONSTRAINT `FK_rapormidsemester_kelas` FOREIGN KEY (`kelas_id`) REFERENCES `kelas` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_rapormidsemester_pelajaran` FOREIGN KEY (`pelajaran_id`) REFERENCES `pelajaran` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_rapormidsemester_siswa` FOREIGN KEY (`siswa_id`) REFERENCES `siswa` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=1738 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Data exporting was unselected.

-- Dumping structure for table ci4.pelajaran
CREATE TABLE IF NOT EXISTS `pelajaran` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nama_pelajaran` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Data exporting was unselected.

-- Dumping structure for table ci4.pembelajaran
CREATE TABLE IF NOT EXISTS `pembelajaran` (
  `id` int NOT NULL AUTO_INCREMENT,
  `pelajaran_id` int DEFAULT NULL,
  `kelas_id` int DEFAULT NULL,
  `user_id` int DEFAULT NULL,
  `unit_id` int DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_pembelajaran_pelajaran` (`pelajaran_id`),
  KEY `FK_pembelajaran_kelas` (`kelas_id`),
  KEY `FK_pembelajaran_users` (`user_id`),
  KEY `FK_pembelajaran_units` (`unit_id`),
  CONSTRAINT `FK_pembelajaran_kelas` FOREIGN KEY (`kelas_id`) REFERENCES `kelas` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_pembelajaran_pelajaran` FOREIGN KEY (`pelajaran_id`) REFERENCES `pelajaran` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_pembelajaran_units` FOREIGN KEY (`unit_id`) REFERENCES `units` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_pembelajaran_users` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=115 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Data exporting was unselected.

-- Dumping structure for table ci4.siswa
CREATE TABLE IF NOT EXISTS `siswa` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nama` varchar(50) DEFAULT NULL,
  `nis` varchar(50) DEFAULT NULL,
  `nisn` varchar(50) DEFAULT NULL,
  `kelas_id` int DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_siswa_kelas` (`kelas_id`) USING BTREE,
  CONSTRAINT `FK_siswa_kelas` FOREIGN KEY (`kelas_id`) REFERENCES `kelas` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=274 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Data exporting was unselected.

-- Dumping structure for table ci4.units
CREATE TABLE IF NOT EXISTS `units` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nama_unit` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Data exporting was unselected.

-- Dumping structure for table ci4.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` int NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `nama` varchar(50) DEFAULT NULL,
  `role` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=55 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Data exporting was unselected.

-- Dumping structure for trigger ci4.prevent_multiple_ft
SET @OLDTMP_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';
DELIMITER //
CREATE TRIGGER `prevent_multiple_ft` BEFORE INSERT ON `nilaifinal` FOR EACH ROW BEGIN
    IF NEW.jenisnilai = 'ft' THEN
        IF EXISTS (
            SELECT 1 FROM nilaifinal 
            WHERE siswa_id = NEW.siswa_id AND jenisnilai = 'ft'
        ) THEN
            SIGNAL SQLSTATE '45000' 
            SET MESSAGE_TEXT = 'Setiap siswa hanya boleh memiliki satu nilaifinal ft.';
        END IF;
    END IF;
END//
DELIMITER ;
SET SQL_MODE=@OLDTMP_SQL_MODE;

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
