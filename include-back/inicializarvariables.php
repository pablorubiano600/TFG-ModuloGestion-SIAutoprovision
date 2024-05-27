<?php 
  if(!isset($_SESSION['usuarioAutorizado'])){
    $_SESSION['usuarioAutorizado']= false;
  }

  if(!isset($_SESSION['nombreUsuario'])){
    $_SESSION['nombreUsuario']="Invitado";
  }

  if(!isset($_SESSION['rolUsuario'])){
    $_SESSION['rolUsuario']="Ninguno";
  }
?> 