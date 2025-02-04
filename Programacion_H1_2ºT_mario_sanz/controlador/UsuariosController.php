<?php
require_once "../modelo/class_usuario.php";

class UsuariosController {
    private $Usuario;

    public function __construct() {
        $this->Usuario = new Usuario();
    }

    public function agregarusuario($id_usuario, $nombre, $apellidos, $correo, $edad) {
        $this->Usuario->agregarusuario($id_usuario, $nombre, $apellidos, $correo, $edad);
    }

    // Función para agregar el resto de datos del usuario
    public function agregarusuario2($plan_base, $duracion_suscripcion, $id_usuario) {
        $this->Usuario->agregarusuario2($plan_base, $duracion_suscripcion, $id_usuario);
    }

    // Función para agregar el resto de datos del usuario
    public function agregarusuario3($id_usuario, $nombre_paquete) {
        $this->Usuario->agregarusuario3($id_usuario, $nombre_paquete);
    }

    public function listarUsuarios() {
        return $this->Usuario->obtenerUsuarios();
    }

    public function obtenerUsuarioPorId($id_Usuario) {
        return $this->Usuario->obtenerUsuarioPorId($id_Usuario);
    }

    public function eliminarUsuario($id_Usuario) {
        $this->Usuario->eliminarUsuario($id_Usuario);
    }

    public function actualizarUsuario($edad, $plan_base, $id_usuario, $duracion_suscripcion) {
        $this->Usuario->actualizarUsuario($edad, $plan_base, $id_usuario, $duracion_suscripcion);
    }

    public function actualizarUsuario2($nombre_paquete, $id_usuario) {
        $this->Usuario->actualizarUsuario2($nombre_paquete, $id_usuario);
    }

    public function getPaqueteUsuario($id_usuario) {
        return $this->Usuario->obtenerPaquetePorUsuario($id_usuario);
    }
    
}
?>
