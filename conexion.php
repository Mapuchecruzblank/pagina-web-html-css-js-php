<?php
$servidor = "localhost";
$usuario = "root";
$clave = "";
$baseDatos = "labuenamesa_db";

// declaramos la variable exactamente como la pide el panel
$conexionBd = mysqli_connect($servidor, $usuario, $clave, $baseDatos);

if (!$conexionBd) {
    die("Falló la conexión a MySQL: " . mysqli_connect_error());
}

// Esta línea extra es una buena práctica para que las tildes y las 'ñ' no se rompan
mysqli_set_charset($conexionBd, "utf8mb4");
?>