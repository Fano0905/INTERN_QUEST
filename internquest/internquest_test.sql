CREATE DATABASE  IF NOT EXISTS `internquest_test` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `internquest_test`;
-- MySQL dump 10.13  Distrib 8.3.0, for Win64 (x86_64)
--
-- Host: localhost    Database: internquest_test
-- ------------------------------------------------------
-- Server version	8.2.0

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `applications`
--

DROP TABLE IF EXISTS `applications`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `applications` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `cv` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `cover_letter` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `user_id` bigint unsigned NOT NULL,
  `status` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT 'en attente',
  PRIMARY KEY (`id`),
  KEY `applications_user_id_foreign` (`user_id`),
  CONSTRAINT `applications_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `applications`
--

LOCK TABLES `applications` WRITE;
/*!40000 ALTER TABLE `applications` DISABLE KEYS */;
INSERT INTO `applications` VALUES (25,'Id cumque minima incidunt qui voluptates pariatur officia. A officia aut et sed voluptate vero.','Et modi sed earum veritatis id. Ea suscipit ut dolor aperiam mollitia. Laudantium dignissimos est aliquid qui nesciunt qui qui sit. Mollitia ratione quia molestiae tenetur illum.',24,NULL),(26,'Voluptas quaerat neque dolores molestias fuga totam hic impedit. Dicta et aut porro at molestias. Rerum quia ullam quaerat quos beatae dignissimos.','Repudiandae facere perferendis dolor. Possimus rerum autem esse id. Illo nam in ut nisi deleniti sapiente doloribus alias. Earum quibusdam quod mollitia odit et velit hic.',34,NULL),(27,'At placeat sed aspernatur. Non doloremque nam fuga nam molestias labore omnis. Eos et sed occaecati voluptas quae debitis distinctio minus.','Consectetur occaecati fuga mollitia aliquam. Commodi quia velit ducimus est ut.',37,NULL),(28,'Ut occaecati expedita ipsa rerum sed. Dicta doloremque ea quidem. Repudiandae voluptatem aut voluptatibus reprehenderit facilis sit nostrum.','Rerum perspiciatis et illo. Nemo neque sed et temporibus repellendus. Est animi error quod nisi accusantium delectus.',27,NULL),(30,'Cumque aut deserunt repellendus ad. Doloribus et maiores totam nihil. Et qui rerum qui fugit ducimus quidem.','Eligendi dignissimos deserunt veritatis dolorem qui natus. Dicta fugit nihil est exercitationem. Cumque et quasi et. Nemo ea est repellendus fugit.',34,'Accepté'),(31,'Et error quia aut minus similique deleniti. Perspiciatis ut quae voluptates vel est suscipit repudiandae nemo.','Cupiditate voluptatem et mollitia vel. Sequi odio eos mollitia voluptatibus atque quo. Doloribus culpa nihil voluptatibus consequatur commodi.',26,NULL),(33,'Id aliquid et illum ut. Est quo dolorum perferendis labore perferendis eos dolore. Et ut nesciunt aliquid magnam hic et.','Amet reiciendis qui sint explicabo et veniam. Et pariatur molestiae quae temporibus doloribus. Ducimus quis animi et natus fugit exercitationem nisi autem. Atque soluta accusamus non.',38,'Refusé'),(34,'Et distinctio voluptate et temporibus excepturi aliquam. Et id ut perspiciatis laborum occaecati neque commodi tempora. Sunt deserunt consequatur dicta dolor veritatis reiciendis et et.','Non cupiditate velit id mollitia et. Velit et adipisci et consequatur repudiandae ducimus explicabo. Dolorum ipsa consectetur cupiditate incidunt tempora non enim.',24,NULL),(35,'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent fringilla rutrum turpis, quis tristique dui accumsan non. Phasellus at est tempus, auctor tellus eget, blandit dolor. Proin non ipsum posuere, eleifend leo at, porta justo. Proin porttitor condimentum nunc, suscipit congue nulla rhoncus eget. Fusce interdum nec mauris nec pellentesque. In at maximus velit. Sed pulvinar porttitor dui placerat consectetur. Nulla facilisi. Aliquam in nunc ut dui tristique convallis eget in odio. Donec vitae ipsum vitae diam bibendum elementum.  Nunc ac dolor sollicitudin velit vehicula lacinia. Ut quis venenatis neque, nec bibendum velit. Integer pharetra purus sit amet elit auctor, et efficitur eros eleifend. Nam rutrum rutrum purus sit amet consectetur. Phasellus sollicitudin arcu non malesuada pellentesque. Nam dignissim consequat metus luctus congue. Vestibulum tristique velit at pellentesque faucibus.  Nullam condimentum ex ac porttitor vestibulum. Fusce imperdiet ut velit in pulvinar. Proin vel nibh aliquam, luctus tellus nec, ullamcorper augue. Suspendisse eget libero augue. Pellentesque molestie lobortis venenatis. Integer eleifend est sed tortor consectetur, a cursus nunc finibus. Ut sit amet erat purus. Donec justo massa, viverra sit amet pretium dapibus, mattis sit amet ipsum. Duis id urna a ante tempus sodales a ut est. Praesent massa urna, volutpat nec turpis eu, sodales porta est. In hac habitasse platea dictumst.  Maecenas a dignissim diam. Nulla maximus, eros id viverra varius, sapien felis accumsan sem, quis ullamcorper elit velit non diam. Sed porttitor massa purus. Duis hendrerit ante sit amet mi faucibus, eget gravida lacus sodales. In vehicula, lectus eget luctus feugiat, sapien augue cursus leo, in vulputate ex lorem vel turpis. Phasellus pulvinar mattis velit eu laoreet. Maecenas viverra, elit id consequat consectetur, nulla mauris consequat enim, a lobortis enim nisi sit amet felis. Curabitur nec ex eu diam pulvinar venenatis ut non mi. Aenean faucibus justo ut magna rhoncus gravida.  Nam placerat at elit at hendrerit. Nulla sed bibendum est. Donec pellentesque bibendum laoreet. Aliquam rhoncus, nisi ac gravida porta, est quam cursus nulla, sed elementum odio sem nec nulla. Nunc et nunc leo. Duis venenatis eros metus, eget volutpat massa facilisis maximus. Nulla ac pulvinar libero. Fusce tincidunt fringilla nulla. Aliquam suscipit ut felis eget efficitur. Suspendisse nibh est, ultrices vitae dignissim sed, ullamcorper sed sem. Praesent sit amet lectus quis purus dapibus dictum. Integer vehicula sagittis erat, id ultrices velit rhoncus in. Curabitur maximus commodo velit, et scelerisque dolor iaculis luctus. Cras pharetra nunc ac elementum lobortis.',NULL,1,NULL);
/*!40000 ALTER TABLE `applications` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `areas`
--

DROP TABLE IF EXISTS `areas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `areas` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `areas_name_unique` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `areas`
--

LOCK TABLES `areas` WRITE;
/*!40000 ALTER TABLE `areas` DISABLE KEYS */;
INSERT INTO `areas` VALUES (14,'AEROSPATIAL'),(20,'ART ET CULTURE'),(6,'COMMUNICATION'),(10,'DESIGN GRAPHIQUE'),(8,'DROIT'),(12,'EDUCATION'),(16,'ENVIRONNEMENT'),(2,'FINANCE'),(3,'INFORMATIQUE'),(4,'INGENIERIE'),(15,'LOGISTIQUE'),(1,'MARKETING'),(19,'MEDIAS'),(17,'MODE'),(11,'RECHERCHES ET DEVELOPPEMENT'),(13,'SANTE'),(18,'TOURISME'),(7,'VENTE');
/*!40000 ALTER TABLE `areas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `companies`
--

DROP TABLE IF EXISTS `companies`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `companies` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `area` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `website` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `evaluation` decimal(3,2) unsigned zerofill DEFAULT '0.00',
  `nb_intern` int unsigned DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `companies_name_unique` (`name`),
  UNIQUE KEY `area` (`area`,`id`,`name`),
  CONSTRAINT `companies_ibfk_1` FOREIGN KEY (`area`) REFERENCES `areas` (`name`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=82 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `companies`
--

LOCK TABLES `companies` WRITE;
/*!40000 ALTER TABLE `companies` DISABLE KEYS */;
INSERT INTO `companies` VALUES (71,'CONROY LLC','INGENIERIE','conroyllc.com',2.33,0),(72,'MRAZ-WHITE','INGENIERIE','mraz-white.com',2.00,2),(73,'SCHMITT-TILLMAN','EDUCATION','schmitt-tillman.com',3.33,0),(74,'DIBBERT PLC','DROIT','dibbertplc.com',2.33,0),(75,'GOYETTE-ROHAN','COMMUNICATION','goyette-rohan.com',2.50,0),(76,'RIPPIN GROUP','MODE','rippingroup.com',1.80,0),(77,'BOSCO-BOYER','MODE','bosco-boyer.com',3.67,0),(78,'PRICE GROUP','SANTE','pricegroup.com',3.00,0),(79,'GERHOLD-TORP','VENTE','gerhold-torp.com',1.67,0),(80,'LOCKMAN, CRUICKSHANK AND SCHILLER','TOURISME','lockman,cruickshankandschiller.com',1.50,0),(81,'CESI','INFORMATIQUE','www.cesi.fr',0.00,0);
/*!40000 ALTER TABLE `companies` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `companies_evaluations`
--

DROP TABLE IF EXISTS `companies_evaluations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `companies_evaluations` (
  `company_id` bigint unsigned NOT NULL,
  `evaluation_id` bigint unsigned NOT NULL,
  KEY `company_id` (`company_id`),
  KEY `evaluation_id` (`evaluation_id`),
  CONSTRAINT `companies_evaluations_ibfk_1` FOREIGN KEY (`company_id`) REFERENCES `companies` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `companies_evaluations_ibfk_2` FOREIGN KEY (`evaluation_id`) REFERENCES `evaluations` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `companies_evaluations`
--

LOCK TABLES `companies_evaluations` WRITE;
/*!40000 ALTER TABLE `companies_evaluations` DISABLE KEYS */;
INSERT INTO `companies_evaluations` VALUES (71,5),(79,97),(80,98),(79,99),(74,100),(75,102),(74,103),(73,104),(79,105),(79,106),(71,107),(76,108),(79,110),(76,111),(71,112),(73,113),(76,114),(78,115),(77,117),(75,118),(73,119),(74,124),(78,126),(72,127),(77,128),(80,129);
/*!40000 ALTER TABLE `companies_evaluations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `companies_locations`
--

DROP TABLE IF EXISTS `companies_locations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `companies_locations` (
  `company_id` bigint unsigned NOT NULL,
  `location_id` bigint unsigned NOT NULL,
  PRIMARY KEY (`company_id`,`location_id`),
  KEY `companies_locations_location_id_foreign` (`location_id`),
  CONSTRAINT `companies_locations_ibfk_1` FOREIGN KEY (`company_id`) REFERENCES `companies` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `companies_locations_location_id_foreign` FOREIGN KEY (`location_id`) REFERENCES `locations` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `companies_locations`
--

LOCK TABLES `companies_locations` WRITE;
/*!40000 ALTER TABLE `companies_locations` DISABLE KEYS */;
INSERT INTO `companies_locations` VALUES (71,54),(72,55),(73,56),(74,57),(75,58),(76,59),(77,60),(78,61),(79,62),(80,63),(81,64);
/*!40000 ALTER TABLE `companies_locations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `company_owner`
--

DROP TABLE IF EXISTS `company_owner`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `company_owner` (
  `company_id` bigint unsigned NOT NULL,
  `user_id` bigint unsigned NOT NULL,
  PRIMARY KEY (`company_id`,`user_id`),
  KEY `user_id` (`user_id`),
  CONSTRAINT `company_owner_ibfk_1` FOREIGN KEY (`company_id`) REFERENCES `companies` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `company_owner_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `company_owner`
--

LOCK TABLES `company_owner` WRITE;
/*!40000 ALTER TABLE `company_owner` DISABLE KEYS */;
INSERT INTO `company_owner` VALUES (81,1);
/*!40000 ALTER TABLE `company_owner` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `evaluations`
--

DROP TABLE IF EXISTS `evaluations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `evaluations` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `note` decimal(3,2) unsigned NOT NULL,
  `title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `comment` varchar(2048) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `company_id` bigint unsigned NOT NULL,
  `user_id` bigint unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `company_id` (`company_id`),
  KEY `user_id` (`user_id`),
  CONSTRAINT `evaluations_ibfk_1` FOREIGN KEY (`company_id`) REFERENCES `companies` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `evaluations_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=130 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `evaluations`
--

LOCK TABLES `evaluations` WRITE;
/*!40000 ALTER TABLE `evaluations` DISABLE KEYS */;
INSERT INTO `evaluations` VALUES (5,5.00,'Stage Développeur JAVA H/F','Une très bonne entreprise! Un plaisir d\'avoir pu travaillé chez vous',71,1,'2024-04-13 23:49:03','2024-04-13 23:49:03'),(97,0.00,'Vitae id earum qui saepe accusantium consectetur.','Et aliquam qui quidem atque inventore sed autem. Consequatur delectus quidem ut optio. Consequuntur rerum similique nulla ad dicta. Consectetur et assumenda architecto soluta magni.',79,31,'2024-04-14 00:13:50','2024-04-14 00:13:50'),(98,0.00,'Repellendus voluptatem incidunt illo in voluptatem perferendis est.','Nam aliquid laborum laborum dolore inventore mollitia in. Accusamus non voluptatem quo quia eius occaecati. Quod aliquam totam omnis quis natus harum corporis.',80,24,'2024-04-14 00:13:50','2024-04-14 00:13:50'),(99,3.00,'Quas nobis perspiciatis atque ea minus illum debitis magni.','Architecto sunt qui id consequatur in voluptatum. Est vel atque quidem deserunt et aut incidunt. Eius possimus laboriosam eius corrupti. Ullam sint aliquam qui suscipit esse voluptate voluptas et.',79,37,'2024-04-14 00:13:50','2024-04-14 00:13:50'),(100,2.00,'Quasi accusantium cupiditate aut molestias quam ipsam quibusdam officia.','Velit inventore exercitationem tempore. Dicta in nihil velit sunt alias. Doloremque rerum ut a possimus delectus eius aliquid quis. Ut ab magnam qui ratione illo sed.',74,26,'2024-04-14 00:14:24','2024-04-14 00:14:24'),(102,1.00,'Error possimus officia quia consequatur sunt perspiciatis qui est.','Itaque sunt modi animi. Dolor quaerat rerum laboriosam accusantium. Vero numquam atque vero odio. Perspiciatis rerum laudantium consectetur eligendi.',75,38,'2024-04-14 00:14:24','2024-04-14 00:14:24'),(103,4.00,'Aliquam perspiciatis quae veniam.','Vel autem quis ut eos illum harum aperiam. Doloribus tempore ex eveniet non consequatur neque. Voluptatibus veritatis occaecati dolore. Reiciendis culpa et eius quo deserunt.',74,39,'2024-04-14 00:14:24','2024-04-14 00:14:24'),(104,5.00,'Omnis dolores a deleniti nulla autem.','Et sit distinctio vel. Iusto rerum perspiciatis eaque et consequuntur voluptas debitis nisi. Accusamus voluptas recusandae et facilis. Reprehenderit at commodi temporibus aliquam culpa.',73,36,'2024-04-14 00:14:24','2024-04-14 00:14:24'),(105,5.00,'Non dolor fuga ratione eos aperiam provident.','Impedit libero sit adipisci veritatis dignissimos iure. Itaque est quasi numquam adipisci reprehenderit. Quia eveniet eum dolor eum vitae aliquid totam voluptas.',79,34,'2024-04-14 00:14:24','2024-04-14 00:14:24'),(106,2.00,'Eaque itaque occaecati perferendis quae et vel explicabo.','Qui ut molestiae ut aspernatur. Consectetur commodi ipsum saepe accusamus facilis cum. Nobis ullam et dolore illum. Dicta dolore adipisci corporis ut id aliquid.',79,13,'2024-04-14 00:14:24','2024-04-14 00:14:24'),(107,1.00,'Porro sed et dolor facere perspiciatis.','Voluptates in aspernatur perferendis fuga dolorem rerum. Laudantium eos porro velit quidem culpa. Nisi iusto sit voluptatum.',71,43,'2024-04-14 00:14:24','2024-04-14 00:14:24'),(108,3.00,'Aut et id quasi minus.','Et corporis ut reprehenderit aut vero. Officia quaerat deleniti est rerum id recusandae. Consequatur quia nostrum consectetur voluptatem vero fugiat laboriosam aperiam.',76,12,'2024-04-14 00:14:24','2024-04-14 00:14:24'),(110,0.00,'Nam quia et dolorem natus et quos.','Ut vero distinctio sunt. Vitae consectetur provident fuga non non officia dignissimos nobis. Autem vel nihil et. Aut excepturi dolor qui. Voluptas ducimus et quis fugiat.',79,28,'2024-04-14 00:14:24','2024-04-14 00:14:24'),(111,0.00,'Aut sit nihil a quidem.','Minima aut et cupiditate praesentium. Eius libero non modi. Enim eligendi provident eligendi voluptatem harum in. Dolor sed cupiditate et repellendus.',76,13,'2024-04-14 00:14:24','2024-04-14 00:14:24'),(112,1.00,'Possimus explicabo id sunt nesciunt veritatis nemo optio.','Ab et ad eveniet ut sed voluptas. Facilis excepturi esse deleniti ullam esse voluptatem. Aut cupiditate quia accusamus et.',71,33,'2024-04-14 00:14:24','2024-04-14 00:14:24'),(113,1.00,'Alias iste non eum itaque et unde.','Ut molestiae possimus facere inventore sint fugit reprehenderit. Voluptatem in fugiat id vel. Aliquam tenetur quis qui numquam occaecati harum repellat.',73,39,'2024-04-14 00:14:24','2024-04-14 00:14:24'),(114,4.00,'Occaecati qui fugiat ea.','Harum magnam sed ut harum fugit qui. Rerum totam eum non. Alias facilis excepturi dolorem aut sunt. At velit quis vitae eum aut praesentium. At sunt et repellendus dolorem.',76,26,'2024-04-14 00:14:24','2024-04-14 00:14:24'),(115,2.00,'Doloremque possimus labore esse labore.','Consequatur nesciunt ut ea. Qui eaque distinctio numquam ut cupiditate repellat voluptate. Dignissimos cum et facilis sed nam eum sit et. Veniam est quo error delectus ipsum quod.',78,1,'2024-04-14 00:14:24','2024-04-14 00:14:24'),(117,4.00,'Aut et velit distinctio omnis.','Eligendi amet assumenda totam et rerum asperiores. Eaque ut aut suscipit corrupti aliquid nobis. Consectetur autem quaerat qui aut molestiae ut.',77,34,'2024-04-14 00:14:24','2024-04-14 00:14:24'),(118,4.00,'Quae dolores quod nemo harum corrupti labore voluptate.','Ea et perferendis consequuntur quia magnam aut adipisci repellendus. Aut perspiciatis et aut omnis rem. Deserunt illum tempore quia totam. Voluptatem saepe qui repudiandae ut nulla et incidunt.',75,1,'2024-04-14 00:14:24','2024-04-14 00:14:24'),(119,4.00,'Voluptatum nostrum nemo quo quis.','Quod mollitia natus similique maxime et aut numquam. Cumque maiores recusandae adipisci illo. Voluptas sed et laudantium ratione vitae optio.',73,26,'2024-04-14 00:14:24','2024-04-14 00:14:24'),(124,1.00,'Quis dolore necessitatibus et nostrum eveniet aut libero.','Aut fugit dolorem nesciunt. Consequatur laudantium eligendi veniam dolores sapiente. Impedit asperiores earum nemo quo aut cumque. Qui ullam minima vero ullam magnam ex.',74,1,'2024-04-14 00:14:24','2024-04-14 00:14:24'),(126,4.00,'Quibusdam aperiam quaerat qui labore voluptas.','Id assumenda est sint expedita. Iusto nostrum et aut vitae et. Saepe asperiores voluptates debitis et non quae est natus.',78,43,'2024-04-14 00:14:24','2024-04-14 00:14:24'),(127,2.00,'Eos laudantium nihil assumenda et molestiae facere.','Et et perferendis excepturi ratione vitae facilis hic. Perspiciatis voluptatem aliquam harum labore. Non mollitia eius enim. Voluptas nisi repellendus quis.',72,1,'2024-04-14 00:14:24','2024-04-14 00:14:24'),(128,2.00,'Qui et quam ipsum facilis laborum eos expedita.','Sequi eaque aut veritatis id sit quia et. Non iste nulla eveniet dolorem velit voluptatem sequi. Aut aspernatur omnis reprehenderit veritatis hic excepturi voluptatem.',77,33,'2024-04-14 00:14:24','2024-04-14 00:14:24'),(129,3.00,'Debitis ipsam et sed mollitia.','Velit iste illo deserunt placeat placeat odit sit eius. Maiores quasi tempore qui sunt fugit placeat est. Totam excepturi illo quasi sed veritatis et ad.',80,34,'2024-04-14 00:14:24','2024-04-14 00:14:24');
/*!40000 ALTER TABLE `evaluations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `failed_jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `failed_jobs`
--

LOCK TABLES `failed_jobs` WRITE;
/*!40000 ALTER TABLE `failed_jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `failed_jobs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `locations`
--

DROP TABLE IF EXISTS `locations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `locations` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `postal_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `location` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=65 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `locations`
--

LOCK TABLES `locations` WRITE;
/*!40000 ALTER TABLE `locations` DISABLE KEYS */;
INSERT INTO `locations` VALUES (54,'53220','LARCHAMP','Rue Aric Track 31'),(55,'64330','MONT DISSE','Rue Marlene Creek 13'),(56,'52290','HUMBECOURT','Rue Onie Fort 90'),(57,'19200','ST VICTOUR','Rue Larkin Springs 72'),(58,'66820','VERNET LES BAINS','Rue Flatley Views 83'),(59,'08300','SAULT LES RETHEL','Rue Steve Walks 63'),(60,'19200','MESTES','Rue Vance Ville 38'),(61,'95110','SANNOIS','Rue Gleichner Village 34'),(62,'49320','BLAISON ST SULPICE','Rue Pacocha Alley 64'),(63,'80200','VILLERS CARBONNEL','Rue Katherine Turnpike 69'),(64,'31670','LABEGE','16 Rue Magellan');
/*!40000 ALTER TABLE `locations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `migrations` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (1,'2014_10_12_000000_create_users_table',1),(2,'2014_10_12_100000_create_password_reset_tokens_table',1),(3,'2019_08_19_000000_create_failed_jobs_table',1),(4,'2019_12_14_000001_create_personal_access_tokens_table',1),(5,'2024_03_29_073620_locations',1),(6,'2024_03_29_075116_companies',1),(7,'2024_03_29_075720_areas',1),(8,'2024_03_29_075912_evaluations',1),(9,'2024_03_29_080952_promotions',1),(10,'2024_03_29_081150_applications',1),(11,'2024_03_30_123002_offers',2),(12,'2024_04_04_210440_create_waiting__users_table',3);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `offer_promos`
--

DROP TABLE IF EXISTS `offer_promos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `offer_promos` (
  `offer_id` bigint unsigned NOT NULL,
  `promo_id` bigint unsigned NOT NULL,
  PRIMARY KEY (`offer_id`,`promo_id`),
  KEY `fk_promo` (`promo_id`),
  CONSTRAINT `fk_offer_pr` FOREIGN KEY (`offer_id`) REFERENCES `offers` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_promo` FOREIGN KEY (`promo_id`) REFERENCES `promos` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `offer_promos`
--

LOCK TABLES `offer_promos` WRITE;
/*!40000 ALTER TABLE `offer_promos` DISABLE KEYS */;
INSERT INTO `offer_promos` VALUES (62,2),(60,3),(65,4),(66,4),(67,4),(59,5),(63,5),(64,6),(67,6),(63,8),(65,8),(59,9),(68,9),(60,12),(62,12),(63,12),(64,12),(66,12),(62,13),(66,13),(67,13),(59,15),(60,15),(61,15);
/*!40000 ALTER TABLE `offer_promos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `offers`
--

DROP TABLE IF EXISTS `offers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `offers` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `city` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `duration` varchar(255) NOT NULL,
  `remuneration` int NOT NULL,
  `date_offer` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL DEFAULT '08/04/2024',
  `place_offered` int NOT NULL,
  `nb_application` int DEFAULT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `company_id` bigint unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `company_id` (`company_id`),
  CONSTRAINT `offers_ibfk_1` FOREIGN KEY (`company_id`) REFERENCES `companies` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=70 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `offers`
--

LOCK TABLES `offers` WRITE;
/*!40000 ALTER TABLE `offers` DISABLE KEYS */;
INSERT INTO `offers` VALUES (49,'Press Machine Setter, Operator','VILLERS CARBONNEL','2 mois',1172,'03/05/2024',16,NULL,'Ut nihil quia voluptatem quam quod quam libero. Ut ad ut optio sapiente. Rerum quas sed excepturi eos maiores eius. Commodi rem voluptatem reprehenderit fugiat doloremque id in. Beatae quas debitis impedit officia sapiente et dolores quo. Qui itaque ea impedit ut neque et. Molestias consequuntur maxime numquam sed aut itaque et. Fugiat qui fugit perferendis quisquam ut. Sed natus occaecati officia id iure nemo. Sed illum sit aut sed et et. Qui deserunt voluptatem expedita maiores atque libero. Expedita itaque aut necessitatibus. Quasi porro non amet aut. Distinctio eligendi velit non ea iure ipsum placeat. Id ea officia omnis deserunt. Fugiat facilis reprehenderit et fugit quos inventore minima. Occaecati nostrum laboriosam quas autem quibusdam est et. Praesentium eveniet ut dolores. Corporis voluptatem rerum ducimus ut debitis aspernatur deleniti. Aut quis architecto occaecati. Et minus quas vel ea saepe eligendi aliquid. Rerum dolorem est tempore ut ut. Voluptatem labore atque nihil est. Alias quia modi voluptatem. Iste eveniet asperiores harum quia esse velit odio autem. Temporibus quo aliquam quidem quidem porro sint ab perspiciatis. Placeat molestias necessitatibus molestiae qui ducimus est sed. Itaque amet dignissimos nihil aut. Qui dolorum saepe voluptate quibusdam est. Mollitia doloribus corporis voluptatem. Ex eos dolores in reprehenderit soluta et. Dolor reiciendis consequuntur consequuntur ut. Ut corrupti autem suscipit corrupti reiciendis quia. Placeat ipsa sit facere rerum. Ab necessitatibus fugit id dolores aut. Qui pariatur minima ut pariatur harum et. Est molestias autem quaerat ducimus voluptatem. Sit ducimus dolorem illum est necessitatibus. Autem illo sit quod quis. Delectus exercitationem illum eligendi aut. Non nam quibusdam necessitatibus nisi quod aut iure. Et adipisci illo voluptate voluptas vel et ut.',72),(50,'Makeup Artists','BLAISON ST SULPICE','8 mois',871,'02/10/2024',15,NULL,'Optio animi natus eaque quisquam voluptatibus illo aut. Enim optio illum aspernatur qui. Harum nisi ad error. Et itaque nulla commodi et dolores harum dicta dolore. Quas ut quasi reprehenderit. Dignissimos sequi exercitationem enim tempora ut. Sit perspiciatis eum non doloribus similique deserunt. Odio perferendis odio ut velit fugit. Doloremque labore iste facilis voluptatem quis hic ut. Repellat recusandae aut animi culpa fugiat autem. Ducimus voluptatem et optio voluptas expedita qui consectetur quidem. Dolor officia omnis at placeat modi vitae. Tempore porro sequi ea. Autem temporibus harum nesciunt sint ducimus ab qui asperiores. Minus vitae voluptatem voluptatem eligendi provident sapiente. Aut vero velit ratione ipsum. In cum commodi debitis adipisci vel deserunt nobis. Blanditiis ratione libero inventore cum dolor officiis quo. Laboriosam nihil et sit aut. Sunt cumque et quos repellendus et qui et. Et voluptates distinctio excepturi fuga debitis illo natus. Ut accusamus eveniet quia nam rerum. Repellendus totam voluptatem ex iusto et quia molestiae. Omnis vel earum voluptatem ea qui quisquam officiis. Accusantium commodi expedita numquam expedita. Doloribus iusto qui impedit sed. Rerum error deserunt minima et aliquid consequatur deleniti. Laboriosam consequatur molestias ut amet labore beatae. Quaerat dolor et est in maiores voluptatibus. Impedit sed neque similique officia sed asperiores qui. Dolore enim dolor rem harum ex animi architecto. Atque quas quam dolor. Eligendi optio expedita laboriosam totam. Adipisci quia dolore quisquam sunt qui aut. Laudantium porro itaque minima accusamus omnis perspiciatis qui vel. Mollitia nihil ducimus voluptatibus consequuntur. Perspiciatis optio ea est ipsa sit est. Qui et officiis tenetur nostrum aut debitis minima praesentium. Ipsa non quia quibusdam odit repellat. Impedit rem et unde nisi.',72),(51,'Control Valve Installer','MESTES','4 mois',780,'11/09/2025',12,NULL,'Est non minus ut voluptatibus fugit beatae eos. Incidunt fuga porro saepe. Repellendus voluptatem non non deserunt sit. Nulla voluptas qui nihil consectetur fuga placeat accusamus non. Ullam a accusamus qui ad amet assumenda rem. Iste libero veniam a sit quam omnis temporibus. Expedita dolor dolor possimus dolor suscipit. Aperiam laborum blanditiis vitae et repellat id. Vitae accusamus consequatur pariatur impedit molestiae impedit. Et eos qui numquam qui. Quidem error ab sapiente velit odio. Voluptatem pariatur porro necessitatibus minus qui. Ex quo perferendis recusandae libero. Veritatis quod placeat voluptate. Hic at illum quibusdam qui vel laborum. Doloribus placeat ratione et voluptates soluta nemo. Aliquid doloremque nesciunt doloribus qui veniam veritatis. Doloremque ducimus modi consequatur aut. Laborum tenetur sunt dolore perspiciatis velit. Iure et id suscipit laudantium similique tempora sint. Autem soluta ut adipisci ad maiores nihil ea. Nam porro voluptas in omnis alias dolorem id voluptatum. Consequatur exercitationem et similique alias. Quibusdam ut et sed iure doloremque. Accusamus dolore rerum pariatur qui voluptas ullam laborum. Quod enim ullam fuga. Molestiae vel inventore vel. Ipsa maxime similique ipsum sequi rem. Asperiores sed qui doloremque sapiente veritatis laudantium. Perspiciatis molestiae inventore ut ea ea consequatur officia. Aut cumque vitae omnis quia cum. Et beatae aut quis ea sequi et ullam. Eos reprehenderit explicabo consequatur culpa doloremque quaerat deleniti. Amet quia aperiam voluptatem ipsum. Ipsa aut voluptas nobis animi qui quos sed. Magni optio voluptatum quis dignissimos eum fuga. Et quibusdam suscipit numquam quod totam. Alias qui itaque veritatis quaerat. Magni iure consequuntur ratione eum. Dolor odit et velit sapiente aut qui mollitia. Fugiat voluptas laboriosam sapiente id illum aut molestiae. Nobis quidem id ut itaque itaque nisi.',80),(52,'Motorboat Operator','MESTES','4 mois',857,'04/02/2025',4,NULL,'Recusandae voluptatum dolores ipsum animi quos illo ex. Quos ut alias sequi magnam. Nulla amet quia possimus rerum. Est omnis expedita fugit numquam dolorum voluptate omnis. Quaerat aut voluptatem in officia. Aut iusto alias qui suscipit voluptatem sed. Minima sed soluta facilis possimus voluptatem laboriosam quia. Accusamus in quis ratione non atque sint. Qui fuga voluptatum rem impedit repellendus tenetur labore. Repellendus aut aut qui est. Illo rerum necessitatibus qui. In et tempore rerum. Aut dolorem id necessitatibus. Facere distinctio et ad eaque sapiente ullam ipsum. Sunt mollitia nesciunt debitis soluta asperiores. Numquam sequi labore amet ullam quo. Neque quidem qui rem dolores id rerum rerum. Ut maxime veritatis veritatis maiores iure suscipit. Ipsam perferendis asperiores molestias id possimus commodi. Commodi eligendi quisquam et eius. Suscipit et optio adipisci enim beatae id. Id dolorem laudantium dolore. Voluptatum velit deleniti dicta. Velit maiores et officia quasi repudiandae ipsam ipsa. Qui et quibusdam quia est voluptas. Qui qui magni cupiditate aliquid. Amet nihil sit et et. Recusandae necessitatibus perferendis repellat velit reprehenderit quis. Doloremque quos quaerat praesentium voluptatibus molestias nisi. Assumenda odio sed qui et quod. Id reprehenderit alias molestias aut. Laudantium error qui quia cumque nostrum cum ex. Corrupti et quasi in illo. Recusandae voluptatem pariatur qui ducimus sit pariatur commodi. Ullam nesciunt eveniet necessitatibus omnis. Non soluta a laudantium velit. Deleniti commodi iusto est. Soluta qui dolor reprehenderit sunt. Quo reprehenderit molestiae pariatur sed dicta. Labore aperiam ut ea nesciunt. Rerum reprehenderit quod sit sunt. Quam molestiae non quia modi nam aut. Consectetur vitae suscipit fugiat voluptatem consectetur id distinctio. Maiores nihil excepturi fugiat. Aut saepe incidunt vero quis autem ullam et.',74),(53,'Information Systems Manager','VILLERS CARBONNEL','8 mois',1195,'09/07/2024',18,NULL,'Perferendis qui omnis enim repudiandae ex aut. Rem a eum vitae dolorum labore earum voluptatem. Et et molestiae cum nihil non. Nobis soluta inventore tenetur et. Vel ut ipsum eveniet suscipit adipisci reprehenderit. Quia sit maiores in illum voluptas deleniti reprehenderit. Saepe sequi porro quos. Repellendus quasi illo quas animi. Hic aliquid odio dolore. Aperiam nostrum laborum ea et. Maxime incidunt a laudantium harum. Aut voluptas nemo accusamus iusto necessitatibus. Alias provident deleniti explicabo laborum enim cum praesentium. Autem id sit ab aut in quidem ut. Iure expedita quaerat perferendis eius corrupti eum consectetur. Non reprehenderit voluptate libero sunt rerum totam. Voluptas et ut ipsam fugiat. Occaecati autem laborum vel quis et. Quia excepturi qui autem reprehenderit officia excepturi aperiam ex. Ut velit sunt cum illo quia. Quas id ea qui amet voluptas et et nam. Quasi dolor velit ut vel fugiat deserunt quo laudantium. Dolorem minus impedit eaque sequi. Quam sint qui rerum eum commodi incidunt sunt. Et exercitationem earum voluptatem ut. Fugiat voluptates eos labore. Voluptatem mollitia vel consequuntur cum. Aut laudantium iure consequatur ipsa. Perferendis atque sunt in nemo rerum sed aut. Vitae placeat laboriosam eos laborum quam qui. Optio dolore vel modi itaque esse ut labore. Et molestiae cum corporis tenetur consectetur nihil. Nesciunt suscipit et doloribus eaque sed aut sint. Odit ratione soluta minus qui. Voluptatibus non repudiandae sint quo. Ea provident et quam eius. Dolor at qui ducimus voluptatem sed nesciunt placeat. Sequi architecto aut reiciendis ullam et. Animi vel molestiae a est qui. Aut nam molestias omnis dignissimos. Et vitae omnis saepe nobis. In molestiae eum quia minima fugiat similique aliquid. Porro nobis totam dolor magnam qui. Dolor eos voluptatum sunt quia.',72),(54,'Civil Engineering Technician','SANNOIS','2 mois',837,'02/03/2026',7,NULL,'Quos qui necessitatibus est facere vel. Quo ea facilis fugiat voluptatem. Id voluptatem qui et cupiditate nisi fugiat. Placeat quibusdam tempore et est. Quaerat et voluptas et aut tempore. Id nulla nisi tenetur odit et doloremque. Aut molestiae odit autem natus. Voluptatum ut voluptates accusantium temporibus et. Occaecati aut sint adipisci quae facere iure eos. Ea eius quo quas libero maxime velit totam. Est voluptas blanditiis labore voluptatem vel. Expedita dolorem aperiam quidem ut. Doloribus eius consectetur atque inventore possimus. Qui nisi exercitationem architecto nihil nemo deserunt dolores. Nemo vitae totam rerum magni sunt. Dolorum facilis vero est. Rerum ut officiis dolores qui id distinctio. Porro officiis corrupti omnis hic. Quod et quaerat sequi debitis qui iusto odio. Consequatur quaerat aliquam quis voluptatum. Aut tempora rerum id labore enim quia necessitatibus. Rerum quia assumenda culpa dolor consequatur vel. Est sunt iure culpa rerum. Voluptatem nostrum quia repudiandae. Omnis minima nulla odio voluptates. Non omnis sit molestias hic ratione eligendi dolor. Asperiores distinctio et qui porro et. Et accusantium est repellendus eum consequatur vel impedit adipisci. Vel voluptas dolores repudiandae ratione recusandae magnam sed odit. Accusamus rerum officiis enim labore mollitia nam quis. Culpa sequi ut ut deserunt sint consequatur quod. Et reiciendis beatae et officiis culpa minus. Culpa nihil molestias nihil fuga. Optio voluptatum voluptatum et. Vero incidunt dignissimos ut quos fuga. Eum hic non voluptas possimus adipisci. Eos odio voluptatem dolorem commodi ducimus. Vitae iure quasi possimus dolor possimus nihil impedit. Et molestiae quod modi quibusdam sit. Quo illum iste eum et dolores voluptate. Deleniti enim ut alias quos temporibus voluptas et nulla. Blanditiis ut dolor aperiam inventore voluptas. Magni ipsum aut quia nihil est cum accusantium.',77),(55,'Gas Plant Operator','VERNET LES BAINS','8 mois',1163,'07/09/2024',7,NULL,'Qui inventore laboriosam eos ea non. A quod ullam officiis et porro architecto sint. Ut ratione provident nam ea delectus non. Rerum rem nesciunt sed consectetur quam facere. Ipsam molestias quae sit sed exercitationem ratione repellat. Numquam sequi facilis odit ipsa laboriosam facilis exercitationem. Itaque consequatur ea amet eligendi dolore consequatur fuga. In magni iure amet. Dolorum mollitia natus iure molestiae. Corporis hic consequatur voluptatem tempora qui recusandae voluptatem. Corporis ipsa iure magni dolorum. Voluptates molestiae et quas nulla magni totam sit. Ut aperiam iure ipsa et rerum. Est commodi laudantium pariatur impedit quaerat dolorem ipsum. Nemo quo quod illum ut temporibus veniam ut. Incidunt omnis quo voluptatibus dignissimos totam magnam ut exercitationem. Voluptatum dolore perspiciatis iure recusandae eius cum minus. Rerum amet et accusamus molestias laudantium veniam et. Porro labore non adipisci consequatur vel. Vitae saepe aliquam doloribus hic est rerum. Hic et sit rem mollitia qui iusto. Perspiciatis officia doloribus eligendi nam quod facilis. Consequatur ullam impedit deserunt aut. Debitis nihil enim in numquam fuga quaerat quidem. Ea mollitia expedita facilis saepe adipisci qui illum. Facere assumenda sequi nobis veritatis et quia et. Aut esse expedita atque iusto iste qui deleniti autem. Quos sint quisquam ipsum. Reiciendis repellendus illo ut dicta voluptate voluptatum. Alias qui ut id accusantium autem voluptatem dicta. Iure aut repudiandae veniam ut repudiandae sit. Ut minus id rerum quia. Quo quia tenetur repellat veniam officia nesciunt dolores. Beatae quo corporis incidunt nihil. Explicabo unde autem iure nobis. Voluptates rem voluptate facere sunt sit et magnam. Itaque ut sequi ad veritatis consequatur et. Velit enim labore perspiciatis quaerat sapiente et consequatur.',76),(56,'Occupational Therapist','LARCHAMP','4 mois',1184,'12/09/2025',13,NULL,'Vel sit et qui quia aut dolorem sunt. Praesentium voluptas in possimus exercitationem. Consequatur sunt omnis totam ullam quas et. Minus deserunt quo perferendis fugit itaque rerum quidem. Veritatis saepe aut culpa dolorum earum id expedita eligendi. Libero eum labore aliquam corrupti est sunt corrupti. Laboriosam rerum illo quia harum. Voluptate quo quae amet et sed. Totam quis molestiae ipsum eaque ea doloribus recusandae. Sed nihil tempore quae suscipit dolore eaque. Delectus tenetur incidunt molestiae qui dolor qui. Quia occaecati ea consequuntur laboriosam modi aut id. Omnis autem sit laboriosam aut corporis exercitationem possimus. Voluptatem tenetur distinctio voluptas voluptatum culpa unde. Numquam iusto at perspiciatis ut et exercitationem iusto. Est expedita deleniti qui voluptas. Natus eius assumenda est voluptas quisquam nulla qui. Iste id ea voluptatem minus voluptatem quis iusto. Aperiam in sapiente molestiae sed. Omnis velit saepe ab sed assumenda quisquam repudiandae. Eum sint rem dolorem. Doloremque aut repellendus quia eum. Quae aut magnam suscipit vel eum est explicabo porro. Quisquam voluptates beatae excepturi aut at vero. Aperiam vitae aliquam illo illum. Ut vero similique facilis ea quam similique. Et est aut corrupti nemo neque sequi ut. Officiis fugiat quod odio quidem. Est eius voluptatem rem consequatur aut. Iste repellendus dolores dolorem et quia recusandae cupiditate veritatis. Adipisci adipisci modi rerum quae officiis in. Sed occaecati molestiae ut aut id sunt. Et id illum debitis et ullam sit veniam. Ducimus aliquam iusto laborum voluptate aspernatur. Et est et repellat est saepe porro facere. Expedita velit consequatur omnis corrupti nulla. Id nobis ex nostrum rerum voluptate. Nulla non quia cum et est aspernatur. Necessitatibus totam cum labore quibusdam recusandae id sit voluptatem. Sapiente non nemo et iste hic eum. Ipsa aperiam laborum enim voluptatibus corrupti esse. Autem sunt rem quo similique.',78),(57,'Materials Inspector','VILLERS CARBONNEL','6 mois',730,'26/07/2025',5,NULL,'Autem ea sint a laudantium non eaque. Aut voluptas sequi rerum rerum. Qui id eos laboriosam labore sequi rerum. Quo et qui voluptate nobis error. Dolore quidem rem quia qui praesentium at eaque. Et voluptas neque harum eveniet sed cum. Sed et et aliquid a voluptatum est. Odio a voluptates ullam voluptate cumque tempore nemo. Voluptas ut ratione explicabo et. Corporis esse nobis porro numquam. Molestiae adipisci enim at facere. Autem iusto iure natus. Et consequatur autem in sed modi repudiandae. Dolores sapiente deleniti iste nesciunt. Voluptate nostrum enim cupiditate dolores laudantium. Explicabo velit vel nihil porro. Reprehenderit in cum et error est est doloribus voluptates. Nostrum est quibusdam laudantium fugiat neque placeat velit ullam. Quasi voluptate omnis eius molestiae dolorem. Libero iure est molestiae sequi. Perspiciatis odio placeat totam vero incidunt est quod. Mollitia ipsa minus omnis et expedita in libero facere. Facere eaque sint ipsa nesciunt aliquam. Voluptatibus illum rem sed sit doloribus. Ea doloremque autem nihil aspernatur. Consequatur aut aut odio dolor quas qui. Repellat quam placeat tempora omnis dolorem voluptatem est possimus. Voluptatem suscipit qui ex illo. Necessitatibus iure explicabo voluptatem maiores vitae odio. Culpa et adipisci ea corporis iusto dicta numquam exercitationem. Est amet nihil illo est vel. Voluptatem voluptatem dolorum perferendis. Vel adipisci cum sed vel maiores. Aspernatur et sed quibusdam. Ratione distinctio quos placeat omnis voluptates tenetur. Velit ut et soluta. Sit nihil nemo vero quam ad. Culpa dolor quod accusantium dignissimos hic dolorum. Voluptas fuga iure perspiciatis laboriosam quidem nihil sed. Iure sunt tempore fuga illum asperiores quisquam. Placeat consequatur dolor nisi veniam voluptates id. Dolorem vero quisquam quisquam vitae et velit. Iusto a at est earum fuga aut. Corporis aut ducimus quidem nemo numquam incidunt veniam fuga.',73),(58,'Agricultural Sciences Teacher','MONT DISSE','6 mois',1056,'03/12/2025',17,NULL,'Pariatur consequatur atque alias est dolore qui. Enim porro numquam aut odio. Ea hic eius qui placeat temporibus. Ipsam corrupti magni voluptatem. Blanditiis cum culpa dolor veniam laboriosam maiores voluptatum debitis. Aliquid ut quod ea eaque eaque. Ipsam earum ducimus possimus rerum architecto ut. Accusantium non sapiente temporibus aperiam earum. Sed dignissimos sapiente eum voluptas iure est. Sed est quis et quod totam quia possimus. Excepturi ut asperiores perferendis sit maiores similique nisi. Dolorem eos nam iusto unde. Perferendis inventore enim ipsum voluptatem neque consequatur. Laborum voluptas eius aut ut. Ducimus ex qui aut est commodi sunt vel. Assumenda debitis ducimus sequi perspiciatis nisi dolores alias. Iste id sit rem mollitia. Nihil ullam veritatis consectetur harum. Assumenda ut vero cum dolor officiis. Iusto similique harum veniam consequatur tempora. Ullam nam est molestias error error soluta. Est aperiam aliquid atque recusandae porro consectetur. Neque nesciunt nihil facere hic provident veritatis ad. Eum magni asperiores explicabo adipisci officiis explicabo sed quia. Voluptatibus consequatur dignissimos aliquam qui quibusdam et quam labore. Esse quas et distinctio aut tempora quasi voluptas. Provident qui numquam rerum voluptates. Explicabo tempore voluptatum eum maxime est. Nisi perferendis ratione eveniet expedita et. Aut et pariatur qui vel est necessitatibus. Ea sunt a dolores. Ut repudiandae vel id voluptatem exercitationem. Atque ex et aut aut velit. Inventore ut expedita explicabo ducimus perferendis sequi nihil. Sit labore cupiditate est occaecati. Aut eveniet corporis molestiae eos optio. Eos eveniet possimus ut voluptas reprehenderit eum. Porro aperiam est eum sit ut. Quidem esse iusto placeat sit officia et qui eius. Itaque est cum aut modi perspiciatis temporibus explicabo non. Similique nemo adipisci ipsam iste aut rerum.',75),(59,'Actor','LARCHAMP','4 mois',715,'17/01/2026',12,NULL,'Ea aliquid cumque maiores aut et. Atque at est sint illum quam omnis. Ratione molestiae hic aut. Eaque id dolore aperiam est. Possimus et quia quia esse maiores odio. Recusandae dolor et et. Quod ut similique aut non dolores quae repellendus. Molestiae aut ratione accusantium aut quia aut. Corporis tempora sit id non. Hic odit perspiciatis ipsa est. Velit et architecto reiciendis et voluptates voluptate eveniet. Officia tempora fuga tenetur eos odio. Quia consequuntur id quasi. Impedit expedita qui debitis aut. Est esse iure dolorum impedit ut. Ducimus eius ut beatae unde pariatur. Voluptas libero optio rem libero quisquam quia. Eveniet iure cum quibusdam at rerum exercitationem. Et et at et commodi consequuntur iusto ratione. Rerum itaque dolorem modi provident. Explicabo et sed ratione non amet eum molestias. Ipsa deleniti itaque consequatur iusto. Laboriosam fuga impedit maiores eum. Aspernatur eveniet ex ea et. Mollitia occaecati officiis odio quia adipisci molestiae. Tempora molestiae dolore unde aut dolorem. Voluptas aut itaque quas perferendis. A iste animi accusamus nobis. Quam nemo sint suscipit vel dolore veniam sed. Alias voluptas in vel sit libero porro minima. Molestias velit perspiciatis autem eum quos. Facilis quisquam dolorum architecto porro iure unde. Quia facilis quibusdam ea magni vero esse laudantium. Et laborum hic voluptas eum ipsa. In ullam ut impedit iusto et eveniet quia. Molestias atque nesciunt molestiae doloremque. Dolore error non repudiandae voluptatum iure ad. Quia qui sed asperiores maxime. Eum natus eum at est totam impedit. Qui et dolores voluptatum vero. Reprehenderit mollitia et aut repudiandae. Neque voluptas quia assumenda nihil omnis quo. Laborum voluptatum optio distinctio sed at. Officia qui veniam sit in qui et nostrum. Fugiat natus quam neque dolor sint hic. Ut omnis odit illum molestias. Non quia amet odit. Repudiandae tempore ad atque similique. Excepturi sint nostrum ea sint deserunt a.',79),(60,'Program Director','VERNET LES BAINS','8 mois',1158,'05/06/2024',8,NULL,'Id ut natus dignissimos tempore ex mollitia quisquam. Veritatis dolor eum voluptas soluta eligendi. Provident reiciendis et dolores sed facilis. Itaque veniam quae rerum voluptas. Dolores explicabo animi consequatur inventore magni. Totam itaque sit fuga distinctio. Culpa temporibus quia officiis molestias mollitia. Quia vel aut recusandae impedit consectetur ea fuga. Quibusdam recusandae earum quo enim reprehenderit ipsa. Iste impedit molestiae sapiente ullam ipsam aut minima. Soluta vel vitae quos enim consequatur assumenda. Minus rerum atque dolore quae animi inventore. Voluptas porro quidem quia cupiditate inventore quasi expedita tempora. Vero laudantium aperiam ut deleniti et. Repellat harum soluta quaerat voluptas vel. Quia quo dignissimos ut ea. Voluptas numquam ipsam quis non voluptatibus. Ad sint soluta adipisci saepe provident quia. Beatae magnam id beatae atque harum possimus. In alias ipsa ipsum voluptatem esse et reiciendis. Vel in porro nihil neque molestiae. Cupiditate necessitatibus qui soluta nemo expedita. Illum dignissimos ratione sed accusantium inventore assumenda omnis. Mollitia cum impedit aspernatur cum voluptatum reprehenderit. Sapiente amet consequuntur molestias velit commodi nesciunt nam. Quia id quae ipsa eos accusantium fugiat dolores exercitationem. Et optio illo natus perferendis vero. Repudiandae veniam sed dignissimos porro. Ipsum aut ea voluptatem nihil sint totam sint. Distinctio unde incidunt molestiae. Quod odit quos qui debitis. Cum fugit officia perspiciatis libero voluptatem cumque laboriosam. Ea quae voluptatem fugit omnis necessitatibus illum. Magnam in magnam provident. Rerum voluptatibus rerum omnis molestias ea. Ut sint voluptatem eum fuga aut. Reiciendis inventore tenetur exercitationem voluptas minus. Aut iusto enim perferendis amet. Vero ut assumenda nostrum perferendis ullam enim vel. Voluptatem vel illum sint perferendis molestias similique. Et earum molestias quis cumque tempora suscipit.',77),(61,'Agricultural Equipment Operator','SANNOIS','8 mois',680,'14/03/2025',12,NULL,'Impedit officia ipsa dolorem. Quis est eveniet et eos rerum quia. Esse quia cumque commodi dolore laborum illo itaque. Et quia beatae dignissimos suscipit ut non. Accusamus aut ratione maiores impedit sit. Ipsa eum sequi et nisi natus. Qui blanditiis ex beatae iste et. Vel quia illo et odio. Maxime dicta qui beatae hic expedita exercitationem illo quas. Et minima est maxime ipsam fugiat nemo tempora. Illum quaerat nisi repudiandae ipsum voluptas pariatur. Tempore magnam maxime excepturi tempora. Soluta dolorem similique facere eaque. Repellat voluptates dignissimos sint ipsa voluptas. Enim ut enim facere autem est voluptatem. Odit modi id est ut perferendis unde facilis. Natus id ipsa placeat voluptatum et cum voluptas. Quia eos laboriosam qui voluptatem et doloribus. Inventore eum et sit esse iste. Cumque recusandae adipisci dolor mollitia aut alias. Cumque tempora et qui pariatur quae. Veniam impedit dolores quidem perferendis nam excepturi explicabo accusamus. Nesciunt amet qui dolores. Rerum deserunt hic qui quo in molestiae. Debitis excepturi amet accusamus nemo laboriosam eum ratione. Non perspiciatis deserunt quaerat quia sequi. Iusto quis deleniti libero voluptatem error. Ab aut quae id est ut dolorem. Id adipisci consequatur id quaerat et neque hic est. Adipisci eveniet voluptates eveniet aut harum dolor minima. Et temporibus voluptatem eum blanditiis autem. Praesentium veritatis fugiat expedita sit illo aliquam numquam sint. Possimus tenetur cupiditate eos aut. Reprehenderit qui voluptate numquam. Optio possimus non optio id. Facere tenetur nihil dolorem repellat. Tempora nihil commodi debitis est tenetur adipisci. Vel consequatur dicta animi earum temporibus nemo nulla. Quia labore cupiditate illum ut soluta unde. Sunt aut dolorum possimus error. Consectetur occaecati aut vel a est sint ut odio. Ut est eligendi ducimus pariatur dolorum.',74),(62,'Textile Dyeing Machine Operator','SANNOIS','2 mois',1104,'21/03/2025',13,NULL,'Dolorum autem distinctio tempora. Sequi voluptates enim voluptatibus similique eaque. Ab quis similique amet aliquam culpa commodi. Aut ut culpa accusantium eligendi. Debitis et exercitationem saepe et ipsum atque. Est dolorem repellendus et molestias exercitationem. Distinctio aut autem cupiditate rerum. Et est delectus alias dolorum voluptatum exercitationem. Vel in veritatis quidem dolores atque pariatur nulla. Dolor ex est quis voluptatem. Pariatur aut dolorem voluptates temporibus mollitia nesciunt similique. Eos blanditiis autem eum nisi. Sit aut vitae unde eveniet porro modi. Est quia aut est ipsum. Doloribus ut dolorem et nam sed id sapiente. Iusto culpa tenetur quos voluptas. Ut aut ipsum et placeat. Aspernatur necessitatibus quaerat qui labore quod tempore veniam. Labore voluptas libero et natus eius. Ut nemo porro libero porro nihil est hic. Dolorem veniam fugiat et aut nisi labore enim. Exercitationem dolorum dolorem dolores nam eos eum ratione et. Tenetur sed laboriosam quisquam aliquid voluptas. Nobis et rerum molestiae voluptatem doloribus. Et quo aspernatur quis eos. Nihil id esse eos fugit unde doloribus voluptas. Consequatur repudiandae voluptatibus et dolor molestiae quis. Voluptas sit repellendus illum veniam sapiente ut ex. Vel error quia quae rem. Quia iusto quia quae. Voluptatem corporis dolor earum amet. Quos totam et possimus veniam culpa est temporibus sit. Eum qui veniam unde velit et aut. Cum vel qui et ea. Culpa dolorem cumque rerum esse. Repellendus quisquam est et deleniti. Est molestias fuga error. Consequatur veniam voluptas sed doloremque vero expedita officiis. Quia corporis dolor ex nisi. Sit dicta voluptas alias rem. Vel autem ipsa voluptatum velit eos rem cupiditate. Corporis doloremque quia voluptates consequatur quos. Ut atque ad perspiciatis quod quisquam sapiente enim. Optio non enim aut et omnis velit. Laboriosam numquam asperiores sit aut nihil quis delectus.',74),(63,'General Practitioner','LARCHAMP','4 mois',960,'04/01/2025',4,NULL,'Cumque enim quo molestiae voluptates. Et sunt accusamus enim sit quo quia blanditiis. Mollitia et aliquam ab aspernatur eum non qui. Dolores autem debitis ea ab sed nobis. Reprehenderit deleniti enim sed dolor sit culpa harum. Autem soluta amet esse id. Rerum ipsa expedita magni dolor. Unde pariatur sit consequatur illum expedita. Et eaque quas deserunt rerum iusto maiores. Dolores nam cum fugiat recusandae. Velit accusamus iusto quis et quisquam. Non aut enim cumque accusantium eum dolores. Omnis reprehenderit quis quam quos ipsa. Sunt tempore eos beatae sint quia a. Fugiat quo repudiandae sed voluptatibus provident veniam placeat. Quidem labore voluptas aut odio repudiandae ut non. Ad adipisci est ipsa. Excepturi dolor dolore quod at. Minima excepturi qui placeat et. Nisi fugiat odio nihil a corrupti cupiditate cum. Nulla maxime optio numquam maiores et voluptatum. Reprehenderit repellat sit occaecati et voluptas ullam. Molestiae facilis nihil sed sapiente nihil nulla. Doloremque similique occaecati sed dolorem voluptas harum explicabo. Ut tempora magni facere eum. Dolores assumenda neque repudiandae. Necessitatibus illo perferendis qui. Repellat necessitatibus magnam qui enim tenetur exercitationem. Delectus id voluptatem repudiandae veniam. Nihil et sed assumenda omnis eius. Id ipsa officiis qui. Unde enim recusandae omnis sint illum. Aliquam facilis tenetur tempora fugiat. Consequatur et ipsam molestiae aut. Nisi eaque non non ullam vel. Quas vel repudiandae qui facilis. Ut deleniti eius deserunt adipisci qui. Eligendi laboriosam esse ex deleniti. Et numquam nesciunt enim at. Eum sint cum ex cum. Officiis quo at nesciunt. Amet eum maiores placeat iusto veritatis. Quia ipsum temporibus at voluptatem nesciunt molestias at. Et quod sint molestiae qui officiis maxime hic. Dolorem voluptas voluptate consequatur quibusdam laboriosam. Ex esse facere minus qui eos voluptatem consequatur.',77),(64,'Sales Person','SAULT LES RETHEL','6 mois',968,'16/07/2025',20,NULL,'Nobis facilis doloremque qui quo. Corporis est et fugiat ea ipsum saepe nesciunt. Aut nihil in deleniti culpa. Sed facere exercitationem aut nihil ipsam dolorum sit. Labore sunt dignissimos aut fuga et quo. Cumque esse optio soluta. Ullam dolorum incidunt id expedita voluptas illo. Vel eveniet aliquam et consequatur voluptas facilis doloribus sint. Sint dolorum nihil aliquid hic. Reprehenderit libero architecto qui qui aut excepturi. Et excepturi harum id non. Aut laborum aut vel officiis optio sunt quidem ut. Commodi quo distinctio impedit possimus quibusdam qui ut. Aspernatur nulla et neque corporis ut et. Quae possimus vitae id iure reiciendis consequatur reprehenderit. Rerum ducimus quidem laboriosam et. Vel delectus dolores sed et sunt saepe atque. Quisquam a consectetur corporis fugiat officiis. Blanditiis sunt laborum ab dolore omnis ipsam aliquam. Voluptatum eum laborum est maiores enim. Id quis dolore cumque. Sapiente beatae maxime cum totam alias omnis ea. Vel eum quisquam aliquid expedita. Itaque perferendis vero quis facilis quaerat. Et ea rerum occaecati fugiat dolore exercitationem eum esse. Est voluptate aut sequi quidem ratione magnam quas. Rem ipsum saepe eum est aut perspiciatis ratione autem. Et eligendi consequatur atque officiis a et. Quam non ut adipisci consequatur. Qui quasi sint vel id expedita laudantium ea rerum. Fugiat voluptatem vel et dolores consequuntur id. Nulla molestiae quae qui aliquid adipisci. Sit quaerat quaerat eius molestias. Ipsam quia unde consequatur dignissimos. Quidem dicta est perferendis modi accusamus dolor recusandae. Blanditiis ut porro voluptatibus velit quaerat voluptatem ut. Accusamus laudantium molestiae laborum et maxime repellat. Temporibus facilis necessitatibus in dolore sint qui eos consequuntur. Ducimus aut est voluptatem est. Ipsum eum voluptas reprehenderit earum numquam esse. Voluptatem aliquam vel expedita ad modi quibusdam.',80),(65,'Editor','MESTES','6 mois',1093,'12/04/2026',18,NULL,'Debitis voluptas unde mollitia quasi dolorem aut id dolorum. Assumenda hic facilis modi quia quia. Reiciendis voluptatem sint adipisci earum. Nesciunt adipisci ea ex quas alias voluptatibus explicabo. Debitis culpa ut molestiae aspernatur. Commodi voluptas quas voluptatem. Reiciendis voluptates molestiae porro nesciunt aut. Atque excepturi sit dicta minima. Voluptates sit ipsum in vel architecto. Aut quo consequatur fugiat illo consectetur itaque. Dolor omnis distinctio iure dolorum. Et aut consequatur labore quia quibusdam. Asperiores a ea earum similique sed ut eum. Voluptatum delectus eos consequatur expedita. Consequatur officia dicta soluta cumque reprehenderit et aliquid. Qui et incidunt at neque odit. Ut voluptas laborum deserunt modi. Voluptatibus dolorem nemo mollitia et. Praesentium expedita optio sunt velit. Enim occaecati voluptate beatae facere dolor perspiciatis. Molestias ex voluptatem corrupti facilis corrupti occaecati sit. Fugit in in possimus voluptatem tempora nesciunt est necessitatibus. Dignissimos quia ut pariatur ut error voluptatibus est. Necessitatibus voluptatem et eveniet provident. Nihil quia aut repellendus animi molestias. Rerum numquam beatae non voluptatum omnis aut soluta. Doloremque et alias distinctio assumenda. Odio non magni a cumque sed eligendi laudantium vel. Placeat eos dolore amet reprehenderit. Tenetur at maxime quam ad qui labore. Culpa consectetur fuga minima ut quis molestiae nostrum. Sequi est et impedit dolor numquam ut minima. Distinctio totam aspernatur ea debitis. Numquam fugit et quis qui id molestiae voluptatem. Voluptatem maiores velit sit ut ad earum hic. Neque nostrum a quasi labore nemo similique aut. Quas omnis a tenetur dignissimos repellat. Qui mollitia ut quis est aperiam. Quo et id tempora. Voluptates et et facere dolores qui ea. Molestiae nostrum quia voluptatem assumenda expedita qui quibusdam.',73),(66,'Armored Assault Vehicle Crew Member','MONT DISSE','2 mois',876,'06/04/2025',11,NULL,'Possimus nostrum sed esse. Velit sunt molestias similique. Non labore occaecati ut animi. Maiores ducimus tempora repudiandae voluptatem et. Voluptatem veniam facilis qui porro ut eaque. Velit quam est quis cupiditate rem. Nobis ut est saepe dolorem nisi consectetur ut iure. Et sunt cum porro quia minima suscipit beatae aliquam. Occaecati saepe quos tempore laboriosam voluptatibus sit ut. Consequuntur molestias dicta nesciunt. Aliquam necessitatibus est consequatur modi corporis. Vel sunt sit delectus necessitatibus asperiores quia. Aperiam earum sunt nulla fugiat. Dolor aliquam voluptate commodi expedita temporibus rerum. Velit aut cum corporis. Autem possimus temporibus velit aliquid quas accusamus iste quas. Dolore aut labore labore maiores ipsum eum quia. Et suscipit qui impedit ea dicta dolore excepturi. Architecto consequatur modi rem neque. Fuga sint minus dolores ipsa. Quia et velit et voluptatem molestiae quasi reiciendis. Et eum aut excepturi dolor voluptatem quia commodi. Quod aut illo aut et. Quaerat perferendis corrupti amet aut officiis. Delectus unde et quia sed debitis. Reprehenderit repellat consequatur reprehenderit ex possimus fugiat et esse. Quasi voluptatem omnis optio voluptatem exercitationem velit. Distinctio voluptas quos delectus atque placeat iure. Repudiandae modi vel ipsa blanditiis est sunt omnis. Voluptates officiis et suscipit. Consequatur sed nisi vero dolorem deserunt. Vitae id inventore quia debitis voluptatem ipsum. Voluptatem qui aliquid nesciunt aut cum et. Impedit inventore deserunt quis assumenda vel ab. Et voluptatem unde ut sed. Magnam nam quas velit facilis at accusantium. Voluptatem dolores enim quibusdam quas illo vero excepturi. Et et voluptatibus at minus debitis officia. Est porro et temporibus illum tempora voluptas ad in. Rem similique ipsam voluptatum veritatis deleniti ut tempora. Libero sequi placeat adipisci et. Inventore dolores deserunt vel eum qui qui et.',76),(67,'Parking Enforcement Worker','LARCHAMP','4 mois',1066,'25/12/2024',19,NULL,'Sunt officia perferendis eveniet rerum molestiae labore. Facere ipsa eligendi sit deserunt perferendis in et. Aliquam ut deserunt quaerat sed deserunt ut. Asperiores iusto consequatur officiis qui. Repellat maxime magni et nihil. Qui nulla laudantium sunt sed optio illo hic. Nisi perferendis est est ut. Assumenda et error suscipit excepturi quas est qui. Et inventore sunt aut quis. Quo iure dolorem odit enim. Inventore nemo voluptatem corrupti ipsum maxime sed tempore. Ea quia eaque impedit quis error non nam. Nam corporis quibusdam enim neque qui blanditiis. Veritatis praesentium vitae voluptatem dolorem est nihil. Alias voluptas officia illo dolores. Quisquam ratione possimus non consequuntur natus a molestiae qui. Quis quo rerum corrupti commodi. Fugit et eligendi vitae pariatur. Hic aut sint nam. Nesciunt exercitationem consectetur tempora quo. Aut et officia in sed in amet sequi. Quae doloremque non qui dolorum et. Eveniet adipisci tempore saepe quisquam atque consectetur. At unde atque aut consequatur vel id tempore. Ut consequatur non vel. Voluptatem quo qui voluptas debitis dicta. Atque facilis deserunt id quos veniam accusamus. Itaque et voluptatum consectetur et consequatur eius voluptate. Vel porro dolorem inventore alias. Quod perferendis optio quisquam qui suscipit. Provident ab provident natus quibusdam dolorum aut porro. Voluptas voluptatibus hic totam eos. Alias accusamus possimus quam dolorem voluptatibus nulla sapiente culpa. Ut laborum omnis libero asperiores ut non quam. Fuga et temporibus harum fuga consequatur nihil id. Libero atque qui rem. Harum officiis ratione saepe nobis aut minus dolor. Mollitia nihil qui minus dolores enim nemo rerum voluptate. Et est quas sit corrupti voluptatibus qui facilis. Eos qui distinctio nobis debitis. Qui ea dignissimos animi ut eveniet est. Sit beatae ut fuga sed eos. Et quo amet corrupti sed molestiae quo.',72),(68,'Refrigeration Mechanic','VERNET LES BAINS','6 mois',1046,'28/09/2024',6,NULL,'Molestiae atque vero laborum assumenda. Fuga at placeat iste deleniti beatae. Quia laudantium eos distinctio consectetur quo quam et. Repellat dolor occaecati aut laudantium. Delectus laboriosam dolor qui omnis occaecati ipsum dolorem voluptatem. Qui quo ea suscipit corrupti. Ex soluta amet commodi in sint et. Saepe vitae laboriosam dolor ullam consequatur harum corporis. Non voluptatem provident ut mollitia sit. Occaecati ducimus consequuntur sint totam amet. Sint nisi perspiciatis ratione labore vel alias consequatur. Quis alias quod laborum culpa aut perspiciatis. Aut omnis quam aliquam omnis. Eum iste dolor recusandae dolorem nihil. Architecto eos incidunt porro esse voluptas voluptatem. Cumque atque voluptatum cupiditate autem ipsum est officia. Voluptatem ad consequatur excepturi eaque alias aut. Ducimus necessitatibus laboriosam omnis ut error ut. Voluptatem quia natus reiciendis est sed. Voluptatem et atque sint et ut odit. Atque vel dolores dolores. Minima ipsum quae deserunt magnam quam dignissimos. Fugit quia quisquam quam ipsam officia. Adipisci neque et veniam excepturi molestias delectus debitis voluptas. Est nulla maiores maiores. Commodi odit accusantium molestiae maxime ut. Doloribus vitae at sequi est repellendus. Voluptate pariatur harum aliquam neque. Voluptatem non sequi laboriosam fuga nihil vel. Et vitae dolores non beatae et in veniam at. Itaque quis iste nisi labore ut delectus. Eligendi recusandae tempora quos iure quae error nam. Sapiente consectetur aut sed praesentium facere pariatur asperiores. Quaerat dolor voluptas quo nihil. Iusto iure sint sed blanditiis. Modi aliquam hic vel numquam. Itaque reprehenderit expedita iure exercitationem eum. Earum quaerat nihil similique ipsa et incidunt. Molestiae ratione accusamus ut voluptate. Modi ut ab sint labore autem. Tempore dolores voluptatem libero officiis dignissimos. Possimus quod adipisci ut quibusdam provident. Commodi recusandae ut ut ex aut. Non numquam in nobis omnis.',77);
/*!40000 ALTER TABLE `offers` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `offers_applications`
--

DROP TABLE IF EXISTS `offers_applications`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `offers_applications` (
  `offer_id` bigint unsigned NOT NULL,
  `application_id` bigint unsigned NOT NULL,
  PRIMARY KEY (`offer_id`,`application_id`),
  KEY `id_application` (`application_id`),
  CONSTRAINT `offers_applications_ibfk_1` FOREIGN KEY (`offer_id`) REFERENCES `offers` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `offers_applications_ibfk_2` FOREIGN KEY (`application_id`) REFERENCES `applications` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `offers_applications`
--

LOCK TABLES `offers_applications` WRITE;
/*!40000 ALTER TABLE `offers_applications` DISABLE KEYS */;
INSERT INTO `offers_applications` VALUES (49,30),(50,30),(51,30),(52,30),(53,30),(54,30),(55,30),(56,30),(57,30),(58,30),(49,31),(50,31),(51,31),(52,31),(53,31),(54,31),(55,31),(56,31),(57,31),(58,31),(49,33),(50,33),(51,33),(52,33),(53,33),(54,33),(55,33),(56,33),(57,33),(58,33),(49,34),(50,34),(51,34),(52,34),(53,34),(54,34),(55,34),(56,34),(57,34),(58,34),(49,35);
/*!40000 ALTER TABLE `offers_applications` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `offers_skills`
--

DROP TABLE IF EXISTS `offers_skills`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `offers_skills` (
  `offer_id` bigint unsigned NOT NULL,
  `skill_id` bigint unsigned NOT NULL,
  PRIMARY KEY (`offer_id`,`skill_id`),
  KEY `skill_id` (`skill_id`),
  CONSTRAINT `offers_skills_ibfk_1` FOREIGN KEY (`offer_id`) REFERENCES `offers` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `offers_skills_ibfk_2` FOREIGN KEY (`skill_id`) REFERENCES `skills` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `offers_skills`
--

LOCK TABLES `offers_skills` WRITE;
/*!40000 ALTER TABLE `offers_skills` DISABLE KEYS */;
INSERT INTO `offers_skills` VALUES (59,5),(61,5),(66,5),(67,5),(65,6),(61,7),(64,7),(59,8),(64,8),(65,10),(61,11),(62,11),(68,11),(60,12),(63,12),(60,14),(66,14),(68,14),(60,15),(59,16),(64,16),(66,18),(60,19),(61,19),(63,19),(65,19),(60,20),(63,20),(64,20),(68,21),(59,22),(62,22),(65,22),(66,22),(68,22),(59,23),(62,24),(66,24),(68,24);
/*!40000 ALTER TABLE `offers_skills` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `password_reset_tokens`
--

DROP TABLE IF EXISTS `password_reset_tokens`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `password_reset_tokens`
--

LOCK TABLES `password_reset_tokens` WRITE;
/*!40000 ALTER TABLE `password_reset_tokens` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_reset_tokens` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `personal_access_tokens`
--

DROP TABLE IF EXISTS `personal_access_tokens`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `personal_access_tokens` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `personal_access_tokens`
--

LOCK TABLES `personal_access_tokens` WRITE;
/*!40000 ALTER TABLE `personal_access_tokens` DISABLE KEYS */;
/*!40000 ALTER TABLE `personal_access_tokens` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `promos`
--

DROP TABLE IF EXISTS `promos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `promos` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pilote_id` bigint unsigned NOT NULL,
  `centre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'TOULOUSE',
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`),
  KEY `pilote` (`pilote_id`),
  CONSTRAINT `promos_ibfk_1` FOREIGN KEY (`pilote_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `promos`
--

LOCK TABLES `promos` WRITE;
/*!40000 ALTER TABLE `promos` DISABLE KEYS */;
INSERT INTO `promos` VALUES (2,'CPI-A2-S3E',1,'TOULOUSE'),(3,'CPI-A4-INFO',1,'TOULOUSE'),(4,'CPI-A2-INFO',1,'TOULOUSE'),(5,'Biologie-3B',1,'TOULOUSE'),(6,'Histoire-1B',13,'TOULOUSE'),(8,'Musique-3A',13,'TOULOUSE'),(9,'Arts-3A',13,'TOULOUSE'),(12,'Français-3B',12,'TOULOUSE'),(13,'Physique-1B',12,'TOULOUSE'),(15,'CPI-INFO-A5',28,'TOULOUSE'),(17,'CI-A4-BTP',1,'BLAGNAC');
/*!40000 ALTER TABLE `promos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `promos_users`
--

DROP TABLE IF EXISTS `promos_users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `promos_users` (
  `promo_id` bigint unsigned NOT NULL,
  `user_id` bigint unsigned NOT NULL,
  PRIMARY KEY (`promo_id`,`user_id`),
  KEY `fk_user_prm` (`user_id`),
  CONSTRAINT `fk_promo_usr` FOREIGN KEY (`promo_id`) REFERENCES `promos` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_user_prm` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `promos_users`
--

LOCK TABLES `promos_users` WRITE;
/*!40000 ALTER TABLE `promos_users` DISABLE KEYS */;
INSERT INTO `promos_users` VALUES (2,24),(3,27),(2,30);
/*!40000 ALTER TABLE `promos_users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `skills`
--

DROP TABLE IF EXISTS `skills`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `skills` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `skills`
--

LOCK TABLES `skills` WRITE;
/*!40000 ALTER TABLE `skills` DISABLE KEYS */;
INSERT INTO `skills` VALUES (6,'Adaptabilité'),(21,'Angular'),(11,'Autonomie'),(22,'Azure'),(25,'Bash'),(27,'C'),(26,'C++'),(23,'Cloud'),(7,'Communication'),(12,'Créativité et innovation'),(19,'CSS'),(14,'Esprit critique'),(9,'Fast learner'),(5,'Gestion de projet'),(16,'HTML'),(18,'Linux'),(10,'Organisation'),(15,'Python'),(20,'React.js'),(8,'Résolution de problèmes'),(13,'Sens des responsabilités'),(24,'shell'),(17,'SQL');
/*!40000 ALTER TABLE `skills` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user_skills`
--

DROP TABLE IF EXISTS `user_skills`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `user_skills` (
  `user_id` bigint unsigned NOT NULL,
  `skill_id` bigint unsigned NOT NULL,
  PRIMARY KEY (`user_id`,`skill_id`),
  KEY `fk_skill_sk` (`skill_id`),
  CONSTRAINT `fk_skill_sk` FOREIGN KEY (`skill_id`) REFERENCES `skills` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_user_sk` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user_skills`
--

LOCK TABLES `user_skills` WRITE;
/*!40000 ALTER TABLE `user_skills` DISABLE KEYS */;
INSERT INTO `user_skills` VALUES (27,5),(1,16),(1,17),(1,19),(27,23),(1,26),(27,26),(1,27),(27,27);
/*!40000 ALTER TABLE `user_skills` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `users` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `lname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mail` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_mail_unique` (`mail`),
  UNIQUE KEY `users_username_unique` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=45 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'Randrianaivo','Kevin','kvngideon@gmail.com','$2y$12$bKHrDaQUH9TjMgvAAfRkvOZeD1DQ4ErJHk1tGeUmSy70to2M01WIW','rkevin','Admin'),(12,'Tayrac','Thomas','thomas.tayrac@viacesi.fr','$2y$12$K.dyBWHY46ANa.lb6VAHSesvG1gWusCm7ZTtZpwukR7jiYhN3MUbG','thayrac','Pilote'),(13,'Sadaoui','Eliote','sadaoui.eliote@viacesi.fr','$2y$12$hSD2iyfYiEJLQwyouItTIO23OCk/RwXPCQEo8lcfGS872VbwJsiHe','sadastral','Pilote'),(24,'Silhol','Guilhem','auhasard@gmail.com','$2y$12$aDS.uKbId.qAJ.iU2hCn3.ZedhQqp6Y5DOSB/tamvAblbDQTHmYWK','guiguitare','Etudiant'),(26,'Doe','John','john.doe@cesi.fr','$2y$12$NSzB1n7t.gwhs9VqWzDm/e2ooG.p/ZxR.gSRw0PbIFXQU8IhJeZvy','johnDoe','Etudiant'),(27,'Hassan','Aunim','aunim.hassan@wanadoo.fr','$2y$12$R0G2vFAqhmfWvcpsF9.sheGcWAOzKGoKJNt/CG.tkCM5xv9HqAXHG','Sylent','Etudiant'),(28,'Laumond','Antoine','antoine.laumond@viacesi.fr','$2y$12$UZl//.9xGuHoX5FcU88ukOXDu3tj8mmS1HpnkxKmT1HkoYQ36qdGe','ant.laum','Pilote'),(29,'Trenton Murphy','Joyce Hoppe','orion.ratke@example.org','$2y$12$t4KOleCDmLirxOmR6.OES.FPdKM1NmEiwSNJrRRdIVHYZEH/HPQ8S','qmorissette','Etudiant'),(30,'Dr. Makenna D\'Amore III','Ms. Nicole Bahringer','dallas59@example.net','$2y$12$t4KOleCDmLirxOmR6.OES.FPdKM1NmEiwSNJrRRdIVHYZEH/HPQ8S','borer.trinity','Etudiant'),(31,'Emile Wilderman','Judd Dooley III','eliseo.sanford@example.net','$2y$12$t4KOleCDmLirxOmR6.OES.FPdKM1NmEiwSNJrRRdIVHYZEH/HPQ8S','mdonnelly','Etudiant'),(32,'Elbert Schmeler','Fermin Bednar','pgoodwin@example.org','$2y$12$t4KOleCDmLirxOmR6.OES.FPdKM1NmEiwSNJrRRdIVHYZEH/HPQ8S','kari88','Etudiant'),(33,'Ms. Leonor Senger MD','Keeley Wilderman','kshlerin.harley@example.org','$2y$12$t4KOleCDmLirxOmR6.OES.FPdKM1NmEiwSNJrRRdIVHYZEH/HPQ8S','bella39','Etudiant'),(34,'Dr. Marley Tremblay','Dr. Ed Goldner Jr.','alexys70@example.net','$2y$12$t4KOleCDmLirxOmR6.OES.FPdKM1NmEiwSNJrRRdIVHYZEH/HPQ8S','wendell37','Etudiant'),(36,'Dovie Fisher Sr.','Mohammed Ferry','ajakubowski@example.org','$2y$12$t4KOleCDmLirxOmR6.OES.FPdKM1NmEiwSNJrRRdIVHYZEH/HPQ8S','koepp.krista','Etudiant'),(37,'Ahmad Ward','Dr. Sister Kunde PhD','talon13@example.com','$2y$12$t4KOleCDmLirxOmR6.OES.FPdKM1NmEiwSNJrRRdIVHYZEH/HPQ8S','jaquan.hilpert','Etudiant'),(38,'Janelle Stiedemann DVM','Jordyn Monahan II','brooke16@example.com','$2y$12$t4KOleCDmLirxOmR6.OES.FPdKM1NmEiwSNJrRRdIVHYZEH/HPQ8S','joshuah.kunde','Etudiant'),(39,'Farrell','Carmine','kathryn.welch@example.org','$2y$12$NIAyxwVUgcbUBEviE6ohMe39y01uyWdGCxPbzqc5GgMy/BqIsEFfG','lamont.schamberger','Etudiant'),(40,'Kertzmann','Isai','jordane.schmeler@example.org','$2y$12$eh3jVt3OFCJcMNc0VFq49O9eZq3OHSegO7mxYEQFnpIqeurb6VEV2','nick.thompson','Etudiant'),(43,'Howe','Rose','baron.schinner@example.org','$2y$12$4/yK5HzJ6PK22njCxQNEfu6xhcX4g8vtalg7z9uPiQe1S7Ep.LelK','dixie28','Etudiant');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_unicode_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'IGNORE_SPACE,ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`root`@`localhost`*/ /*!50003 TRIGGER `unique_admin_before_insert` BEFORE INSERT ON `users` FOR EACH ROW BEGIN
    DECLARE admin_count INT;
    IF NEW.role = 'Admin' THEN
        SELECT COUNT(*) INTO admin_count FROM users WHERE role = 'Admin';
        IF admin_count >= 1 THEN
            SIGNAL SQLSTATE '45000' SET MESSAGE_TEXT = 'Cannot add more than one Admin role';
        END IF;
    END IF;
END */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_unicode_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'IGNORE_SPACE,ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`root`@`localhost`*/ /*!50003 TRIGGER `uunique_admin_before_insert` BEFORE INSERT ON `users` FOR EACH ROW BEGIN
    DECLARE admin_count INT;
    IF NEW.role = 'Admin' THEN
        SELECT COUNT(*) INTO admin_count FROM users WHERE role = 'Admin';
        IF admin_count >= 1 THEN
            SIGNAL SQLSTATE '45000' SET MESSAGE_TEXT = 'Cannot add more than one Admin role';
        END IF;
    END IF;
END */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_unicode_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'IGNORE_SPACE,ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`root`@`localhost`*/ /*!50003 TRIGGER `unique_admin_before_update` BEFORE UPDATE ON `users` FOR EACH ROW BEGIN
    DECLARE admin_count INT;
    IF NEW.role = 'Admin' AND OLD.role != 'Admin' THEN
        SELECT COUNT(*) INTO admin_count FROM users WHERE role = 'Admin';
        IF admin_count >= 1 THEN
            SIGNAL SQLSTATE '45000' SET MESSAGE_TEXT = 'Cannot have more than one Admin role';
        END IF;
    END IF;
END */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;

--
-- Table structure for table `waiting_user`
--

DROP TABLE IF EXISTS `waiting_user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `waiting_user` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `lname` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `fname` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `mail` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `centre` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT 'TOULOUSE',
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_mail_unique` (`mail`),
  UNIQUE KEY `users_username_unique` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=41 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `waiting_user`
--

LOCK TABLES `waiting_user` WRITE;
/*!40000 ALTER TABLE `waiting_user` DISABLE KEYS */;
/*!40000 ALTER TABLE `waiting_user` ENABLE KEYS */;
UNLOCK TABLES;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_unicode_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'IGNORE_SPACE,ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`root`@`localhost`*/ /*!50003 TRIGGER `unique_admin_before_insert_on_w_u` BEFORE INSERT ON `waiting_user` FOR EACH ROW BEGIN
    DECLARE admin_count INT;
    IF NEW.role = 'Admin' THEN
        SELECT COUNT(*) INTO admin_count FROM waiting_user WHERE role = 'Admin';
        IF admin_count >= 1 THEN
            SIGNAL SQLSTATE '45000' SET MESSAGE_TEXT = 'Cannot add more than one Admin role';
        END IF;
    END IF;
END */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_unicode_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'IGNORE_SPACE,ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`root`@`localhost`*/ /*!50003 TRIGGER `unique_admin_before_update_on_w` BEFORE UPDATE ON `waiting_user` FOR EACH ROW BEGIN
    DECLARE admin_count INT;
    IF NEW.role = 'Admin' AND OLD.role != 'Admin' THEN
        SELECT COUNT(*) INTO admin_count FROM waiting_user WHERE role = 'Admin';
        IF admin_count >= 1 THEN
            SIGNAL SQLSTATE '45000' SET MESSAGE_TEXT = 'Cannot have more than one Admin role';
        END IF;
    END IF;
END */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;

--
-- Table structure for table `wishlist`
--

DROP TABLE IF EXISTS `wishlist`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `wishlist` (
  `user_id` bigint unsigned NOT NULL,
  `offer_id` bigint unsigned NOT NULL,
  PRIMARY KEY (`user_id`,`offer_id`),
  KEY `fk_offer_ws` (`offer_id`),
  CONSTRAINT `fk_offer_ws` FOREIGN KEY (`offer_id`) REFERENCES `offers` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_user_ws` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `wishlist`
--

LOCK TABLES `wishlist` WRITE;
/*!40000 ALTER TABLE `wishlist` DISABLE KEYS */;
INSERT INTO `wishlist` VALUES (1,49);
/*!40000 ALTER TABLE `wishlist` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping events for database 'internquest_test'
--

--
-- Dumping routines for database 'internquest_test'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2024-04-15  0:18:45
