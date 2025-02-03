<?php
// Incluye el controlador necesario
require_once "../controlador/UsuariosController.php";
$controller = new UsuariosController();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id_usuario = $_POST["id_usuario"]; // Ahora el usuario lo ingresa manualmente
    $nombre = $_POST["nombre"];
    $apellidos = $_POST["apellidos"];
    $correo = $_POST["correo"];
    $edad = $_POST["edad"];

    // Llamar al método agregarusuario para agregar la primera parte
    $controller->agregarusuario($id_usuario, $nombre, $apellidos, $correo, $edad);

    // Redirigir según la edad
    if ($edad >= 18) {
        header("Location: alta_usuario2.php?id_usuario=" . urlencode($id_usuario));
    } else {
        header("Location: alta_usuario_menor.php?id_usuario=" . urlencode($id_usuario));
    }
    exit();
}
?>

<!-- Formulario de alta del usuario (primera parte) -->
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alta de Usuario</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container mt-5">
        <div class="card shadow-sm">
            <div class="card-header bg-primary text-white">
                <h2 class="text-center m-0">Nuevo Usuario</h2>
            </div>
            <div class="card-body">
                <form method="POST">
                    <div class="mb-3">
                    <label for="id_usuario" class="form-label">DNI del Usuario <strong>sin letra</strong></label>
                    <input type="text" class="form-control" id="id_usuario" name="id_usuario" required maxlength="8" pattern="^\d{8}$" title="Introduzca solo los números del DNI" />                    </div>
                    <div class="mb-3">
                        <label for="nombre" class="form-label">Nombre</label>
                        <input type="text" class="form-control" id="nombre" name="nombre" required>
                    </div>
                    <div class="mb-3">
                        <label for="apellidos" class="form-label">Apellidos</label>
                        <input type="text" class="form-control" id="apellidos" name="apellidos" required>
                    </div>
                    <div class="mb-3">
                        <label for="correo" class="form-label">Correo Electrónico</label>
                        <input type="email" class="form-control" id="correo" name="correo" required>
                    </div>
                    <div class="mb-3">
                        <label for="edad" class="form-label">Edad</label>
                        <input type="number" class="form-control" id="edad" name="edad" required>
                    </div>
                    <button type="submit" class="btn btn-primary w-100">Registrar Usuario</button>
                </form>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
