<?php
    session_start();

    if (isset($_POST["botonLogin"])) {

        $usuarioLogin = $_POST["textUsuario"];
        $contrasianlLogin = $_POST["textContrasinal"];

        $datos = array("nome" => $usuarioLogin, "constrasinal" => $contrasianlLogin);

        $_SESSION["datos"] = $datos;
       
        //Esta conexión la hago aquí aparte para controlar los boleanos
        try {
            $pdo = new PDO("mysql:host=dbXDebug;dbname=Empresa;charset=utf8", $usuarioLogin, $contrasianlLogin);
            
            $conexion = true;
    
        } catch (PDOException $e) {
            $conexion = false;
        }

        if ($conexion) {
            header("location:datos.php");
            
        }else{
            echo "Erro nas credenciales, introdúceas de novo";
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="login.php" method="POST">
        <input type="text" name="textUsuario" placeholder = "Usuario"></br>
        <input type="text" name="textContrasinal" placeholder = "Contrasinal"></br>

        <button type="submit" name="botonLogin">Login</button>

    </form>
</body>
</html>