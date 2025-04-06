
CREATE TABLE IF NOT EXISTS departamentos (
    id_departamento INT AUTO_INCREMENT PRIMARY KEY,
    nombre_departamento VARCHAR(255) NOT NULL,
    jefe_departamento VARCHAR(255) NOT NULL,
    num_empleados INT NULL,
    coste_total_departamento DOUBLE NULL
);