
/* ********************************************* */
-- Documento para realizar la carga inicial de datos de prueba para el módulo de Gestión perteneciente al SI de Autoprovisión
-- De manera previa se habrá realizado la construcción de la estructura mediante el archivo SQL exportado de la aplicación de diseño DrawSQL
-- Nota: Para insertar en el campo "id_" que es autoincremental usamos DEFAULT
/* ********************************************* */


/*
SIM_CMDB_APLICACION
    id_CMDB_APLICACION
    nombre_aplicacion
    area_responsable
*/

INSERT INTO SIM_CMDB_APLICACION
(id_CMDB_APLICACION, nombre_aplicacion, area_responsable)
VALUES
(DEFAULT, 'Web Corporativa', 'Área TIC'),
(DEFAULT, 'Gestión de Nóminas', 'Área Económica'),
(DEFAULT, 'Gestión RRHH', 'Área RRHH'),
(DEFAULT, 'Gestión de Citas', 'Área Económica'),
(DEFAULT, 'Gestión de Inventario', 'Área Económica'),
(DEFAULT, 'Proxy Navegación', 'Área TIC'),
(DEFAULT, 'Gestión Formación', 'Área RRHH'),
(DEFAULT, 'Gestión Ausencias', 'Área RRHH')
;



/* ********************************************* */

/*
Estructura MG_plataforma
    id_plataforma
    nombre_plataforma
    aplicacionasociada
	tareaasociada
	estado

*/

INSERT INTO MG_plataforma
(id_plataforma, nombre_plataforma, aplicacionasociada, tareaasociada, estado)
VALUES
(DEFAULT, 'Plataforma Web Corporativa', 1, 'Vigente'),
(DEFAULT, 'Plataforma Gestión de Nóminas', 2, 'Vigente'),
(DEFAULT, 'Plataforma Gestión RRHH', 3, 'Vigente'),
(DEFAULT, 'Plataforma Gestión de Citas', 4, 'Vigente'),
(DEFAULT, 'Plataforma Gestión de Inventario', 5, 'Vigente'),
(DEFAULT, 'Plataforma Proxy Navegación', 6, 'Petición'),
(DEFAULT, 'Plataforma Gestión Formación', 7, 'Petición')
;


/* ********************************************* */

/*
Estructura MG_servidor
    id_servidor
    nombre_servidor
    id_plataforma
    id_plantillaservidor
*/


INSERT INTO MG_servidor
(id_servidor, nombre_servidor, id_plataforma, id_plantillaservidor)
VALUES
(DEFAULT, 'SERV-001', 1, 11),
(DEFAULT, 'SERV-002', 1, 11),
(DEFAULT, 'SERV-003', 1, 11),
(DEFAULT, 'SERV-004', 1, 11),
(DEFAULT, 'SERV-005', 1, 11),
(DEFAULT, 'SERV-006', 1, 8),
(DEFAULT, 'SERV-007', 1, 8),
(DEFAULT, 'SERV-008', 2, 2),
(DEFAULT, 'SERV-009', 2, 6),
(DEFAULT, 'SERV-010', 3, 10),
(DEFAULT, 'SERV-011', 3, 10),
(DEFAULT, 'SERV-012', 3, 6),
(DEFAULT, 'SERV-013', 3, 6),
(DEFAULT, 'SERV-014', 4, 10),
(DEFAULT, 'SERV-015', 4, 6),
(DEFAULT, 'SERV-016', 5, 11),
(DEFAULT, 'SERV-017', 5, 7),
(DEFAULT, 'SERV-018', 6, 3),
(DEFAULT, 'SERV-019', 6, 3),
(DEFAULT, 'SERV-020', 6, 3),
(DEFAULT, 'SERV-021', 6, 3),
(DEFAULT, 'SERV-022', 6, 3),
(DEFAULT, 'SERV-023', 7, 12),
(DEFAULT, 'SERV-024', 7, 12),
(DEFAULT, 'SERV-025', 7, 12),
(DEFAULT, 'SERV-026', 7, 8),
(DEFAULT, 'SERV-027', 7, 8)
;


/* ********************************************* */


/*
Estructura SIM_DML
    id_DML
    nombre_dml
    ubicacion
*/

INSERT INTO SIM_DML
(id_DML, nombre_dml, ubicacion)
VALUES
(DEFAULT, 'Software simulado 1', 'Ubicación simulada 1')
;



/* ********************************************* */
/*
Estructura SIM_CMDB_SW
    id_CMDB_SW
    nombre_sw
    tipo
    id_DML
*/

INSERT INTO SIM_CMDB_SW
(id_CMDB_SW, nombre_sw, tipo, id_DML)
VALUES
(DEFAULT, 'Windows Server 2019', 'Sistema Operativo', 1),
(DEFAULT, 'RHEL 9', 'Sistema Operativo', 1),
(DEFAULT, 'Windows Server 2016', 'Sistema Operativo', 1),
(DEFAULT, 'Symantec SEP (Agente Windows)', 'Seguridad', 1),
(DEFAULT, 'Symantec SEP (Agente Linux)', 'Seguridad', 1),
(DEFAULT, 'MS SCOM (Agente Windows)', 'Monitorización', 1),
(DEFAULT, 'MS SCOM (Agente Linux)', 'Monitorización', 1),
(DEFAULT, 'Veritas Backup (Agente Windows)', 'Backup', 1),
(DEFAULT, 'Veritas Backup (Agente Linux)', 'Backup', 1),
(DEFAULT, 'MS SQL Server', 'Funcional', 1),
(DEFAULT, 'MySQL', 'Funcional', 1),
(DEFAULT, 'MS IIS', 'Funcional', 1),
(DEFAULT, 'Apache', 'Funcional', 1),
(DEFAULT, 'N/A', 'N/A', 1)
;

/* ********************************************* */
/*
Estructura MG_plantillaservidor
    id_plantillaservidor
    nombre_plantillaservidor
    recurso_cpu
    recurso_memoria
    recurso_almacenamiento
    sw_sistemaoperativo
    sw_aux_seguridad
    sw_aux_monitorizacion
    sw_aux_backup
    sw_funcional
*/

INSERT INTO MG_plantillaservidor
(id_plantillaservidor, nombre_plantillaservidor, recurso_cpu, recurso_memoria, recurso_almacenamiento, sw_sistemaoperativo, sw_aux_seguridad, sw_aux_monitorizacion, sw_aux_backup, sw_funcional)
VALUES
(DEFAULT, 'Windows Genérico - Bajo', 4, 4, 0.5, 1, 4, 6, 8, 14),
(DEFAULT, 'Windows Genérico - Medio', 8, 8, 1, 1, 4, 6, 8, 14),
(DEFAULT, 'Linux Genérico - Bajo', 4, 4, 0.5, 2, 5, 7, 9, 14),
(DEFAULT, 'Linux Genérico - Medio', 8, 8, 1, 2, 5, 7, 9, 14),
(DEFAULT, 'Windows SQL - Bajo', 4, 4, 2, 3, 4, 6, 8, 10),
(DEFAULT, 'Windows SQL - Medio', 8, 16, 2, 3, 4, 6, 8, 10),
(DEFAULT, 'Linux SQL - Bajo', 4, 4, 2, 2, 5, 7, 9, 11),
(DEFAULT, 'Linux SQL - Medio', 8, 16, 2, 2, 5, 7, 9, 11),
(DEFAULT, 'Windows Web - Bajo', 4, 4, 0.5, 3, 4, 6, 8, 12),
(DEFAULT, 'Windows Web - Medio', 8, 8, 1, 3, 4, 6, 8, 12),
(DEFAULT, 'Linux Web - Bajo', 4, 4, 0.5, 2, 5, 7, 9, 13),
(DEFAULT, 'Linux Web - Medio', 8, 8, 1, 2, 5, 7, 9, 13)
;



/* ********************************************* */
/*
Estructura MG_logsactividad
    id_logsactividad
    fecha_evento
    usuario_evento
    tipo_evento
    descripcion_evento
);
*/
INSERT INTO MG_logsactividad
(id_logsactividad, fecha_evento, usuario_evento, tipo_evento, descripcion_evento)
VALUES
(DEFAULT, '2024-05-01 19:30:35', 'infra@opf.gob', 'Integración IAM', 'Login exitoso'),
(DEFAULT, '2024-05-01 19:32:32', 'desa@opf.gob', 'Integración IAM', 'Login exitoso'),
(DEFAULT, '2024-05-01 19:45:45', 'infra@opf.gob', 'Integración IAM', 'Login fallido'),
(DEFAULT, '2024-05-03 05:26:01', 'desa@opf.gob', 'Integración IAM', 'Login exitoso'),
(DEFAULT, '2024-05-02 22:13:50', 'infra@opf.gob', 'Integración IAM', 'Login fallido'),

(DEFAULT, '2024-05-15 08:29:15', 'desa@opf.gob', 'Integración IAM', 'Login exitoso'),
(DEFAULT, '2024-05-15 08:30:15', 'desa@opf.gob', 'Integración TAREAS', 'Petición de Plataforma (ID: 1 - NOMBRE: Plataforma Web Corporativa)'),
(DEFAULT, '2024-05-15 08:40:00', 'infra@opf.gob', 'Integración IAM', 'Login exitoso'),
(DEFAULT, '2024-05-15 08:46:03', 'infra@opf.gob', 'Módulo Gestión', 'Aprovisionamiento de Plataforma (ID: 1 - NOMBRE: Plataforma Web Corporativa)'),
(DEFAULT, '2024-05-15 08:47:03', 'infra@opf.gob', 'Integración EQUIPAMIENTO', 'Aprovisionamiento efectivo de Plataforma (ID: 1 - NOMBRE: Plataforma Web Corporativa)'),
(DEFAULT, '2024-05-15 08:47:03', 'infra@opf.gob', 'Integración TAREAS', 'Aprobación de Plataforma (ID: 1 - NOMBRE: Plataforma Web Corporativa)'),

(DEFAULT, '2024-05-18 16:15:40', 'desa@opf.gob', 'Integración IAM', 'Login exitoso'),
(DEFAULT, '2024-05-18 16:20:44', 'desa@opf.gob', 'Integración TAREAS', 'Petición de Plataforma (ID: 2 - NOMBRE: Plataforma Gestión de Nóminas)'),
(DEFAULT, '2024-05-18 16:45:00', 'infra@opf.gob', 'Integración IAM', 'Login exitoso'),
(DEFAULT, '2024-05-18 17:00:03', 'infra@opf.gob', 'Módulo Gestión', 'Aprovisionamiento Plataforma (ID: 2 - NOMBRE: Plataforma Gestión de Nóminas)'),
(DEFAULT, '2024-05-18 17:01:04', 'infra@opf.gob', 'Integración EQUIPAMIENTO', 'Aprovisionamiento efectivo Plataforma (ID: 2 - NOMBRE: Plataforma Gestión de Nóminas)'),
(DEFAULT, '2024-05-18 17:01:04', 'infra@opf.gob', 'Integración TAREAS', 'Aprobación Plataforma (ID: 2 - NOMBRE: Plataforma Gestión de Nóminas)'),

(DEFAULT, '2024-05-19 12:40:12', 'desa@opf.gob', 'Integración IAM', 'Login exitoso'),
(DEFAULT, '2024-05-19 12:47:00', 'desa@opf.gob', 'Integración TAREAS', 'Petición de Plataforma (ID: 3 - NOMBRE: Plataforma Gestión RRHH)'),
(DEFAULT, '2024-05-19 19:50:56', 'infra@opf.gob', 'Integración IAM', 'Login exitoso'),
(DEFAULT, '2024-05-19 19:54:23', 'infra@opf.gob', 'Módulo Gestión', 'Aprovisionamiento de Plataforma (ID: 3 - NOMBRE: Plataforma Gestión RRHH)'),
(DEFAULT, '2024-05-19 19:55:23', 'infra@opf.gob', 'Integración EQUIPAMIENTO', 'Aprovisionamiento efectivo de Plataforma (ID: 3 - NOMBRE: Plataforma Gestión RRHH)'),
(DEFAULT, '2024-05-19 19:55:23', 'infra@opf.gob', 'Integración TAREAS', 'Aprobación de Plataforma (ID: 3 - NOMBRE: Plataforma Gestión RRHH)'),

(DEFAULT, '2024-05-20 08:05:43', 'desa@opf.gob', 'Integración IAM', 'Login exitoso'),
(DEFAULT, '2024-05-20 09:03:12', 'desa@opf.gob', 'Integración TAREAS', 'Petición de Plataforma (ID: 4 - NOMBRE: Plataforma Gestión de Citas)'),
(DEFAULT, '2024-05-20 13:07:00', 'infra@opf.gob', 'Integración IAM', 'Login exitoso'),
(DEFAULT, '2024-05-20 13:57:23', 'infra@opf.gob', 'Módulo Gestión', 'Aprovisionamiento de Plataforma (ID: 4 - NOMBRE: Plataforma Gestión de Citas)'),
(DEFAULT, '2024-05-20 13:58:00', 'infra@opf.gob', 'Integración EQUIPAMIENTO', 'Aprovisionamiento efectivo de Plataforma (ID: 4 - NOMBRE: Plataforma Gestión de Citas)'),
(DEFAULT, '2024-05-20 13:58:00', 'infra@opf.gob', 'Integración TAREAS', 'Aprobación de Plataforma (ID: 4 - NOMBRE: Plataforma Gestión de Citas)'),

(DEFAULT, '2024-05-21 09:00:45', 'desa@opf.gob', 'Integración IAM', 'Login exitoso'),
(DEFAULT, '2024-05-21 10:32:05', 'desa@opf.gob', 'Integración TAREAS', 'Petición de Plataforma (ID: 5 - NOMBRE: Plataforma Gestión de Inventario)'),
(DEFAULT, '2024-05-21 11:23:12', 'infra@opf.gob', 'Integración IAM', 'Login exitoso'),
(DEFAULT, '2024-05-21 11:30:10', 'infra@opf.gob', 'Módulo Gestión', 'Aprovisionamiento de Plataforma (ID: 5 - NOMBRE: Plataforma Gestión de Inventario)'),
(DEFAULT, '2024-05-21 11:30:10', 'infra@opf.gob', 'Integración EQUIPAMIENTO', 'Aprovisionamiento efectivo de Plataforma (ID: 5 - NOMBRE: Plataforma Gestión de Inventario)'),
(DEFAULT, '2024-05-21 11:31:10', 'infra@opf.gob', 'Integración TAREAS', 'Aprobación de Plataforma (ID: 5 - NOMBRE: Plataforma Gestión de Inventario)'),

(DEFAULT, '2024-05-30 08:12:23', 'desa@opf.gob', 'Integración IAM', 'Login exitoso'),
(DEFAULT, '2024-05-30 08:30:00', 'desa@opf.gob', 'Integración TAREAS', 'Petición de Plataforma (ID: 6 - NOMBRE: Plataforma Proxy Navegación)'),

(DEFAULT, '2024-05-30 13:55:32', 'desa@opf.gob', 'Integración IAM', 'Login exitoso'),
(DEFAULT, '2024-05-30 14:05:56', 'desa@opf.gob', 'Integración TAREAS', 'Petición de Plataforma (ID: 7 - NOMBRE: Plataforma Gestión Formación)')
;



/* ********************************************* */
/*
Estructura SIM_INTEGRACION_EQUIPOx:
- id_INTEGRACION_EQUIPOx
- nombre
- vcpu_libre
- mem_libre (nota GB)
- alm_libre (nota TB)
*/

INSERT INTO SIM_INTEGRACION_EQUIPOA
VALUES
(DEFAULT, 'Nutanix-01', 500, 3000, 300),
(DEFAULT, 'Nutanix-02', 1000, 6000, 600)
;

INSERT INTO SIM_INTEGRACION_EQUIPOB
VALUES
(DEFAULT, 'VMWare-01', 300, 2000, 200),
(DEFAULT, 'VMWare-02', 500, 5000, 400)
;

INSERT INTO SIM_INTEGRACION_EQUIPOC
VALUES
(DEFAULT, 'HyperV-01', 300, 2000, 200)
;

/* ********************************************* */

/*
Estructura SIM_IAM:
- id_IAM
- nombre
- rol
- password
*/

INSERT INTO SIM_IAM
(id_IAM, nombre, rol, password)
VALUES
(DEFAULT, 'infra@opf.gob', 'Rol Infraestructuras', 'infra'),
(DEFAULT, 'desa@opf.gob', 'Rol Desarrollo', 'desa')
;


/* ********************************************* */
/*
Estructura SIM_TAREAS:
- id_TAREAS
- descripcion
- lanzador
- asignado
- fecha_lanzamiento
- estado
*/
INSERT INTO SIM_TAREAS
(id_TAREAS, descripcion, lanzador, asignado, fecha_lanzamiento, estado)
VALUES
(DEFAULT, 'Petición de Plataforma (ID: 1 - NOMBRE: Plataforma Web Corporativa)', 'desa@opf.gob', 'infra@opf.gob', '2024-05-15 08:30:15', 'Cerrada'),
(DEFAULT, 'Petición de Plataforma (ID: 2 - NOMBRE: Plataforma Gestión de Nóminas)', 'desa@opf.gob', 'infra@opf.gob', '2024-05-18 16:20:44', 'Cerrada'),
(DEFAULT, 'Petición de Plataforma (ID: 3 - NOMBRE: Plataforma Gestión RRHH)', 'desa@opf.gob', 'infra@opf.gob', '2024-05-19 12:47:00', 'Cerrada'),
(DEFAULT, 'Petición de Plataforma (ID: 4 - NOMBRE: Plataforma Gestión de Citas)', 'desa@opf.gob', 'infra@opf.gob', '2024-05-20 09:03:12', 'Cerrada'),
(DEFAULT, 'Petición de Plataforma (ID: 5 - NOMBRE: Plataforma Gestión de Inventario)', 'desa@opf.gob', 'infra@opf.gob', '2024-05-21 10:32:05', 'Cerrada'),
(DEFAULT, 'Petición de Plataforma (ID: 6 - NOMBRE: Plataforma Proxy Navegación)', 'desa@opf.gob', 'infra@opf.gob', '2024-05-30 08:30:00', 'Abierta'),
(DEFAULT, 'Petición de Plataforma (ID: 7 - NOMBRE: Plataforma Gestión Formación)', 'desa@opf.gob', 'infra@opf.gob', '2024-05-30 14:05:56', 'Abierta')
;



