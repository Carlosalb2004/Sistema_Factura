
<?php
include("codigosw2.php");
include("config.php");
include("session.php");

$id = $_POST['id'];

$T_Documento = $_POST['T_Documento'];
$ID_Vendedor = $_POST['ID_Vendedor'];

$nombres = $_POST['nombres'];
$apellidos = $_POST['apellidos'];
$mobile = $_POST['mobile'];
$email = $_POST['email'];
$username = $_POST['username'];
$password = $_POST['password'];

$sql = "UPDATE mae_vendedor SET T_Documento='$T_Documento',ID_Vendedor='$ID_Vendedor', Nombres='$nombres', Apellidos='$apellidos', Mobile='$mobile', Email='$email', Username='$username', Password='$password'
WHERE ID_Vendedor = '$id'";

if(mysqli_query($mysqli, $sql)){
        echo '<script>';
        echo 'Swal.fire({';
                echo '   icon: "success",';
                echo '   title: "Usuario modificado",';
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
                echo '   title: "Usuario no modificado",';
                echo '   showConfirmButton: false,';
                echo '   timer: 1300';
        echo '}).then(function(result) {';
        echo 'window.location="../Fronted/Usuarios.php";';
        echo '});';
        echo '</script>';
}
