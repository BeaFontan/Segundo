<?php

declare(strict_types=1);

require_once "Conexion.php";
require_once "Tema.php";

class TemaModelo extends Tema
{
    public function __construct(string $titulo, string $autor, int $ano, int $duracion, string $imaxe)
    {
        parent::__construct($titulo, $autor, $ano, $duracion, $imaxe);
    }


    //Buscar por título
    public function buscarTitulo(): array|string
    {
        $pdo = new Conexion();

        try {
            $query = $pdo->prepare("Select * from tema where Titulo like LOWER(?)");
            $query->execute([$this->titulo]);
            return $query->fetchAll();

        } catch (PDOException $e) {
            die ("Erro buscando por título" . $e->getMessage());
        }
    }



    //Insetar
    public function insertar(): string
    {
        $pdo = new Conexion();

        try {
            $query = $pdo->prepare("INSERT INTO `tema`(`Titulo`, `Autor`, `Ano`, `Duracion`, `Imaxe`) VALUES (?,?,?,?,?)");
            $query->execute([$this->titulo, $this->autor, $this->ano, $this->duracion, $this->imaxe]);
            return 'Insercción realizada';

        } catch (PDOException $e) {
            return "Erro ao insertar" . $e->getMessage();
        }
    }



    //Eliminar

    public function eliminar(): string
    {
        $pdo = new Conexion();

        try {
            $query = $pdo->prepare("DELETE FROM `tema` WHERE Titulo like ?");
            $query->execute([$this->titulo]);
            return 'Tema eliminado';

        } catch (PDOException $e) {
            return "Erro ao eliminar" . $e->getMessage();
        }
    }



    //Editar
    public function editar(string $tituloEditar): string
    {
        $pdo = new Conexion();

        try {
            $query = $pdo->prepare("UPDATE `tema` SET `Titulo`=?,`Autor`=?,`Ano`=?,`Duracion`=?,`Imaxe`=? WHERE Titulo like ?");
            $query->execute([$this->titulo, $this->autor, $this->ano, $this->duracion, $this->imaxe, $tituloEditar]);
            return 'Actualización realizada';

        } catch (PDOException $e) {
            return "Erro ao editar" . $e->getMessage();
        }
    }



    //Mostrar todos
    public static function mostrarTodos(): array|string
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