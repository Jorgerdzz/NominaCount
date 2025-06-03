

CREATE TABLE `empresas` (
  `id_empresa` int(11) PRIMARY KEY AUTO_INCREMENT NOT NULL,
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
  `id_usuario` int(11) PRIMARY KEY AUTO_INCREMENT NOT NULL,
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


