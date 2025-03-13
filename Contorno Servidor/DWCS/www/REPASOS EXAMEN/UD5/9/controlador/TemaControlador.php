<?php
declare(strict_types=1);

require_once "../modelo/TemaModelo.php";
require_once "../vista/TemaVista.php";

$arrayTemas = TemaModelo::mostrarTodas();


//Buscar por título
buscarTituloHTML();

if (isset($_POST["btnBuscar"])) {
    $tituloBuscar = '%'.strtolower($_POST["txtTituloBuscar"]).'%';

    $tema = new TemaModelo($tituloBuscar, '', 0, 0, '');

    $arrayTemas = $tema->buscarTitulo();

    if (empty($arrayTemas)) {
        $mensaxe = "Non se atoparon resultados";
        mostrarMensaxeHTML($mensaxe);
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
        $mensaxe = "Ese tema xa existe";
        mostrarMensaxeHTML($mensaxe);

    } else {
        $mensaxe = $tema->insertar();
        mostrarMensaxeHTML($mensaxe);
        $arrayTemas = TemaModelo::mostrarTodas();
    }

}



//Eliminar
eliminarHTML();

if (isset($_POST["btnBEliminar"])) {
    $tituloEliminar = $_POST["txtTituloEliminar"];

    $tema = new TemaModelo($tituloEliminar, '', 0, 0, '');

    $temaExistente = $tema->buscarTitulo();

    if (empty($temaExistente)) {
        $mensaxe = "O tema a eliminar non existe";
        mostrarMensaxeHTML($mensaxe);

    } else {
        $mensaxe = $tema->eliminar();
        mostrarMensaxeHTML($mensaxe);
        $arrayTemas = TemaModelo::mostrarTodas();
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
        $mensaxe = "Non existe o título a editar";
        mostrarMensaxeHTML($mensaxe);

    } else {
        $tema = new TemaModelo($titulo, $autor, $ano, $duracion, $imaxe);

        $mensaxe = $tema->editar($tituloEditar);
        mostrarMensaxeHTML($mensaxe);
        $arrayTemas = TemaModelo::mostrarTodas();
    }

}



//Mostrar todos
mostrarTodosHTML($arrayTemas);