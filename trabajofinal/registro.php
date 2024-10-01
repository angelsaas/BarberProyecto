<!-- Registro.php -->
<!DOCTYPE html>
<html>
<head>
    <title>Registro</title>
</head>
<body>
    <?php
    session_start();
    include 'procesar_registro.php';
    ?>
    <h1>Registro de usuario</h1>

    <form method="POST" action="procesar_registro.php">
        <label for="nombre">Nombre:</label>
        <input type="text" name="nombre" id="nombre" required>
        <br>

      

        <label for="usuario">Usuario:</label>
        <input type="text" name="usuario" id="usuario" required>
        <br>

        <label for="contrasena">Contraseña:</label>
        <input type="password" name="contrasena" id="contrasena" required>
        <br>

        <input type="submit" name="btnRegistrar" value="Registrar">
    </form>
    <p>¿Ya tienes una cuenta? <a href="index.php">Inicia sesión aquí</a></p>
</body>
</html>

<style>
body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            color: #333;
            margin: 0;
            padding: 0;
        }

        h1 {
            text-align: center;
            color: #006d77;
        }

        form {
            max-width: 400px;
            margin: 0 auto;
            padding: 20px;
            background-color: #d1e1ec;
            border-radius: 5px;
        }

        label {
            display: block;
            margin-top: 10px;
            color: #006d77;
        }

        input[type="text"],
        input[type="password"] {
            width: 100%;
            padding: 10px;
            margin-top: 5px;
            border: 1px solid #006d77;
            border-radius: 3px;
            background-color: #fff;
            color: #333;
        }

        input[type="submit"] {
            width: 100%;
            padding: 10px;
            margin-top: 20px;
            border: none;
            border-radius: 3px;
            background-color: #006d77;
            color: #fff;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        input[type="submit"]:hover {
            background-color: #005161;
        }

        p {
            text-align: center;
            margin-top: 10px;
            color: #006d77;
        }

        a {
            color: #006d77;
        }
    </style>