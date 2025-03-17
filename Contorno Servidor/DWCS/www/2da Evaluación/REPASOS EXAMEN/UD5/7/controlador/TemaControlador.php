<?php
declare(strict_types=1);

require_once "../modelo/TemaModelo.php";
require_once "../vista/TemaVista.php";

$arrayTemas = [];

//Boton mostrar todos
mostrarTodosButtonHTML();

if (isset($_POST["btnMostrarTodos"])) {
    $arrayTemas = TemaModelo::mostrarTodos();
}

//Buscar por título
buscarTituloHTML();

if (isset($_POST["btnBuscar"])) {
    $tituloBuscar = "%".strtolower($_POST["txtTituloBuscar"])."%";

    $tema = new TemaModelo($tituloBuscar, '', 0, 0, '');

    $arrayTemas = $tema->buscarTitulo();

    if (empty($arrayTemas)) {
        $mensaxe = "Non se atopan coincidencias";
        mostrarMensaxeHTML($mensaxe);
        $arrayTemas = [];
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

    $temaExistente = $tema->buscarTitulo();

    if (!empty($temaExistente)) {
        $mensaxe = "Xa existe ese tema";
        mostrarMensaxeHTML($mensaxe);
        $arrayTemas = TemaModelo::mostrarTodos();

    } else {
        $mensaxe = $tema->insertar();

        mostrarMensaxeHTML($mensaxe);
    
        $arrayTemas = TemaModelo::mostrarTodos();
    }
}



//Eliminar
eliminarHTML();

if (isset($_POST["btnEliminar"])) {
    $tituloEliminar = $_POST["txtTituloEliminar"];

    $tema = new TemaModelo($tituloEliminar, '', 0, 0, '');

    $temaExistente = $tema->buscarTitulo();

    if (empty($temaExistente)) {
        $mensaxe = "No existe o título a Eliminar";
        mostrarMensaxeHTML($mensaxe);
        $arrayTemas = TemaModelo::mostrarTodos();

    } else {
        $mensaxe = $tema->eliminar();

        mostrarMensaxeHTML($mensaxe);
    
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

    $tema = new TemaModelo($tituloEditar, $autor, $ano, $duracion, $imaxe);

    $temaExistente = $tema->buscarTitulo();

    if (empty($temaExistente)) {
        $mensaxe = "Non existe o tema a editar";
        mostrarMensaxeHTML($mensaxe);
        $arrayTemas = TemaModelo::mostrarTodos();

    } else {
        $tema = new TemaModelo($titulo, $autor, $ano, $duracion, $imaxe);

        $mensaxe = $tema->editar($tituloEditar);

        mostrarMensaxeHTML($mensaxe);
    
        $arrayTemas = TemaModelo::mostrarTodos();
    }
}



//Mostrar todos
mostrarHTML($arrayTemas);
