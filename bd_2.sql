-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 20-03-2021 a las 18:05:04
-- Versión del servidor: 10.4.17-MariaDB
-- Versión de PHP: 7.4.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `ticketly2`
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
(3, 'Asesor', 'Orlay Padilla', 3025248856, 'soporte@r-fast.com', 1, 1, 1),
(4, 'Asesor', 'Edwin Londoño', 3002365968, '4reeres@gmal.com', 1, 1, 1),
(5, 'Asesor', 'Eduardo Barbosa', 3196569853, '4reeres@gmal.com', 1, 1, 1),
(6, 'Asesor', 'Rene Valencia', 3106596859, 'renato@hotmail.com', 1, 1, 1),
(7, 'Asesor', 'Lucrecia Bolivar', 3138956936, 'lucre99@gmail.com', 1, 1, 1);

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
  `id_multimedia` varchar(250) NOT NULL,
  `id_causa_sop` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `atencion`
--

INSERT INTO `atencion` (`id_atencion`, `id_ticket`, `fecha_atencion`, `description`, `kind_id`, `user_id`, `asigned_id`, `project_id`, `category_id`, `priority_id`, `status_id`, `id_multimedia`, `id_causa_sop`) VALUES
(1, 10, '2021-02-10 03:16:55', 'csdsvds', 0, 1, 1, NULL, NULL, 1, 8, '0', 6),
(2, 14, '2021-02-10 03:49:44', 'cascsac', 0, 1, 3, NULL, NULL, 1, 3, '0', 1),
(3, 3, '2021-02-10 04:27:25', 'Presiona el botón de abajo para acceder a el administrador de archivos.', 0, 1, 2, NULL, NULL, 1, 3, '0', 3),
(4, 2, '2021-02-10 04:28:15', 'Presiona el botón de abajo para acceder a el administrador de archivos.', 0, 1, 3, NULL, NULL, 1, 2, '0', 6),
(5, 4, '2021-02-10 04:28:42', 'Presiona el botón de abajo para acceder a el administrador de archivos.', 0, 1, 7, NULL, NULL, 1, 2, '0', 5),
(6, 10, '2021-02-10 04:44:23', 'vaaavsvasvsavsa', 0, 1, 1, NULL, NULL, 1, 8, '0', 9),
(7, 10, '2021-02-10 04:47:22', 'vaaavsvasvsavsa', 0, 1, 1, NULL, NULL, 1, 8, '0', 9),
(8, 2, '2021-02-10 04:47:40', 'vcavadvad', 0, 1, 3, NULL, NULL, 1, 2, '0', 5),
(9, 2, '2021-02-10 04:50:19', 'vdsvdsvdsvds', 0, 1, 3, NULL, NULL, 1, 2, 'linux.png', 8),
(10, 12, '2021-02-10 04:56:28', 'vdsdvddsv', 0, 1, 1, NULL, NULL, 1, 2, 'delete.png', 8),
(11, 13, '2021-02-10 04:56:59', 'vdsvdsv', 0, 1, 1, NULL, NULL, 1, 2, 'logoDebian.png', 7),
(12, 3, '2021-02-14 23:50:44', 'finalizado.,..', 0, 1, 2, NULL, NULL, 1, 5, 'SadTux.png', 9),
(13, 13, '2021-02-14 23:52:28', 'fdfvfdvdf', 0, 1, 1, NULL, NULL, 1, 3, 'SadTux.png', 3),
(14, 2, '2021-02-14 23:53:51', 'vfdvfdsvfds', 0, 1, 1, NULL, NULL, 1, 3, 'logoMint.png', 4),
(15, 5, '2021-02-14 23:54:14', 'dsvdsvdsvds fvsdvsdvsd\r\nvdsvsdvdsvdsv\r\nvdsvds\r\nvd\r\nsvddvdsvvds', 0, 1, 1, NULL, NULL, 1, 3, 'SadTux.png', 1),
(16, 22, '2021-02-14 23:54:56', 'dsvsdvsdvds', 0, 1, 1, NULL, NULL, 1, 3, 'logoMint.png', 3),
(17, 20, '2021-02-14 23:55:15', 'vdsvdsvsdvvbvfsv  fdvfdvfsdv', 0, 1, 1, NULL, NULL, 1, 3, 'settings.png', 3),
(18, 9, '2021-02-18 04:41:10', 'Aquí puedes crear y administrar tus bases de datos.', 0, 1, 4, NULL, NULL, 1, 2, 'linux.png', 10),
(19, 4, '2021-02-18 04:43:29', 'Aquí puedes crear y administrar tus bases de datos.', 0, 1, 7, NULL, NULL, 1, 2, 'settings.png', 2),
(20, 2, '2021-02-18 04:46:04', 'Aquí puedes crear y administrar tus bases de datos.', 0, 1, 1, NULL, NULL, 1, 5, 'logoUbuntu.png', 9),
(21, 12, '2021-02-18 04:50:51', 'Aquí puedes crear y administrar tus bases de datos.', 0, 1, 1, NULL, NULL, 1, 3, 'old_ticket.png', 5),
(22, 27, '2021-03-10 21:49:39', 'cssacsacsacs', 0, 1, 2, NULL, NULL, 1, 2, 'config.png', 3),
(23, 14, '2021-03-10 21:50:19', 'cascscsac cvfvvcxvcxvvfbgfgfbgbfbg', 0, 1, 3, NULL, NULL, 1, 3, 'logo.png', 5),
(24, 15, '2021-03-10 21:51:01', 'se realiza prueba para cambiar el estado de registrado a asignado', 0, 1, 4, NULL, NULL, 1, 2, 'logo.png', 6),
(25, 10, '2021-03-10 21:51:47', 'prueba se cambia estado de registrados a asignados', 0, 1, 1, NULL, NULL, 1, 2, 'config.png', 3),
(26, 41, '2021-03-13 11:25:43', 'Cordial saludo, Se realiza contacto con la Dra. Natali cel 3154799029 para validar el caso en referencia, indica la diferencia del valor en la salida del medicamento, se le indica que dependiendo del método de valoración de inventario ya sea FIFO o promedio ponderado dicho valor va ser diferente, se le explica a la doctora Natalia cada uno de estos métodos, si es FIFO el valor unitario de la salida va ser el valor unitario de la primera entrada no la de la ultima entrada con la que se haya realizado el ingreso de dicho medicamento, y si es promedio ponderado el sistema realiza el calculo del valor unitario de todas las entradas del item y lo promedia y sobre ese promedio se realizan las salidas respectivamente.\r\n\r\nSe da por cerrado el caso.\r\n\r\nQuedamos atentos.', 0, 1, 1, NULL, NULL, 1, 5, 'msj.png', 5);

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
(10, 'Componente CRM', NULL),
(11, 'Componente General', NULL);

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
(3, 900030303, 'prueba', 'prueba', 3024045456, 'orlinpad@gmail.com', '2020-05-01 00:00:00', '2021-05-31 00:00:00', 'kkbb', '2020-05-01 00:00:00', '2020-05-31 00:00:00', 2, 2, 1),
(4, 900086836, 'Apple Inc.', 'Arthur D. Levinson', 665999656, 'cabejarano21@gmail.com', '2021-02-01 00:00:00', '2021-02-28 00:00:00', 'Contrato a un año con renovación a cinco años', '2021-02-01 00:00:00', '2021-03-14 00:00:00', 1, 6, 1),
(6, 900083865, 'Colpensiones', 'Pedro Nel Ospina', 333568958, 'cabejarano21@gmail.com', '2020-01-01 00:00:00', '2021-02-28 00:00:00', 'Contrato a un año con renovación a 6 meses', '2021-02-01 00:00:00', '2021-04-30 00:00:00', 1, 4, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `events`
--

CREATE TABLE `events` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `color` varchar(7) DEFAULT NULL,
  `start` datetime NOT NULL,
  `end` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `events`
--

INSERT INTO `events` (`id`, `title`, `color`, `start`, `end`) VALUES
(1, 'Evento Azul', '#0071c5', '2021-03-07 00:00:00', '2021-03-07 00:00:00'),
(2, 'Eventos 2', '#40E0D0', '2021-03-07 00:00:00', '2021-03-07 00:00:00'),
(3, 'Doble click para editar evento', '#40E0D0', '2021-03-07 00:00:00', '2021-03-07 00:00:00'),
(4, 'Servidor no funciona ', '#FF8C00', '2021-03-10 00:00:00', '2021-03-11 00:00:00'),
(5, 'Facturación General', '#FF0000', '2021-03-10 00:00:00', '2021-03-11 00:00:00'),
(7, 'Capacitacion Costos Norte3 Caso 76586', '#008000', '2021-03-12 00:00:00', '2021-03-13 00:00:00'),
(8, 'Servidor no funciona ', '#0071c5', '2021-03-11 00:00:00', '2021-03-12 00:00:00'),
(9, 'Codigo de barras', '#0071c5', '2021-03-13 00:00:00', '2021-03-14 00:00:00'),
(10, 'Visita preventiva Norte', '#0071c5', '2021-03-15 00:00:00', '2021-03-16 00:00:00'),
(11, 'Visita preventiva Norte', '#0071c5', '2021-03-16 00:00:00', '2021-03-17 00:00:00'),
(12, 'meet.google.com/opa-recd-dcb', '#008000', '2021-03-14 00:00:00', '2021-03-15 00:00:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `files_soporte`
--

CREATE TABLE `files_soporte` (
  `id_files_soporte` int(11) NOT NULL,
  `id_atencion` int(11) NOT NULL,
  `files_soporte_name` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `files_ticket`
--

CREATE TABLE `files_ticket` (
  `id_files_ticket` int(11) NOT NULL,
  `id_ticket` int(11) NOT NULL,
  `files_ticket_name` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `files_ticket`
--

INSERT INTO `files_ticket` (`id_files_ticket`, `id_ticket`, `files_ticket_name`) VALUES
(1, 19, 'linux.png'),
(2, 20, 'write_email.png'),
(3, 21, 'logoFedora.png'),
(4, 22, 'error.png'),
(5, 23, 'logo.png'),
(6, 24, 'logoFedora.png'),
(7, 25, 'linux.png'),
(8, 26, 'slider4.png'),
(9, 27, 'slider4.png'),
(10, 28, 'error.png'),
(11, 29, 'logoFedora.png'),
(12, 30, 'logo.png'),
(13, 31, 'logo.png'),
(14, 32, 'logo.png'),
(15, 33, 'config.png'),
(16, 34, 'logo.png'),
(17, 35, 'logo.png'),
(18, 36, 'logo.png'),
(19, 37, 'delete.png'),
(20, 38, 'error.png'),
(21, 39, 'logoFedora.png'),
(22, 40, 'Edit.png'),
(23, 41, 'Edit.png');

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
-- Estructura de tabla para la tabla `modulo`
--

CREATE TABLE `modulo` (
  `id_modulo` int(11) NOT NULL,
  `titulo_modulo` varchar(100) NOT NULL,
  `descripcion_modulo` varchar(255) NOT NULL,
  `status_modulo` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `permisos`
--

CREATE TABLE `permisos` (
  `id_permiso` int(11) NOT NULL,
  `rol_id` int(11) NOT NULL,
  `modulo_id` int(11) NOT NULL,
  `r` int(11) NOT NULL,
  `w` int(11) NOT NULL,
  `u` int(11) NOT NULL,
  `d` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
-- Estructura de tabla para la tabla `rol`
--

CREATE TABLE `rol` (
  `id_rol` int(11) NOT NULL,
  `nombre_rol` varchar(100) NOT NULL,
  `descripcion_rol` varchar(255) NOT NULL,
  `status_rol` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `rol`
--

INSERT INTO `rol` (`id_rol`, `nombre_rol`, `descripcion_rol`, `status_rol`) VALUES
(1, 'Administrador', 'acceso ilimitado a todo el sistema', 1),
(2, 'Asesor', 'acceso por modulos', 1),
(3, 'Coordinador', 'acceso por modulos', 1),
(4, 'Supervisor', 'acceso por modulos', 1);

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

INSERT INTO `ticket` (`id`, `title`, `description`, `updated_at`, `created_at`, `kind_id`, `user_id`, `asigned_id`, `project_id`, `category_id`, `priority_id`, `status_id`, `profile_pic`, `cliente_id`, `atencion_id`) VALUES
(1, 'Facturación General', 'Al momento de imprimir la factura no se evidencia la EPS de paciente, la cual se ingresa al momento de ingresar al paciente ', NULL, '2020-03-15 18:49:06', 1, 1, 2, 3, 2, 3, 8, NULL, 2, 0),
(2, 'Adjuntar imagen', 'Prueba imagen', '2021-02-18 04:46:04', '2020-03-16 20:51:39', 1, 1, 1, 3, 7, 4, 5, NULL, 2, 0),
(3, 'Prueba cargue imagen', 'cacaascascas', '2021-02-14 23:50:44', '2020-03-16 22:01:55', 1, 1, 2, 3, 7, 3, 5, NULL, 2, 0),
(4, 'Cargando imagenes', 'prueba', '2021-02-18 04:43:29', '2020-03-16 22:06:50', 1, 1, 7, 3, 5, 2, 2, NULL, 2, 0),
(5, 'No cargan las imagenes', 'prueba', '2021-02-14 23:54:14', '2020-03-16 22:11:38', 1, 1, 1, 1, 8, 2, 3, NULL, 2, 0),
(6, 'No se genera la interfaz de contabilidad', 'Prueba interfaz', NULL, '2020-03-16 22:14:21', 1, 1, 2, 2, 5, 2, 2, NULL, 2, 0),
(7, 'No imprime las ordenes medicas', 'Después de grabar la hc no imprime las orden del paciente', NULL, '2020-03-16 22:24:30', 1, 1, 2, 3, 3, 1, 8, NULL, 2, 0),
(8, 'Asignar cita', 'Al momento de asignar un paciente no queda en la agenda del medico', '2020-03-31 23:02:00', '2020-03-17 19:38:36', 1, 1, 2, 2, 2, 2, 5, NULL, 2, 0),
(9, 'Orden medica', 'vsvdvsd', '2021-02-18 04:41:10', '2020-03-17 19:39:51', 1, 1, 4, 2, 2, 2, 2, NULL, 2, 0),
(10, 'scac', 'acsasc', '2021-03-10 21:51:47', '2020-03-17 19:56:08', 1, 1, 1, 3, 3, 3, 2, NULL, 2, 0),
(11, 'sccas', 'casascascas', '2020-03-31 23:01:47', '2020-03-17 19:56:46', 1, 1, 2, 2, 4, 1, 5, NULL, 2, 0),
(12, 'Asignar cita', 'dcdscdsc', '2021-02-18 04:50:51', '2020-03-28 18:26:31', 1, 2, 1, 1, 1, 2, 3, NULL, 2, 0),
(13, 'Asignar cita', 'dcdscdsc', '2021-02-14 23:52:28', '2020-03-28 18:26:31', 1, 2, 1, 1, 1, 2, 3, NULL, 2, 0),
(14, 'Historia clínica', 'No imprime el nombre del medico que realizo la atención', '2021-03-10 21:50:19', '2020-03-30 14:20:09', 1, 1, 3, 1, 3, 1, 3, NULL, 2, 0),
(15, 'Historia clínica', 'No imprime el nombre del medico que realizo la atención', '2021-03-10 21:51:01', '2020-03-30 14:20:09', 1, 1, 4, 1, 3, 1, 2, NULL, 2, 0),
(16, 'Prueba cargue imagen', 'Se realiza prueba', NULL, '2020-04-02 15:52:07', 1, 1, 2, 1, 2, 1, 8, NULL, 2, 0),
(17, 'Prueba cargue pdf', 'se hace modificación para cargar imagen y consultar la que se cargo', NULL, '2020-04-02 19:00:17', 1, 1, 3, 2, 1, 1, 8, 'codigo.jpg', 2, 0),
(18, 'Prueba cargue imagen', 'cdcdsc', NULL, '2020-04-02 19:02:52', 1, 1, 1, 1, 1, 1, 2, 'coinbase_2.jpg', 2, 0),
(19, 'Tarjetero indice', 'Se realiza prueba para regresar a la pagina anterior', '2021-02-10 03:30:41', '2020-04-05 17:21:32', 1, 1, 3, 1, 2, 2, 2, 'Dogecoin.jpg', 1, 0),
(20, 'Prueba cargue pdf', '8 libros de PHP totalmente alucinantes y sobre todo, gratuitos\r\n\r\n \r\n\r\n\r\n \r\n\r\nPHP es uno de los lenguajes de programación para el desarrollo web más populares del momento. Cuenta con una sintaxis accesible y fácil de aprender, funciona en todos los sistemas operativos y se puede utilizar para crear aplicaciones y sitios web clásicos, aplicaciones móviles, backends, REST APIs y mucho más.', '2021-02-14 23:55:16', '2021-02-14 22:12:41', 1, 1, 1, 4, 2, 2, 3, NULL, 2, 0),
(21, 'Orden medica', '8 libros de PHP totalmente alucinantes y sobre todo, gratuitos\r\n\r\n \r\n\r\n\r\n \r\n\r\nPHP es uno de los lenguajes de programación para el desarrollo web más populares del momento. Cuenta con una sintaxis accesible y fácil de aprender, funciona en todos los sistemas operativos y se puede utilizar para crear aplicaciones y sitios web clásicos, aplicaciones móviles, backends, REST APIs y mucho más.', NULL, '2021-02-14 22:13:53', 1, 1, 6, 2, 3, 3, 2, NULL, 3, 0),
(22, 'Prueba cargue imagen', '8 libros de PHP totalmente alucinantes y sobre todo, gratuitos\r\n\r\n \r\n\r\n\r\n \r\n\r\nPHP es uno de los lenguajes de programación para el desarrollo web más populares del momento. Cuenta con una sintaxis accesible y fácil de aprender, funciona en todos los sistemas operativos y se puede utilizar para crear aplicaciones y sitios web clásicos, aplicaciones móviles, backends, REST APIs y mucho más.', '2021-02-14 23:54:56', '2021-02-14 22:14:42', 1, 1, 1, 4, 3, 2, 3, NULL, 2, 0),
(23, 'Codigo de barras', '8 libros de PHP totalmente alucinantes y sobre todo, gratuitos\r\n\r\n \r\n\r\n\r\n \r\n\r\nPHP es uno de los lenguajes de programación para el desarrollo web más populares del momento. Cuenta con una sintaxis accesible y fácil de aprender, funciona en todos los sistemas operativos y se puede utilizar para crear aplicaciones y sitios web clásicos, aplicaciones móviles, backends, REST APIs y mucho más.', NULL, '2021-02-14 22:15:55', 1, 1, 3, 4, 2, 1, 2, NULL, 2, 0),
(24, 'Prueba cargue pdf', '8 libros de PHP totalmente alucinantes y sobre todo, gratuitos\r\n\r\n \r\n\r\n\r\n \r\n\r\nPHP es uno de los lenguajes de programación para el desarrollo web más populares del momento. Cuenta con una sintaxis accesible y fácil de aprender, funciona en todos los sistemas operativos y se puede utilizar para crear aplicaciones y sitios web clásicos, aplicaciones móviles, backends, REST APIs y mucho más.', NULL, '2021-02-14 22:17:24', 1, 1, 1, 4, 2, 1, 2, NULL, 2, 0),
(25, 'Orden medica', 'csacsaccsa', NULL, '2021-02-14 23:49:07', 1, 1, 1, 1, 3, 1, 2, NULL, 3, 0),
(26, 'No imprime las ordenes medicas', 'Esta no es la única forma (y puede que tampoco sea la mejor) pero la idea sería así... entonces, si quisieras sacar la diferencia entre los ID\'s, podrías ponerlo en otra subconsulta:', NULL, '2021-02-15 00:22:22', 1, 1, 1, 4, 3, 1, 2, NULL, 3, 0),
(27, 'Prueba cargue pdf', 'Aquí puedes crear y administrar tus bases de datos.', '2021-03-10 21:49:39', '2021-02-18 04:47:10', 1, 1, 2, 4, 9, 1, 2, NULL, 2, 0),
(28, 'Orden medica', 'Aquí puedes crear y administrar tus bases de datos.', NULL, '2021-02-18 04:49:15', 1, 1, 4, 2, 3, 1, 2, NULL, 2, 0),
(29, 'Facturación General', 'Contrato a un año con renovación a 6 meses', NULL, '2021-02-18 04:56:17', 1, 1, 4, 4, 4, 1, 2, NULL, 4, 0),
(30, 'Servidor no funciona ', 'se queda lento el sistema y no ingresan los usuarios', NULL, '2021-03-10 22:04:17', 1, 1, 5, 1, 2, 1, 2, NULL, 3, 0),
(31, 'Codigo de barras', 'la factura sale sin el codigo de barras', NULL, '2021-03-10 22:05:59', 1, 1, 6, 4, 2, 2, 3, NULL, 6, 0),
(32, 'Informe de correspondencia radicada', 'no funciona el informe de correspondencia radicada por mes', NULL, '2021-03-10 22:09:02', 1, 1, 4, 4, 11, 2, 3, NULL, 4, 0),
(33, 'Error al radicar documentos', 'no se a logrado radicar los documentos que ingresaron', NULL, '2021-03-10 22:10:50', 1, 1, 3, 4, 11, 2, 3, NULL, 2, 0),
(34, 'Facturación General', 'no abre el modulo de facturación general', NULL, '2021-03-10 22:12:23', 1, 1, 3, 3, 2, 2, 3, NULL, 2, 0),
(35, 'Servidor no funciona ', 'cscsacsaas', NULL, '2021-03-10 22:13:04', 1, 1, 1, 1, 11, 1, 3, NULL, 2, 0),
(36, 'Servidor no funciona ', 'cscscsacsscacsa', NULL, '2021-03-10 22:19:34', 1, 1, 2, 2, 11, 1, 2, NULL, 3, 0),
(37, 'Error al radicar documentos', 'gdfvfvdsvds', NULL, '2021-03-10 22:25:07', 1, 1, 2, 2, 11, 2, 2, NULL, 3, 0),
(38, 'Servidor no funciona ', 'ffefsfdsfdsdsvv fvfdvdf', NULL, '2021-03-10 22:27:17', 1, 1, 3, 2, 11, 1, 2, NULL, 4, 0),
(39, 'Error al radicar documentos', 'ckjcdadnsjvsndjv jvnsdvnsdovdslivds vldsvnlsdmk', NULL, '2021-03-10 22:29:17', 1, 1, 2, 3, 11, 2, 3, NULL, 4, 0),
(40, 'Error al radicar documentos', 'ergregrcsacscsae', NULL, '2021-03-10 22:31:36', 1, 1, 2, 2, 11, 2, 3, NULL, 2, 0),
(41, 'valor del medicamento', 'Se evidencia que al momento de realizar una factura el valor de un medicamento incremento en $31 pesos', '2021-03-14 18:38:54', '2021-03-13 11:19:31', 1, 1, 1, 1, 2, 2, 5, NULL, 3, 0);

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
(1, 'admin', 'Carlos Bejarano Barbosa', 'cabejarano21@gmail.com', '123456', 'logo.png', 1, 1, '2019-11-05 12:05:45', 'admin'),
(2, 'admin', 'Rfast soporte', 'soporte@r-fast.com', '10470c3b4b1fed12c3baac014be15fac67c6e815', 'default.png', 1, 1, '2020-03-16 00:23:57', 'admin'),
(5, NULL, 'Lorena Tamayo', 'loretam93@gmail.com', '10470c3b4b1fed12c3baac014be15fac67c6e815', 'default.png', 1, 1, '2021-02-14 18:31:48', 'soporte');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `asesor`
--
ALTER TABLE `asesor`
  ADD PRIMARY KEY (`id`);

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
-- Indices de la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`id_cliente`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `asigned_id` (`asigned_id`);

--
-- Indices de la tabla `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `files_soporte`
--
ALTER TABLE `files_soporte`
  ADD PRIMARY KEY (`id_files_soporte`),
  ADD KEY `id_atencion` (`id_atencion`);

--
-- Indices de la tabla `files_ticket`
--
ALTER TABLE `files_ticket`
  ADD PRIMARY KEY (`id_files_ticket`),
  ADD KEY `id_ticket` (`id_ticket`);

--
-- Indices de la tabla `kind`
--
ALTER TABLE `kind`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `modulo`
--
ALTER TABLE `modulo`
  ADD PRIMARY KEY (`id_modulo`);

--
-- Indices de la tabla `permisos`
--
ALTER TABLE `permisos`
  ADD PRIMARY KEY (`id_permiso`),
  ADD KEY `rol_id` (`rol_id`),
  ADD KEY `modulo_id` (`modulo_id`);

--
-- Indices de la tabla `priority`
--
ALTER TABLE `priority`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `project`
--
ALTER TABLE `project`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `rol`
--
ALTER TABLE `rol`
  ADD PRIMARY KEY (`id_rol`);

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
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `asesor`
--
ALTER TABLE `asesor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `atencion`
--
ALTER TABLE `atencion`
  MODIFY `id_atencion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT de la tabla `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `causas_soporte`
--
ALTER TABLE `causas_soporte`
  MODIFY `id_causa_sop` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `clientes`
--
ALTER TABLE `clientes`
  MODIFY `id_cliente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `events`
--
ALTER TABLE `events`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `files_soporte`
--
ALTER TABLE `files_soporte`
  MODIFY `id_files_soporte` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `files_ticket`
--
ALTER TABLE `files_ticket`
  MODIFY `id_files_ticket` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT de la tabla `kind`
--
ALTER TABLE `kind`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `modulo`
--
ALTER TABLE `modulo`
  MODIFY `id_modulo` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `permisos`
--
ALTER TABLE `permisos`
  MODIFY `id_permiso` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `priority`
--
ALTER TABLE `priority`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `project`
--
ALTER TABLE `project`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `rol`
--
ALTER TABLE `rol`
  MODIFY `id_rol` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `status`
--
ALTER TABLE `status`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `ticket`
--
ALTER TABLE `ticket`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT de la tabla `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

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
-- Filtros para la tabla `files_ticket`
--
ALTER TABLE `files_ticket`
  ADD CONSTRAINT `files_ticket_ibfk_1` FOREIGN KEY (`id_ticket`) REFERENCES `ticket` (`id`);

--
-- Filtros para la tabla `permisos`
--
ALTER TABLE `permisos`
  ADD CONSTRAINT `permisos_ibfk_1` FOREIGN KEY (`rol_id`) REFERENCES `rol` (`id_rol`),
  ADD CONSTRAINT `permisos_ibfk_2` FOREIGN KEY (`modulo_id`) REFERENCES `modulo` (`id_modulo`);

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
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
