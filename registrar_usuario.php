<?php
require 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre_usuario = $_POST['nombre_usuario'];
    $contraseña = $_POST['contraseña'];

    $contraseña_cifrada = password_hash($contraseña, PASSWORD_DEFAULT);

    $consulta_insertar = "INSERT INTO usuarios (nombre_usuario, contraseña) VALUES (?, ?)";
    $sentencia = $conexion->prepare($consulta_insertar);
    $sentencia->bind_param("ss", $nombre_usuario, $contraseña_cifrada);

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
    <title>Registrar Usuario</title>
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
        <h2 class="text-center mt-5">Registrar Usuario</h2>
        <form method="POST" action="registrar_usuario.php">
            <div class="form-group">
                <label for="nombre_usuario">Nombre de Usuario:</label>
                <input type="text" name="nombre_usuario" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="contraseña">Contraseña:</label>
                <input type="password" name="contraseña" class="form-control" required>
            </div>
            <?php if (isset($exito)) { echo '<div class="alert alert-success">' . $exito . '</div>'; } ?>
            <?php if (isset($error)) { echo '<div class="alert alert-danger">' . $error . '</div>'; } ?>
            <button type="submit" class="btn btn-primary btn-block">Registrar</button>
            <a href="menu.php" class="btn-custom">Retroceder</a>
        </form>
    </div>
</body>
</html>
