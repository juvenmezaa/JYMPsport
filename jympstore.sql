-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 15-11-2016 a las 20:26:33
-- Versión del servidor: 10.1.16-MariaDB
-- Versión de PHP: 5.6.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `jympstore`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `admins`
--

CREATE TABLE `admins` (
  `id` int(10) UNSIGNED NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `permissions` text COLLATE utf8_unicode_ci,
  `activated` tinyint(1) NOT NULL DEFAULT '0',
  `activation_code` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `activated_at` timestamp NULL DEFAULT NULL,
  `last_login` timestamp NULL DEFAULT NULL,
  `persist_code` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `reset_password_code` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `first_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `last_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `admins`
--

INSERT INTO `admins` (`id`, `email`, `password`, `permissions`, `activated`, `activation_code`, `activated_at`, `last_login`, `persist_code`, `reset_password_code`, `remember_token`, `first_name`, `last_name`, `created_at`, `updated_at`) VALUES
(1, 'admin@change.me', '$2y$10$NP8bIILtKYH8qPj1kGqlDeq9S3ll1KhYeAjsnHiO7J.2Ay8anUCt2', NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2016-11-09 12:59:40', '2016-11-09 12:59:40');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `admin_role`
--

CREATE TABLE `admin_role` (
  `role_id` int(10) UNSIGNED NOT NULL,
  `admin_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `admin_role`
--

INSERT INTO `admin_role` (`role_id`, `admin_id`) VALUES
(1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `calificaciones`
--

CREATE TABLE `calificaciones` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_usuario` int(10) UNSIGNED NOT NULL,
  `id_producto` int(10) UNSIGNED NOT NULL,
  `calificacion` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `calificaciones`
--

INSERT INTO `calificaciones` (`id`, `id_usuario`, `id_producto`, `calificacion`, `created_at`, `updated_at`) VALUES
(1, 5, 10, 5, '2016-11-11 18:41:15', '2016-11-11 18:41:15'),
(2, 5, 11, 2, '2016-11-11 18:52:03', '2016-11-11 18:52:03'),
(3, 5, 13, 1, '2016-11-11 19:12:23', '2016-11-11 19:12:23'),
(4, 5, 14, 3, '2016-11-11 19:33:41', '2016-11-11 19:33:41'),
(5, 5, 6, 3, '2016-11-11 19:58:47', '2016-11-11 19:58:47'),
(6, 5, 6, 5, NULL, NULL),
(7, 5, 2, 3, '2016-11-16 02:13:38', '2016-11-16 02:13:38'),
(8, 5, 1, 3, '2016-11-16 02:14:05', '2016-11-16 02:14:05'),
(9, 5, 4, 4, '2016-11-16 02:14:20', '2016-11-16 02:14:20'),
(10, 5, 8, 3, '2016-11-16 02:14:38', '2016-11-16 02:14:38');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `carrito`
--

CREATE TABLE `carrito` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_usuario` int(10) UNSIGNED NOT NULL,
  `id_producto` int(10) UNSIGNED NOT NULL,
  `cantidad` int(11) NOT NULL,
  `fecha_agregado` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

CREATE TABLE `categorias` (
  `id` int(10) UNSIGNED NOT NULL,
  `nombre` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `descripcion` varchar(350) COLLATE utf8_unicode_ci NOT NULL,
  `imagengen` varchar(50) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'NA.jpg',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`id`, `nombre`, `descripcion`, `imagengen`, `created_at`, `updated_at`) VALUES
(1, 'Camisa', 'Ropa blablabla', 'c1.jpg', '2016-10-10 05:30:15', '2016-10-10 05:30:15'),
(2, 'Saco', 'es pal frio', '', '2016-10-10 05:30:15', '2016-10-10 05:30:15'),
(3, 'Jeans', 'van en las piernas', '', '2016-10-10 05:30:15', '2016-10-10 05:30:15'),
(4, 'Playera', 'no tiene botones', 'c4.jpg', '2016-10-10 05:30:15', '2016-10-10 05:30:15'),
(10, 'PRUEBA', 'FUNCIONA', 'c10.jpg', NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comentarios`
--

CREATE TABLE `comentarios` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_usuario` int(10) UNSIGNED NOT NULL,
  `id_producto` int(10) UNSIGNED NOT NULL,
  `fecha` date NOT NULL,
  `comentario` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `compras`
--

CREATE TABLE `compras` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_usuario` int(10) UNSIGNED NOT NULL,
  `fecha` date NOT NULL,
  `subtotal` double NOT NULL,
  `impuesto` double NOT NULL,
  `precio_total` double NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalles_compras`
--

CREATE TABLE `detalles_compras` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_compra` int(10) UNSIGNED NOT NULL,
  `id_producto` int(10) UNSIGNED NOT NULL,
  `cantidad` int(11) NOT NULL,
  `precio_total` double NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalles_pedidos`
--

CREATE TABLE `detalles_pedidos` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_pedido` int(10) UNSIGNED NOT NULL,
  `id_producto` int(10) UNSIGNED NOT NULL,
  `cantidad` int(11) NOT NULL,
  `precio_total` double NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `links`
--

CREATE TABLE `links` (
  `id` int(10) UNSIGNED NOT NULL,
  `display` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `url` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `main` tinyint(1) DEFAULT NULL,
  `show_menu` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `links`
--

INSERT INTO `links` (`id`, `display`, `url`, `created_at`, `updated_at`, `main`, `show_menu`) VALUES
(1, 'Links', 'Link', '2016-11-09 12:59:41', '2016-11-09 12:59:49', 1, 1),
(2, 'Roles', 'Role', NULL, NULL, 1, 1),
(3, 'Permissions', 'Permission', NULL, NULL, 1, 1),
(4, 'Admins', 'Admin', NULL, '2016-11-09 12:59:49', 1, 1),
(5, 'Productos', 'productosModel', '2016-11-10 16:03:59', '2016-11-10 16:03:59', NULL, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2016_11_09_041153_create_all_tables', 1),
(4, '2014_11_16_205658_create_admins_table', 2),
(5, '2014_12_02_152920_create_password_reminders_table', 2),
(6, '2015_02_20_130902_create_url_table', 2),
(7, '2015_03_15_123956_edit_url_table', 2),
(8, '2016_02_10_181651_create_roles_tables', 2),
(9, '2016_09_20_123956_edit_url_menu_table', 2),
(10, '2016_09_20_143956_edit_roles_table', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `moderar_comentario`
--

CREATE TABLE `moderar_comentario` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_comentario` int(10) UNSIGNED NOT NULL,
  `id_usuario` int(10) UNSIGNED NOT NULL,
  `fecha` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `password_reminders`
--

CREATE TABLE `password_reminders` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedidos`
--

CREATE TABLE `pedidos` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_usuario` int(10) UNSIGNED NOT NULL,
  `fecha` date NOT NULL,
  `subtotal` double NOT NULL,
  `impuesto` double NOT NULL,
  `precio_total` double NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `permissions`
--

CREATE TABLE `permissions` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `label` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `permission_role`
--

CREATE TABLE `permission_role` (
  `permission_id` int(10) UNSIGNED NOT NULL,
  `role_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `id` int(10) UNSIGNED NOT NULL,
  `descripcion` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `precio` double NOT NULL,
  `costo` double NOT NULL,
  `visitas` bigint(20) NOT NULL DEFAULT '0',
  `color` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `imagen` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `genero` tinyint(1) NOT NULL,
  `id_categoria` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id`, `descripcion`, `precio`, `costo`, `visitas`, `color`, `imagen`, `genero`, `id_categoria`, `created_at`, `updated_at`) VALUES
(1, 'Playera hermosa', 100, 200, 0, '#29088A', 'p1.jpg', 1, 4, '2016-10-10 05:30:15', '2016-10-10 05:30:15'),
(2, 'BLUSA', 200, 120, 12, '#FFFFFF', 'P2.JPG', 1, 1, NULL, NULL),
(3, 'VARSITY SHIRT', 250, 150, 0, '#ffffff', 'p59.jpg', 0, 4, '2016-11-11 11:25:19', '2016-11-11 11:25:19'),
(4, 'GRAPHIC TEE STARWARS', 200, 150, 0, '#FFFFFF', 'p4.jpg', 1, 4, '2016-11-11 11:26:19', '2016-11-11 11:26:19'),
(5, 'SHOULDER DRESS', 500, 350, 0, '#A11437', 'p119.jpg', 0, 1, '2016-11-11 11:27:26', '2016-11-11 11:27:26'),
(6, 'GRAPHIC TEE SPIDER', 200, 150, 0, '#ff0000', 'p11.jpg', 1, 4, '2016-11-11 11:28:50', '2016-11-11 11:28:50'),
(7, 'ANKLE SKINNY  JEANS', 700, 500, 0, '#050942', 'p103.jpg', 0, 3, '2016-11-11 11:31:28', '2016-11-11 11:31:28'),
(8, 'GRAPHIC TEE NUTELLA', 200, 150, 0, '#FFFFFF', 'p7.jpg', 1, 4, '2016-11-11 12:22:01', '2016-11-11 12:22:01'),
(9, 'FORMAL PINK DRESS', 420, 280, 0, '#ffe4e1', 'p112.jpg', 0, 1, '2016-11-11 12:24:57', '2016-11-11 12:24:57'),
(10, 'BLACK JACKET', 1200, 800, 0, '#000000', 'p41.jpeg', 1, 2, '2016-11-11 12:26:02', '2016-11-11 12:26:02'),
(11, 'TOP SIN MANGA', 130, 90, 0, '#F0F0F0', 'p67.jpg', 0, 1, '2016-11-11 12:27:28', '2016-11-11 12:27:28'),
(13, 'SACO FORMAL DETALLE', 1300, 800, 0, '#000000', 'p45.jpg', 1, 2, '2016-11-11 12:29:09', '2016-11-11 12:29:09'),
(14, 'MINI SKIRT', 250, 150, 0, '#eead0e', 'p62.jpg', 0, 1, '2016-11-11 12:30:21', '2016-11-11 12:30:21');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

CREATE TABLE `roles` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `label` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `roles`
--

INSERT INTO `roles` (`id`, `name`, `label`, `created_at`, `updated_at`) VALUES
(1, 'super', 'This goup has all permissions', NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tallas`
--

CREATE TABLE `tallas` (
  `id` int(10) UNSIGNED NOT NULL,
  `talla` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `descripcion` varchar(35) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `tallas`
--

INSERT INTO `tallas` (`id`, `talla`, `descripcion`, `created_at`, `updated_at`) VALUES
(1, 'XS', 'Extra chica', '2016-10-10 05:30:15', '2016-10-10 05:30:15'),
(2, 'S', 'Chica', '2016-10-10 05:30:15', '2016-10-10 05:30:15'),
(3, 'M', 'MEDIANA', NULL, NULL),
(4, 'L', 'GRANDE', NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tallas_productos`
--

CREATE TABLE `tallas_productos` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_producto` int(10) UNSIGNED NOT NULL,
  `id_talla` int(10) UNSIGNED NOT NULL,
  `cantidad` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `tallas_productos`
--

INSERT INTO `tallas_productos` (`id`, `id_producto`, `id_talla`, `cantidad`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 5, '2016-10-10 05:30:15', '2016-10-10 05:30:15'),
(2, 1, 2, 2, '2016-10-10 05:30:15', '2016-10-10 05:30:15');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `lastname` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `birthdate` date NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `verified` tinyint(1) NOT NULL DEFAULT '0',
  `token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `type` tinyint(1) NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `name`, `lastname`, `birthdate`, `email`, `password`, `verified`, `token`, `type`, `remember_token`, `created_at`, `updated_at`) VALUES
(5, 'Pebble', 'Ad', '1993-11-27', 'pebble.ad@hotmail.com', '$2y$10$pwCVnfBaNTdG.DQVgLdAlOAjPt77oqocrhKypx507I96qncQ8Lu4e', 1, 'ckQwRZN1pwKWFVNNwrDQyAepNC9ozQXnjw1JyjUP', 1, 'CLv7A34z0mLyj98phXvCBPCEDqut0Gv3sc7bIBBaK0zFVYVpcsYfqE5Ot0JD', '2016-11-11 11:09:04', '2016-11-11 19:02:36');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admins_email_unique` (`email`),
  ADD KEY `admins_activation_code_index` (`activation_code`),
  ADD KEY `admins_reset_password_code_index` (`reset_password_code`);

--
-- Indices de la tabla `admin_role`
--
ALTER TABLE `admin_role`
  ADD PRIMARY KEY (`role_id`,`admin_id`),
  ADD KEY `admin_role_admin_id_foreign` (`admin_id`);

--
-- Indices de la tabla `calificaciones`
--
ALTER TABLE `calificaciones`
  ADD PRIMARY KEY (`id`),
  ADD KEY `calificaciones_id_usuario_foreign` (`id_usuario`),
  ADD KEY `calificaciones_id_producto_foreign` (`id_producto`);

--
-- Indices de la tabla `carrito`
--
ALTER TABLE `carrito`
  ADD PRIMARY KEY (`id`),
  ADD KEY `carrito_id_usuario_foreign` (`id_usuario`),
  ADD KEY `carrito_id_producto_foreign` (`id_producto`);

--
-- Indices de la tabla `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `comentarios`
--
ALTER TABLE `comentarios`
  ADD PRIMARY KEY (`id`),
  ADD KEY `comentarios_id_usuario_foreign` (`id_usuario`),
  ADD KEY `comentarios_id_producto_foreign` (`id_producto`);

--
-- Indices de la tabla `compras`
--
ALTER TABLE `compras`
  ADD PRIMARY KEY (`id`),
  ADD KEY `compras_id_usuario_foreign` (`id_usuario`);

--
-- Indices de la tabla `detalles_compras`
--
ALTER TABLE `detalles_compras`
  ADD PRIMARY KEY (`id`),
  ADD KEY `detalles_compras_id_compra_foreign` (`id_compra`),
  ADD KEY `detalles_compras_id_producto_foreign` (`id_producto`);

--
-- Indices de la tabla `detalles_pedidos`
--
ALTER TABLE `detalles_pedidos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `detalles_pedidos_id_pedido_foreign` (`id_pedido`),
  ADD KEY `detalles_pedidos_id_producto_foreign` (`id_producto`);

--
-- Indices de la tabla `links`
--
ALTER TABLE `links`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `moderar_comentario`
--
ALTER TABLE `moderar_comentario`
  ADD PRIMARY KEY (`id`),
  ADD KEY `moderar_comentario_id_comentario_foreign` (`id_comentario`),
  ADD KEY `moderar_comentario_id_usuario_foreign` (`id_usuario`);

--
-- Indices de la tabla `password_reminders`
--
ALTER TABLE `password_reminders`
  ADD KEY `password_reminders_email_index` (`email`),
  ADD KEY `password_reminders_token_index` (`token`);

--
-- Indices de la tabla `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`),
  ADD KEY `password_resets_token_index` (`token`);

--
-- Indices de la tabla `pedidos`
--
ALTER TABLE `pedidos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pedidos_id_usuario_foreign` (`id_usuario`);

--
-- Indices de la tabla `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `permission_role`
--
ALTER TABLE `permission_role`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `permission_role_role_id_foreign` (`role_id`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tallas`
--
ALTER TABLE `tallas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tallas_productos`
--
ALTER TABLE `tallas_productos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tallas_productos_id_producto_foreign` (`id_producto`),
  ADD KEY `tallas_productos_id_talla_foreign` (`id_talla`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `calificaciones`
--
ALTER TABLE `calificaciones`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT de la tabla `carrito`
--
ALTER TABLE `carrito`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `categorias`
--
ALTER TABLE `categorias`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT de la tabla `comentarios`
--
ALTER TABLE `comentarios`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `compras`
--
ALTER TABLE `compras`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `detalles_compras`
--
ALTER TABLE `detalles_compras`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `detalles_pedidos`
--
ALTER TABLE `detalles_pedidos`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `links`
--
ALTER TABLE `links`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT de la tabla `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT de la tabla `moderar_comentario`
--
ALTER TABLE `moderar_comentario`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `pedidos`
--
ALTER TABLE `pedidos`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT de la tabla `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `tallas`
--
ALTER TABLE `tallas`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `tallas_productos`
--
ALTER TABLE `tallas_productos`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `admin_role`
--
ALTER TABLE `admin_role`
  ADD CONSTRAINT `admin_role_admin_id_foreign` FOREIGN KEY (`admin_id`) REFERENCES `admins` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `admin_role_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `calificaciones`
--
ALTER TABLE `calificaciones`
  ADD CONSTRAINT `calificaciones_id_producto_foreign` FOREIGN KEY (`id_producto`) REFERENCES `productos` (`id`),
  ADD CONSTRAINT `calificaciones_id_usuario_foreign` FOREIGN KEY (`id_usuario`) REFERENCES `users` (`id`);

--
-- Filtros para la tabla `carrito`
--
ALTER TABLE `carrito`
  ADD CONSTRAINT `carrito_id_producto_foreign` FOREIGN KEY (`id_producto`) REFERENCES `productos` (`id`),
  ADD CONSTRAINT `carrito_id_usuario_foreign` FOREIGN KEY (`id_usuario`) REFERENCES `users` (`id`);

--
-- Filtros para la tabla `comentarios`
--
ALTER TABLE `comentarios`
  ADD CONSTRAINT `comentarios_id_producto_foreign` FOREIGN KEY (`id_producto`) REFERENCES `productos` (`id`),
  ADD CONSTRAINT `comentarios_id_usuario_foreign` FOREIGN KEY (`id_usuario`) REFERENCES `users` (`id`);

--
-- Filtros para la tabla `compras`
--
ALTER TABLE `compras`
  ADD CONSTRAINT `compras_id_usuario_foreign` FOREIGN KEY (`id_usuario`) REFERENCES `users` (`id`);

--
-- Filtros para la tabla `detalles_compras`
--
ALTER TABLE `detalles_compras`
  ADD CONSTRAINT `detalles_compras_id_compra_foreign` FOREIGN KEY (`id_compra`) REFERENCES `compras` (`id`),
  ADD CONSTRAINT `detalles_compras_id_producto_foreign` FOREIGN KEY (`id_producto`) REFERENCES `productos` (`id`);

--
-- Filtros para la tabla `detalles_pedidos`
--
ALTER TABLE `detalles_pedidos`
  ADD CONSTRAINT `detalles_pedidos_id_pedido_foreign` FOREIGN KEY (`id_pedido`) REFERENCES `pedidos` (`id`),
  ADD CONSTRAINT `detalles_pedidos_id_producto_foreign` FOREIGN KEY (`id_producto`) REFERENCES `productos` (`id`);

--
-- Filtros para la tabla `moderar_comentario`
--
ALTER TABLE `moderar_comentario`
  ADD CONSTRAINT `moderar_comentario_id_comentario_foreign` FOREIGN KEY (`id_comentario`) REFERENCES `comentarios` (`id`),
  ADD CONSTRAINT `moderar_comentario_id_usuario_foreign` FOREIGN KEY (`id_usuario`) REFERENCES `users` (`id`);

--
-- Filtros para la tabla `pedidos`
--
ALTER TABLE `pedidos`
  ADD CONSTRAINT `pedidos_id_usuario_foreign` FOREIGN KEY (`id_usuario`) REFERENCES `users` (`id`);

--
-- Filtros para la tabla `permission_role`
--
ALTER TABLE `permission_role`
  ADD CONSTRAINT `permission_role_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `permission_role_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `tallas_productos`
--
ALTER TABLE `tallas_productos`
  ADD CONSTRAINT `tallas_productos_id_producto_foreign` FOREIGN KEY (`id_producto`) REFERENCES `productos` (`id`),
  ADD CONSTRAINT `tallas_productos_id_talla_foreign` FOREIGN KEY (`id_talla`) REFERENCES `tallas` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
