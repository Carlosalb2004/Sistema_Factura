
<?php
include("codigosw2.php");
include("config.php");
include("session.php");

$ID_Factura = $_POST['ID_Factura'];
$ID_Articulo=$_POST['ID_Articulo'];
$Cantidad=$_POST['Cantidad'];
$sql="INSERT INTO trs_ordenfactura(ID_Factura,ID_Articulo,Cantidad) VALUES
('$ID_Factura','$ID_Articulo','$Cantidad')";

if(mysqli_query($mysqli, $sql)){
echo '<script>';
echo 'Swal.fire({';
        echo '   icon: "success",';
        echo '   title: "Nuevo agregado",';
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
        echo '   title: " no creado",';
        echo '   showConfirmButton: false,';
        echo '   timer: 1300';
echo '}).then(function(result) {';
    echo 'window.history.go(-2);';
echo '});';
echo '</script>';
}
?>