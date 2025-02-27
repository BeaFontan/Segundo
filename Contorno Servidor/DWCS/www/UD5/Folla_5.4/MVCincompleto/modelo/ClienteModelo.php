<?php
declare(strict_types=1);
require_once 'Conexion.php';
require_once 'Cliente.php';

class ClienteModelo extends Cliente
{
    public function __construct(string $nome, string $apelidos, string $email)
    {
        parent::__construct($nome,$apelidos,$email);
    }


  /* PARA Insertar un obxecto*/ 
  public function guardar(): bool
  {
     $conexion = new Conexion();
  
     try {
        $pdoStmt = $conexion->prepare('INSERT INTO ' . self::TABLA .' (nome, apelidos,email) VALUES(:nome, :apelidos, :email)');
        $pdoStmt->bindParam(':nome', $this->nome);
        $pdoStmt->bindParam(':apelidos', $this->apelidos);
        $pdoStmt->bindParam(':email', $this->email);
        $pdoStmt->execute();
     } catch (PDOException $e) {
         die ("Houbo un erro coa inserción: ". $e->getMessage());
     }

     $conexion = null;
     return true;
  }



  //DEVOLVE un array con todos os clientes da táboa. Método de clase
  public static function devolveTodos() : PDOStatement
  {
      $conexion = new Conexion();
      try {
          $consulta = "select * from clientes";
          $pdoStmt = $conexion->query($consulta); 

      } catch (PDOException $e) {
          die ("Houbo un erro en devolveTodos". $e->getMessage());
      }
      return $pdoStmt;
  }


  public function crear($nome, $email, $apelidos): string
  {
    $conexion = new Conexion();

    try {
        $pdoStmt = $conexion->prepare("INSERT INTO `clientes`(`nome`, `apelidos`, `email`) VALUES (?,?,?)");
        $pdoStmt->execute([$nome, $email, $apelidos]);
    } catch (PDOException $e) {
        die ("Erro creando". $e->getMessage());
    }

    return "Creación hecha";
  }

  public function borrar($cliente): string
  {
    $pdo = new Conexion();

    try {
        $query = $pdo->prepare("DELETE FROM clientes WHERE nome = ?"); 
        $query->execute([$cliente]);

    } catch (PDOException $e) {
        die ("Houbo un erro eliminando". $e->getMessage());
    }

    return "Eliminación correcta";
  }
}