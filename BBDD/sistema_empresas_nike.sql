-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 08-04-2025 a las 17:43:49
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `sistema_empresas_nike`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `departamentos`
--

CREATE TABLE `departamentos` (
  `id_departamento` int(11) NOT NULL,
  `nombre_departamento` varchar(255) NOT NULL,
  `jefe_departamento` varchar(255) NOT NULL,
  `num_empleados` int(11) DEFAULT NULL,
  `coste_total_departamento` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `departamentos`
--

INSERT INTO `departamentos` (`id_departamento`, `nombre_departamento`, `jefe_departamento`, `num_empleados`, `coste_total_departamento`) VALUES
(1, 'Informática', 'Daniel García', NULL, 0),
(2, 'Finanzas', 'Alberto Dominguez', NULL, 0),
(3, 'Operaciones', 'Javier Torres', NULL, 0),
(4, 'Marketing', 'Ana Perez', NULL, 0),
(5, 'Investigación y Desarrollo', 'Fernando Díaz', NULL, 0),
(8, 'Recursos Humanos', 'Marta Fernández ', NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empleados`
--

CREATE TABLE `empleados` (
  `id_empleado` int(11) NOT NULL,
  `id_departamento` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `apellidos` varchar(150) NOT NULL,
  `dni` varchar(15) NOT NULL,
  `email` varchar(150) NOT NULL,
  `telefono` varchar(20) DEFAULT NULL,
  `antiguedad_empresa` date NOT NULL,
  `fecha_nacimiento` date NOT NULL,
  `num_hijos` int(11) DEFAULT 0,
  `estado_civil` enum('soltero','casado','divorciado','viudo','pareja_hecho') NOT NULL,
  `salario_base` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `empleados`
--

INSERT INTO `empleados` (`id_empleado`, `id_departamento`, `nombre`, `apellidos`, `dni`, `email`, `telefono`, `antiguedad_empresa`, `fecha_nacimiento`, `num_hijos`, `estado_civil`, `salario_base`) VALUES
(1, 1, 'Daniel', 'García Maroto', '12345678A', 'daniel.garcia@nike.com', '600123456', '2015-03-12', '1985-07-20', 1, 'casado', 4200.00),
(2, 1, 'Laura', 'Martínez Hernández', '23456789B', 'laura.martinez@nike.com', '600234567', '2018-06-01', '1990-11-05', 0, 'soltero', 2900.00),
(3, 1, 'Carlos', 'Ruiz Lopez', '34567890C', 'carlos.ruiz@nike.com', '600345678', '2020-01-10', '1992-03-18', 2, 'casado', 2700.00),
(4, 1, 'Elena', 'López García', '45678901D', 'elena.lopez@nike.com', '600456789', '2022-09-05', '1996-08-25', 0, 'pareja_hecho', 2500.00),
(5, 1, 'Roberto', 'Ruiz Alonso', '34533890C', 'roberto.ruiz@nike.com', '674653278', '2020-03-10', '1990-08-08', 0, 'soltero', 3554.00),
(6, 1, 'Diego', 'Garcia Bonacasa', '34522890P', 'diego.garcia@nike.com', '609890678', '2022-07-19', '1997-11-25', 1, 'casado', 1754.00),
(7, 1, 'Alejandro', 'Teso Ortiz', '30908890H', 'alejandro.teso@nike.com', '614325678', '2019-09-05', '1987-12-12', 3, 'casado', 3680.00),
(8, 1, 'Javier', 'Martinez Gutierrez', '74777890S', 'javier.martinez@nike.com', '609845678', '2020-02-25', '1992-06-01', 0, 'pareja_hecho', 3150.00),
(9, 1, 'Aaron', 'Martin Casado', '34992390F', 'aaron.martin@nike.com', '617845678', '2023-01-12', '1990-07-19', 1, 'casado', 1760.00),
(10, 1, 'Lucia', 'Esteban Ruiz', '11247890G', 'lucia.esteban@nike.com', '666295678', '2024-05-05', '2000-02-05', 0, 'soltero', 1880.00),
(11, 1, 'Alejandra', 'Hernandez Hidalgo', '66427890H', 'alejandra.hernandez@nike.com', '693345778', '2018-08-09', '1999-03-28', 0, 'pareja_hecho', 3430.00),
(12, 1, 'Jorge', 'Rubio Martín', '34721890P', 'jorge.rubio@nike.com', '666389278', '2022-01-20', '1996-01-20', 0, 'casado', 2750.00),
(13, 2, 'Alberto', 'Domínguez González', '56789012E', 'alberto.dominguez@nike.com', '601123456', '2013-01-25', '1980-04-12', 3, 'casado', 4500.00),
(14, 2, 'Sonia', 'Reyes Lopez', '67890123F', 'sonia.reyes@nike.com', '601234567', '2017-07-10', '1988-12-10', 1, 'divorciado', 3100.00),
(15, 2, 'Mario', 'Ortega Campos', '78901234G', 'mario.ortega@nike.com', '601345678', '2019-02-15', '1991-05-03', 0, 'soltero', 2950.00),
(16, 2, 'Carla', 'Roca Pérez', '55634234J', 'carla.roca@nike.com', '600845678', '2023-09-19', '1999-02-19', 0, 'soltero', 1650.00),
(17, 2, 'Lorena', 'Gutiérrez Domínguez', '88312234L', 'lorena.gutierrez@nike.com', '686345678', '2017-06-05', '1994-01-03', 1, '', 2950.00),
(18, 2, 'Alberto', 'Calvo Rubio', '90345234S', 'alberto.calvo@nike.com', '696101678', '2020-12-22', '1987-01-23', 2, 'divorciado', 2100.00),
(19, 3, 'Javier', 'Torres López', '89012345H', 'javier.torres@nike.com', '602123456', '2012-11-20', '1978-01-30', 2, 'casado', 4700.00),
(20, 3, 'Beatriz', 'Muñoz Casado', '90123456I', 'beatriz.munoz@nike.com', '602234567', '2016-04-18', '1986-09-09', 2, 'casado', 3200.00),
(21, 3, 'Pablo', 'Navarro Domínguez', '01234567J', 'pablo.navarro@nike.com', '602345678', '2018-08-01', '1990-07-15', 1, 'pareja_hecho', 3100.00),
(22, 3, 'Clara', 'Jiménez Perez', '71691267F', 'clara.jimenez@nike.com', '602456789', '2021-01-12', '1993-06-21', 0, 'soltero', 2800.00),
(23, 3, 'Alicia', 'García Sánchez', '81239874S', 'alicia.garcia@nike.com', '656586789', '2018-01-23', '1996-07-01', 0, 'soltero', 3100.00),
(24, 3, 'Carmen', 'Gómez Cardona', '21231236S', 'carmen.lopez@nike.com', '609633289', '2023-05-07', '1989-01-27', 0, 'pareja_hecho', 1560.00),
(25, 3, 'Roberto', 'Rodríguez Perez', '61239873P', 'roberto.rodriguez@nike.com', '663426789', '2024-07-27', '1982-09-09', 1, 'casado', 1700.00),
(26, 3, 'Andrés', 'Pérez Campos', '71233235G', 'andres.perez@nike.com', '602621889', '2016-03-02', '1999-09-02', 0, 'soltero', 3890.00),
(27, 3, 'Alejandro', 'Fidalgo Casado', '31237471K', 'alejandro.fidalgo@nike.com', '619206789', '2021-09-14', '2000-03-06', 0, 'soltero', 2340.00),
(28, 3, 'Jorge', 'Ortiz Ramirez', '41239134V', 'jorge.ortiz@nike.com', '602400969', '2019-06-09', '1995-03-17', 0, 'soltero', 2800.00),
(29, 3, 'Borja', 'Morales Garrido', '61234232L', 'borja.morales@nike.com', '611156789', '2022-08-01', '1987-08-06', 1, 'divorciado', 1800.00),
(30, 3, 'Gonzalo', 'Díaz Muñoz', '97639167J', 'gonzalo.diaz@nike.com', '696746789', '2020-04-19', '1980-12-25', 2, 'casado', 2250.00),
(31, 3, 'Marta', 'Díaz López', '01234658N', 'marta.diaz@nike.com', '696426789', '2022-11-04', '1973-09-29', 2, 'divorciado', 1860.00),
(32, 4, 'Ana', 'Perez Ortiz', '12234567L', 'ana.perez@nike.com', '603123456', '2014-02-03', '1983-03-22', 2, 'casado', 4300.00),
(33, 4, 'Lucía', 'Santos Sánchez', '13234567M', 'lucia.santos@nike.com', '603234567', '2019-09-09', '1992-10-11', 0, 'soltero', 3000.00),
(34, 4, 'Hugo', 'Moreno Ortega', '14234567N', 'hugo.moreno@nike.com', '603345678', '2020-06-17', '1994-02-27', 1, 'pareja_hecho', 2850.00),
(35, 4, 'Carlos', 'García Rubio', '15234567O', 'carlos.garcia@nike.com', '603456789', '2018-03-15', '1985-05-30', 1, 'casado', 3200.00),
(36, 4, 'María', 'López Calvo', '16234567P', 'maria.lopez@nike.com', '603567890', '2017-11-20', '1990-07-14', 0, 'soltero', 3100.00),
(37, 4, 'Javier', 'Martínez Campos', '17234567Q', 'javier.martinez@nike.com', '603678901', '2021-01-10', '1988-12-05', 0, 'soltero', 2800.00),
(38, 4, 'Elena', 'Fernández López', '18234567R', 'elena.fernandez@nike.com', '603789012', '2016-05-25', '1982-09-18', 2, 'casado', 3500.00),
(39, 4, 'Sergio', 'Ramírez Martín', '19234567S', 'sergio.ramirez@nike.com', '603890123', '2015-08-30', '1991-03-12', 1, 'pareja_hecho', 3000.00),
(100, 5, 'Fernando', 'Díaz Pérez', '15239667L', 'fernando.diaz@nike.com', '604123456', '2011-12-01', '1975-06-04', 3, 'casado', 4900.00),
(101, 5, 'Marta', 'Suárez Fernández', '01204567P', 'marta.suarez@nike .com', '604234567', '2017-03-22', '1987-04-18', 1, 'casado', 3100.00),
(102, 5, 'Luis', 'Gil Morales', '17777167H', 'luis.gil@nike.com', '604345678', '2022-07-13', '1995-11-30', 0, 'soltero', 2750.00),
(103, 5, 'Clara', 'Morales Pérez', '18298527R', 'clara.morales@nike.com', '604456789', '2019-05-10', '1990-08-25', 0, 'soltero', 2900.00),
(104, 5, 'Jorge', 'Cruz Torres', '11326797S', 'jorge.cruz@nike.com', '604567890', '2018-11-15', '1983-01-12', 2, 'casado', 3300.00),
(105, 5, 'Patricia', 'Hernández López', '20234567T', 'patricia.hernandez@nike.com', '604678901', '2016-04-20', '1988-02-14', 1, 'casado', 3200.00),
(106, 5, 'Raúl', 'Jiménez Sánchez', '21234567U', 'raul.jimenez@nike.com', '604789012', '2020-09-05', '1992-11-22', 0, 'soltero', 2700.00),
(107, 5, 'Verónica', 'Pérez Ruiz', '22234567V', 'veronica.perez@nike.com', '604890123', '2015-06-30', '1985-03-10', 2, 'casado', 3400.00),
(108, 5, 'Andrés', 'Torres Castro', '23234567W', 'andres.torres@nike.com', '604901234', '2018-01-15', '1990-12-01', 0, 'soltero', 3000.00),
(109, 5, 'Sofía', 'Ríos Martínez', '24234567X', 'sofia.rios@nike.com', '604012345', '2017-08-12', '1994-05-18', 1, 'pareja_hecho', 3100.00),
(170, 1, 'Alberto', 'Campos Ortiz', '99999999R', 'alberto.campos@nike.com', '978765432', '2025-04-08', '1990-07-09', 0, 'soltero', 1345.56),
(231, 8, 'Marta', 'Fernandez López', '16368567R', 'marta.fernandez@nike.com', '605123456', '2016-05-15', '1984-08-08', 2, 'casado', 4100.00),
(232, 8, 'Raúl', 'Vega Martínez', '19293627S', 'raul.vega@nike.com', '605234567', '2019-10-10', '1990-01-02', 1, 'divorciado', 2950.00),
(233, 8, 'Isabel', 'Ramos García', '97354567T', 'isabel.ramos@nike.com', '605345678', '2021-12-25', '1996-09-17', 0, 'soltero', 2700.00),
(234, 8, 'Fernando', 'Moreno Sánchez', '63278967U', 'fernando.moreno@nike.com', '605456789', '2018-03-30', '1985-11-12', 1, 'casado', 3200.00),
(235, 8, 'Lucía', 'Cruz Torres', '22287587V', 'lucia.cruz@nike.com', '605567890', '2020-07-05', '1993-04-20', 0, 'soltero', 2800.00),
(236, 8, 'Javier', 'Pérez Ruiz', '54896567W', 'javier.perez@nike.com', '605678901', '2017-11-15', '1989-02-28', 2, 'pareja_hecho', 3000.00);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `departamentos`
--
ALTER TABLE `departamentos`
  ADD PRIMARY KEY (`id_departamento`);

--
-- Indices de la tabla `empleados`
--
ALTER TABLE `empleados`
  ADD PRIMARY KEY (`id_empleado`),
  ADD UNIQUE KEY `dni` (`dni`),
  ADD KEY `fk_departamento_empleado` (`id_departamento`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `departamentos`
--
ALTER TABLE `departamentos`
  MODIFY `id_departamento` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `empleados`
--
ALTER TABLE `empleados`
  MODIFY `id_empleado` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=237;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `empleados`
--
ALTER TABLE `empleados`
  ADD CONSTRAINT `fk_departamento_empleado` FOREIGN KEY (`id_departamento`) REFERENCES `departamentos` (`id_departamento`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
