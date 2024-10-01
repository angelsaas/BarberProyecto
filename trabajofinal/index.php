<!DOCTYPE html>
<html>
<head>
    <title>Iniciar sesión</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            color: #333;
            margin: 0;
            padding: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            min-height: 100vh;
        }

        .container {
            display: flex;
            border-radius: 5px;
            overflow: hidden;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .login-form {
            flex: 1;
            padding: 20px;
            background-color: #fff;
        }

        .logo-aside {
            flex: 1;
            background-color: #fff;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .logo-container {
            background-color: #ffff;
            padding: 20px;
        }

        .logo {
            max-width: 200px;
            height: auto;
        }

        h1 {
            text-align: center;
            color: #6f00ff;
        }

        label {
            display: block;
            margin-top: 10px;
            color: #6f00ff;
        }

        input[type="text"],
        input[type="password"] {
            width: 100%;
            padding: 10px;
            margin-top: 5px;
            border: 1px solid #6f00ff;
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
            background-color: #6f00ff;
            color: #fff;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        input[type="submit"]:hover {
            background-color: #5a00cc;
        }

        p {
            text-align: center;
            margin-top: 10px;
            color: #6f00ff;
        }

        a {
            color: #6f00ff;
        }
    </style>
</head>
<body>
    <?php
    session_start();
    include 'procesar_login.php';
    ?>
    <div class="container">
        <div class="login-form">
            <h1>Iniciar sesión</h1>
            <form method="POST" action="procesar_login.php">
                <label for="usuario">Usuario:</label>
                <input type="text" name="usuario" id="usuario" required>
                <label for="contrasena">Contraseña:</label>
                <input type="password" name="contrasena" id="contrasena" required>
                <input type="submit" name="btnIngresar" value="Ingresar">
                
            </form>
            <p>¿administrador? <a href="ADMIN_PROCESO.php">presione aqui</a></p>
        
            <p>¿No tienes una cuenta? <a href="registro.php">Regístrate aquí</a></p>
        </div>
        <div class="logo-aside">
            <div class="logo-container">
                <img class="logo" src="imagenes/logo.jpeg" alt="">
            </div>
        </div>
    </div>
    
</body>
</html>
