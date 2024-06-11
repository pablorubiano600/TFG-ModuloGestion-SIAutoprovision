<?php
    /*
        En esta página cargamos los array locales con las "Plataformas" y el "Equipamiento" disponibles
    */
    
    //Iniciamos la conexion a la BBDD
    include "iniciarconexionBBDD.php";
                
    //---------------  Cargamos el array de PLATAFORMAS (en estado Petición)  ---------------        
        // Preparamos la consulta con funciones SQL SUM y COUNT para obtener los valores resumen de las plataformas       
        $miConsulta = "SELECT id_plataforma, nombre_plataforma, estado 
        FROM MG_plataforma 
        WHERE estado='Petición'";
        
        //Creamos la tabla
        $misPlataformasPeticion = array();

        // Ejecutamos la consulta (mysqli_query devuelve un objeto mysqli_result)
        if ($miResultado = $miConexion -> query($miConsulta)) {
            //Para realizar pruebas
               //echo "Returned rows are: " . $miResultado -> num_rows;            
            //Guardamos el resultado en una tabla
            $i = 0;
            while ($fila = $miResultado->fetch_assoc()) {                
                $misPlataformasPeticion[$i][0] = $fila["id_plataforma"];
                $misPlataformasPeticion[$i][1] = $fila["nombre_plataforma"];
                $i = $i+1;
            }            
            // Liberamos la memoria asociada al resultado
            $miResultado -> free_result();
        }
          
        //Para Pruebas
          // echo sizeof($misPlataformasPeticion)."<br>";
          // echo $misPlataformasPeticion[1][1]."<br>";
        

        
    //---------------  Cargamos el array de EQUIPAMIENTO (A, B y C)  ---------------  
        //Creamos la tabla (donde uniremos lo que saquemos de todas las entidades de equipamiento)
        $miEquipamiento = array();
        //Indice comun
        $i = 0;

        //EQUIPAMIENTO A
        $miConsulta = "SELECT * FROM `SIM_INTEGRACION_EQUIPOA` WHERE 1";        
        // Ejecutamos la consulta (mysqli_query devuelve un objeto mysqli_result)
        if ($miResultado = $miConexion -> query($miConsulta)) {            
            while ($fila = $miResultado->fetch_assoc()) {                
                $miEquipamiento[$i][0] = $fila["nombre"];
                $miEquipamiento[$i][1] = $fila["vcpu_libre"];
                $miEquipamiento[$i][2] = $fila["mem_libre"];
                $miEquipamiento[$i][3] = $fila["alm_libre"];
                $i = $i+1;
            }            
            // Liberamos la memoria asociada al resultado
            $miResultado -> free_result();
        }

        //EQUIPAMIENTO B
        $miConsulta = "SELECT * FROM `SIM_INTEGRACION_EQUIPOB` WHERE 1";        
        // Ejecutamos la consulta (mysqli_query devuelve un objeto mysqli_result)
        if ($miResultado = $miConexion -> query($miConsulta)) {            
            while ($fila = $miResultado->fetch_assoc()) {                
                $miEquipamiento[$i][0] = $fila["nombre"];
                $miEquipamiento[$i][1] = $fila["vcpu_libre"];
                $miEquipamiento[$i][2] = $fila["mem_libre"];
                $miEquipamiento[$i][3] = $fila["alm_libre"];
                $i = $i+1;
            }            
            // Liberamos la memoria asociada al resultado
            $miResultado -> free_result();
        }

        //EQUIPAMIENTO C
        $miConsulta = "SELECT * FROM `SIM_INTEGRACION_EQUIPOC` WHERE 1";        
        // Ejecutamos la consulta (mysqli_query devuelve un objeto mysqli_result)
        if ($miResultado = $miConexion -> query($miConsulta)) {            
            while ($fila = $miResultado->fetch_assoc()) {                
                $miEquipamiento[$i][0] = $fila["nombre"];
                $miEquipamiento[$i][1] = $fila["vcpu_libre"];
                $miEquipamiento[$i][2] = $fila["mem_libre"];
                $miEquipamiento[$i][3] = $fila["alm_libre"];
                $i = $i+1;
            }            
            // Liberamos la memoria asociada al resultado
            $miResultado -> free_result();
        }        

        
    //Cerramos la conexion a la BBDD
    require "cerrarconexionBBDD.php";

?>

