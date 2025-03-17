<?php
declare(strict_types=1);

require_once "../vista/TemaVista.php";
require_once "../modelo/TemaModelo.php";


$arrayTemas = TemaModelo::mostrarTodos();

//Buscar por email 
buscarTituloHTMl();

if (isset($_POST["btnBuscar"])) {
    $titulo = "%".strtolower($_POST["txtTitulo"])."%";

    $tema = new TemaModelo($titulo, '', 0, 0, '');

    $arrayTemas =  $tema->buscarTitulo();

    if (is_string($arrayTemas)) {
        mostrarMensaxe($arrayTemas);

    }elseif (empty($arrayTemas)) {
        $mensaxe = "No se atopan resultados";
        mostrarMensaxe($mensaxe);
    }
}



//Insertar
insertarHTMl();

if (isset($_POST["btnInsertar"])) {
   $titulo = $_POST["txtTitulo"];
   $autor = $_POST["txtAutor"];
   $ano = (int) $_POST["txtAno"];
   $duracion = (int) $_POST["txtDuracion"];
   $imaxe = $titulo;

   $tema = new TemaModelo($titulo, $autor, $ano, $duracion, $imaxe);

   $temaExistente = $tema->buscarTitulo();

   if (!empty($temaExistente)) {
        $mensaxe = "Xa existe o tema";
        mostrarMensaxe($mensaxe);

   } else {
        $mensaxe = $tema->insertar();
        mostrarMensaxe($mensaxe);
        $arrayTemas = TemaModelo::mostrarTodos();
   }
}


//Eliminar
eliminarHTML();

if (isset($_POST["btnEliminar"])) {
    $tituloEliminar = $_POST["txtTitulo"];

    $tema = new TemaModelo($tituloEliminar, '', 0, 0,'');

    $temaExistente = $tema->buscarTitulo();

    if (empty($temaExistente)) {
        $mensaxe = "Non existe o tema";
        mostrarMensaxe($mensaxe);
 
    } else {
        $mensaxe = $tema->eliminar();
        mostrarMensaxe($mensaxe);
        $arrayTemas = TemaModelo::mostrarTodos();
    }
}



//Editar
editarHTML();

if (isset($_POST["btnEditar"])) {
    $tituloEditar = $_POST["txtTituloEditar"];

    $titulo = $_POST["txtTitulo"];
    $autor = $_POST["txtAutor"];
    $ano = (int) $_POST["txtAno"];
    $duracion = (int) $_POST["txtDuracion"];
    $imaxe = $titulo;

    $tema = new TemaModelo($tituloEditar, '', 0, 0, '');

    $temaExistente = $tema->buscarTitulo();

    if (empty($temaExistente)) {
        $mensaxe = "Non existe o tema";
        mostrarMensaxe($mensaxe);
 
    } else {
        $tema = new TemaModelo($titulo, $autor, $ano, $duracion, $imaxe);

        $mensaxe = $tema->editar($tituloEditar);
        mostrarMensaxe($mensaxe);
        $arrayTemas = TemaModelo::mostrarTodos();
    }
}



//Mostrar todos
mostrarTodosHTML($arrayTemas);
