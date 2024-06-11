<!-- DataTables: Configuración tabla-->
<script type="text/javascript">              
        $(document).ready( function () {
            $('#tablaPlataformas').DataTable({
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
        Esta página muestra las Plataformas en estado "Petición" con un conteo de servidores que incluye y una suma de los recursos
    */        
    
    //identificamos la zona para el usuario    
    echo "<p class='text-secondary'><b>Listado de <i>PLATAFORMAS</i> en estado <i>PETICIÓN</i> (Recursos totales)</b></p>";

    //Iniciamos la conexion a la BBDD
    include "iniciarconexionBBDD.php";      
 
    //Tabla para mostrar resultados
    echo "<table id='tablaPlataformas' class='table table-striped' style='width:100%;'>";   

    //Cabecera de la tabla
        echo "<thead>";
            echo "<tr>";            
                echo "<th>Plataforma</th>";
                echo "<th>Aplicación</th>";
                echo "<th>Servidores</th>";
                echo "<th>CPU (VCPU)</th>";
                echo "<th>MEM (GB)</th>";
                echo "<th>Disco (TB)</th>";
            echo "</tr>";
        echo "</thead>";

    //Conectamos con la BBDD y presentamos los datos
        // Preparamos la consulta con funciones SQL SUM y COUNT para obtener los valores resumen de las plataformas       
        $miConsulta = "SELECT MG_plataforma.nombre_plataforma,
        MG_plataforma.estado,
        SIM_CMDB_APLICACION.nombre_aplicacion,
        COUNT(MG_servidor.nombre_servidor) AS totalServidores,
        MG_servidor.id_plantillaservidor,
        SUM(MG_plantillaservidor.recurso_cpu) AS totalCPU,
        SUM(MG_plantillaservidor.recurso_memoria) AS totalMEM,
        SUM(MG_plantillaservidor.recurso_almacenamiento) AS totalDISCO
        FROM MG_plataforma                 
        INNER JOIN MG_servidor
        ON MG_plataforma.id_plataforma = MG_servidor.id_plataforma
        INNER JOIN SIM_CMDB_APLICACION
        ON MG_plataforma.aplicacionasociada = SIM_CMDB_APLICACION.id_CMDB_APLICACION
        INNER JOIN MG_plantillaservidor 
        ON MG_servidor.id_plantillaservidor = MG_plantillaservidor.id_plantillaservidor        
        WHERE estado='Petición'
        GROUP BY MG_plataforma.nombre_plataforma";
                
        
        //Creamos la tabla para guardar la ejecución de la consulta
        $miConsultaPlataformas = array();

        // Ejecutamos la consulta (mysqli_query devuelve un objeto mysqli_result)
        if ($miResultado = $miConexion -> query($miConsulta)) {
            //Para realizar pruebas
               //echo "Returned rows are: " . $miResultado -> num_rows;                       
            
               $i = 0;
               while ($fila = $miResultado->fetch_assoc()) {                
                    $miConsultaPlataformas[$i][0] = $fila["nombre_plataforma"];
                    $miConsultaPlataformas[$i][1] = $fila["nombre_aplicacion"];
                    $miConsultaPlataformas[$i][2] = $fila["totalServidores"];
                    $miConsultaPlataformas[$i][3] = $fila["totalCPU"];
                    $miConsultaPlataformas[$i][4] = $fila["totalMEM"];
                    $miConsultaPlataformas[$i][5] = $fila["totalDISCO"];                    
                    $i = $i+1;
               }
        
            // Liberamos la memoria asociada al resultado
            $miResultado -> free_result();
        }
  

    //Mostramos la tabla
    foreach ($miConsultaPlataformas as $valor) {
        echo "<tr>";        
            echo "<td>".$valor[0]."</td>";             
            echo "<td>".$valor[1]."</td>";
            echo "<td>".$valor[2]."</td>";
            echo "<td>".$valor[3]."</td>";
            echo "<td>".$valor[4]."</td>";
            echo "<td>".$valor[5]."</td>";
        echo "</tr>";        
    }


    //Pie de la tabla    
    /*
    echo "<tfoot>";
        echo "<tr>";
            echo "<th>Plataforma</th>";
            echo "<th>Aplicación asociada</th>";
            echo "<th>Nº servidores</th>";
            echo "<th>CPU Total (VCPU)</th>";
            echo "<th>MEM Total (GB)</th>";
            echo "<th>Disco Total (TB)</th>";     
        echo "</tr>";
    echo "</tfoot>";
    */

    echo "</table>";
    
    //Cerramos la conexion a la BBDD
    require "cerrarconexionBBDD.php";

?>