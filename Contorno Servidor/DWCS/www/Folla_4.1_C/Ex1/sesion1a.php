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
    <!-- DEFINIMOS UNHA VARIABLE -->

    <?php
        $_SESSION['usuario'] = "Xan";
    ?>

    <h2>Estou na páxina 1a!! </h2>
    
    <a href="sesion1b.php">Ir a sesion1b </a>

</body>
</html>


