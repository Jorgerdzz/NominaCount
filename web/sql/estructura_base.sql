
CREATE TABLE IF NOT EXISTS departamentos (
    id_departamento INT AUTO_INCREMENT PRIMARY KEY,
    nombre_departamento VARCHAR(255) NOT NULL,
    jefe_departamento VARCHAR(255) NOT NULL,
    num_empleados INT NULL,
    coste_total_departamento DOUBLE NULL
);

CREATE TABLE IF NOT EXISTS empleados (
    id_empleado INT AUTO_INCREMENT PRIMARY KEY,
    id_departamento INT NOT NULL,
    nombre VARCHAR(100) NOT NULL,
    apellidos VARCHAR(150) NOT NULL,
    dni VARCHAR(15) NOT NULL UNIQUE,
    num_seguridad_social VARCHAR (12) NOT NULL UNIQUE,
    email VARCHAR(150) NOT NULL,
    telefono VARCHAR(20),
    antiguedad_empresa DATE NOT NULL,
    fecha_nacimiento DATE NOT NULL,
    categoria_profesional ENUM('Ingenieros y Licenciados. Personal de alta dirección',
                         'Ingenieros Técnicos, Peritos y Ayudantes Titulados',
                         'Jefes Administrativos y de Taller',
                         'Ayudantes no titulados',
                         'Oficiales Administrativos',
                         'Subalternos',
                         'Auxiliares administrativos',
                         'Oficiales de primera y segunda',
                         'Oficiales de tercera y especialistas',
                         'Peones',
                         'Trabajadores menores de dieciocho años') NOT NULL,
    minusvalia ENUM('Sin discapacidad', 'Entre el 33% y el 65%', 'Igual o superior al 65%')
    NOT NULL,
    num_hijos INT DEFAULT 0,
    estado_civil ENUM('soltero', 'casado', 'divorciado', 'viudo', 'pareja_hecho') NOT NULL,
    salario_base DECIMAL(10,2) NOT NULL,
    
    CONSTRAINT fk_departamento_empleado FOREIGN KEY (id_departamento)
        REFERENCES departamentos(id_departamento)
        ON DELETE CASCADE
);