-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 17-05-2020 a las 19:02:00
-- Versión del servidor: 10.3.16-MariaDB
-- Versión de PHP: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `ticketly`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `asesor`
--

CREATE TABLE `asesor` (
  `id` int(11) NOT NULL,
  `username` varchar(50) DEFAULT NULL,
  `name` varchar(80) DEFAULT NULL,
  `telefono` double DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `user_id` int(11) NOT NULL,
  `status_id` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `asesor`
--

INSERT INTO `asesor` (`id`, `username`, `name`, `telefono`, `email`, `is_active`, `user_id`, `status_id`) VALUES
(1, 'Asesor', 'Carlos Bejarano', 3344556677, 'cabejarano21@gmal.com', 1, 1, 1),
(2, 'Asesor', 'Hector Gonzalez', 3128990077, '4reeres@gmal.com', 1, 2, 1),
(3, 'Asesor', 'Orlay Padilla', 3025248856, 'soporte@r-fast.com', 1, 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `atencion`
--

CREATE TABLE `atencion` (
  `id_atencion` int(11) NOT NULL,
  `id_ticket` int(11) NOT NULL,
  `fecha_atencion` datetime DEFAULT NULL,
  `description` text DEFAULT NULL,
  `kind_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `asigned_id` int(11) DEFAULT NULL,
  `project_id` int(11) DEFAULT NULL,
  `category_id` int(11) DEFAULT NULL,
  `priority_id` int(11) NOT NULL DEFAULT 1,
  `status_id` int(11) NOT NULL DEFAULT 1,
  `id_multimedia` varchar(200) DEFAULT NULL,
  `id_causa_sop` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `category_name` varchar(200) DEFAULT NULL,
  `profile_pic` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `category`
--

INSERT INTO `category` (`id`, `category_name`, `profile_pic`) VALUES
(1, 'Componente Nómina', NULL),
(2, 'Componente Facturación', NULL),
(3, 'Componente Clínico', NULL),
(4, 'Componente Presupuesto', NULL),
(5, 'Componente Contabilidad', NULL),
(6, 'Componente Cartera', NULL),
(7, 'Componente Activos Fijos', NULL),
(8, 'Componente Inventario', NULL),
(9, 'Componente Costos', NULL),
(10, 'Componente CRM', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `causas_soporte`
--

CREATE TABLE `causas_soporte` (
  `id_causa_sop` int(11) NOT NULL,
  `causas_soporte` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `causas_soporte`
--

INSERT INTO `causas_soporte` (`id_causa_sop`, `causas_soporte`) VALUES
(1, 'Ajuste Base de Datos por el Asesor de Soporte'),
(2, 'Ajuste Base de Datos por el Asesor el Cliente'),
(3, 'Actualización del sistema'),
(4, 'Capacitación'),
(5, 'Desconocimiento del sistema'),
(6, 'Ejecución rutinas especiales'),
(7, 'Error del sistema'),
(8, 'Error del usuario'),
(9, 'Error de Parametros'),
(10, 'En Desarrollo'),
(11, 'Inconveniente tecnico de la institución'),
(12, 'Mantenimiento Base de Datos'),
(13, 'Visita preventiva');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE `clientes` (
  `id_cliente` int(11) NOT NULL,
  `Nit` int(20) DEFAULT NULL,
  `name_Empresa` varchar(80) DEFAULT NULL,
  `name_Representante` varchar(80) DEFAULT NULL,
  `telefono` double DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `Fecha_Ini_Contrato` datetime DEFAULT NULL,
  `Fecha_Fin_Contrato` datetime DEFAULT NULL,
  `Observaciones` varchar(800) DEFAULT NULL,
  `Fecha_Ini_Servicio` datetime DEFAULT NULL,
  `Fecha_Fin_Servicio` datetime DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `asigned_id` int(11) DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`id_cliente`, `Nit`, `name_Empresa`, `name_Representante`, `telefono`, `email`, `Fecha_Ini_Contrato`, `Fecha_Fin_Contrato`, `Observaciones`, `Fecha_Ini_Servicio`, `Fecha_Fin_Servicio`, `user_id`, `asigned_id`, `is_active`) VALUES
(1, 900073714, 'R-FAST LTDA', 'Alfredo Cordoba', 33303, 'soporte@r-fast.com', '2020-03-01 12:05:45', '2020-11-30 00:05:45', 'Ninguna', '2020-03-15 12:05:45', '2020-03-30 12:05:45', 1, 2, 1),
(2, 23039920, 'inversoft', 'carlos bejarano', 30240753, 'cabejarano21@gmail.com', '2020-05-01 00:00:00', '2021-05-31 00:00:00', 'ninguna', '2020-05-01 00:00:00', '2020-05-31 00:00:00', 2, 2, 1),
(3, 900030303, 'prueba', 'prueba', 3024045456, 'orlinpad@gmail.com', '2020-05-01 00:00:00', '2021-05-31 00:00:00', 'kkbb', '2020-05-01 00:00:00', '2020-05-31 00:00:00', 2, 2, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `kind`
--

CREATE TABLE `kind` (
  `id` int(11) NOT NULL,
  `kind_name` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `kind`
--

INSERT INTO `kind` (`id`, `kind_name`) VALUES
(1, 'Ticket'),
(2, 'Bug'),
(3, 'Sugerencia'),
(4, 'Mejora'),
(5, 'Caracteristica');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `priority`
--

CREATE TABLE `priority` (
  `id` int(11) NOT NULL,
  `priority_name` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `priority`
--

INSERT INTO `priority` (`id`, `priority_name`) VALUES
(1, 'Alta'),
(2, 'Media'),
(3, 'Baja'),
(4, 'Crítica');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `project`
--

CREATE TABLE `project` (
  `id` int(11) NOT NULL,
  `proyect_name` varchar(200) DEFAULT NULL,
  `description` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `project`
--

INSERT INTO `project` (`id`, `proyect_name`, `description`) VALUES
(1, 'RFAST8', 'Sistema de información integrado con diferentes componentes: Facturación, Clínico, Cartera, Contabilidad, Nómina, Costos, Activos Fijos'),
(2, 'RFAST WEB', 'Sistema de información integrado con diferentes componentes: Facturación, Clínico, Cartera, Contabilidad, Nómina, Costos, Activos Fijos'),
(3, 'RFAST CLOUD', 'Sistema de información integrado con diferentes componentes: Facturación, Clínico, Cartera, Contabilidad, Nómina, Costos, Activos Fijos'),
(4, 'ORFEO', 'Sistema de información para la Gestión documental, radicación y administración de archivo'),
(5, 'HASHNEXT', 'Sistema de información para la Gestión y Mesa de ayuda para el area de soporte y atencion al cliente'),
(6, 'PRESUPUESTO PER', 'Sistema de información para el registro de los ingresos y gastos personales y generar informes');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `status`
--

CREATE TABLE `status` (
  `id` int(11) NOT NULL,
  `status_name` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `status`
--

INSERT INTO `status` (`id`, `status_name`) VALUES
(1, 'Pendiente'),
(2, 'Asignado'),
(3, 'En Proceso'),
(4, 'En Desarrollo'),
(5, 'Finalizado'),
(6, 'Cancelado'),
(7, 'Atendido'),
(8, 'Registrado');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ticket`
--

CREATE TABLE `ticket` (
  `id` int(11) NOT NULL,
  `title` varchar(100) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `kind_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `asigned_id` int(11) DEFAULT NULL,
  `project_id` int(11) DEFAULT NULL,
  `category_id` int(11) DEFAULT NULL,
  `priority_id` int(11) NOT NULL DEFAULT 1,
  `status_id` int(11) NOT NULL DEFAULT 1,
  `profile_pic` varchar(250) DEFAULT NULL,
  `cliente_id` int(11) NOT NULL,
  `atencion_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `ticket`
--

INSERT INTO `ticket` (`id`, `title`, `description`, `updated_at`, `created_at`, `kind_id`, `user_id`, `asigned_id`, `project_id`, `category_id`, `priority_id`, `status_id`, `profile_pic`) VALUES
(1, 'Facturación General', 'Al momento de imprimir la factura no se evidencia la EPS de paciente, la cual se ingresa al momento de ingresar al paciente ', NULL, '2020-03-15 18:49:06', 1, 1, 2, 3, 2, 3, 1, NULL),
(2, 'Adjuntar imagen', 'Prueba imagen', NULL, '2020-03-16 20:51:39', 1, 1, 2, 3, 7, 4, 2, NULL),
(3, 'Prueba cargue imagen', 'cacaascascas', NULL, '2020-03-16 22:01:55', 1, 1, 1, 3, 7, 3, 2, NULL),
(4, 'Cargando imagenes', 'prueba', NULL, '2020-03-16 22:06:50', 1, 1, 2, 3, 5, 2, 2, NULL),
(5, 'No cargan las imagenes', 'prueba', NULL, '2020-03-16 22:11:38', 1, 1, 2, 1, 8, 2, 2, NULL),
(6, 'No se genera la interfaz de contabilidad', 'Prueba interfaz', NULL, '2020-03-16 22:14:21', 1, 1, 2, 2, 5, 2, 2, NULL),
(7, 'No imprime las ordenes medicas', 'Después de grabar la hc no imprime las orden del paciente', NULL, '2020-03-16 22:24:30', 1, 1, 2, 3, 3, 1, 1, NULL),
(8, 'Asignar cita', 'Al momento de asignar un paciente no queda en la agenda del medico', '2020-03-31 23:02:00', '2020-03-17 19:38:36', 1, 1, 2, 2, 2, 2, 5, NULL),
(9, 'Orden medica', 'vsvdvsd', NULL, '2020-03-17 19:39:51', 1, 1, 1, 2, 2, 2, 1, NULL),
(10, 'scac', 'acsasc', NULL, '2020-03-17 19:56:08', 1, 1, 1, 3, 3, 3, 2, NULL),
(11, 'sccas', 'casascascas', '2020-03-31 23:01:47', '2020-03-17 19:56:46', 1, 1, 2, 2, 4, 1, 5, NULL),
(12, 'Asignar cita', 'dcdscdsc', NULL, '2020-03-28 18:26:31', 1, 2, 1, 1, 1, 2, 1, NULL),
(13, 'Asignar cita', 'dcdscdsc', NULL, '2020-03-28 18:26:31', 1, 2, 1, 1, 1, 2, 1, NULL),
(14, 'Historia clínica', 'No imprime el nombre del medico que realizo la atención', NULL, '2020-03-30 14:20:09', 1, 1, 2, 1, 3, 1, 1, NULL),
(15, 'Historia clínica', 'No imprime el nombre del medico que realizo la atención', '2020-03-31 23:01:32', '2020-03-30 14:20:09', 1, 1, 2, 1, 3, 1, 7, NULL),
(16, 'Prueba cargue imagen', 'Se realiza prueba', NULL, '2020-04-02 15:52:07', 1, 1, 2, 1, 2, 1, 1, NULL),
(17, 'Prueba cargue pdf', 'se hace modificación para cargar imagen y consultar la que se cargo', NULL, '2020-04-02 19:00:17', 1, 1, 3, 2, 1, 1, 1, 'codigo.jpg'),
(18, 'Prueba cargue imagen', 'cdcdsc', NULL, '2020-04-02 19:02:52', 1, 1, 1, 1, 1, 1, 2, 'coinbase_2.jpg'),
(19, 'Tarjetero indice', 'Se realiza prueba para regresar a la pagina anterior', NULL, '2020-04-05 17:21:32', 1, 1, 3, 1, 2, 2, 1, 'Dogecoin.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(50) DEFAULT NULL,
  `name` varchar(50) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(60) DEFAULT NULL,
  `profile_pic` varchar(250) DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `kind` int(11) NOT NULL DEFAULT 1,
  `created_at` datetime DEFAULT NULL,
  `role` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `user`
--

INSERT INTO `user` (`id`, `username`, `name`, `email`, `password`, `profile_pic`, `is_active`, `kind`, `created_at`, `role`) VALUES
(1, 'admin', 'Carlos Bejarano Barbosa', 'cabejarano21@gmail.com', '123456', 'blockchain.jpg', 1, 1, '2019-11-05 12:05:45','admin'),
(2, 'admin', 'Rfast soporte', 'soporte@r-fast.com', '10470c3b4b1fed12c3baac014be15fac67c6e815', 'default.png', 1, 1, '2020-03-16 00:23:57','admin');


--
-- Estructura de tabla para la tabla `files_ticket`
--

CREATE TABLE `files_ticket` (
  `id_files_ticket` int(11) NOT NULL,
  `id_ticket` int(11) NOT NULL,
  `files_ticket_name` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Estructura de tabla para la tabla `files_soporte`
--

CREATE TABLE `files_soporte` (
  `id_files_soporte` int(11) NOT NULL,
  `id_atencion` int(11) NOT NULL,
  `files_soporte_name` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `asesor`
--
ALTER TABLE `asesor`
  ADD PRIMARY KEY (`id`);


--
-- Indices de la tabla `project`
--
ALTER TABLE `project`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `causas_soporte`
--
ALTER TABLE `causas_soporte`
  ADD PRIMARY KEY (`id_causa_sop`);

--
-- Indices de la tabla `atencion`
--
ALTER TABLE `atencion`
  ADD PRIMARY KEY (`id_atencion`),
  ADD KEY `id_ticket` (`id_ticket`),
  ADD KEY `kind_id` (`kind_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `asigned_id` (`asigned_id`),
  ADD KEY `project_id` (`project_id`),
  ADD KEY `category_id` (`category_id`),
  ADD KEY `priority_id` (`priority_id`),
  ADD KEY `status_id` (`status_id`),
  ADD KEY `id_causa_sop` (`id_causa_sop`);

--
-- Indices de la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`id_cliente`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `asigned_id` (`asigned_id`);

--
-- Indices de la tabla `kind`
--
ALTER TABLE `kind`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `priority`
--
ALTER TABLE `priority`
  ADD PRIMARY KEY (`id`);


--
-- Indices de la tabla `status`
--
ALTER TABLE `status`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `ticket`
--
ALTER TABLE `ticket`
  ADD PRIMARY KEY (`id`),
  ADD KEY `priority_id` (`priority_id`),
  ADD KEY `status_id` (`status_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `kind_id` (`kind_id`),
  ADD KEY `category_id` (`category_id`),
  ADD KEY `project_id` (`project_id`),
  ADD KEY `asigned_id` (`asigned_id`),
  ADD KEY `cliente_id` (`cliente_id`),
  ADD KEY `atencion_id` (`atencion_id`);

--
-- Indices de la tabla `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);


--
-- Indices de la tabla `files_ticket`
--
ALTER TABLE `files_ticket`
  ADD PRIMARY KEY (`id_files_ticket`),
  ADD KEY `id_ticket` (`id_ticket`);

--
-- Indices de la tabla `files_soporte`
--
ALTER TABLE `files_soporte`
  ADD PRIMARY KEY (`id_files_soporte`),
  ADD KEY `id_atencion` (`id_atencion`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `asesor`
--
ALTER TABLE `asesor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `atencion`
--
ALTER TABLE `atencion`
  MODIFY `id_atencion` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `causas_soporte`
--
ALTER TABLE `causas_soporte`
  MODIFY `id_causa_sop` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `clientes`
--
ALTER TABLE `clientes`
  MODIFY `id_cliente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `kind`
--
ALTER TABLE `kind`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `priority`
--
ALTER TABLE `priority`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `project`
--
ALTER TABLE `project`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `status`
--
ALTER TABLE `status`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `ticket`
--
ALTER TABLE `ticket`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT de la tabla `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `files_ticket`
--
ALTER TABLE `files_ticket`
  MODIFY `id_files_ticket` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `files_soporte`
--
ALTER TABLE `files_soporte`
  MODIFY `id_files_soporte` int(11) NOT NULL AUTO_INCREMENT;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `atencion`
--
ALTER TABLE `atencion`
  ADD CONSTRAINT `atencion_ibfk_1` FOREIGN KEY (`id_ticket`) REFERENCES `ticket` (`id`),  
  ADD CONSTRAINT `atencion_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `atencion_ibfk_3` FOREIGN KEY (`asigned_id`) REFERENCES `asesor` (`id`),
  ADD CONSTRAINT `atencion_ibfk_4` FOREIGN KEY (`status_id`) REFERENCES `status` (`id`),  
  ADD CONSTRAINT `atencion_ibfk_5` FOREIGN KEY (`id_causa_sop`) REFERENCES `causas_soporte` (`id_causa_sop`);

--
-- Filtros para la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD CONSTRAINT `clientes_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `clientes_ibfk_2` FOREIGN KEY (`asigned_id`) REFERENCES `asesor` (`id`);

--
-- Filtros para la tabla `ticket`
--
ALTER TABLE `ticket`
  ADD CONSTRAINT `ticket_ibfk_1` FOREIGN KEY (`priority_id`) REFERENCES `priority` (`id`),
  ADD CONSTRAINT `ticket_ibfk_2` FOREIGN KEY (`status_id`) REFERENCES `status` (`id`),
  ADD CONSTRAINT `ticket_ibfk_3` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `ticket_ibfk_4` FOREIGN KEY (`kind_id`) REFERENCES `kind` (`id`),
  ADD CONSTRAINT `ticket_ibfk_5` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`),
  ADD CONSTRAINT `ticket_ibfk_6` FOREIGN KEY (`project_id`) REFERENCES `project` (`id`),
  ADD CONSTRAINT `ticket_ibfk_7` FOREIGN KEY (`asigned_id`) REFERENCES `asesor` (`id`),
  ADD CONSTRAINT `ticket_ibfk_8` FOREIGN KEY (`cliente_id`) REFERENCES `clientes` (`id_cliente`);

--
-- Filtros para la tabla `files_ticket`
--
ALTER TABLE `files_ticket`
  ADD CONSTRAINT `files_ticket_ibfk_1` FOREIGN KEY (`id_ticket`) REFERENCES `ticket` (`id`);

--
-- Filtros para la tabla `files_soporte`
--
ALTER TABLE `files_soporte`
  ADD CONSTRAINT `files_soporte_ibfk_1` FOREIGN KEY (`id_atencion`) REFERENCES `atencion` (`id_atencion`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
