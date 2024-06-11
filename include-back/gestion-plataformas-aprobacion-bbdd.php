<script type="text/javascript">              
    //DataTables: Configuración tabla
        $(document).ready( function () {
            $('#aprobacionPlataformas').DataTable({
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
            var miVariableNombrePlataforma = document.getElementById("selectPlataformaPeticion").value;
            //Para Pruebas
              //alert ("miVariable: "+miVariableNombrePlataforma);            
            if (miVariableNombrePlataforma==="SIN_PLATAFORMAS_PETICION") {
                alert ("No hay Plataformas que provisionar");
                todoCorrecto = false;
            }
            // Si todo es correcto, mandamos el formulario
            if (todoCorrecto) {                
                document.getElementById("formularioAprobacionPlataforma").submit();
            }
        }
</script> 


<?php

    //identificamos la zona para el usuario    
    echo "<b>Formulario de Aprobación de <i>Nueva Plataforma</i></b> (lanzamiento para Provisión efectiva)<br><br>";


    //Cargamos los array locales con las "Plataformas" y "Equipamiento" disponibles
    require("include-back/gestion-plataformas-aprobacion-auxiliarcarga-bbdd.php");
       //Para pruebas
        //echo sizeof($misPlataformasPeticion)."<br>";
        //echo $misPlataformasPeticion[1][1]."<br>";
        //echo sizeof($miEquipamiento)."<br>";
        //echo $miEquipamiento[0][0]."<br>";



    //Presentamos el formulario donde se asignará la "Plataforma" al "Equipamiento".
    echo "<form method='post' id='formularioAprobacionPlataforma'>"; //Obviamos el "action" porque irá a la misma página

        //Inicio tabla
        echo "<table class='table' style='width:100%;'>";

        //Fila 1
        echo "<tr>";
            //Columna 1
            echo "<td>";
                //Campo oculto para ayudar al tratamiento de los datos enviados desde el formulario
                echo "<input type='hidden' id='ocultoFormularioAprobacion' name='ocultoFormularioAprobacion' value='ocultoFormularioAprobacion'>";

                //Campo NOMBRE PLATAFORMA
                echo "<div class='form-group'>";
                    echo "<label for='selectPlataformaPeticion'>Plataforma: </label>";
                    echo "<select class='form-control-sm' id='selectPlataformaPeticion' name='selectPlataformaPeticion'>";
                        if ( sizeof($misPlataformasPeticion) > 0 ){
                            //Bucle del array de Plataforma para completar los options (Id en value y con Nombre mostrado)del select
                            foreach ($misPlataformasPeticion as $valor) {
                                //Notas: $valor[0] --> id, $valor[1] --> Nombre
                                echo "<option value='".$valor[1]."'>".$valor[1]."</option>";
                            }
                        }else{
                            echo "<option value='SIN_PLATAFORMAS_PETICION'>(No hay Plataformas en estado Petición)</option>";
                        }
                    echo "</select>";
                echo "</div>";
            echo "</td>";

            //Columna 2
            echo "<td>";
              //Campo EQUIPAMIENTO
              echo "<div class='form-group'>";                      
                echo "<label for='selectEquipamiento'>Equipamiento: </label>";
                echo "<select class='form-control-sm' id='selectEquipamiento' name='selectEquipamiento'>";
                    //Bucle del array de Equipamiento para completar los options
                    foreach ($miEquipamiento as $valor) {
                        //$valor[0] --> Nombre, $valor[1] --> CPU, $valor[2] --> MEM, $valor[3] --> Almacenamiento
                        echo "<option value='".$valor[0]."'>".$valor[0]." (CPULibre: ".$valor[1]." - MEMLibre: ".$valor[2]." - DISCOLibre: ".$valor[3].")</option>";
                    }                    
                echo "</select>";            
              echo "</div>";
            echo "</td>";

            //Columna 3
            echo "<td>";
                //Botón para enviar el formulario --> OJO: tendremos que hacerlo en tabla local y luego pasarlo
                echo "<button class='w-30 btn btn-sm btn-primary' type='button' onclick='return controlesYEnvioForm();'>Provisionar Plataforma</button>";     
            echo "</td>";

        echo "</tr>";

        //Fin tabla
        echo "</table>";
    
    //Fin form
    echo "</form>";

    echo "<br><br>";




//************************ Inicio CÓDIGO PARA APROBACIÓN PLATAFORMA ********************* */

    //Recuperamos las variables enviadas por el FORM
    $miVar_ocultoFormularioAprobacion = $_POST["ocultoFormularioAprobacion"] ?? "NOMBRE_VACIO";
    $miVar_selectPlataformaPeticion = $_POST["selectPlataformaPeticion"] ?? "NOMBRE_VACIO";    
    $miVar_selectEquipamiento = $_POST["selectEquipamiento"] ?? "NOMBRE_VACIO";

    
    //Para pruebas        
      //echo "miVariable1: ".$miVar_ocultoFormularioAprobacion."<br>";
      //echo "miVariable2: ".$miVar_selectPlataformaPeticion."<br>";
      //echo "miVariable3: ".$miVar_selectEquipamiento."<br>";
        
        
    

    //Comprobamos que ha llegado el formulario usando el campo oculto
    if ($miVar_ocultoFormularioAprobacion=="ocultoFormularioAprobacion"){

        //Iniciamos la conexion a la BBDD
        require "include-back/iniciarconexionBBDD.php";
        
        //Definimos variable para controlar el exito de la creación de solicitud de la Plataforma
        $creacionExitosa = false;

    
    //NOTAS SOBRE LOS PASOS A SEGUIR EN ESTE CÓDIGO:
    //   1). Actualizar tabla plataforma pasandola a estado "Vigente"     
    //   2). Actualizar tabla de TAREAS --> Cerrando la tarea correspondiente a la Plataforma    
    //   3). actualizar tabla de logs
    //      a). Registro con info de paso plataforma a provisión en Equipamiento
    //      b). Registro con info de la Tarea actualizada a Cerrada
    //   4). Simulacion de integración con equipamiento con aviso al usuario de que se ha lanzado la provisión efectiva de la Plataforma
    

    //1) ACTUALIZAMOS EL REGISTRO DE LA PLATAFORMA A ESTADO "Vigente"
        //Preparamos la consulta
        $miConsulta = "UPDATE MG_plataforma
        SET estado = 'Vigente' 
        WHERE nombre_plataforma = '".$miVar_selectPlataformaPeticion."'";
        //Ejecutamos la consulta
        if ($miResultado = $miConexion -> query($miConsulta)) {                
                //No es necesario hacer nada
        }
            

    //2).ACTUALIZAMOS EL REGISTRO EN LA TABLA TAREAS (Simulación integración con Módulo TAREAS)
        //Preparamos la consulta
        $miConsulta = "UPDATE SIM_TAREAS
        SET estado = 'Cerrada' 
        WHERE descripcion LIKE '%".$miVar_selectPlataformaPeticion."%'";

        //Ejecutamos la consulta
        if ($miResultado = $miConexion -> query($miConsulta)) {
            //No necesitamos realizar nada aquí
        }

  
    
        //3)ACTUALIZAMOS LOS REGISTROS DE LA TABLA DE LOGS
            //a). Registro con info de paso plataforma a provisión en Equipamiento
            $miVariableDescripcion = "Lanzada provisión efectiva de: ".$miVar_selectPlataformaPeticion." en equipamiento: ".$miVar_selectEquipamiento;        
            //Definimos la consulta            
            $miConsulta = "INSERT INTO MG_logsactividad (fecha_evento, usuario_evento, tipo_evento, descripcion_evento) VALUES ('" .date('Y-m-d H:i:s'). "','infra@opf.gob','Provisión Plataforma','".$miVariableDescripcion."');";
            // Ejecutamos la consulta
            if ($miResultado = $miConexion -> query($miConsulta)) {
                //No necesitamos realizar nada aquí
            }

            //b). Registro con info de la Tarea actualizada a Cerrada
            $miVariableDescripcion = "Cerrada tarea de infra@opf.gob de Provisión de: ".$miVar_selectPlataformaPeticion;
            //Definimos la consulta            
            $miConsulta = "INSERT INTO MG_logsactividad (fecha_evento, usuario_evento, tipo_evento, descripcion_evento) VALUES ('" .date('Y-m-d H:i:s'). "','infra@opf.gob','Integración TAREAS','".$miVariableDescripcion."');";
            // Ejecutamos la consulta
            if ($miResultado = $miConexion -> query($miConsulta)) {
                //No necesitamos realizar nada aquí
            }

        //4)SIMULAMOS LA INTEGRACIÓN CON EL MODULO DE EQUIPAMIENTO (CON AVISO AL USUARIO EL ENVÍO DE LA PETICION DE PROVISIÓN)
        echo "<script type='text/javascript'>alert('[SIMULACIÓN DE INTEGRACIÓN CON EQUIPAMIENTO]\\n Se ha lanzado la provisión efectiva de: ".$miVar_selectPlataformaPeticion." en equipamiento: ".$miVar_selectEquipamiento."');</script>";


        //Cerramos la conexion a la BBDD
        require "include-back/cerrarconexionBBDD.php";
    
        //Reseteamos el contenido de las variables               
        $miVar_ocultoFormularioAprobacion = $miVar_selectPlataformaPeticion = $miVar_selectEquipamiento = "Nombre_vacio";

        //Recargamos la página para actualizar la visualización de las tablas
        echo "<script type='text/javascript'>window.location.replace('/index.php?contenido=gestion-plataformas');</script>";
    

    } //if ($miVar_ocultoFormularioAprobacion=="ocultoFormularioAprobacion"){



?>