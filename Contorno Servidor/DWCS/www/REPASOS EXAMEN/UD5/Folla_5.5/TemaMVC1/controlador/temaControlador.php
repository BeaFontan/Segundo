<?php

require_once '../modelo/TemaModelo.php';
require_once '../vista/vistaTema.php';

//Mostrar todos al principio
$arrayTemas = TemaModelo::mostrarTodos();



//Buscar por título
formBuscarPorTitulo();

if (isset($_POST["btnBuscarTitulo"])) {
   $tituloABuscar = '%'. strtolower($_POST["txtBuscarTitulo"]).'%';

   $tema = new TemaModelo($tituloABuscar, '', 0, 0, '');

   $arrayTemas = $tema->mostrarBuscarTitulo();

   if (empty($arrayTemas)) {
    $mensaxe = "Non se atoparon temas";
    mostrarMensaxe($mensaxe);
   }
}



//Insertar
formInsertar();

if (isset($_POST["btnInsertar"])) {
    $titulo = $_POST["txtTitulo"];
    $autor = $_POST["txtAutor"];
    $ano = (int) $_POST["txtAno"];
    $duracion = (int) $_POST["txtDuracion"];

    $tema = new TemaModelo($titulo, $autor, $ano, $duracion, $titulo);

    $mensaxe = $tema->insertarTema();

    //Volver a volcar
    $arrayTemas = TemaModelo::mostrarTodos();

    //Mostrar mensaje
    mostrarMensaxe($mensaxe);
}



//Eliminar
formBorrar();

if (isset($_POST["btnEliminar"])) {
    $tituloAEliminar = $_POST["txtEliminarTitulo"];

    $tema = new TemaModelo($tituloAEliminar, '', 0, 0, '');

    $mensaxe = $tema->eliminarTema();

    //Volver a volcar
    $arrayTemas = TemaModelo::mostrarTodos();

    //Mostrar mensaje
    mostrarMensaxe($mensaxe);
}



//Actualizar
formActualizar();

if (isset($_POST["btnActualizar"])) {
    $tituloAEditar = $_POST["txtTemaActualizar"];

    $titulo = $_POST["txtActualizarTitulo"];
    $autor = $_POST["txtActualizarAutor"];
    $ano = (int) $_POST["txtActualizarAno"];
    $duracion = (int) $_POST["txtActualizarDuracion"];
    $imaxe = $_POST["txtActualizarImaxe"];


    $tema = new TemaModelo($titulo, $autor, $ano, $duracion, $imaxe);

    $mensaxe = $tema->actualizarTema($tituloAEditar);

    //Volver a volcar
    $arrayTemas = TemaModelo::mostrarTodos();

    //Mostrar mensaje
    mostrarMensaxe($mensaxe);
}


//Volcar datos
mostrarDatosHTML($arrayTemas);