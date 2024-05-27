<!--Inicio contenido-->
<div class="container-fluid">
  <div class="row">
    <div class="col-lg-12">
      
      <br>
      <h4>Sección <b>Gestión de Plataformas</b></h4>
      <br>
      <?php
        //Control de usuario Autenticado
        if ( $_SESSION['usuarioAutorizado'] ){            

          try {
            //Incluimos la página que contiene la carga de la información desde el Módulo de Integración con el equipamiento (SIMULADO)  
            //require("include-back/capacidad-equipamiento-bbdd.php");                  

          } catch (Exception $e) {
              echo 'Caught exception: ',  $e->getMessage(), "\n";
          }
          
        }
        else{
          //Informamos de que el contenido solo es visible estando autenticado
          echo "<p>Este contenido requiere estar autenticado</p>";
        }
      ?>

    </div>                                                    
  </div>
</div>


<?php
  //Para pruebas  
    //echo "Usuario: ".$_SESSION["nombreUsuario"];
    //echo "<br>session_status(): ".session_status();
?>

<!--Fin contenido-->