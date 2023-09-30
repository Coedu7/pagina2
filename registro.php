<?php

include_once('assets/php/registro.php');

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        body{
            background-color: burlywood;
        }
        .container{
            margin: auto;
            margin-top: 50px;
            width: 50%;
            border: 3px solid green;
            padding: 10px;
            background-color: bisque;
        }
        table{margin: auto;}
    </style>
    <title>Document</title>
</head>
<body>
    <h3>Registro</h3>
<form action="<?php $_SERVER['PHP_SELF'] ?>" method="post">

    <label for="idCedula">Cedula</label><br>
    <input type="text" name="txtCedula" id="idCedula"><br>
    <label for="idNombre">Nombre</label><br>
    <input type="text" name="txtNombre" id="idNombre"><br>
    <label for="idFisica">Nota de Fisica</label><br>
    <input type="number" name="txtFisica" id="idFisica"><br>
    <label for="idMatematica">Nota de Matematica</label><br>
    <input type="number" name="txtMatematica" id="idMatematica"><br>
    <label for="idProgramacion">Nota de Programación</label><br>
    <input type="number" name="txtProgramacion" id="idProgramacion"><br><br>

    <input type="submit" value="Registro" name="btn">

</form>
<br>
<a href="index.php">Regresar</a>

</body>
</html>