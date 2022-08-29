-- Servidor: localhost:3306
-- Tiempo de generación: 29-08-2022 a las 11:18:59
-- Versión del servidor: 5.7.34-log
-- Versión de PHP: 8.1.9

DROP TABLE IF EXISTS `productos`;
DROP TABLE IF EXISTS `users`;
--
-- Table structure for table `users`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `email` varchar(60) COLLATE utf8_spanish_ci NOT NULL,
  `password` varchar(60) COLLATE utf8_spanish_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;


--
-- Table structure for table `productos`
--
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `productos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `producto` varchar(60) COLLATE utf8_spanish_ci NOT NULL,
  `descripcion` text COLLATE utf8_spanish_ci NOT NULL,
  `precio` decimal(11,2) NOT NULL,
  `estado` tinyint(4) NOT NULL DEFAULT '1',
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `productos_user_id_foreign` (`user_id`),
  CONSTRAINT `productos_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
-- INSERT INTO `users` VALUES (1,'admin mvc','admin@admin.com','$2y$10$AXCx7NPfJIyGkWtqQyiNoOD8MxmgqwhTHXAWsMPIiL63CNOJphWja','2022-08-29 10:55:04',NULL);
INSERT INTO `users` (`id`, `name`, `email`, `password`, `created_at`, `updated_at`) VALUES
(1, 'admin mvc', 'admin@admin.com', '$2y$10$AXCx7NPfJIyGkWtqQyiNoOD8MxmgqwhTHXAWsMPIiL63CNOJphWja', '2022-08-29 10:55:04', NULL);
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `productos`
--

LOCK TABLES `productos` WRITE;
/*!40000 ALTER TABLE `productos` DISABLE KEYS */;
-- INSERT INTO `productos` VALUES (1,'mesa','madera roble',125.00,1,1,'2022-08-29 11:18:34',NULL);
INSERT INTO `productos` (`id`, `producto`, `descripcion`, `precio`, `estado`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 'mesa', 'madera roble', '125.00', 1, 1, '2022-08-29 11:18:34', NULL);
/*!40000 ALTER TABLE `productos` ENABLE KEYS */;
UNLOCK TABLES;

-- Dump completed on 2022-08-29  6:30:25
