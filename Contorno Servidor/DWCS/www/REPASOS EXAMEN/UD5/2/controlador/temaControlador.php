<?php

require_once "../modelo/TemaModelo.php";
require_once "../vista/vistaTema.php";

$arrayTemas = TemaModelo::mostrarTodos();


//buscar por título
buscarPorTituloHTML();

if (isset($_POST["btnBuscar"])) {
    $tituloABuscar = "%". strtolower($_POST["txtTitulo"])."%";

    $tema = new TemaModelo($tituloABuscar, '', 0, 0, '');

    $arrayTemas = $tema->buscarPorTitulo();

    if (empty($arrayTemas)) {
        $mensaxe = "Non se atopan temas";
        mostrarMensaxe($mensaxe);
    }
}


//Insertar tema
insertarTema();

if (isset($_POST["btnAgregar"])) {
    $titulo = $_POST["txtTitulo"];
    $autor = $_POST["txtAutor"];
    $ano = (int) $_POST["txtAno"];
    $duracion = (int) $_POST["txtDuracion"];
    $imaxe = $titulo;

    $tema = new TemaModelo($titulo, $autor, $ano, $duracion, $imaxe);

    $existente = $tema->buscarPorTitulo();

    if (!empty($existente)) {
        $mensaxe = "Xa existe ese título";
        mostrarMensaxe($mensaxe);

    } else {
        $mensaxe = $tema->agregar();
        $arrayTemas = TemaModelo::mostrarTodos();
        mostrarMensaxe($mensaxe);
    }
}


//Borrar tema
borrarTema();

if (isset($_POST["btnBorrar"])) {
    $tituloEliminar = $_POST["txtTitulo"];

    $tema = new TemaModelo($tituloEliminar, '', 0, 0, '');

    $existente = $tema->buscarPorTitulo();

    if (!empty($existente)) {
        $mensaxe = $tema->borrarTema();
        mostrarMensaxe($mensaxe);
        $arrayTemas = TemaModelo::mostrarTodos();

    }else {
        $mensaxe = "Non existe o tema";
        mostrarMensaxe($mensaxe);
    }
}


//Actualizar tema
modificarTema();

if (isset($_POST["btnActualizar"])) {
    $titulo = $_POST["txtTitulo"];
    $autor = $_POST["txtAutor"];
    $ano = (int) $_POST["txtAno"];
    $duracion = (int) $_POST["txtDuracion"];
    $imaxe = $titulo;
    $tituloActualizar = $_POST["txtTituloModificar"];

    $tema = new TemaModelo($tituloActualizar, $autor, $ano, $duracion, $imaxe);
    $existente = $tema->buscarPorTitulo();

    if (!empty($existente)) {
        $tema = new TemaModelo($titulo, $autor, $ano, $duracion, $imaxe);
        $mensaxe = $tema->actualizarTema($tituloActualizar);
        mostrarMensaxe($mensaxe);
        $arrayTemas = TemaModelo::mostrarTodos();

    }else {
        $mensaxe = "Non existe o tema";
        mostrarMensaxe($mensaxe);
    }
}


//mostrar todos
mostrarTodosHTML($arrayTemas);
