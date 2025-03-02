<?php
 
    if (!isset($_SESSION["datos"])) {
        header("location:login.php");
    }


    try {
        $pdo = new PDO("mysql:host=dbXDebug;dbname=Empresa;charset=utf8", $_SESSION["datos"]["nome"], $_SESSION["datos"]["constrasinal"]);
        $pdo->setAttribute(PDO::ERRMODE_EXCEPTION, PDO::ATTR_ERRMODE);
        //echo "Conexión realizada";
    
    } catch (PDOException $e) {
        $mensaxe= "Erro na conexión " . $e->getMessage();
    }


?>