<?php
include_once('conexion.php');

if(isset($_POST['btn']) && $_POST['btn'] == 'Registro'){

    $cedula = $_POST['txtCedula'];
    $nombre = $_POST['txtNombre'];    
    $fisica = $_POST['txtFisica'];
    $matematica = $_POST['txtMatematica'];
    $programacion = $_POST['txtProgramacion'];

    $query = "INSERT INTO alumnos(cedula, nombre, fisica, matematica, programacion) VALUES('$cedula', '$nombre', '$fisica', '$matematica', '$programacion')";

    $rs = mysqli_query($conec, $query) or die('Error: ' . mysqli_error($conec)); //recordset ($rs)

    if($rs){
        echo 'Registro Agregado';
        header("Location: ./index.php");
    }else{
        echo 'Error No se agrego el registro';
    }
}

// if($_GET){
//     print_r($_GET);
//     $ID = $_GET['ID'];
//     $query = "SELECT * FROM alumnos WHERE cedula='$ID'";
//     $rs    = mysqli_query($conec, $query) or die('Error: ' . mysqli_error($conec));
//     $fila  = mysqli_fetch_array($rs);
// }

// if(isset($_POST['btn']) && $_POST['btn'] == 'Actualizar'){

//     $id    = $_POST['txtID'];
//     $nombre = $_POST['txtNombre'];
//     $apellido = $_POST['txtApellido'];
//     $correo = $_POST['txtCorreo'];
//     $fecha = $_POST['txtFecha'];
//     $fechaTime = strtotime($_POST['txtFecha']);

//     $query = "UPDATE personas SET nombre='$nombre', apellido='$apellido', correo='$correo', fecha='$fecha', fechaTime='$fechaTime' WHERE id='$id'";

//     $rs = mysqli_query($conec, $query) or die('Error: ' . mysqli_error($conec)); //

//     if($rs){
//         echo 'Registro Actualizado';
//         header("Location: ./index.php");
//     }else{
//         echo 'Error No se actualizó el registro';
//     }
// }
?>