CREATE DATABASE  IF NOT EXISTS `courierservice` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;
USE `courierservice`;
-- MySQL dump 10.13  Distrib 5.7.17, for Win64 (x86_64)
--
-- Host: localhost    Database: courierservice
-- ------------------------------------------------------
-- Server version	5.5.56-log

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `administrator`
--

DROP TABLE IF EXISTS `administrator`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `administrator` (
  `RealPersonId` bigint(20) unsigned NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Password` varchar(20) NOT NULL,
  PRIMARY KEY (`RealPersonId`),
  CONSTRAINT `FK_Administrator_RealPerson` FOREIGN KEY (`RealPersonId`) REFERENCES `realperson` (`NationalId`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `administrator`
--

LOCK TABLES `administrator` WRITE;
/*!40000 ALTER TABLE `administrator` DISABLE KEYS */;
/*!40000 ALTER TABLE `administrator` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ceo`
--

DROP TABLE IF EXISTS `ceo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ceo` (
  `RealPersonId` bigint(20) unsigned NOT NULL,
  `StartDate` date NOT NULL,
  `FinishDate` date DEFAULT NULL,
  `Email` varchar(50) NOT NULL,
  `Password` varchar(20) NOT NULL,
  PRIMARY KEY (`RealPersonId`,`StartDate`),
  CONSTRAINT `FK_CEO_RealPerson` FOREIGN KEY (`RealPersonId`) REFERENCES `realperson` (`NationalId`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ceo`
--

LOCK TABLES `ceo` WRITE;
/*!40000 ALTER TABLE `ceo` DISABLE KEYS */;
/*!40000 ALTER TABLE `ceo` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `city`
--

DROP TABLE IF EXISTS `city`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `city` (
  `Id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `Name` varchar(50) NOT NULL,
  `ParentId` bigint(20) unsigned DEFAULT NULL,
  PRIMARY KEY (`Id`),
  KEY `FK_City_City_idx` (`ParentId`),
  CONSTRAINT `FK_City_City` FOREIGN KEY (`ParentId`) REFERENCES `city` (`Id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `city`
--

LOCK TABLES `city` WRITE;
/*!40000 ALTER TABLE `city` DISABLE KEYS */;
/*!40000 ALTER TABLE `city` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `customer`
--

DROP TABLE IF EXISTS `customer`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `customer` (
  `Email` varchar(50) NOT NULL,
  `Password` varchar(20) NOT NULL,
  `LastDegreeCode` int(11) NOT NULL,
  `RealPersonId` bigint(20) unsigned DEFAULT NULL,
  `LegalPersonId` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`Email`),
  KEY `FK_Customer_RealPerson_idx` (`RealPersonId`),
  KEY `FK_Customer_LegalPerson_idx` (`LegalPersonId`),
  CONSTRAINT `FK_Customer_RealPerson` FOREIGN KEY (`RealPersonId`) REFERENCES `realperson` (`NationalId`) ON DELETE NO ACTION ON UPDATE CASCADE,
  CONSTRAINT `FK_Customer_LegalPerson` FOREIGN KEY (`LegalPersonId`) REFERENCES `legalperson` (`NationalId`) ON DELETE NO ACTION ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `customer`
--

LOCK TABLES `customer` WRITE;
/*!40000 ALTER TABLE `customer` DISABLE KEYS */;
/*!40000 ALTER TABLE `customer` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `employee`
--

DROP TABLE IF EXISTS `employee`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `employee` (
  `RealPersonId` bigint(20) unsigned NOT NULL,
  `Email` varchar(50) NOT NULL,
  `StatusCode` int(11) NOT NULL,
  `Password` varchar(20) NOT NULL,
  PRIMARY KEY (`RealPersonId`),
  CONSTRAINT `FK_Employee_RealPerson` FOREIGN KEY (`RealPersonId`) REFERENCES `realperson` (`NationalId`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `employee`
--

LOCK TABLES `employee` WRITE;
/*!40000 ALTER TABLE `employee` DISABLE KEYS */;
/*!40000 ALTER TABLE `employee` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `form`
--

DROP TABLE IF EXISTS `form`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `form` (
  `TrackNumber` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `ParcelPostId` bigint(20) unsigned NOT NULL,
  `CustomerId` varchar(50) NOT NULL,
  `RecipientId` varchar(50) NOT NULL,
  `PostOfficeId` bigint(20) unsigned NOT NULL,
  `EmployeeId` bigint(20) unsigned NOT NULL,
  `PostmanId` bigint(20) unsigned NOT NULL,
  `StatusCode` int(11) NOT NULL,
  `RegisterDate` datetime NOT NULL,
  `DeliveryDate` datetime DEFAULT NULL,
  PRIMARY KEY (`TrackNumber`),
  KEY `FK_Form_ParcelPost_idx` (`ParcelPostId`),
  KEY `FK_Form_Customer_idx` (`CustomerId`),
  KEY `FK_Form_Recipient_idx` (`RecipientId`),
  KEY `FK_Form_PostOffice_idx` (`PostOfficeId`),
  KEY `FK_Form_Employee_idx` (`EmployeeId`),
  KEY `FK_Form_Postman_idx` (`PostmanId`),
  CONSTRAINT `FK_Form_Customer` FOREIGN KEY (`CustomerId`) REFERENCES `customer` (`Email`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `FK_Form_Employee` FOREIGN KEY (`EmployeeId`) REFERENCES `employee` (`RealPersonId`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `FK_Form_ParcelPost` FOREIGN KEY (`ParcelPostId`) REFERENCES `parcelpost` (`Id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `FK_Form_Postman` FOREIGN KEY (`PostmanId`) REFERENCES `postman` (`RealPersonId`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `FK_Form_PostOffice` FOREIGN KEY (`PostOfficeId`) REFERENCES `postoffice` (`Id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `FK_Form_Recipient` FOREIGN KEY (`RecipientId`) REFERENCES `recipient` (`Email`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=100000 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `form`
--

LOCK TABLES `form` WRITE;
/*!40000 ALTER TABLE `form` DISABLE KEYS */;
/*!40000 ALTER TABLE `form` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `legalperson`
--

DROP TABLE IF EXISTS `legalperson`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `legalperson` (
  `NationalId` varchar(20) NOT NULL,
  `PostCode` bigint(20) unsigned NOT NULL,
  `CompanyName` varchar(50) NOT NULL,
  `OrganizationTypeCode` int(11) NOT NULL,
  `PhoneNumber` varchar(11) NOT NULL,
  `Address` text NOT NULL,
  PRIMARY KEY (`NationalId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `legalperson`
--

LOCK TABLES `legalperson` WRITE;
/*!40000 ALTER TABLE `legalperson` DISABLE KEYS */;
/*!40000 ALTER TABLE `legalperson` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `parcelpost`
--

DROP TABLE IF EXISTS `parcelpost`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `parcelpost` (
  `Id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `Title` varchar(50) NOT NULL,
  `TypeId` bigint(20) unsigned NOT NULL,
  `Weight` int(11) NOT NULL,
  `StatusCode` int(11) NOT NULL,
  `StatusDescription` text,
  `Description` text,
  `Cost` int(11) NOT NULL,
  `TimeLimit` int(11) DEFAULT NULL,
  PRIMARY KEY (`Id`),
  KEY `FK_ParcelPost_ParcelPostType_idx` (`TypeId`),
  CONSTRAINT `FK_ParcelPost_ParcelPostType` FOREIGN KEY (`TypeId`) REFERENCES `parcelposttype` (`Id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `parcelpost`
--

LOCK TABLES `parcelpost` WRITE;
/*!40000 ALTER TABLE `parcelpost` DISABLE KEYS */;
/*!40000 ALTER TABLE `parcelpost` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `parcelpostservice`
--

DROP TABLE IF EXISTS `parcelpostservice`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `parcelpostservice` (
  `ParcelPostId` bigint(20) unsigned NOT NULL,
  `PostServiceId` bigint(20) unsigned NOT NULL,
  PRIMARY KEY (`ParcelPostId`,`PostServiceId`),
  KEY `FK_ParcelPostService_PostService_idx` (`PostServiceId`),
  CONSTRAINT `FK_ParcelPostService_ParcelPost` FOREIGN KEY (`ParcelPostId`) REFERENCES `parcelpost` (`Id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `FK_ParcelPostService_PostService` FOREIGN KEY (`PostServiceId`) REFERENCES `postservice` (`Id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `parcelpostservice`
--

LOCK TABLES `parcelpostservice` WRITE;
/*!40000 ALTER TABLE `parcelpostservice` DISABLE KEYS */;
/*!40000 ALTER TABLE `parcelpostservice` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `parcelposttype`
--

DROP TABLE IF EXISTS `parcelposttype`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `parcelposttype` (
  `Id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `Title` varchar(50) NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `parcelposttype`
--

LOCK TABLES `parcelposttype` WRITE;
/*!40000 ALTER TABLE `parcelposttype` DISABLE KEYS */;
/*!40000 ALTER TABLE `parcelposttype` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `postman`
--

DROP TABLE IF EXISTS `postman`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `postman` (
  `RealPersonId` bigint(20) unsigned NOT NULL,
  `StartDate` date NOT NULL,
  `FinishDate` date DEFAULT NULL,
  `Email` varchar(50) NOT NULL,
  PRIMARY KEY (`RealPersonId`,`StartDate`),
  CONSTRAINT `FK_Postman_RealPerson` FOREIGN KEY (`RealPersonId`) REFERENCES `realperson` (`NationalId`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `postman`
--

LOCK TABLES `postman` WRITE;
/*!40000 ALTER TABLE `postman` DISABLE KEYS */;
/*!40000 ALTER TABLE `postman` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `postoffice`
--

DROP TABLE IF EXISTS `postoffice`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `postoffice` (
  `Id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `Name` varchar(50) NOT NULL,
  `TypeCode` int(11) NOT NULL,
  `StateId` bigint(20) unsigned NOT NULL,
  `CityId` bigint(20) unsigned NOT NULL,
  `SectionId` bigint(20) unsigned NOT NULL,
  `RuralId` bigint(20) unsigned NOT NULL,
  PRIMARY KEY (`Id`),
  KEY `FK_PostOfficeState_City_idx` (`StateId`),
  KEY `FK_PostOfficeCity_City_idx` (`CityId`),
  KEY `FK_PostOfficeSection_City_idx` (`SectionId`),
  KEY `FK_PostOfficeRural_City_idx` (`RuralId`),
  CONSTRAINT `FK_PostOfficeCity_City` FOREIGN KEY (`CityId`) REFERENCES `city` (`Id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `FK_PostOfficeSection_City` FOREIGN KEY (`SectionId`) REFERENCES `city` (`Id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `FK_PostOfficeRural_City` FOREIGN KEY (`RuralId`) REFERENCES `city` (`Id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `FK_PostOfficeState_City` FOREIGN KEY (`StateId`) REFERENCES `city` (`Id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `postoffice`
--

LOCK TABLES `postoffice` WRITE;
/*!40000 ALTER TABLE `postoffice` DISABLE KEYS */;
/*!40000 ALTER TABLE `postoffice` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `postservice`
--

DROP TABLE IF EXISTS `postservice`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `postservice` (
  `Id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `Name` varchar(50) NOT NULL,
  `Cost` int(11) NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `postservice`
--

LOCK TABLES `postservice` WRITE;
/*!40000 ALTER TABLE `postservice` DISABLE KEYS */;
/*!40000 ALTER TABLE `postservice` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `realperson`
--

DROP TABLE IF EXISTS `realperson`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `realperson` (
  `NationalId` bigint(20) unsigned NOT NULL,
  `FirstName` varchar(50) NOT NULL,
  `LastName` varchar(50) NOT NULL,
  `PostCode` bigint(20) unsigned NOT NULL,
  `CellNumber` varchar(11) NOT NULL,
  `PhoneNumber` varchar(11) DEFAULT NULL,
  `Address` text NOT NULL,
  PRIMARY KEY (`NationalId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `realperson`
--

LOCK TABLES `realperson` WRITE;
/*!40000 ALTER TABLE `realperson` DISABLE KEYS */;
/*!40000 ALTER TABLE `realperson` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `recipient`
--

DROP TABLE IF EXISTS `recipient`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `recipient` (
  `Email` varchar(50) NOT NULL,
  `RealPersonId` bigint(20) unsigned DEFAULT NULL,
  `LegalPersonId` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`Email`),
  KEY `FK_Recipient_RealPerson_idx` (`RealPersonId`),
  KEY `FK_Recipient_LegalPerson_idx` (`LegalPersonId`),
  CONSTRAINT `FK_Recipient_LegalPerson` FOREIGN KEY (`LegalPersonId`) REFERENCES `legalperson` (`NationalId`) ON DELETE NO ACTION ON UPDATE CASCADE,
  CONSTRAINT `FK_Recipient_RealPerson` FOREIGN KEY (`RealPersonId`) REFERENCES `realperson` (`NationalId`) ON DELETE NO ACTION ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `recipient`
--

LOCK TABLES `recipient` WRITE;
/*!40000 ALTER TABLE `recipient` DISABLE KEYS */;
/*!40000 ALTER TABLE `recipient` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `worksfor`
--

DROP TABLE IF EXISTS `worksfor`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `worksfor` (
  `EmployeeId` bigint(20) unsigned NOT NULL,
  `StartDate` date NOT NULL,
  `FinishDate` date DEFAULT NULL,
  `IsManager` bit(1) NOT NULL,
  `PostOfficeId` bigint(20) unsigned NOT NULL,
  PRIMARY KEY (`EmployeeId`,`StartDate`),
  KEY `FK_WorksFor_PostOffice_idx` (`PostOfficeId`),
  CONSTRAINT `FK_WorksFor_Employee` FOREIGN KEY (`EmployeeId`) REFERENCES `employee` (`RealPersonId`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `FK_WorksFor_PostOffice` FOREIGN KEY (`PostOfficeId`) REFERENCES `postoffice` (`Id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `worksfor`
--

LOCK TABLES `worksfor` WRITE;
/*!40000 ALTER TABLE `worksfor` DISABLE KEYS */;
/*!40000 ALTER TABLE `worksfor` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2017-06-14 15:49:13
