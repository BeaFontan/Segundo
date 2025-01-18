<?php
//SE NON ESTÁ AUTENTICADO PEDIMOS CREDENCIAIS
if (!isset($_SERVER['PHP_AUTH_USER'])) {
    header("WWW-Authenticate: Basic realm='Contido restrinxido'");
    header("HTTP/1.0 401 Unauthorized");
    die();
}

$host = "dbXDebug";
$db = "Usuarios";
$user = "root";
$pass = "root";
$dsn = "mysql:host=$host;dbname=$db;charset=utf8mb4";

try {
    $conPDO = new PDO($dsn, $user, $pass);
    $conPDO->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $ex) {
    die("Erro na conexión mensaxe: " . $ex->getMessage());
}

// COMPROBAMOS SE EXISTE O USUARIO, E RECOLLEMOS O PASSWORD GARDADO NA BD
$consulta = "select pass from datos where nome=:nomeTecleado";
$stmt = $conPDO->prepare($consulta);

try {
    $stmt->execute(array('nomeTecleado' => $_SERVER['PHP_AUTH_USER']));
} catch (PDOException $ex) {
    $conPDO = null;
    die("Erro recuperando os datos da BD: " . $ex->getMessage());
}

$fila = $stmt->fetch();

if ($stmt->rowCount() == 1) //HAI UN USUARIO
    $contrasinalBD = $fila[0];
$passTecleado = $_SERVER['PHP_AUTH_PW'];

// COMPROBAMOS QUE O HASH GARDADO É COMPATIBLE CO TECLEADO.
//TEMOS QUE COMPROBAR ANTES QUE HAI ALGÚN USUARIO:
if ($stmt->rowCount() == 0 || !password_verify($passTecleado, $contrasinalBD)) {
    header("WWW-Authenticate: Basic realm='Contido restrinxido'");
    header("HTTP/1.0 401 Unauthorized");
    $stmt = null;
    $conProyecto = null;
    die();
}

$stmt = null;
$conPDO = null;
?>

<!DOCTYPE html>

<head>
    <title>Autenticación BD</title>
</head>

<body>
    <p>
        <?php
        echo "Benvido {$_SERVER['PHP_AUTH_USER']}, está vostede na área restrinxida";
        ?>
    </p>
</body>

</html>