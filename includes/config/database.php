<?php

function conectarDB() : mysqli {
    $db = mysqli_connect('localhost','root','','bienesraices_crud');
    if(!$db){
        echo "error no se pudo conectar";
        exit;
    } 
    return $db;
}