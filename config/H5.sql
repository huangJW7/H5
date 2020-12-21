-- MySQL dump 10.13  Distrib 8.0.19, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: h5
-- ------------------------------------------------------
-- Server version	8.0.19

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `adminuser`
--

DROP TABLE IF EXISTS `adminuser`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `adminuser` (
  `ID` bigint unsigned NOT NULL COMMENT '用户ID',
  `username` varchar(20) NOT NULL COMMENT '用户名',
  `password` char(64) NOT NULL COMMENT '密码',
  `version` bigint NOT NULL DEFAULT '1' COMMENT 'JWT版本',
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `adminuser`
--

LOCK TABLES `adminuser` WRITE;
/*!40000 ALTER TABLE `adminuser` DISABLE KEYS */;
/*!40000 ALTER TABLE `adminuser` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `config`
--

DROP TABLE IF EXISTS `config`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `config` (
  `default` tinyint DEFAULT NULL COMMENT '每天默认上墙人数',
  `tomorrow` tinyint DEFAULT NULL COMMENT '明日上墙人数',
  `isset` tinyint(1) NOT NULL DEFAULT '0' COMMENT '0为未设置默认明天上墙，1为设置了明天上墙，每天更新',
  UNIQUE KEY `uk_visit` ((1))
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci COMMENT='常用配置信息,使用mysql的定时任务event_scheduler';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `config`
--

LOCK TABLES `config` WRITE;
/*!40000 ALTER TABLE `config` DISABLE KEYS */;
INSERT INTO `config` VALUES (4,2,0);
/*!40000 ALTER TABLE `config` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `likes`
--

DROP TABLE IF EXISTS `likes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `likes` (
  `ID` varchar(40) NOT NULL COMMENT '点赞者的openid',
  `actorID` varchar(40) NOT NULL COMMENT '被点赞者的openID',
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci COMMENT='上墙点赞信息表';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `likes`
--

LOCK TABLES `likes` WRITE;
/*!40000 ALTER TABLE `likes` DISABLE KEYS */;
/*!40000 ALTER TABLE `likes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `match`
--

DROP TABLE IF EXISTS `match`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `match` (
  `ID` varchar(40) NOT NULL COMMENT '点赞者的ID',
  `actorID` varchar(40) NOT NULL COMMENT '被点赞者的openID',
  `type` smallint NOT NULL COMMENT '不同活动的场次类型',
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci COMMENT='活动匹配点赞信息表，每个用户在一场活动只能点赞一次';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `match`
--

LOCK TABLES `match` WRITE;
/*!40000 ALTER TABLE `match` DISABLE KEYS */;
/*!40000 ALTER TABLE `match` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `option`
--

DROP TABLE IF EXISTS `option`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `option` (
  `ID` smallint NOT NULL AUTO_INCREMENT COMMENT '投诉编号',
  `contact` text NOT NULL COMMENT '投诉者的联系方式',
  `content` text NOT NULL COMMENT '投诉内容',
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci COMMENT='用于接收意见';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `option`
--

LOCK TABLES `option` WRITE;
/*!40000 ALTER TABLE `option` DISABLE KEYS */;
/*!40000 ALTER TABLE `option` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `picture`
--

DROP TABLE IF EXISTS `picture`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `picture` (
  `ID` varchar(40) NOT NULL COMMENT '用户openID或unionID',
  `address` varchar(20) NOT NULL COMMENT '照片的地址',
  `type` varchar(10) NOT NULL COMMENT '上墙者照片，线下活动照片用type来区分'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci COMMENT='用于存储用户照片的地址 结构为 ID-照片地址-活动类型';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `picture`
--

LOCK TABLES `picture` WRITE;
/*!40000 ALTER TABLE `picture` DISABLE KEYS */;
/*!40000 ALTER TABLE `picture` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `shower_msg`
--

DROP TABLE IF EXISTS `shower_msg`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `shower_msg` (
  `ID` varchar(40) NOT NULL COMMENT '使用微信openID,一般28位。获取失败使用unionID，一般29位',
  `name` varchar(10) NOT NULL COMMENT '昵称',
  `age` tinyint NOT NULL COMMENT '年龄',
  `location` varchar(15) NOT NULL COMMENT '所在地',
  `email` varchar(30) DEFAULT NULL COMMENT '联系邮箱',
  `school` varchar(15) DEFAULT NULL COMMENT '院校',
  `height` varchar(3) NOT NULL COMMENT '身高',
  `star` varchar(5) DEFAULT NULL COMMENT '星座',
  `gender` varchar(1) NOT NULL COMMENT '男或女',
  `introduction` text NOT NULL COMMENT '用户的简介',
  `connect` text NOT NULL COMMENT '付费获得的联系方式',
  `goal` text NOT NULL COMMENT '心中的他',
  `like` int NOT NULL COMMENT '点赞数',
  `pass` tinyint(1) NOT NULL DEFAULT '0' COMMENT 'true为通过审核，false为未通过',
  `type` tinyint(1) NOT NULL DEFAULT '0' COMMENT '0为普通上墙，1为匹配上墙',
  `history` smallint DEFAULT NULL COMMENT '历史上墙记录',
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci COMMENT='上墙用户信息表';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `shower_msg`
--

LOCK TABLES `shower_msg` WRITE;
/*!40000 ALTER TABLE `shower_msg` DISABLE KEYS */;
/*!40000 ALTER TABLE `shower_msg` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2020-12-21 15:54:09
