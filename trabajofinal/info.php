<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio - Barbershop</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;700&display=swap');
        body {
            font-family: 'Inter', sans-serif;
        }
    </style>
</head>
<body class="bg-gray-100 text-gray-900">
    <!-- Header -->
    <header class="bg-gray-900 text-white p-6 flex justify-between items-center">
        <h1 class="text-3xl font-bold">Barbershop</h1>
        <img src="imagenes/logo.jpeg" alt="Logo" class="w-12 h-12 rounded-full">

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

    <!-- Main Content -->
    <main class="container mx-auto p-6">
        <section class="text-center py-12">
            <h2 class="text-4xl font-bold mb-6">Bienvenido a Barbershop</h2>
            <p class="text-gray-700 mb-6">Somos tu mejor opción para un estilo fresco y moderno. ¡Conoce más de nosotros y nuestros productos locales!</p>
            <a href="#conocenos" class="bg-teal-500 text-white px-6 py-3 rounded-full hover:bg-teal-600 transition duration-300">Conoce más de nosotros</a>
        </section>

        <!-- Conócenos Section -->
        <section id="conocenos" class="bg-white p-6 rounded-md shadow-md mb-12">
            <h3 class="text-3xl font-bold mb-4">¿Quiénes somos?</h3>
            <p class="text-gray-700 mb-6">Somos una barbería con estilo único y local. Nos dedicamos a ofrecer los mejores servicios de cortes y arreglos de barba, además de contar con productos locales para el cuidado personal.</p>
        </section>

        <!-- Nuestros Productos Locales Section -->
        <section class="bg-white p-6 rounded-md shadow-md mb-12">
            <h3 class="text-3xl font-bold mb-4">Nuestros Productos Locales</h3>
            <p class="text-gray-700 mb-6">Ofrecemos una variedad de productos hechos por emprendedores locales para el cuidado del cabello y la barba. ¡Ven y descubre nuestros productos!</p>
        </section>

        <!-- Botón para Agendar Cita -->
        <div class="text-center">
            <a href="inicio.php" class="bg-teal-500 text-white px-6 py-3 rounded-full hover:bg-teal-600 transition duration-300">¿Quieres agendar cita?</a>
        </div>
    </main>

    <script>
        // Menu dropdown toggle
        document.getElementById('menuButton').addEventListener('click', function() {
            const menu = document.getElementById('menu');
            menu.classList.toggle('hidden');
        });
    </script>
</body>
</html>
