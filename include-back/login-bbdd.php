<?php
    /*
        Este código simula la integración con el Módulo de IAM mediante la conexión a una tabla simulada
   */

    //Iniciamos la conexion a la BBDD
    require "include-back/iniciarconexionBBDD.php";

    //Definimos variable para controlar el exito del login
    $loginExitoso = false;

    //Llamada simulada a Módulo IAM
        //Definimos la Consulta a IAM
        $miConsulta = "SELECT * FROM `SIM_IAM` WHERE 1";
        // Ejecutamos la consulta (mysqli_query devuelve un objeto mysqli_result)
        if ($miResultado = $miConexion -> query($miConsulta)) {
            //Recorremos el resultado
            while ($fila = $miResultado->fetch_assoc()) {
                //Comprobamos credenciales
                if ( $fila["nombre"] == $miUsuarioPost && $fila["password"] == $miPasswordPost){
                    
                    //En caso de que las credenciales sean correctas, actualizamos las variables de sesión
                    $_SESSION['usuarioAutorizado'] = true;
                    $_SESSION['nombreUsuario'] = $fila["nombre"];
                    $_SESSION['rolUsuario'] = $fila["rol"];

                    //Actualizamos la variable de Login Exitoso
                    $loginExitoso = true;
                }                    
            }
            // Liberamos la memoria asociada al resultado
            $miResultado -> free_result();
        }

        //Actualizamos la tabla de Actividades-Logs
            $miVariableDescripcion = "Login fallido";
            if ($loginExitoso) {
                $miVariableDescripcion = "Login exitoso";
            }
            //Definimos la consulta            
            $miConsulta = "INSERT INTO MG_logsactividad (fecha_evento, usuario_evento, tipo_evento, descripcion_evento) VALUES ('" .date('Y-m-d H:i:s'). "','" .$miUsuarioPost. "','Login','".$miVariableDescripcion."');";
            // Ejecutamos la consulta
            if ($miResultado = $miConexion -> query($miConsulta)) {
                //Por si queremos hacer control de errores
            }
        
     
    //Cerramos la conexion a la BBDD
    require "include-back/cerrarconexionBBDD.php";


    //Si las credenciales no han sido válidas informamos al usuario
    if (!$loginExitoso){
        echo "<script type='text/javascript'>alert('Credenciales incorrectas');</script>";
            
    }
    else{
        //Para Pruebas
        //En caso de ser correctas informamos: quién se ha logado y su rol
        //echo "<script type='text/javascript'>alert('Has iniciado sesión como: ".$_SESSION['nombreUsuario']." con Rol: ".$_SESSION['rolUsuario']."');</script>";
    }
    
?>