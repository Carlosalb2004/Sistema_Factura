
<?php
include("codigosw2.php");
include("config.php");
include("session.php");

$ID_Articulo=$_POST['ID_Articulo'];
$ID_Categoria=$_POST['ID_Categoria'];
$Nombre=$_POST['Nombre'];
$Stock=$_POST['Stock'];
$Precio=$_POST['Precio'];

$sql="INSERT INTO mae_articulo(ID_Articulo,ID_Categoria,Nombre,Stock,Precio) VALUES
('$ID_Articulo','$ID_Categoria','$Nombre','$Stock','$Precio')";

if(mysqli_query($mysqli, $sql)){
echo '<script>';
echo 'Swal.fire({';
        echo '   icon: "success",';
        echo '   title: "Nuevo usuario agregado",';
        echo '    showConfirmButton: false,';
        echo '    timer: 1300';
echo '}).then(function(result) {';
    echo 'window.location="../Fronted/Articulos.php";';
echo '});';
echo '</script>';
} else {
echo '<script>';
echo 'Swal.fire({';
        echo '   icon: "error",';
        echo '   title: "Usuario no creado",';
        echo '   showConfirmButton: false,';
        echo '   timer: 1300';
echo '}).then(function(result) {';
    echo 'window.location="../Fronted/Registration_Articulo.php";';
echo '});';
echo '</script>';
}
?>

