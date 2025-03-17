<?php

declare(strict_types=1);

require_once "../modelo/TemaModelo.php";
require_once "../vista/TemaVista.php";

$arrayTemas = TemaModelo::mostrarTodos();

//Buscar por título
buscarPorTituloHTML();

if (isset($_POST["btnBuscar"])) {
    $titulo = "%" . strtolower($_POST["txtTitulo"]) . "%";

    $tema = new TemaModelo($titulo, '', 0, 0, '');

    $arrayTemas = $tema->buscarTitulo();

    if (empty($arrayTemas)) {
        mostrarMensajeHTML("Non se atoparon");
    }
}



//Insertar
insertar();

if (isset($_POST["btnInsertar"])) {
    $titulo = $_POST["txtTitulo"];
    $autor = $_POST["txtAutor"];
    $ano = (int) $_POST["txtAno"];
    $duracion = (int) $_POST["txtDuracion"];
    $imaxe = $titulo;

    $tema = new TemaModelo($titulo, $autor, $ano, $duracion, $imaxe);

    $temaExistente = $tema->buscarTitulo();

    if (!empty($temaExistente)) {
        mostrarMensajeHTML("Xa existe ese título");

    } else {
        $mensaxe = $tema->insertar();

        mostrarMensajeHTML($mensaxe);

        $arrayTemas = TemaModelo::mostrarTodos();
    }
}



//Eliminar
borrarHTMl();

if (isset($_POST["btnEliminar"])) {
    $tituloEliminar = $_POST["txtTitulo"];

    $tema = new TemaModelo($tituloEliminar, '', 0, 0, '');

    $temaExistente = $tema->buscarTitulo();

    if (empty($temaExistente)) {
        mostrarMensajeHTML("Non existe ese título");

    } else {
        $mensaxe = $tema->eliminar();

        mostrarMensajeHTML($mensaxe);

        $arrayTemas = TemaModelo::mostrarTodos();
    }
}



//Actualizar
actualizarHTMl();

if (isset($_POST["btnEditar"])) {
    $tituloEditar = $_POST["txtTituloEditar"];

    $titulo = $_POST["txtTitulo"];
    $autor = $_POST["txtAutor"];
    $ano = (int) $_POST["txtAno"];
    $duracion = (int) $_POST["txtDuracion"];
    $imaxe = $titulo;

    $tema = new TemaModelo($tituloEditar, $autor, $ano, $duracion, $imaxe);

    $temaExistente = $tema->buscarTitulo();

    if (empty($temaExistente)) {
        mostrarMensajeHTML("Non existe ese título");

    } else {

        $tema = new TemaModelo($titulo, $autor, $ano, $duracion, $imaxe);

        $mensaxe = $tema->editar($tituloEditar);

        mostrarMensajeHTML($mensaxe);

        $arrayTemas = TemaModelo::mostrarTodos();
    }
}



//Mostrar todos
mostrarTodosHTML($arrayTemas);
