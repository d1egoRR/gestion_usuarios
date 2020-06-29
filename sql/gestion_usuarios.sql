-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 29-06-2020 a las 23:31:25
-- Versión del servidor: 10.1.19-MariaDB
-- Versión de PHP: 5.5.38

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `gestion_usuarios`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cliente`
--

CREATE TABLE `cliente` (
  `id_cliente` int(11) NOT NULL,
  `id_persona` int(11) NOT NULL,
  `cbu` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `cliente`
--

INSERT INTO `cliente` (`id_cliente`, `id_persona`, `cbu`) VALUES
(2, 2, '131313'),
(3, 3, '131313'),
(4, 4, '131313'),
(5, 5, '454545'),
(6, 10, '131313'),
(7, 11, '22222222'),
(8, 12, '131313'),
(9, 14, ''),
(10, 15, '540'),
(11, 16, ''),
(12, 17, '540'),
(13, 18, ''),
(14, 19, ''),
(15, 20, ''),
(16, 21, ''),
(17, 24, '332211'),
(18, 25, '32323');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `domicilio`
--

CREATE TABLE `domicilio` (
  `id_domicilio` int(11) NOT NULL,
  `calle` varchar(30) DEFAULT NULL,
  `altura` int(11) DEFAULT NULL,
  `piso` varchar(30) DEFAULT NULL,
  `manzana` varchar(30) DEFAULT NULL,
  `id_persona` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `domicilio`
--

INSERT INTO `domicilio` (`id_domicilio`, `calle`, `altura`, `piso`, `manzana`, `id_persona`) VALUES
(1, 'Junin', 850, NULL, '300', 4),
(2, 'corrientes', 548, NULL, NULL, 10);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empleado`
--

CREATE TABLE `empleado` (
  `id_empleado` int(11) NOT NULL,
  `id_persona` int(11) NOT NULL,
  `numero_legajo` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `modulo`
--

CREATE TABLE `modulo` (
  `id_modulo` int(11) NOT NULL,
  `descripcion` varchar(30) NOT NULL,
  `directorio` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `modulo`
--

INSERT INTO `modulo` (`id_modulo`, `descripcion`, `directorio`) VALUES
(1, 'Empleados', 'empleados'),
(2, 'Usuarios', 'usuarios'),
(3, 'Clientes', 'clientes'),
(4, 'Ventas', 'ventas'),
(5, 'Compras', 'compras'),
(6, 'Seguridad', 'seguridad'),
(7, 'Estadísticas', 'estadisticas');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `perfil`
--

CREATE TABLE `perfil` (
  `id_perfil` int(11) NOT NULL,
  `descripcion` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `perfil`
--

INSERT INTO `perfil` (`id_perfil`, `descripcion`) VALUES
(1, 'ADMINISTRADOR'),
(2, 'VENDEDOR'),
(3, 'SIN_PERMISOS');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `perfil_modulo`
--

CREATE TABLE `perfil_modulo` (
  `id_perfil_modulo` int(11) NOT NULL,
  `id_perfil` int(11) NOT NULL,
  `id_modulo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `perfil_modulo`
--

INSERT INTO `perfil_modulo` (`id_perfil_modulo`, `id_perfil`, `id_modulo`) VALUES
(1, 1, 1),
(2, 1, 2),
(3, 1, 3),
(4, 1, 4),
(5, 1, 5),
(6, 1, 6),
(7, 1, 7),
(8, 2, 3),
(9, 2, 4),
(10, 2, 5),
(11, 2, 7);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `persona`
--

CREATE TABLE `persona` (
  `id_persona` int(11) NOT NULL,
  `nombre` varchar(30) NOT NULL,
  `apellido` varchar(30) NOT NULL,
  `id_tipo_documento` int(11) DEFAULT NULL,
  `numero_documento` varchar(30) DEFAULT NULL,
  `fecha_nacimiento` date DEFAULT NULL,
  `id_estado` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `persona`
--

INSERT INTO `persona` (`id_persona`, `nombre`, `apellido`, `id_tipo_documento`, `numero_documento`, `fecha_nacimiento`, `id_estado`) VALUES
(2, 'Ana', 'Torres', 3, '', '0000-00-00', 1),
(3, 'Carlos', 'Denis', NULL, NULL, NULL, 1),
(4, 'Juan', 'Perez', NULL, '36555666', '2020-05-06', 1),
(5, 'Carlos', 'Pare', NULL, '123456', '0000-00-00', 1),
(10, 'Angela', 'Alvarenga', 0, '', '0000-00-00', 1),
(11, 'Anibal', 'Rodriguez', 0, '141414', '2007-02-28', 1),
(12, 'Sandra', 'Ibañez', 0, '55885', '2020-04-08', 1),
(13, 'Julia', 'Moendez', 0, '55885', '0000-00-00', 1),
(14, 'Julia', 'Riquelme', 0, '55885', '0000-00-00', 1),
(15, 'sergio', 'Riquelme', 0, '55885', '0000-00-00', 1),
(16, 'SUSANA', 'GIME', 0, '55885', '0000-00-00', 1),
(17, 'Ana', 'Mourin', 0, '', '0000-00-00', 1),
(18, 'Diego', 'Riquelme', 0, '55885', '0000-00-00', 1),
(19, 'Lucia', 'Lopez', 0, '', '0000-00-00', 1),
(20, 'Maria', 'Ibañez', 0, '', '0000-00-00', 1),
(21, 'Laura', 'carrilo', 0, '', '0000-00-00', 1),
(22, 'Mario', 'Gamarra', NULL, NULL, NULL, 1),
(23, 'Sara', 'Rodriguez', NULL, NULL, NULL, 1),
(24, 'nimia', 'garay', 3, '3335544', '2020-06-17', 1),
(25, 'Laura', 'Ruiz diaz', 2, '36555444', '2020-06-03', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `persona_contacto`
--

CREATE TABLE `persona_contacto` (
  `id_persona_contacto` int(11) NOT NULL,
  `id_persona` int(11) NOT NULL,
  `id_tipo_contacto` int(11) NOT NULL,
  `valor` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipocontacto`
--

CREATE TABLE `tipocontacto` (
  `id_tipo_contacto` int(11) NOT NULL,
  `descripcion` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipodocumento`
--

CREATE TABLE `tipodocumento` (
  `id_tipo_documento` int(11) NOT NULL,
  `descripcion` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tipodocumento`
--

INSERT INTO `tipodocumento` (`id_tipo_documento`, `descripcion`) VALUES
(1, 'Libreta de Enrolamiento'),
(2, 'D.N.I.'),
(3, 'Cedula'),
(4, 'Pasaporte');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id_usuario` int(11) NOT NULL,
  `id_persona` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  `fecha_ultimo_login` datetime DEFAULT NULL,
  `id_perfil` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id_usuario`, `id_persona`, `username`, `password`, `fecha_ultimo_login`, `id_perfil`) VALUES
(1, 22, 'mgamarra', '123456', NULL, 1),
(2, 23, 'srodriguez', '123456', NULL, 3);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`id_cliente`);

--
-- Indices de la tabla `domicilio`
--
ALTER TABLE `domicilio`
  ADD PRIMARY KEY (`id_domicilio`);

--
-- Indices de la tabla `empleado`
--
ALTER TABLE `empleado`
  ADD PRIMARY KEY (`id_empleado`);

--
-- Indices de la tabla `modulo`
--
ALTER TABLE `modulo`
  ADD PRIMARY KEY (`id_modulo`);

--
-- Indices de la tabla `perfil`
--
ALTER TABLE `perfil`
  ADD PRIMARY KEY (`id_perfil`);

--
-- Indices de la tabla `perfil_modulo`
--
ALTER TABLE `perfil_modulo`
  ADD PRIMARY KEY (`id_perfil_modulo`);

--
-- Indices de la tabla `persona`
--
ALTER TABLE `persona`
  ADD PRIMARY KEY (`id_persona`);

--
-- Indices de la tabla `persona_contacto`
--
ALTER TABLE `persona_contacto`
  ADD PRIMARY KEY (`id_persona_contacto`);

--
-- Indices de la tabla `tipocontacto`
--
ALTER TABLE `tipocontacto`
  ADD PRIMARY KEY (`id_tipo_contacto`);

--
-- Indices de la tabla `tipodocumento`
--
ALTER TABLE `tipodocumento`
  ADD PRIMARY KEY (`id_tipo_documento`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id_usuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `cliente`
--
ALTER TABLE `cliente`
  MODIFY `id_cliente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT de la tabla `domicilio`
--
ALTER TABLE `domicilio`
  MODIFY `id_domicilio` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `empleado`
--
ALTER TABLE `empleado`
  MODIFY `id_empleado` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `modulo`
--
ALTER TABLE `modulo`
  MODIFY `id_modulo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT de la tabla `perfil`
--
ALTER TABLE `perfil`
  MODIFY `id_perfil` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `perfil_modulo`
--
ALTER TABLE `perfil_modulo`
  MODIFY `id_perfil_modulo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT de la tabla `persona`
--
ALTER TABLE `persona`
  MODIFY `id_persona` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
--
-- AUTO_INCREMENT de la tabla `persona_contacto`
--
ALTER TABLE `persona_contacto`
  MODIFY `id_persona_contacto` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `tipocontacto`
--
ALTER TABLE `tipocontacto`
  MODIFY `id_tipo_contacto` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `tipodocumento`
--
ALTER TABLE `tipodocumento`
  MODIFY `id_tipo_documento` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
