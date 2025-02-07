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
    <br/>
    <?php
        $datos = array("nome" => $_GET["textName"], "constrasinal" => $_GET["textPassword"]);

        $_SESSION["datos"] = $datos;

    ?>
    <h2>Estou na páxina 1b!! </h2>

    <a href="sesion1a.php">Ir a sesion1a</a>
    
    <br>


</body>
</html>