<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="ESTILOS2.css">
    <title>Panel de Administrador</title>
   
</head>
<body>
    <header>
        <h1>Bienvenido Admin</h1>
    </header>
    <section>
    <?php
        session_start();
 
  include 'proceso_para_crud.php';

    ?>
        <h2>Borrar Usuario</h2>
      
        <form action="admin.php" method="POST">
            <label for="usuario_borrar">Selecciona un Usuario:</label>
            <select id="usuario_borrar" name="usuario_borrar" required>
                <?php
                foreach ($usuarios as $usuario) {
                    echo '<option value="' . $usuario['id_cliente'] . '">' . $usuario['nombre'] . '</option>';
                }
                ?>
            </select><br>
            <input type="submit" name="btnBorrarUsuario" value="Borrar Usuario">
        </form>
        <h2>Agregar Barbero</h2>
       
        <form action="admin.php" method="POST">
    <label for="nombre_barbero">Nombre del Barbero:</label>
    <input type="text" id="nombre_barbero" name="nombre_barbero" required><br>
    <label for="experiencia">Experiencia:</label>
    <input type="text" id="experiencia" name="experiencia" required><br>
    <input type="submit" name="btnAgregarBarbero" value="Agregar Barbero">
</form>




</body>
</html>


    </section>
</body>
</html>




