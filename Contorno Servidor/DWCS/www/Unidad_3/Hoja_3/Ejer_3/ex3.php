<!DOCTYPE html>
<html>
<head>
    <title>Conexión a bases de datos</title>
    <meta charset=”UTF8”>
</head>
<body>
    <?php
    /*
    //AGORA CREAMOS UN OBXECTO DA CLASE mysqli
    $mysqli= new mysqli('dbXDebug', 'root', 'root', 'proba');

    //Se estou co docker de clase
    if ($mysqli->connect_error) {
        die('Erro de Conexión (' . $mysqli->connect_errno . ') '. $mysqli->connect_error);
    } else {
        $mysqli->set_charset("utf8");

        $resultado=$mysqli->query("SELECT codCliente,nome,apelido from cliente");

        if ($resultado != FALSE) {
            while($fila=$resultado->fetch_array())

            echo $fila["codCliente"]," ",$fila["nome"]," ",$fila["apelido"],"<br>";
        }
    }
    
    $mysqli->close();
    */

    if (isset($_GET["botonBuscar"])) {
        
        $nome = $_GET["campoNome"];
        $apelido =$_GET["campoApelido"];

        $conexion = new mysqli('dbXDebug', 'root', 'root', 'proba');

        if ($conexion->connect_error) {
            die('Erro de Conexión (' . $mysqli->connect_errno . ') '. $mysqli->connect_error);
        } else {
            $conexion->set_charset("utf8");

            $query = $conexion->prepare("SELECT codCliente, nome, apelido FROM cliente WHERE nome like ? and apelido like ? ");
            
            $query->bind_param('ss', $nome, $apelido);

            $query->execute();

            $resultado = $query->get_result();

                if ($resultado) {

                    while($fila=$resultado->fetch_array()){    

                        echo $fila["codCliente"]," ",$fila["nome"]," ",$fila["apelido"],"<br>";
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
