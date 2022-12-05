<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbName = "practicasphp";

//Creamos la conexion
$DB = new mysqli($servername, $username, $password, $dbName);

//verificamos la conexion
/*
if ($DB->connect_error){
    die("Conexion fallida: " . $DB->connect_error);
}else{
    echo "Conexion establecida...";
}*/