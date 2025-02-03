<?php
require_once "../controlador/UsuariosController.php";
$controller = new UsuariosController();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $plan_base = $_POST["plan_base"];
    $duracion_suscripcion = $_POST["duracion_suscripcion"];
    $id_usuario = $_POST["id_usuario"]; // Obtener el ID del usuario

    // Llamar al método para registrar la segunda parte
    $controller->agregarusuario2($plan_base, $duracion_suscripcion, $id_usuario);

    // Redirección según el plan y la duración de la suscripción
    if ($plan_base === "Basico" && $duracion_suscripcion === "Mensual") { // No en uso
        header("Location: alta_usuario_nodeporte.php?id_usuario=" . urlencode($id_usuario));
    } elseif ($plan_base === "Basico" && $duracion_suscripcion === "Anual") { // No en uso
        header("Location: alta_usuario3.php?id_usuario=" . urlencode($id_usuario));
    } elseif ($plan_base === "Premium" && $duracion_suscripcion === "Mensual") {
        header("Location: alta_usuario_premium_mensual.php?id_usuario=" . urlencode($id_usuario));
    } elseif ($plan_base === "Premium" && $duracion_suscripcion === "Anual") {
        header("Location: alta_usuario_premium_anual.php?id_usuario=" . urlencode($id_usuario));
    }elseif ($plan_base === "Estandar" && $duracion_suscripcion === "Mensual") {
        header("Location: alta_usuario_nodeporte.php?id_usuario=" . urlencode($id_usuario));
    } elseif ($plan_base === "Estandar" && $duracion_suscripcion === "Anual") {
        header("Location: alta_usuario3.php?id_usuario=" . urlencode($id_usuario));
    }
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
                        <!--<option value="Basico">Básico</option>-->
                        <option value="Estandar">Estándar</option>
                        <option value="Premium">Premium</option>
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
