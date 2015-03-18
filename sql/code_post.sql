-- MySQL dump 10.13  Distrib 5.6.10, for Win64 (x86_64)
--
-- Host: localhost    Database: rndata
-- ------------------------------------------------------
-- Server version	5.6.10-log

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
-- Table structure for table `code_post`
--

DROP TABLE IF EXISTS `code_post`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `code_post` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `Title` text,
  `Description` text,
  `Developer` text,
  `User` text,
  `Language` text,
  `Code` longtext,
  `Date` date DEFAULT NULL,
  `COD` text,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `code_post`
--

LOCK TABLES `code_post` WRITE;
/*!40000 ALTER TABLE `code_post` DISABLE KEYS */;
INSERT INTO `code_post` VALUES (1,'Classic ASP and SOAP Error','I am trying to connect to a webservice using Classic ASP. I am using the method FindCompanies... but its giving following error, confused on how to sort it please help','user580950','admin','ASP','<?xml version=\"1.0\" encoding=\"utf-8\"?><soap:Envelope xmlns:soap=\"http://schemas.xmlsoap.org/soap/envelope/\" xmlns:xsi=\"http://www.w3.org/2001/XMLSchema-instance\" xmlns:xsd=\"http://www.w3.org/2001/XMLSchema\"><soap:Body><soap:Fault><faultcode>soap:Server</faultcode><faultstring>System.Web.Services.Protocols.SoapException: Server was unable to process request. ---&gt; System.NullReferenceException: Object reference not set to an instance of an object.\r\n   at App.Apis.v_1_5.CompanyApi.FindCompanies(ApiCredentials credentials, String conditions, String orderBy, Nullable`1 limit, Nullable`1 skip)\r\n   --- End of inner exception stack trace ---</faultstring><detail /></soap:Fault></soap:Body></soap:Envelope>','2013-11-04','N'),(2,'issue with php session destroy','I am facing an issue with PHP session. PHP session is destroyed if I leave the page before it fully loads.\r\n\r\nI have two link pages like so: page_1 and page_2. Both pages are visible after login. If I click on the page_1 link then click page_2 and back to page_1 before page_2 fully loads, the session is destroyed. However, if I click on the page_1 link after page_2 fully loads, it keeps the session. It is little mysterious to me. Can anybody help me?','CoursesWeb','saifur','PHP','header(\"Cache-Control: no-store, no-cache, must-revalidate, max-age=0\");\r\nheader(\"Cache-Control: post-check=0, pre-check=0\", false);\r\nheader(\"Pragma: no-cache\");','2013-11-03','N'),(3,'Dynamical radio button group validation','sample javascript :','user3002807','admin','JavaScript','script type=\"text/javascript\">\r\nfunction validateForm() {\r\n    var radiobutton = document.getElementsByName(\"co[]\");\r\n    for (var i = 0; i < radiobutton.length; i++) {\r\n        if (radiobutton[i].checked) {\r\n            return true;\r\n        }\r\n    }\r\n\r\n    alert(\"At least one radio button has not been selected\");\r\n    return false;\r\n}','2013-11-29','N'),(4,'How to disable nginx user input buffer','I am using nginx and php-fpm. Nginx always buffer user input before send it to php-fpm. Example code. I use put method to send data from client If client send a file, the connection is not closed immediately, It waits for the request complete !','user3020878','admin','PHP','\r\n     exit(\"do not input anything\");\r\n\r\n     // Do something, it\'s not important because the script was stopped\r\n     $handle = fopen(\'php://input\',\'r\');\r\n     while (!feof($handle)) { \r\n             fread($handle,1024);\r\n    }\r\n     fclose($handle);\r\n','2013-11-24','Y'),(12,'C Sharp funny issues with List of Strings Array','So now I would expect first value in the first array in MyPrimaryList to be \"onehalf\" and \"one\" in MySecondaryList. But my issue/problem is that both lists gets updated with \"onehalf\" as first value in the first array in both lists.\r\n\r\nDo you have a good explanation? :)\r\n\r\nTHANKS!!','user3017267','admin','C#','List<String[]> MyPrimaryList = new List<String[]>();\r\nList<String[]> MySecondaryList = new List<String[]>();\r\nString[] array;\r\n\r\nString arrayList = \"one,two,three,four,five\";\r\narray = arrayList.Split(\',\');\r\n\r\nMyPrimaryList.Add(array);\r\nMySecondaryList.Add(array);\r\n\r\nMyPrimaryList[0][0] += \"half\";','2004-11-26','N');
/*!40000 ALTER TABLE `code_post` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2013-11-30 23:50:57
