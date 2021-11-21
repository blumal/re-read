<?php
// ESTILO POR PROCEDIMIENTOS

$host = "localhost";
$user = "root";
$pass = "";
$db = "reread-admin";

// Crear la conexión
$conn = mysqli_connect($host, $user, $pass, $db);

// Checkear la conexión
if (!$conn) {
    echo "Error: No se pudo conectar a MySQL." . PHP_EOL;
    echo "Error de depuración: " . mysqli_connect_errno() . PHP_EOL;
    exit;
} else {
	mysqli_set_charset($conn, "utf8");
}

/* //ESTILO ORIENTADO A OBJETOS
// Crear la conexión
$conn = new mysqli('localhost', 'root', '', 'imagenes');

// Checkear la conexión
if ($conn->connect_errno) {
	die("Error: No se pudo conectar a MySQL: " . $conn->connect_errno);
} else {
	$conn->set_charset("utf8");
}
*/

?>