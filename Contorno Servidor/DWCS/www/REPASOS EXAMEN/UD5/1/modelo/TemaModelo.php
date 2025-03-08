<?php

declare(strict_types=1);

require_once 'conexion.php';
require_once 'Tema.php';

class TemaModelo extends Tema
{

    public function __construct(string $titulo, string $autor, int $ano, int $duracion, string $imaxe)
    {
        parent::__construct($titulo, $autor, $ano, $duracion, $imaxe);
    }

    public function mostrarBuscarTitulo(): array
    {
        $pdo = new Conexion();

        try {
            $query = $pdo->prepare("select * from tema where Titulo like LOWER(?)");
            $query->execute([$this->titulo]);
            $arrayTemas = $query->fetchAll();

        } catch (PDOException $e) {
            die("Erro buscando por título" . $e->getMessage());
        }

        return $arrayTemas;
    }



    public function insertarTema(): string
    {
        $pdo = new Conexion();

        try {
           $query = $pdo->prepare("INSERT INTO `tema`(`Titulo`, `Autor`, `Ano`, `Duracion`, `Imaxe`) VALUES (?,?,?,?,?)");
           $query->execute([$this->titulo, $this->autor, $this->ano, $this->duracion, $this->imaxe]);
           $mensaxe = "Tema insertado.";

        } catch (PDOException $e) {
            die("Erro insertando" . $e->getMessage());
        }

        return $mensaxe;
    }



    public function eliminarTema(): string
    {
        $pdo = new Conexion();

        try {
           $query = $pdo->prepare("DELETE FROM `tema` WHERE Titulo like ?");
           $query->execute([$this->titulo]);
           $mensaxe = "Tema eliminado.";

        } catch (PDOException $e) {
            die("Erro eliminando" . $e->getMessage());
        }

        return $mensaxe;
    }



    public function actualizarTema(string $temaEditar): string
    {
        $pdo = new Conexion();

        try {
           $query = $pdo->prepare("UPDATE `tema` SET `Titulo`=?,`Autor`=?,`Ano`=?,`Duracion`=?,`Imaxe`=? WHERE Titulo like ?");
           $query->execute([$this->titulo, $this->autor, $this->ano, $this->duracion, $this->imaxe, $temaEditar]);
           $mensaxe = "Tema actualizado.";

        } catch (PDOException $e) {
            die("Erro actualizando" . $e->getMessage());
        }

        return $mensaxe;
    }



    public static function mostrarTodos(): array
    {
        $pdo = new Conexion();

        try {
            $query = $pdo->prepare("Select * from tema");
            $query->execute();
            $arrayTemas = $query->fetchAll();

        } catch (PDOException $e) {
            echo "Erro en mostrar Todos" . $e->getMessage();
        }

        return $arrayTemas;
    }

    // public static function mostrarTodos(): array
    // {
    //     $pdo = new Conexion();
    //     $temas = [];

    //     try {
    //         $query = $pdo->prepare("SELECT * FROM tema");
    //         $query->execute();
    //         $resultados = $query->fetchAll(PDO::FETCH_ASSOC);

    //         // Convertimos cada resultado en un objeto Tema
    //         foreach ($resultados as $fila) {
    //             $temas[] = new Tema(
    //                 $fila['Titulo'],
    //                 $fila['Autor'],
    //                 (int)$fila['Ano'],
    //                 (int)$fila['Duracion'],
    //                 $fila['Imaxe']
    //             );
    //         }
    //     } catch (PDOException $e) {
    //         echo "Erro en mostrar Todos: " . $e->getMessage();
    //     }

    //     return $temas;
    // }

}

