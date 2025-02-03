<?php
require_once "../controlador/UsuariosController.php";

$controller = new UsuariosController();
$id_usuario = $_GET["id_usuario"] ?? null;
//$paquete_actual = $controller->getPaqueteUsuario($id_usuario);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre_paquete = $_POST["nombre_paquete"];
    $id_usuario = $_POST["id_usuario"];

    // Actualizar paquete en la base de datos
    $controller->actualizarUsuario2($nombre_paquete, $id_usuario);

    // Redirigir a la lista de usuarios tras la actualización
    header("Location: lista_usuarios.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Editar Paquete del Usuario</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container mt-5">
        <div class="card shadow-sm">
            <div class="card-header bg-primary text-white">
                <h2 class="text-center m-0">Editar Paquete del Usuario</h2>
            </div>
            <div class="card-body">
                <form method="POST">
                    <br>
                    <div class="mb-3">
                    <label for="nombre_paquete" class="form-label">Nombre del Paquete</label>
                        <select class="form-control" id="nombre_paquete" name="nombre_paquete" required>
                            <option value="Cine e Infantil">Cine e Infantil</option>
                            <option value="Infantil">Infantil</option>
                            <option value="Cine">Cine</option>
                        </select>
                    </div>
                    <input type="hidden" name="id_usuario" value="<?= htmlspecialchars($id_usuario) ?>">
                    <br>
                    <button type="submit" class="btn btn-primary w-100">Guardar Cambios</button>
                </form>
                <div class="text-center mt-3">
                    <a href="lista_usuarios.php" class="btn btn-secondary">Volver al listado</a>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
