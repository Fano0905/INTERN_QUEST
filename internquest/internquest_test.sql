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
  PRIMARY KEY (`id`),
  KEY `applications_user_id_foreign` (`user_id`),
  CONSTRAINT `applications_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `applications`
--

LOCK TABLES `applications` WRITE;
/*!40000 ALTER TABLE `applications` DISABLE KEYS */;
INSERT INTO `applications` VALUES (19,'Aliquam aliquam dolorem unde voluptas odio non sed. Quia quia fuga veniam maiores. Nemo incidunt aspernatur fuga ex aut dicta deleniti in. Et nemo sit accusantium atque eum.','Quis fuga non iure. Tenetur eos et ullam veniam qui itaque. Distinctio aliquam ab consequuntur illo tempore omnis velit at. Ut nesciunt expedita qui in.',1),(21,'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus consequat elementum tellus, et egestas dolor porttitor vitae. Curabitur porta eleifend arcu, nec pharetra mi euismod vitae. Ut iaculis sapien lectus, eget auctor augue euismod eget. Quisque et massa euismod massa sagittis euismod. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae; Nunc tortor massa, dignissim imperdiet dui et, dictum tincidunt augue. Ut id blandit tortor. In eu tempus mi.  Nam ullamcorper erat augue. Proin euismod ullamcorper quam et auctor. Vestibulum sit amet fermentum nulla, non volutpat elit. Praesent at ex vitae massa faucibus volutpat. Vivamus accumsan rutrum orci, eget luctus ligula consectetur ut. Sed facilisis tincidunt arcu id ultrices. Suspendisse gravida ut tellus eget dictum. Morbi eu consequat mi.',NULL,24),(22,'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse ullamcorper eleifend nisl, ac tincidunt nisi sollicitudin sodales. Nulla gravida ultrices enim, sit amet placerat augue iaculis sit amet. Donec commodo mauris eros, non condimentum ipsum lacinia ullamcorper. In consequat tempus felis ac egestas. Duis mauris lacus, dignissim vel risus placerat, malesuada blandit nulla. Suspendisse nec orci ut nisi pellentesque volutpat non at felis. In sem urna, consequat vel luctus et, gravida eget mauris. Etiam gravida, lectus sit amet placerat elementum, nunc sem volutpat nisi, in feugiat nunc augue ullamcorper tortor. Nullam sed luctus purus, ut fermentum dui. Quisque consectetur enim leo, quis pellentesque ante iaculis non. Integer risus dolor, tempor id mauris ac, euismod suscipit risus. In egestas hendrerit consectetur. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Donec volutpat, justo ullamcorper placerat dapibus, nunc mi elementum enim, non mollis eros nunc nec dui. Donec sed velit consequat, cursus tellus quis, rhoncus mi. Donec pretium, purus tempor laoreet sodales, ex sem pretium tellus, quis pretium nibh ex ac massa.  Duis hendrerit lobortis nulla, id congue libero sodales eu. Etiam dignissim lectus quis varius ullamcorper. Interdum et malesuada fames ac ante ipsum primis in faucibus. Proin sit amet nibh commodo, fermentum leo sed, pellentesque risus. Sed aliquet, sapien et ullamcorper ornare, mi est fermentum elit, sit amet molestie nibh purus eu ex. Nullam finibus posuere pharetra. Duis lacinia massa ex. Nunc congue porta justo non hendrerit. Nullam ultricies sit amet nulla vitae sollicitudin.  Nulla ornare, nulla sit amet rhoncus faucibus, ipsum leo accumsan tortor, nec gravida tellus arcu sed nunc. In hac habitasse platea dictumst. Nam eu nisl pellentesque, imperdiet elit ac, commodo leo. Pellentesque lectus metus, pellentesque non lectus bibendum, ornare dictum risus. Mauris venenatis vulputate dui, at elementum dolor pellentesque nec. Donec porta risus a lorem molestie, et aliquam mauris lobortis. Fusce fringilla risus eget sapien lobortis convallis. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.  Morbi vel cursus ligula, quis venenatis dolor. In molestie risus lacus, quis sollicitudin justo eleifend ac. Sed volutpat tincidunt commodo. In luctus gravida lacus, sit amet luctus est placerat sit amet. Aliquam non risus non elit venenatis laoreet. Praesent sed congue ligula, eget dapibus turpis. Ut tempor ex justo. Nulla semper sagittis dolor vel facilisis. Nulla ac ornare urna. Interdum et malesuada fames ac ante ipsum primis in faucibus. Donec posuere sed velit sed accumsan.  Sed id maximus sem. Etiam vitae leo lectus. Nam et sagittis lacus, a ornare metus. Etiam finibus mauris id eleifend bibendum. Mauris nec neque turpis. Ut suscipit et leo et suscipit. Suspendisse potenti. Quisque ex mauris, laoreet ut posuere et, pulvinar sit amet neque. Praesent quis enim a metus semper ornare. Vivamus venenatis aliquam nunc, non elementum enim dictum eu. Nunc pellentesque nisi eget mi maximus, et porta orci euismod. Vestibulum blandit odio consequat, euismod sapien sit amet, sodales nisl. Sed et mauris non lacus semper dictum. Nam commodo laoreet eleifend. Maecenas at nisl sed velit facilisis placerat. Vivamus ut lacus a dolor pretium vehicula sed eu augue.  Generated 5 paragraphs, 509 words, 3402 bytes of Lorem Ipsum help@lipsum.com Privacy Policy · Privacy Preferences   freestar  freestar  freestar',NULL,27),(24,'Lorem ipsum dolor sit amet, consectetur adipiscing elit. In blandit congue pretium. Nam at sem non sapien dapibus aliquet eu vel magna. Fusce placerat sit amet nunc sit amet fermentum. Nullam molestie purus eget nisl pulvinar, nec sagittis ex scelerisque. Nunc eros sapien, vestibulum ut dui a, dictum pretium dui. Curabitur porttitor eros eget congue porta. Fusce neque urna, placerat in rhoncus sed, accumsan ut ex. Aenean tristique justo non nisl rutrum, eget tempus elit feugiat. Suspendisse suscipit efficitur tellus et viverra. Vivamus quis eleifend lorem, vel rutrum ante.  Aliquam maximus, leo ac tempor dictum, felis odio placerat mi, sit amet suscipit urna erat nec turpis. Aenean tincidunt justo ullamcorper rhoncus cursus. Quisque a lacus justo. Fusce eros sem, aliquam sed lectus a, iaculis facilisis orci. Donec ullamcorper dolor odio, non tempor felis auctor sit amet. Donec lacinia varius lorem condimentum ultricies. Vivamus non urna sit amet nulla hendrerit pellentesque in in mauris. Cras euismod nibh mauris, non dictum arcu tincidunt et. Integer feugiat mollis sollicitudin. Etiam imperdiet tincidunt dignissim. Praesent finibus enim nec commodo ullamcorper. Ut porttitor, odio non sodales suscipit, felis magna vehicula quam, quis congue mi justo sit amet augue. Praesent commodo laoreet orci a scelerisque.  Nulla semper arcu eu lorem consectetur, id ultricies felis ornare. Etiam euismod tortor at mi auctor molestie. Donec mattis nibh in magna dictum, ac lacinia dui tincidunt. Donec fermentum accumsan laoreet. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae; Proin tempus venenatis sapien sit amet viverra. Donec pretium tellus at pellentesque egestas.  Nam dignissim arcu sapien, a pellentesque mi cursus in. Aliquam tincidunt in ex vitae convallis. Sed consectetur, lorem a consequat imperdiet, eros ipsum varius massa, a euismod quam ligula a justo. Fusce scelerisque nunc mauris, sit amet vehicula augue iaculis sit amet. Donec quis maximus turpis. Nunc eget ullamcorper urna, id sollicitudin ante. In vitae elit quis mauris commodo egestas. Integer eget nunc nisl. Praesent purus velit, blandit in placerat eu, eleifend et tellus. Nulla luctus nec velit quis sollicitudin. Nunc et lacinia risus. Ut faucibus maximus eros ac lobortis. Maecenas scelerisque justo a nibh egestas, vel convallis ex pellentesque.  Duis ac suscipit magna. Donec sed magna placerat, malesuada augue in, varius enim. Curabitur vulputate, erat luctus suscipit facilisis, dui nunc consectetur dolor, consequat eleifend ex massa nec velit. Aliquam erat volutpat. Aenean sodales odio quis iaculis sagittis. Nullam aliquet, risus ac fermentum sollicitudin, arcu risus sagittis odio, sit amet consequat erat augue eget ex. Aliquam ac ex ultrices neque eleifend porta ut ac sapien. Nam libero turpis, volutpat eget sagittis quis, venenatis a dui. Sed tempor vehicula mauris, vitae sagittis orci pellentesque et. Proin auctor ac dolor sit amet vulputate. Proin volutpat dui vel nulla condimentum tempor.',NULL,1);
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
-- Table structure for table `blacklist`
--

DROP TABLE IF EXISTS `blacklist`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `blacklist` (
  `company_id` bigint unsigned NOT NULL,
  `user_id` bigint unsigned NOT NULL,
  PRIMARY KEY (`company_id`,`user_id`),
  KEY `user_id` (`user_id`),
  CONSTRAINT `blacklist_ibfk_1` FOREIGN KEY (`company_id`) REFERENCES `companies` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `blacklist_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `blacklist`
--

LOCK TABLES `blacklist` WRITE;
/*!40000 ALTER TABLE `blacklist` DISABLE KEYS */;
/*!40000 ALTER TABLE `blacklist` ENABLE KEYS */;
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
  `evaluation` decimal(3,2) unsigned zerofill DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `companies_name_unique` (`name`),
  UNIQUE KEY `area` (`area`,`id`,`name`),
  CONSTRAINT `companies_ibfk_1` FOREIGN KEY (`area`) REFERENCES `areas` (`name`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `companies`
--

LOCK TABLES `companies` WRITE;
/*!40000 ALTER TABLE `companies` DISABLE KEYS */;
INSERT INTO `companies` VALUES (2,'BOYLE AND SONS','EDUCATION','boyleandsons.com',NULL),(3,'BLICK VON AND WEHNER','RECHERCHES ET DEVELOPPEMENT','blick-vonandwehner.com',NULL),(4,'HARTMANN GROUP','ART ET CULTURE','hartmanngroup.com',NULL),(5,'MAYERT LLC','ENVIRONNEMENT','mayertllc.com',NULL),(6,'LUEILWITZ-MUELLER','DROIT','lueilwitz-mueller.com',NULL),(7,'VONRUEDEN ANDERSON AND WILLMS','ENVIRONNEMENT','vonrueden,andersonandwillms.com',NULL),(8,'WINDLER-JONES','TOURISME','windler-jones.com',NULL),(9,'HACKETT AND SONS','ENVIRONNEMENT','hackettandsons.com',NULL),(10,'LUETTGEN GLEASON AND EICHMANN','AEROSPATIAL','luettgen-gleasonandeichmann.com',NULL),(11,'DICKI MARKS AND DARE','VENTE','dicki-marksanddare.com',NULL);
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
INSERT INTO `companies_locations` VALUES (2,28),(3,29),(4,30),(5,31),(6,32),(7,33),(8,34),(9,35),(10,36),(11,37);
/*!40000 ALTER TABLE `companies_locations` ENABLE KEYS */;
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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `evaluations`
--

LOCK TABLES `evaluations` WRITE;
/*!40000 ALTER TABLE `evaluations` DISABLE KEYS */;
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
) ENGINE=InnoDB AUTO_INCREMENT=39 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `locations`
--

LOCK TABLES `locations` WRITE;
/*!40000 ALTER TABLE `locations` DISABLE KEYS */;
INSERT INTO `locations` VALUES (1,'31670','LABEGE','395 Rue du colombier'),(2,'92000','NANTERRE','93 Boulevard St Denis'),(7,'31700','BLAGNAC','2 RPT EMILE DEWOITINE'),(8,'61286','JACQUOT','8, chemin William Potier'),(9,'44169','RIBEIRO','181, chemin Marion'),(10,'33152','LEGRAND','9, rue Adrienne Voisin'),(11,'39387','VIDAL','81, boulevard de Torres'),(12,'95489','MENDESBOEUF','8, boulevard Marcelle Lemaitre\n68896 Thierry'),(13,'87730','BECKER-SUR-MICHEL','435, rue Gillet\n02111 Guillot'),(14,'03355','HUETVILLE','chemin de Potier\n38771 Vasseur'),(15,'54113','DIDIER-SUR-FERREIRA','4, place Bazin\n52247 Coste'),(16,'52634','ROCHER','83, avenue de Benoit\n93510 Bouvet'),(17,'75029','SCHMITT','1, rue Joubert\n61223 Torres-la-Forêt'),(18,'45399','CARPENTIER','rue Alix Ferrand\n74068 Lefevre-la-Forêt'),(19,'54716','FAURE-SUR-GRENIER','place Blanchet\n23036 Moulin'),(20,'78119','JEAN','6, impasse Pichon\n26190 De Sousa'),(21,'79137','NAVARRO','22, rue Audrey Boutin\n01380 Evrarddan'),(22,'21153','LELIEVRE','44, rue Leroux\n70117 Masson'),(23,'45916','LAURENT','7, chemin Denise Marchal\n90791 Martinez-sur-Schneider'),(24,'08769','BUISSON','impasse Simone Lecoq\n47442 PierreVille'),(25,'37841','RODRIGUEZ','64, impasse de Gautier\n20991 Da Costa'),(26,'00669','GIMENEZ','95, chemin Richard Mallet\n08701 Moulindan'),(27,'33967','FRANCOIS','6, impasse Richard Lamy\n85675 FoucherBourg'),(28,'06114','JOUBERT','4, place Faure\n09286 Legrand'),(29,'02250','HOARAUVILLE','78, rue Chauveau\n51229 Legrand'),(30,'31188','JULIEN-LA-FORêT','93, chemin Breton\n58216 Didier-sur-Dupuis'),(31,'18336','GUILLET-SUR-DENIS','37, chemin Mendes\n03676 Pelletiernec'),(32,'88936','LECLERC','721, place Marchand\n97889 Didier-les-Bains'),(33,'74694','WEISS','29, rue de Vasseur\n72052 Rolland-sur-Martel'),(34,'13573','ROSSI','70, rue Alfred Tanguy\n79812 Guyon'),(35,'86687','CHEVALLIER','550, avenue de Marion\n40858 Jacques-sur-Garnier'),(36,'70365','ANTOINE-SUR-DUMAS','impasse de Collet\n68639 Mahe-sur-Lacroix'),(37,'36132','GERARD','22, impasse de De Oliveira\n12583 Germainboeuf'),(38,'31000','TOULOUSE','15 Place Wilson');
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
INSERT INTO `offer_promos` VALUES (38,2),(38,3);
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
) ENGINE=InnoDB AUTO_INCREMENT=49 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `offers`
--

LOCK TABLES `offers` WRITE;
/*!40000 ALTER TABLE `offers` DISABLE KEYS */;
INSERT INTO `offers` VALUES (25,'Continuous Mining Machine Operator','LEGRAND','6 mois',825,'04/04/2024',3,NULL,'Eos id quo aut amet asperiores tempora. Est non aspernatur alias deleniti nisi impedit consequatur. Laboriosam sed est vitae aliquid quos quidem. Iure debitis est dolorem necessitatibus ex quo consequatur. Est consequuntur illum necessitatibus itaque ullam voluptatem dolores. Eveniet qui id qui soluta aliquid. Quaerat soluta ipsa aspernatur qui tempora. Autem distinctio nemo minus expedita nam. Beatae ipsam reprehenderit sequi. Expedita reiciendis expedita aut ipsum animi pariatur inventore. Inventore omnis molestias est sed exercitationem delectus quia incidunt. Sint eligendi quos dolores voluptatem. Fuga repudiandae sit ut. Impedit explicabo ut et. Libero blanditiis ducimus magni dolorem. Repellendus aut repudiandae beatae possimus. Saepe ut voluptatem omnis. Harum qui deleniti adipisci ut tempora qui. Saepe reprehenderit qui repellat ut quis aut id. Accusantium est harum cum natus enim magni dicta. Molestiae ipsa expedita aperiam nihil aut. Molestiae consequatur maiores quia sit aut optio ea. Doloribus dolores incidunt et. Hic omnis ex voluptatem. Deserunt dolor commodi a. Quia a cum dolores molestiae autem et et. Laborum temporibus sed odio et eum. Doloribus omnis in omnis id deleniti dolorem. Earum repellat officiis vitae perferendis consequuntur nobis hic. Corporis dolorem quas delectus officia adipisci. Illum numquam nemo ex quae. Sunt praesentium voluptatem delectus facere commodi. Odio ut incidunt voluptas cupiditate eaque autem esse veritatis. Eius quo enim est excepturi. Quisquam dolorem porro quasi numquam corrupti quisquam. Nostrum et possimus natus tempore laboriosam explicabo. Ipsam consequatur et dolor dicta eligendi. Quis pariatur dolore minus. Omnis id vitae at perspiciatis aut. Ut labore consequuntur quae hic est rerum. Et accusamus nihil deserunt corporis aperiam. Velit voluptatibus repellat tempora ipsum nobis. Soluta iste odio molestiae voluptas enim incidunt ut. Dolores quia facilis neque aut exercitationem.',9),(26,'Financial Services Sales Agent','LAURENT','8 mois',828,'04/04/2024',17,NULL,'Esse aspernatur autem sint aut sunt labore quia. Sint ut voluptatum possimus consequatur sit. Omnis numquam atque aliquid qui in illo. Aut eum alias ex et nam explicabo. Totam quo laudantium perspiciatis aut dolorem. Omnis consequuntur vel hic ipsum. Dolor sint autem cupiditate modi maxime. Qui sint non qui. Eum perferendis optio inventore id nemo quibusdam. Cum numquam molestiae distinctio consequatur sed odit. Provident qui ad nobis sit similique. Voluptatem saepe deleniti omnis accusamus inventore nam. Fugiat fugiat in molestiae enim accusantium alias. Ratione id nesciunt dolores quisquam sed autem labore. Soluta eius fugit eum minus qui. Velit consequatur ut eum ipsum qui a odio quam. Odio in quae dolor aut in velit. Quasi laboriosam sed dolor architecto ut eveniet. Ut consectetur qui nesciunt error voluptatibus. Est repellat enim fuga voluptatem qui sunt velit. Asperiores sunt enim et praesentium eligendi sit consequuntur pariatur. A molestiae qui in ullam iure. Neque sint autem vero praesentium omnis aut. Est qui repudiandae et labore. Rerum quasi omnis sunt accusamus eaque molestiae autem. Possimus quia consequatur veniam eos minus ullam asperiores. Laborum temporibus dolore temporibus repellendus eos et. Dolorem aut similique quibusdam id. Quia in praesentium explicabo qui ut quo. Vitae voluptate aut totam nesciunt sed omnis ea vel. Nam sint incidunt reprehenderit dolorem accusantium sint nesciunt. Molestias autem nam ipsam necessitatibus exercitationem velit voluptatibus. In placeat distinctio quisquam ut illum. Maxime minima nostrum eveniet sit occaecati beatae non. Laudantium odit et a omnis. Minus vel odio necessitatibus eius maiores. Consectetur rerum et alias rem. Est totam est est vero doloremque vero ut iure. Qui repudiandae consequatur ut commodi aut dolorem est. Aut molestias et id reprehenderit esse aspernatur.',4),(27,'Clinical School Psychologist','LAURENT','4 mois',987,'04/04/2024',4,NULL,'Quaerat fugit perferendis nihil nam. Expedita alias eos molestias maxime velit ducimus qui. Blanditiis eveniet labore esse ex et. Esse eaque modi consequatur voluptatibus rerum hic consequatur. Adipisci atque provident pariatur et assumenda. Enim aut provident repudiandae beatae ea enim voluptate. Omnis dolorem autem quia aut qui inventore consequatur. Cumque illum in voluptate qui et. Non corporis iure totam omnis. Et sunt nobis sed et. Accusamus voluptatibus exercitationem rem. Quisquam reiciendis ab ad dicta qui. Blanditiis neque porro ullam voluptatem doloremque nemo. Pariatur aspernatur et nesciunt quibusdam occaecati. Doloribus non vel repellat veritatis laudantium. Accusantium exercitationem corrupti voluptas. Cupiditate accusamus repellat aut vel. Et dolorem ad ipsum qui voluptas. Eius fugit aut repudiandae ut. Est ipsum quibusdam et eos quia nihil architecto. Temporibus earum ut voluptate neque nihil est accusamus. Molestias reiciendis eaque exercitationem sunt. Omnis itaque rerum asperiores odit sequi. Error facere qui non. Voluptates eligendi necessitatibus deserunt ex. Voluptatibus et soluta reprehenderit voluptate corrupti facere. Nobis quibusdam ut pariatur alias exercitationem molestiae. Molestiae corrupti cupiditate tenetur officia sit rerum. Dolorem facilis neque ad aliquam. Nesciunt hic et aut pariatur. Vel voluptatibus et ratione et neque debitis numquam. Voluptas iste eligendi fuga aut perspiciatis assumenda. Labore sit odit ipsa minus sed aspernatur aut corrupti. Dicta aspernatur incidunt delectus quos autem ab. Rem harum pariatur rerum vel et. Quia quas quasi impedit dolores saepe qui. Neque alias reprehenderit eaque iusto sit. Explicabo consequatur totam consectetur libero doloremque et quam. Minima in facilis est corrupti. Aut velit ad impedit numquam accusantium laudantium. Harum nam animi soluta incidunt. Quod minima consequatur repellat et accusantium cupiditate quibusdam. Beatae sint tenetur saepe in et.',2),(28,'Tile Setter OR Marble Setter','VIDAL','4 mois',1103,'04/04/2024',5,NULL,'Velit cumque consectetur quisquam dolores quo minus porro. Consequatur in et laborum sint totam laboriosam. Aperiam quia numquam quaerat culpa error eius. Cumque iusto voluptates modi facere est sunt voluptas. Pariatur culpa maxime eos fugiat non odio reiciendis. Accusamus provident exercitationem nobis numquam voluptas nihil sit. Nemo molestias dolor ut et velit doloribus. Illum ratione molestiae ab et. Esse exercitationem dolores nihil facilis. Magnam fuga et autem omnis perferendis et assumenda. Iusto et eum voluptatem velit vitae. Delectus suscipit sapiente vel ad. Magnam voluptatem ratione ratione. Ea est molestiae fugit minima. Dicta modi dignissimos et facere deserunt pariatur. Similique accusamus cumque sed qui mollitia tenetur. Voluptatem qui magni sunt. Autem eaque adipisci enim laborum. Deserunt maiores quo animi iure minus. Velit id est ipsa eaque reiciendis sunt. Ipsa voluptate exercitationem molestiae et. Est et culpa est iusto et. Molestias vitae molestiae quia magnam saepe est dolor eveniet. Ut minus esse nobis fugiat cumque. Est nostrum commodi porro. Provident facilis sint possimus aliquam deleniti molestiae. Voluptates dignissimos natus dolor omnis voluptas rerum cum. Repudiandae sed dignissimos est asperiores. Necessitatibus quam expedita doloremque nisi et et. Nesciunt nam ut et provident. Iusto ut nostrum corporis voluptas molestias nostrum repellendus. Quia quidem cumque nam aut eos sequi expedita suscipit. Eos sint enim et voluptatem consequatur occaecati nulla. Nemo tempore explicabo ducimus autem nihil non. Doloribus voluptatibus est fugit aspernatur. Omnis rerum dicta neque quia distinctio. Dolores quam qui architecto eaque. Et illo vel eligendi pariatur id. Labore sed laudantium qui omnis. Voluptas voluptatem quae voluptas sunt. Repudiandae consequatur distinctio mollitia in minima rerum est. Consectetur et quia odio debitis quidem et. Fugiat cumque laudantium rem. Dolores omnis aut praesentium ad aliquam sed.',3),(29,'Human Resources Assistant','LAURENT','2 mois',742,'04/04/2024',14,NULL,'Sunt soluta atque qui quia adipisci. Eligendi dolorem impedit molestiae sit repudiandae dignissimos. Et reprehenderit illum quos quis. Voluptatem ipsam atque modi voluptas non. Illo nihil necessitatibus officiis quis. Autem natus dolor fugiat facere. Molestiae sed omnis doloribus qui ipsum eaque. Natus consequatur ut consectetur aliquid adipisci voluptate eum consequuntur. Voluptatem quis quas sit velit est. Sit in culpa sint non fugit. Est totam non sapiente commodi. Repudiandae animi in molestias corporis repellendus. Aliquid odio vero facilis autem aliquam temporibus id voluptas. Voluptatem omnis ipsa sequi aspernatur. Ut sit exercitationem et quod iure magni. Et temporibus exercitationem assumenda perspiciatis. Quia odio iusto eos laboriosam facere assumenda tenetur laborum. Et veritatis eius voluptas impedit. Cupiditate ad et id inventore. Enim voluptas eligendi possimus harum autem quasi laudantium. Ratione non asperiores praesentium recusandae voluptatem dignissimos vel. Assumenda similique necessitatibus exercitationem fugiat aut. Quasi beatae eos voluptatem qui id voluptatibus. Pariatur facilis molestiae tenetur qui. Et labore sed quis dignissimos sed et. Fugit autem error et vel. Sequi quam id animi placeat. Est itaque soluta quisquam. Optio tempore quasi quia ut ipsum. Atque accusamus libero sint non. Consequatur aspernatur animi dignissimos maiores. Doloremque architecto ut architecto corporis dolor. Necessitatibus quam sit et voluptatibus. Tempore voluptas libero possimus veritatis minus sed asperiores. Quia labore assumenda animi facilis labore ut. Nihil natus voluptatem ut veniam soluta recusandae architecto. Sit dolores quis quis est maxime consequatur at. Deserunt vel occaecati aspernatur exercitationem et. Exercitationem maxime provident voluptas aliquam et natus veniam voluptatem. Est et est exercitationem cupiditate voluptatem ea. Rerum eum et suscipit vel.',6),(30,'Command Control Center Specialist','TOULOUSE','4 mois',713,'04/04/2024',20,NULL,'Eum ut explicabo voluptatem eum et odit cupiditate corporis. Id sint voluptatem nihil ea nulla dolorem facere aliquid. Maxime ut ut praesentium deleniti sunt. Ab unde sed veniam. Labore sit sint commodi. Pariatur nihil quibusdam ducimus suscipit adipisci voluptatum. Eum a aliquid omnis harum. Voluptas et qui doloribus officiis sunt ab quidem molestias. Velit cum voluptas accusantium asperiores. Quos impedit et odit id maxime aut maxime impedit. Modi voluptatem minima illo sit dolor neque est. Qui placeat aut dolores voluptatem et delectus accusantium. Aperiam animi vero doloremque. Praesentium officiis et ipsum. Fuga possimus aliquid ducimus sed odit cupiditate dolorem. Iste minima est facere sapiente reiciendis error omnis. Consequuntur quia eaque earum sit veniam. Ut omnis optio quam aut. Veniam non eveniet et est asperiores. Delectus sint voluptatem delectus necessitatibus enim tempore perferendis. Ad hic nemo sed quis quod aut quidem voluptatem. Sunt repudiandae occaecati modi non quisquam. Odit rerum minima quae autem distinctio nesciunt sunt. Quam fugiat nihil corrupti quis. Asperiores tempore aliquid hic ut nihil atque nobis. Sint eligendi inventore aspernatur velit qui. Facere vero dolores est ducimus est inventore. Et possimus saepe voluptas ducimus aut. Aut illo quas necessitatibus quis. Omnis rerum sint consectetur quo aut. Omnis rerum architecto explicabo deleniti in culpa consequatur odio. Adipisci in voluptas velit ut aut officia consequatur sed. Aut esse in quo sed quasi iure. Temporibus quos debitis fugit et molestiae quis. Est et aperiam asperiores dignissimos vel. Aperiam mollitia id incidunt aliquam. Totam numquam libero distinctio labore quae odio deserunt laboriosam. Esse omnis aut necessitatibus ullam suscipit doloribus deserunt. Aut blanditiis dolores sit numquam vel a repudiandae.',2),(31,'Flight Attendant','FRANCOIS','6 mois',825,'04/04/2024',17,NULL,'Minus dolores inventore similique officiis nostrum. Minima porro ipsum aut rerum. Nisi placeat ullam facere exercitationem animi aliquam aperiam. Et consectetur velit est voluptas quia quo repellendus ducimus. Nesciunt aut ratione corporis iusto molestiae. Placeat odit tenetur ad dolore magnam. Ut dolorem consequatur blanditiis voluptate id excepturi maxime. Velit iusto dolor qui dolor dignissimos et. Non numquam dolorem quod ab magni quia. Molestias neque soluta veniam eligendi voluptatem eligendi. Dolorem et libero asperiores id enim explicabo. Eum ea adipisci voluptatibus sit facere. Aut aut et est sit officia voluptatem perspiciatis. Esse delectus consectetur dolor temporibus sint. Harum ab fugit ex et esse beatae. Eaque et voluptatibus atque culpa aut porro unde. Ullam laborum qui ut officia non blanditiis. Maxime magnam ut cum amet ipsa nisi eos. Fuga sint explicabo id. Accusantium accusantium qui eos voluptas est. Est labore beatae veritatis expedita officia eos. Quaerat illum inventore voluptatem. Omnis vel expedita veniam aut quibusdam et ut velit. Nihil tempora et nihil qui omnis. Consequatur eum amet et voluptatem. Iure molestias eos aliquid sed placeat aut. Temporibus voluptate minima cum magnam qui. Corporis quia dignissimos aut. Dolorem modi delectus dolor consequatur aut esse debitis. Omnis at sed optio ut sequi. Reprehenderit est neque in sint repellendus beatae. Sint omnis dolorem nesciunt perferendis consequuntur voluptatem est. Accusamus vel consequatur sed totam quo ut aut excepturi. Harum ducimus ducimus tempore velit tempore. Blanditiis labore voluptas velit laudantium dolorem ipsam. Reprehenderit ad placeat rerum est deleniti error non. Fugit non ut doloremque. Vel voluptatum esse reiciendis ex. Omnis dolorem nisi voluptas omnis dolor est.',2),(33,'DEVELOPPEUR C++','BLAGNAC','2 mois',1200,'23/05/2024',15,NULL,'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam fringilla est quam, a ultrices massa ullamcorper pretium. Fusce vulputate ex at elit blandit, a scelerisque ex porta. Maecenas finibus libero et finibus vestibulum. Nunc congue congue mattis. Etiam id diam feugiat, ultricies orci vel, sollicitudin tortor. Duis euismod ante vel purus sollicitudin, a congue nisl fermentum. Sed eleifend lorem velit, vel lobortis dolor ullamcorper sit amet. Aenean commodo mauris at augue feugiat fringilla. Maecenas sit amet erat eu risus consequat vestibulum et et justo. Integer cursus dui id consectetur varius. Quisque sit amet faucibus ipsum.\r\n\r\nSed accumsan sapien ullamcorper dolor aliquet molestie. Vestibulum vel consectetur metus. Pellentesque consequat tincidunt dictum. Phasellus vel augue felis. Nullam consequat fringilla quam, sit amet commodo eros rutrum nec. Donec ullamcorper leo mauris, eu interdum massa sodales a. Cras in ullamcorper risus. Sed quis posuere lorem. Nulla feugiat ligula a nisi efficitur, ac maximus metus rutrum. Donec tristique molestie maximus. Fusce ultricies viverra nisl, quis hendrerit orci ullamcorper ut. Aenean ut purus ornare, vulputate massa quis, ullamcorper sapien. Nam vitae mauris non nulla viverra rutrum id eu mauris. Praesent tincidunt ipsum metus, eleifend vehicula felis volutpat sit amet. Ut sodales nibh nec nulla feugiat, quis molestie leo tristique. Cras rhoncus vel ipsum a efficitur.\r\n\r\nInteger semper quis enim vel accumsan. Phasellus varius rhoncus lectus in efficitur. Morbi at lorem nibh. Donec dignissim elementum enim, non rutrum ex gravida ac. Suspendisse ac semper velit. Praesent non venenatis sapien, nec pulvinar augue. Phasellus id magna id diam semper aliquam. Curabitur tristique et nunc sit amet venenatis. Proin justo sem, tincidunt ac risus ac, vehicula sagittis nisl. Curabitur fermentum eu dui accumsan viverra. Etiam eu nunc in eros pharetra laoreet quis eget ipsum.\r\n\r\nClass aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Phasellus sit amet nibh sapien. Phasellus tincidunt lorem eu justo consectetur, vel vehicula lorem mollis. Duis ante sapien, varius eget metus eu, euismod luctus justo. Fusce pretium neque et sapien pulvinar, nec mattis nulla malesuada. Mauris convallis urna at turpis cursus bibendum. Integer eget sapien a orci congue cursus sed sed metus. Ut finibus rutrum orci vitae sodales. Nam eu turpis vel est lacinia eleifend. Phasellus a porta dui. Nam facilisis lacinia lacinia. Aliquam non dui libero.\r\n\r\nPellentesque a porta elit, gravida sodales erat. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Vivamus sagittis ullamcorper massa, ut varius neque venenatis quis. Aliquam erat volutpat. Fusce lorem mi, tincidunt in ipsum sed, maximus blandit lectus. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Fusce nisi diam, posuere ut euismod vel, rhoncus vitae odio. Maecenas lobortis maximus elit, ut tincidunt urna luctus sed. Maecenas efficitur justo ac felis imperdiet, quis malesuada dolor pretium. Quisque nec ornare dui. Donec eget tellus sit amet nisl varius sollicitudin nec sit amet dui. Aliquam erat volutpat. Etiam varius placerat mi pharetra tincidunt. Ut non aliquam dui. Curabitur dignissim auctor nunc non suscipit. Quisque lorem massa, laoreet a lorem nec, egestas porttitor dui.',4),(34,'DEVELOPPEUR C++','BLAGNAC','2 mois',1200,'23/05/2024',15,NULL,'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam fringilla est quam, a ultrices massa ullamcorper pretium. Fusce vulputate ex at elit blandit, a scelerisque ex porta. Maecenas finibus libero et finibus vestibulum. Nunc congue congue mattis. Etiam id diam feugiat, ultricies orci vel, sollicitudin tortor. Duis euismod ante vel purus sollicitudin, a congue nisl fermentum. Sed eleifend lorem velit, vel lobortis dolor ullamcorper sit amet. Aenean commodo mauris at augue feugiat fringilla. Maecenas sit amet erat eu risus consequat vestibulum et et justo. Integer cursus dui id consectetur varius. Quisque sit amet faucibus ipsum.\r\n\r\nSed accumsan sapien ullamcorper dolor aliquet molestie. Vestibulum vel consectetur metus. Pellentesque consequat tincidunt dictum. Phasellus vel augue felis. Nullam consequat fringilla quam, sit amet commodo eros rutrum nec. Donec ullamcorper leo mauris, eu interdum massa sodales a. Cras in ullamcorper risus. Sed quis posuere lorem. Nulla feugiat ligula a nisi efficitur, ac maximus metus rutrum. Donec tristique molestie maximus. Fusce ultricies viverra nisl, quis hendrerit orci ullamcorper ut. Aenean ut purus ornare, vulputate massa quis, ullamcorper sapien. Nam vitae mauris non nulla viverra rutrum id eu mauris. Praesent tincidunt ipsum metus, eleifend vehicula felis volutpat sit amet. Ut sodales nibh nec nulla feugiat, quis molestie leo tristique. Cras rhoncus vel ipsum a efficitur.\r\n\r\nInteger semper quis enim vel accumsan. Phasellus varius rhoncus lectus in efficitur. Morbi at lorem nibh. Donec dignissim elementum enim, non rutrum ex gravida ac. Suspendisse ac semper velit. Praesent non venenatis sapien, nec pulvinar augue. Phasellus id magna id diam semper aliquam. Curabitur tristique et nunc sit amet venenatis. Proin justo sem, tincidunt ac risus ac, vehicula sagittis nisl. Curabitur fermentum eu dui accumsan viverra. Etiam eu nunc in eros pharetra laoreet quis eget ipsum.\r\n\r\nClass aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Phasellus sit amet nibh sapien. Phasellus tincidunt lorem eu justo consectetur, vel vehicula lorem mollis. Duis ante sapien, varius eget metus eu, euismod luctus justo. Fusce pretium neque et sapien pulvinar, nec mattis nulla malesuada. Mauris convallis urna at turpis cursus bibendum. Integer eget sapien a orci congue cursus sed sed metus. Ut finibus rutrum orci vitae sodales. Nam eu turpis vel est lacinia eleifend. Phasellus a porta dui. Nam facilisis lacinia lacinia. Aliquam non dui libero.\r\n\r\nPellentesque a porta elit, gravida sodales erat. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Vivamus sagittis ullamcorper massa, ut varius neque venenatis quis. Aliquam erat volutpat. Fusce lorem mi, tincidunt in ipsum sed, maximus blandit lectus. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Fusce nisi diam, posuere ut euismod vel, rhoncus vitae odio. Maecenas lobortis maximus elit, ut tincidunt urna luctus sed. Maecenas efficitur justo ac felis imperdiet, quis malesuada dolor pretium. Quisque nec ornare dui. Donec eget tellus sit amet nisl varius sollicitudin nec sit amet dui. Aliquam erat volutpat. Etiam varius placerat mi pharetra tincidunt. Ut non aliquam dui. Curabitur dignissim auctor nunc non suscipit. Quisque lorem massa, laoreet a lorem nec, egestas porttitor dui.',4),(35,'DEVELOPPEUR C++','LABEGE','6 mois',1200,'23/05/2024',15,NULL,'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam fringilla est quam, a ultrices massa ullamcorper pretium. Fusce vulputate ex at elit blandit, a scelerisque ex porta. Maecenas finibus libero et finibus vestibulum. Nunc congue congue mattis. Etiam id diam feugiat, ultricies orci vel, sollicitudin tortor. Duis euismod ante vel purus sollicitudin, a congue nisl fermentum. Sed eleifend lorem velit, vel lobortis dolor ullamcorper sit amet. Aenean commodo mauris at augue feugiat fringilla. Maecenas sit amet erat eu risus consequat vestibulum et et justo. Integer cursus dui id consectetur varius. Quisque sit amet faucibus ipsum.\r\n\r\nSed accumsan sapien ullamcorper dolor aliquet molestie. Vestibulum vel consectetur metus. Pellentesque consequat tincidunt dictum. Phasellus vel augue felis. Nullam consequat fringilla quam, sit amet commodo eros rutrum nec. Donec ullamcorper leo mauris, eu interdum massa sodales a. Cras in ullamcorper risus. Sed quis posuere lorem. Nulla feugiat ligula a nisi efficitur, ac maximus metus rutrum. Donec tristique molestie maximus. Fusce ultricies viverra nisl, quis hendrerit orci ullamcorper ut. Aenean ut purus ornare, vulputate massa quis, ullamcorper sapien. Nam vitae mauris non nulla viverra rutrum id eu mauris. Praesent tincidunt ipsum metus, eleifend vehicula felis volutpat sit amet. Ut sodales nibh nec nulla feugiat, quis molestie leo tristique. Cras rhoncus vel ipsum a efficitur.\r\n\r\nInteger semper quis enim vel accumsan. Phasellus varius rhoncus lectus in efficitur. Morbi at lorem nibh. Donec dignissim elementum enim, non rutrum ex gravida ac. Suspendisse ac semper velit. Praesent non venenatis sapien, nec pulvinar augue. Phasellus id magna id diam semper aliquam. Curabitur tristique et nunc sit amet venenatis. Proin justo sem, tincidunt ac risus ac, vehicula sagittis nisl. Curabitur fermentum eu dui accumsan viverra. Etiam eu nunc in eros pharetra laoreet quis eget ipsum.\r\n\r\nClass aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Phasellus sit amet nibh sapien. Phasellus tincidunt lorem eu justo consectetur, vel vehicula lorem mollis. Duis ante sapien, varius eget metus eu, euismod luctus justo. Fusce pretium neque et sapien pulvinar, nec mattis nulla malesuada. Mauris convallis urna at turpis cursus bibendum. Integer eget sapien a orci congue cursus sed sed metus. Ut finibus rutrum orci vitae sodales. Nam eu turpis vel est lacinia eleifend. Phasellus a porta dui. Nam facilisis lacinia lacinia. Aliquam non dui libero.\r\n\r\nPellentesque a porta elit, gravida sodales erat. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Vivamus sagittis ullamcorper massa, ut varius neque venenatis quis. Aliquam erat volutpat. Fusce lorem mi, tincidunt in ipsum sed, maximus blandit lectus. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Fusce nisi diam, posuere ut euismod vel, rhoncus vitae odio. Maecenas lobortis maximus elit, ut tincidunt urna luctus sed. Maecenas efficitur justo ac felis imperdiet, quis malesuada dolor pretium. Quisque nec ornare dui. Donec eget tellus sit amet nisl varius sollicitudin nec sit amet dui. Aliquam erat volutpat. Etiam varius placerat mi pharetra tincidunt. Ut non aliquam dui. Curabitur dignissim auctor nunc non suscipit. Quisque lorem massa, laoreet a lorem nec, egestas porttitor dui.',3),(36,'DEVELOPPEUR C++','LABEGE','6 mois',1200,'23/05/2024',15,NULL,'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam fringilla est quam, a ultrices massa ullamcorper pretium. Fusce vulputate ex at elit blandit, a scelerisque ex porta. Maecenas finibus libero et finibus vestibulum. Nunc congue congue mattis. Etiam id diam feugiat, ultricies orci vel, sollicitudin tortor. Duis euismod ante vel purus sollicitudin, a congue nisl fermentum. Sed eleifend lorem velit, vel lobortis dolor ullamcorper sit amet. Aenean commodo mauris at augue feugiat fringilla. Maecenas sit amet erat eu risus consequat vestibulum et et justo. Integer cursus dui id consectetur varius. Quisque sit amet faucibus ipsum.\r\n\r\nSed accumsan sapien ullamcorper dolor aliquet molestie. Vestibulum vel consectetur metus. Pellentesque consequat tincidunt dictum. Phasellus vel augue felis. Nullam consequat fringilla quam, sit amet commodo eros rutrum nec. Donec ullamcorper leo mauris, eu interdum massa sodales a. Cras in ullamcorper risus. Sed quis posuere lorem. Nulla feugiat ligula a nisi efficitur, ac maximus metus rutrum. Donec tristique molestie maximus. Fusce ultricies viverra nisl, quis hendrerit orci ullamcorper ut. Aenean ut purus ornare, vulputate massa quis, ullamcorper sapien. Nam vitae mauris non nulla viverra rutrum id eu mauris. Praesent tincidunt ipsum metus, eleifend vehicula felis volutpat sit amet. Ut sodales nibh nec nulla feugiat, quis molestie leo tristique. Cras rhoncus vel ipsum a efficitur.\r\n\r\nInteger semper quis enim vel accumsan. Phasellus varius rhoncus lectus in efficitur. Morbi at lorem nibh. Donec dignissim elementum enim, non rutrum ex gravida ac. Suspendisse ac semper velit. Praesent non venenatis sapien, nec pulvinar augue. Phasellus id magna id diam semper aliquam. Curabitur tristique et nunc sit amet venenatis. Proin justo sem, tincidunt ac risus ac, vehicula sagittis nisl. Curabitur fermentum eu dui accumsan viverra. Etiam eu nunc in eros pharetra laoreet quis eget ipsum.\r\n\r\nClass aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Phasellus sit amet nibh sapien. Phasellus tincidunt lorem eu justo consectetur, vel vehicula lorem mollis. Duis ante sapien, varius eget metus eu, euismod luctus justo. Fusce pretium neque et sapien pulvinar, nec mattis nulla malesuada. Mauris convallis urna at turpis cursus bibendum. Integer eget sapien a orci congue cursus sed sed metus. Ut finibus rutrum orci vitae sodales. Nam eu turpis vel est lacinia eleifend. Phasellus a porta dui. Nam facilisis lacinia lacinia. Aliquam non dui libero.\r\n\r\nPellentesque a porta elit, gravida sodales erat. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Vivamus sagittis ullamcorper massa, ut varius neque venenatis quis. Aliquam erat volutpat. Fusce lorem mi, tincidunt in ipsum sed, maximus blandit lectus. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Fusce nisi diam, posuere ut euismod vel, rhoncus vitae odio. Maecenas lobortis maximus elit, ut tincidunt urna luctus sed. Maecenas efficitur justo ac felis imperdiet, quis malesuada dolor pretium. Quisque nec ornare dui. Donec eget tellus sit amet nisl varius sollicitudin nec sit amet dui. Aliquam erat volutpat. Etiam varius placerat mi pharetra tincidunt. Ut non aliquam dui. Curabitur dignissim auctor nunc non suscipit. Quisque lorem massa, laoreet a lorem nec, egestas porttitor dui.',3),(37,'DEVELOPPEUR C++','LABEGE','6 mois',1200,'23/05/2024',15,NULL,'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam fringilla est quam, a ultrices massa ullamcorper pretium. Fusce vulputate ex at elit blandit, a scelerisque ex porta. Maecenas finibus libero et finibus vestibulum. Nunc congue congue mattis. Etiam id diam feugiat, ultricies orci vel, sollicitudin tortor. Duis euismod ante vel purus sollicitudin, a congue nisl fermentum. Sed eleifend lorem velit, vel lobortis dolor ullamcorper sit amet. Aenean commodo mauris at augue feugiat fringilla. Maecenas sit amet erat eu risus consequat vestibulum et et justo. Integer cursus dui id consectetur varius. Quisque sit amet faucibus ipsum.\r\n\r\nSed accumsan sapien ullamcorper dolor aliquet molestie. Vestibulum vel consectetur metus. Pellentesque consequat tincidunt dictum. Phasellus vel augue felis. Nullam consequat fringilla quam, sit amet commodo eros rutrum nec. Donec ullamcorper leo mauris, eu interdum massa sodales a. Cras in ullamcorper risus. Sed quis posuere lorem. Nulla feugiat ligula a nisi efficitur, ac maximus metus rutrum. Donec tristique molestie maximus. Fusce ultricies viverra nisl, quis hendrerit orci ullamcorper ut. Aenean ut purus ornare, vulputate massa quis, ullamcorper sapien. Nam vitae mauris non nulla viverra rutrum id eu mauris. Praesent tincidunt ipsum metus, eleifend vehicula felis volutpat sit amet. Ut sodales nibh nec nulla feugiat, quis molestie leo tristique. Cras rhoncus vel ipsum a efficitur.\r\n\r\nInteger semper quis enim vel accumsan. Phasellus varius rhoncus lectus in efficitur. Morbi at lorem nibh. Donec dignissim elementum enim, non rutrum ex gravida ac. Suspendisse ac semper velit. Praesent non venenatis sapien, nec pulvinar augue. Phasellus id magna id diam semper aliquam. Curabitur tristique et nunc sit amet venenatis. Proin justo sem, tincidunt ac risus ac, vehicula sagittis nisl. Curabitur fermentum eu dui accumsan viverra. Etiam eu nunc in eros pharetra laoreet quis eget ipsum.\r\n\r\nClass aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Phasellus sit amet nibh sapien. Phasellus tincidunt lorem eu justo consectetur, vel vehicula lorem mollis. Duis ante sapien, varius eget metus eu, euismod luctus justo. Fusce pretium neque et sapien pulvinar, nec mattis nulla malesuada. Mauris convallis urna at turpis cursus bibendum. Integer eget sapien a orci congue cursus sed sed metus. Ut finibus rutrum orci vitae sodales. Nam eu turpis vel est lacinia eleifend. Phasellus a porta dui. Nam facilisis lacinia lacinia. Aliquam non dui libero.\r\n\r\nPellentesque a porta elit, gravida sodales erat. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Vivamus sagittis ullamcorper massa, ut varius neque venenatis quis. Aliquam erat volutpat. Fusce lorem mi, tincidunt in ipsum sed, maximus blandit lectus. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Fusce nisi diam, posuere ut euismod vel, rhoncus vitae odio. Maecenas lobortis maximus elit, ut tincidunt urna luctus sed. Maecenas efficitur justo ac felis imperdiet, quis malesuada dolor pretium. Quisque nec ornare dui. Donec eget tellus sit amet nisl varius sollicitudin nec sit amet dui. Aliquam erat volutpat. Etiam varius placerat mi pharetra tincidunt. Ut non aliquam dui. Curabitur dignissim auctor nunc non suscipit. Quisque lorem massa, laoreet a lorem nec, egestas porttitor dui.',3),(38,'DÉVELOPPEUR JAVA H/F','NANTERRE','6 mois',1220,'23/05/2024',15,NULL,'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam fringilla est quam, a ultrices massa ullamcorper pretium. Fusce vulputate ex at elit blandit, a scelerisque ex porta. Maecenas finibus libero et finibus vestibulum. Nunc congue congue mattis. Etiam id diam feugiat, ultricies orci vel, sollicitudin tortor. Duis euismod ante vel purus sollicitudin, a congue nisl fermentum. Sed eleifend lorem velit, vel lobortis dolor ullamcorper sit amet. Aenean commodo mauris at augue feugiat fringilla. Maecenas sit amet erat eu risus consequat vestibulum et et justo. Integer cursus dui id consectetur varius. Quisque sit amet faucibus ipsum.\r\n\r\nSed accumsan sapien ullamcorper dolor aliquet molestie. Vestibulum vel consectetur metus. Pellentesque consequat tincidunt dictum. Phasellus vel augue felis. Nullam consequat fringilla quam, sit amet commodo eros rutrum nec. Donec ullamcorper leo mauris, eu interdum massa sodales a. Cras in ullamcorper risus. Sed quis posuere lorem. Nulla feugiat ligula a nisi efficitur, ac maximus metus rutrum. Donec tristique molestie maximus. Fusce ultricies viverra nisl, quis hendrerit orci ullamcorper ut. Aenean ut purus ornare, vulputate massa quis, ullamcorper sapien. Nam vitae mauris non nulla viverra rutrum id eu mauris. Praesent tincidunt ipsum metus, eleifend vehicula felis volutpat sit amet. Ut sodales nibh nec nulla feugiat, quis molestie leo tristique. Cras rhoncus vel ipsum a efficitur.\r\n\r\nInteger semper quis enim vel accumsan. Phasellus varius rhoncus lectus in efficitur. Morbi at lorem nibh. Donec dignissim elementum enim, non rutrum ex gravida ac. Suspendisse ac semper velit. Praesent non venenatis sapien, nec pulvinar augue. Phasellus id magna id diam semper aliquam. Curabitur tristique et nunc sit amet venenatis. Proin justo sem, tincidunt ac risus ac, vehicula sagittis nisl. Curabitur fermentum eu dui accumsan viverra. Etiam eu nunc in eros pharetra laoreet quis eget ipsum.\r\n\r\nClass aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Phasellus sit amet nibh sapien. Phasellus tincidunt lorem eu justo consectetur, vel vehicula lorem mollis. Duis ante sapien, varius eget metus eu, euismod luctus justo. Fusce pretium neque et sapien pulvinar, nec mattis nulla malesuada. Mauris convallis urna at turpis cursus bibendum. Integer eget sapien a orci congue cursus sed sed metus. Ut finibus rutrum orci vitae sodales. Nam eu turpis vel est lacinia eleifend. Phasellus a porta dui. Nam facilisis lacinia lacinia. Aliquam non dui libero.\r\n\r\nPellentesque a porta elit, gravida sodales erat. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Vivamus sagittis ullamcorper massa, ut varius neque venenatis quis. Aliquam erat volutpat. Fusce lorem mi, tincidunt in ipsum sed, maximus blandit lectus. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Fusce nisi diam, posuere ut euismod vel, rhoncus vitae odio. Maecenas lobortis maximus elit, ut tincidunt urna luctus sed. Maecenas efficitur justo ac felis imperdiet, quis malesuada dolor pretium. Quisque nec ornare dui. Donec eget tellus sit amet nisl varius sollicitudin nec sit amet dui. Aliquam erat volutpat. Etiam varius placerat mi pharetra tincidunt. Ut non aliquam dui. Curabitur dignissim auctor nunc non suscipit. Quisque lorem massa, laoreet a lorem nec, egestas porttitor dui.',5),(39,'Title Searcher','JACQUOT','8 mois',1111,'14/07/2024',5,NULL,'Iusto consequatur quisquam omnis rerum voluptas impedit. Excepturi laudantium deleniti earum quo dolor vero quia. Laborum animi est enim cumque. Expedita amet non dolor sed. Dolorem id blanditiis eos facere. Est ea iste consequatur pariatur voluptatem veritatis saepe ut. Et dolorum consequatur et sit odit nulla commodi. Praesentium sit eius ut quisquam repellat consequatur. Illo aliquam quia temporibus et enim. Quia sunt repudiandae incidunt dolores distinctio. Esse consequuntur et voluptatem. Blanditiis perspiciatis cumque distinctio qui tempore natus. Provident dolorum quam aut maxime aspernatur libero odio est. Ut et quas repellat consequatur. Quia explicabo quibusdam reiciendis quisquam. Numquam repellendus similique maiores ducimus ea itaque. Eum sit et iste ducimus laborum unde. Non pariatur illo eum quod rerum quia sint. Explicabo dolorem et modi saepe. Assumenda recusandae non vel ullam dolor odio. Est aut qui enim alias. Enim dolor enim nemo eos. Et sint non ullam optio. Corrupti culpa sed quis necessitatibus nemo. Quia vero culpa sapiente ratione. Explicabo fuga eaque pariatur omnis cupiditate dolore. Atque eaque aut repellendus minus. Facilis quasi consequuntur natus assumenda error sint. Libero tempore reprehenderit aperiam sit asperiores dolores omnis. Earum consequatur dolorem laboriosam ut. Veritatis et quae aut. Velit consectetur consectetur a maiores quasi consectetur quaerat. Id repellat et sit possimus ut. Facilis atque explicabo et maiores quia. Laudantium quia cumque voluptatem mollitia molestias incidunt. Ut fugiat aut velit voluptas. Cupiditate quis nostrum sed sit sint cupiditate aut reprehenderit. Reprehenderit ex totam est et. Minima nihil tempora vel rerum repellat. Asperiores temporibus id repellat corporis. Et esse voluptas iste sint in. Voluptas consequatur illo illo distinctio officia est iste adipisci.',3),(40,'Janitorial Supervisor','GERARD','6 mois',794,'31/10/2024',16,NULL,'Quia odio vel ex id vel repellat praesentium est. Rerum sit omnis non deleniti fuga aut. Necessitatibus repellat qui ut eveniet explicabo. Ut tenetur enim explicabo autem. Voluptates ratione ut velit recusandae qui quae. Hic saepe deserunt consequatur deserunt laudantium quod et harum. Ipsam qui esse laudantium aperiam saepe. Libero ipsam earum modi voluptatibus odio voluptatem. Ut voluptas pariatur sit corrupti minus deleniti dolor. Cum et sit voluptatum et ut et expedita voluptas. Dolor atque at mollitia occaecati hic. Consequatur sunt enim explicabo rerum et sint quo ullam. Alias a maxime ullam fugiat beatae autem in. Ex facilis quisquam vero et. Omnis quas ipsa mollitia esse harum natus exercitationem. Facilis autem occaecati sit enim. Dolorum tempore architecto qui qui non sunt. Reiciendis nesciunt aut temporibus blanditiis magnam aut qui. Non ipsa reiciendis in rem necessitatibus. Voluptatem sit minima non. Rem doloribus laudantium a soluta quisquam. Non voluptatem quis rerum molestias dicta. Consequuntur officiis sit dolorem rerum incidunt error. Molestiae reiciendis adipisci quia et facere molestiae. Veniam dolorum rerum cum quam maxime amet est sed. Maxime praesentium incidunt eum vel. Aut sunt laboriosam et. Sunt recusandae dolor et et molestiae. Aut quidem sit excepturi quo rem explicabo repellat. Excepturi sit sed consequatur qui. Molestiae adipisci qui voluptas maxime id vel. Dolores molestiae dolores sint saepe consequatur et molestiae. Labore amet reiciendis quia. Saepe occaecati laboriosam totam dolore aut. In reprehenderit quas ipsum officia omnis quidem consequatur. Qui cum voluptas cum. Perferendis tenetur reprehenderit dolore ullam et. Vel illum ipsam laudantium ut ut consequatur rerum. Ea mollitia iure sint tempore natus quis eligendi quae. Quia consequuntur accusantium doloribus non quam molestiae libero. Praesentium voluptas eum maiores in perspiciatis iure.',7),(41,'Refrigeration Mechanic','ROCHER','8 mois',692,'23/04/2025',9,NULL,'Molestiae quam sit dolorem consequatur numquam incidunt quibusdam. Perferendis iste aut nobis esse odio dolores. Et omnis nihil et deleniti voluptates. Ea aut expedita quae tenetur sit. Laudantium voluptas rerum libero nihil. Quidem quis porro quidem non saepe maiores. Fugiat eum qui in esse ut dignissimos. Eius neque fugiat minus et delectus similique consequatur. Ut est et cumque unde dolore maxime quo. Animi sed adipisci illum sunt id. Quos dolorem qui quae quam eligendi asperiores voluptas temporibus. Eos dignissimos sed qui. Et nisi nostrum et sint expedita magni. Ex in consequatur voluptatum pariatur. Ratione qui debitis ut nihil. Est voluptas tempore sit harum ut quod odio. Velit impedit qui est ipsum quos. Et nulla iure molestiae. Modi minus eos quasi rerum nobis praesentium. Suscipit cum at placeat ab voluptates. Voluptas deleniti aliquid consectetur in quis adipisci. Et aut nobis in illo cum. Fugit reprehenderit cum maxime eum accusamus velit debitis. Officia est et id sit quos. Doloribus modi qui dolor impedit. Est quibusdam placeat dolorum unde alias ut distinctio. Nobis esse et id sed vitae molestiae. Rerum rerum eligendi architecto et aut atque blanditiis. Aut consequuntur reprehenderit ad atque dolores sed quis. Numquam praesentium officia incidunt velit. Dolores alias iusto voluptatem necessitatibus. Voluptatem cupiditate ut rerum fugit corporis exercitationem. Labore magnam sed dolorem exercitationem itaque totam quos. Aut illum magnam eveniet nihil repudiandae ullam a. Ratione sed in voluptatem iure iure magnam quos. Officia dolor libero asperiores molestiae. Tempore voluptatem aut dolorum esse id repellendus. Reiciendis consequatur dolorum sit tempora enim eligendi. Exercitationem exercitationem ipsum qui aut eius rerum hic. Tempore mollitia maxime sed in corporis ad. Officiis ipsum eaque dolores aliquid ut pariatur. Molestiae similique quia non exercitationem id distinctio voluptatem. Eum sed quas debitis.',5),(42,'Health Specialties Teacher','MENDESBOEUF','2 mois',899,'28/05/2024',13,NULL,'Consequuntur et et quo amet repellendus veritatis. Quidem et rerum aliquid ut tempora. Praesentium soluta quasi sunt dolor cum et. Occaecati debitis quisquam sed dignissimos ab. Quibusdam exercitationem eos quia eos dolore. Corporis rerum et et. Qui corrupti suscipit est fugiat modi aut molestias. Fugit adipisci porro voluptatem laboriosam rerum consequuntur. Nobis optio quidem ut doloribus. Amet quibusdam reprehenderit facere aspernatur. Ea maxime earum reiciendis magnam sequi. Nulla omnis in est placeat ducimus vitae. Et distinctio fuga qui perspiciatis qui dolores. Exercitationem amet sit consequuntur qui fugit omnis. Expedita quibusdam excepturi corporis. Qui aut consequatur ipsum laboriosam cupiditate. Veniam quisquam error eos voluptatem iste sit. Omnis optio eligendi nulla libero. Nihil vero minus quam placeat voluptatibus ut. Dolores dolorum mollitia aut placeat modi dolores sint. Quisquam eum eligendi velit tempora a dolorum autem. Quam quis voluptatem expedita. Earum ipsum ut vel sapiente ratione labore. Odio reiciendis cumque quo atque tempore ea sed. Ipsa quasi placeat eos quidem nesciunt consequatur. Vel odio alias commodi aut molestiae a. Totam quibusdam quas ipsum. Nisi temporibus cumque nam est repellat cumque quas. Et recusandae eaque accusantium repudiandae odit aut. Enim velit et animi eum maiores accusantium et quis. Consequatur magni fugit molestiae ullam. Et magnam illum id eum est autem ipsum. Aliquid repellendus eos et officiis et explicabo laudantium. Atque mollitia dolore libero voluptate veniam eum. Nobis distinctio eligendi rem consequuntur ab. Quisquam magni nesciunt nihil debitis cupiditate velit. Libero autem eum modi ea. Est error vel ea fugiat. Iste dolorem perspiciatis delectus non temporibus. Quibusdam quia omnis modi harum cum veritatis facere. Est et eligendi ad aut et. Quos placeat saepe aut minima exercitationem. Pariatur ad recusandae assumenda architecto repudiandae esse non perferendis. Provident aut veniam consequatur quo.',2),(43,'Music Composer','LELIEVRE','8 mois',922,'17/04/2025',16,NULL,'Quod ut odit qui quam rem. Quod quam et aperiam eius. Suscipit quam nihil ea saepe facilis quia a. Error dolorem adipisci libero autem vel in similique est. Molestiae nobis voluptate qui sit incidunt. Aperiam nisi ut pariatur pariatur et officia repellendus. Architecto placeat et quae ut quam ab. Enim est voluptates officia dolores repellat ut. Ut ipsam eveniet nemo ea sed. Quod est dolores ratione ut sit qui est. Sapiente sunt enim alias velit recusandae aut. Unde exercitationem placeat rerum saepe qui quas. Voluptatem repellendus quia harum similique est nobis. Eum corporis provident voluptatibus atque aspernatur non voluptatem. Voluptatem recusandae voluptates aspernatur molestiae voluptas totam incidunt. Ex quo aut doloremque doloremque sint consequatur. Fugit provident et sit commodi rem vitae. Provident similique autem laborum aspernatur quia. Ex eligendi neque explicabo aliquid fuga consequuntur eius hic. Qui et deserunt et ad tenetur et sed. Tenetur architecto eos adipisci ut molestias minus. Fugiat quibusdam dolore quibusdam iste at soluta incidunt. Cupiditate repellendus minima deleniti qui earum. A quae quae voluptas in autem ea nihil. Rerum in quisquam eius a. Eius enim veritatis exercitationem sint soluta. Est aut quo et possimus non cum. Qui dicta ut est adipisci assumenda. Cum eius nostrum reiciendis. Aut cum illum aut veniam delectus laborum. Recusandae vel repudiandae rerum totam quo dolores nemo. Perspiciatis id incidunt voluptas. Enim commodi recusandae sunt dolorum culpa mollitia iusto quas. Excepturi aliquid illo placeat. Ad minima facilis neque ipsam hic omnis. Doloribus commodi odit iste quia dolorum deserunt unde alias. Nesciunt provident quia ad aspernatur quibusdam quis. Amet inventore velit aut aut. Veritatis error fuga deleniti quis. Sint iure accusantium perspiciatis consequatur doloremque ad deleniti. Accusamus accusamus quis necessitatibus.',3),(44,'Cartographer','JACQUOT','4 mois',828,'23/08/2025',14,NULL,'Aperiam voluptatibus quas repellat culpa asperiores sed modi. Sit necessitatibus eum adipisci aliquam. Dolorem sed ut ut deserunt blanditiis quidem nihil. Sit dolorem mollitia accusamus omnis. Omnis ut facere similique quisquam eius incidunt in. Qui tempore id similique voluptatem. Aut sapiente sit ea numquam et. Velit consequuntur ut rem aut et numquam corporis. Soluta consectetur neque possimus natus error et. Eum quibusdam minima porro dolores neque. Ab repellendus id dolorem inventore a. Voluptatem praesentium expedita delectus debitis provident ut. Ducimus omnis qui quam nesciunt ad est deleniti. Expedita est dolorum ullam aut eius voluptates. Aut amet et eligendi sequi suscipit. Consequuntur ducimus facilis esse natus ipsum. Possimus placeat suscipit qui atque doloremque facere et. Adipisci id nulla est magni impedit ut aut hic. Similique eos laborum consectetur sit dicta. Vero et nobis earum temporibus molestias. Ut eveniet quia ut. Illo est et iure omnis. Aut aspernatur rem sed in. Quo nisi praesentium quasi optio aut qui qui sed. Ut officiis repellat quidem id. Sunt tempore atque expedita sit qui qui aspernatur. Et nostrum non et debitis nesciunt quasi excepturi cumque. Corporis veniam quam soluta aut. Vel et vero possimus eos qui neque. Ipsum molestias aut veritatis aliquid. Deleniti nemo nulla quia ut cupiditate. Quo voluptatibus itaque maiores quis. Ut qui deleniti et ut. Consequatur quisquam asperiores nesciunt expedita. Nisi magni distinctio rerum nihil. Qui non consequatur quibusdam eius. Enim laudantium eum incidunt voluptas. Velit cum et natus minima repellat molestiae quos est. Saepe optio qui voluptas. Similique velit saepe alias voluptatibus. Quam sunt quasi voluptatem incidunt ratione explicabo dolor. Qui et id dicta sit eum ducimus. Corporis magnam ipsam laboriosam et provident et. Quaerat sapiente voluptatem sunt quasi natus quo. Veritatis aspernatur nam perspiciatis error perferendis. Et sed corrupti consequatur est.',2),(45,'Railroad Yard Worker','LELIEVRE','2 mois',958,'24/04/2025',13,NULL,'Libero suscipit consequuntur sit corporis. Et exercitationem impedit in. Velit perferendis assumenda aliquid nihil est. Aperiam culpa at necessitatibus minima molestiae voluptatum repudiandae. Voluptatem dolore culpa reiciendis in qui aut. Tenetur quasi vel dolores quas quam. Et et eum quidem aut sapiente velit minus officiis. Rem ratione et aut sit nam alias et illum. Maxime ab inventore aut ut quibusdam molestiae earum dolores. Nam molestias sed nostrum molestias culpa omnis vel vero. Velit quis dolorum quibusdam nihil aut qui. Officia molestiae exercitationem laudantium natus voluptatem aliquid. Sunt quae et quia reprehenderit quis temporibus. Pariatur perferendis nam et quis. Pariatur repellendus possimus nobis qui quam voluptatem. Nulla sed et officiis dolor deserunt recusandae necessitatibus. Laudantium ab accusantium qui quasi molestias incidunt. Quisquam praesentium ut maiores vel. Voluptatem aperiam nulla nobis praesentium alias doloribus sunt odit. Dolor nostrum aspernatur quasi qui. Et iure omnis fuga et exercitationem nihil. Nulla amet pariatur sequi qui. Beatae dolorem at quo ullam odio excepturi porro. Eos consequatur ea dolores qui vitae quia qui. Molestias ipsum delectus autem quis odit itaque. Sed similique quis a repellendus dolores. Sunt amet dignissimos non autem beatae dolor voluptas. Optio autem corporis ut quas quo soluta soluta incidunt. Quaerat ut eligendi impedit est tempore sint facere. Assumenda dolorum totam quaerat earum. Vitae aut officia aliquam facilis. Dolores qui accusantium id aut dolorum accusamus. Sed minus explicabo omnis suscipit fugit esse. Totam laudantium cumque explicabo. Qui ut quos eum eius officiis. Ea beatae ratione in eligendi qui inventore et. Dolores fugit vel sunt alias. Incidunt deleniti aut sit tempore sunt ad quos voluptatem. Sapiente veniam ipsam magni aliquid est quia et. Pariatur quisquam et quia aut. Quia reprehenderit numquam qui quo minima ratione quaerat et.',8),(46,'Utility Meter Reader','JULIEN-LA-FORêT','8 mois',1191,'13/03/2025',5,NULL,'Aperiam dolore pariatur perferendis nostrum eos eveniet illum. Minima aut labore architecto et quod neque. Nam fugit eius error suscipit iste illum. Autem consequuntur hic minus voluptatum dicta consequatur quis. Placeat qui suscipit id qui ipsam. Velit corrupti ut minus ipsum doloribus eligendi. Repellat nisi unde quas et eum est. Nobis assumenda autem facere. Ab vel vel nihil dolorem cupiditate dolorem. Provident voluptas non necessitatibus rem optio impedit. Quia illum aut architecto aspernatur qui harum. Tenetur sed eaque nemo aut. Facilis est non ut odit. Ut aliquam fugit officia qui repellendus. In a placeat ex provident ut. Ea adipisci aut sapiente totam excepturi nulla autem adipisci. Veniam distinctio qui ut commodi. Labore qui nihil magnam. Nostrum nobis aut et. Consequatur neque consequatur et facere repellat. Tenetur quibusdam voluptate asperiores saepe sed occaecati optio. Eos et explicabo nesciunt ipsum. Porro consequatur ut aut at eius eligendi voluptatibus. At odit et sit iste non eius et. Est repellat delectus molestias dignissimos ut aliquam. Dolor possimus placeat commodi nam. Enim quis ut id cum nostrum dignissimos. Et velit est omnis aut repudiandae. Cumque eos provident ut non qui. Ea consequuntur tenetur voluptas accusamus maxime. Corrupti repellat sunt placeat rerum et vero aut blanditiis. Et rerum eum repudiandae et vero vel aut. Qui est quisquam eius maxime ipsam ab. Praesentium quibusdam itaque distinctio vero accusamus vero. Deleniti asperiores voluptatem fugiat ullam qui qui quia. Tempore minus non accusantium. Fugiat nesciunt et impedit et. Quis eos alias architecto quam. Odit maxime aut praesentium aliquid illum. Voluptatem officiis iure dolores et ex. Perferendis eum enim vitae quos. Fuga est qui ipsa ex tempora maxime occaecati.',10),(47,'Grinding Machine Operator','FRANCOIS','8 mois',1023,'20/06/2025',19,NULL,'Cupiditate blanditiis corporis tempore ratione dolore. Omnis repellat adipisci soluta voluptatem ab exercitationem quo. Eveniet sint et ipsam nobis. Dicta repellendus delectus quaerat assumenda ut dicta. Sit vel iure quia. Maxime labore accusamus asperiores optio eius enim. Quos voluptatibus facilis quia. Inventore occaecati qui labore dolores earum provident nisi ipsa. Repellat alias amet delectus. Dolorem voluptatibus aspernatur blanditiis error illum et. Perferendis quasi inventore voluptatum et error ut. Nesciunt et quia magni sint dolores. Earum quia illum dolores et. Sed totam quae porro nesciunt doloremque dignissimos illum et. Et ullam quibusdam fuga at nisi totam occaecati. Nihil occaecati eum sit eius doloribus voluptatem sapiente odio. Qui accusantium est officiis deserunt quas. Asperiores id sapiente placeat rem suscipit voluptatem asperiores. Cupiditate ea consectetur dicta. Ut quia sit debitis consequatur optio similique debitis. Labore voluptas sed incidunt officia eos possimus quidem sapiente. Ad deserunt ratione tempora asperiores aut ut illo. Laudantium tempora distinctio et dolore necessitatibus quo. Quo quia adipisci asperiores quibusdam. Non eos in ullam. Voluptatem rem at qui minus dolorem cum aliquid ea. Odit non fuga laboriosam voluptas accusantium eveniet. Totam velit consequatur ut sit libero doloremque aperiam quod. Quod reprehenderit esse repudiandae aperiam nam dolor magnam. Eum voluptatum ut saepe quis. Repudiandae aliquid iure sed sequi ut sed. Vel quasi voluptatem magnam libero eum dolor. Ab tempora quidem consequatur incidunt. Cupiditate deserunt molestias molestias placeat assumenda. Aspernatur suscipit corrupti esse maiores cum. Quia odio rerum nam distinctio nostrum repudiandae est. Eos fuga odit qui quae repellendus et asperiores. Quasi praesentium qui explicabo dolor ea reprehenderit. Laboriosam enim ut nam repellendus. Aut in eius voluptas reprehenderit. Eius expedita voluptate accusantium illo quo sint aut.',8),(48,'Artillery Crew Member','FAURE-SUR-GRENIER','2 mois',777,'05/10/2024',4,NULL,'Non maxime occaecati modi. Soluta pariatur velit ipsa quibusdam dolorem sit. Magnam dolores tenetur nemo nam quasi dolores sequi. Qui architecto debitis quis quia aut sit et. Dolores maiores voluptatem quia neque cumque ut. Ut fuga a qui. Officia animi quas rem aperiam. Eveniet officiis possimus et ut et animi. Suscipit deleniti voluptatem voluptates quia vero sed voluptatibus. Aut commodi voluptas recusandae nihil. Saepe molestias distinctio neque quaerat qui temporibus a. Culpa unde ducimus cupiditate assumenda distinctio. Omnis non dolores minus. Repellat non sunt velit. Saepe voluptas occaecati sed sit. Earum quidem fugiat necessitatibus iure minima reprehenderit. Tenetur tempora alias omnis adipisci eaque eveniet. Qui vel itaque debitis rerum consequatur qui porro. Ad eius perspiciatis fugiat in earum ullam. Vitae at dolor consequatur iusto fugit hic. Sint a deleniti consectetur et. Unde laudantium earum corporis atque ab cupiditate atque. Assumenda debitis eos quo qui dolores libero perspiciatis. Deserunt tempora rerum mollitia dolorem. Possimus et sint quasi vel delectus laudantium necessitatibus. Et non impedit cum hic fugiat soluta. Aspernatur quis sed et fugit repellat. Sapiente possimus consequatur veritatis voluptate dolor eum quo. Et ipsa nihil sint molestiae magnam alias velit. Ad aut mollitia non qui expedita ad qui. Vero tempore sed repellat explicabo autem optio. Accusantium magnam aut sed inventore distinctio. Enim dolor explicabo officiis cupiditate corrupti dolor. Nihil voluptas dolorum aut quia expedita. Aut in adipisci doloribus minima fugiat enim beatae. Velit laboriosam et vel nam. Voluptatem officiis velit id sunt voluptas reiciendis quos atque. Minus voluptatum delectus velit omnis odio dolorem officiis. Deserunt rerum ea consequatur quia labore possimus. Et optio et provident ut dicta sunt. Eos aspernatur molestiae vitae tempora.',7);
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
INSERT INTO `offers_applications` VALUES (30,22),(25,24);
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
INSERT INTO `offers_skills` VALUES (38,20),(37,23),(37,26),(38,26),(37,27),(38,27);
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
INSERT INTO `promos_users` VALUES (2,24);
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
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'Randrianaivo','Kevin','kvngideon@gmail.com','$2y$12$bKHrDaQUH9TjMgvAAfRkvOZeD1DQ4ErJHk1tGeUmSy70to2M01WIW','rkevin','Admin'),(12,'Tayrac','Thomas','thomas.tayrac@viacesi.fr','$2y$12$K.dyBWHY46ANa.lb6VAHSesvG1gWusCm7ZTtZpwukR7jiYhN3MUbG','thayrac','Pilote'),(13,'Sadaoui','Eliote','sadaoui.eliote@viacesi.fr','$2y$12$hSD2iyfYiEJLQwyouItTIO23OCk/RwXPCQEo8lcfGS872VbwJsiHe','sadastral','Pilote'),(24,'Silhol','Guilhem','auhasard@gmail.com','$2y$12$aDS.uKbId.qAJ.iU2hCn3.ZedhQqp6Y5DOSB/tamvAblbDQTHmYWK','guiguitare','Etudiant'),(26,'Doe','John','john.doe@cesi.fr','$2y$12$NSzB1n7t.gwhs9VqWzDm/e2ooG.p/ZxR.gSRw0PbIFXQU8IhJeZvy','johnDoe','Etudiant'),(27,'Hassan','Aunim','aunim.hassan@wanadoo.fr','$2y$12$R0G2vFAqhmfWvcpsF9.sheGcWAOzKGoKJNt/CG.tkCM5xv9HqAXHG','Sylent','Etudiant'),(28,'Laumond','Antoine','antoine.laumond@viacesi.fr','$2y$12$UZl//.9xGuHoX5FcU88ukOXDu3tj8mmS1HpnkxKmT1HkoYQ36qdGe','ant.laum','Pilote');
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
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
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

-- Dump completed on 2024-04-08 16:20:51
