<?php
declare(strict_types=1);

require_once "Tema.php";
require_once "Conexion.php";

class TemaModelo extends Tema
{

    public function __construct(string $titulo, string $autor, int $ano, int $duracion, string $imaxe)
    {
        parent::__construct($titulo, $autor, $ano, $duracion, $imaxe);
    }


    //Buscar por título
    public function buscarTitulo(): array
    {
        $pdo = new Conexion();

        try {
            $query = $pdo->prepare("Select * from tema where Titulo like LOWER(?)");
            $query->execute([$this->titulo]);
            return $query->fetchAll();

        } catch (PDOException $e) {
            die("Erro buscando por titulo" . $e->getMessage());
        }
    }



    //Insertar
    public function insertar(): string
    {
        $pdo = new Conexion();

        try {
            $query = $pdo->prepare("INSERT INTO `tema`(`Titulo`, `Autor`, `Ano`, `Duracion`, `Imaxe`) VALUES (?,?,?,?,?)");
            $query->execute([$this->titulo, $this->autor, $this->ano, $this->duracion, $this->imaxe]);
            return "Título insertado correctamente";

        } catch (PDOException $e) {
            return "Erro insertarndo" . $e->getMessage();
        }
    }


    //eliminar
    public function eliminar(): string
    {
        $pdo = new Conexion();

        try {
            $query = $pdo->prepare("DELETE FROM `tema` WHERE Titulo like ?");
            $query->execute([$this->titulo]);
            return "Título eliminado correctamente";

        } catch (PDOException $e) {
            return "Erro eliminando" . $e->getMessage();
        }
    }



    //Editar
    public function editar(string $tituloEditar): string
    {
        $pdo = new Conexion();

        try {
            $query = $pdo->prepare("UPDATE `tema` SET `Titulo`=?,`Autor`=?,`Ano`=?,`Duracion`=?,`Imaxe`=? WHERE Titulo like ?");
            $query->execute([$this->titulo, $this->autor, $this->ano, $this->duracion, $this->imaxe, $tituloEditar]);
            return "Título editado correctamente";

        } catch (PDOException $e) {
            return "Erro editando" . $e->getMessage();
        }
    }


    //mostrar todas
    public static function mostrarTodas(): array
    {
        $pdo = new Conexion();

        try {
            $query = $pdo->query("Select * from tema");
            $query->execute();
            return $query->fetchAll();

        } catch (PDOException $e) {
            die("Erro mostrando todos" . $e->getMessage());
        }
    }

}