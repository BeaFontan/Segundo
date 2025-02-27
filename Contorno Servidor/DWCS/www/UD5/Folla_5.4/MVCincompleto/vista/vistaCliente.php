<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style type="text/css">
        td,th {border:solid 1px black; }
        table { border-collapse: collapse;}
    </style>
</head>

<body>
    
    <?php 

    function mostraFormularioInicio(): void 
    {
        echo "<form action='ClienteControlador.php' method='GET'>
                <input type='submit' name='todos' value='Mostrar todos'>
            </form>";
    }

    function crarFormulario()
    {
        echo "<form action=' method='post'>
                    <input type='text' name='nome' placeholder='Nome'></br>
                    <input type='text' name='apelidos' placeholder='Apelidos'></br>
                    <input type='text' name='email' placeholder='Email'></br>
                    <button type='submit' name='btnAgregar'>Agregar</button>
                </form>";
    }

    function mostraTaboaCliente($array): void 
    {
        echo "<table border='1'>
                <tr>
                    <th>Nome</th>
                    <th>Apelidos</th>
                    <th>Email</th>
                    <th>Acción</th>
                </tr>";
        foreach ($array as $value) {
            echo "<tr>
                    <td>{$value['nome']}</td>
                    <td>{$value['apelidos']}</td>
                    <td>{$value['email']}</td>
                    <form method='ClienteControlador.php'>
                    <td><button type='submit' name='btnEliminar' value='{$value['nome']}'>Eliminar</button></td>
                    </form>
                    
                </tr>";
        }
        echo "</table>";
    }
    ?>
    

    
</body>
</html>


