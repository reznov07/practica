<?php
    include 'includes/funciones/conectarDB.php';
    $id = $_GET['id'];
    //Insertamos los datos con lo que conseguimos con el método POST
    $sql = "DELETE FROM practicas WHERE id = '$id'";

    $resultado = mysqli_query($DB, $sql);
    if (!$resultado) {
        echo "No se ha podido insertar los valores";
    } else {
        header("Location: administrar.php");
    }
?>