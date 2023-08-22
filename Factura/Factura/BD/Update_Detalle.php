
<?php
include("codigosw2.php");
include("config.php");
include("session.php");

$id = $_POST['id'];

$ID_Articulo = $_POST['ID_Articulo']; 
$Cantidad = $_POST['Cantidad'];

$sql = "UPDATE trs_ordenfactura SET ID_Articulo='$ID_Articulo',Cantidad='$Cantidad'
WHERE ID_OrdenFactura = '$id'";

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
