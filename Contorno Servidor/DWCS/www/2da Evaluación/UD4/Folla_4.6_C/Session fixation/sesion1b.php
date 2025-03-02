<?php
    session_start();

    $usuario_logueado = true; 

    if ($usuario_logueado === true) {
        session_regenerate_id(true);
        
        $_SESSION['logueado'] = true;
    }

    echo session_id();
?>