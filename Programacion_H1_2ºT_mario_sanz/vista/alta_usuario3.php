<?php
// Incluir el controlador correspondiente
require_once "../controlador/UsuariosController.php";
$controller = new UsuariosController();

// Obtener los detalles del usuario seleccionado para mostrarlo
if (isset($_GET["id_usuario"]) && !empty($_GET["id_usuario"])) {
    $id_usuario = $_GET["id_usuario"];
    $usuario = $controller->obtenerusuarioPorId($id_usuario);
} 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener los datos del formulario
    $nombre_paquete = $_POST["nombre_paquete"];
    $id_usuario = $_POST["id_usuario"]; // Se obtiene el ID del input hidden

    // Llamar al método agregarusuario3 para agregar el paquete adicional
    $controller->agregarusuario3($nombre_paquete, $id_usuario);

    // Redirigir al usuario a la lista de usuarios
    header("Location: lista_usuarios.php");
    exit();
}
?>

<!-- Formulario HTML para agregar Paquete Adicional -->
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agregar Paquete Adicional</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container mt-5">
        <div class="card shadow-sm">
            <div class="card-header bg-primary text-white">
                <h2 class="text-center m-0">Agregar Paquete Adicional</h2>
            </div>
            <div class="card-body">

                <!-- Formulario para seleccionar un paquete adicional -->
                <form method="POST">
                    <div class="mb-3">
                        <label for="nombre_paquete" class="form-label">Nombre del Paquete</label>
                        <select class="form-control" id="nombre_paquete" name="nombre_paquete" required>
                            <option value="Deporte">Deporte</option>
                            <option value="Cine">Cine</option>
                            <option value="Infantil">Infantil</option>
                        </select>
                    </div>

                    <!-- Enviar el ID del usuario en un campo oculto -->
                    <input type="hidden" name="id_usuario" value="<?php echo htmlspecialchars($id_usuario); ?>">

                    <!-- Botón para enviar el formulario -->
                    <button type="submit" class="btn btn-primary w-100">Agregar Paquete</button>
                </form>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
