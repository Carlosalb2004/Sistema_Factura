<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "db_factura";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

$productCode = $_POST['productCode'];

$query = "SELECT * FROM mae_articulo WHERE Codigo = '$productCode'";

$result = $conn->query($query);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $datos_producto = array(
        'productName' => $row['Nombre'],
        'price' => $row['Precio']
    );
    echo json_encode($datos_producto);
} else {
    echo json_encode(array());
}

$conn->close();
?>
