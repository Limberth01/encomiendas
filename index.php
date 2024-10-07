<?php
session_start();

if (isset($_SESSION['nombre_usuario'])) {
    
    header("Location: menu.php");
    exit();
} else {
    die("Conexión fallida: " . $conexion->connect_error);
}
