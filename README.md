Este proyecto ha sido desarrollado por Pablo Rubiano como parte del Trabajo de Fin de Grado perteneciente al Grado en Ingeniería Informática de UNIR.


Se detalla a continuación la estructura de directorios y ficheros:

/	 
Contiene los ficheros de acceso público y directo por parte del usuario. Contiene: 	
  •	index.php --> Página principal del módulo y punto de entrada del usuario.
  •	php.ini --> fichero auxiliar destinado a configurar el PHP del servidor web.

/imagenes/	
Contiene las imágenes utilizadas. Contenido: 
  •	logoOPF.png --> Logotipo de la organización
  •	LogoNutanix --> Logo Equipamiento Nutanix
  •	Otros...

/include-front/	Se han agrupado aquí todos los ficheros que no son de acceso directo al usuario (se llaman desde la página principal) y que se usan para representar información de cara al usuario. Contenido: 
  •	cabecera-navegacion.php --> Para mostrar la cabecera.
  •	actividad-logs.php --> Página donde se muestran los resultados de los Logs.
  •	login-form.php --> Código donde se muestra el formulario para realizar el login.
  •	Otros…

/include-back/	
Se han agrupado aquí todos los ficheros que no son de acceso directo al usuario, y que se usan para llamadas a la BBDD. Contenido:
  •	inicializarconexionBBDD.php --> Contiene el código para conectar a la BBDD.
  •	login-bbdd.php --> Contiene la conexión a la tabla de la BBDD para el login.
  •	capacidad-equipamiento-bbdd.php --> Contiene la conexión a la tabla de la BBDD para la capacidad.
  •	Otros…

/auxiliar_bbdd	
Aquí hemos dispuesto los ficheros para poder construir la BBDD con un estado inicial deseado.	Contenido: 
  •	ESTRUCTURA_mysql-export-2024-06-02.sql --> Estructura de creación de la BBDD
  •	DATASET_juego-de-datos-inicial.sql --> Juego de datos inicial
