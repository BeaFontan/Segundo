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
    public function buscarPorTitulo(): mixed
    {
        $pdo = new Conexion();

        try {
            $query = $pdo->prepare("Select * from tema where Titulo like LOWER(?)");
            $query->execute([$this->titulo]);
            $arrayTemas = $query->fetchAll();
            return $arrayTemas;

        } catch (PDOException $e) {
            return "Erro obtendo por título " . $e->getMessage();
        }
    }



    //Insertar
    public function insertar(): mixed
    {
        $pdo = new Conexion();

        try {
            $query = $pdo->prepare("INSERT INTO `tema`(`Titulo`, `Autor`, `Ano`, `Duracion`, `Imaxe`) VALUES (?,?,?,?,?)");
            $query->execute([$this->titulo, $this->autor, $this->ano, $this->duracion, $this->imaxe]);
            return 'Tema insertado correctamente';

        } catch (PDOException $e) {
            return "Erro insertando " . $e->getMessage();
        }
    }



    //Borrar
    public function borrar(): string
    {
        $pdo = new Conexion();

        try {
            $query = $pdo->prepare("DELETE FROM `tema` WHERE Titulo like ?");
            $query->execute([$this->titulo]);
            return "Tema eliminado correctamente";

        } catch (PDOException $e) {
            return "Erro borrando por título " . $e->getMessage();
        }
    }



    //Actualizar
    public function actualizar(string $tituloActualizar): string
    {
        $pdo = new Conexion();

        try {
            $query = $pdo->prepare("UPDATE `tema` SET `Titulo`=?,`Autor`=?,`Ano`=?,`Duracion`=?,`Imaxe`=? WHERE Titulo like ?");
            $query->execute([$this->titulo, $this->autor, $this->ano, $this->duracion, $this->imaxe, $tituloActualizar]);
            return "Tema actualizando correctamente";

        } catch (PDOException $e) {
            return "Erro actualizando por título " . $e->getMessage();
        }
    }



    //Mostrar todos
    public static function mostrarTodos(): array|string
    {
        $pdo = new Conexion();

        try {
            $query = $pdo->prepare("Select * from tema");
            $query->execute();
            $arrayTemas = $query->fetchAll();
            return $arrayTemas;

        } catch (PDOException $e) {
            return "Erro obtendo todos " . $e->getMessage();
        }
    }
}