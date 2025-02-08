<?php
try {
    $pdo = new PDO("mysql:host=dbXdebug;dbname=tarefa4.7", "tarefa", "Tarefa4.7");
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    //Crear admin se non existe
        try {

            $query = $pdo->prepare("Select nome from usuarios where nome like ?");
            $query->execute(["admin"]);
            $admin = $query->fetch();

            if (empty($admin)) {
                try {
                    $query = $pdo->prepare("INSERT INTO `usuarios`(`email`, `contrasinal`, `rol`, `nome`, `apelido1`) VALUES (?,?,?,?,?)");
                    $query->execute(["admin@admin.com", password_hash("abc123.", PASSWORD_DEFAULT), "administrador", "admin", "admin"]);
            
                } catch (PDOException $e) {
                    $mensaxe = "Erro creando admin" . $e->getMessage();
                    header("location:login.php?mensaxe=$mensaxe");
                    exit;
                }
            }

        } catch (PDOException $e) {
            $mensaxe = "Erro buscando admin" . $e->getMessage();
            header("location:login.php?mensaxe=$mensaxe");
            exit;
        }

} catch (PDOException $e) {
    echo "Erro na conexión" . $e->getMessage();
}
?>