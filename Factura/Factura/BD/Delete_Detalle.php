<?php
include("codigosw2.php");
include("config.php");
include("session.php");
$id=$_GET['id'];
$sql="DELETE FROM trs_ordenfactura WHERE ID_OrdenFactura='$id'";
if(mysqli_query($mysqli, $sql))
{
    echo '<script>';
    echo 'Swal.fire({';
            echo '   icon: "success",';
            echo '   title: "Articulo Eliminado",';
            echo '    showConfirmButton: false,';
            echo '    timer: 1300';
    echo '}).then(function(result) {';
        echo 'window.history.go(-1);';
    echo '});';
    echo '</script>';
    } else {
    echo '<script>';
    echo 'Swal.fire({';
            echo '   icon: "error",';
            echo '   title: "Articulo no Eliminado",';
            echo '   showConfirmButton: false,';
            echo '   timer: 1300';
    echo '}).then(function(result) {';
        echo 'window.history.go(-1);';
    echo '});';
    echo '</script>';
    }
    ?>