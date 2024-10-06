<?php
session_start();
require 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre_usuario = $_POST['nombre_usuario'];
    $contraseña = $_POST['contraseña'];

    $consulta_sql = "SELECT * FROM usuarios WHERE nombre_usuario = ?";
    $sentencia = $conexion->prepare($consulta_sql);

    if (!$sentencia) {
        die("Error en la consulta SQL: " . $conexion->error);
    }

    $sentencia->bind_param("s", $nombre_usuario);
    $sentencia->execute();
    $resultado = $sentencia->get_result();

    if ($resultado->num_rows == 1) {
        $usuario = $resultado->fetch_assoc();
        if (password_verify($contraseña, $usuario['contraseña'])) {
            $_SESSION['nombre_usuario'] = $nombre_usuario;
            header("Location: menu.php");
            exit();
        } else {
            $error = "Contraseña incorrecta.";
        }
    } else {
        $error = "Nombre de usuario no válido.";
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Encomiendas</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    
    <style>
        body {
            background-image: url('fondo-login.jpeg'); 
            background-size: cover; 
            background-position: center center; 
            background-repeat: no-repeat; 
            height: 100vh;
        }

        .login-form {
            background-color: rgba(255, 255, 255, 0.8);
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        }
    </style>
</head>
<body>
    <div class="container d-flex justify-content-center align-items-center" style="height: 100vh;">
        <div class="login-form col-md-4">
            <h2 class="text-center">Inicio de Sesión</h2>
            <form method="POST" action="login.php">
                <div class="form-group">
                    <label for="nombre_usuario">Usuario:</label>
                    <input type="text" name="nombre_usuario" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="contraseña">Contraseña:</label>
                    <input type="password" name="contraseña" class="form-control" required>
                </div>
                <?php if (isset($error)) { echo '<div class="alert alert-danger">' . $error . '</div>'; } ?>
                <button type="submit" class="btn btn-primary btn-block">Ingresar</button>
            </form>
        </div>
    </div>
</body>
</html>
