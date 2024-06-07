<!-- DataTables: Configuración tabla-->
<script type="text/javascript">              
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
</script> 


<?php
    /*
        Este código recupera la información de la Actividad de la tabla MG_plantillaservidor
    */        
    
    //Iniciamos la conexion a la BBDD
    include "iniciarconexionBBDD.php";

    //Mostramos la fecha y hora de la consulta
    echo "<div class='col-lg-12'>";        
        echo "<b>Listado de <i>Plantillas</i> de Servidor</b> (*)";
    echo "<div>";
      
        
    //Tabla para mostrar resultados
    echo "<table id='gestionPlataformas' class='table table-striped' style='width:100%;'>";   
    //Cabecera de la tabla
        echo "<thead>";
            echo "<tr>";            
                echo "<th>Nombre</th>";
                echo "<th>Aplicación Asociada</th>";
                echo "<th>Memoria (GB)</th>";
                echo "<th>Disco (TB)</th>";
                echo "<th>S.O.</th>";
                echo "<th>Seguridad</th>";
                echo "<th>Monitorización</th>";
                echo "<th>Backup</th>";
                echo "<th>Funcional</th>";
            echo "</tr>";
        echo "</thead>";
        

    //Conectamos con la BBDD y presentamos los datos
        //Definimos la Consulta (usamos alias para poder recuperar correctamente los FK de la tabla SIM_CMDB_SW)
        $miConsulta = "SELECT nombre_plantillaservidor,
        recurso_cpu,
        recurso_memoria,
        recurso_almacenamiento,
        tablaSO.nombre_sw AS nombreSO,
        tablaSEG.nombre_sw AS nombreSEG,
        tablaMON.nombre_sw AS nombreMON,
        tablaBAC.nombre_sw AS nombreBAC,
        tablaFUN.nombre_sw AS nombreFUN
        FROM MG_plantillaservidor 
        INNER JOIN SIM_CMDB_SW AS tablaSO
        ON MG_plantillaservidor.sw_sistemaoperativo = tablaSO.id_CMDB_SW
        INNER JOIN SIM_CMDB_SW AS tablaSEG
        ON MG_plantillaservidor.sw_aux_seguridad = tablaSEG.id_CMDB_SW
        INNER JOIN SIM_CMDB_SW AS tablaMON
        ON MG_plantillaservidor.sw_aux_monitorizacion = tablaMON.id_CMDB_SW
        INNER JOIN SIM_CMDB_SW AS tablaBAC
        ON MG_plantillaservidor.sw_aux_backup = tablaBAC.id_CMDB_SW
        INNER JOIN SIM_CMDB_SW AS tablaFUN
        ON MG_plantillaservidor.sw_funcional = tablaFUN.id_CMDB_SW";

 
        // Ejecutamos la consulta (mysqli_query devuelve un objeto mysqli_result)
        if ($miResultado = $miConexion -> query($miConsulta)) {
            //Para realizar pruebas
               //echo "Returned rows are: " . $miResultado -> num_rows;                       
            
            //Recorremos el resultado
            echo "<tbody>";        
            while ($fila = $miResultado->fetch_assoc()) {
                echo "<tr>";
                    echo "<td>".$fila["nombre_plantillaservidor"]."</td>";
                    echo "<td>".$fila["recurso_cpu"]."</td>";
                    echo "<td>".$fila["recurso_memoria"]."</td>";
                    echo "<td>".$fila["recurso_almacenamiento"]."</td>";
                    echo "<td>".$fila["nombreSO"]."</td>";
                    echo "<td>".$fila["nombreSEG"]."</td>";
                    echo "<td>".$fila["nombreMON"]."</td>";
                    echo "<td>".$fila["nombreBAC"]."</td>";
                    echo "<td>".$fila["nombreFUN"]."</td>";                                
                echo "</tr>";
            }            
            echo "</tbody>";
            
            // Liberamos la memoria asociada al resultado
            $miResultado -> free_result();
        }
  
    //Pie de la tabla    
    echo "<tfoot>";
        echo "<tr>";
            echo "<th>Nombre</th>";
            echo "<th>CPU (VCPU)</th>";
            echo "<th>Memoria (GB)</th>";
            echo "<th>Disco (TB)</th>";
            echo "<th>S.O.</th>";
            echo "<th>Seguridad</th>";
            echo "<th>Monitorización</th>";
            echo "<th>Backup</th>";
            echo "<th>Funcional</th>";            
        echo "</tr>";
    echo "</tfoot>";
    echo "</table>";

    echo "<br>(*) Edición de <i>Plantillas</i> fuera del Alcance de este desarrollo.";

    //Cerramos la conexion a la BBDD
    require "cerrarconexionBBDD.php";

?>