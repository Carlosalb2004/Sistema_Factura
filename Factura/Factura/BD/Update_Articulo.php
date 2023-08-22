
<?php
include("codigosw2.php");
include("config.php");
include("session.php");

$id = $_POST['id'];

$ID_Articulo = $_POST['ID_Articulo'];
$ID_Categoria = $_POST['ID_Categoria'];
$Nombre = $_POST['Nombre'];
$Stock = $_POST['Stock'];
$Precio=$_POST['Precio'];

$sql = "UPDATE mae_articulo SET ID_Articulo='$ID_Articulo',ID_Categoria='$ID_Categoria', Nombre='$Nombre', Stock='$Stock', Precio='$Precio'
WHERE ID_Articulo = '$id'";

if(mysqli_query($mysqli, $sql)){
        echo '<script>';
        echo 'Swal.fire({';
                echo '   icon: "success",';
                echo '   title: "Usuario modificado",';
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
                echo '   title: "Usuario no modificado",';
                echo '   showConfirmButton: false,';
                echo '   timer: 1300';
        echo '}).then(function(result) {';
        echo 'window.location="../Fronted/Articulos.php";';
        echo '});';
        echo '</script>';
}
