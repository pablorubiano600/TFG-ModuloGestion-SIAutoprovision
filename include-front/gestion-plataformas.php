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
                        
            echo "<div class='modal-body row'>";
                  echo "<div class='col-6' style='outline: 1px solid grey'>";
                    //Zona Arriba-Izquierda
                    //Mostramos el listado de TAREAS
                    require("include-back/gestion-plataformas-tareas-bbdd.php");
                  echo "</div>";

                  echo "<div class='col-6' style='outline: 1px solid grey'>";
                  //Zona Arriba-Derecha
                  //Mostramos el listado de PLATAFORMAS en estado Petición
                  require("include-back/gestion-plataformas-estadopeticion-bbdd.php");
                echo "</div>";
            echo "</div>";

            
            echo "</div>";

            echo "<div class='modal-body row'>";                  
                  //echo "<div class='col-12' style='outline: 1px solid blue'>";
                  echo "<div class='col-12'>";
                    //Zona Abajo Ancho completo
                    echo "<br>";
                    if ($_SESSION['rolUsuario'] == 'Rol Desarrollo') {
                      //Si el usuario es Rol Desarrollo, mostramos la opción de Solicitud de nueva plataforma
                      require("include-back/gestion-plataformas-solicitud-bbdd.php");
                    }
                    else if ($_SESSION['rolUsuario'] == 'Rol Infraestructuras'){
                      //Si el usuario es Rol Infraestructua, mostramos la opción de Aprobación de nueva plataforma
                      require("include-back/gestion-plataformas-aprobacion-bbdd.php");
                    }                
                  echo "</div>";
            echo "</div>";            

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