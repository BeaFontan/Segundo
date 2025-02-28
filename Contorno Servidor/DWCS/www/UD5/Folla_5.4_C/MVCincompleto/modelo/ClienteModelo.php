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

    public function buscarPorEmail() : PDOStatement 
    {
        $conexion = new Conexion();
        try {
            $query = $conexion->prepare("select * from clientes where email like ?");;
            
            $pdoStmt = $query->execute([$this->email]);
  
        } catch (PDOException $e) {
            die ("Houbo un erro en query". $e->getMessage());
        }
        return $query;
    }


  public function crear(): string
  {
    $conexion = new Conexion();

    try {
        $pdoStmt = $conexion->prepare("INSERT INTO `clientes`(`nome`, `apelidos`, `email`) VALUES (?,?,?)");
        $pdoStmt->execute([$this->nome, $this->apelidos, $this->email]);

    } catch (PDOException $e) {
        die ("Erro creando". $e->getMessage());
    }

    return "Creación hecha";
  }

  public function editarPorEmail($clienteEditar) : string
  {
    $conexion = new Conexion();
    try {
        $query = $conexion->prepare("UPDATE `clientes` SET `nome`=?,`apelidos`=?,`email`=? WHERE nome like ?");
        $pdoStmt = $query->execute([$this->nome, $this->apelidos, $this->email, $clienteEditar]);
    }catch (PDOException $e) {
            die ("Erro creando". $e->getMessage());
        }
    
        return "Edición hecha";
  }


  public function borrarEmail() : string
  {
    $pdo = new Conexion();

    try {
        $query = $pdo->prepare("DELETE FROM clientes WHERE email = ?"); 
        $query->execute([$this->email]);

    } catch (PDOException $e) {
        die ("Houbo un erro eliminando por email". $e->getMessage());
    }

    return "Eliminación correcta";
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