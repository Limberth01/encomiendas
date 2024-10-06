<?php
session_start();
require 'db.php';
if (!isset($_SESSION['nombre_usuario'])) {
    header("Location: login.php");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre_remitente = $_POST['nombre_remitente'];
    $nombre_destinatario = $_POST['nombre_destinatario'];
    $descripcion_paquete = $_POST['descripcion_paquete'];
    $fecha_entrega = $_POST['fecha_entrega'];

    $sql_insertar = "INSERT INTO encomiendas (nombre_remitente, nombre_destinatario, descripcion_paquete, fecha_entrega) 
                 VALUES (?, ?, ?, ?)";
    $sentencia = $conexion->prepare($sql_insertar);
    $sentencia->bind_param("ssss", $nombre_remitente, $nombre_destinatario, $descripcion_paquete, $fecha_entrega);

    if ($sentencia->execute()) {
        $exito = "Paquete registrado exitosamente.";
    } else {
        $error = "Error al registrar el paquete.";
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrar Encomienda</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

    <style>
        body {
            background-image: url('fondo-menu.png');
            background-size: cover; 
            background-position: center center; 
            height: 100vh; 
        }

        .container{
            background-color: rgba(255, 255, 255, 0.8); 
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        }

    </style>

</head>
<body>
    <div class="container">
        <h2 class="text-center mt-5">Registrar Encomienda</h2>
        <form method="POST" action="registrar_encomienda.php">
            <div class="form-group">
                <label for="nombre_remitente">Nombre del Remitente:</label>
                <input type="text" name="nombre_remitente" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="nombre_destinatario">Nombre del Destinatario:</label>
                <input type="text" name="nombre_destinatario" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="descripcion_paquete">Descripción del Paquete:</label>
                <textarea name="descripcion_paquete" class="form-control" required></textarea>
            </div>
            <div class="form-group">
                <label for="fecha_entrega">Fecha de Entrega:</label>
                <input type="date" name="fecha_entrega" class="form-control" required>
            </div>
            <?php if (isset($exito)) { echo '<div class="alert alert-success">' . $exito . '</div>'; } ?>
            <?php if (isset($error)) { echo '<div class="alert alert-danger">' . $error . '</div>'; } ?>
            <button type="submit" class="btn btn-primary btn-block">Registrar</button>
            <div>
            <a href="menu.php" class="btn-custom">Retroceder</a>
            </div>
        </form>
    </div>
</body>
</html>
