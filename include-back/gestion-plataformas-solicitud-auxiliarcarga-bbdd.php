<?php
    /*
        En esta página cargamos los array locales con las "Plantillas" y "Aplicaciones" disponibles
    */
    
    //Iniciamos la conexion a la BBDD
    include "iniciarconexionBBDD.php";
                
    //---------------  Cargamos el array de PLANTILLAS  ---------------
        //Definimos la Consulta
        $miConsulta = "SELECT * FROM `MG_plantillaservidor` WHERE 1";    
        //Creamos la tabla
        $misPlantillas = array();

        // Ejecutamos la consulta (mysqli_query devuelve un objeto mysqli_result)
        if ($miResultado = $miConexion -> query($miConsulta)) {
            //Para realizar pruebas
               //echo "Returned rows are: " . $miResultado -> num_rows;            
            //Guardamos el resultado en una tabla
            $i = 0;
            while ($fila = $miResultado->fetch_assoc()) {                
                $misPlantillas[$i][0] = $fila["id_plantillaservidor"];
                $misPlantillas[$i][1] = $fila["nombre_plantillaservidor"];
                $i = $i+1;
            }            
            // Liberamos la memoria asociada al resultado
            $miResultado -> free_result();
        }
  
        /*
          //Pruebas
            echo sizeof($misPlantillas)."<br>";
            echo $misPlantillas[1][1]."<br>";
        */

        
    //---------------  Cargamos el array de APLICACIONES  ---------------  
        //Definimos la Consulta
        $miConsulta = "SELECT * FROM `SIM_CMDB_APLICACION` WHERE 1";    
        //Creamos la tabla
        $misAplicaciones = array();

        // Ejecutamos la consulta (mysqli_query devuelve un objeto mysqli_result)
        if ($miResultado = $miConexion -> query($miConsulta)) {
            //Para realizar pruebas
               //echo "Returned rows are: " . $miResultado -> num_rows;            
            //Guardamos el resultado en una tabla
            $i = 0;
            while ($fila = $miResultado->fetch_assoc()) {                
                $misAplicaciones[$i][0] = $fila["id_CMDB_APLICACION"];
                $misAplicaciones[$i][1] = $fila["nombre_aplicacion"];
                $i = $i+1;
            }            
            // Liberamos la memoria asociada al resultado
            $miResultado -> free_result();
        }
  
        /*
          //Pruebas
            echo sizeof($misAplicaciones)."<br>";
            echo $misAplicaciones[1][1]."<br>";
        */
        
    //Cerramos la conexion a la BBDD
    require "cerrarconexionBBDD.php";

?>

