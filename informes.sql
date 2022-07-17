-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 23-10-2018 a las 20:27:20
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
(1, 'System Admin', 1, '2018-10-10', '2018-10-10'),
(2, 'Presidente de Estaca', 1, '2018-10-10', '2018-10-10'),
(3, 'Obispo', 2, '2018-10-10', '2018-10-10'),
(4, 'Lider Misional', 2, '2018-10-19', '2018-10-19'),
(5, '1er Concejero del Obispo', 2, '2018-10-19', '2018-10-19'),
(6, '2do Concejero del obispo', 2, '2018-10-19', '2018-10-19'),
(7, '1er Consejero Pdte. Estaca', 1, '2018-10-19', '2018-10-19'),
(8, '2do Consejero Pdte. Estaca', 1, '2018-10-19', '2018-10-19'),
(9, 'Presidente de Concejo de Coordinacion', 1, '2018-10-10', '2018-10-10');

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
  `unit_type` set('leaf','branch','root','') COLLATE utf8_spanish2_ci NOT NULL,
  `date_added` date NOT NULL,
  `date_modified` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `church_unit`
--

INSERT INTO `church_unit` (`id`, `unit_name`, `unit_number`, `unit_parent`, `unit_type`, `date_added`, `date_modified`) VALUES
(1, 'global', 0, 0, 'root', '2018-10-10', '2018-10-10'),
(2, 'Estaca Maracay', 520209, 8, 'branch', '2018-10-10', '2018-10-10'),
(3, 'Barrio Libertador', 466824, 2, 'leaf', '2018-10-10', '2018-10-10'),
(4, 'Barrio La Morita', 258164, 2, 'leaf', '2018-10-17', '2018-10-17'),
(5, 'Barrio Girardot', 78905, 2, 'leaf', '2018-10-17', '2018-10-17'),
(6, 'Barrio Las Delicias', 164658, 2, 'leaf', '2018-10-17', '2018-10-17'),
(7, 'Barrio La Romana', 220418, 2, 'leaf', '2018-10-17', '2018-10-17'),
(8, 'Concejo de Coordinacion Valencia', 999999, 1, 'branch', '2018-10-10', '2018-10-10');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `informe_mnmva`
--

CREATE TABLE `informe_mnmva` (
  `id` int(11) NOT NULL,
  `type` varchar(20) COLLATE utf8_spanish2_ci NOT NULL,
  `name` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `unit` int(11) NOT NULL,
  `edad` int(11) NOT NULL,
  `gender` set('H','M') COLLATE utf8_spanish2_ci NOT NULL,
  
  
  `baptism_date` date NOT NULL,
  `confirm_date` date NOT NULL,
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
(1, 'Panel', 'dashboard', 0, 'mnmva/', 'material-icons', '2018-10-10', '2018-10-10'),
(3, 'Lista', 'list', 1, 'mnmva/listall', 'material-icons', '2018-10-10', '2018-10-10'),
(4, 'Nuevo', 'person_add', 1, 'mnmva/addmn', 'material-icons', '2018-10-10', '2018-10-10'),
(5, 'Configuracion', 'settings', 0, 'admin', 'material-icons', '2018-10-20', '2018-10-20'),
(6, 'Agregar Usuario', 'add_circle_outline', 5, 'admin/adduser', 'material-icons', '2018-10-20', '2018-10-20'),
(7, 'Editar Usuario', 'settings_input_composite', 5, 'admin/edituser', 'material-icons', '2018-10-20', '2018-10-20');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `permissions`
--

CREATE TABLE `permissions` (
  `permissionID` int(11) NOT NULL,
  `permission` varchar(200) CHARACTER SET utf8 COLLATE utf8_spanish_ci DEFAULT NULL,
  `key` varchar(100) CHARACTER SET utf8 COLLATE utf8_spanish_ci DEFAULT NULL,
  `category` varchar(100) CHARACTER SET utf8 COLLATE utf8_spanish_ci DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `permissions`
--

INSERT INTO `permissions` (`permissionID`, `permission`, `key`, `category`) VALUES
(68, 'editar', 'edit_mnmva', 'mnmva'),
(69, 'crear', 'create_mnmva', 'mnmva'),
(70, 'view', 'view_list', 'mnmva'),
(71, 'panel', 'view_panel', 'mnmva'),
(72, 'editar', 'edit_user', 'admin'),
(73, 'crear', 'create_user', 'admin');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `permission_groups`
--

CREATE TABLE `permission_groups` (
  `groupID` int(11) NOT NULL,
  `groupName` varchar(200) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `permission_groups`
--

INSERT INTO `permission_groups` (`groupID`, `groupName`) VALUES
(42, 'stake_precidency'),
(43, 'bishops'),
(44, 'seventies'),
(45, 'missionary_leadders');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `permission_map`
--

CREATE TABLE `permission_map` (
  `groupID` int(11) NOT NULL DEFAULT '0',
  `permissionID` int(11) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `permission_map`
--

INSERT INTO `permission_map` (`groupID`, `permissionID`) VALUES
(43, 68),
(43, 69),
(43, 72),
(43, 73);

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
  `phone` bigint(20) NOT NULL,
  `groupid` int(11) NOT NULL,
  `firstlogin` tinyint(1) NOT NULL DEFAULT '1',
  `date_added` date NOT NULL,
  `date_modified` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `firstname`, `lastname`, `login`, `password`, `email`, `church_unit`, `calling`, `phone`, `groupid`, `firstlogin`, `date_added`, `date_modified`) VALUES
(1, 'admin', 'user', 'master', '25f9e794323b453885f5181f1b624d0b', 'superpujol@gmail.com', 1, 1, 0, 0, 0, '2018-10-10', '2018-10-10'),
(2, 'jarvis', 'pujol', 'jpujol', '5b9495f393808ce0f09ccdae9dc3a321', 'jarvispujol@yahoo.com', 3, 3, 4140495440, 43, 0, '2018-10-10', '2018-10-10');

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

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `user_menu`
--

CREATE TABLE `user_menu` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL,
  `date_added` date NOT NULL,
  `date_modified` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `user_menu`
--

INSERT INTO `user_menu` (`id`, `user_id`, `menu_id`, `date_added`, `date_modified`) VALUES
(1, 2, 1, '2018-10-20', '2018-10-20'),
(2, 2, 2, '2018-10-20', '2018-10-20'),
(3, 2, 3, '2018-10-20', '2018-10-20'),
(4, 2, 4, '2018-10-20', '2018-10-20'),
(5, 2, 5, '2018-10-20', '2018-10-20'),
(6, 2, 6, '2018-10-20', '2018-10-20'),
(7, 4, 1, '2018-10-20', '2018-10-20'),
(8, 4, 3, '2018-10-20', '2018-10-20'),
(9, 4, 5, '2018-10-20', '2018-10-20'),
(11, 4, 6, '2018-10-20', '2018-10-20'),
(12, 4, 7, '2018-10-20', '2018-10-20'),
(13, 5, 1, '2018-10-20', '2018-10-20'),
(14, 5, 3, '2018-10-20', '2018-10-20'),
(15, 5, 5, '2018-10-20', '2018-10-20'),
(16, 5, 6, '2018-10-20', '2018-10-20'),
(17, 5, 7, '2018-10-20', '2018-10-20');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `user_options`
--

CREATE TABLE `user_options` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `user_option` varchar(50) CHARACTER SET utf8 COLLATE utf8_spanish2_ci NOT NULL,
  `value` varchar(255) CHARACTER SET utf8 COLLATE utf8_spanish2_ci NOT NULL,
  `date_added` date NOT NULL,
  `date_modified` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
-- Indices de la tabla `user_menu`
--
ALTER TABLE `user_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `user_options`
--
ALTER TABLE `user_options`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `callings`
--
ALTER TABLE `callings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `calling_permissions`
--
ALTER TABLE `calling_permissions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `church_unit`
--
ALTER TABLE `church_unit`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `informe_mnmva`
--
ALTER TABLE `informe_mnmva`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `menu`
--
ALTER TABLE `menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `permissions`
--
ALTER TABLE `permissions`
  MODIFY `permissionID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=74;

--
-- AUTO_INCREMENT de la tabla `permission_groups`
--
ALTER TABLE `permission_groups`
  MODIFY `groupID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `user_callings`
--
ALTER TABLE `user_callings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `user_menu`
--
ALTER TABLE `user_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT de la tabla `user_options`
--
ALTER TABLE `user_options`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
