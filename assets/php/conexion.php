<?php

define("host", 'localhost');
//id21335425_eduardo
define("user", 'root');
//06092001Ce-
define("pass", "");
//id21335425_notas
define("db", "notas");

$conec = mysqli_connect(host, user, pass, db);

if(!$conec){
    echo 'Error: ' . mysqli_error();
}else{
    echo 'conectado';
}

?>
