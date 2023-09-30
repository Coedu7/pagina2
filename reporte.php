<?php
include_once('assets/php/conexion.php');

if(isset($_GET)){
    @$ID = $_GET['ID'];
    $query = "DELETE FROM alumnos WHERE cedula='$ID'";
    $rs    = mysqli_query($conec, $query) or die('Error: ' . mysqli_error($conec));
    
    $mensaje = ($rs) ? "" : "Registro Eliminado";
}

$query1 = "SELECT AVG(fisica) as 'Fisica', AVG(matematica) as 'Matematica', AVG(programacion) as 'Programacion' from alumnos";
$rs1 = mysqli_query($conec, $query1) or die('Error: ' . mysqli_error($conec));

$query2 = "SELECT sum(if (Fisica>=10,1,0)) as 'Fisica', sum(if (matematica>=10,1,0)) as 'Matematica', sum(if (programacion>=10,1,0)) as 'Programacion' FROM alumnos";
$rs2 = mysqli_query($conec, $query2) or die('Error: ' . mysqli_error($conec));

$query3 = "SELECT sum(if (Fisica<10,1,0)) as 'Fisica', sum(if (matematica<10,1,0)) as 'Matematica', sum(if (programacion<10,1,0)) as 'Programacion' FROM alumnos";
$rs3 = mysqli_query($conec, $query3) or die('Error: ' . mysqli_error($conec));

$query4 = "SELECT COUNT(cedula) as 'Aprobaron todas las materias' FROM alumnos where fisica>=10 && matematica>=10 && programacion>=10";
$rs4 = mysqli_query($conec, $query4) or die('Error: ' . mysqli_error($conec));

$query5 = "SELECT COUNT(cedula) as 'Aprobaron una materia' FROM alumnos where (fisica>9 && matematica<=9 && programacion<=9) || (fisica<=9 && matematica>9 && programacion<=9) || (fisica<=9 && matematica<=9 && programacion>9)";
$rs5 = mysqli_query($conec, $query5) or die('Error: ' . mysqli_error($conec));

$query6 = "SELECT COUNT(cedula) as 'Aprobaron una materia' FROM alumnos where (fisica>9 && matematica<=9 && programacion>9) || (fisica>9 && matematica>9 && programacion<=9) || (fisica<=9 && matematica>9 && programacion>9)";
$rs6 = mysqli_query($conec, $query6) or die('Error: ' . mysqli_error($conec));

$query7 = "SELECT max(fisica) as 'Fisica', max(matematica) as 'Matematica', max(programacion) as 'Programacion' FROM alumnos";
$rs7 = mysqli_query($conec, $query7) or die('Error: ' . mysqli_error($conec));


$query = "SELECT * FROM alumnos";
$rs  = mysqli_query($conec, $query) or die('Error: ' . mysqli_error($conec));

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
        td{text-align: center;}
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
    <div>
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

<table border="1">
    <thead>
            <tr>
                <th>Fisica</th>
                <th>Matematica</th>
                <th>Programacion</th>
            </tr>
        </thead>
        <tbody>
            <?php while($fila1 = mysqli_fetch_array($rs1)){  ?>
            <tr>
                <td><?php echo $fila1['Fisica']; ?></td>
                <td><?php echo $fila1['Matematica']; ?></td>
                <td><?php echo $fila1['Programacion']; ?></td>
            </tr>
            <?php } ?>
        </tbody>
    </table>

    <table border="1">
        <thead>
            <tr>
                <th>Fisica</th>
                <th>Matematica</th>
                <th>Programacion</th>
            </tr>
        </thead>
        <tbody>
            <?php while($fila2 = mysqli_fetch_array($rs2)){  ?>
            <tr>
                <td><?php echo $fila2['Fisica']; ?></td>
                <td><?php echo $fila2['Matematica']; ?></td>
                <td><?php echo $fila2['Programacion']; ?></td>
            </tr>
            <?php } ?>
        </tbody>
    </table>

    <table border="1">
        <thead>
            <tr>
                <th>Fisica</th>
                <th>Matematica</th>
                <th>Programacion</th>
            </tr>
        </thead>
        <tbody>
            <?php while($fila3 = mysqli_fetch_array($rs3)){  ?>
            <tr>
                <td><?php echo $fila3['Fisica']; ?></td>
                <td><?php echo $fila3['Matematica']; ?></td>
                <td><?php echo $fila3['Programacion']; ?></td>
            </tr>
            <?php } ?>
        </tbody>
    </table>

    <table border="1">
        <thead>
            <tr>
                <th>Alumnos que aprobaron todo</th>
            </tr>
        </thead>
        <tbody>
            <?php while($fila4 = mysqli_fetch_array($rs4)){  ?>
            <tr>
                <td><?php echo $fila4[0]; ?></td>
            </tr>
            <?php } ?>
        </tbody>
    </table>

    <table border="1">
        <thead>
            <tr>
                <th>Alumnos que aprobaron solamente una materia</th>
            </tr>
        </thead>
        <tbody>
            <?php while($fila5 = mysqli_fetch_array($rs5)){  ?>
            <tr>
                <td><?php echo $fila5[0]; ?></td>
            </tr>
            <?php } ?>
        </tbody>
    </table>

    <table border="1">
        <thead>
            <tr>
                <th>Alumnos que aprobaron 2 materias</th>
            </tr>
        </thead>
        <tbody>
            <?php while($fila6 = mysqli_fetch_array($rs6)){  ?>
            <tr>
                <td><?php echo $fila6[0]; ?></td>
            </tr>
            <?php } ?>
        </tbody>
    </table>

    <table border="1">
        <thead>
            <tr>
                <th>Fisica</th>
                <th>Matematica</th>
                <th>Programacion</th>
            </tr>
        </thead>
        <tbody>
            <?php while($fila7 = mysqli_fetch_array($rs7)){  ?>
            <tr>
                <td><?php echo $fila7['Fisica']; ?></td>
                <td><?php echo $fila7['Matematica']; ?></td>
                <td><?php echo $fila7['Programacion']; ?></td>
            </tr>
            <?php } ?>
        </tbody>
    </table>
    </div>


    </div>
    <a href="index.php">Indice</a>
    <a href="registro.php">Registro</a>
</body>
</html>