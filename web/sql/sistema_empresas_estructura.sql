

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


CREATE TABLE `usuarios` (
  `id_usuario` int(11) NOT NULL,
  `id_empresa` int(11) NOT NULL,
  `nombre_usuario` varchar(255) NOT NULL,
  `rol` enum('Empresario','Empleado') NOT NULL,
  `ceo` tinyint(1) DEFAULT 0,
  `delegado` tinyint(1) NOT NULL DEFAULT 0,
  `email` varchar(255) NOT NULL,
  `contrasena` varchar(255) NOT NULL,

  CONSTRAINT fk_id_empresa FOREIGN KEY (id_empresa)
  REFERENCES empresas(id_empresa)
  ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


ALTER TABLE `empresas`
  ADD PRIMARY KEY (`id_empresa`);


ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_usuario`),
  ADD KEY `id_empresa` (`id_empresa`);


ALTER TABLE `empresas`
  MODIFY `id_empresa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=183;

ALTER TABLE `usuarios`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=174;

ALTER TABLE `usuarios`
  ADD CONSTRAINT `usuarios_ibfk_1` FOREIGN KEY (`id_empresa`) REFERENCES `empresas` (`id_empresa`) ON DELETE CASCADE;
COMMIT;

