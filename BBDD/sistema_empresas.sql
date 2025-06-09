-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 09-06-2025 a las 17:27:57
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
-- Base de datos: `sistema_empresas`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empresas`
--

CREATE TABLE `empresas` (
  `id_empresa` int(11) NOT NULL,
  `cif` varchar(9) NOT NULL,
  `denominacion_social` varchar(255) NOT NULL,
  `nombre_comercial` varchar(255) NOT NULL,
  `direccion` varchar(255) NOT NULL,
  `telefono` varchar(255) NOT NULL,
  `logo_path` varchar(255) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `db_nombre` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `empresas`
--

INSERT INTO `empresas` (`id_empresa`, `cif`, `denominacion_social`, `nombre_comercial`, `direccion`, `telefono`, `logo_path`, `email`, `db_nombre`) VALUES
(156, 'A34321434', 'Nike S.A.', 'Nike', 'Avenida del mundo Nº20, Madrid, España', '976453621', 'views/img/logos/logo_nike.png', 'martinez@nike.com', 'sistema_empresas_Nike'),
(160, 'A74567644', 'Adidas S.A.', 'Adidas', 'calle real numero 8 , Murcia, España', '999923213', 'views/img/logos/logo_adidas.png', 'alberto.gutierrezsanchez@adidas.com', 'sistema_empresas_Adidas'),
(162, 'B97704035', 'Umbro', 'Umbro', 'Calle Médico Salvador Úbeda núm. 5 3 6, 46800', '952239000', 'views/img/logos/logo_umbro.png', 'fernando.tejerohernandez@umbro.com', 'sistema_empresas_Umbro'),
(182, 'B85868339', 'Puma S.A.', 'Puma', 'Calle José Abascal, 45 - PISO 2, Madrid, 28003, Madrid', '635897456', 'views/img/logos/logo_puma.png', 'contacto@puma.com', 'sistema_empresas_Puma');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id_usuario` int(11) NOT NULL,
  `id_empresa` int(11) NOT NULL,
  `nombre_usuario` varchar(255) NOT NULL,
  `rol` enum('Empresario','Empleado') NOT NULL,
  `ceo` tinyint(1) DEFAULT 0,
  `delegado` tinyint(1) NOT NULL DEFAULT 0,
  `email` varchar(255) NOT NULL,
  `contrasena` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id_usuario`, `id_empresa`, `nombre_usuario`, `rol`, `ceo`, `delegado`, `email`, `contrasena`) VALUES
(83, 156, 'Roberto Martínez Conde', 'Empresario', 1, 1, 'roberto.martinezconde@nike.com', '$2y$10$c0v7exOiOReJM6VG4jAH0.T6MwqCoG9GHNmBD5PtrB4wJWkVt5u0m'),
(87, 160, 'Alberto Gutierrez Sanchez', 'Empresario', 1, 1, 'alberto.gutierrezsanchez@adidas.com', '$2y$10$0ezPTA7oEqoXOYejCXFdruNlP/Da27k.DqfRio07PTbDJpch2GEt6'),
(92, 160, 'Nerea Esteban Ruiz', 'Empresario', 0, 0, 'nerea.estebanruiz@adidas.com', '$2y$10$9CeuhspC.NMv3Ihm0X0.7u01gPv6q9vYsUgKRBlyA9Jcqjy8VpNJa'),
(101, 160, 'Jimena Campos Ruiz', 'Empleado', 0, 0, 'jimena.camposruiz@adidas.com', '$2y$10$2cMWXnC8rdmYHyt3H2eIE.pgvzVgDLWlgXMqZFoQYnW98.VwSg0wm'),
(102, 160, 'Juan Perez Lopez', 'Empleado', 0, 0, 'juan.perezlopez@adidas.com', '$2y$10$kufEqAxORLNuFqVJvsr58uvM/czQyiITeoGktOjqNmXQ1ol/lVGDG'),
(103, 160, 'Ana Gomez Ruiz', 'Empleado', 0, 0, 'ana.gomezruiz@adidas.com', '$2y$10$cpNzvDioc/jcf2u0yHzKwepNjDva00Y.CrifD.2r4CkL0bu3x9.ZC'),
(105, 160, 'Andres Martin Bravo', 'Empleado', 0, 0, 'andres.martinbravo@adidas.com', '$2y$10$pvaSf7VhhKj3CWEU9qhXgOrIXOOcrJiqG6Mn82XAqUzYhbQLOJcda'),
(107, 162, 'Fernando Tejero Hernández', 'Empresario', 1, 0, 'fernando.tejerohernandez@umbro.com', '$2y$10$DrWzyKzh2GaWnsZvsNL8Xe03dWL3dGMFDha9OJ7ClQLYTB6rqa8D6'),
(110, 156, 'Daniel García Maroto', 'Empresario', 0, 1, 'daniel.garciamaroto@nike.com', '$2y$10$TFg5RYMewmBEDC5NF/hIseXa8Mdq2GRop4gcjjrrDrJnhkiM1jydC'),
(111, 156, 'Laura Martínez Hernández', 'Empleado', 0, 0, 'laura.martinezhernandez@nike.com', '$2y$10$KphecIglCrN1IFigcynAE.yYJ4Adf8jwyZlq5/64oSt3c4zdSftHa'),
(112, 156, 'Carlos Ruiz Lopez', 'Empleado', 0, 0, 'carlos.ruizlopez@nike.com', '$2y$10$08zVjV/SVt6a9ilO7TCK/eWxddArUzjgPKVHWk5FXe7WCQzOrsLa2'),
(113, 156, 'Elena López García', 'Empleado', 0, 0, 'elena.lopezgarcia@nike.com', '$2y$10$QgeGW45jgpMNpl2OEz6D7O7lyZ6OpeXsEM3Qvr5ySpsCTsp2MoSOG'),
(114, 156, 'Roberto Ruiz Alonso', 'Empleado', 0, 0, 'roberto.ruizalonso@nike.com', '$2y$10$HcwNk1zLoQcg5kezScEseesXsG92nAg/nA0MOc2dgMlezcbNDvnda'),
(115, 156, 'Diego Garcia Bonacasa', 'Empleado', 0, 0, 'diego.garciabonacasa@nike.com', '$2y$10$Ao/Am4ztFEt2AxFX.6tYT.Y7T//tqT.BWI/dSKv2fm6KWd90R3Ewi'),
(116, 156, 'Alejandro Teso Ortiz', 'Empleado', 0, 0, 'alejandro.tesortiz@nike.com', '$2y$10$RSi8gApE7aM4dP.s/VzZJuV4.5ZqWrd1lX7Qz3vppC9dRpkwPM3Nq'),
(117, 156, 'Javier Martinez Gutierrez', 'Empleado', 0, 0, 'javier.martinezgutierrez@nike.com', '$2y$10$g3QpwTqzSZhO5.C9XFRjKuU0QxrbA/hfvW5poq/mKGkXK2xgKqPJy'),
(118, 156, 'Aaron Martin Casado', 'Empleado', 0, 0, 'aaron.martincasado@nike.com', '$2y$10$0eLiB4yw5A0fly4BMfbluuXSWJEWRptETpF82wIYFK45JgN8tkDyK'),
(119, 156, 'Lucia Esteban Ruiz', 'Empleado', 0, 0, 'lucia.estebanruiz@nike.com', '$2y$10$HsbrIxz.Wh.dhd9PiRcQ1Oyw6P1g8NToTT13uJHaW4TAbejW27N5a'),
(120, 156, 'Alejandra Hernandez Hidalgo', 'Empleado', 0, 0, 'alejandra.hernandezhidalgo@nike.com', '$2y$10$NlBDlDe3/Ej31ULRAdtYO.SUVQoxVdSJ1QKVB8WLJAnI9uHH518Ri'),
(121, 156, 'Jorge Rubio Martín', 'Empleado', 0, 0, 'jorge.rubiomartin@nike.com', '$2y$10$eHRpSGjFAolpfvRBwDRaa.7P.EdiU9GpBhQef668POuAKwktYLz/q'),
(122, 156, 'Alberto Campos Ortiz', 'Empleado', 0, 0, 'alberto.camposortiz@nike.com', '$2y$10$IZ8.wiBZhXRcOls6Tk1s4e3xO8tBi8BsheN23/G.RQaDQuHHYECk6'),
(123, 156, 'Alberto Domínguez González', 'Empleado', 0, 0, 'alberto.dominguezgonzalez@nike.com', '$2y$10$1BzqYcDpYRz/Tsyli002deduZCPwnrJ5ZYP3gkgMcy7fH92m/Unle'),
(124, 156, 'Sonia Reyes Lopez', 'Empleado', 0, 0, 'sonia.reyeslopez@nike.com', '$2y$10$pu4Mf0NOPTjVapWbNdJS7eOH4EZRAIqwRB0XC1hjVacgD3fiuhIDW'),
(125, 156, 'Mario Ortega Campos', 'Empleado', 0, 0, 'mario.ortegacampos@nike.com', '$2y$10$rB/xEmP7OBrqgchAorqrxOKS6aI0iY6tMiRZ12FtX.QLr0BKeCc4G'),
(126, 156, 'Carla Roca Pérez', 'Empleado', 0, 0, 'carla.rocaperez@nike.com', '$2y$10$JjQOL9GMOm8EmNpnJHo03.svBAjuAinvVFtCH1XR6FO5qvzR1AeSy'),
(127, 156, 'Lorena Gutiérrez Domínguez', 'Empleado', 0, 0, 'lorena.gutierrezdominguez@nike.com', '$2y$10$tVylfrtDn6SFzBDvnW.AOejG3Ddla6tGUYtVzSjleYyOcYgeS7nla'),
(128, 156, 'Alberto Calvo Rubio', 'Empleado', 0, 0, 'alberto.calvorubio@nike.com', '$2y$10$I6X4q7acQSej2yvXj7ky5.riqPKny6SbS4xK3F/lXdgf3LMkvSxS6'),
(129, 156, 'Javier Torres López', 'Empleado', 0, 0, 'javier.torreslopez@nike.com', '$2y$10$TGKZ6RcS2o.Ls9aLRRQHZ.pKZ9gvbtllHYG/LeUkpIFT80oLKu2ya'),
(130, 156, 'Beatriz Muñoz Casado', 'Empleado', 0, 0, 'beatriz.munozcasado@nike.com', '$2y$10$wLXUE9tv2pYZwXmG7i6GO.wjyXViKpeVEO5PXHseaSODBVv11I8jm'),
(131, 156, 'Pablo Navarro Domínguez', 'Empleado', 0, 0, 'pablo.navarrodominguez@nike.com', '$2y$10$x2XBf4qxpfHHonHmEONY4etom0PwegrKBaMCLYJd.EOrcsO9lk2qW'),
(132, 156, 'Clara Jiménez Perez', 'Empleado', 0, 0, 'clara.jimenezperez@nike.com', '$2y$10$Ng39VAejCB4AVW30fsbQteQcv9nTslJNi4se1fbmuBvoq0onZsHs6'),
(133, 156, 'Alicia García Sánchez', 'Empleado', 0, 0, 'alicia.garciasanchez@nike.com', '$2y$10$WgNoAf6yU7OFHy4DeEp48./Li6e1z9xhwyZQVBmd.aFsjy8Ye/ns2'),
(134, 156, 'Carmen Gómez Cardona', 'Empleado', 0, 0, 'carmen.lopezcardona@nike.com', '$2y$10$JYHeyPKaqZVXu3C.ANs7JeIHMmIzBTh0acQn36OgBw6ahdnA.cb1u'),
(135, 156, 'Roberto Rodríguez Perez', 'Empleado', 0, 0, 'roberto.rodriguezperez@nike.com', '$2y$10$3i.ogfTGB3LNx9uRVc9gu.bLSwflYAj/EdbJciOmK7rZSzNxqiIWa'),
(136, 156, 'Andrés Pérez Campos', 'Empleado', 0, 0, 'andres.perezcampos@nike.com', '$2y$10$7N8k9ExOlr/NlYaIfIX0X.LnvuRxb.lAK66f4uJIZDE2Gx/rtfFVK'),
(137, 156, 'Alejandro Fidalgo Casado', 'Empleado', 0, 0, 'alejandro.fidalgocasado@nike.com', '$2y$10$SnbBQgfO2LxItyfFjKBNheZt7lvVWGst9aD.u5GiLdX7l1w814eXS'),
(138, 156, 'Jorge Ortiz Ramirez', 'Empleado', 0, 0, 'jorge.ortizramirez@nike.com', '$2y$10$CqFBaHJ9VrOiyppYAFu8hOzn8eftKg4xscolwvwEfrwBKzbxaNkZC'),
(139, 156, 'Borja Morales Garrido', 'Empleado', 0, 0, 'borja.moralesgarrido@nike.com', '$2y$10$HOyzcQAjp83Q/UYNs9v2tuw85kHhGB7CR4KXn70dxYbFjDmQvI0Dy'),
(140, 156, 'Gonzalo Díaz Muñoz', 'Empleado', 0, 0, 'gonzalo.diazmuñoz@nike.com', '$2y$10$JTiUEH4zyxa18XdErf2lqe9x1emzb/LjNlLLVzwN6CaA9vm.wJxFq'),
(141, 156, 'Marta Díaz López', 'Empleado', 0, 0, 'marta.diazlopez@nike.com', '$2y$10$3ydy3B9eVPwuPncm44KThO/XAjLbjMlDfKL1LmDn/DQsU2W2t/m02'),
(142, 156, 'Ana Perez Ortiz', 'Empleado', 0, 0, 'ana.perezortiz@nike.com', '$2y$10$/4gSRio1mwM1C0nHEkDSgO39q04V4leAnHAfit2wpYLVF8qGz2P9i'),
(143, 156, 'Lucía Santos Sánchez', 'Empleado', 0, 0, 'lucia.santosanchez@nike.com', '$2y$10$QKCVO1yhkOoHNNjsj6n/k.DBKNirh4EcB1KBqrw1fNWrx7BZEjwFa'),
(144, 156, 'Hugo Moreno Ortega', 'Empleado', 0, 0, 'hugo.morenortega@nike.com', '$2y$10$uF4OTnIRdc6Vf2oqnoYf9uHusooM8JffGdgO2tv5W/BeFBaj5sfYa'),
(145, 156, 'Carlos García Rubio', 'Empleado', 0, 0, 'carlos.garciarubio@nike.com', '$2y$10$pwteI.k3UrTYANOyP74boeoLXEYL7PG2T7svzQiDeZqKxyoltWwYC'),
(146, 156, 'María López Calvo', 'Empleado', 0, 0, 'maria.lopezcalvo@nike.com', '$2y$10$5bjBEqsxmD5pX.LaLisCaOfwr/VYA3Ij/neCrWII4hY6xOwm44aHq'),
(147, 156, 'Javier Martínez Campos', 'Empleado', 0, 0, 'javier.martinezcampos@nike.com', '$2y$10$sPk6fh0kixHsb9AiiwY8p.AXzvxy/euQNnX2rkORV4G4cbBDyYOmm'),
(148, 156, 'Elena Fernández López', 'Empleado', 0, 0, 'elena.fernandezlopez@nike.com', '$2y$10$lRvo00H.Myu.Y3e7mATEuO5IDCDfoF56VbPWgqbrhh2D10fUoV5Vq'),
(149, 156, 'Sergio Ramírez Martín', 'Empleado', 0, 0, 'sergio.ramirezmartin@nike.com', '$2y$10$BFaE2NNCIU.u4WMaLbFblOE20/1v1h50mFndJKOHqLxW3oGCWszBy'),
(150, 156, 'Fernando Díaz Pérez', 'Empleado', 0, 0, 'fernando.diazperez@nike.com', '$2y$10$x64/7DTRTon2OPPVmWZ3Bupyjrms0HnCleTao8N2.8/TYeqz.hp4y'),
(151, 156, 'Marta Suárez Fernández', 'Empleado', 0, 0, 'marta.suarezfernandez@nike.com', '$2y$10$hKMO7qJRCsXCDK2oKz7O6uCpuFBWlFnA6k791qHag/PoQO5KS6p1G'),
(152, 156, 'Luis Gil Morales', 'Empleado', 0, 0, 'luis.gilmorales@nike.com', '$2y$10$O9QJFtLVy2BRHLKt5BV0Iu0D7iJ/kyKc4Aoj8.0BLKkR6Gjvo2.52'),
(153, 156, 'Clara Morales Pérez', 'Empleado', 0, 0, 'clara.moralesperez@nike.com', '$2y$10$YLwiY.kesj8dKTO3S/oeT.f8QrjwOpS12.EGMtN2o/jxGeoHyMzdC'),
(154, 156, 'Jorge Cruz Torres', 'Empleado', 0, 0, 'jorge.cruztorres@nike.com', '$2y$10$IP.Lx96YeXdAD6tq3rGv1uQJUCzYVf4Q99S5uDa5fpwzO5hfJxkme'),
(155, 156, 'Patricia Hernández López', 'Empleado', 0, 0, 'patricia.hernandezlopez@nike.com', '$2y$10$9Yu8FGxhpcFNQj1.nz6tjuP2e096js1BmcZTVPumkGK0Sgh8v7jMi'),
(156, 156, 'Raúl Jiménez Sánchez', 'Empleado', 0, 0, 'raul.jimenezsanchez@nike.com', '$2y$10$aBDBrJkkl1LgHlxb4gg2bOI2Z06b0NPjcOVHFpZPUbuEyik1RI6yC'),
(157, 156, 'Verónica Pérez Ruiz', 'Empleado', 0, 0, 'veronica.perezruiz@nike.com', '$2y$10$4N7P8sM5xQTlxvCd/2RkUOdx7bmW5PjOLNhPQKxJ1lpQN7vNfemLy'),
(158, 156, 'Andrés Torres Castro', 'Empleado', 0, 0, 'andres.torrescastro@nike.com', '$2y$10$U9hXIy2kHGNc09fyfcBJX.JS7lb0lwSyYoTaKvHJgsUDqN3JB7ejS'),
(159, 156, 'Sofía Ríos Martínez', 'Empleado', 0, 0, 'sofia.riosmartinez@nike.com', '$2y$10$FnGacPKSRdEN7r9U79lu7OWtFfC5/4sjwpNSjvE4Lk3Jf2jMiUEXi'),
(160, 156, 'Marta Fernandez López', 'Empleado', 0, 0, 'marta.fernandezlopez@nike.com', '$2y$10$5Aoaa0NMpKqfzeyTw0MuYOPPjTpTdjOAzujiEam2phSHNyV1nsIoS'),
(161, 156, 'Raúl Vega Martínez', 'Empleado', 0, 0, 'raul.vegamartinez@nike.com', '$2y$10$UqjvsCCnt7znoMRfcHnbl.ChjgvgD7rFxiLVLXuXhL0ofPhccHL5m'),
(162, 156, 'Isabel Ramos García', 'Empleado', 0, 0, 'isabel.ramosgarcia@nike.com', '$2y$10$01wiCm7KWt73D9FZKii0wu39Ko4e4dAvoK/2A5gT3Aqh6L39xjTcC'),
(163, 156, 'Fernando Moreno Sánchez', 'Empleado', 0, 0, 'fernando.morenosanchez@nike.com', '$2y$10$fB2O.gWYI3CJPiI2jF64FOa9yOD7msXm1Ip8mg147HFW6uBJDlnle'),
(164, 156, 'Lucía Cruz Torres', 'Empleado', 0, 0, 'lucia.cruztorres@nike.com', '$2y$10$0yeWPFOhbyGjRLl16v6OEed.gkMPd0I98aLMZgokJMsKQmIrdB1bO'),
(165, 156, 'Javier Pérez Ruiz', 'Empleado', 0, 0, 'javier.perezruiz@nike.com', '$2y$10$tbch/Wkij0w9zJsXj6/2B.8Su0XgVRWOigsth6p8mbAHyfi7YZiXy'),
(169, 182, 'Alicia Casado Martin', 'Empresario', 1, 1, 'alicia.casadomartin@puma.com', '$2y$10$rqDdjhYcLQjtUTHwIx.vVu6kHonILkYwmGyq0ZvPrAKS8qHEoQ9SO'),
(179, 182, 'Juan Pérez García', 'Empleado', 0, 0, 'juan.perezgarcia@puma.com', '$2y$10$Qciu/bgw65i3ZfJ6fnuehOic3aBDGjYs9OuziIUeNgSxIAI9R51Be'),
(180, 182, 'Javier Campos Ruiz', 'Empleado', 0, 0, 'javier.camposruiz@puma.com', '$2y$10$WO0RZdkPtTlCU4ayuMQBEuvpshQBhrTi4op1.goMAJ2m5FhMDwVAa');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `empresas`
--
ALTER TABLE `empresas`
  ADD PRIMARY KEY (`id_empresa`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_usuario`),
  ADD KEY `id_empresa` (`id_empresa`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `empresas`
--
ALTER TABLE `empresas`
  MODIFY `id_empresa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=185;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=181;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `usuarios_ibfk_1` FOREIGN KEY (`id_empresa`) REFERENCES `empresas` (`id_empresa`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
