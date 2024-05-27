<!--Inicio contenido-->
<div class="container-fluid">
  <div class="row">      
    <div class="col-lg-12">
    
      <br>
      <h4>Sección <b>Actividad - Logs</b></h4>
      <br>      

      <?php
        
        //Control de usuario Autenticado
        if ( $_SESSION['usuarioAutorizado'] ){            

          try {
            //Llamamos a la página donde se hace la conexión a la BBDD
            require("include-back/actividad-logs-bbdd.php");

          } catch (Exception $e) {
              echo 'Caught exception: ',  $e->getMessage(), "\n";
          }
          
        }
        else{
          //Informamos de que el contenido solo es visible estando autenticado
          echo "<p>Este contenido requiere estar autenticado</p>";
        }        
      ?>      
      <br><br>
      <br><br>      

      <?php
        //Para Pruebas
          //echo "<br><br>";
          //echo "Usuario: ".$_SESSION["nombreUsuario"];
          //echo "<br>session_status(): ".session_status();
          //echo "<br><br>";
          //echo "<br><br>";
      ?>

    </div>    
  </div>
</div>
<!--Fin contenido-->