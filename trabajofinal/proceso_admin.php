<?php

include 'db.php'; // Asegúrate de incluir el archivo que realiza la conexión a la base de datos

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST["btnRegistrar"])) {
    $usuario = $_POST["usuario"];
    $contrasena = $_POST["contrasena"];

    session_start();
    
    $db = new DB();
    $conn = $db->getConnection();
    
    $consulta_admin = "SELECT * FROM administrador WHERE usuario = ? AND contrasena = ?";
    $query_admin = $conn->prepare($consulta_admin);
    $query_admin->bind_param("ss", $usuario, $contrasena);
    $query_admin->execute();
    $resultado_admin = $query_admin->get_result();

    if ($resultado_admin && $resultado_admin->num_rows > 0) {
        $admin = $resultado_admin->fetch_assoc();
        
        if ($admin['usuario'] === 'AngelGG') { // Verificar si el usuario es 'AngelGG'
            $_SESSION['usuario'] = $usuario;
            header('Location: admin.php');
            exit;
        } else {
            echo 'Usuario no es admin.';
        }
    } else {
        echo 'Credenciales incorrectas. Por favor, intenta de nuevo.';
    }
}
    
?>
