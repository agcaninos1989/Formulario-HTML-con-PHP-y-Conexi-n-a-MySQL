<?php
// Mostrar errores para depuración
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Parámetros de conexión a la base de datos
$servername = "localhost";
$username = "root";
$password = ""; // Contraseña vacía en XAMPP por defecto
$dbname = "registro_perros"; // Nombre de la base de datos que creaste

// Crear la conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar la conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Obtener los datos del formulario
$nombre = $_POST['nombre'];
$apellido = $_POST['apellido'];
$nombre_perro = $_POST['nombre_perro'];
$raza = $_POST['raza'];
$email = $_POST['email'];
$sexo = $_POST['sexo'];
$mensaje = $_POST['mensaje'];

// Insertar los datos en la tabla
$sql = "INSERT INTO usuarios_perros (nombre, apellido, nombre_perro, raza, email, sexo, mensaje)
VALUES ('$nombre', '$apellido', '$nombre_perro', '$raza', '$email', '$sexo', '$mensaje')";

if ($conn->query($sql) === TRUE) {
    echo "Registro guardado con éxito";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

// Cerrar la conexión
$conn->close();
?>
