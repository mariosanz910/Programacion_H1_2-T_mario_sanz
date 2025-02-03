<?php 
require_once "../controlador/UsuariosController.php";

// Inicializa variables
$id_usuario = $_GET["id_usuario"] ?? null;

if ($id_usuario) {
    // Obtener datos del cliente a eliminar
    $controller = new UsuariosController();
    $Usuario = $controller->obtenerUsuarioPorId($id_usuario);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Eliminar el Usuario
    $controller->eliminarUsuario($id_usuario);
    header("Location: lista_usuarios.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Eliminar Usuario</title>
    <!-- Enlace a Bootstrap para el estilo -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container">
        <h2 class="text-center mb-4">Eliminar Usuario</h2>
        <form method="POST" action="">
            <div class="alert alert-warning" role="alert">
                ¿Estás seguro de que deseas eliminar el Usuario <?= htmlspecialchars($Usuario["nombre"]) ?> <?= htmlspecialchars($Usuario["apellidos"]) ?>?
            </div>
            <div class="d-flex justify-content-between">
                <button type="submit" class="btn btn-custom">Eliminar Usuario</button>
                <a href="lista_usuarios.php" class="btn-secondary-custom">Cancelar</a>
            </div>
        </form>
    </div>

    <!-- Script de Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
