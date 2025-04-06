-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 06-04-2025 a las 21:25:58
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.1.25

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
(6, 'Recursos Humanos', 'Marta Fernandez', NULL, 0);

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
(1, 1, 'Daniel', 'García', '12345678A', 'daniel.garcia@nike.com', '600123456', '2015-03-12', '1985-07-20', 1, 'casado', 4200.00),
(2, 1, 'Laura', 'Martínez', '23456789B', 'laura.martinez@nike.com', '600234567', '2018-06-01', '1990-11-05', 0, 'soltero', 2900.00),
(3, 1, 'Carlos', 'Ruiz', '34567890C', 'carlos.ruiz@nike.com', '600345678', '2020-01-10', '1992-03-18', 2, 'casado', 2700.00),
(4, 1, 'Elena', 'López', '45678901D', 'elena.lopez@nike.com', '600456789', '2022-09-05', '1996-08-25', 0, 'pareja_hecho', 2500.00),
(5, 1, 'Roberto', 'Ruiz', '34533890C', 'roberto.ruiz@nike.com', '674653278', '2020-03-10', '1990-08-08', 0, 'soltero', 3554.00),
(6, 1, 'Diego', 'Garcia', '34522890P', 'diego.garcia@nike.com', '609890678', '2022-07-19', '1997-11-25', 1, 'casado', 1754.00),
(7, 1, 'Alejandro', 'Teso', '30908890H', 'alejandro.teso@nike.com', '614325678', '2019-09-05', '1987-12-12', 3, 'casado', 3680.00),
(8, 1, 'Javier', 'Martinez', '74777890S', 'javier.martinez@nike.com', '609845678', '2020-02-25', '1992-06-01', 0, 'pareja_hecho', 3150.00),
(9, 1, 'Aaron', 'Martin', '34992390F', 'aaron.martin@nike.com', '617845678', '2023-01-12', '1990-07-19', 1, 'casado', 1760.00),
(10, 1, 'Lucia', 'Esteban', '11247890G', 'lucia.esteban@nike.com', '666295678', '2024-05-05', '2000-02-05', 0, 'soltero', 1880.00),
(11, 1, 'Alejandra', 'Hernandez', '66427890H', 'alejandra.hernandez@nike.com', '693345778', '2018-08-09', '1999-03-28', 0, 'pareja_hecho', 3430.00),
(12, 1, 'Jorge', 'Rubio', '34721890P', 'jorge.rubio@nike.com', '666389278', '2022-01-20', '1996-01-20', 0, 'casado', 2750.00),
(13, 2, 'Alberto', 'Dominguez', '56789012E', 'alberto.dominguez@nike.com', '601123456', '2013-01-25', '1980-04-12', 3, 'casado', 4500.00),
(14, 2, 'Sonia', 'Reyes', '67890123F', 'sonia.reyes@nike.com', '601234567', '2017-07-10', '1988-12-10', 1, 'divorciado', 3100.00),
(15, 2, 'Mario', 'Ortega', '78901234G', 'mario.ortega@nike.com', '601345678', '2019-02-15', '1991-05-03', 0, 'soltero', 2950.00),
(16, 2, 'Carla', 'Roca', '55634234J', 'carla.roca@nike.com', '600845678', '2023-09-19', '1999-02-19', 0, 'soltero', 1650.00),
(17, 2, 'Lorena', 'Gutierrez', '88312234L', 'lorena.gutierrez@nike.com', '686345678', '2017-06-05', '1994-01-03', 1, '', 2950.00),
(18, 2, 'Alberto', 'Calvo', '90345234S', 'alberto.calvo@nike.com', '696101678', '2020-12-22', '1987-01-23', 2, 'divorciado', 2100.00);

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
  MODIFY `id_departamento` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `empleados`
--
ALTER TABLE `empleados`
  MODIFY `id_empleado` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

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
