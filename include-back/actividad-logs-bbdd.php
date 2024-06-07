<!-- DataTables: Configuración tabla-->
<script type="text/javascript">              
        $(document).ready( function () {
            $('#actividadLogs').DataTable({
                bFilter: true,
                info: true,
                paging: true,
                ordering: true,
                columnDefs: [                
                { className: "dt-center", targets: '_all' },
                { className: "dt-head-center", targets: '_all' }
                ],
                order: [
                    [0, 'des']
                ]
            });
        } );
    //bFilter: es para quitar el campo de búsqueda
    //order: permite elegir el criterio de ordenación [campo, asc/des]
</script> 


<?php
    /*
        Este código recupera la información de la Actividad de la tabla MG_logsactividad
    */        
    
    //Iniciamos la conexion a la BBDD
    include "iniciarconexionBBDD.php";

    //Mostramos la fecha y hora de la consulta
    echo "<div class='col-lg-12'>";        
        //echo "Fecha y Hora de la consulta: ". date('l jS \of F Y h:i:s');        
        echo "Fecha y Hora de la consulta: ". date('Y-m-d H:i:s');
    echo "</div>";
  

    //Tabla para mostrar resultados
    echo "<table id='actividadLogs' class='table table-striped' style='width:100%;'>";   
     
    //Cabecera de la tabla
        echo "<thead>";
            echo "<tr>";            
                echo "<th>Fecha</th>";
                echo "<th>Usuario</th>";
                echo "<th>Tipo</th>";
                echo "<th>Descripción</th>";
            echo "</tr>";
        echo "</thead>";


    //Conectamos con la BBDD y presentamos los datos
        //Definimos la Consulta
        $miConsulta = "SELECT * FROM `MG_logsactividad` WHERE 1";    
        // Ejecutamos la consulta (mysqli_query devuelve un objeto mysqli_result)
        if ($miResultado = $miConexion -> query($miConsulta)) {            
            //Recorremos el resultado
            echo "<tbody>";
            while ($fila = $miResultado->fetch_assoc()) {
                
                echo "<tr>";
                    echo "<td>".$fila["fecha_evento"]."</td>";
                    echo "<td>".$fila["usuario_evento"]."</td>";
                    echo "<td>".$fila["tipo_evento"]."</td>";
                    echo "<td>".$fila["descripcion_evento"]."</td>";
                echo "</tr>";                
                /*
                echo "<tr>";
                    echo "<td>uno</td>";
                    echo "<td>dos</td>";
                    echo "<td>tres</td>";
                    echo "<td>cuatro</td>";
                echo "</tr>"; 
                */
            }            
           echo "</tbody>";
            
            // Liberamos la memoria asociada al resultado
            $miResultado -> free_result();
        } 
  
    //Pie de la tabla    
    echo "<tfoot>";
        echo "<tr>";
            echo "<th>Fecha</th>";
            echo "<th>Usuario</th>";
            echo "<th>Tipo</th>";
            echo "<th>Descripción</th>";
        echo "</tr>";
    echo "</tfoot>";
    echo "</table>";

    
    //Cerramos la conexion a la BBDD
    require "cerrarconexionBBDD.php";
?>

