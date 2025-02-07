<?php
    session_start();
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" />
<title></title>
</head>
<body>
    <form action="sesion1b.php" method="GET">
        <input type="text" name="textName" placeholder = "Introduce o usuario"></br></br>

        <input type="text" name="textPassword" placeholder = "Introduce o contrasinal"></br></br>

        <button type="submit" name="boton" value="login">Login</button></br></br></br>
    </form>

    <?php
          
        $datos = $_SESSION["datos"];
        
        echo "Nome: " . $datos["nome"] . "<br>";
        echo "Contrasinal: " . $datos["constrasinal"] . "<br>";
    ?>

</body>
</html>


