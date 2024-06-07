<?php session_start();?>

<!-- 
 - Autor: Pablo Rubiano Sosa
 - Descripción: Módulo de Gestión integrado en el SI de Autoprovisión
 - Ámbito: Proyecto desarrollado como parte del Trabajo de Fin de Grado perteneciente al Grado en Ingeniería Informática de UNIR
-->

<!-- Inicializamos variables -->
<?php require("include-back/inicializarvariables.php");?>

<!-- Página principal: index.php-->
<!doctype html>
<html lang="es">
  
  <head>
    <!-- meta tags requeridos-->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
 
    <!-- DataTables CSS -->
    <link href="https://cdn.datatables.net/2.0.7/css/dataTables.bootstrap5.css" rel="stylesheet">

    <!-- Javascript: JQuery (necesario para DataTable)-->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

    
    <title>TFG - Autoprovisión: Módulo de Gestión</title>
    
  </head>

  <body>           
    <!-- Incluimos la barra de navegación -->
      <?php require("include-front/cabecera-navegacion.php");?>
    
    <!--Inicio contenido-->
      <?php 
        //Recuperamos el valor pasado por GET para mostrar la página de contenido (si no llega nada, le ponemos valor por defecto: "presentacion")
        $contenido = $_GET["contenido"] ?? "presentacion";
        // Incluimos la página 
        require("include-front/".$contenido.".php");
      ?>
    <!--Fin contenido-->
 

    <!-- Javascript: Separados Popper y JS -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>

    <!-- Javascript: DataTables -->
    <script src="https://cdn.datatables.net/2.0.7/js/dataTables.js" ></script>
    <script src="https://cdn.datatables.net/2.0.7/js/dataTables.bootstrap5.js" ></script>
  

  </body>
</html>