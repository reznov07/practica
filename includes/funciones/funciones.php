<?php

define('CARPETA_IMAGENES', __DIR__ . '/../../imagenes/');


function debuguear($variable){
    echo '<pre>';
    var_dump($variable);
    echo '</pre>';
    exit;
}

function subirImagen($imagePath,$imageName=""){
    
    
    if( is_null($imagePath) || $imagePath == "" ){
        return $imageName;
    }

    if( isset($imageName) && $imageName != "" ){
        $path = CARPETA_IMAGENES . "/" . $imageName;
        if(file_exists($path)){
            unlink($path);
        }
    }

    // Generear un nombre unico
    $imageName = md5( uniqid( rand(), true ) ) . ".jpg" ;
    

    // Comprobar si existe la imagen que se esta subiendo 
    if(isset($imagePath)){
        
        // Verificar si es tiene tamaño
        $check = getimagesize($imagePath);

        if($check !== false){
            // subir imagen
            move_uploaded_file($imagePath, CARPETA_IMAGENES . "/" . $imageName);
        }

    }

    return $imageName;
}

