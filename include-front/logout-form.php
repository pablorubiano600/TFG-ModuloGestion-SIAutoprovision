<?php
    //Para pruebas
    //echo "<script type='text/javascript'>alert('SESSIONnombreUsuario: ".$_SESSION['nombreUsuario']."');</script>";
    //echo "<script type='text/javascript'>alert('SESSIONrolUsuario: ".$_SESSION['rolUsuario']."');</script>";
?>

<main class="form-signin">    
    <!-- Obviamos el "action" porque irá a la misma página-->
    <form method="post">            
            <label> Usuario: <b><?php echo $_SESSION['nombreUsuario']; ?> </b></label>
            <br>
            <label> Rol: <b><?php echo $_SESSION['rolUsuario']; ?> </b></label>
        <div class="form-floating">
            <!-- Variabla a mandar desde el Form-->
            <input type="hidden" id="hacerLogout" name="hacerLogout" value="Yes">
            <!-- Botón para enviar el formulario-->
            <button class="btn btn-primary btn-sm" type="submit">Cerrar Sesión</button>
        </div>
    </form>
</main>