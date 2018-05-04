-- phpMyAdmin SQL Dump
-- version 4.3.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Sep 28, 2016 at 10:04 PM
-- Server version: 5.6.24
-- PHP Version: 5.6.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `meat`
--

-- --------------------------------------------------------

--
-- Table structure for table `eventos`
--

CREATE TABLE IF NOT EXISTS `eventos` (
  `id` int(10) unsigned NOT NULL,
  `nombre` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `direccion` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `fecha` date NOT NULL,
  `hora` time NOT NULL,
  `descripcion` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `latitud` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `longitud` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `cerrado` tinyint(1) DEFAULT NULL,
  `metodocuenta` int(11) DEFAULT NULL,
  `menoresmax` int(11) NOT NULL,
  `adultosmax` int(11) NOT NULL,
  `creador` int(10) unsigned DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `eventos`
--

INSERT INTO `eventos` (`id`, `nombre`, `direccion`, `fecha`, `hora`, `descripcion`, `latitud`, `longitud`, `cerrado`, `metodocuenta`, `menoresmax`, `adultosmax`, `creador`, `created_at`, `updated_at`) VALUES
(1, 'evento2', 'una casa', '2016-09-13', '21:56:00', 'un evento en una casa', '-41.133472', '-71.310278', NULL, NULL, 0, 2, NULL, '2016-09-07 07:08:22', '2016-09-07 07:08:22'),
(2, 'evento2', 'una casa', '2016-09-13', '21:56:00', 'un evento en una casa', '-41.133472', '-71.310278', NULL, NULL, 0, 2, NULL, '2016-09-07 07:09:51', '2016-09-07 07:09:51'),
(3, '', 'my house', '2016-09-30', '01:00:00', 'come on', '-41.133472', '-71.310278', NULL, NULL, 0, 10, NULL, '2016-09-15 05:54:48', '2016-09-15 05:54:48'),
(4, '', 'la big casa', '2016-09-30', '01:00:00', 'es el big evento en la big casa', '-41.133472', '-71.310278', NULL, NULL, 1, 31, NULL, '2016-09-15 05:56:17', '2016-09-15 05:56:17'),
(5, '', 'UNA HOUSE', '2016-09-24', '02:03:00', 'cumple in da big house', '-41.133472', '-71.310278', NULL, NULL, 0, 19, NULL, '2016-09-15 05:57:36', '2016-09-15 05:57:36');

-- --------------------------------------------------------

--
-- Table structure for table `fotos`
--

CREATE TABLE IF NOT EXISTS `fotos` (
  `id` int(10) unsigned NOT NULL,
  `idevento` int(10) unsigned NOT NULL,
  `titulo` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `photo` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `invitados`
--

CREATE TABLE IF NOT EXISTS `invitados` (
  `id` int(10) unsigned NOT NULL,
  `idevento` int(10) unsigned NOT NULL,
  `idusuario` int(10) unsigned NOT NULL,
  `email` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `rol` tinyint(1) NOT NULL,
  `menores` int(11) NOT NULL,
  `adultos` int(11) NOT NULL,
  `confirmado` tinyint(1) NOT NULL,
  `notificado` tinyint(1) NOT NULL,
  `costo` double NOT NULL,
  `gasto` double NOT NULL,
  `balance` double NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE IF NOT EXISTS `items` (
  `id` int(10) unsigned NOT NULL,
  `idevento` int(10) unsigned NOT NULL,
  `nombre` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `cantidad` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `itemsoks`
--

CREATE TABLE IF NOT EXISTS `itemsoks` (
  `id` int(10) unsigned NOT NULL,
  `iditem` int(10) unsigned NOT NULL,
  `cantidad` int(11) NOT NULL,
  `idusuario` int(10) unsigned NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `log_eventos`
--

CREATE TABLE IF NOT EXISTS `log_eventos` (
  `id` int(10) unsigned NOT NULL,
  `evento_l` int(10) unsigned NOT NULL,
  `fecha_l` date NOT NULL,
  `hora_l` time NOT NULL,
  `username_l` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `mensaje` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE IF NOT EXISTS `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`migration`, `batch`) VALUES
('2014_11_13_003255_usuarios', 1),
('2014_11_13_010016_eventos', 1),
('2014_11_13_010118_invitados', 1),
('2014_11_13_010149_items', 1),
('2014_11_13_010215_itemsoks', 1),
('2014_11_13_010237_fotos', 1),
('2015_01_26_023425_Log_eventos', 1);

-- --------------------------------------------------------

--
-- Table structure for table `usuarios`
--

CREATE TABLE IF NOT EXISTS `usuarios` (
  `id` int(10) unsigned NOT NULL,
  `username` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `apellido` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `nacimiento` date NOT NULL,
  `sexo` tinyint(1) NOT NULL,
  `email` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `provincia` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `ciudad` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `usuarios`
--

INSERT INTO `usuarios` (`id`, `username`, `apellido`, `password`, `nacimiento`, `sexo`, `email`, `provincia`, `ciudad`, `created_at`, `updated_at`) VALUES
(7, 'Gaston', 'Doiz', 'thor', '0000-00-00', 0, 'gaston@mail.com', 'bs as', 'Bariloche', '2016-09-07 04:12:26', '2016-09-07 04:12:26'),
(8, 'pepe', 'grillo', 'pepe', '0000-00-00', 0, 'pepe@mail.com', 'bs as', 'el palomar', '2016-09-26 16:30:39', '2016-09-26 16:30:39'),
(10, 'cris', 'fajardo', 'nena', '0000-00-00', 0, 'cris@mail.com', 'bs as', 'bariloche', '2016-09-26 17:20:01', '2016-09-26 17:20:01'),
(11, 'asdf', 'ñlkjh', 'pepa', '0000-00-00', 0, 'exsamo@mail.com', 'santa cruz', 'lskndal', '2016-09-28 08:24:39', '2016-09-28 08:24:39'),
(12, 'asdf', 'ñlkjh', 'pepa', '0000-00-00', 0, 'exsamo@mail.com', 'santa cruz', 'lskndal', '2016-09-28 08:26:38', '2016-09-28 08:26:38');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `eventos`
--
ALTER TABLE `eventos`
  ADD PRIMARY KEY (`id`), ADD KEY `eventos_creador_foreign` (`creador`);

--
-- Indexes for table `fotos`
--
ALTER TABLE `fotos`
  ADD PRIMARY KEY (`id`), ADD KEY `fotos_idevento_foreign` (`idevento`);

--
-- Indexes for table `invitados`
--
ALTER TABLE `invitados`
  ADD PRIMARY KEY (`id`), ADD KEY `invitados_idevento_foreign` (`idevento`), ADD KEY `invitados_idusuario_foreign` (`idusuario`);

--
-- Indexes for table `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`id`), ADD KEY `items_idevento_foreign` (`idevento`);

--
-- Indexes for table `itemsoks`
--
ALTER TABLE `itemsoks`
  ADD PRIMARY KEY (`id`), ADD KEY `itemsoks_iditem_foreign` (`iditem`), ADD KEY `itemsoks_idusuario_foreign` (`idusuario`);

--
-- Indexes for table `log_eventos`
--
ALTER TABLE `log_eventos`
  ADD PRIMARY KEY (`id`), ADD KEY `log_eventos_evento_l_foreign` (`evento_l`);

--
-- Indexes for table `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `eventos`
--
ALTER TABLE `eventos`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `fotos`
--
ALTER TABLE `fotos`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `invitados`
--
ALTER TABLE `invitados`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `items`
--
ALTER TABLE `items`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `itemsoks`
--
ALTER TABLE `itemsoks`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `log_eventos`
--
ALTER TABLE `log_eventos`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=13;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `eventos`
--
ALTER TABLE `eventos`
ADD CONSTRAINT `eventos_creador_foreign` FOREIGN KEY (`creador`) REFERENCES `usuarios` (`id`);

--
-- Constraints for table `fotos`
--
ALTER TABLE `fotos`
ADD CONSTRAINT `fotos_idevento_foreign` FOREIGN KEY (`idevento`) REFERENCES `eventos` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `invitados`
--
ALTER TABLE `invitados`
ADD CONSTRAINT `invitados_idevento_foreign` FOREIGN KEY (`idevento`) REFERENCES `eventos` (`id`) ON DELETE CASCADE,
ADD CONSTRAINT `invitados_idusuario_foreign` FOREIGN KEY (`idusuario`) REFERENCES `usuarios` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `items`
--
ALTER TABLE `items`
ADD CONSTRAINT `items_idevento_foreign` FOREIGN KEY (`idevento`) REFERENCES `eventos` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `itemsoks`
--
ALTER TABLE `itemsoks`
ADD CONSTRAINT `itemsoks_iditem_foreign` FOREIGN KEY (`iditem`) REFERENCES `items` (`id`) ON DELETE CASCADE,
ADD CONSTRAINT `itemsoks_idusuario_foreign` FOREIGN KEY (`idusuario`) REFERENCES `usuarios` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `log_eventos`
--
ALTER TABLE `log_eventos`
ADD CONSTRAINT `log_eventos_evento_l_foreign` FOREIGN KEY (`evento_l`) REFERENCES `eventos` (`id`) ON DELETE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
