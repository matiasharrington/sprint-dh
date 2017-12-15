-- MySQL dump 10.13  Distrib 5.7.17, for Win64 (x86_64)
--
-- Host: localhost    Database: planetexpress
-- ------------------------------------------------------
-- Server version	5.5.5-10.1.26-MariaDB

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
-- Table structure for table `departments`
--

DROP TABLE IF EXISTS `departments`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `departments` (
  `id_departments` int(11) NOT NULL,
  `name` varchar(500) NOT NULL,
  PRIMARY KEY (`id_departments`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `departments`
--

LOCK TABLES `departments` WRITE;
/*!40000 ALTER TABLE `departments` DISABLE KEYS */;
INSERT INTO `departments` VALUES (1,'Informatica'),(2,'Celulares'),(3,'Juegos'),(4,'Electrodomesticos'),(5,'Multimedia');
/*!40000 ALTER TABLE `departments` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `products` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `product_name` varchar(500) DEFAULT NULL,
  `product_description` varchar(500) DEFAULT 'No Tiene Descripcion',
  `product_image` varchar(500) DEFAULT 'default.png',
  `product_department` int(11) DEFAULT NULL,
  `product_price` decimal(10,2) NOT NULL,
  `product_stock` int(10) unsigned DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `product_name_UNIQUE` (`product_name`),
  KEY `departamentos_idx` (`product_department`),
  CONSTRAINT `departamentos` FOREIGN KEY (`product_department`) REFERENCES `departments` (`id_departments`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=41 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `products`
--

LOCK TABLES `products` WRITE;
/*!40000 ALTER TABLE `products` DISABLE KEYS */;
INSERT INTO `products` VALUES (1,'Procesador Intel Core i7','Procesador Intel Core i7 8700K de 8va Generacion, posee 6 cores y 12 threads a 4,7Ghz con 12Mb Cache.','procesador-intel-core-i7.png',1,15000.00,100,'2017-12-04 23:29:16','2017-12-04 23:29:16'),(2,'Procesador Intel Core i5','Procesador Intel Core i5 8600K de 8va Generacion, posee 6 cores y 6 threads a 4,3Ghz con 9Mb Cache.','procesador-intel-core-i5.png',1,8000.00,100,'2017-12-05 00:14:59','2017-12-05 00:14:59'),(3,'Procesador Intel Core i3','Procesador Intel Core i3 8350K de 8va Generacion, posee 4 cores y 4 threads a 4Ghz con 8Mb Cache.','procesador-intel-core-i3.jpg',1,5000.00,100,'2017-12-05 00:15:43','2017-12-05 01:06:27'),(4,'Notebook Lenovo 320-15IAP','Notebook Lenovo con Procesador Intel Celeron, dual core con 4 Gb de RAM y Disco Rigido de 500 Gb. Copia de Windows 10 Home Single Languaje Incluida con la compra del Producto.','notebook-lenovo-320-15iap.png',1,7500.00,50,'2017-12-05 00:17:55','2017-12-05 00:17:55'),(5,'Notebook Lenovo Yoga 2en1','Notebook Lenovo Yoga 510 con procesador Intel Core i3, dual core @ 2Ghz con 4Gb de RAM, Disco Rigido de 500G. Copia de Windows 10 Home Single Languaje Incluida con la compra del Producto.','notebook-lenovo-yoga-2en1.jpg',1,8000.00,50,'2017-12-05 00:18:48','2017-12-05 00:18:48'),(6,'Notebook Lenovo Gamer Y520','Notebook Lenovo Gamer con procesador Intel Core i5, quad core @ 2.5 Ghz con 8Gb de RAM, Disco Rigido de 1Tb y placa de video NVIDIA GTX 1050. Copia de Windows 10 Home Single Languaje Incluida con la compra del Producto.','notebook-lenovo-gamer-y520.jpg',1,24000.00,50,'2017-12-05 00:19:36','2017-12-05 00:20:00'),(7,'Gigabyte Z370 Aorus Gaming 7 Coffee Lake','Socket:    LGA 1151\r\nChipset:    Intel Z370\r\nForm Factor:    ATX\r\nVideo Ports:    DisplayPort 1.2, HDMI 1.4','gigabyte-z370-aorus-gaming-7-coffee-lake.jpg',1,4700.00,50,'2017-12-05 00:25:42','2017-12-05 00:26:43'),(8,'Fuente Pc Sentey Mbp1000-hm Gamer 80plus','1000w','fuente-pc-sentey-mbp1000-hm-gamer-80plus.jpg',1,4000.00,50,'2017-12-05 00:31:38','2017-12-05 00:31:38'),(9,'Monitor ASUS VG248QE 144Hz Gamer','Monitor asus compatible con nvidia 3D y tasa de refresco de 144hz a 1ms de respuesta','monitor-asus-vg248qe-144hz-gamer.jpg',1,13000.00,90,'2017-12-05 01:12:09','2017-12-05 01:12:09'),(10,'Celular Samsung Galaxy S8 Plus','Celular Samsung Galaxy S8 Plus con pantalla 6,2 pulgadas inmersiva, 64Gb de almacenamiento interno, expandible a 128Gb mediante memoria microSD. Viene con Android 7.0 Nougat.','celular-samsung-galaxy-s8-plus.jpg',2,29000.00,40,'2017-12-05 03:48:30','2017-12-05 03:48:30'),(11,'Celular Samsung Galaxy S8','Celular Samsung Galaxy S8 con pantalla 5,8 pulgadas inmersiva, 64Gb de almacenamiento interno, expandible a 128Gb mediante memoria microSD. Viene con Android 7.0 Nougat.','celular-samsung-galaxy-s8.jpg',2,21000.00,40,'2017-12-05 03:49:02','2017-12-05 03:49:02'),(12,'Apple iPhone 6','Capacidad: 32GB\r\nColor: Gris\r\nIncluye: Adaptador de pared x1, auriculares EarPods x1, manual de usuario, stickers Apple x2.','apple-iphone-6.jpg',2,25000.00,10,'2017-12-05 04:03:12','2017-12-05 04:03:12'),(13,'Moto G4 Plus','Lector de huellas dactilares\r\n64 GB ROM + 4 GB RAM\r\nPantalla 5,5 Pulagas','moto-g4-plus.jpg',2,5000.00,160,'2017-12-05 04:05:12','2017-12-05 04:05:12'),(14,'XBOX ONE S PACK','Xbox One S 1 TB + Forza Horizon 3','xbox-one-s-pack.jpg',3,10000.00,70,'2017-12-05 04:07:04','2017-12-05 04:07:04'),(15,'Need for speed 2015 Xbox One','Need for Speed (2015) es el vigésimo-primero videojuego de la saga Need for Speed, desarrollado por Ghost Games y publicado por Electronic Arts. El juego es un reboot de la saga Need for Speed, que trata de volver al clásico estilo de la era Underground (Need for Speed: Underground, Need for Speed: Underground 2, Need for Speed: Underground Rivals, Need for Speed: Most Wanted, Need for Speed: Carbon, Need for Speed: ProStreet y Need for Speed: Undercover) (2003-2008).','need-for-speed-2015-xbox-one.jpg',3,1200.00,99,'2017-12-05 04:08:15','2017-12-05 04:08:15'),(16,'Halo MCC Xbox One','Halo Master Chief CollectionIncluye: una versión completamente remasterizada de Halo 2: Anniversary, Halo: Combat Evolved Anniversary, Halo 3 y Halo 4 recreados con la fidelidad gráfica de Xbox One y a 60 fps, la nueva serie digital Halo: Nightfall y acceso a la Beta de Halo 5: Guardians.','default.png',3,1300.00,165,'2017-12-05 04:09:04','2017-12-05 07:17:54'),(17,'Watch Dogs Xbox One','Watch Dogs (estilizado como WATCH_DOGS) es un videojuego de mundo abierto y acción-aventura que fue desarrollado por Ubisoft Montreal para las consolas Wii U,4? PlayStation 4,5? PlayStation 3, Xbox One, Xbox 360, así como para Microsoft Windows. La demo fue presentado en la E3 de 2012 y se lanzó oficialmente el 27 de mayo de 2014 para PlayStation 3, PlayStation 4, Xbox 360 y Xbox One. La versión de Wii U se lanzó el 21 de noviembre de 2014.','watch-dogs-xbox-one.jpg',3,900.00,76,'2017-12-05 04:09:42','2017-12-05 04:09:42'),(18,'Auriculares Sony Blancos','Auriculares Sony sport para correr, Blancos','auriculares-sony-blancos.jpg',5,899.00,56,'2017-12-05 04:11:09','2017-12-05 04:11:09'),(19,'Auriculares Sony Negros','Auriculares Sony sport para correr, Negros','auriculares-sony-negros.jpg',5,899.00,78,'2017-12-05 04:11:46','2017-12-05 04:11:46'),(20,'Auriculares Sony Rojos','Auriculares Sony sport para correr, Rojos','auriculares-sony-rojos.jpg',5,899.00,54,'2017-12-05 04:12:17','2017-12-05 04:12:17'),(21,'Aire Split Inverter Samsung','Modelo: AR18KSWDAWKNAD\r\nFrio/Calor de 4300 Frigorias \r\nConsumo: 5000 Watts','aire-split-inverter-samsung.jpg',4,7000.00,65,'2017-12-05 04:14:23','2017-12-05 04:14:23'),(22,'Auriculares Sony Azules','Auriculares Sony sport para correr, Azules','auriculares-sony-azules.jpg',5,1500.00,31,'2017-12-05 07:18:47','2017-12-05 07:18:47'),(23,'Lavarropas Dream','No Tiene Descripcion','lavarropas-dream.jpg',4,10000.00,12,'2017-12-05 07:19:41','2017-12-05 07:19:41'),(24,'Planchita Para el Pelo Philips','Consumo 200W','planchita-para-el-pelo-philips.jpg',4,2000.00,134,'2017-12-05 07:20:41','2017-12-05 07:20:41'),(25,'Gabinete Corsair Carbide','Capacidad: 400cc\r\nPanel Lateral de vidrio templado: Si\r\nFuente Incluida: No','gabinete-corsair-carbide.jpg',1,1700.00,5,'2017-12-05 07:24:12','2017-12-05 07:24:12'),(26,'Procesador AMD R7 1800x','No tiene Descripcion','procesador-amd-r7-1800x.png',1,12000.00,17,'2017-12-05 07:27:04','2017-12-05 07:43:43'),(27,'Procesador AMD R5 1600x','No tiene descripcion','procesador-amd-r5-1600x.png',1,9000.00,28,'2017-12-05 07:44:44','2017-12-05 07:44:44'),(28,'Asus CROSSHAIR VI HERO Ryzen','Socket: AM4\r\nMemoria: hasta 64GB @ 2666Mhz \r\nSonido: tecnología de aislamiento SupremeFX; Sonic Studio III y Sonic Radar III','asus-crosshair-vi-hero-ryzen.jpg',1,4100.00,43,'2017-12-05 07:49:00','2017-12-05 07:49:00'),(29,'Pack Memorias 16Gb ddr3 Kingston Predator','Capacidad 16Gb\r\nConfiguracion: 2x8Gb\r\nVelocidad: 2133Mhz\r\nCantidad de canales: 2','pack-memorias-16gb-ddr3-kingston-predator.jpg',1,2300.00,14,'2017-12-05 07:52:40','2017-12-05 07:52:40'),(30,'Memoria 8gb Kingston Predator','Capacidad 16Gb\r\nConfiguracion: 1x8Gb\r\nVelocidad: 2133Mhz\r\nCantidad de canales: 1','memoria-8gb-kingston-predator.jpg',1,1150.00,13,'2017-12-05 07:54:24','2017-12-05 07:54:24'),(31,'Celular Admiral ADR9 Rosa','El celular Admiral ADR9 se caracteriza por un diseño delgado y estilizado, además de cómodo y atractivo. A través de su pantalla touch de 5 pulgadas de resolución HD (720x1280), vas a poder comunicarte y divertirte.','celular-admiral-adr9-rosa.jpg',2,4000.00,20,'2017-12-05 22:03:32','2017-12-05 22:03:32'),(32,'Celular Galaxy Note 8 Midnight Black','El Samsung Galaxy Note 8 es un smartphone de alta gama que incorpora una pantalla Super AMOLED de 6.3 pulgadas con una resolución QHD de 2960 x 1440 píxeles, donde vas a poder ver todo en gran tamaño. Además, tiene doble cámara de fotos trasera de 12 megapíxeles, 6 GB de RAM y conectividad NFC.','celular-galaxy-note-8-midnight-black.jpg',2,25000.00,50,'2017-12-05 22:06:01','2017-12-05 22:06:49'),(33,'Celular Iphone 7 plus','El iPhone 7 Plus de Apple incorpora varias novedades como una pantalla retina HD de 5,5 pulgadas retroiluminada por LED, un chip A10 Fusion con arquitectura de 64 bits, cámara trasera de 12 megapíxeles y su batería puede durar hasta 13 horas utilizándolo con red 4G LTE.','celular-iphone-7-plus.jpg',2,30000.00,7,'2017-12-05 22:10:29','2017-12-05 22:10:29'),(34,'Celular Huaweii P9 gris','El Huawei P9 cuenta con un diseño minimalista, fabricado en una única pieza de aluminio de alta resistencia. Su grosor de tan solo 6.9 mm y la cámara trasera integrada al mismo nivel de la carcasa, le otorgan un cómodo agarre. Por otro lado, posee una pantalla Full HD de 5,2 pulgadas y de resolución 1920 x 1080 píxeles.','celular-huaweii-p9-gris.jpg',2,15000.00,50,'2017-12-05 22:13:07','2017-12-05 22:13:07'),(35,'Celular Sony xperia X','El Xperia XA presenta un elegante diseño minimalista con una estructura curva y una impresionante pantalla Full HD de 5 pulgadas y una resolución de 1920x1080 píxeles. Además, abarca toda la anchura del móvil, por lo que los bordes son prácticamente invisibles y se tiene una mayor visualización de todo el contenido multimedia.','celular-sony-xperia-x.jpg',2,17569.00,9,'2017-12-05 22:17:04','2017-12-05 22:17:04'),(36,'CELULAR LG K8 2017 4G BLACK BLUE','El smartphone LG K8 presenta un diseño con una ligera curva de pantalla y una parte trasera tramada, para un mejor agarre. Su pantalla HD de 5 pulgadas (12,7 cm) cuenta con tecnología IPS LCD y una resolución de 720 x 1280 píxeles. Además, posee tecnología in-cell, que asegura una mejor visibilidad en exteriores y hace la navegación más fluida.','celular-lg-k8-2017-4g-black-blue.jpg',2,8790.00,90,'2017-12-05 22:19:17','2017-12-05 22:19:17'),(37,'PLANCHITA DE PELO Y SECADOR REMINGTON','La planchita de pelo Remington S9960 tiene 30 niveles de temperatura y alcanza los 230 grados. Sus placas flotantes con revestimiento de cerámica y microacondicionadores a base de Vitamina E y Macadamia proporcionan un alisado perfecto y un 86 % más de brillo.\r\nAdemás, dispone de autoapagado luego de 60 minutos.','planchita-de-pelo-y-secador-remington.jpg',4,5870.00,8,'2017-12-05 22:22:38','2017-12-05 22:22:38'),(38,'LICUADORA DE MANO PEABODY','La licuadora de mano Peabody PE-LM312V tiene un moderno diseño y viene en color verde. Su estructura ergonómica y el material de sus comandos permite un mejor agarre. Por otro lado, gracias a su cuchilla de acero inoxidable y pie desmontable la limpieza es más sencilla. Junto con la licuadora, viene un accesorio para batir y vaso medidor de 600 ml.','licuadora-de-mano-peabody.jpg',4,1700.00,10,'2017-12-05 22:25:42','2017-12-05 22:25:42'),(39,'TOSTADORA PEABODY PE-T8520','La tostadora Peabody PE-T8520 presenta un moderno diseño con cuerpo de acero inoxidable. Posee espacio guarda-cable en la base, bandeja colectora de migas extraíble y selector de ranura de tostado, que permite tostar de a dos panes al mismo tiempo.','tostadora-peabody-pe-t8520.jpg',4,1870.00,30,'2017-12-05 22:28:19','2017-12-05 22:28:19'),(40,'ASPIRADORA IROBOT ROOMBA 980','Aspiradora automatica ultima generation.','aspiradora-irobot-roomba-980.jpg',4,32000.00,7,'2017-12-05 22:31:33','2017-12-05 22:31:33');
/*!40000 ALTER TABLE `products` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `type` int(10) NOT NULL DEFAULT '0',
  `first_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nickname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `age` int(10) unsigned NOT NULL DEFAULT '0',
  `country` varchar(4) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `avatar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT 'default.png',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email_UNIQUE` (`email`),
  UNIQUE KEY `id_UNIQUE` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (7,1,'Matias','Harrington','dogeviper','matiasharrington@gmail.com',19,'Ar','$2y$10$Hre4W8UHTPtxzZsLN5RK3eI4DCM2ud7ZDv13xVkl/GXe1AehZyPDC','default.png','xq5n2MDoIQT3QiMyRBeR68837VvNRpRUky99evYgSC4bcg2XxoV6Bym8ndXh','2017-11-21 21:34:07','2017-11-21 21:34:07'),(8,0,'Alison','Porras','aliporras','alisonporras17@hotmail.com',21,'Ar','$2y$10$6NMIJLaoeXMGrc90pj.oee7.dZzgyAveoHv8hbb3xi3qgY12VopIO','default.png','cQrVXsqNUjUibwv6x94p2l4bEB3tRRXtJjBR8o7s0jBXzdHNiWFTQG7TRVsX','2017-11-21 21:40:19','2017-11-21 21:40:19'),(9,0,'Matias','Harrington','dogeviper999','mat@mail.com',19,'Ar','$2y$10$aDM0TjHIC.KHjoARu1pUgOpzTdaVFcp0VV//LkmrGcMmxGEM4k.sO','default.png','iSIhWtpdiBBMHRsOrx9D3wQz0dHRDcpsyybZ9U16BFp7pG4P7dXyJoPxMfC6','2017-11-24 20:27:42','2017-11-27 23:02:38'),(10,0,'tes','t','test2','test2@mail.com',123,'Br','$2y$10$owcaC2vMmcOnfXrmRO.4b.AYBCapTKj6UvWlpOnNWNnGEfKrUr1tO','default.png',NULL,'2017-11-27 23:19:28','2017-11-27 23:42:15'),(11,0,'pueto','el que lee','queteimporta','queteimporta@nojodas.com',128,'Co','$2y$10$vEBlZBeo16h/pxMYbNpAAeRiBr5CNwWfzKH4841SIWMJklnPg/w2S','queteimporta@nojodas.com.jpg',NULL,'2017-11-28 00:33:53','2017-11-28 00:34:54'),(12,0,'test2','test2','test2','test3@mail.com',21,'Ar','$2y$10$kf8l56TBL.sBqeicUHRngOZCpE.2YkSLlUDRnz8Ffn.uowuA57nD6','default.png','kVs7Cmi1oeRcMGJxR9rfT0tKb3Fh7KnfLY9QvNs2qpYGD3YtHrePXQbhtKHT','2017-11-30 21:44:00','2017-11-30 21:44:00'),(14,1,'test21','test21','test21','test21@mail.com',21,'Co','$2y$10$1WWrKaARcXN7j7kJO9NLbeH5j6h6MlZG2Z7yr/oUt9Dmejsob4se6','default.png',NULL,'2017-11-30 22:21:09','2017-11-30 22:21:09');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2017-12-15 14:47:16
