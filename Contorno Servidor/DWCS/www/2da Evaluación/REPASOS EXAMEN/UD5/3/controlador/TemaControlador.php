<?php

declare(strict_types=1);

require_once "../vista/TemaVista.php";
require_once "../modelo/TemaModelo.php";

$arrayTemas = TemaModelo::mostrarTodos();


//Buscar por título
buscarPorTituloHTML();

if (isset($_POST["btnBuscar"])) {
    $titulo = "%".strtolower($_POST["txtTituloBuscar"])."%";

    $tema = new TemaModelo($titulo, '', 0, 0, '');

    $arrayTemas = $tema->buscarPorTitulo();

    if (empty($arrayTemas)) {
        $mensaxe = "Non se atopou nada";
        mostrarMensaxe($mensaxe);
    }
}


//Insertar
insertarHTML();

if (isset($_POST["btnInsertar"])) {
    $titulo = $_POST["txtTitulo"];
    $autor = $_POST["txtAutor"];
    $ano = (int) $_POST["txtAno"];
    $duracion = (int) $_POST["txtDuracion"];
    $imaxe = $titulo;

    $tema = new TemaModelo($titulo, $autor, $ano, $duracion, $imaxe);

    $temaExistente = $tema->buscarPorTitulo();

    if (!empty($temaExistente)) {
        $mensaxe = "xa existe o tema";
        mostrarMensaxe($mensaxe);

    } else {
        $mensaxe = $tema->insertar();

        mostrarMensaxe($mensaxe);
    
        $arrayTemas = TemaModelo::mostrarTodos();
    }

}


//Borrar
borrrarHTML();

if (isset($_POST["btnBorrar"])) {
    
    $temaEliminar = $_POST["txtTituloEliminar"];

    $tema = new TemaModelo($temaEliminar, '', 0, 0, '');

    $temaExistente = $tema->buscarPorTitulo();

    if (empty($temaExistente)) {
        $mensaxe = "Non existe o tema";
        mostrarMensaxe($mensaxe);
    }else{
        $mensaxe = $tema->borrar();
        mostrarMensaxe($mensaxe);
        $arrayTemas = TemaModelo::mostrarTodos();
    }
}


//Actualizar
actualizarHTML();

if (isset($_POST["btnActualizar"])) {
    $tituloActualizar = $_POST["txtTituloActualizar"];

    $titulo = $_POST["txtTitulo"];
    $autor = $_POST["txtAutor"];
    $ano = (int) $_POST["txtAno"];
    $duracion = (int) $_POST["txtDuracion"];
    $imaxe = $titulo;

    $tema = new TemaModelo($tituloActualizar, $autor, $ano, $duracion, $imaxe);

    $existente = $tema->buscarPorTitulo();

    if (empty($existente)) {
        $mensaxe = "Non existe o tema";
        mostrarMensaxe($mensaxe);
    }else{
        $tema = new TemaModelo($titulo, $autor, $ano, $duracion, $imaxe);

        $mensaxe = $tema->actualizar($tituloActualizar);
        mostrarMensaxe($mensaxe);
        $arrayTemas = TemaModelo::mostrarTodos();
    }
}



//Mostrar todos
mostrarTodosHTMl($arrayTemas);
