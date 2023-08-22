<?php
include("codigosw2.php");
include("config.php");
include("session.php");
$id=$_GET['id'];
$sql_detalle = "DELETE FROM trs_ordenfactura WHERE ID_Factura='$id'";
$result_detalle = mysqli_query($mysqli, $sql_detalle);


$sql="DELETE FROM trs_factura WHERE ID_Factura='$id'";
if(mysqli_query($mysqli, $sql))
{
    echo '<script>';
    echo 'Swal.fire({';
            echo '   icon: "success",';
            echo '   title: "Factura Eliminado",';
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
            echo '   title: "Factura no Eliminado",';
            echo '   showConfirmButton: false,';
            echo '   timer: 1300';
    echo '}).then(function(result) {';
        echo 'window.location="../Fronted/Factura.php";';
    echo '});';
    echo '</script>';
    }
    ?>