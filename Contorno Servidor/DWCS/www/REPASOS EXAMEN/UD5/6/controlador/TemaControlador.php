<?php
declare(strict_types=1);

require_once "../modelo/TemaModelo.php";
require_once "../vista/TemaVista.php";

$arrayTemas = TemaModelo::mostrarTodos();


//Buscar por título
buscarTitulo();

if (isset($_POST["btnBuscar"])) {
    $tituloABuscar = "%".strtolower($_POST["txtTituloBuscar"])."%";

    $tema = new TemaModelo($tituloABuscar, '', 0, 0, '');

    $arrayTemas = $tema->buscar();

    if (empty($arrayTemas)) {
        $mensaxe = "Non se atopan resultados";
        mostrarMensaxe($mensaxe);
    }
}


//Insertar
insertarTitulo();

if (isset($_POST["btnInsertar"])) {
    $titulo = $_POST["txtTitulo"];
    $autor = $_POST["txtAutor"];
    $ano = (int) $_POST["txtAno"];
    $duracion = (int) $_POST["txtDuracion"];
    $imaxe = $titulo;

    $tema = new TemaModelo($titulo, $autor, $ano, $duracion, $imaxe);

    $temaExistente = $tema->buscar();

    if (!empty($temaExistente)) {
        $mensaxe = "Xa existe ese título";
        mostrarMensaxe($mensaxe);

    } else {
        $mensaxe = $tema->insertar();

        mostrarMensaxe($mensaxe);
    
        $arrayTemas = TemaModelo::mostrarTodos();
    }
}


//Eliminar
eliminar();

if (isset($_POST["btnEliminar"])) {
    $tituloAEliminar = $_POST["txtTituloEliminar"];
    
    $tema = new TemaModelo($tituloAEliminar, '', 0, 0, '');

    $temaExistente = $tema->buscar();

    if (empty($temaExistente)) {
        $mensaxe = "Non existe ese título";
        mostrarMensaxe($mensaxe);

    } else {
        $mensaxe = $tema->eliminar();

        mostrarMensaxe($mensaxe);
    
        $arrayTemas = TemaModelo::mostrarTodos();
    }
}


//Editar
editar();

if (isset($_POST["btnEditar"])) {
    $tituloAEditar = $_POST["txtTituloEditar"];

    $titulo = $_POST["txtTitulo"];
    $autor = $_POST["txtAutor"];
    $ano = (int) $_POST["txtAno"];
    $duracion = (int) $_POST["txtDuracion"];
    $imaxe = $titulo;

    $tema = new TemaModelo($tituloAEditar, $autor, $ano, $duracion, $imaxe);

    $temaExistente = $tema->buscar();

    if (empty($temaExistente)) {
        $mensaxe = "Non existe ese título";
        mostrarMensaxe($mensaxe);

    } else {
        $tema = new TemaModelo($titulo, $autor, $ano, $duracion, $imaxe);

        $mensaxe = $tema->editar($tituloAEditar);

        mostrarMensaxe($mensaxe);
    
        $arrayTemas = TemaModelo::mostrarTodos();
    }
}


//Mostrar todos
mostrarTodosHTML($arrayTemas);