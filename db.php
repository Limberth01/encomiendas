<?php
$servidor = "localhost";
$usuario_db = "root";
$contraseña_db = "";
$nombre_bd = "reg_encomiendas";

$conexion = new mysqli($servidor, $usuario_db, $contraseña_db, $nombre_bd);

if ($conexion->connect_error) {
    die("Conexión fallida: " . $conexion->connect_error);
}
?>
