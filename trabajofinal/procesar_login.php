<?php


include 'db.php';
$db = new DB();
$conn = $db->getConnection();

// Asigna el valor de $_POST["usuario"] a $usuario, o una cadena vacía si no está definido
$usuario = $_POST["usuario"] ?? "";

// Asigna el valor de $_POST["contrasena"] a $contrasena, o una cadena vacía si no está definido
$contrasena = $_POST["contrasena"] ?? "";

if ($usuario && $contrasena) {
    session_start();

    $usuarioDatos = $db->autenticarUsuario($usuario, $contrasena);
    if ($usuarioDatos) {
        $_SESSION["id_cliente"] = $usuarioDatos["id_cliente"];
        $_SESSION["nombre_cliente"] = $usuarioDatos["nombre"];
// session es para almcenar datos de sesion entre paginas
        $idServicio = $_POST['servicio'] ?? "";
        if ($idServicio) {
            $sqlPrecioServicio = "SELECT precio FROM Servicio WHERE id_servicio = $idServicio";
            $precioServicio = $conn->query($sqlPrecioServicio)->fetch_assoc()['precio'];
            $_SESSION['precio_servicio'] = $precioServicio;
        }

        header("Location: inicio.php");
        exit();
    }

    echo "Credenciales inválidas.";
} else {
    echo "Por favor, ingresa usuario y contraseña.";
}

$conn->close();
?>
