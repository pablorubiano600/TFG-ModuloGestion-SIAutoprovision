<?php
    $bbdd_hostname = "db5015778539.hosting-data.io";
    $bbdd_nombrebbdd= "dbs12871712";  
    $bbdd_usuario = "dbu2249123";
    $bbdd_password = "2024_bbdd.TFG_2024";


    //Realizamos la conexión a la BBDD
    $miConexion = new mysqli($bbdd_hostname,$bbdd_usuario,$bbdd_password,$bbdd_nombrebbdd);

    // Comprobamos la conexión
    if ($miConexion -> connect_errno) {
        echo "Failed to connect to MySQL: " . $miConexion -> connect_error;
        exit();
    }          

?>