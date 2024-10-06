<?php
session_start();
if (!isset($_SESSION['nombre_usuario'])) {
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menú - Encomiendas</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

    <style>
        body {
            background-image: url('fondo-menu.png'); 
            background-size: cover; 
            background-position: center center; 
            height: 100vh; 
        }

        .list-group-item{
            background-color: rgba(255, 255, 255, 0.8); 
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1); 
        }

    </style>

</head>
<body>
    <div class="container">
        <h2 class="text-center mt-5">Menú Principal</h2>
        <div class="list-group">
            <a href="registrar_encomienda.php" class="list-group-item list-group-item-action">Registrar Encomienda</a>
            <a href="registrar_usuario.php" class="list-group-item list-group-item-action">Registrar Usuario</a>
            <a href="logout.php" class="list-group-item list-group-item-action">Cerrar Sesión</a>
        </div>
    </div>
</body>
</html>
