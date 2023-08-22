<?php
// Obtener el valor del parámetro documento
$documento = $_GET['documento'];

// Conectarse a la base de datos (asegúrate de configurar correctamente los datos de conexión)
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "db_factura";
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Construir la consulta SQL para buscar los datos del cliente
$sql = "SELECT Nombres_Apellidos, Email, Mobile, Direccion FROM mae_cliente WHERE ID_Cliente = '$documento'";

// Ejecutar la consulta
$result = $conn->query($sql);

// Verificar si se encontraron resultados
if ($result->num_rows > 0) {
    // Obtener los datos del cliente y construir un array con ellos
    $row = $result->fetch_assoc();
    $datos_cliente = array(
        'Nombres_Apellidos' => $row['Nombres_Apellidos'],
        'Email' => $row['Email'],
        'Mobile' => $row['Mobile'],
        'Direccion' => $row['Direccion']
    );

    // Convertir el array a formato JSON y devolverlo como respuesta
    header('Content-Type: application/json');
    echo json_encode($datos_cliente);
} else {
    // No se encontraron resultados, devolver un objeto vacío como respuesta
    echo json_encode(array());
}

// Cerrar la conexión a la base de datos
$conn->close();
?>
