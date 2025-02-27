<?php
    require_once '../modelo/ClienteModelo.php';
    require_once '../vista/vistaCliente.php';

    mostraFormularioInicio();

    crarFormulario();

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

    if (isset($_GET['btnEliminar']))
    {
      
      $clienteAEliminiar = $_GET["btnEliminar"];

      $clienteModelo = new ClienteModelo($clienteAEliminiar, '', '');

      $clienteModelo->borrar($clienteAEliminiar);
      
    }



?>