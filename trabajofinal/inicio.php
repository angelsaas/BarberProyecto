<!DOCTYPE html>
<html>
<head>
    <title>Agendar Cita</title>
  <link rel="stylesheet" href="estilos.css">
</head>
<body>
    <header>
        <h1>Barbershop   <img src="imagenes/logo.jpeg" alt="Logo" class="logo">
        <nav>
            <ul>
                <li><a href="#">Inicio</a></li>
                <li><a href="https://www.instagram.com/angeeel_sl7/?hl=es">Contacto</a> </li>
            
          
            <?php
              session_start();         
?>
            
            </ul>
        </nav>
    </header>
    <main>
        <aside>
            <div class="contact-bar">
                <h3>Contactanos</h3>
                <p>Dirección: calle OTE 415 El carmen </p>
                <p>Teléfono: 2221149244</p>
                <p>Email: angeljsjsbdd@gmail.com</p>
            </div>
            
    <h2>Cortes en Tendencia</h2>
    <div class="image-list">
        <ul>
            <li><a href="#"><img src="imagenes/taper2.jpg" alt="Corte 1"></a></li>
            <li><a href="#"><img src="imagenes/low.jpg" alt="Corte 2"></a></li>
        </ul>
        <ul>
            <li><a href="#"><img src="imagenes/mid.jpg" alt="Corte 3"></a></li>
            <li><a href="#"><img src="imagenes/mullet.webp" alt="Corte 4"></a></li>
        </ul>
    </div>


        </aside>
        <div class="container">
            <h1>Agendar Cita</h1>

            <form method="POST" action="agregar_cita.php">
                <label for="barbero">Seleccionar Barbero:</label>
                <select name="barbero" id="barbero" required>
                    <?php
                    include 'db.php';
                    $db = new DB();
                    $conn = $db->getConnection();

                    // Obtener todos los barberos
                    $consultaBarberos = "SELECT id_barbero, nombre, experiencia FROM Barbero";
                    $resultBarberos = $conn->query($consultaBarberos);

                    while ($barbero = $resultBarberos->fetch_assoc()) {
                        echo "<option value=\"{$barbero['id_barbero']}\">{$barbero['nombre']} - Experiencia: {$barbero['experiencia']}</option>";
                    }
                    ?>
                </select>
                <br>

                <label for="hora">Seleccionar Hora de la Cita:</label>
                <input type="datetime-local" name="hora" id="hora" required>
                <br>

                <label for="cita">Tipo de Cita:</label>
                <input type="text" name="cita" id="cita" required>
                <br>

                <label>Seleccionar Servicio:</label>
                <?php
                // Obtener todos los servicios
                $consultaServicios = "SELECT id_servicio, nombre_servicio, precio FROM Servicio";
                $resultServicios = $conn->query($consultaServicios);

                while ($servicio = $resultServicios->fetch_assoc()) {
                    echo "<label><input type=\"radio\" name=\"servicio\" value=\"{$servicio['id_servicio']}\" required>{$servicio['nombre_servicio']} - Precio: {$servicio['precio']}</label><br>";
                }
                ?>

                <input type="submit" name="submit" value="Agendar Cita" style="background-color: #00a9a5;">
            </form>
            <div class="card">
  

        </div>
    </main>
</body>
</html>

