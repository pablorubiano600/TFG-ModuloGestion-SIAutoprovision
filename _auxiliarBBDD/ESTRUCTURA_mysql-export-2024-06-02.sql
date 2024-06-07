CREATE TABLE `SIM_CMDB_APLICACION`(
    `id_CMDB_APLICACION` BIGINT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `nombre_aplicacion` CHAR(255) NOT NULL,
    `area_responsable` CHAR(255) NOT NULL
);
CREATE TABLE `SIM_INTEGRACION_EQUIPOC`(
    `id_INTEGRACION_EQUIPOC` BIGINT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `nombre` CHAR(255) NOT NULL,
    `vcpu_libre` BIGINT NOT NULL,
    `mem_libre` BIGINT NOT NULL,
    `alm_libre` BIGINT NOT NULL
);
CREATE TABLE `SIM_INTEGRACION_EQUIPOA`(
    `id_INTEGRACION_EQUIPOA` BIGINT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `nombre` CHAR(255) NOT NULL,
    `vcpu_libre` BIGINT NOT NULL,
    `mem_libre` BIGINT NOT NULL,
    `alm_libre` BIGINT NOT NULL
);
CREATE TABLE `SIM_TAREAS`(
    `id_TAREAS` BIGINT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `descripcion` CHAR(255) NOT NULL,
    `lanzador` CHAR(255) NOT NULL,
    `asignado` CHAR(255) NOT NULL,
    `fecha_lanzamiento` DATETIME NOT NULL,
    `estado` CHAR(255) NOT NULL
);
CREATE TABLE `MG_logsactividad`(
    `id_logsactividad` BIGINT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `fecha_evento` DATETIME NOT NULL,
    `usuario_evento` CHAR(255) NOT NULL,
    `tipo_evento` CHAR(255) NOT NULL,
    `descripcion_evento` CHAR(255) NOT NULL
);
CREATE TABLE `SIM_DML`(
    `id_DML` BIGINT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `nombre_dml` CHAR(255) NOT NULL,
    `ubicacion` CHAR(255) NOT NULL
);
CREATE TABLE `SIM_IAM`(
    `id_IAM` BIGINT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `nombre` CHAR(255) NOT NULL,
    `rol` CHAR(255) NOT NULL,
    `password` CHAR(255) NOT NULL
);
CREATE TABLE `MG_plantillaservidor`(
    `id_plantillaservidor` BIGINT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `nombre_plantillaservidor` CHAR(255) NOT NULL,
    `recurso_cpu` BIGINT NOT NULL,
    `recurso_memoria` BIGINT NOT NULL,
    `recurso_almacenamiento` BIGINT NOT NULL,
    `sw_sistemaoperativo` BIGINT NOT NULL,
    `sw_aux_seguridad` BIGINT NOT NULL,
    `sw_aux_monitorizacion` BIGINT NOT NULL,
    `sw_aux_backup` BIGINT NOT NULL,
    `sw_funcional` BIGINT NOT NULL
);
CREATE TABLE `MG_servidor`(
    `id_servidor` BIGINT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `nombre_servidor` CHAR(255) NOT NULL,
    `id_plataforma` BIGINT NOT NULL,
    `id_plantillaservidor` BIGINT NOT NULL
);
CREATE TABLE `SIM_CMDB_SW`(
    `id_CMDB_SW` BIGINT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `nombre_sw` CHAR(255) NOT NULL,
    `tipo` CHAR(255) NOT NULL,
    `id_DML` BIGINT NOT NULL
);
CREATE TABLE `SIM_INTEGRACION_EQUIPOB`(
    `id_INTEGRACION_EQUIPOB` BIGINT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `nombre` CHAR(255) NOT NULL,
    `vcpu_libre` BIGINT NOT NULL,
    `mem_libre` BIGINT NOT NULL,
    `alm_libre` BIGINT NOT NULL
);
CREATE TABLE `MG_plataforma`(
    `id_plataforma` BIGINT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `nombre_plataforma` CHAR(255) NOT NULL,
    `aplicacionasociada` CHAR(255) NOT NULL,
    `tareaasociada` BIGINT NOT NULL,
    `estado` CHAR(255) NOT NULL
);
ALTER TABLE
    `MG_plantillaservidor` ADD CONSTRAINT `mg_plantillaservidor_sw_aux_seguridad_foreign` FOREIGN KEY(`sw_aux_seguridad`) REFERENCES `SIM_CMDB_SW`(`id_CMDB_SW`);
ALTER TABLE
    `MG_plantillaservidor` ADD CONSTRAINT `mg_plantillaservidor_sw_sistemaoperativo_foreign` FOREIGN KEY(`sw_sistemaoperativo`) REFERENCES `SIM_CMDB_SW`(`id_CMDB_SW`);
ALTER TABLE
    `MG_plantillaservidor` ADD CONSTRAINT `mg_plantillaservidor_sw_aux_backup_foreign` FOREIGN KEY(`sw_aux_backup`) REFERENCES `SIM_CMDB_SW`(`id_CMDB_SW`);
ALTER TABLE
    `MG_servidor` ADD CONSTRAINT `mg_servidor_id_plataforma_foreign` FOREIGN KEY(`id_plataforma`) REFERENCES `MG_plataforma`(`id_plataforma`);
ALTER TABLE
    `MG_plataforma` ADD CONSTRAINT `mg_plataforma_aplicacionasociada_foreign` FOREIGN KEY(`aplicacionasociada`) REFERENCES `SIM_CMDB_APLICACION`(`id_CMDB_APLICACION`);
ALTER TABLE
    `MG_plantillaservidor` ADD CONSTRAINT `mg_plantillaservidor_sw_aux_monitorizacion_foreign` FOREIGN KEY(`sw_aux_monitorizacion`) REFERENCES `SIM_CMDB_SW`(`id_CMDB_SW`);
ALTER TABLE
    `MG_servidor` ADD CONSTRAINT `mg_servidor_id_plantillaservidor_foreign` FOREIGN KEY(`id_plantillaservidor`) REFERENCES `MG_plantillaservidor`(`id_plantillaservidor`);
ALTER TABLE
    `MG_plantillaservidor` ADD CONSTRAINT `mg_plantillaservidor_sw_funcional_foreign` FOREIGN KEY(`sw_funcional`) REFERENCES `SIM_CMDB_SW`(`id_CMDB_SW`);
ALTER TABLE
    `SIM_CMDB_SW` ADD CONSTRAINT `sim_cmdb_sw_id_dml_foreign` FOREIGN KEY(`id_DML`) REFERENCES `SIM_DML`(`id_DML`);