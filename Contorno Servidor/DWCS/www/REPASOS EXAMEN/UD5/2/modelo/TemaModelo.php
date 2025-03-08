<?php

declare(strict_types=1);

require_once "Tema.php";
require_once "Conexion.php";

class TemaModelo extends Tema{

    public function __construct(string $titulo, string $autor, int $ano, int $duracion, string $imaxe)
    {
        parent::__construct($titulo, $autor, $ano, $duracion, $imaxe);
    }


    //Buscar por título
    public function buscarPorTitulo(): array
    {
        $pdo = new Conexion();

        try {
            $query = $pdo->prepare("SELECT * FROM `tema` WHERE Titulo like LOWER(?)");
            $query->execute([$this->titulo]);
            $arrayTemas = $query->fetchAll();

        } catch (PDOException $e) {
            die("Erro buscando por título" . $e->getMessage());
        }

        return $arrayTemas;
    }



    //Agregar tema
    public function agregar(): string
    {
        $pdo = new Conexion();

        try {
            $query = $pdo->prepare("INSERT INTO `tema`(`Titulo`, `Autor`, `Ano`, `Duracion`, `Imaxe`) VALUES (?,?,?,?,?)");
            $query->execute([$this->titulo, $this->autor, $this->ano, $this->duracion, $this->imaxe]);
            return "Tema agregado correctamente";

        } catch (PDOException $e) {
            die("Erro insertando tema" . $e->getMessage());
        }
    }

    

    //Eliminar tema
    public function borrarTema(): string
    {
        $pdo = new Conexion();

        try {
            $query = $pdo->prepare("DELETE FROM `tema` WHERE Titulo like ?");
            $query->execute([$this->titulo]);
            return "Tema eliminado correctamente";

        } catch (PDOException $e) {
            die("Erro borrando tema" . $e->getMessage());
        }
    }



    //Actualizar tema
    public function actualizarTema(string $temaAActulizar): string
    {
        $pdo = new Conexion();

        try {
            $query = $pdo->prepare("UPDATE `tema` SET `Titulo`=?,`Autor`=?,`Ano`=?,`Duracion`=?,`Imaxe`=? WHERE Titulo like ?");
            $query->execute([$this->titulo, $this->autor, $this->ano, $this->duracion, $this->imaxe, $temaAActulizar]);
            return "Tema actualizado correctamente";

        } catch (PDOException $e) {
            die("Erro modificando tema" . $e->getMessage());
        }
    }



    //Mostrar todos
    public static function mostrarTodos(): array
    {
        $pdo = new Conexion();

        try {
            $query = $pdo->query("Select * from tema");
            $query->execute();
            $arrayTemas = $query->fetchAll();

        } catch (PDOException $e) {
            die("Erro en mostrar Todos" . $e->getMessage());
        }

        return $arrayTemas;
    }
}

