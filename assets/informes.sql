-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 11-10-2018 a las 02:56:54
-- Versión del servidor: 10.1.36-MariaDB
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
-- Base de datos: `informes`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `callings`
--

CREATE TABLE `callings` (
  `id` int(11) NOT NULL,
  `calling` varchar(150) COLLATE utf8_spanish2_ci NOT NULL,
  `scope` int(11) NOT NULL,
  `date_added` date NOT NULL,
  `date_modified` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `callings`
--

INSERT INTO `callings` (`id`, `calling`, `scope`, `date_added`, `date_modified`) VALUES
(1, 'System Admin', 0, '2018-10-10', '2018-10-10'),
(2, 'Presidente de Estaca', 1, '2018-10-10', '2018-10-10'),
(3, 'Obispo', 2, '2018-10-10', '2018-10-10');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `calling_permissions`
--

CREATE TABLE `calling_permissions` (
  `id` int(11) NOT NULL,
  `calling_id` int(11) NOT NULL,
  `menu` int(11) NOT NULL,
  `can_view` tinyint(1) NOT NULL DEFAULT '1',
  `can_create` tinyint(1) NOT NULL DEFAULT '0',
  `can_edit` tinyint(1) NOT NULL DEFAULT '0',
  `can_delete` int(11) NOT NULL DEFAULT '0',
  `date_added` date NOT NULL,
  `date_modified` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `calling_permissions`
--

INSERT INTO `calling_permissions` (`id`, `calling_id`, `menu`, `can_view`, `can_create`, `can_edit`, `can_delete`, `date_added`, `date_modified`) VALUES
(1, 1, 1, 1, 0, 0, 0, '2018-10-10', '2018-10-10');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `church_unit`
--

CREATE TABLE `church_unit` (
  `id` int(11) NOT NULL,
  `unit_name` varchar(120) COLLATE utf8_spanish2_ci NOT NULL,
  `unit_number` int(11) NOT NULL,
  `unit_parent` int(11) NOT NULL,
  `date_added` date NOT NULL,
  `date_modified` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `church_unit`
--

INSERT INTO `church_unit` (`id`, `unit_name`, `unit_number`, `unit_parent`, `date_added`, `date_modified`) VALUES
(1, 'global', 0, 0, '2018-10-10', '2018-10-10'),
(2, 'Estaca Maracay', 520209, 1, '2018-10-10', '2018-10-10'),
(3, 'Barrio Libertador', 466824, 2, '2018-10-10', '2018-10-10');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `informe_mnmva`
--

CREATE TABLE `informe_mnmva` (
  `id` int(11) NOT NULL,
  `type` varchar(20) COLLATE utf8_spanish2_ci NOT NULL,
  `name` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `unit` int(11) NOT NULL,
  `baptism_date` date NOT NULL,
  `confirm_date` date NOT NULL,
  `edad` int(11) NOT NULL,
  `gender` set('H','M') COLLATE utf8_spanish2_ci NOT NULL,
  `bishop_interview` date DEFAULT NULL,
  `aaronic_priesthood` date DEFAULT NULL,
  `priesthood` set('Diacono','Maestro','Presbitero','Elder','No Ordenado','No Aplica') COLLATE utf8_spanish2_ci NOT NULL DEFAULT 'No Ordenado',
  `gospel_principals` date DEFAULT NULL,
  `lessons_start` date DEFAULT NULL,
  `lessons_end` date DEFAULT NULL,
  `calling_date` date DEFAULT NULL,
  `asistance` date DEFAULT NULL,
  `genealogy` date DEFAULT NULL,
  `melchisedeq` date DEFAULT NULL,
  `vicary_baptism` date DEFAULT NULL,
  `temple_prep` date DEFAULT NULL,
  `temple_inv` date DEFAULT NULL,
  `temple_sel` date DEFAULT NULL,
  `date_added` date DEFAULT NULL,
  `date_modified` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `informe_mnmva`
--

INSERT INTO `informe_mnmva` (`id`, `type`, `name`, `unit`, `baptism_date`, `confirm_date`, `edad`, `gender`, `bishop_interview`, `aaronic_priesthood`, `priesthood`, `gospel_principals`, `lessons_start`, `lessons_end`, `calling_date`, `asistance`, `genealogy`, `melchisedeq`, `vicary_baptism`, `temple_prep`, `temple_inv`, `temple_sel`, `date_added`, `date_modified`) VALUES
(1, 'new member', 'test person', 3, '2018-09-29', '2018-09-30', 31, '', '2018-10-07', '2018-10-07', 'Presbitero', '2018-09-30', '2018-10-05', NULL, '2018-10-30', '2018-10-07', '2018-09-30', '2018-09-30', '2018-10-06', '2018-10-09', '2018-10-10', '2018-10-10', '2018-10-10', '2018-10-10'),
(2, 'new member', 'test person', 3, '2018-09-29', '2018-09-30', 31, '', '2018-10-07', '2018-10-07', 'Presbitero', '2018-09-30', '2018-10-05', NULL, '2018-10-30', '2018-10-07', '2018-09-30', '2018-09-30', '2018-10-06', '2018-10-09', '2018-10-10', '2018-10-10', '2018-10-10', '2018-10-10'),
(3, 'new member', 'test person', 3, '2018-09-29', '2018-09-30', 31, '', '2018-10-07', '2018-10-07', 'Presbitero', '2018-09-30', '2018-10-05', NULL, '2018-10-30', '2018-10-07', '2018-09-30', '2018-09-30', '2018-10-06', '2018-10-09', '2018-10-10', '2018-10-10', '2018-10-10', '2018-10-10'),
(4, 'new member', 'test person', 3, '2018-09-29', '2018-09-30', 31, '', '2018-10-07', '2018-10-07', 'Presbitero', '2018-09-30', '2018-10-05', NULL, '2018-10-30', '2018-10-07', '2018-09-30', '2018-09-30', '2018-10-06', '2018-10-09', '2018-10-10', '2018-10-10', '2018-10-10', '2018-10-10'),
(5, 'new member', 'test person', 3, '2018-09-29', '2018-09-30', 31, '', '2018-10-07', '2018-10-07', 'Presbitero', '2018-09-30', '2018-10-05', NULL, '2018-10-30', '2018-10-07', '2018-09-30', '2018-09-30', '2018-10-06', '2018-10-09', '2018-10-10', '2018-10-10', '2018-10-10', '2018-10-10'),
(6, 'new member', 'test person', 3, '2018-09-29', '2018-09-30', 31, '', '2018-10-07', '2018-10-07', 'Presbitero', '2018-09-30', '2018-10-05', NULL, '2018-10-30', '2018-10-07', '2018-09-30', '2018-09-30', '2018-10-06', '2018-10-09', '2018-10-10', '2018-10-10', '2018-10-10', '2018-10-10'),
(7, 'new member', 'test person', 3, '2018-09-29', '2018-09-30', 31, '', '2018-10-07', '2018-10-07', 'Presbitero', '2018-09-30', '2018-10-05', NULL, '2018-10-30', '2018-10-07', '2018-09-30', '2018-09-30', '2018-10-06', '2018-10-09', '2018-10-10', '2018-10-10', '2018-10-10', '2018-10-10'),
(8, 'new member', 'test person', 3, '2018-09-29', '2018-09-30', 31, '', '2018-10-07', '2018-10-07', 'Presbitero', '2018-09-30', '2018-10-05', NULL, '2018-10-30', '2018-10-07', '2018-09-30', '2018-09-30', '2018-10-06', '2018-10-09', '2018-10-10', '2018-10-10', '2018-10-10', '2018-10-10'),
(9, 'new member', 'test person', 3, '2018-09-29', '2018-09-30', 31, '', '2018-10-07', '2018-10-07', 'Presbitero', '2018-09-30', '2018-10-05', NULL, '2018-10-30', '2018-10-07', '2018-09-30', '2018-09-30', '2018-10-06', '2018-10-09', '2018-10-10', '2018-10-10', '2018-10-10', '2018-10-10'),
(10, 'new member', 'test person', 3, '2018-09-29', '2018-09-30', 31, '', '2018-10-07', '2018-10-07', 'Presbitero', '2018-09-30', '2018-10-05', NULL, '2018-10-30', '2018-10-07', '2018-09-30', '2018-09-30', '2018-10-06', '2018-10-09', '2018-10-10', '2018-10-10', '2018-10-10', '2018-10-10'),
(11, 'new member', 'test person', 3, '2018-09-29', '2018-09-30', 31, '', '2018-10-07', '2018-10-07', 'Presbitero', '2018-09-30', '2018-10-05', NULL, '2018-10-30', '2018-10-07', '2018-09-30', '2018-09-30', '2018-10-06', '2018-10-09', '2018-10-10', '2018-10-10', '2018-10-10', '2018-10-10'),
(12, 'new member', 'test person', 3, '2018-09-29', '2018-09-30', 31, '', '2018-10-07', '2018-10-07', 'Presbitero', '2018-09-30', '2018-10-05', NULL, '2018-10-30', '2018-10-07', '2018-09-30', '2018-09-30', '2018-10-06', '2018-10-09', '2018-10-10', '2018-10-10', '2018-10-10', '2018-10-10'),
(13, 'new member', 'Fulanito Perenseo', 3, '2018-09-15', '2018-09-16', 42, 'H', '2018-10-07', NULL, 'No Ordenado', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-10-11', '2018-10-11');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `menu`
--

CREATE TABLE `menu` (
  `id` int(11) NOT NULL,
  `menu_item` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `icon` varchar(25) COLLATE utf8_spanish2_ci NOT NULL,
  `parent` int(11) NOT NULL,
  `url` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `class` varchar(150) COLLATE utf8_spanish2_ci NOT NULL,
  `date_added` date NOT NULL,
  `date_modified` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `menu`
--

INSERT INTO `menu` (`id`, `menu_item`, `icon`, `parent`, `url`, `class`, `date_added`, `date_modified`) VALUES
(1, 'Informe MNMVA', 'settings', 0, 'mnmva/', 'matrial-icons', '2018-10-10', '2018-10-10'),
(3, 'Lista', 'list', 1, 'mnmva/listall', 'material-icons', '2018-10-10', '2018-10-10'),
(4, 'Nuevo', 'person_add', 1, 'mnmva/addmn', 'material-icons', '2018-10-10', '2018-10-10');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `permissions`
--

CREATE TABLE `permissions` (
  `permissionID` int(11) NOT NULL,
  `permission` varchar(200) DEFAULT NULL,
  `key` varchar(100) DEFAULT NULL,
  `category` varchar(100) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `permission_groups`
--

CREATE TABLE `permission_groups` (
  `groupID` int(11) NOT NULL,
  `groupName` varchar(200) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `permission_map`
--

CREATE TABLE `permission_map` (
  `groupID` int(11) NOT NULL DEFAULT '0',
  `permissionID` int(11) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `firstname` varchar(25) COLLATE utf8_spanish2_ci NOT NULL,
  `lastname` varchar(25) COLLATE utf8_spanish2_ci NOT NULL,
  `login` varchar(25) COLLATE utf8_spanish2_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_spanish2_ci NOT NULL,
  `email` varchar(200) COLLATE utf8_spanish2_ci NOT NULL,
  `church_unit` int(11) NOT NULL,
  `calling` int(11) NOT NULL,
  `date_added` date NOT NULL,
  `date_modified` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `firstname`, `lastname`, `login`, `password`, `email`, `church_unit`, `calling`, `date_added`, `date_modified`) VALUES
(1, 'admin', 'user', 'master', '25f9e794323b453885f5181f1b624d0b', 'superpujol@gmail.com', 1, 1, '2018-10-10', '2018-10-10'),
(2, 'jarvis', 'pujol', 'jpujol', '5b9495f393808ce0f09ccdae9dc3a321', 'jarvispujol@yahoo.com', 3, 3, '2018-10-10', '2018-10-10');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `user_callings`
--

CREATE TABLE `user_callings` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_calling` int(11) NOT NULL,
  `date_added` date NOT NULL,
  `date_modified` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `user_callings`
--

INSERT INTO `user_callings` (`id`, `id_user`, `id_calling`, `date_added`, `date_modified`) VALUES
(1, 1, 1, '2018-10-10', '2018-10-10');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `callings`
--
ALTER TABLE `callings`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `calling_permissions`
--
ALTER TABLE `calling_permissions`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `church_unit`
--
ALTER TABLE `church_unit`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `informe_mnmva`
--
ALTER TABLE `informe_mnmva`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`permissionID`),
  ADD UNIQUE KEY `key` (`key`);

--
-- Indices de la tabla `permission_groups`
--
ALTER TABLE `permission_groups`
  ADD PRIMARY KEY (`groupID`);

--
-- Indices de la tabla `permission_map`
--
ALTER TABLE `permission_map`
  ADD PRIMARY KEY (`groupID`,`permissionID`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `user_callings`
--
ALTER TABLE `user_callings`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `callings`
--
ALTER TABLE `callings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `calling_permissions`
--
ALTER TABLE `calling_permissions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `church_unit`
--
ALTER TABLE `church_unit`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `informe_mnmva`
--
ALTER TABLE `informe_mnmva`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `menu`
--
ALTER TABLE `menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `permissions`
--
ALTER TABLE `permissions`
  MODIFY `permissionID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;

--
-- AUTO_INCREMENT de la tabla `permission_groups`
--
ALTER TABLE `permission_groups`
  MODIFY `groupID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `user_callings`
--
ALTER TABLE `user_callings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
