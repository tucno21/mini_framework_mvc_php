-- Servidor: localhost:3306
-- Tiempo de generación: 29-08-2022 a las 11:18:59
-- Versión del servidor: 5.7.34-log
-- Versión de PHP: 8.1.9

DROP TABLE IF EXISTS `roles_permisos`;
DROP TABLE IF EXISTS `users`;
DROP TABLE IF EXISTS `productos`;
DROP TABLE IF EXISTS `roles`;
DROP TABLE IF EXISTS `permisos`;
--
-- Table structure for table `roles`
--
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `roles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `rol_name` varchar(60) COLLATE utf8_spanish_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `permisos`
--
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `permisos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `per_name` varchar(60) COLLATE utf8_spanish_ci NOT NULL,
  `description` varchar(60) COLLATE utf8_spanish_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `roles_permisos`
--
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `roles_permisos` (
  `permiso_id` int(11) NOT NULL,
  `rol_id` int(11) NOT NULL,
  KEY `fk_permisos` (`permiso_id`),
  KEY `fk_rol` (`rol_id`),
  CONSTRAINT `fk_permisos` FOREIGN KEY (`permiso_id`) REFERENCES `permisos` (`id`) ON DELETE CASCADE,
  CONSTRAINT `fk_rol` FOREIGN KEY (`rol_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

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
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `rol_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_roles_user` (`rol_id`),
  CONSTRAINT `fk_roles_user` FOREIGN KEY (`rol_id`) REFERENCES `roles` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;
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
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `roles`
--

LOCK TABLES `roles` WRITE;
/*!40000 ALTER TABLE `roles` DISABLE KEYS */;
INSERT INTO `roles` (`rol_name`, `created_at`, `updated_at`) VALUES
('SuperAdministrador', NULL, NULL),
('Visita', NULL, NULL),
('Contador', NULL, NULL);
/*!40000 ALTER TABLE `roles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `permisos`
--

LOCK TABLES `permisos` WRITE;
/*!40000 ALTER TABLE `permisos` DISABLE KEYS */;
INSERT INTO `permisos` (`per_name`, `description`, `created_at`, `updated_at`) VALUES
('dashboard', 'ver dashboard', '2022-09-08 01:57:37', NULL),
('users', 'ver usuarios', '2022-09-08 02:00:36', NULL),
('users.create', ' crear usuarios', '2022-09-08 02:00:52', NULL),
('users.edit', 'editar usarios', '2022-09-08 02:01:13', NULL),
('users.destroy', 'eliminar usuario', '2022-09-08 02:01:34', NULL),
('roles', 'ver roles', '2022-09-08 02:02:00', NULL),
('roles.create', 'crear roles', '2022-09-08 02:02:16', NULL),
('roles.edit', 'editar roles', '2022-09-08 02:02:31', NULL),
('roles.destroy', 'eliminar roles', '2022-09-08 02:02:45', NULL),
('products', 'ver productos', '2022-09-08 02:03:25', NULL),
('products.create', 'crear productos', '2022-09-08 02:03:44', NULL),
('products.edit', 'editar productos', '2022-09-08 02:03:58', NULL),
('products.destroy', 'eliminar productos', '2022-09-08 02:04:16', NULL),
('roles.permissions', 'configurar permisos de rol', '2022-09-08 03:23:15', NULL);
UNLOCK TABLES;

--
-- Dumping data for table `roles_permisos`
--

LOCK TABLES `roles_permisos` WRITE;
/*!40000 ALTER TABLE `roles_permisos` DISABLE KEYS */;
INSERT INTO `roles_permisos` (`permiso_id`, `rol_id`) VALUES
(1, 1),
(2, 1),
(3, 1),
(4, 1),
(5, 1),
(6, 1),
(7, 1),
(8, 1),
(9, 1),
(10, 1),
(11, 1),
(12, 1),
(13, 1),
(14, 1);
/*!40000 ALTER TABLE `roles_permisos` ENABLE KEYS */;
UNLOCK TABLES;


--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`name`, `email`, `password`, `status`, `rol_id`, `created_at`, `updated_at`) VALUES
('Super admin', 'admin@admin.com', '$2y$10$AXCx7NPfJIyGkWtqQyiNoOD8MxmgqwhTHXAWsMPIiL63CNOJphWja', 1, 1, '2022-08-29 15:55:04', NULL);
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `productos`
--

LOCK TABLES `productos` WRITE;
/*!40000 ALTER TABLE `productos` DISABLE KEYS */;
INSERT INTO `productos` (`producto`, `descripcion`, `precio`, `estado`, `user_id`, `created_at`, `updated_at`) VALUES
('mesa', 'madera roble', '125.00', 1, 1, '2022-08-29 11:18:34', NULL);
/*!40000 ALTER TABLE `productos` ENABLE KEYS */;
UNLOCK TABLES;

-- Dump completed on 2022-08-29  6:30:25
