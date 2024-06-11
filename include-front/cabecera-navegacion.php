<!-- INICIO Página: cabecera-navegacion.php-->

<?php       
  //************************ Inicio CÓDIGO PARA EL LOGIN ********************* */
  //NOTA: ESTAMOS REALIZANDO UNA SIMULACIÓN DE INTEGRACIÓN con el módulo IAM
  //Por ese motivo no estamos realizando todos los controles de seguridad que serían pertinentes.
  
  /*
    A esta pagina se le manda informacion para diferentes acciones. Usamos las diferentes variables para identificar cada Caso:

      CASO 1 (LOGIN):  
      - Condición: ( ! $_SESSION['usuarioAutorizado'] && $miUsuarioPost != "Invitado" ) -> No Autenticado y se ha mandado algo desde el form de login
      - Descripción: Se ha mandado la información necesaria para intentar un Login

      CASO 2 (LOGOUT): 
      - Condición: ( $_SESSION['usuarioAutorizado'] && $hacerLogoutPost=="Yes" ) Autenticado y se ha mandado la variable desde el form de Logout
      - Descripción: Se ha pulsado el botón de Cerrar sesión
    
*/  

  //Recuperamos el valor pasado por POST para el login. Si no llega nada, le damos valores por defecto
    //Para Login: 
    $miUsuarioPost = $_POST["miUsuario"] ?? "Invitado";  
    $miPasswordPost = $_POST["miPassword"] ?? "Valor no relevante";
    //Para Logout
    $hacerLogoutPost = $_POST["hacerLogout"] ?? "No";
  
    
  //CASO 1 (LOGIN)
    if ( ! $_SESSION['usuarioAutorizado'] && $miUsuarioPost != "Invitado" ){  
    //if ( $_SESSION['nombreUsuario']=="Invitado" && $miUsuarioPost != "Invitado" ){
      //Comprobamos que variables de usuario o contraseña no estén vacías
      if ( empty($miUsuarioPost) || empty($miPasswordPost)) {
        //Mandamos un mensaje emergente al usuario
        echo "<script type='text/javascript'>alert('Usuario y Password deben tener algún valor');</script>";  
      }
      else
      {
        //Realizamos la conexión a BBDD para la comprobación de Login
          require("include-back/login-bbdd.php");
      }

      //Inicializamos variables de control de Post
      $miUsuarioPost = "Invitado";
      $miPasswordPost = "Valor no relevante";    
    }  
    

  //CASO 2 (LOGOUT)
  if ( $_SESSION['usuarioAutorizado'] && $hacerLogoutPost=="Yes" ){
   
    //Inicializamos variables de sesión
      $_SESSION['usuarioAutorizado']=false;
      $_SESSION['nombreUsuario']="Invitado";
      $_SESSION['rolUsuario']="Ninguno";

    //Inicializamos variables de control de Post
      $miUsuarioPost = "Invitado";
      $hacerLogoutPost = "No";
  }
  
  //************************ Fin CÓDIGO PARA EL LOGIN ********************* */
?>

<!-- 
  NOTA SOBRE EL COLOR DE LA BARRA DE NAVEGACIÓN:
  - Para el color de fondo hemos probado varios: bg-body-tertiary bg-primary-subtle bg-success-subtle bg-body-secondary
  - Opciones en: https://getbootstrap.com/docs/5.3/utilities/background/ 
-->

<!-- Barra de navegación superior -->
<nav class="navbar navbar-expand-lg sticky-top bg-info-subtle">
<div class="container-fluid">  
    <img src="./imagenes/logoOPF_trans.png" height="100" class="img-responsive" alt="OPF">    
    <!-- navbar-toggler: se muestra solo cuando el menú se colapse y se ocultará cuando el menú aparezca expandido -->
	  <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          
          <li class="nav-item">
            <a class="nav-link" href="index.php">Inicio</a>
          </li>

          <li class="nav-item">            
            <a class="nav-link" href="index.php?contenido=gestion-plantillas">Gestión de Plantillas</a>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="index.php?contenido=gestion-plataformas">Gestión de Plataformas</a>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="index.php?contenido=capacidad-equipamiento">Capacidad Equipamiento</a>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="index.php?contenido=actividad-logs">[Actividad y Logs]</a>
          </li>
        </ul>

        <!-- Inicio zona Login / Logout-->
        <?php
          //Si no está autorizado, mostramos el login (en caso contrario mostramos el nombre del usuario)
          if ( ! $_SESSION['usuarioAutorizado'] ){            
            //Formulario de Login            
            require("include-front/login-form.php");
          }
          else{
            //Formulario de Logout (Presenta: nombre del usuario, su Rol y botón de Logout)
            require("include-front/logout-form.php");                      
          }

          /*
          //Para Pruebas: visualización variables            
            if ($_SESSION["usuarioAutorizado"]){
              echo "SESION_usuarioAutorizado: True";
            }
            else{
              echo "SESION_usuarioAutorizado: False";
            }            
            echo "<br>SESION_nombreUsuario: ".$_SESSION["nombreUsuario"];          
            echo "<br>miUsuarioPost: ".$miUsuarioPost;            
            echo "<br>hacerLogoutPost: ".$hacerLogoutPost; 
            */
        ?>

    </div>
  </div>
</nav>


<!-- Barra de navegación inferior -->
<nav class="navbar fixed-bottom bg-info-subtle">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">SI de Autoprovisión: Módulo de Gestión</a>
    <a class="navbar-brand" href="#">tfg.rubiano.es</a>
    <div class='col-lg-12'>
      <figure class="text-center">
        <figcaption class="blockquote-footer">
          <p><cite title="Source Title">Pablo Rubiano - TFG Grado en Ingeniería Informática de UNIR</cite></p>
        </figcaption>
      </figure>
    <div>    
  </div>
</nav>

<!-- FIN Página: cabecera-navegacion.php-->