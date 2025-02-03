<?php
require_once "../controlador/UsuariosController.php";
$controller = new UsuariosController();
$Usuarios = $controller->listarUsuarios();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listado de Usuarios</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container mt-5">
        <div class="card shadow-sm">
            <div class="card-header bg-primary text-white">
                <h2 class="text-center m-0">Usuarios Registrados</h2>
            </div>
            <div class="card-body">
                <table class="table table-striped table-hover">
                    <thead class="table-dark">
                        <tr>
                            <th>DNI</th>
                            <th>Nombre</th>
                            <th>Apellido</th>
                            <th>Correo</th>
                            <th>Edad</th>
                            <th>Plan Base</th>
                            <th>Duración Suscripción</th>
                            <th>Nombre Paquete</th>
                            <th>Precio Plan (€)</th>
                            <th>Precio Paquete (€)</th>
                            <th>Precio Total (€)</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($Usuarios as $usuario): ?>
                            <tr>
                                <td><?= $usuario["id_usuario"] ?></td>
                                <td><?= $usuario["nombre"] ?></td>
                                <td><?= $usuario["apellidos"] ?></td>
                                <td><?= $usuario["correo"] ?></td>
                                <td><?= $usuario["edad"] ?></td>
                                <td><?= $usuario["plan_base"] ?></td>
                                <td><?= $usuario["duracion_suscripcion"] ?></td>
                                <td><?= $usuario["nombre_paquete"] ?></td>
                                <td><?= $usuario["precio_plan"] ?> €</td>
                                <td><?= $usuario["precio_paquete"] ?> €</td>
                                <td><?= $usuario["precio_total"] ?> €</td>
                                <td>
                                    <a href="editar_usuario.php?id_usuario=<?= $usuario["id_usuario"] ?>" class="btn btn-sm btn-primary">Editar</a>
                                    <a href="eliminar_usuario.php?id_usuario=<?= $usuario["id_usuario"] ?>" class="btn btn-sm btn-danger">Eliminar</a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
                <div class="text-center mt-3">
                    <a href="alta_usuario.php" class="btn btn-success">Agregar un nuevo usuario</a>
                </div>
            </div>
        </div>
        <div class="card-body">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">Nombre del plan</th>
                            <th scope="col">Precio</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Basico</td>
                            <td>$9.99</td>
                        </tr>
                        <tr>
                            <td>Estandar</td>
                            <td>$13.99</td>
                        </tr>
                        <tr>
                            <td>Premium</td>
                            <td>$17.99</td>
                        </tr>
                    </tbody>
                </table>
                <hr>
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">Paquete</th>
                            <th scope="col">Precio</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Deporte</td>
                            <td>$6.99</td>
                        </tr>
                        <tr>
                            <td>Cine</td>
                            <td>$7.99</td>
                        </tr>
                        <tr>
                            <td>Infantil</td>
                            <td>$4.99</td>
                        </tr>
                    </tbody>
                </table>
            </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
