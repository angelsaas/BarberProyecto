<?php
    include 'DB.php';

    $db = new DB();
    $conn = $db->getConnection();

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST["btnBorrarUsuario"])) {
    $id_usuario_borrar = $_POST["usuario_borrar"];

    if ($db->deleteUsuario($id_usuario_borrar)) {
        echo 'Usuario borrado exitosamente.';
    } else {
        echo 'Error al borrar el usuario.';
    }
}
$usuarios = $db->getUsuarios();

        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST["btnAgregarBarbero"])) {
     $nombre_barbero = $_POST["nombre_barbero"];
       $experiencia = $_POST["experiencia"];
            
            if ($db->createBarbero($nombre_barbero, $experiencia)) {
        echo 'Barbero agregado exitosamente.';
            } else {
            }         echo 'Error al agregar el barbero.';


         
    }
    ?>