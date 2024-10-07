<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agendar Cita - Barbershop</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;700&display=swap');
        body {
            font-family: 'Inter', sans-serif;
        }
        .background-img {
            background-image: url('imagenes/logo.jpg');
            background-size: cover;
            background-repeat: no-repeat;
            background-position: center;
            filter: blur(8px);
        }
        .hidden { display: none; }
    </style>
</head>
<body class="bg-blue-900 text-gray-900">
    <!-- Fondo difuminado -->
    <div class="fixed inset-0 background-img opacity-30 z-0"></div>

    <!-- Menú en la esquina superior derecha -->
    <header class="absolute top-0 right-0 p-6 z-10">
        <nav class="relative">
            <button id="menuButton" class="text-white focus:outline-none">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                </svg>
            </button>
            <ul id="menu" class="absolute right-0 mt-2 w-48 bg-white text-gray-900 shadow-lg rounded-md hidden">
                <li class="p-2 hover:bg-gray-200 transition duration-300"><a href="#">Inicio</a></li>
                <li class="p-2 hover:bg-gray-200 transition duration-300"><a href="#">Conócenos</a></li>
                <li class="p-2 hover:bg-gray-200 transition duration-300"><a href="https://www.instagram.com/angeeel_sl7/?hl=es">Contacto</a></li>
                <li class="p-2 hover:bg-gray-200 transition duration-300"><a href="inicio.php">Agendar Cita</a></li>
            </ul>
        </nav>
    </header>

    <!-- Contenedor principal -->
    <div class="relative z-10 min-h-screen flex items-center justify-center">
        <div class="bg-transparent	 bg-opacity-80 shadow-lg rounded-lg p-8 w-full max-w-4xl">
            <h1 class="text-3xl font-bold text-center mb-6 text-white-800">Agendar Cita</h1>

            <!-- Botón para abrir modal de barberos -->
            <div class="text-center">
                <button id="openBarberoModal" class="bg-red-600 text-white font-bold py-3 px-6 rounded-lg hover:bg-red-700 transition duration-300">
                    Seleccionar Barbero
                </button>
            </div>
        </div>
    </div>

    <!-- Modal Selección de Barbero -->
    <div id="barberoModal" class="fixed inset-0 bg-gray-900 bg-opacity-75 flex items-center justify-center hidden z-20">
        <div class="bg-white rounded-lg shadow-lg p-6 w-full max-w-lg">
            <h2 class="text-xl font-bold text-center text-blue-600 mb-4">Elige tu Barbero</h2>
            <ul class="space-y-4">
                <?php
                include 'db.php';
                $db = new DB();
                $conn = $db->getConnection();
                $consultaBarberos = "SELECT id_barbero, nombre, experiencia FROM Barbero";
                $resultBarberos = $conn->query($consultaBarberos);

                while ($barbero = $resultBarberos->fetch_assoc()) {
                    echo "
                    <li class='flex justify-between items-center'>
                        <span class='text-gray-700 font-semibold'>{$barbero['nombre']} - {$barbero['experiencia']} años de experiencia</span>
                        <button class='bg-blue-600 text-white px-4 py-2 rounded-md hover:bg-blue-700 transition duration-300' onclick='selectBarbero({$barbero['id_barbero']})'>Seleccionar</button>
                    </li>";
                }
                ?>
            </ul>
            <div class="text-right mt-6">
                <button id="closeBarberoModal" class="text-red-500 hover:text-red-600">Cerrar</button>
            </div>
        </div>
    </div>

    <!-- Modal Selección de Fecha -->
    <div id="fechaModal" class="fixed inset-0 bg-gray-900 bg-opacity-75 flex items-center justify-center hidden z-20">
        <div class="bg-white rounded-lg shadow-lg p-6 w-full max-w-lg">
            <h2 class="text-xl font-bold text-center text-blue-600 mb-4">Seleccionar Fecha</h2>
            <form>
                <label for="fecha" class="block text-gray-700 font-bold mb-2">Elige la Fecha:</label>
                <input type="datetime-local" id="fecha" class="w-full p-3 bg-gray-100 rounded-md shadow-sm border border-gray-300 focus:ring-2 focus:ring-blue-500" required>
                <div class="text-right mt-6">
                    <button id="nextToServicios" class="bg-red-600 text-white font-bold py-2 px-4 rounded-md hover:bg-red-700 transition duration-300">Siguiente</button>
                </div>
            </form>
        </div>
    </div>

    <!-- Modal Selección de Servicios -->
    <div id="serviciosModal" class="fixed inset-0 bg-gray-900 bg-opacity-75 flex items-center justify-center hidden z-20">
        <div class="bg-white rounded-lg shadow-lg p-6 w-full max-w-lg">
            <h2 class="text-xl font-bold text-center text-blue-600 mb-4">Seleccionar Servicios</h2>
            <form id="agendarForm" method="POST">
                <?php
                $consultaServicios = "SELECT id_servicio, nombre_servicio, precio FROM Servicio";
                $resultServicios = $conn->query($consultaServicios);

                while ($servicio = $resultServicios->fetch_assoc()) {
                    echo "
                    <label class='block text-gray-700 font-semibold mb-2'>
                        <input type='radio' name='servicio' value='{$servicio['id_servicio']}' required>
                        {$servicio['nombre_servicio']} - Precio: \${$servicio['precio']}
                    </label>";
                }
                ?>
                <input type="hidden" name="barbero" id="selectedBarbero">
                <input type="hidden" name="fecha" id="selectedFecha">
                <div class="text-right mt-6">
                    <input type="submit" class="bg-blue-600 text-white font-bold py-2 px-4 rounded-md hover:bg-blue-700 transition duration-300" value="Confirmar Cita">
                </div>
            </form>
        </div>
    </div>

    <!-- Mensaje de confirmación -->
    <div id="confirmationMessage" class="fixed bottom-10 right-10 bg-green-600 text-white font-bold py-2 px-4 rounded-md hidden z-30">
        ¡Cita agendada con éxito!
    </div>

    <script>
        let selectedBarbero = null;
        let selectedFecha = null;

        // Mostrar/ocultar menú
        document.getElementById('menuButton').addEventListener('click', function() {
            const menu = document.getElementById('menu');
            menu.classList.toggle('hidden');
        });

        // Abrir modal de barbero
        document.getElementById('openBarberoModal').addEventListener('click', function () {
            document.getElementById('barberoModal').classList.remove('hidden');
        });

        // Cerrar modal de barbero
        document.getElementById('closeBarberoModal').addEventListener('click', function () {
            document.getElementById('barberoModal').classList.add('hidden');
        });

        // Seleccionar barbero y pasar al siguiente modal
        function selectBarbero(barberoId) {
            selectedBarbero = barberoId;
            document.getElementById('selectedBarbero').value = selectedBarbero;
            document.getElementById('barberoModal').classList.add('hidden');
            document.getElementById('fechaModal').classList.remove('hidden');
        }

        // Pasar del modal de fecha al de servicios
        document.getElementById('nextToServicios').addEventListener('click', function (event) {
            event.preventDefault();
            const fecha = document.getElementById('fecha').value;
            if (fecha) {
                selectedFecha = fecha;
                document.getElementById('selectedFecha').value = selectedFecha;
                document.getElementById('fechaModal').classList.add('hidden');
                document.getElementById('serviciosModal').classList.remove('hidden');
            }
        });

        // Mostrar mensaje de confirmación al enviar el formulario
        document.getElementById('agendarForm').addEventListener('submit', function (event) {
            event.preventDefault(); // Prevenir redireccionamiento automático

            // Mostrar el mensaje de confirmación
            const confirmationMessage = document.getElementById('confirmationMessage');
            confirmationMessage.classList.remove('hidden');

            // Ocultar el mensaje después de 3 segundos
            setTimeout(function() {
                confirmationMessage.classList.add('hidden');
            }, 3000);

            // Aquí puedes hacer la solicitud AJAX o continuar con la lógica de guardado
            const formData = new FormData(this);

            fetch('agregar_cita.php', {
                method: 'POST',
                body: formData
            })
            .then(response => response.text())
            .then(result => {
                console.log(result); // Puedes manejar la respuesta del servidor aquí si es necesario
            })
            .catch(error => console.error('Error:', error));
        });
    </script>
</body>
</html>
