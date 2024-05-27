<!-- Para DataTables-->
<script type="text/javascript">                  
    $(document).ready( function () {
            $('#capacidadEquipamiento').DataTable({
                bFilter: false,
                info: false,
                paging: false,
                ordering: true,
                columnDefs: [                
                { className: "dt-center", targets: '_all' },
                { className: "dt-head-center", targets: '_all' }
                ]
            });
        } );
    //bFilter: es para quitar el campo de búsqueda
</script> 



<?php
    /*
        Este código simula la integración con los Módulos de Integración con el Equipamiento.
        Vamos a recopilar la información de 3 equipamientos de virtualización
        - INTEGRACION_EQUIPOA
        - INTEGRACION_EQUIPOB
        - INTEGRACION_EQUIPOC
        cada uno de ellos simulados con una tabla en la BBDD
    */        
    
    //Iniciamos la conexion a la BBDD
    include "iniciarconexionBBDD.php";

    //Mostramos la fecha y hora de la consulta
    echo "<div class='col-lg-12'>";
        echo "Fecha y Hora de la consulta: ". date('Y-m-d H:i:s');
    echo "</div>";


    //Cabecera de la tabla
    echo "<table id='capacidadEquipamiento' class='table table-striped' style='width:100%'>";
        echo "<thead>";
            echo "<tr>";
                echo "<th>Logo</th>";
                echo "<th>Equipo</th>";
                echo "<th>CPU (vCPU)</th>";
                echo "<th>Memoria (GB)</th>";
                echo "<th>Disco (TB)</th>";
            echo "</tr>";
        echo "</thead>";


    //Llamada simulada a EQUIPAMIENTO A
        //Definimos la Consulta
        $miConsulta = "SELECT * FROM `SIM_INTEGRACION_EQUIPOA` WHERE 1";    
        // Ejecutamos la consulta (mysqli_query devuelve un objeto mysqli_result)
        if ($miResultado = $miConexion -> query($miConsulta)) {
            //Para realizar pruebas
               //echo "Returned rows are: " . $miResultado -> num_rows;                       
            
            //Recorremos el resultado
            echo "<tbody>";
            while ($fila = $miResultado->fetch_assoc()) {
                echo "<tr>";                
                    echo "<td><img src='./imagenes/logoNutanix.png' alt='Nutanix' class='img-thumbnail'></td>";
                    echo "<td>".$fila["nombre"]."</td>";
                    echo "<td>".$fila["vcpu_libre"]."</td>";
                    echo "<td>".$fila["mem_libre"]."</td>";
                    echo "<td>".$fila["alm_libre"]."</td>";            
                echo "</tr>";
            }                 
            // Liberamos la memoria asociada al resultado
            $miResultado -> free_result();
        }
  
    //Llamada simulada a EQUIPAMIENTO B
        //Definimos la Consulta
        $miConsulta = "SELECT * FROM `SIM_INTEGRACION_EQUIPOB` WHERE 1";    
        // Ejecutamos la consulta (mysqli_query devuelve un objeto mysqli_result)
        if ($miResultado = $miConexion -> query($miConsulta)) {
            //Para realizar pruebas
              //echo "Returned rows are: " . $miResultado -> num_rows;                       
            //Recorremos el resultado
            while ($fila = $miResultado->fetch_assoc()) {
                echo "<tr>";                    
                    echo "<td><img src='./imagenes/logoVMWare.png' alt='logoVMWare' class='img-thumbnail'></td>";
                    echo "<td>".$fila["nombre"]."</td>";
                    echo "<td>".$fila["vcpu_libre"]."</td>";
                    echo "<td>".$fila["mem_libre"]."</td>";
                    echo "<td>".$fila["alm_libre"]."</td>";            
                echo "</tr>";    
            }
                
            // Liberamos la memoria asociada al resultado
            $miResultado -> free_result();
        }

    //Llamada simulada a EQUIPAMIENTO C
        //Definimos la Consulta
        $miConsulta = "SELECT * FROM `SIM_INTEGRACION_EQUIPOC` WHERE 1";    
        // Ejecutamos la consulta (mysqli_query devuelve un objeto mysqli_result)
        if ($miResultado = $miConexion -> query($miConsulta)) {
            //Para realizar pruebas
                //echo "Returned rows are: " . $miResultado -> num_rows;            
            //Recorremos el resultado
            while ($fila = $miResultado->fetch_assoc()) {
                echo "<tr>";
                    echo "<td><img src='./imagenes/LogoHyper-V.png' alt='LogoHyper-V' class='img-thumbnail'></td>";
                    echo "<td>".$fila["nombre"]."</td>";
                    echo "<td>".$fila["vcpu_libre"]."</td>";
                    echo "<td>".$fila["mem_libre"]."</td>";
                    echo "<td>".$fila["alm_libre"]."</td>";            
                echo "</tr>";                 
            }

            echo "</tbody>";                   
            // Liberamos la memoria asociada al resultado
            $miResultado -> free_result();
        }


    //Pie de la tabla    
    echo "<tfoot>";
        echo "<tr>";
            echo "<th>Logo</th>";
            echo "<th>Equipo</th>";
            echo "<th>CPU (vCPU)</th>";
            echo "<th>Memoria (GB)</th>";
            echo "<th>Disco (TB)</th>";
        echo "</tr>";
    echo "</tfoot>";
    echo "</table>";


    
    //Cerramos la conexion a la BBDD
    require "cerrarconexionBBDD.php";
?>

