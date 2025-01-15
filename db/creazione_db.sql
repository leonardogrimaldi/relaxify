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

-- Dumping structure for table relaxify.admin
CREATE TABLE IF NOT EXISTS `admin` (
  `adminID` int(1) NOT NULL AUTO_INCREMENT,
  `email` varchar(100) NOT NULL,
  `password` binary(41) NOT NULL DEFAULT '0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0',
  PRIMARY KEY (`adminID`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

-- Data exporting was unselected.

-- Dumping structure for table relaxify.categoria
CREATE TABLE IF NOT EXISTS `categoria` (
  `categoriaID` int(1) NOT NULL AUTO_INCREMENT,
  `nome` varchar(50) NOT NULL,
  `descrizione` varchar(255) NOT NULL,
  PRIMARY KEY (`categoriaID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Data exporting was unselected.

-- Dumping structure for table relaxify.ordine
CREATE TABLE IF NOT EXISTS `ordine` (
  `utenteID` int(2) NOT NULL,
  `ordineID` int(4) NOT NULL,
  `data` date NOT NULL,
  `stato` char(1) NOT NULL,
  `totale` decimal(4,2) NOT NULL,
  PRIMARY KEY (`ordineID`,`utenteID`),
  KEY `FK_utente_ordine` (`utenteID`),
  CONSTRAINT `FK_utente_ordine` FOREIGN KEY (`utenteID`) REFERENCES `utente` (`utenteID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Data exporting was unselected.

-- Dumping structure for table relaxify.prodotto
CREATE TABLE IF NOT EXISTS `prodotto` (
  `prodottoID` int(2) NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) NOT NULL,
  `descrizione` varchar(255) NOT NULL,
  `prezzo` decimal(3,2) NOT NULL,
  `categoriaID` int(1) NOT NULL DEFAULT 0,
  `immagine` varchar(100) NOT NULL DEFAULT '',
  PRIMARY KEY (`prodottoID`),
  KEY `FK_categoria_prodotto` (`categoriaID`),
  CONSTRAINT `FK_categoria_prodotto` FOREIGN KEY (`categoriaID`) REFERENCES `categoria` (`categoriaID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Data exporting was unselected.

-- Dumping structure for table relaxify.prodotto_carrello
CREATE TABLE IF NOT EXISTS `prodotto_carrello` (
  `prodottoID` int(2) NOT NULL,
  `utenteID` int(2) NOT NULL,
  `quantita` int(2) NOT NULL,
  PRIMARY KEY (`prodottoID`,`utenteID`),
  KEY `FK_utente_prodotto_carrello` (`utenteID`),
  CONSTRAINT `FK_prodotto_prodotto_carrello` FOREIGN KEY (`prodottoID`) REFERENCES `prodotto` (`prodottoID`),
  CONSTRAINT `FK_utente_prodotto_carrello` FOREIGN KEY (`utenteID`) REFERENCES `utente` (`utenteID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Data exporting was unselected.

-- Dumping structure for table relaxify.prodotto_ordine
CREATE TABLE IF NOT EXISTS `prodotto_ordine` (
  `ordineID` int(4) NOT NULL,
  `utenteID` int(2) NOT NULL,
  `prodottoID` int(2) NOT NULL,
  `quantita` int(2) NOT NULL,
  PRIMARY KEY (`ordineID`,`utenteID`,`prodottoID`),
  KEY `FK_prodotto_prodotto_ordine` (`prodottoID`),
  CONSTRAINT `FK_ordine_prodotto_ordine` FOREIGN KEY (`ordineID`, `utenteID`) REFERENCES `ordine` (`ordineID`, `utenteID`),
  CONSTRAINT `FK_prodotto_prodotto_ordine` FOREIGN KEY (`prodottoID`) REFERENCES `prodotto` (`prodottoID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Data exporting was unselected.

-- Dumping structure for table relaxify.prodotto_preferito
CREATE TABLE IF NOT EXISTS `prodotto_preferito` (
  `prodottoID` int(2) NOT NULL,
  `utenteID` int(2) NOT NULL,
  PRIMARY KEY (`utenteID`,`prodottoID`),
  KEY `FK_prodotto_prodotto_preferito` (`prodottoID`),
  CONSTRAINT `FK_prodotto_prodotto_preferito` FOREIGN KEY (`prodottoID`) REFERENCES `prodotto` (`prodottoID`),
  CONSTRAINT `FK_utente_prodotto_preferito` FOREIGN KEY (`utenteID`) REFERENCES `utente` (`utenteID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Data exporting was unselected.

-- Dumping structure for table relaxify.utente
CREATE TABLE IF NOT EXISTS `utente` (
  `utenteID` int(2) NOT NULL AUTO_INCREMENT,
  `nome` varchar(50) NOT NULL,
  `cognome` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` binary(41) NOT NULL DEFAULT '\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0',
  `tipo` int(2) NOT NULL DEFAULT 0,
  PRIMARY KEY (`utenteID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Data exporting was unselected.

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
