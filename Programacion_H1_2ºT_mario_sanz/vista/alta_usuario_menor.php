<?php
require_once "../controlador/UsuariosController.php";
$controller = new UsuariosController();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $plan_base = $_POST["plan_base"];
    $duracion_suscripcion = $_POST["duracion_suscripcion"];
    $id_usuario = $_POST["id_usuario"]; // Obtener el ID del usuario

    // Llamar al método para registrar la segunda parte
    $controller->agregarusuario2($plan_base, $duracion_suscripcion, $id_usuario);

    // Redirigir a la tercera parte con el ID del usuario
    header("Location: alta_usuario_menor2.php?id_usuario=" . urlencode($id_usuario));
    exit();
}
?>

<!-- Formulario de segunda parte del usuario (plan_base y duracion_suscripcion) -->
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Datos Adicionales del Usuario</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container mt-5">
        <div class="card shadow-sm">
            <div class="card-header bg-primary text-white">
                <h2 class="text-center m-0">Completar Información del Usuario</h2>
            </div>
            <div class="card-body">
            <form method="POST">
                <input type="hidden" name="id_usuario" value="<?php echo htmlspecialchars($_GET["id_usuario"] ?? ""); ?>">

                <div class="mb-3">
                    <label for="plan_base" class="form-label">Plan Base</label>
                    <select class="form-control" id="plan_base" name="plan_base" required>
                        <option value="Basico">Básico (Como menor solo se puede optar a esta opción)</option>

                    </select>
                </div>
                
                <div class="mb-3">
                    <label for="duracion_suscripcion" class="form-label">Duración de la Suscripción</label>
                    <select class="form-control" id="duracion_suscripcion" name="duracion_suscripcion" required>
                        <option value="Mensual">Mensual</option>
                        <option value="Anual">Anual</option>
                    </select>
                </div>

                <button type="submit" class="btn btn-primary w-100">Registrar Usuario</button>
            </form>

            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
