<!--Inicio contenido-->
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">
            <br>
            <h4>Bienvenido al <i><b>Módulo de Gestión de Autoprovisión</b></i> de <i>OPF (Organismo Público Ficticio)</i></h4>
            <br>
                                   
            <p>Este <i><b>Módulo de Gestión</b></i> forma parte del sistema modular <i><b>SI de Autoprovisión</b></i> y es su eje centralizador. Además de ser el punto de entrada de los usuarios, desde este módulo realiza la siguiente actividad: </p>
            <ul class="list-group">
                <li class="list-group-item">Gestión de Plantillas: Gestión de las Plantillas de Servidores con infraestructura normalizada.</li>
                <li class="list-group-item">Gestión de Plataformas. Iniciar el proceso de solicitud de Plataforma que finalizará con el aprovisionamiento de recursos sobre la infraestructura.</li>
                <li class="list-group-item">Coordinación con módulos de Integración de equipamiento físico (Provisión efectiva sobre la infraestructura).</li>
                <li class="list-group-item">Coordinación con resto de módulos auxiliares de: IAM, CMDB, DML y TAREAS.</li>
            </ul>            
            
            <br>
        
            <p><b>NOTA SOBRE EL ALCANCE</b>. Acotado al alcance definido para este trabajo, esta actividad queda:</p>
            <ul class="list-group-flush bg-light">               
                <li>Solicitud de nueva Plataforma</li>
                <li>Coordinación con el resto de módulos: Se ha simulado la integración mediante el registro de la actividad en [Logs].</li>
                <li>Gestión de Plantillas: Se han generado Plantillas en la BBDD para poder ser utilizadas en las solicitudes de nuevas plataformas.</li>
            </ul>
            
            <br>

            <p><b>NOTA SOBRE USUARIOS</b>. Los usuarios disponibles son:</p>
            <ul class="list-group-flush bg-light">
                <li>infra@opf.gob: Usuario <i>Rol Infraestructuras</i></li>
                <li>desa@opf.gob: Usuario <i>Rol Desarrollo</i></li>
            </ul>

            <br>
          
        </div>
    </div>

    <?php 
      //Para Pruebas
        //echo "Usuario: ".$_SESSION["nombreUsuario"];
        //echo "<br>session_status(): ".session_status();        
    ?>
</div>
<!--Fin contenido-->