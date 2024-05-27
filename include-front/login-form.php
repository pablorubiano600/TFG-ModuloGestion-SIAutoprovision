<main class="form-signin">    
    <!-- Obviamos el "action" porque irá a la misma página-->
    <form method="post">
        <!--Campo usuario (usamos Email) -->
        <div class="form-floating">
            <!-- "value" puesto para facilitar pruebas. Quitar cuando ya no sea necesario-->
            <input type="email" class="form-control-sm" id="miUsuario" name="miUsuario" placeholder="Email" value="infra@opf.gob">
        </div>
        <!--Campo Password-->
        <div class="form-floating">
            <input type="password" class="form-control-sm" id="miPassword" name="miPassword" placeholder="Password">        
        </div>
        <!-- Botón para enviar el formulario-->
        <button class="w-30 btn btn-sm btn-primary" type="submit">Iniciar Sesión</button>
    </form>
</main>