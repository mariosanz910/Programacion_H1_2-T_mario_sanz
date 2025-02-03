<?php
require_once "../controlador/UsuariosController.php";

$controller = new UsuariosController();
$id_usuario = $_GET["id_usuario"] ?? null;
$usuario = $controller->obtenerUsuarioPorId($id_usuario);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $edad = $_POST["edad"];  // Obtener el valor de edad enviado en el formulario
    $plan_base = $_POST["plan_base"];
    $duracion_suscripcion = $_POST["duracion_suscripcion"];
    $id_usuario = $_POST["id_usuario"];

    // Actualizar el usuario
    $controller->actualizarUsuario(
        $edad,
        $plan_base,
        $duracion_suscripcion,
        $id_usuario
    );

    // Redirigir según la edad
    if ($edad >= 18) {
        /*if (($plan_base === "Estandar" || $plan_base === "Premium") && ($duracion_suscripcion === "Mensual" || $duracion_suscripcion === "Anual")) {
            header("Location: lista_usuarios.php");
        } */
        if ($plan_base === "Estandar" && $duracion_suscripcion === "Mensual") {
            header("Location: editar_estandar_mensual.php?id_usuario="  . urlencode($id_usuario));
        }
        if ($plan_base === "Estandar" && $duracion_suscripcion === "Anual") {
            header("Location: editar_estandar_anual.php?id_usuario="  . urlencode($id_usuario));
        } 
        if ($plan_base === "Premium" && $duracion_suscripcion === "Mensual") {
            header("Location: editar_premium_mensual.php?id_usuario="  . urlencode($id_usuario));
        } 
        if ($plan_base === "Premium" && $duracion_suscripcion === "Anual") {
            header("Location: editar_premium_anual.php?id_usuario="  . urlencode($id_usuario));
        } 
    } else {
        
        header("Location: editar_usuario.php?id_usuario=" . urlencode($id_usuario)); // Para menores de 18 años
    }
    exit();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Editar Usuario</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container mt-5">
        <div class="card shadow-sm">
            <div class="card-header bg-primary text-white">
                <h2 class="text-center m-0">Editar Usuario</h2>
            </div>
            <div class="card-body">
                <form method="POST">
                    <br>
                    <div class="mb-3">
                        <label for="edad" class="form-label">Edad</label>
                        <input type="number" class="form-control" id="edad" name="edad" required>
                    </div>
                    <label for="plan_base" class="form-label">Plan Base</label>
                    <select class="form-control" id="plan_base" name="plan_base" required>
                        <!--<option value="Basico">Básico</option>-->
                        <option value="Estandar">Estándar</option>
                        <option value="Premium">Premium</option>
                    </select>
                    <br>
                    <div class="mb-3">
                    <label for="duracion_suscripcion" class="form-label">Duración de la Suscripción</label>
                    <select class="form-control" id="duracion_suscripcion" name="duracion_suscripcion" required>
                        <option value="Mensual">Mensual</option>
                        <option value="Anual">Anual</option>
                    </select>
                    <input type="hidden" name="id_usuario" value="<?= htmlspecialchars($usuario["id_usuario"]) ?>">
                </div>
                <br>
                    <button type="submit" class="btn btn-primary w-100">Continuar</button>
                </form>
                <div class="text-center mt-3">
                    <a href="lista_usuarios.php" class="btn btn-secondary">Volver al listado</a>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
