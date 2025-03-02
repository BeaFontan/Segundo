<?php
include_once 'Usuario.php';
include_once 'conexion.php';

class UsuarioModelo extends Usuario
{
    public function __construct(string $usuario, string $pass)
    {
        parent::__construct($usuario, $pass);
    }


    public function isUsuarioValido()
    {
        $pdo = new Conexion();

        try {
            $query = $pdo->prepare("Select * from usuarios where usuario like ?");
            $query->execute([$this->usuario]);
            $usuario = $query->fetch();

            if ($usuario) {
                $passComprobada = password_verify($this->pass, $usuario["pass"]);
               
                if ($passComprobada) {
                    $mensaxe = "";
                    
                    header('Location:temaControlador.php');
                    exit;
                    
                }else{
                    $mensaxe = "Contrasinal erronea";
                }
            }else{
                $mensaxe = "Non existe o usuario";
            }


        } catch (PDOException $e) {
            die("Erro comprobando login" . $e->getMessage());
        }

        return $mensaxe;
    }
}