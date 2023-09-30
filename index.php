<?php
include_once('assets/php/conexion.php');

if(isset($_GET)){
    @$ID = $_GET['ID'];
    $query = "DELETE FROM alumnos WHERE cedula='$ID'";
    $rs    = mysqli_query($conec, $query) or die('Error: ' . mysqli_error($conec));
    
    $mensaje = ($rs) ? "" : "Registro Eliminado";
}

$query = "SELECT * FROM alumnos";
$rs    = mysqli_query($conec, $query) or die('Error: ' . mysqli_error($conec));

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
    <h2>Registro de Personas</h2>
    <br>
    <?php 
        if(isset($mensaje) && !empty($mensaje)){
            echo $mensaje;
        }
    ?>
    <br><br>
    <div class="container">
    <table border="1">
        <thead>
            <tr>
                <th>Cedula</th>
                <th>Nombre</th>
                <th>Fisica</th>
                <th>Matematica</th>
                <th>Programación</th>
            </tr>
        </thead>
        <tbody>
            <?php while($fila = mysqli_fetch_array($rs)){  ?>
            <tr>
                <td><?php echo $fila['cedula']; ?></td>
                <td><?php echo $fila['nombre']; ?></td>
                <td><?php echo $fila['fisica']; ?></td>
                <td><?php echo $fila['matematica']; ?></td>
                <td><?php echo $fila['programacion']; ?></td>

            </tr>
            <?php } ?>
        </tbody>
    </table>
    </div>
    <br>
    <a href="reporte.php">Reportes</a>
    <a href="registro.php">Registro</a>
</body>
</html>