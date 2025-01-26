-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               10.4.21-MariaDB - mariadb.org binary distribution
-- Server OS:                    Win64
-- HeidiSQL Version:             12.8.0.6908
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Dumping database structure for relaxify
CREATE DATABASE IF NOT EXISTS `relaxify` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `relaxify`;

-- Data exporting was unselected.

-- Dumping structure for table relaxify.utente
CREATE TABLE IF NOT EXISTS `utente` (
  `utenteID` int(2) NOT NULL AUTO_INCREMENT,
  `nome` varchar(50) NOT NULL,
  `cognome` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(80) NOT NULL DEFAULT '\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0',
  `tipo` int(2) NOT NULL DEFAULT 0,
  PRIMARY KEY (`utenteID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Data exporting was unselected.

-- Dumping structure for table relaxify.categoria
CREATE TABLE IF NOT EXISTS `categoria` (
  `categoriaID` int NOT NULL AUTO_INCREMENT,
  `nome` varchar(50) NOT NULL,
  `descrizione` varchar(255) NOT NULL,
  PRIMARY KEY (`categoriaID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Data exporting was unselected.

CREATE TABLE IF NOT EXISTS `ordine` (
  `ordineID` int NOT NULL AUTO_INCREMENT,
  `utenteID` int(2) NOT NULL,
  `data` date NOT NULL,
  `stato` char(1) NOT NULL,
  `totale` decimal(6,2) NOT NULL,
  PRIMARY KEY (`ordineID`),
  FOREIGN KEY (`utenteID`) REFERENCES `utente` (`utenteID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


-- Data exporting was unselected.

-- Dumping structure for table relaxify.prodotto
CREATE TABLE IF NOT EXISTS `prodotto` (
  `prodottoID` int NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) NOT NULL,
  `descrizione` varchar(255) NOT NULL,
  `prezzo` float(10) NOT NULL,
  `immagine` varchar(100) NOT NULL DEFAULT '',
  `categoriaID` int(1) NOT NULL DEFAULT 0,
  PRIMARY KEY (`prodottoID`),
  FOREIGN KEY (`categoriaID`) REFERENCES `categoria` (`categoriaID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Data exporting was unselected.

-- Dumping structure for table relaxify.prodotto_carrello
CREATE TABLE IF NOT EXISTS `prodotto_carrello` (
  `carrelloID` int NOT NULL AUTO_INCREMENT,
  `prodottoID` int(2) NOT NULL,
  `utenteID` int(2) NOT NULL,
  `quantita` int(2) NOT NULL DEFAULT 1,
  PRIMARY KEY (`carrelloID`),
  FOREIGN KEY (`prodottoID`) REFERENCES `prodotto` (`prodottoID`),
  FOREIGN KEY (`utenteID`) REFERENCES `utente` (`utenteID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Data exporting was unselected.

-- Dumping structure for table relaxify.prodotto_ordine
CREATE TABLE IF NOT EXISTS `prodotto_ordine` (
  `prodottoOrdineID` int NOT NULL AUTO_INCREMENT,
  `ordineID` int(4) NOT NULL,
  `utenteID` int(2) NOT NULL,
  `prodottoID` int(2) NOT NULL,
  `quantita` int(2) NOT NULL,
  PRIMARY KEY (`prodottoOrdineID`),
  FOREIGN KEY (`ordineID`) REFERENCES `ordine` (`ordineID`),
  FOREIGN KEY (`prodottoID`) REFERENCES `prodotto` (`prodottoID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


-- Data exporting was unselected.

-- Dumping structure for table relaxify.prodotto_preferito
CREATE TABLE IF NOT EXISTS `prodotto_preferito` (
  `preferitoID` int NOT NULL AUTO_INCREMENT,
  `prodottoID` int(2) NOT NULL,
  `utenteID` int(2) NOT NULL,
  PRIMARY KEY (`preferitoID`),
  FOREIGN KEY (`prodottoID`) REFERENCES `prodotto` (`prodottoID`),
  FOREIGN KEY (`utenteID`) REFERENCES `utente` (`utenteID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;




-- Data exporting was unselected.

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
