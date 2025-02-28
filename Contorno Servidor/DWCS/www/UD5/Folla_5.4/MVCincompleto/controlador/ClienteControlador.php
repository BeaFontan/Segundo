<?php

  require_once '../modelo/ClienteModelo.php';
  require_once '../vista/vistaCliente.php';

  mostraFormularioInicio();

  crarFormulario();

  if(isset($_POST['btnAgregar'])){
    
    $nome = $_POST['nome'];
    $apelido1 = $_POST['apelidos'];
    $apelido2 = $_POST['email'];

    $clienteCrear = new ClienteModelo($nome, $apelido1, $apelido2);

    $clienteCrear->crear();
  }


  borrarPorEmail();

  if (isset($_POST['btnEliminarEmail']))
  {
    
    $clienteAEliminiar = $_POST["txtEliminarEmail"];

    $clienteModelo = new ClienteModelo('', '', $clienteAEliminiar);

    $clienteModelo->borrarEmail();
  }


  editarFormulario();

  if (isset($_POST['btnEditar']))
  {

    $clienteEditar = $_POST['nomeEditar'];
    $novoNome = $_POST['novoNome'];
    $novoApelidos = $_POST['novosApelidos'];
    $novoEmail = $_POST['NovoEmail'];

    $clienteModelo = new ClienteModelo($novoNome, $novoApelidos, $novoEmail);

    $clienteModelo->editarPorEmail($clienteEditar);

  }

  
  if (isset($_GET['btnEliminar']))
  {
    
    $clienteAEliminiar = $_GET["btnEliminar"];

    $clienteModelo = new ClienteModelo($clienteAEliminiar, '', '');

    $clienteModelo->borrar($clienteAEliminiar);
    
  }

  buscarPorEmail();

  //SE QUERO LISTAR TODOS 
  if(isset($_GET['todos']))
  {
    $clientes = ClienteModelo::devolveTodos(); //UN PDOStatement. O CONTROLADOR PIDE DATOS
    
    // AO MODELO.  CONVIRTO A UN ARRAY E O DEVOLVO 
    while($fila = $clientes->fetch(PDO::FETCH_ASSOC))
    {
      $clienteArray[]=$fila;
    }

    mostraTaboaCliente($clienteArray); //CHAMO Á FUNCIÓN NA PARTE DA VISTA, PARA MOSTRAR
  }  


  if (isset($_POST["btnBuscarEmail"])) {
    $email = $_POST["txtBuscarEmail"];

    $clienteModelo = new ClienteModelo('', '', $email);
    
    $clientes = $clienteModelo->buscarPorEmail();

    // AO MODELO.  CONVIRTO A UN ARRAY E O DEVOLVO 
    while($fila = $clientes->fetch(PDO::FETCH_ASSOC))
    {
      $clienteArray[]=$fila;
    }

    mostraTaboaCliente($clienteArray); //CHAMO Á FUNCIÓN NA PARTE DA VISTA, PARA MOSTRAR

  } 
?>