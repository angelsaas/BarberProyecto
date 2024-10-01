<?php
require_once'db.php';

$barberoId = $_POST['barbero'];
$horaCita = $_POST['hora'];
$cita = $_POST['cita'];
$servicioId = $_POST['servicio'];

session_start();

if (isset($_SESSION['id_cliente'])) {
    $idCliente = $_SESSION['id_cliente'];

    $db = new DB();
    $totalCita = $db->insertarCita($barberoId, $idCliente, $servicioId, $horaCita, $cita);

    echo "Cita agendada con éxito. Total de la cita: $" . $totalCita;
    echo "El ID del barbero es: " . $barberoId;
} else {
    echo "Error: No se encontró el ID del cliente en la sesión. Asegúrate de haber iniciado sesión correctamente.";
}
?>
