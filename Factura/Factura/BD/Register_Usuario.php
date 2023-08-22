
<?php
include("codigosw2.php");
include("config.php");
include("session.php");

$T_Documento=$_POST['T_Documento'];
$ID_Vendedor=$_POST['ID_Vendedor'];
$Nombres=$_POST['Nombres'];
$Apellidos=$_POST['Apellidos'];
$Mobile=$_POST['Mobile'];
$Email=$_POST['Email'];
$Username=$_POST['Username'];
$Password=$_POST['Password'];

$sql="INSERT INTO mae_vendedor(T_Documento,ID_Vendedor,Nombres,Apellidos,Mobile,Email,Username,Password) VALUES
('$T_Documento','$ID_Vendedor','$Nombres','$Apellidos','$Mobile','$Email','$Username','$Password')";

if(mysqli_query($mysqli, $sql)){
echo '<script>';
echo 'Swal.fire({';
        echo '   icon: "success",';
        echo '   title: "Nuevo usuario agregado",';
        echo '    showConfirmButton: false,';
        echo '    timer: 1300';
echo '}).then(function(result) {';
    echo 'window.location="../Fronted/Usuarios.php";';
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
    echo 'window.location="../Fronted/Registration_Usuario.php";';
echo '});';
echo '</script>';
}
?>

