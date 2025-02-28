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
            </form></br>";
    }

    function crarFormulario(): void
    {
        echo "<form action='ClienteControlador.php' method='post'>
                    <input type='text' name='nome' placeholder='Nome'></br>
                    <input type='text' name='apelidos' placeholder='Apelidos'></br>
                    <input type='text' name='email' placeholder='Email'></br>
                    <button type='submit' name='btnAgregar'>Agregar</button>
                </form></br>";
    }

    function editarFormulario(): void
    {
        echo "<form action='ClienteControlador.php' method='post'>
                    <input type='text' name='nomeEditar' placeholder='Nome do rexistro a editar'></br>
                    <input type='text' name='novoNome' placeholder='Novo nome'></br>
                    <input type='text' name='novosApelidos' placeholder='Novos apelidos'></br>
                    <input type='text' name='NovoEmail' placeholder='Novo Email'></br>
                    <button type='submit' name='btnEditar'>Editar</button>
                </form></br>";
    }


    function borrarPorEmail(): void
    {
        echo "<form action='ClienteControlador.php' method='POST'>
                <input type='text' name='txtEliminarEmail' placeholder='Email para eliminar o usuario'></br>
                <button type='submit' name='btnEliminarEmail'>Eliminar</button>
            </form></br>";
    }

    function buscarPorEmail(): void
    {
        echo "<form action='ClienteControlador.php' method='POST'>
                <input type='text' name='txtBuscarEmail' placeholder='Email a buscar'></br>
                <button type='submit' name='btnBuscarEmail'>Buscar por email</button>
            </form></br>";
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


