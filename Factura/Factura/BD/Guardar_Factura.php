<?php
include("codigosw2.php");
include("config.php");
include("session.php");

$id = $_POST['id'];
$ID_Cliente = $_POST['ID_Cliente'];
$Monto_ImporteTotal = $_POST['Monto_ImporteTotal'];
$Impuesto = $_POST['Impuesto'];
$Impuesto_Total = $_POST['Impuesto_Total'];
$Monto_Total = $_POST['Monto_Total'];
$Observaciones = $_POST['Observaciones'];

$sql = "UPDATE trs_factura SET ID_Cliente='$ID_Cliente', Monto_ImporteTotal='$Monto_ImporteTotal', Impuesto='$Impuesto', Impuesto_Total='$Impuesto_Total', Monto_Total='$Monto_Total' , Observaciones='$Observaciones'
WHERE ID_Factura = '$id'";

if(mysqli_query($mysqli, $sql)){
        echo '<script>';
        echo 'Swal.fire({';
                echo '   icon: "success",';
                echo '   title: "Se Guardo Correctamente",';
                echo '    showConfirmButton: false,';
                echo '    timer: 1300';
        echo '}).then(function(result) {';
        echo 'window.location="../Fronted/Factura.php";';
        echo '});';
        echo '</script>';
} else {
        echo '<script>';
        echo 'Swal.fire({';
                echo '   icon: "error",';
                echo '   title: "NO Se Guardo Correctamente",';
                echo '   showConfirmButton: false,';
                echo '   timer: 1300';
        echo '}).then(function(result) {';
        echo 'window.location="../Fronted/Factura.php";';
        echo '});';
        echo '</script>';
}
?>
