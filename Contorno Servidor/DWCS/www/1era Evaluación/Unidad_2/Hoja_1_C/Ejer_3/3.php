<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="estilo.css">
</head>
<body>
<?php 

$n=1;
for ($i=0; $i <= 50; $i++) { 

if ($i %2!=0) {
   echo "<h2>", "O ", $n ,"º impar é " , $i , "</h2>" , "<br>";
   $n+=1;
}


}
?>
</body>
</html>