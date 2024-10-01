<?php
require_once 'db.php';

$nombre = $_POST['nombre'] ?? "";
$usuario = $_POST['usuario'] ?? "";
$contrasena = $_POST['contrasena'] ?? "";

if ($nombre && $usuario && $contrasena) {
    $db = new DB();
    
    if ($db->usuarioRegistrado($usuario)) {
        echo "El usuario ya está registrado. Por favor, elige otro nombre de usuario.";
    } else {
        $db->insertarUsuario($nombre, $usuario, $contrasena);
        echo "Registro exitoso. Ahora puedes iniciar sesión con tu nueva cuenta.";
        echo "<a href='index.php'>Regresar al inicio de sesión</a>";
    }
} else {
    echo "Por favor, completa todos los campos.";
}


?>
