<!-- DataTables: Configuración tabla-->
<script type="text/javascript">              
        $(document).ready( function () {
            $('#tablaTAREAS').DataTable({
                bFilter: false,
                info: false,
                paging: false,
                ordering: false,
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
    
    //identificamos la zona para el usuario    
    echo "<p class='text-secondary'><b>Listado de <i>TAREAS</i> abiertas</b></p>";

    //Iniciamos la conexion a la BBDD
    include "iniciarconexionBBDD.php";      
 
    //Tabla para mostrar resultados
    echo "<table id='tablaTAREAS' class='table table-striped' style='width:100%;'>";   
    //Cabecera de la tabla
        echo "<thead>";
            echo "<tr>";            
                echo "<th>Descripción</th>";
                //echo "<th>Lanzador</th>";
                echo "<th>Asignado</th>";
                echo "<th>Fecha</th>";
                //echo "<th>Estado</th>";
            echo "</tr>";
        echo "</thead>";
        

    //Conectamos con la BBDD y presentamos los datos        
        $miConsulta = "SELECT descripcion,
        lanzador,
        asignado,
        fecha_lanzamiento,
        estado
        FROM SIM_TAREAS
        WHERE estado='Abierta'";
                
        
        // Ejecutamos la consulta (mysqli_query devuelve un objeto mysqli_result)
        if ($miResultado = $miConexion -> query($miConsulta)) {
            //Para realizar pruebas
               //echo "Returned rows are: " . $miResultado -> num_rows;                       
            
            //Recorremos el resultado
            echo "<tbody>";        
            while ($fila = $miResultado->fetch_assoc()) {
                echo "<tr>";
                    echo "<td>".$fila["descripcion"]."</td>";
                    //echo "<td>".$fila["lanzador"]."</td>";
                    echo "<td>".$fila["asignado"]."</td>";
                    echo "<td>".$fila["fecha_lanzamiento"]."</td>";
                    //echo "<td>".$fila["estado"]."</td>";
                echo "</tr>";
            }            
            echo "</tbody>";
            
            // Liberamos la memoria asociada al resultado
            $miResultado -> free_result();
        }
  
    //Pie de la tabla    
    /*
    echo "<tfoot>";
        echo "<tr>";
        echo "<th>Descripción</th>";
        //echo "<th>Lanzador</th>";
        echo "<th>Asignado</th>";
        echo "<th>Fecha</th>";
        //echo "<th>Estado</th>";           
        echo "</tr>";
    echo "</tfoot>";
    */
    
    echo "</table>";


    //Cerramos la conexion a la BBDD
    require "cerrarconexionBBDD.php";

?>