<?php
include("codigosw2.php");
include("config.php");
include("session.php");

$ID_Factura = $_POST['ID_Factura'];
$Fecha = $_POST['Fecha'];
$ID_Vendedor = $_POST['ID_Vendedor'];
$ID_Cliente = $_POST['ID_Cliente'];
$ID_PuntoVenta = $_POST['ID_PuntoVenta'];
$ID_ModoPago = $_POST['ID_ModoPago'];


// INSERT INTO trs_factura (ID_Factura,ID_Cliente,Fecha,ID_Vendedor,ID_PuntoVenta,ID_ModoPago)VALUES (1001,71636770,NOW(),77777788,5,5);

$sql = "INSERT INTO trs_factura (`ID_Factura`, `ID_Cliente`, `Fecha`, `ID_Vendedor`, `ID_PuntoVenta`, `ID_ModoPago`,`Monto_Total`) VALUES
('$ID_Factura', '$ID_Cliente', NOW(), '$ID_Vendedor', '$ID_PuntoVenta', '$ID_ModoPago',00)";


if(mysqli_query($mysqli, $sql))
{
    echo '<script>';
    echo 'Swal.fire({';
            echo '   icon: "success",';
            echo '   title: "Nuevo Factura agregado",';
            echo '    showConfirmButton: false,';
            echo '    timer: 1300';
    echo '}).then(function(result) {';
        echo 'window.location="../Fronted/Detalles.php?id=' . $ID_Factura . '";';
    echo '});';
    echo '</script>';
    } else {
    echo '<script>';
    echo 'Swal.fire({';
            echo '   icon: "error",';
            echo '   title: "Factura no creado",';
            echo '   showConfirmButton: false,';
            echo '   timer: 1300';
    echo '}).then(function(result) {';
        echo 'window.location="../Fronted/registration_Factura.php";';
    echo '});';
    echo '</script>';
    }
    ?>
