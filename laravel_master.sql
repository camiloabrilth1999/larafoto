-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 20-03-2019 a las 21:51:04
-- Versión del servidor: 5.7.23
-- Versión de PHP: 7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `laravel_master`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comments`
--

DROP TABLE IF EXISTS `comments`;
CREATE TABLE IF NOT EXISTS `comments` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `user_id` int(255) DEFAULT NULL,
  `image_id` int(255) DEFAULT NULL,
  `content` text,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_comments_users` (`user_id`),
  KEY `fk_comments_images` (`image_id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `comments`
--

INSERT INTO `comments` (`id`, `user_id`, `image_id`, `content`, `created_at`, `updated_at`) VALUES
(1, 1, 4, 'Buena foto de familia!!', '2019-02-24 22:00:58', '2019-02-24 22:00:58'),
(2, 2, 1, 'Buena foto de PLAYA!!', '2019-02-24 22:00:58', '2019-02-24 22:00:58'),
(3, 2, 4, 'que bueno!!', '2019-02-24 22:00:58', '2019-02-24 22:00:58'),
(4, 16, 10, 'Que bonita mascota', '2019-03-08 16:46:41', '2019-03-08 16:46:41'),
(5, 16, 10, 'Es muy bella', '2019-03-08 16:58:19', '2019-03-08 16:58:19'),
(6, 16, 9, 'Que buena foto!', '2019-03-08 17:10:08', '2019-03-08 17:10:08'),
(7, 18, 10, 'Un cachorro!', '2019-03-08 17:17:03', '2019-03-08 17:17:03'),
(8, 18, 8, 'Se ve borrosa', '2019-03-08 17:17:21', '2019-03-08 17:17:21'),
(9, 16, 11, 'Forniteeeeeee!!', '2019-03-08 18:59:33', '2019-03-08 18:59:33'),
(10, 17, 10, 'Soy el comentario mas nuevo', '2019-03-08 19:19:12', '2019-03-08 19:19:12');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `images`
--

DROP TABLE IF EXISTS `images`;
CREATE TABLE IF NOT EXISTS `images` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `user_id` int(255) DEFAULT NULL,
  `image_path` varchar(255) DEFAULT NULL,
  `description` text,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_images_users` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `images`
--

INSERT INTO `images` (`id`, `user_id`, `image_path`, `description`, `created_at`, `updated_at`) VALUES
(5, 16, '1551944955horario.png', 'Hola', '2019-03-07 07:49:15', '2019-03-07 07:49:15'),
(6, 16, '1551945032horario.png', '123', '2019-03-07 07:50:32', '2019-03-07 07:50:32'),
(7, 17, '1551948672horario.png', 'dfhj', '2019-03-07 08:51:12', '2019-03-07 08:51:12'),
(8, 16, '1551952378photo.jpg', 'Amigos', '2019-03-07 09:52:58', '2019-03-07 09:52:58'),
(9, 17, '155195319642238174_550102202123343_8878138764556238848_n.jpg', 'Scout', '2019-03-07 10:06:36', '2019-03-07 10:06:36'),
(10, 16, '1551988020perros-hipo-2.jpg', 'Mi perro', '2019-03-07 19:47:00', '2019-03-07 19:47:00'),
(11, 18, '1552065497descarga.jfif', 'Fortnite!', '2019-03-08 17:18:17', '2019-03-08 17:18:17');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `likes`
--

DROP TABLE IF EXISTS `likes`;
CREATE TABLE IF NOT EXISTS `likes` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `user_id` int(255) DEFAULT NULL,
  `image_id` int(255) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_likes_users` (`user_id`),
  KEY `fk_likes_images` (`image_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `role` varchar(20) DEFAULT NULL,
  `name` varchar(100) DEFAULT NULL,
  `surname` varchar(200) DEFAULT NULL,
  `nick` varchar(100) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `remember_token` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `role`, `name`, `surname`, `nick`, `email`, `password`, `image`, `created_at`, `updated_at`, `remember_token`) VALUES
(16, 'user', 'Admin', 'Admin', 'admin', 'admin@admin.com', '$2y$10$U8PFsXYMKZYykaVhNetrEupUKByidhbR0h70iIrOP8wMdDgQiUpr6', '15519403975bd212cdaa733.jpeg', '2019-03-07 05:15:31', '2019-03-07 19:53:16', 'S1xejsddyJtWLjOWh2Pd4he78pRNccnOGw8ZUzxn2HkWIHzJgKHHe1MBRiHm'),
(17, 'user', 'Camilo', 'Obando', 'camiloao10', 'camiloabrilth1999@gmail.com', '$2y$10$defD6kvQobzTRmYHBA1NxOcc/YW2zj24NoTRsKv1U1Vac0xTRKqpO', '1551951497kt91RyzO_400x400.jpg', '2019-03-07 05:38:54', '2019-03-07 09:38:17', 'XfLieUYiVsMZysahbXefHdiTeKpg3ZO5KJnG4czEw5vbplfFA91oFpNs0JK1'),
(18, 'user', 'Andrés', 'Abril', 'andresao', 'andres@andres.com', '$2y$10$pLK35aYAMvz0lrsAS7u4ee1LELVonEDtJGiVZvX/FcAkNHz3IhLVi', '1552065627descarga.jfif', '2019-03-08 17:16:47', '2019-03-08 17:20:27', '5aL9zacVzn4KF94HM6j2HQ4FQXR5hV7T4dfGPXWkThjNg5Eydga4yXVfjJso');

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `fk_comments_images` FOREIGN KEY (`image_id`) REFERENCES `images` (`id`),
  ADD CONSTRAINT `fk_comments_users` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Filtros para la tabla `images`
--
ALTER TABLE `images`
  ADD CONSTRAINT `fk_images_users` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Filtros para la tabla `likes`
--
ALTER TABLE `likes`
  ADD CONSTRAINT `fk_likes_images` FOREIGN KEY (`image_id`) REFERENCES `images` (`id`),
  ADD CONSTRAINT `fk_likes_users` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
