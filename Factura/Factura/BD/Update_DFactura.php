
<?php
include("codigosw2.php");
include("config.php");
include("session.php");

$id = $_POST['id'];

$ID_Cliente = $_POST['ID_Cliente'];

$sql = "UPDATE trs_factura SET ID_Cliente='$ID_Cliente'
WHERE ID_Factura = '$id'";

if(mysqli_query($mysqli, $sql)){
        echo '<script>';
        echo 'Swal.fire({';
                echo '   icon: "success",';
                echo '   title: "Producto modificado",';
                echo '    showConfirmButton: false,';
                echo '    timer: 1300';
        echo '}).then(function(result) {';
                echo 'window.history.go(-2);';
        echo '});';
        echo '</script>';
} else {
        echo '<script>';
        echo 'Swal.fire({';
                echo '   icon: "error",';
                echo '   title: "Producto no modificado",';
                echo '   showConfirmButton: false,';
                echo '   timer: 1300';
        echo '}).then(function(result) {';
                echo 'window.history.go(-2);';
        echo '});';
        echo '</script>';
}
