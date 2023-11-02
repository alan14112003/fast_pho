-- MySQL dump 10.13  Distrib 8.0.19, for Win64 (x86_64)
--
-- Host: localhost    Database: fast_pho
-- ------------------------------------------------------
-- Server version	8.0.30

 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT;
 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS;
 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION;
 SET NAMES utf8mb4;
 SET @OLD_TIME_ZONE=@@TIME_ZONE;
 SET TIME_ZONE='+00:00';
 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO';
 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0;

--
-- Table structure for table `abouts`
--

DROP TABLE IF EXISTS `abouts`;
 SET @saved_cs_client     = @@character_set_client;
 SET character_set_client = utf8mb4;
CREATE TABLE `abouts` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `content` longtext COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
 SET character_set_client = @saved_cs_client;

--
-- Dumping data for table `abouts`
--

LOCK TABLES `abouts` WRITE;
ALTER TABLE `abouts` DISABLE KEYS;
INSERT INTO `abouts` VALUES (1,'<p>Về xứ mệnh bla bla&nbsp;</p>\r\n\r\n\r\n<p style=\"text-align: center;\"><img src=\"data:image/jpeg;base64,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\" style=\"height: 243px;\" /><br /></p>',NULL,'2023-06-29 03:10:49');
ALTER TABLE `abouts` ENABLE KEYS;
UNLOCK TABLES;

--
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `categories`;
 SET @saved_cs_client     = @@character_set_client;
 SET character_set_client = utf8mb4;
CREATE TABLE `categories` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `parent_id` bigint DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
 SET character_set_client = @saved_cs_client;

--
-- Dumping data for table `categories`
--

LOCK TABLES `categories` WRITE;
ALTER TABLE `categories` DISABLE KEYS;
INSERT INTO `categories` VALUES (1,'Đồ dùng học sinh','do-dung-hoc-sinh',NULL,'2023-06-05 03:25:45','2023-06-05 03:25:49'),(2,'Dụng cụ thể thao','dung-cu-the-thao',NULL,'2023-06-05 03:26:21','2023-06-05 03:26:25'),(3,'Sản phẩm màu','san-pham-mau',1,'2023-06-05 03:27:28','2023-06-05 03:27:32'),(4,'Ba bóng nhỏ','ba-bong-nho',2,'2023-06-05 03:28:37','2023-06-05 03:28:42'),(5,'Vợt cầu lông','vot-cau-long',4,'2023-06-05 03:31:17','2023-06-05 03:31:23'),(6,'Vợt bóng bàn','vot-bong-bang',4,'2023-06-05 03:32:32','2023-06-05 03:32:37'),(7,'Dụng cụ học tập','dung-cu-hoc-tap',1,'2023-06-05 09:42:26','2023-06-05 09:42:29'),(8,'Đất nặn','dat-nan',3,'2023-06-05 09:44:47','2023-06-05 09:44:52'),(9,'Các loại màu','cac-loai-mau',3,'2023-06-05 09:45:32','2023-06-05 09:45:35'),(10,'Compa học sinh','compa-hoc-sinh',7,'2023-06-05 09:54:26','2023-06-05 09:54:29'),(11,'Sản phẩm dính','san-pham-dinh',NULL,'2023-06-05 10:03:10','2023-06-05 10:03:14');
ALTER TABLE `categories` ENABLE KEYS;
UNLOCK TABLES;

--
-- Table structure for table `configs`
--

DROP TABLE IF EXISTS `configs`;
 SET @saved_cs_client     = @@character_set_client;
 SET character_set_client = utf8mb4;
CREATE TABLE `configs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `info_1` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `info_2` text COLLATE utf8mb4_unicode_ci,
  `info_type` tinyint NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
 SET character_set_client = @saved_cs_client;

--
-- Dumping data for table `configs`
--

LOCK TABLES `configs` WRITE;
ALTER TABLE `configs` DISABLE KEYS;
INSERT INTO `configs` VALUES (1,'sonnn.21it@vku.udn.vn',NULL,0,'2023-06-29 06:04:31','2023-07-02 03:38:00'),(3,'images/qr_code/3/image.jpg','<p style=\"text-align: center; \">Nguyễn Ngọc Sơn</p>\r\n<p>NH: VietComBank</p>',1,'2023-06-30 08:23:27','2023-06-30 08:23:27');
ALTER TABLE `configs` ENABLE KEYS;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
 SET @saved_cs_client     = @@character_set_client;
 SET character_set_client = utf8mb4;
CREATE TABLE `migrations` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
 SET character_set_client = @saved_cs_client;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
ALTER TABLE `migrations` DISABLE KEYS;
INSERT INTO `migrations` VALUES (1,'2014_10_12_000000_create_users_table',1),(2,'2019_12_14_000001_create_personal_access_tokens_table',1),(3,'2023_06_04_004924_create_categories_table',1),(4,'2023_06_04_005934_create_slides_table',1),(5,'2023_06_04_011319_create_products_table',1),(6,'2023_06_04_022809_create_sub_products_table',1),(7,'2023_06_04_023753_create_photos_table',1),(8,'2023_06_04_025405_create_orders_table',1),(9,'2023_06_04_032140_create_order_product_table',1),(10,'2023_06_05_225359_add_avatar_to_users_table',2),(12,'2023_06_05_231131_add_category_id_to_products_table',3),(13,'2023_06_05_234740_make_nullable_for_src_on_slides_table_and_image_on_products_and_sub_products_table_and_file_on_photos_table',4),(14,'2023_06_06_153053_add_province_and_district_and_ward_column_to_users_table',5),(15,'2023_06_06_153535_set_nullable_to_phone_and_address_column_from_users_table',5),(16,'2023_06_07_074641_drop_column_status_and_user_name_and_user_phone_and_user_address_and_user_id_and_add_column_price_from_photos_table',6),(17,'2023_06_07_075421_create_order_photos_table',6),(20,'2023_06_14_125224_add_column_type_from_orders_table',7),(21,'2023_06_14_132527_add_column_product_type_and_column_sub_product_id_from_order_product_table',8),(22,'2023_06_14_141411_set_null_column_delivery_time_from_orders_table',9),(23,'2023_06_21_113633_create_photo_types_table',10),(24,'2023_06_21_115136_add_foreign_key_photo_types_photos_table',10),(25,'2023_06_27_140740_replace_column_type_id_to_type_in_photos_table',11),(26,'2023_06_29_090300_create_abouts_table',12),(27,'2023_06_29_123432_create_configs_table',13),(28,'2023_07_04_120548_create_column_total_in_orders_table',14);
ALTER TABLE `migrations` ENABLE KEYS;
UNLOCK TABLES;

--
-- Table structure for table `order_photo`
--

DROP TABLE IF EXISTS `order_photo`;
 SET @saved_cs_client     = @@character_set_client;
 SET character_set_client = utf8mb4;
CREATE TABLE `order_photo` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `order_id` bigint unsigned NOT NULL,
  `photo_id` bigint unsigned DEFAULT NULL,
  `photo_price` bigint NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `order_photo_order_id_foreign` (`order_id`),
  KEY `order_photo_photo_id_foreign` (`photo_id`),
  CONSTRAINT `order_photo_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE,
  CONSTRAINT `order_photo_photo_id_foreign` FOREIGN KEY (`photo_id`) REFERENCES `photos` (`id`) ON DELETE SET NULL
) ENGINE=InnoDB AUTO_INCREMENT=48 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
 SET character_set_client = @saved_cs_client;

--
-- Dumping data for table `order_photo`
--

LOCK TABLES `order_photo` WRITE;
ALTER TABLE `order_photo` DISABLE KEYS;
INSERT INTO `order_photo` VALUES (1,3,1,1000,'2023-06-16 00:43:25','2023-07-08 00:43:50'),(2,3,3,120,'2023-06-16 00:43:25','2023-06-16 00:43:31'),(3,4,2,100,'2023-06-16 00:43:25','2023-06-16 00:43:31'),(4,4,4,120,'2023-06-16 00:43:25','2023-06-16 00:43:31'),(5,15,5,0,'2023-06-27 07:54:04','2023-06-27 07:54:04'),(6,15,6,0,'2023-06-27 07:54:04','2023-06-27 07:54:04'),(7,16,7,0,'2023-06-27 07:56:28','2023-06-27 07:56:28'),(8,16,8,0,'2023-06-27 07:56:28','2023-06-27 07:56:28'),(9,17,9,0,'2023-06-27 07:58:00','2023-06-27 07:58:00'),(10,17,10,0,'2023-06-27 07:58:00','2023-06-27 07:58:00'),(11,21,14,0,'2023-07-02 04:34:19','2023-07-02 04:34:19'),(12,25,16,10000,'2023-07-02 04:54:33','2023-07-02 04:54:33'),(13,26,17,10000,'2023-07-02 05:08:58','2023-07-02 05:08:58'),(14,28,19,10000,'2023-07-02 05:12:07','2023-07-02 05:12:07'),(15,30,20,0,'2023-07-04 05:09:07','2023-07-04 05:09:07'),(16,31,21,0,'2023-07-04 05:09:20','2023-07-04 05:09:20'),(17,34,22,0,'2023-07-06 06:22:08','2023-07-06 06:22:08'),(18,35,23,0,'2023-07-06 06:23:42','2023-07-06 06:23:42'),(19,36,24,0,'2023-07-06 06:23:46','2023-07-06 06:23:46'),(20,37,25,0,'2023-07-06 06:25:25','2023-07-06 06:25:25'),(21,38,26,0,'2023-07-06 06:27:48','2023-07-06 06:27:48'),(22,39,27,0,'2023-07-06 06:28:15','2023-07-06 06:28:15'),(23,40,28,0,'2023-07-06 06:28:16','2023-07-06 06:28:16'),(24,41,29,0,'2023-07-06 06:28:19','2023-07-06 06:28:19'),(25,42,30,0,'2023-07-06 06:28:20','2023-07-06 06:28:20'),(26,43,31,0,'2023-07-06 06:28:24','2023-07-06 06:28:24'),(27,44,32,0,'2023-07-06 06:28:24','2023-07-06 06:28:24'),(28,45,33,0,'2023-07-06 06:28:28','2023-07-06 06:28:28'),(29,46,34,0,'2023-07-06 06:28:29','2023-07-06 06:28:29'),(30,47,35,0,'2023-07-06 06:28:32','2023-07-06 06:28:32'),(31,48,36,0,'2023-07-06 06:28:33','2023-07-06 06:28:33'),(32,49,37,0,'2023-07-06 06:28:36','2023-07-06 06:28:36'),(33,50,38,0,'2023-07-06 06:28:37','2023-07-06 06:28:37'),(34,51,39,0,'2023-07-06 06:28:41','2023-07-06 06:28:41'),(35,52,40,0,'2023-07-06 06:28:42','2023-07-06 06:28:42'),(36,53,41,0,'2023-07-06 06:28:47','2023-07-06 06:28:47'),(37,54,42,0,'2023-07-06 06:28:47','2023-07-06 06:28:47'),(38,55,43,0,'2023-07-06 06:28:51','2023-07-06 06:28:51'),(39,56,44,0,'2023-07-06 06:30:42','2023-07-06 06:30:42'),(40,57,45,0,'2023-07-06 06:31:06','2023-07-06 06:31:06'),(41,58,46,0,'2023-07-06 06:34:30','2023-07-06 06:34:30'),(42,59,47,0,'2023-07-06 06:35:25','2023-07-06 06:35:25'),(43,60,48,0,'2023-07-06 06:36:46','2023-07-06 06:36:46'),(44,61,49,0,'2023-07-06 06:37:46','2023-07-06 06:37:46'),(45,62,50,0,'2023-07-06 06:39:06','2023-07-06 06:39:06'),(46,63,51,0,'2023-07-06 07:08:10','2023-07-06 07:08:10'),(47,67,54,11000,'2023-07-07 08:40:24','2023-07-08 00:01:26');
ALTER TABLE `order_photo` ENABLE KEYS;
UNLOCK TABLES;

--
-- Table structure for table `order_product`
--

DROP TABLE IF EXISTS `order_product`;
 SET @saved_cs_client     = @@character_set_client;
 SET character_set_client = utf8mb4;
CREATE TABLE `order_product` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `order_id` bigint unsigned NOT NULL,
  `product_id` bigint unsigned DEFAULT NULL,
  `product_name` varchar(1000) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_price` bigint NOT NULL,
  `product_sale` int NOT NULL DEFAULT '0',
  `sub_product_id` bigint unsigned DEFAULT NULL,
  `product_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `total` int NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `order_product_order_id_foreign` (`order_id`),
  KEY `order_product_product_id_foreign` (`product_id`),
  KEY `order_product_sub_product_id_foreign` (`sub_product_id`),
  CONSTRAINT `order_product_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE,
  CONSTRAINT `order_product_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE SET NULL,
  CONSTRAINT `order_product_sub_product_id_foreign` FOREIGN KEY (`sub_product_id`) REFERENCES `sub_products` (`id`) ON DELETE SET NULL
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
 SET character_set_client = @saved_cs_client;

--
-- Dumping data for table `order_product`
--

LOCK TABLES `order_product` WRITE;
ALTER TABLE `order_product` DISABLE KEYS;
INSERT INTO `order_product` VALUES (1,1,1,'Máy tính',1000000,0,2,'Màu xanh',2,'2023-06-15 00:24:29','2023-06-15 00:24:35'),(2,1,1,'Máy tính',1000000,5,3,'Màu đỏ',2,'2023-06-15 00:24:29','2023-06-15 00:24:35'),(3,2,1,'Máy tính',1000000,0,3,'Màu đỏ',2,'2023-06-15 00:24:29','2023-06-15 00:24:35'),(5,7,1,'máy tính',3000,5,NULL,NULL,2,'2023-06-22 05:27:15','2023-06-22 05:27:15'),(6,7,1,'máy tính',3000,5,NULL,NULL,1,'2023-06-22 05:27:15','2023-06-22 05:27:15'),(7,8,1,'máy tính',3000,5,3,'Màu xanh',2,'2023-06-22 05:30:57','2023-06-22 05:30:57'),(8,8,1,'máy tính',3000,5,2,'Màu đỏ',1,'2023-06-22 05:30:57','2023-06-22 05:30:57'),(9,9,1,'máy tính',3000,5,3,'Màu xanh',2,'2023-06-22 05:31:54','2023-06-22 05:31:54'),(10,9,1,'máy tính',3000,5,2,'Màu đỏ',1,'2023-06-22 05:31:54','2023-06-22 05:31:54'),(11,10,1,'máy tính',3000,5,3,'Màu xanh',2,'2023-06-22 05:32:38','2023-06-22 05:32:38'),(12,10,1,'máy tính',3000,5,2,'Màu đỏ',1,'2023-06-22 05:32:38','2023-06-22 05:32:38'),(13,11,1,'máy tính',3000,5,3,'Màu xanh',2,'2023-06-22 05:35:44','2023-06-22 05:35:44'),(14,11,1,'máy tính',3000,5,2,'Màu đỏ',1,'2023-06-22 05:35:44','2023-06-22 05:35:44'),(15,14,1,'máy tính',3000,5,2,'Màu đỏ',1,'2023-06-23 03:40:40','2023-06-23 03:40:40'),(16,29,1,'máy tính',3000,5,3,'Màu xanh',1,'2023-07-02 05:16:01','2023-07-02 05:16:01'),(17,32,1,'máy tính',3000,5,2,'Màu đỏ',2,'2023-07-05 02:55:12','2023-07-05 02:55:12'),(18,33,1,'máy tính',3000,5,2,'Màu đỏ',1,'2023-07-05 03:46:50','2023-07-05 03:46:50'),(19,64,1,'máy tính',3000,5,3,'Màu xanh',1,'2023-07-06 07:15:37','2023-07-06 07:15:37');
ALTER TABLE `order_product` ENABLE KEYS;
UNLOCK TABLES;

--
-- Table structure for table `orders`
--

DROP TABLE IF EXISTS `orders`;
 SET @saved_cs_client     = @@character_set_client;
 SET character_set_client = utf8mb4;
CREATE TABLE `orders` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `delivery_time` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` bigint unsigned DEFAULT NULL,
  `user_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` tinyint NOT NULL DEFAULT '0',
  `total` int DEFAULT NULL,
  `status` tinyint NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `orders_user_id_foreign` (`user_id`),
  CONSTRAINT `orders_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE SET NULL
) ENGINE=InnoDB AUTO_INCREMENT=68 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
 SET character_set_client = @saved_cs_client;

--
-- Dumping data for table `orders`
--

LOCK TABLES `orders` WRITE;
ALTER TABLE `orders` DISABLE KEYS;
INSERT INTO `orders` VALUES (1,'từ 15/06/2023 đến 20/06/2023',1,'Alan','0359591411','Thôn 2, an phú, pleiku, gia lai',0,NULL,1,'2023-06-15 00:22:27','2023-06-14 21:14:35'),(2,'từ 15/06/2023 đến 21/06/2023',1,'Alan','0359591411','Thôn 2, an phú, pleiku, Quảng Nam',0,NULL,2,'2023-06-15 00:22:27','2023-06-15 00:22:32'),(3,'từ 15/06/2023 đến 21/06/2023',NULL,'Alan','0359591411','Thôn 2, an phú, pleiku, Quảng Nam',1,10000,1,'2023-06-15 00:22:27','2023-07-08 00:43:27'),(4,'từ 15/06/2023 đến 21/06/2023',1,'Alan','0359591411','Thôn 2, an phú, pleiku, Quảng Nam',1,NULL,0,'2023-06-15 00:22:27','2023-06-14 21:13:54'),(7,NULL,NULL,'Phan Xuân Sỹ','0788641673','112 Hùng Vương, Phường Trung Hưng, Thị xã Sơn Tây, Hà Nội',0,NULL,0,'2023-06-22 05:27:15','2023-06-22 05:27:15'),(8,NULL,NULL,'Phan Xuân Sỹ','0788641673','112 Hùng Vương, Phường Trung Hưng, Thị xã Sơn Tây, Hà Nội',0,NULL,0,'2023-06-22 05:30:57','2023-06-22 05:30:57'),(9,NULL,NULL,'Phan Xuân Sỹ','0788641673','112 Hùng Vương, Phường Trung Hưng, Thị xã Sơn Tây, Hà Nội',0,NULL,0,'2023-06-22 05:31:54','2023-06-22 05:31:54'),(10,NULL,NULL,'Phan Xuân Sỹ','0788641673','112 Hùng Vương, Phường Trung Hưng, Thị xã Sơn Tây, Hà Nội',1,NULL,0,'2023-06-22 05:32:38','2023-06-22 05:32:38'),(11,NULL,NULL,'Phan Xuân Sỹ','0788641673','112 Hùng Vương, Xã Tảo Dương Văn, Huyện Ứng Hòa, Hà Nội',0,NULL,0,'2023-06-22 05:35:44','2023-06-22 05:35:44'),(12,NULL,NULL,'Phan Xuân Sỹ','0788641673','112 Hùng Vương, Phường Đội Cấn, Quận Ba Đình, Hà Nội',0,NULL,0,'2023-06-22 05:37:44','2023-06-22 05:37:44'),(13,NULL,NULL,'Phan Xuân Sỹ','0788641673','112 Hùng Vương, Phường Đội Cấn, Quận Ba Đình, Hà Nội',0,NULL,0,'2023-06-22 05:38:13','2023-06-22 05:38:13'),(14,NULL,1,'Alan','0356585711','Ngũ hành sơn, Xã Phù Lưu Tế, Huyện Mỹ Đức, Hà Nội',0,NULL,0,'2023-06-23 03:40:40','2023-06-23 03:40:40'),(15,'1h chiều',1,'Nguyễn Ngọc Sơn','0359591411','123, ngô quyền, 09583, 269, 01',1,NULL,0,'2023-06-27 07:54:04','2023-06-27 07:54:04'),(16,'1h chiều',1,'Nguyễn Ngọc Sơn','0359591411','123, ngô quyền, 09583, 269, 01',1,NULL,0,'2023-06-27 07:56:28','2023-06-27 07:56:28'),(17,'1h chiều',1,'Nguyễn Ngọc Sơn','0359591411','123, ngô quyền, 09583, 269, 01',1,NULL,0,'2023-06-27 07:58:00','2023-06-27 07:58:00'),(21,'1h chiều nay',1,'Alan','0359591411','12, lê lợi, 00006, 001, 01',0,NULL,0,'2023-07-02 04:34:19','2023-07-02 04:34:19'),(25,'2h chiều mai',1,'alan','0359591411','12, lê lợi, 09542, 268, 01',0,NULL,0,'2023-07-02 04:54:33','2023-07-02 04:54:33'),(26,'',1,'Nguyễn Ngọc Sơn','0984003330','123, trhd, Xã Phù Lưu Tế, Huyện Mỹ Đức, Hà Nội',0,NULL,0,'2023-07-02 05:08:58','2023-07-02 05:08:58'),(28,'12h trưa',1,'Nguyễn Ngọc Sơn','0984003330','12, nguyễn huệ, Xã Hồng Vân, Huyện Thường Tín, Hà Nội',0,NULL,0,'2023-07-02 05:12:07','2023-07-02 05:12:07'),(29,NULL,1,'Alan','0356585711','12, nguyễn huệ, Xã Văn Phú, Huyện Thường Tín, Hà Nội',0,NULL,0,'2023-07-02 05:16:01','2023-07-02 05:16:01'),(30,'',1,'Alan','0356585711','12, nguyễn huệ, Chọn phường / xã\n                                                                , Chọn quận / huyện\n            , Hà Nội',0,10000,0,'2023-07-04 05:09:07','2023-07-04 05:09:07'),(31,'',1,'Alan','0356585711','12, nguyễn huệ, Chọn phường / xã\n                                                                , Chọn quận / huyện\n            , Hà Nội',0,10000,0,'2023-07-04 05:09:20','2023-07-04 05:09:20'),(32,NULL,1,'Alan','0356585711','12, nguyễn huệ, Xã Đại Yên, Huyện Chương Mỹ, Hà Nội',0,NULL,0,'2023-07-05 02:55:12','2023-07-05 02:55:12'),(33,NULL,1,'Alan','0356585711','12, nguyễn huệ, Xã Nam Phong, Huyện Phú Xuyên, Hà Nội',0,NULL,0,'2023-07-05 03:46:50','2023-07-05 03:46:50'),(34,'',1,'Alan','0356585711','12, nguyễn huệ, Phường Vạn Phúc, Quận Hà Đông, Hà Nội',0,10000,0,'2023-07-06 06:22:07','2023-07-06 06:22:07'),(35,'',1,'Alan','0356585711','12, nguyễn huệ, Xã Kim Thư, Huyện Thanh Oai, Hà Nội',0,10000,0,'2023-07-06 06:23:42','2023-07-06 06:23:42'),(36,'',1,'Alan','0356585711','12, nguyễn huệ, Xã Kim Thư, Huyện Thanh Oai, Hà Nội',0,10000,0,'2023-07-06 06:23:46','2023-07-06 06:23:46'),(37,'',1,'Alan','0356585711','12, nguyễn huệ, Xã Nam Phong, Huyện Phú Xuyên, Hà Nội',0,10000,0,'2023-07-06 06:25:25','2023-07-06 06:25:25'),(38,'',1,'Alan','0356585711','12, nguyễn huệ, Phường Nguyễn Trãi, Quận Hà Đông, Hà Nội',0,10000,0,'2023-07-06 06:27:48','2023-07-06 06:27:48'),(39,'',1,'Alan','0356585711','12, nguyễn huệ, Phường Sơn Lộc, Thị xã Sơn Tây, Hà Nội',0,10000,0,'2023-07-06 06:28:15','2023-07-06 06:28:15'),(40,'',1,'Alan','0356585711','12, nguyễn huệ, Phường Sơn Lộc, Thị xã Sơn Tây, Hà Nội',0,10000,0,'2023-07-06 06:28:16','2023-07-06 06:28:16'),(41,'',1,'Alan','0356585711','12, nguyễn huệ, Phường Sơn Lộc, Thị xã Sơn Tây, Hà Nội',0,10000,0,'2023-07-06 06:28:19','2023-07-06 06:28:19'),(42,'',1,'Alan','0356585711','12, nguyễn huệ, Phường Sơn Lộc, Thị xã Sơn Tây, Hà Nội',0,10000,0,'2023-07-06 06:28:20','2023-07-06 06:28:20'),(43,'',1,'Alan','0356585711','12, nguyễn huệ, Phường Sơn Lộc, Thị xã Sơn Tây, Hà Nội',0,10000,0,'2023-07-06 06:28:24','2023-07-06 06:28:24'),(44,'',1,'Alan','0356585711','12, nguyễn huệ, Phường Sơn Lộc, Thị xã Sơn Tây, Hà Nội',0,10000,0,'2023-07-06 06:28:24','2023-07-06 06:28:24'),(45,'',1,'Alan','0356585711','12, nguyễn huệ, Phường Sơn Lộc, Thị xã Sơn Tây, Hà Nội',0,10000,0,'2023-07-06 06:28:28','2023-07-06 06:28:28'),(46,'',1,'Alan','0356585711','12, nguyễn huệ, Phường Sơn Lộc, Thị xã Sơn Tây, Hà Nội',0,10000,0,'2023-07-06 06:28:29','2023-07-06 06:28:29'),(47,'',1,'Alan','0356585711','12, nguyễn huệ, Phường Sơn Lộc, Thị xã Sơn Tây, Hà Nội',0,10000,0,'2023-07-06 06:28:32','2023-07-06 06:28:32'),(48,'',1,'Alan','0356585711','12, nguyễn huệ, Phường Sơn Lộc, Thị xã Sơn Tây, Hà Nội',0,10000,0,'2023-07-06 06:28:33','2023-07-06 06:28:33'),(49,'',1,'Alan','0356585711','12, nguyễn huệ, Phường Sơn Lộc, Thị xã Sơn Tây, Hà Nội',0,10000,0,'2023-07-06 06:28:36','2023-07-06 06:28:36'),(50,'',1,'Alan','0356585711','12, nguyễn huệ, Phường Sơn Lộc, Thị xã Sơn Tây, Hà Nội',0,10000,0,'2023-07-06 06:28:37','2023-07-06 06:28:37'),(51,'',1,'Alan','0356585711','12, nguyễn huệ, Phường Sơn Lộc, Thị xã Sơn Tây, Hà Nội',0,10000,0,'2023-07-06 06:28:41','2023-07-06 06:28:41'),(52,'',1,'Alan','0356585711','12, nguyễn huệ, Phường Sơn Lộc, Thị xã Sơn Tây, Hà Nội',0,10000,0,'2023-07-06 06:28:42','2023-07-06 06:28:42'),(53,'',1,'Alan','0356585711','12, nguyễn huệ, Phường Sơn Lộc, Thị xã Sơn Tây, Hà Nội',0,10000,0,'2023-07-06 06:28:47','2023-07-06 06:28:47'),(54,'',1,'Alan','0356585711','12, nguyễn huệ, Phường Sơn Lộc, Thị xã Sơn Tây, Hà Nội',0,10000,0,'2023-07-06 06:28:47','2023-07-06 06:28:47'),(55,'',1,'Alan','0356585711','12, nguyễn huệ, Phường Sơn Lộc, Thị xã Sơn Tây, Hà Nội',0,10000,0,'2023-07-06 06:28:51','2023-07-06 06:28:51'),(56,'',1,'Alan','0356585711','12, nguyễn huệ, Phường Quang Trung, Thị xã Sơn Tây, Hà Nội',0,10000,0,'2023-07-06 06:30:42','2023-07-06 06:30:42'),(57,'',1,'Alan','0356585711','12, nguyễn huệ, Phường Mộ Lao, Quận Hà Đông, Hà Nội',0,10000,0,'2023-07-06 06:31:06','2023-07-06 06:31:06'),(58,'',1,'Alan','0356585711','12, nguyễn huệ, Xã Đường Lâm, Thị xã Sơn Tây, Hà Nội',0,10000,0,'2023-07-06 06:34:30','2023-07-06 06:34:30'),(59,'',1,'Alan','0356585711','12, nguyễn huệ, Phường Mộ Lao, Quận Hà Đông, Hà Nội',0,10000,0,'2023-07-06 06:35:25','2023-07-06 06:35:25'),(60,'',1,'Alan','0356585711','12, nguyễn huệ, Phường Mộ Lao, Quận Hà Đông, Hà Nội',0,10000,0,'2023-07-06 06:36:46','2023-07-06 06:36:46'),(61,'',1,'Alan','0356585711','12, nguyễn huệ, Phường Vạn Phúc, Quận Hà Đông, Hà Nội',0,10000,0,'2023-07-06 06:37:46','2023-07-06 06:37:46'),(62,'',1,'Alan','0356585711','12, nguyễn huệ, Xã Tản Hồng, Huyện Ba Vì, Hà Nội',0,10000,0,'2023-07-06 06:39:06','2023-07-06 06:39:06'),(63,'',1,'Alan','0359591411','12, nguyễn huệ, Chọn phường / xã\n                                                                , Chọn quận / huyện\n            , Hà Nội',0,10000,0,'2023-07-06 07:08:10','2023-07-06 07:08:10'),(64,NULL,1,'Alan','0356585711','12, nguyễn huệ, Xã Phương Trung, Huyện Thanh Oai, Hà Nội',0,NULL,0,'2023-07-06 07:15:37','2023-07-06 07:15:37'),(67,'',1,'Alan','0356585711','12, nguyễn huệ, Xã Thọ Xuân, Huyện Đan Phượng, Hà Nội',0,10000,0,'2023-07-07 08:40:24','2023-07-08 00:53:20');
ALTER TABLE `orders` ENABLE KEYS;
UNLOCK TABLES;

--
-- Table structure for table `personal_access_tokens`
--

DROP TABLE IF EXISTS `personal_access_tokens`;
 SET @saved_cs_client     = @@character_set_client;
 SET character_set_client = utf8mb4;
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
 SET character_set_client = @saved_cs_client;

--
-- Dumping data for table `personal_access_tokens`
--

LOCK TABLES `personal_access_tokens` WRITE;
ALTER TABLE `personal_access_tokens` DISABLE KEYS;
ALTER TABLE `personal_access_tokens` ENABLE KEYS;
UNLOCK TABLES;

--
-- Table structure for table `photo_types`
--

DROP TABLE IF EXISTS `photo_types`;
 SET @saved_cs_client     = @@character_set_client;
 SET character_set_client = utf8mb4;
CREATE TABLE `photo_types` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `distance` int unsigned NOT NULL,
  `price` int unsigned NOT NULL,
  `rate` double(8,2) NOT NULL,
  `cover_price` int unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
 SET character_set_client = @saved_cs_client;

--
-- Dumping data for table `photo_types`
--

LOCK TABLES `photo_types` WRITE;
ALTER TABLE `photo_types` DISABLE KEYS;
ALTER TABLE `photo_types` ENABLE KEYS;
UNLOCK TABLES;

--
-- Table structure for table `photos`
--

DROP TABLE IF EXISTS `photos`;
 SET @saved_cs_client     = @@character_set_client;
 SET character_set_client = utf8mb4;
CREATE TABLE `photos` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `file` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `total` int NOT NULL DEFAULT '1',
  `face_number` tinyint NOT NULL DEFAULT '1',
  `is_cover` tinyint NOT NULL DEFAULT '1',
  `is_paper` tinyint(1) NOT NULL DEFAULT '1',
  `descriptions` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` int unsigned NOT NULL DEFAULT '0',
  `type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=55 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
 SET character_set_client = @saved_cs_client;

--
-- Dumping data for table `photos`
--

LOCK TABLES `photos` WRITE;
ALTER TABLE `photos` DISABLE KEYS;
INSERT INTO `photos` VALUES (1,'photos/1/Dề Cương Chi Tiet Thuc Tap Doanh Ngiệp.docx',1,1,1,1,'  ',100,NULL,'2023-06-16 00:36:16','2023-06-16 00:36:19'),(2,'photos/2/application of computers in smart home.pptx',1,1,1,1,'',100,NULL,'2023-06-16 00:36:16','2023-06-16 00:36:19'),(3,'photos/3/QUY DINH CTSV NOI TRU - DH CNTT&TT VIET - HAN.pdf',2,1,1,1,'bài này photo đẹp tí nha anh',120,NULL,'2023-06-16 00:36:16','2023-06-16 00:36:19'),(4,'photos/4/DSSV tru diem ren luyen (du kien) hoc ky 2 .2022.2023.xlsx',3,1,1,1,'bài này photo đẹp tí nha anh',120,NULL,'2023-06-16 00:36:16','2023-06-16 00:36:19'),(5,'photos/5/UJwteaJoKGi4yXwYeG11GS7sluw5xqCY4vGZ22It.docx',100,2,1,0,'',0,'a4_70','2023-06-27 07:54:04','2023-06-27 07:54:04'),(6,'photos/6/SEHqxw21kN8n1NDMBjXqRd9toSGuxo9Tlr0GGx32.docx',1,1,3,0,'',0,'a4_70','2023-06-27 07:54:04','2023-06-27 07:54:04'),(7,'photos/7/phpCEDF.tmp',100,2,1,0,'',0,'a4_70','2023-06-27 07:56:28','2023-06-27 07:56:28'),(8,'photos/8/phpCEE0.tmp',1,1,3,0,'',0,'a4_70','2023-06-27 07:56:28','2023-06-27 07:56:28'),(9,'photos/9/DeCuongChiTietThucTapDoanhNgiep.docx',100,2,1,0,'',0,'a4_70','2023-06-27 07:58:00','2023-06-27 07:58:00'),(10,'photos/10/DeCuongChiTietThucTapDoanhNgiep.docx',1,1,3,0,'',0,'a4_70','2023-06-27 07:58:00','2023-06-27 07:58:00'),(14,'photos/14/CERTIFICATE.pdf',1,2,0,1,'',0,'A4_70','2023-07-02 04:34:19','2023-07-02 04:34:19'),(16,'photos/16/CERTIFICATE (2).pdf',1,1,0,1,'',10000,'A4_80','2023-07-02 04:54:33','2023-07-02 04:54:33'),(17,'photos/17/CERTIFICATE (2).pdf',1,1,0,1,'',10000,'A4_70','2023-07-02 05:08:58','2023-07-02 05:08:58'),(19,'photos/19/CERTIFICATE.pdf',1,1,0,1,'',10000,'A3','2023-07-02 05:12:07','2023-07-02 05:12:07'),(20,'photos/20/CERTIFICATE.pdf',1,1,0,1,'',0,'A3','2023-07-04 05:09:07','2023-07-04 05:09:07'),(21,'photos/21/CERTIFICATE.pdf',1,1,0,1,'',0,'A3','2023-07-04 05:09:20','2023-07-04 05:09:20'),(22,'photos/22/CERTIFICATE.pdf',1,1,0,1,'',0,'A4_80','2023-07-06 06:22:07','2023-07-06 06:22:08'),(23,'photos/23/CERTIFICATE.pdf',1,1,0,1,'',0,'A4_80','2023-07-06 06:23:42','2023-07-06 06:23:42'),(24,'photos/24/CERTIFICATE.pdf',1,1,0,1,'',0,'A4_80','2023-07-06 06:23:46','2023-07-06 06:23:46'),(25,'photos/25/CERTIFICATE.pdf',1,1,0,1,'',0,'A3','2023-07-06 06:25:25','2023-07-06 06:25:25'),(26,'photos/26/CERTIFICATE.pdf',1,1,0,1,'',0,'A3','2023-07-06 06:27:48','2023-07-06 06:27:48'),(27,'photos/27/CERTIFICATE.pdf',1,1,0,1,'',0,'A3','2023-07-06 06:28:15','2023-07-06 06:28:15'),(28,'photos/28/CERTIFICATE.pdf',1,1,0,1,'',0,'A3','2023-07-06 06:28:16','2023-07-06 06:28:16'),(29,'photos/29/CERTIFICATE.pdf',1,1,0,1,'',0,'A3','2023-07-06 06:28:19','2023-07-06 06:28:19'),(30,'photos/30/CERTIFICATE.pdf',1,1,0,1,'',0,'A3','2023-07-06 06:28:20','2023-07-06 06:28:20'),(31,'photos/31/CERTIFICATE.pdf',1,1,0,1,'',0,'A3','2023-07-06 06:28:24','2023-07-06 06:28:24'),(32,'photos/32/CERTIFICATE.pdf',1,1,0,1,'',0,'A3','2023-07-06 06:28:24','2023-07-06 06:28:24'),(33,'photos/33/CERTIFICATE.pdf',1,1,0,1,'',0,'A3','2023-07-06 06:28:28','2023-07-06 06:28:28'),(34,'photos/34/CERTIFICATE.pdf',1,1,0,1,'',0,'A3','2023-07-06 06:28:29','2023-07-06 06:28:29'),(35,'photos/35/CERTIFICATE.pdf',1,1,0,1,'',0,'A3','2023-07-06 06:28:32','2023-07-06 06:28:32'),(36,'photos/36/CERTIFICATE.pdf',1,1,0,1,'',0,'A3','2023-07-06 06:28:33','2023-07-06 06:28:33'),(37,'photos/37/CERTIFICATE.pdf',1,1,0,1,'',0,'A3','2023-07-06 06:28:36','2023-07-06 06:28:36'),(38,'photos/38/CERTIFICATE.pdf',1,1,0,1,'',0,'A3','2023-07-06 06:28:37','2023-07-06 06:28:37'),(39,'photos/39/CERTIFICATE.pdf',1,1,0,1,'',0,'A3','2023-07-06 06:28:41','2023-07-06 06:28:41'),(40,'photos/40/CERTIFICATE.pdf',1,1,0,1,'',0,'A3','2023-07-06 06:28:42','2023-07-06 06:28:42'),(41,'photos/41/CERTIFICATE.pdf',1,1,0,1,'',0,'A3','2023-07-06 06:28:47','2023-07-06 06:28:47'),(42,'photos/42/CERTIFICATE.pdf',1,1,0,1,'',0,'A3','2023-07-06 06:28:47','2023-07-06 06:28:47'),(43,'photos/43/CERTIFICATE.pdf',1,1,0,1,'',0,'A3','2023-07-06 06:28:51','2023-07-06 06:28:51'),(44,'photos/44/CERTIFICATE.pdf',1,1,0,1,'',0,'A3','2023-07-06 06:30:42','2023-07-06 06:30:42'),(45,'photos/45/CERTIFICATE.pdf',1,1,0,1,'',0,'A3','2023-07-06 06:31:06','2023-07-06 06:31:06'),(46,'photos/46/CERTIFICATE.pdf',1,1,0,1,'',0,'A3','2023-07-06 06:34:30','2023-07-06 06:34:30'),(47,'photos/47/CERTIFICATE.pdf',1,1,0,1,'',0,'A3','2023-07-06 06:35:25','2023-07-06 06:35:25'),(48,'photos/48/CERTIFICATE.pdf',1,1,0,1,'',0,'A3','2023-07-06 06:36:46','2023-07-06 06:36:46'),(49,'photos/49/CERTIFICATE.pdf',1,1,0,1,'',0,'A3','2023-07-06 06:37:46','2023-07-06 06:37:46'),(50,'photos/50/CERTIFICATE.pdf',1,1,0,1,'',0,'A3','2023-07-06 06:39:06','2023-07-06 06:39:06'),(51,'photos/51/CERTIFICATE.pdf',1,1,0,1,'',0,'A3','2023-07-06 07:08:10','2023-07-06 07:08:10'),(54,'photos/54/CERTIFICATE.pdf',1,1,0,1,'',0,'A3','2023-07-07 08:40:24','2023-07-07 08:40:24');
ALTER TABLE `photos` ENABLE KEYS;
UNLOCK TABLES;

--
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
 SET @saved_cs_client     = @@character_set_client;
 SET character_set_client = utf8mb4;
CREATE TABLE `products` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(1000) COLLATE utf8mb4_unicode_ci NOT NULL,
  `descriptions` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` bigint NOT NULL,
  `sale` int NOT NULL DEFAULT '0',
  `image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `category_id` bigint unsigned NOT NULL,
  `slug` varchar(1000) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `products_category_id_foreign` (`category_id`),
  CONSTRAINT `products_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
 SET character_set_client = @saved_cs_client;

--
-- Dumping data for table `products`
--

LOCK TABLES `products` WRITE;
ALTER TABLE `products` DISABLE KEYS;
INSERT INTO `products` VALUES (1,'máy tính','<h1 style=\"line-height: 100%;\"><span style=\"font-size: 14px;\">Mô tả chung:</span></h1>\r\n<p>Màu sắc: 123</p>\r\n<p>Kích thước: Siêu to khổng lồ luôn á nha.</p>\r\n<p>Đặc biệt là nó dài</p>',3000,5,'images/products/may-tinh/image.png',10,'may-tinh','2023-06-06 04:44:30','2023-06-29 04:57:30');
ALTER TABLE `products` ENABLE KEYS;
UNLOCK TABLES;

--
-- Table structure for table `slides`
--

DROP TABLE IF EXISTS `slides`;
 SET @saved_cs_client     = @@character_set_client;
 SET character_set_client = utf8mb4;
CREATE TABLE `slides` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `src` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `redirect` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint NOT NULL DEFAULT '1',
  `index` int NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
 SET character_set_client = @saved_cs_client;

--
-- Dumping data for table `slides`
--

LOCK TABLES `slides` WRITE;
ALTER TABLE `slides` DISABLE KEYS;
INSERT INTO `slides` VALUES (2,'images/slides/2/image.jpg','https://fast_pho.com/products?type=sale&page=1',1,4,'2023-06-17 05:06:07','2023-06-22 08:06:20'),(3,'images/slides/3/image.jpg',NULL,1,1,'2023-06-17 05:17:50','2023-06-25 12:30:27'),(5,'images/slides/5/image.png',NULL,0,2,'2023-06-17 05:45:40','2023-06-22 08:05:47'),(6,'images/slides/6/image.jpg',NULL,1,3,'2023-06-17 06:11:25','2023-06-25 12:30:27');
ALTER TABLE `slides` ENABLE KEYS;
UNLOCK TABLES;

--
-- Table structure for table `sub_products`
--

DROP TABLE IF EXISTS `sub_products`;
 SET @saved_cs_client     = @@character_set_client;
 SET character_set_client = utf8mb4;
CREATE TABLE `sub_products` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `total` int unsigned NOT NULL,
  `product_id` bigint unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `sub_products_product_id_foreign` (`product_id`),
  CONSTRAINT `sub_products_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
 SET character_set_client = @saved_cs_client;

--
-- Dumping data for table `sub_products`
--

LOCK TABLES `sub_products` WRITE;
ALTER TABLE `sub_products` DISABLE KEYS;
INSERT INTO `sub_products` VALUES (2,'Màu đỏ','images/products/may-tinh/subs/2/image.png',114,1,'2023-06-13 01:17:04','2023-07-05 03:46:50'),(3,'Màu xanh','images/products/may-tinh/subs/3/image.png',111,1,'2023-06-13 02:35:12','2023-07-06 07:15:37');
ALTER TABLE `sub_products` ENABLE KEYS;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
 SET @saved_cs_client     = @@character_set_client;
 SET character_set_client = utf8mb4;
CREATE TABLE `users` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `province` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `district` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ward` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gender` tinyint NOT NULL DEFAULT '0',
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` tinyint NOT NULL DEFAULT '0',
  `avatar` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
 SET character_set_client = @saved_cs_client;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
ALTER TABLE `users` DISABLE KEYS;
INSERT INTO `users` VALUES (1,'Alan','alan@gmail.com','0356585711','12, nguyễn huệ','01','273','09793',0,'$2y$10$SeqefP.oggyYvWlpWHA22eAPqlMnHcbIFQQrcQGBh/8221Wh8.5xe',1,'images/users/1/image.jpg',NULL,'BDL74f0kC27KhHoRdeZaZen2tQxC2Xo6dfT2sx5d0I1RtXUjXOtEr2Hj1b8Z','2023-06-03 22:39:17','2023-07-07 08:40:24'),(3,'Nguyễn Alan','alannguyen1411@gmail.com',NULL,NULL,NULL,NULL,NULL,0,'$2y$10$OJN6XECnfN./Ou1d/ZEoruCdG8PJgUVS9R4LVZhhBjh.nZwpYCgjK',0,'images/users/default_avatar.png',NULL,'Y49i50eHyMHTOqMKE3TkOQOv9RbaRPr54M9C0hbEcSIzYgMY2XpoeJlfFurZ','2023-07-07 01:38:40','2023-07-07 01:41:46');
ALTER TABLE `users` ENABLE KEYS;
UNLOCK TABLES;

--
-- Dumping routines for database 'fast_pho'
--
 SET TIME_ZONE=@OLD_TIME_ZONE;

 SET SQL_MODE=@OLD_SQL_MODE;
 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT;
 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS;
 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION;
 SET SQL_NOTES=@OLD_SQL_NOTES;

-- Dump completed on 2023-11-02  8:24:08
