<?php

$con=mysqli_connect("db","root","root","folla1");
if($con){

$consulta="SELECT * from cliente where nome like '{$_GET['nome']}'";
echo $consulta;
$resultado=mysqli_query($con,$consulta);

while($fila=mysqli_fetch_array($resultado))
    {
    echo "<br>".$fila['nome']." ".$fila['apelido']."<br>";
        }
    }

?>