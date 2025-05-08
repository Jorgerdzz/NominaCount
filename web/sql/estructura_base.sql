
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

CREATE TABLE IF NOT EXISTS nominas (
    id_nomina INT AUTO_INCREMENT PRIMARY KEY,
    id_empleado INT NOT NULL,
    fecha_inicio DATE NOT NULL,
    fecha_fin DATE NOT NULL,

    -- Complementos salariales
    salario_base DECIMAL(10,2),
    incentivos DECIMAL(10,2),
    plus_especial_dedicacion DECIMAL(10,2),
    plus_antiguedad DECIMAL(10,2),
    plus_actividad DECIMAL(10,2),
    plus_nocturnidad DECIMAL(10,2),
    plus_responsabilidad DECIMAL(10,2),
    plus_convenio DECIMAL(10,2),
    plus_idiomas DECIMAL(10,2),
    horas_extra DECIMAL(10,2),
    horas_complementarias DECIMAL(10,2),
    salario_especie DECIMAL(10,2),

    -- Percepciones no salariales
    indemnizaciones DECIMAL(10,2),
    indemnizaciones_ss DECIMAL(10,2),
    indemnizaciones_despido DECIMAL(10,2),
    plus_transporte DECIMAL(10,2),
    dietas DECIMAL(10,2),
    
    base_cc DECIMAL(10,2),
    base_cp DECIMAL(10,2),
    
    -- Deducciones
    importe_cc DECIMAL(10,2),
    importe_MEI DECIMAL(10,2),
    importe_desempleo DECIMAL(10,2),
    importe_fp DECIMAL(10,2),
    importe_horas_extra DECIMAL(10,2),
    importe_horas_extra_fuerza_mayor DECIMAL(10,2),
    cotizacion_ss DECIMAL(10,2),
    importe_irpf DECIMAL(10,2),
    total_deducciones DECIMAL(10,2),

    -- Totales
    total_devengado DECIMAL(10,2),
    salario_neto DECIMAL(10,2),

    CONSTRAINT fk_empleado_nomina FOREIGN KEY (id_empleado) 
    REFERENCES empleados(id_empleado)
    ON DELETE CASCADE
);

CREATE TABLE IF NOT EXISTS costes_trabajador(
    id_costo INT AUTO_INCREMENT PRIMARY KEY,
    id_empleado INT NOT NULL,
    fecha_inicio DATE NOT NULL,
    fecha_fin DATE NOT NULL,
    cotizacion_contingencias_comunes DECIMAL(10,2),
    cotizacion_accidentes_trabajo DECIMAL(10,2),
    cotizacion_desempleo_empresa DECIMAL(10,2),
    cotizacion_formacion_empresa DECIMAL(10,2),
    cotizacion_fogasa_empresa DECIMAL(10,2),
    cotizacion_horas_extra DECIMAL(10,2),
    cotizacion_horas_extra_fuerza_mayor DECIMAL(10,2),
    coste_total_trabajador DECIMAL(10,2),

    CONSTRAINT fk_empleado_coste FOREIGN KEY (id_empleado) 
    REFERENCES empleados(id_empleado)
    ON DELETE CASCADE
);

CREATE TABLE IF NOT EXISTS vacaciones (
    id_vacacion INT AUTO_INCREMENT PRIMARY KEY,
    id_empleado INT,
    fecha_inicio DATE,
    fecha_fin DATE,
    estado ENUM('pendiente', 'aprobado', 'rechazado') DEFAULT 'pendiente',
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (id_empleado) REFERENCES empleados(id_empleado)
);
