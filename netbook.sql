-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 10-08-2018 a las 16:30:53
-- Versión del servidor: 10.1.9-MariaDB
-- Versión de PHP: 5.6.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `netbook`
--
CREATE DATABASE IF NOT EXISTS `netbook` DEFAULT CHARACTER SET utf8 COLLATE utf8_spanish2_ci;
USE `netbook`;

DELIMITER $$
--
-- Procedimientos
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `PD_insertAuto` (IN `nomaut` VARCHAR(100), IN `sexaut` INT, IN `fotoaut` VARCHAR(100))  MODIFIES SQL DATA
INSERT INTO autores(nombre_autor,sexautor,foto_autor) VALUES(nomaut,sexaut,fotoaut)$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `PD_insertGen` (IN `nomgen` VARCHAR(100), IN `desgen` VARCHAR(500))  MODIFIES SQL DATA
INSERT INTO generos(nombre_genero,descripcion_genero) VALUES(nomgen,desgen)$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `autores`
--

CREATE TABLE `autores` (
  `id_autor` int(11) NOT NULL,
  `nombre_autor` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `sexautor` int(11) NOT NULL,
  `foto_autor` varchar(100) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `autores`
--

INSERT INTO `autores` (`id_autor`, `nombre_autor`, `sexautor`, `foto_autor`) VALUES
(5, 'Amilcrack', 1, 'user-profile.png'),
(7, 'crack', 1, 'user-profile.png'),
(8, 'Daniel', 2, 'user-profile.png'),
(9, 'Benja', 1, 'user-profile.png'),
(10, 'Daniel Argueta', 1, 'user-profile.png'),
(12, 'Rocko', 2, '5ae9faede3146.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cuentas`
--

CREATE TABLE `cuentas` (
  `id_cuenta` int(11) NOT NULL,
  `codigoUsa_cuenta` int(11) NOT NULL,
  `numeroTarj_cuenta` int(11) NOT NULL,
  `fechaVen_cuenta` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `cvc_cuenta` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `cuentas`
--

INSERT INTO `cuentas` (`id_cuenta`, `codigoUsa_cuenta`, `numeroTarj_cuenta`, `fechaVen_cuenta`, `cvc_cuenta`) VALUES
(1, 6, 534018, '2018-04-11', 540),
(2, 6, 534018, '2018-04-11', 540),
(5, 6, 534018, '2018-04-11', 540),
(6, 6, 534018, '2018-04-11', 540),
(7, 10, 278990, '09-2019', 321),
(8, 27, 12345, '09-2017', 123),
(9, 30, 12354, '09-2017', 532),
(10, 31, 1234543, '09-2018', 123),
(11, 32, 43646334, '09-2018', 123),
(12, 34, 1234568, '09-2019', 324);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `editorial`
--

CREATE TABLE `editorial` (
  `id_editorial` int(11) NOT NULL,
  `nombre_editorial` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `informacion_editorial` varchar(500) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `editorial`
--

INSERT INTO `editorial` (`id_editorial`, `nombre_editorial`, `informacion_editorial`) VALUES
(1, 'ALIENTA EDITORIALqass', 'Alienta Editorial libros prácticos que entrelazan la formación con el entretenimiento y reducen la complejidad del mundo empresarial para conseguir que resulte mas asequible.'),
(2, 'AUSTRAL', 'El término austral se utiliza para designar preferentemente puntos geográficos situados al sur; su contraparte es la voz boreal. '),
(3, 'BACKLIST', 'A backlist is a list of older books available from a publisher, as opposed to titles newly published Building a strong backlist has traditionally been considered the best method to produce a profitable publishing house'),
(4, 'holaa', 'jejeje'),
(5, 'holaa', 'jejeje'),
(6, 'sfdgsgf', 'sfgsd'),
(7, 'khe', 'jeje');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estado_comentario`
--

CREATE TABLE `estado_comentario` (
  `id_estado` int(11) NOT NULL,
  `nom_estado` varchar(20) COLLATE utf16_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16 COLLATE=utf16_spanish2_ci;

--
-- Volcado de datos para la tabla `estado_comentario`
--

INSERT INTO `estado_comentario` (`id_estado`, `nom_estado`) VALUES
(1, 'Rechazado'),
(2, 'Pendiente'),
(3, 'Aceptado');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `generos`
--

CREATE TABLE `generos` (
  `id_genero` int(11) NOT NULL,
  `nombre_genero` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `descripcion_genero` varchar(500) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `generos`
--

INSERT INTO `generos` (`id_genero`, `nombre_genero`, `descripcion_genero`) VALUES
(2, 'Romántica', 'Se caracteriza por ser una canción interpretada en tiempo lento, siempre sobre temas de amor'),
(3, 'Ciencia Ficción', 'La ciencia ficción es un género cuyos contenidos se encuentran basados en supuestos logros científicos o técnicos que podrían lograrse en el futuro.'),
(4, 'Policial', 'la observación, el análisis y la deducción se intenta resolver un enigma, normalmente un crimen, para encontrar al autor y su móvil.'),
(5, 'Apestosos', 'malos olores'),
(6, 'Rocosos', 'jajajjaaj'),
(7, 'Rocosos', 'jajajjaaj'),
(8, 'Comedia', 'Genero literario basado en humor'),
(9, 'Comedia', 'Genero literario basado en humor'),
(10, 'eroticos', 'diversión asegurada'),
(11, 'erotico con final feliz', 'diversíon por 2'),
(12, 'sdssdsd', 'dsds'),
(13, 'hola', 'asdas'),
(18, 'xd', 'xd'),
(19, 'Miedo', 'meyo'),
(20, 'amors', 'que viva el amors'),
(22, 'Terror', 'Esto da miedo'),
(23, 'jejeje', 'hola');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `libros`
--

CREATE TABLE `libros` (
  `id_libro` int(11) NOT NULL,
  `nombre_libro` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `descripcion_libro` mediumtext COLLATE utf8_spanish_ci NOT NULL,
  `NumVent_libro` int(11) NOT NULL,
  `numeroPag_libro` int(11) NOT NULL,
  `codigoAtr_litro` int(11) NOT NULL,
  `codigoEdt_libro` int(11) NOT NULL,
  `codigoGnr_libro` int(11) NOT NULL,
  `Valoracion` double(2,1) NOT NULL,
  `precio_libro` double(11,2) NOT NULL,
  `foto` varchar(50) CHARACTER SET utf8 COLLATE utf8_spanish2_ci NOT NULL,
  `link` mediumtext COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `libros`
--

INSERT INTO `libros` (`id_libro`, `nombre_libro`, `descripcion_libro`, `NumVent_libro`, `numeroPag_libro`, `codigoAtr_litro`, `codigoEdt_libro`, `codigoGnr_libro`, `Valoracion`, `precio_libro`, `foto`, `link`) VALUES
(1, 'Una pareja casi perfecta', 'Amy tiene el marido perfecto. Hugh es guapo, es un buen tipo y un padre maravilloso. Pero un día, de pronto, le dice que quiere que se tomen un descanso. Que necesita estar seis meses lejos de casa, de ella y de la familia, y viajar un tiempo como soltero. Aunque asegura que solo será medio año y que volverá, pues no dejado de amarla, Amy teme que no sea así.', 3, 7, 5, 2, 5, 4.0, 100.00, '5ae364fa573bd.jpg', 'https://www.mediafire.com/'),
(2, 'Origen', 'hola', 2, 998, 5, 2, 5, 0.0, 100.00, '5ae365960a22a.jpg', ''),
(10, 'El rey de la selva', 'es un libro de aventuras y mucha diversión', 2, 29, 8, 3, 3, 4.2, 5.01, '5ae3277d7b687.jpg', ''),
(11, 'Lord of the ring', 'historia epica  de 3  hobbits y una mago ', 1, 290, 5, 1, 3, 0.0, 18.00, '5ae366ef6ef18.jpg', ''),
(12, '20000 leguas de viaje submarino', 'es una travesía fantástica en la profundidades del mar ', 8, 800, 8, 3, 3, 0.0, 35.00, '5ae367b85682d.jpg', ''),
(13, 'asesinato en el expreso de oriente', 'novela policial sobre un asesianto', 3, 340, 9, 3, 4, 2.7, 20.00, '5ae3689dcebd6.jpg', ''),
(14, 'harry potter y el prisionero de askaban', 'buen  libro', 5, 654, 5, 7, 11, 0.0, 90.00, '5ae37547316c0.jpg', ''),
(15, 'Rosita fresita', 'solo para morales ', 4, 90, 7, 3, 4, 0.0, 90.00, '5ae375c59e0b9.jpg', ''),
(16, 'el gato negro', 'da miedo', 7, 3, 5, 1, 2, 0.0, 2.01, '5ae376b7cf26b.jpg', ''),
(17, 'Libro itr', 'Libro salesiano', 1, 0, 5, 1, 2, 3.8, 0.01, '5ae37a3e204b7.jpg', ''),
(18, 'Aliens', 'es una historia muy interesante ', 3, 9, 5, 7, 2, 0.0, 11.01, '5b24273f1e1d6.jpg', 'https://www.mediafire.com/');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `listas`
--

CREATE TABLE `listas` (
  `id_listas` int(11) NOT NULL,
  `nombre_listas` int(50) NOT NULL,
  `codigo_Usu_lista` int(11) NOT NULL,
  `codigoLbr_lista` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `listas`
--

INSERT INTO `listas` (`id_listas`, `nombre_listas`, `codigo_Usu_lista`, `codigoLbr_lista`) VALUES
(1, 1, 30, 13),
(2, 1, 30, 1),
(3, 1, 31, 16),
(4, 1, 31, 17),
(5, 1, 31, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `resenas`
--

CREATE TABLE `resenas` (
  `id_resena` int(11) NOT NULL,
  `codigoUsa_resena` int(11) NOT NULL,
  `codigoLbr_resena` int(11) NOT NULL,
  `comentario_resena` varchar(500) COLLATE utf8_spanish_ci NOT NULL,
  `cod_estado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `resenas`
--

INSERT INTO `resenas` (`id_resena`, `codigoUsa_resena`, `codigoLbr_resena`, `comentario_resena`, `cod_estado`) VALUES
(1, 6, 16, 'muy bonito todo', 3),
(2, 6, 16, 'muy feo todo', 2),
(3, 8, 16, 'buhhhhh', 2),
(4, 6, 17, 'que aburrido es el reglamento', 1),
(5, 8, 14, 'lindo libro para mis hijos', 2),
(6, 31, 16, 'jejee', 3),
(7, 31, 16, 'jejee', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sexo_autor`
--

CREATE TABLE `sexo_autor` (
  `id_sexautor` int(11) NOT NULL,
  `nom_sex` varchar(10) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `sexo_autor`
--

INSERT INTO `sexo_autor` (`id_sexautor`, `nom_sex`) VALUES
(1, 'Masculino'),
(2, 'Femenino');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_usuario`
--

CREATE TABLE `tipo_usuario` (
  `id_tipousu` int(11) NOT NULL,
  `nombre` varchar(20) COLLATE utf8_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `tipo_usuario`
--

INSERT INTO `tipo_usuario` (`id_tipousu`, `nombre`) VALUES
(1, 'Administrador'),
(2, 'Cliente');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id_usuario` int(11) NOT NULL,
  `tipo_usuario` int(11) NOT NULL,
  `nombre_usuario` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `apellidos_usuario` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `clave_usuario` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `correo_usuario` varchar(80) CHARACTER SET utf8 COLLATE utf8_spanish2_ci NOT NULL,
  `foto_usuario` varchar(500) COLLATE utf8_spanish_ci NOT NULL,
  `nickname` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `numb_ingresos` int(1) NOT NULL DEFAULT '0',
  `tiempo_intentos` datetime NOT NULL,
  `tiempo_contraseña` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id_usuario`, `tipo_usuario`, `nombre_usuario`, `apellidos_usuario`, `clave_usuario`, `correo_usuario`, `foto_usuario`, `nickname`, `numb_ingresos`, `tiempo_intentos`, `tiempo_contraseña`) VALUES
(6, 1, 'Amilcar', 'Torres', '$2y$10$pHoLfiCD56FIcGrTHAh1lOeAHK6st3yHnLMlw6AE2p5n056HAHqTm', 'amijose@hotmail.com', '5ae2c55d2e998.jpg', 'amilcrack', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(8, 2, 'Danielqq', 'Alexander', '$2y$10$IIgpYbX8L0sz9zBYW.P7N.MMd7ucQ57gjhwz8cpLL.eXHv5LMchWi', 'danicx@gmail.com', '5aff168bc5b91.jpg', 'danicx', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(10, 2, 'gio', 'godinez', '$2y$10$0FhF1a1sINsUv43HGaz3f.PXCjEMipvvHJxF4UTITEKa4xXTVQVE6', 'adsfad@gmal.com', '', 'geocito', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(14, 2, 'kevin', 'galdamez', '$2y$10$VzUuSceM1Tkywf6Iu5EFzOyuTp3hNJMtK7Q./1/E5B8YC8uWI9NSG', 'holaquetal@gmail.com', '', 'galdamecito', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(17, 2, 'kevin', 'galdamez', '$2y$10$Eoevln4GrsYVRyfZ023pQ.hTIj91p.ErMmI/.CGC8H1PxIEtYs9/2', 'kevin@gmail.com', '', 'kevincito', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(25, 2, 'kevin', 'galdame', '$2y$10$IkYkFMKtiQd2yvlnWWdmkeYl/fVs4Iw78sSUyui0dZa1tx7PWP5Da', 'kevin@hotmail.com', '', 'kevinci', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(27, 2, 'kevin', 'galdamez', '$2y$10$f9w.mXgeAC8I/XJXDmMJFuFPmZL/W7RyPM1Jb3Knon3e0/ivvnxhO', 'kevin@hotmail.com', '', 'kevinn', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(30, 2, 'aramis', 'aramiss', '$2y$10$.htPxxenMiOTawVnUZ6Aqup9G9v8lqfOg.SjKa0hzGgX.wLDSs51a', 'aramis@gmail.com', '5af5ba5fa0c23.jpg', 'aramisjaja', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(31, 2, 'rolando', 'Vanegas', '$2y$10$r/kZfouibY/D0Bt0coP3ee4U4wU/KqLRak3w9MSAZp4IFGR8ranPe', 'rolando@gmail.com', '5aff32167ce0a.jpg', 'rolan', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(32, 2, 'primo', 'torres', '$2y$10$OXysvKQKKQWaeBTcbR.90OZ3YiYqxusuQUcjSNBsDXtyprV2D0BFC', 'primo@gmail.com', '', 'primox', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(33, 2, 'Araña', 'Godinez', '$2y$10$wsK0BkbqFhlU8mu52h4.HO6ujO/WNqUkTk0t5VZ8WDKFcRprdFzDS', 'aranita@gmail.com', '', 'arañita', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(34, 2, 'aranita', 'aramis', '$2y$10$ypI/GHI9QW9CPrItVm1P1.1iPjtHGzq0hFnAa.3/u52mzDyGFOBUm', 'aranita@gmail.com', '', 'arana', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(35, 2, 'Gerardo', 'Alexis', '$2y$10$26hHaJ2hb4Y07Fx8VODzLOBi5wCWmTXLNUqPVcyQqJUr/QTQDY8rK', 'gerardo@gmail.com', '', 'gerado', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(37, 2, 'carlos', 'montes', '$2y$10$ERwFGNPyxyHg2dokfu3V2uTW9C1jLbfynAvHz2tEYYZAw7Pu0kRka', 'asjd@gmail.com', '', 'carlitos', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `valoracion`
--

CREATE TABLE `valoracion` (
  `id_valoracion` int(11) NOT NULL,
  `id_Usuariov` int(11) NOT NULL,
  `id_Librov` int(11) NOT NULL,
  `valoraciones` double(2,1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `valoracion`
--

INSERT INTO `valoracion` (`id_valoracion`, `id_Usuariov`, `id_Librov`, `valoraciones`) VALUES
(7, 6, 10, 5.0),
(8, 8, 10, 3.5),
(9, 6, 17, 3.2),
(10, 8, 17, 4.5),
(11, 6, 1, 5.0),
(12, 6, 1, 4.0),
(13, 30, 13, 4.4),
(14, 30, 13, 3.5),
(15, 30, 13, 0.1),
(16, 31, 1, 3.1);

--
-- Disparadores `valoracion`
--
DELIMITER $$
CREATE TRIGGER `valoraciones` AFTER INSERT ON `valoracion` FOR EACH ROW UPDATE libros l SET l.Valoracion = (SELECT AVG(V.valoraciones) FROM valoracion V WHERE V.id_Librov = NEW.id_Librov ) WHERE L.id_libro = NEW.id_Librov
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ventas`
--

CREATE TABLE `ventas` (
  `id_venta` int(11) NOT NULL,
  `codigoLib_venta` int(11) NOT NULL,
  `codigoCun_venta` int(11) NOT NULL,
  `codigoNum_venta` int(11) NOT NULL,
  `precio` double(11,2) NOT NULL,
  `cod_usu` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `ventas`
--

INSERT INTO `ventas` (`id_venta`, `codigoLib_venta`, `codigoCun_venta`, `codigoNum_venta`, `precio`, `cod_usu`) VALUES
(1, 1, 5, 2, 100.00, 6),
(2, 2, 1, 1, 100.00, 6),
(3, 10, 2, 9, 100.00, 6),
(4, 10, 2, 8, 100.00, 8),
(5, 11, 2, 7, 100.00, 6),
(6, 13, 9, 10, 20.00, 30),
(7, 1, 9, 11, 100.00, 30),
(8, 16, 10, 12, 2.01, 31),
(9, 17, 10, 13, 0.01, 31),
(10, 1, 10, 14, 100.00, 31);

--
-- Disparadores `ventas`
--
DELIMITER $$
CREATE TRIGGER `ingresar_lista` BEFORE INSERT ON `ventas` FOR EACH ROW INSERT INTO `listas`(`id_listas`, `nombre_listas`, `codigo_Usu_lista`, `codigoLbr_lista`) VALUES (null,1,NEW.cod_usu, NEW.codigoLib_venta)
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `ventas_1` AFTER INSERT ON `ventas` FOR EACH ROW UPDATE libros l  SET l.NumVent_libro = l.NumVent_libro+1 WHERE l.id_libro = NEW.codigoLib_venta
$$
DELIMITER ;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `autores`
--
ALTER TABLE `autores`
  ADD PRIMARY KEY (`id_autor`),
  ADD KEY `sexautor` (`sexautor`);

--
-- Indices de la tabla `cuentas`
--
ALTER TABLE `cuentas`
  ADD PRIMARY KEY (`id_cuenta`),
  ADD KEY `codigoUsa_cuenta` (`codigoUsa_cuenta`);

--
-- Indices de la tabla `editorial`
--
ALTER TABLE `editorial`
  ADD PRIMARY KEY (`id_editorial`);

--
-- Indices de la tabla `estado_comentario`
--
ALTER TABLE `estado_comentario`
  ADD PRIMARY KEY (`id_estado`);

--
-- Indices de la tabla `generos`
--
ALTER TABLE `generos`
  ADD PRIMARY KEY (`id_genero`);

--
-- Indices de la tabla `libros`
--
ALTER TABLE `libros`
  ADD PRIMARY KEY (`id_libro`),
  ADD KEY `codigoAtr_litro` (`codigoAtr_litro`),
  ADD KEY `codigoGnr_libro` (`codigoGnr_libro`),
  ADD KEY `codigoEdt_libro` (`codigoEdt_libro`);

--
-- Indices de la tabla `listas`
--
ALTER TABLE `listas`
  ADD PRIMARY KEY (`id_listas`),
  ADD KEY `codigo_Usu_lista` (`codigo_Usu_lista`),
  ADD KEY `codigoLbr_lista` (`codigoLbr_lista`),
  ADD KEY `codigo_Usu_lista_2` (`codigo_Usu_lista`,`codigoLbr_lista`);

--
-- Indices de la tabla `resenas`
--
ALTER TABLE `resenas`
  ADD PRIMARY KEY (`id_resena`),
  ADD KEY `codigoUsa_reseña` (`codigoUsa_resena`),
  ADD KEY `codigoLbr_reseña` (`codigoLbr_resena`),
  ADD KEY `cod_estado` (`cod_estado`);

--
-- Indices de la tabla `sexo_autor`
--
ALTER TABLE `sexo_autor`
  ADD PRIMARY KEY (`id_sexautor`);

--
-- Indices de la tabla `tipo_usuario`
--
ALTER TABLE `tipo_usuario`
  ADD PRIMARY KEY (`id_tipousu`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_usuario`),
  ADD UNIQUE KEY `nickname` (`nickname`),
  ADD KEY `tipo_usuario` (`tipo_usuario`),
  ADD KEY `nickname_2` (`nickname`);

--
-- Indices de la tabla `valoracion`
--
ALTER TABLE `valoracion`
  ADD PRIMARY KEY (`id_valoracion`),
  ADD KEY `id_Librov` (`id_Librov`),
  ADD KEY `id_Usuariov` (`id_Usuariov`) USING BTREE;

--
-- Indices de la tabla `ventas`
--
ALTER TABLE `ventas`
  ADD PRIMARY KEY (`id_venta`),
  ADD KEY `codigoLib_venta` (`codigoLib_venta`),
  ADD KEY `codigoCun_venta` (`codigoCun_venta`),
  ADD KEY `precio` (`precio`),
  ADD KEY `cod_usu` (`cod_usu`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `autores`
--
ALTER TABLE `autores`
  MODIFY `id_autor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT de la tabla `cuentas`
--
ALTER TABLE `cuentas`
  MODIFY `id_cuenta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT de la tabla `editorial`
--
ALTER TABLE `editorial`
  MODIFY `id_editorial` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT de la tabla `estado_comentario`
--
ALTER TABLE `estado_comentario`
  MODIFY `id_estado` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `generos`
--
ALTER TABLE `generos`
  MODIFY `id_genero` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
--
-- AUTO_INCREMENT de la tabla `libros`
--
ALTER TABLE `libros`
  MODIFY `id_libro` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT de la tabla `listas`
--
ALTER TABLE `listas`
  MODIFY `id_listas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT de la tabla `resenas`
--
ALTER TABLE `resenas`
  MODIFY `id_resena` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT de la tabla `sexo_autor`
--
ALTER TABLE `sexo_autor`
  MODIFY `id_sexautor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `tipo_usuario`
--
ALTER TABLE `tipo_usuario`
  MODIFY `id_tipousu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;
--
-- AUTO_INCREMENT de la tabla `valoracion`
--
ALTER TABLE `valoracion`
  MODIFY `id_valoracion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT de la tabla `ventas`
--
ALTER TABLE `ventas`
  MODIFY `id_venta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `autores`
--
ALTER TABLE `autores`
  ADD CONSTRAINT `autores_ibfk_1` FOREIGN KEY (`sexautor`) REFERENCES `sexo_autor` (`id_sexautor`);

--
-- Filtros para la tabla `cuentas`
--
ALTER TABLE `cuentas`
  ADD CONSTRAINT `cuentas_ibfk_1` FOREIGN KEY (`codigoUsa_cuenta`) REFERENCES `usuarios` (`id_usuario`);

--
-- Filtros para la tabla `libros`
--
ALTER TABLE `libros`
  ADD CONSTRAINT `libros_ibfk_1` FOREIGN KEY (`codigoAtr_litro`) REFERENCES `autores` (`id_autor`),
  ADD CONSTRAINT `libros_ibfk_2` FOREIGN KEY (`codigoGnr_libro`) REFERENCES `generos` (`id_genero`),
  ADD CONSTRAINT `libros_ibfk_3` FOREIGN KEY (`codigoEdt_libro`) REFERENCES `editorial` (`id_editorial`);

--
-- Filtros para la tabla `listas`
--
ALTER TABLE `listas`
  ADD CONSTRAINT `listas_ibfk_1` FOREIGN KEY (`codigoLbr_lista`) REFERENCES `libros` (`id_libro`),
  ADD CONSTRAINT `listas_ibfk_2` FOREIGN KEY (`codigo_Usu_lista`) REFERENCES `usuarios` (`id_usuario`);

--
-- Filtros para la tabla `resenas`
--
ALTER TABLE `resenas`
  ADD CONSTRAINT `resenas_ibfk_1` FOREIGN KEY (`codigoUsa_resena`) REFERENCES `usuarios` (`id_usuario`),
  ADD CONSTRAINT `resenas_ibfk_2` FOREIGN KEY (`codigoLbr_resena`) REFERENCES `libros` (`id_libro`),
  ADD CONSTRAINT `resenas_ibfk_3` FOREIGN KEY (`cod_estado`) REFERENCES `estado_comentario` (`id_estado`);

--
-- Filtros para la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `usuarios_ibfk_1` FOREIGN KEY (`tipo_usuario`) REFERENCES `tipo_usuario` (`id_tipousu`);

--
-- Filtros para la tabla `valoracion`
--
ALTER TABLE `valoracion`
  ADD CONSTRAINT `valoracion_ibfk_1` FOREIGN KEY (`id_Librov`) REFERENCES `libros` (`id_libro`) ON UPDATE CASCADE,
  ADD CONSTRAINT `valoracion_ibfk_2` FOREIGN KEY (`id_Usuariov`) REFERENCES `usuarios` (`id_usuario`);

--
-- Filtros para la tabla `ventas`
--
ALTER TABLE `ventas`
  ADD CONSTRAINT `ventas_ibfk_1` FOREIGN KEY (`codigoLib_venta`) REFERENCES `libros` (`id_libro`),
  ADD CONSTRAINT `ventas_ibfk_2` FOREIGN KEY (`codigoCun_venta`) REFERENCES `cuentas` (`id_cuenta`),
  ADD CONSTRAINT `ventas_ibfk_3` FOREIGN KEY (`cod_usu`) REFERENCES `usuarios` (`id_usuario`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
