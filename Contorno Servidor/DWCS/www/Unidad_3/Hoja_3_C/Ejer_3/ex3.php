<!DOCTYPE html>
<html>
<head>
    <title>Conexión a bases de datos</title>
    <meta charset=”UTF8”>
</head>
<body>
    <?php
    
    //AGORA CREAMOS UN OBXECTO DA CLASE mysqli
    // $mysqli= new mysqli('dbXDebug', 'root', 'root', 'hoja_3');

    // //Se estou co docker de clase
    // if ($mysqli->connect_error) {
    //     die('Erro de Conexión (' . $mysqli->connect_errno . ') '. $mysqli->connect_error);
    // } else {
    //     $mysqli->set_charset("utf8");

    //     $resultado=$mysqli->query("SELECT nome, apelido, id from cliente");

    //     if ($resultado != FALSE) {
    //         while($fila=$resultado->fetch_array())

    //         echo $fila["id"] . " " . $fila["nome"] . " " . $fila["apelido"] . "<br>";
    //     }
    // }
    
    // $mysqli->close();
    

    if (isset($_GET["botonBuscar"])) {
        
        $nome = $_GET["campoNome"];
        $apelido =$_GET["campoApelido"];

        $conexion = new mysqli('dbXDebug', 'root', 'root', 'hoja_3');

        if ($conexion->connect_error) {
            die('Erro de Conexión (' . $mysqli->connect_errno . ') '. $mysqli->connect_error);
        } else {
            $conexion->set_charset("utf8");

            $query = $conexion->prepare("SELECT nome, apelido, id FROM cliente WHERE nome like ? and apelido like ? ");
            
            $query->bind_param('ss', $nome, $apelido);

            $query->execute();

            $resultado = $query->get_result();

                if ($resultado->num_rows > 0) {//Comprobar las filas porque aunque no haya ningún resultado, si hay un resultado vacio

                    while($fila=$resultado->fetch_array()){    

                        echo $fila["id"]," ",$fila["nome"]," ",$fila["apelido"],"<br>";
                    }
                } else {
                    echo "Non se atoparon resultados";
                }
        }

        $conexion->close();
        $query->close();
    }

    ?>
</body>
</html>
