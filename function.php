<?php

function condb() {
    try {
        $conexion = new PDO('mysql:host=localhost;dbname=prueba', 'root', '');
        return $conexion;
    } catch (PDOException $e) {
        return $e->getMessage();
    }
}


function cleardatos($datos) {
    $datos = stripslashes($datos);
    $datos = trim($datos);
    $datos = htmlspecialchars($datos);

    return $datos;
}