<script type="text/javascript">              
    //DataTables: Configuración tabla
        $(document).ready( function () {
            $('#gestionPlataformas').DataTable({
                bFilter: true,
                info: true,
                paging: true,
                ordering: true,
                columnDefs: [                
                { className: "dt-center", targets: '_all' },
                { className: "dt-head-center", targets: '_all' }
                ]
            });
        } );
        //bFilter: es para quitar el campo de búsqueda
        //order: permite elegir el criterio de ordenación [campo, asc/des]


        //Función para controlar que los campos son correctos y enviar el formulario
        function controlesYEnvioForm() {            
            //Para controlar que todo es correcto
            var todoCorrecto = true;
            //Comprobamos que el Nombre de la plataforma no es vacío
            var miVariableNombrePlataforma = document.getElementById("textoNombrePlataforma").value;
            //alert ("miVariable: "+miVariableNombrePlataforma);
            if (miVariableNombrePlataforma==="") {
                alert ("El Nombre Plataforma no puede estar vacío");
                todoCorrecto = false;
            }                       
            // Si todo es correcto, mandamos el formulario
            if (todoCorrecto) {                
                document.getElementById("formularioSolicitudPlataforma").submit();
            }
        }
</script> 


<?php

    //identificamos la zona para el usuario    
    echo "<b>Formulario de alta de <i>Nueva Plataforma</i></b><br><br>";
  
    //Cargamos los array locales con las "Plantillas" y "Aplicaciones" disponibles
    require("include-back/gestion-plataformas-solicitud-auxiliarcarga-bbdd.php");
       //Para pruebas
        //echo sizeof($misPlantillas)."<br>";
        //echo $misPlantillas[1][1]."<br>";    
   

    //Presentamos el formulario donde se introducirán: "Nombre de plataforma", "Aplicación asociada", "Plantilla" y "Número".
    echo "<form method='post' id='formularioSolicitudPlataforma'>"; //Obviamos el "action" porque irá a la misma página

        //Inicio tabla
        echo "<table class='table' style='width:100%;'>";

        //Fila 1
        echo "<tr>";
            //Columna 1
            echo "<td>";
                //Campo oculto para ayudar al tratamiento de los datos enviados desde el formulario
                echo "<input type='hidden' id='ocultoFormularioSolicitud' name='ocultoFormularioSolicitud' value='ocultoFormularioSolicitud'>";

                //Campo NOMBRE PLATAFORMA    
                echo "<div class='form-group'>";                
                    echo "<label for='textoNombrePlataforma'>Nombre Plataforma: </label>";
                    echo "<input type='text' class='form-control-sm' id='textoNombrePlataforma' name='textoNombrePlataforma'>";
                echo "</div>";                         
            echo "</td>";

            //Si la plataforma ya existe se va a controlar en el momento de la consulta en BBDD. 
            //Si no existe, se crea. Si existe se añade el servidor a la Plataforma
            
            //Columna 2     
            echo "<td>";
                //Campo PLANTILLA
                echo "<div class='form-group'>";
                    echo "<label for='selectPlantillaServidor'>Plantilla de Servidor: </label>";
                    echo "<select class='form-control-sm' id='selectPlantillaServidor' name='selectPlantillaServidor'>";
                        //Bucle del array de Aplicaciones para completar los options (Id en value y con Nombre mostrado)del select
                        foreach ($misPlantillas as $valor) {
                            //$valor[0]: Primer campo --> id
                            //$valor[1]: Segundo campo --> Nombre
                            echo "<option value='".$valor[0]."'>".$valor[1]."</option>";              
                        }                        
                    echo "</select>";
                echo "</div>";
            echo "</td>";

            //Columna 3
            echo "<td>";
            echo "</td>";

        echo "</tr>";

        //Fila 2
        echo "<tr>";
            //Columna 1
            echo "<td>";
                //Campo APLICACION ASOCIADA
                echo "<div class='form-group'>";                      
                    echo "<label for='selectAplicacionAsociada'>Aplicación Asociada: </label>";
                    echo "<select class='form-control-sm' id='selectAplicacionAsociada' name='selectAplicacionAsociada'>";
                        //Bucle del array de Aplicaciones para completar los options (Id en value y con Nombre mostrado) del select 
                        foreach ($misAplicaciones as $valor) {
                            //$valor[0]: Primer campo --> id
                            //$valor[1]: Segundo campo --> Nombre
                            echo "<option value='".$valor[0]."'>".$valor[1]."</option>";
                        }                    
                    echo "</select>";
                echo "</div>";
            echo "</td>";

            //Columna 2            
            echo "<td>";
                //Campo NUMERO
                echo "<div class='form-group'>";
                    echo "<label for='selectNumeroServidores'>Número de servidores: </label>";
                    echo "<select class='form-control-sm' id='selectNumeroServidores' name='selectNumeroServidores'>";
                        echo "<option value='1'>1</option>";
                        echo "<option value='2'>2</option>";
                        echo "<option value='3'>3</option>";
                        echo "<option value='4'>4</option>";
                        echo "<option value='5'>5</option>";
                    echo "</select>";
                    
                echo "</div>";            
            echo "</td>";

            //Columna 3
            echo "<td>";
                //Botón para enviar el formulario --> OJO: tendremos que hacerlo en tabla local y luego pasarlo
                echo "<button class='w-30 btn btn-sm btn-primary' type='button' onclick='return controlesYEnvioForm();'>Mandar Petición</button>";     
            echo "</td>";
        echo "</tr>";

        //Fin tabla
        echo "</table>";
    
    //Fin form
    echo "</form>";


    echo "<br><br>";





//************************ Inicio CÓDIGO PARA SOLICITUD PLATAFORMA ********************* */
    //Recuperamos las variables enviadas por el FORM
    $miVar_ocultoFormularioSolicitud = $_POST["ocultoFormularioSolicitud"] ?? "NOMBRE_VACIO";
    $miVar_textoNombrePlataforma = $_POST["textoNombrePlataforma"] ?? "NOMBRE_VACIO";    
    $miVar_selectAplicacionAsociada = $_POST["selectAplicacionAsociada"] ?? "NOMBRE_VACIO";
    $miVar_selectPlantillaServidor = $_POST["selectPlantillaServidor"] ?? "NOMBRE_VACIO";    
    $miVar_selectNumeroServidores = $_POST["selectNumeroServidores"] ?? "NOMBRE_VACIO";
    
    //Para pruebas
        /*
        echo "miVariable1: ".$miVar_ocultoFormularioSolicitud."<br>";
        echo "miVariable2: ".$miVar_textoNombrePlataforma."<br>";
        echo "miVariable3: ".$miVar_selectPlantillaServidor."<br>";
        echo "miVariable4: ".$miVar_NombrePlataforma."<br>";
        echo "miVariable5: ".$miVar_NombrePlataforma."<br>";
        */
    

    //Comprobamos que ha llegado el formulario usando el campo oculto
    if ($miVar_ocultoFormularioSolicitud=="ocultoFormularioSolicitud"){

        //Iniciamos la conexion a la BBDD
        require "include-back/iniciarconexionBBDD.php";
        
        //Definimos variable para controlar el exito de la creación de solicitud de la Plataforma
        $creacionExitosa = false;

    /*
    NOTAS SOBRE LOS PASOS A SEGUIR EN ESTE CÓDIGO:
        1). actualizar tabla plataforma            
            a). Si la plataforma no existe --> crearla y b). actualizar tabla de TAREAS
            c). Si la plataforma existe --> no hacer nada
        2). actualizar tabla Servidor
            a). Independientemente del anterior, crear tantos elementos como vengan indicados en el numero de servidor        
        3). actualizar tabla de logs
            a). Con solicitud de plataforma y número de servidores añadidos        
            b). Con la Tarea creada
    */



    //1) ACTUALIZAMOS LOS REGISTROS DE PLATAFORMAS Y TAREAS
        //Comprobamos si existe la Plataforma
        $existePlataforma = false;
        $miConsulta = "SELECT * FROM MG_plataforma WHERE nombre_plataforma = '".$miVar_textoNombrePlataforma."'";
        if ($miResultado = $miConexion -> query($miConsulta)) {                
            //Para pruebas
            //echo "Returned rows are: " . $miResultado -> num_rows;
            if ($miResultado -> num_rows > 0){
                //Recuperamos el ID de la Plataforma
                while ($fila = $miResultado->fetch_assoc()) {
                    $var_idNuevaPlataforma = $fila["id_plataforma"];
                }
                //Para pruebas
                    //echo "Existe la plataforma";
                $existePlataforma = true;
                // Liberamos la memoria asociada al resultado
                $miResultado -> free_result();                
            }  
        }
        
        //a).Si no existe la Plataforma
        if (!$existePlataforma){
            //Para Pruebas
                //echo "NO Existe la plataforma";
            

            //CREAMOS EL REGISTRO EN LA TABLA PLATAFORMA
            $miConsulta = "INSERT INTO MG_plataforma (nombre_plataforma, aplicacionasociada, estado) VALUES ('" .$miVar_textoNombrePlataforma. "','" .$miVar_selectAplicacionAsociada. "','Petición');";
            // Ejecutamos la consulta
            if ($miResultado = $miConexion -> query($miConsulta)) {
                //No necesitamos realizar nada aquí
            }
            
            //RECUPERAMOS EL ID DEL NUEVO REGISTRO DE PLATAFORMA
            $var_idNuevaPlataforma = 1;
            $miConsulta = "SELECT * FROM MG_plataforma WHERE nombre_plataforma = '".$miVar_textoNombrePlataforma."'";
            // Ejecutamos la consulta
            if ($miResultado = $miConexion -> query($miConsulta)) {
                while ($fila = $miResultado->fetch_assoc()) {
                    $var_idNuevaPlataforma = $fila["id_plataforma"];
                } 
            }
            //Para Pruebas
                //echo "var_idNuevaPlataforma: ".$var_idNuevaPlataforma;
            

            //b).CREAMOS EL REGISTRO EN LA TABLA TAREAS (Simulación integración con Módulo TAREAS)
            $miConsulta = "INSERT INTO SIM_TAREAS
            (descripcion, lanzador, asignado, fecha_lanzamiento, estado)
            VALUES
            ('Petición de Plataforma (ID: " .$var_idNuevaPlataforma. " - NOMBRE: ".$miVar_textoNombrePlataforma.")', 'desa@opf.gob', 'infra@opf.gob', '" .date('Y-m-d H:i:s'). "', 'Abierta');";
            // Ejecutamos la consulta
            if ($miResultado = $miConexion -> query($miConsulta)) {
                //No necesitamos realizar nada aquí
            }

        }//if (!$existePlataforma){        
  

        //2)ACTUALIZAMOS LOS REGISTROS DE LA TABLA SERVIDOR
        //Lo realizamos tantas veces como número de servidores haya        
        for($i = 0; $i<$miVar_selectNumeroServidores; $i++) {
            //Nota: no vamos a ser estrictos con el nombre de servidor
            $miConsulta = "INSERT INTO MG_servidor
            (nombre_servidor, id_plataforma, id_plantillaservidor)
            VALUES
            ('SERV-999', ".$var_idNuevaPlataforma.", ".$miVar_selectPlantillaServidor.");";
            // Ejecutamos la consulta
            if ($miResultado = $miConexion -> query($miConsulta)) {
                //No necesitamos realizar nada aquí
            }
        }


        //3)ACTUALIZAMOS LOS REGISTROS DE LA TABLA DE LOGS
        //a). Con solicitud de plataforma y número de servidores añadidos                
        $miVariableDescripcion = "Lanzada solicitud para: ".$miVar_textoNombrePlataforma." con ".$miVar_selectNumeroServidores." servidores de Plantilla con ID: ".$miVar_selectPlantillaServidor;        
        //Definimos la consulta            
        $miConsulta = "INSERT INTO MG_logsactividad (fecha_evento, usuario_evento, tipo_evento, descripcion_evento) VALUES ('" .date('Y-m-d H:i:s'). "','desa@opf.gob','Solicitud Plataforma','".$miVariableDescripcion."');";
        // Ejecutamos la consulta
        if ($miResultado = $miConexion -> query($miConsulta)) {
            //No necesitamos realizar nada aquí
        }

        //b). Con la Tarea creada (Simulación Módulo TAREAS)
        $miVariableDescripcion = "Creada tarea a infra@opf.gob de Solicitud de: ".$miVar_textoNombrePlataforma;
        //Definimos la consulta            
        $miConsulta = "INSERT INTO MG_logsactividad (fecha_evento, usuario_evento, tipo_evento, descripcion_evento) VALUES ('" .date('Y-m-d H:i:s'). "','desa@opf.gob','Integración TAREAS','".$miVariableDescripcion."');";
        // Ejecutamos la consulta
        if ($miResultado = $miConexion -> query($miConsulta)) {
            //No necesitamos realizar nada aquí
        }
        

        //Cerramos la conexion a la BBDD
        require "include-back/cerrarconexionBBDD.php";
    
        //Reseteamos el contenido de las variables
        $miVar_ocultoFormularioSolicitud = $miVar_textoNombrePlataforma  = $miVar_selectPlantillaServidor = $miVar_NombrePlataforma = $miVar_NombrePlataforma = "Nombre_vacio";
       
        //Recargamos la página para actualizar la visualización de las tablas
        echo "<script type='text/javascript'>window.location.replace('/index.php?contenido=gestion-plataformas');</script>";

    } //if ($miVar_ocultoFormularioSolicitud=="ocultoFormularioSolicitud")

?>