<?php

class DB {

    private $conn;

    public function __construct(){
        $this->conn = new mysqli('localhost', 'root', '', 'barbershop_db');

        if ($this->conn->connect_error) {
            die("Error al conectar a la base de datos: " . $this->conn->connect_error);
        }
    }

    public function getConnection() {
        return $this->conn;
    }

    public function getUsuarios() {
        $usuarios = array(); // Inicializar un arreglo para almacenar los usuarios

        $sql = "SELECT id_cliente, nombre FROM cliente"; 
        $result = $this->conn->query($sql); // Ejecutar la consulta

        // Verificar si la consulta fue exitosa y si hay resultados
        if ($result && $result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $usuarios[] = $row; // Agregar cada fila de resultado (usuario) al arreglo de usuarios
            }
        }

        return $usuarios; // Retornar el arreglo de usuarios
    }

    public function deleteUsuario($id) {
        $sql = "DELETE FROM cliente WHERE id_cliente = $id";
        return $this->conn->query($sql);
    }

    public function createBarbero($nombre, $experiencia) {
        $sql = "INSERT INTO barbero (nombre, experiencia) VALUES (?, ?)";
        $query = $this->conn->prepare($sql);
        $query->bind_param("ss", $nombre, $experiencia);
        return $query->execute();
    }

    
    public function autenticarUsuario($usuario, $contrasena) {
        $sql = "SELECT id_cliente, nombre FROM cliente WHERE usuario = '$usuario' AND contrasena = '$contrasena'";
        $resultado = $this->conn->query($sql);
        return $resultado->fetch_assoc();
    }

    public function usuarioRegistrado($usuario) {
        $sql = "SELECT * FROM Cliente WHERE usuario = ?";
        $existeUsuario = $this->conn->prepare($sql);
        $existeUsuario->bind_param("s", $usuario);
        $existeUsuario->execute();
        $usuarioRegistrado = $existeUsuario->get_result()->fetch_assoc();

        return $usuarioRegistrado;
    }

  // Función para insertar un nuevo usuario
  public function insertarUsuario($nombre, $usuario, $contrasena) {
    // Sentencia SQL preparada con marcadores de posición (?)
    $insertarUsuario = "INSERT INTO Cliente (nombre, usuario, contrasena) VALUES (?, ?, ?)";
    $nuevoUsuario = $this->conn->prepare($insertarUsuario);

    // Enlazar parámetros a los marcadores de posición (sss indica tres valores de tipo string)
    $nuevoUsuario->bind_param("sss", $nombre, $usuario, $contrasena);

    // Ejecutar la consulta
    $nuevoUsuario->execute();
}

    public function insertarCita($barberoId, $idCliente, $servicioId, $horaCita, $cita) {
        $totalCita = $this->obtenerPrecioServicio($servicioId);

        $insertQuery = "INSERT INTO Cita (id_barbero, id_cliente, id_servicio, fecha_hora, tipo_cita, total) VALUES (?, ?, ?, ?, ?, ?)";
        $insertarCita = $this->conn->prepare($insertQuery);
        $insertarCita->execute([$barberoId, $idCliente, $servicioId, $horaCita, $cita, $totalCita]);

        return $totalCita;
    }
// Función para obtener el precio de un servicio por su ID
public function obtenerPrecioServicio($servicioId) {
    // Sentencia SQL para obtener el precio de un servicio por su ID
    $sql = "SELECT precio FROM Servicio WHERE id_servicio = $servicioId";
    $resultado = $this->conn->query($sql);

    // Obtener el resultado como una fila asociativa
    $fila = $resultado->fetch_assoc();
    
    // Devolver el precio si se encuentra, de lo contrario, devolver 0
    return $fila ? $fila['precio'] : 0;
}



    
}

?>
