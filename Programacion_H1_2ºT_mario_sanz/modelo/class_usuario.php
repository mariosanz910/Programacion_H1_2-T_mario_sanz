<?php
require_once '../config/class_conexion.php';

class usuario {
    public $numero_usuario = 2;
    private $conexion;

    public function __construct() {
        $this->conexion = new Conexion();
    }

    public function obtenerPaquetePorUsuario($id_usuario) {
        $query = "SELECT nombre_paquete FROM paquetes_adicionales WHERE id_usuario = ?";
        $stmt = $this->conexion->conexion->prepare($query);
        $stmt->bind_param("i", $id_usuario);
        $stmt->execute();
        $stmt->bind_result($nombre_paquete);
        $stmt->fetch();
        $stmt->close();
    
        return $nombre_paquete ?? ''; // Si no tiene paquete, devuelve una cadena vacía
    }
    

    public function actualizarUsuario($edad, $plan_base, $duracion_suscripcion, $id_usuario) {
        $query = "UPDATE usuarios SET edad = ?, plan_base = ?, duracion_suscripcion = ? WHERE id_usuario = ?";
        $stmt = $this->conexion->conexion->prepare($query);
        $stmt->bind_param("issi",$edad, $plan_base, $duracion_suscripcion, $id_usuario);
        $stmt->execute();
        $stmt->close();
    }

    public function actualizarUsuario2($nombre_paquete, $id_usuario) {
        $query = "UPDATE paquetes_adicionales SET nombre_paquete = ? WHERE id_usuario = ?";
        $stmt = $this->conexion->conexion->prepare($query);
        $stmt->bind_param("si", $nombre_paquete, $id_usuario);
        $stmt->execute();
        $stmt->close();
    }

    public function agregarusuario($id_usuario, $nombre, $apellidos, $correo, $edad) {
        $query = "INSERT INTO usuarios (id_usuario, nombre, apellidos, correo, edad) VALUES (?, ?, ?, ?, ?)";
        $sentencia = $this->conexion->conexion->prepare($query);
        $sentencia->bind_param("issss", $id_usuario, $nombre, $apellidos, $correo, $edad);

        if ($sentencia->execute()) {
            echo "usuario agregado con éxito.";
        } else {
            echo "Error al agregar usuario: " . $sentencia->error;
        }

        $sentencia->close();
    }
        //************************************************************************** */

    // Función para agregar la segunda parte del usuario:
    public function agregarusuario2($plan_base, $duracion_suscripcion) {
        $query = "INSERT INTO usuarios (plan_base, duracion_suscripcion) VALUES (?, ?)";
        $sentencia = $this->conexion->conexion->prepare($query);
        $sentencia->bind_param("ss", $plan_base, $duracion_suscripcion);

        if ($sentencia->execute()) {
            echo "usuario agregado con éxito.";
        } else {
            echo "Error al agregar usuario: " . $sentencia->error;
        }

        $sentencia->close();
    }
    //************************************************************************** */

    // Función para agregar la tercera parte del usuario:

    public function agregarusuario3($nombre_paquete, $id_usuario) {
        $query = "INSERT INTO paquetes_adicionales (nombre_paquete, id_usuario) VALUES (?, ?)";
        $sentencia = $this->conexion->conexion->prepare($query);
        $sentencia->bind_param("si", $nombre_paquete, $id_usuario); // "s" para string, "i" para integer
    
        if ($sentencia->execute()) {
            echo "Paquete agregado con éxito.";
        } else {
            echo "Error al agregar paquete: " . $sentencia->error;
        }
    
        $sentencia->close();
    }
    
    //************************************************************************** */


    public function obtenerusuarios() {
        $query = "SELECT u.id_usuario, u.nombre, u.apellidos, u.correo, u.edad, u.plan_base, u.duracion_suscripcion, p.nombre_paquete, CASE WHEN u.plan_base = 'Basico' THEN 9.99 WHEN u.plan_base = 'Estandar' THEN 13.99 WHEN u.plan_base = 'Premium' THEN 17.99 ELSE 0 END AS precio_plan, CASE WHEN p.nombre_paquete = 'Deporte' THEN 6.99 WHEN p.nombre_paquete = 'Cine' THEN 7.99 WHEN p.nombre_paquete = 'Infantil' THEN 4.99 WHEN p.nombre_paquete = 'Deporte y Cine' THEN 6.99 + 7.99 WHEN p.nombre_paquete = 'Cine e Infantil' THEN 7.99 + 4.99 WHEN p.nombre_paquete = 'Deporte e Infantil' THEN 6.99 + 4.99 WHEN p.nombre_paquete = 'Todos' THEN 6.99 + 7.99 + 4.99 ELSE 0 END AS precio_paquete, (CASE WHEN u.plan_base = 'Basico' THEN 9.99 WHEN u.plan_base = 'Estandar' THEN 13.99 WHEN u.plan_base = 'Premium' THEN 17.99 ELSE 0 END + CASE WHEN p.nombre_paquete = 'Deporte' THEN 6.99 WHEN p.nombre_paquete = 'Cine' THEN 7.99 WHEN p.nombre_paquete = 'Infantil' THEN 4.99 WHEN p.nombre_paquete = 'Deporte y Cine' THEN 6.99 + 7.99 WHEN p.nombre_paquete = 'Cine e Infantil' THEN 7.99 + 4.99 WHEN p.nombre_paquete = 'Deporte e Infantil' THEN 6.99 + 4.99 WHEN p.nombre_paquete = 'Todos' THEN 6.99 + 7.99 + 4.99 ELSE 0 END) AS precio_total FROM usuarios u LEFT JOIN paquetes_adicionales p ON u.id_usuario = p.id_usuario;";
        $resultado = $this->conexion->conexion->query($query);
        $usuarios = [];
        while ($fila = $resultado->fetch_assoc()) {
            $usuarios[] = $fila;
        }
        return $usuarios;
    }

    public function obtenerusuarioPorId($id_usuario) {
        $query = "SELECT * FROM usuarios WHERE id_usuario = ?";
        $sentencia = $this->conexion->conexion->prepare($query);
        $sentencia->bind_param("i", $id_usuario);
        $sentencia->execute();
        $resultado = $sentencia->get_result();
        return $resultado->fetch_assoc();
    }

    public function eliminarusuario($id_usuario) {
        $query = "DELETE FROM usuarios WHERE id_usuario = ?";
        $stmt = $this->conexion->conexion->prepare($query);
        $stmt->bind_param("i", $id_usuario);

        if ($stmt->execute()) {
            echo "usuario eliminado con éxito.";
        } else {
            echo "Error al eliminar usuario: " . $stmt->error;
        }

        $stmt->close();
    }
}
?>
