
<?php
include("codigosw2.php");
include("config.php");
include("session.php");

$id = $_POST['id'];
$T_Documento = $_POST['T_Documento'];
$ID_Cliente = $_POST['ID_Cliente'];
$Nombres_Apellidos = $_POST['Nombres_Apellidos'];
$Email = $_POST['Email'];
$Mobile = $_POST['Mobile'];
$Direccion = $_POST['Direccion'];

$sql = "UPDATE mae_cliente SET T_Documento='$T_Documento', ID_Cliente='$ID_Cliente', Nombres_Apellidos='$Nombres_Apellidos', Email='$Email' , Mobile='$Mobile', Direccion='$Direccion'
WHERE ID_Cliente = '$id'";

if(mysqli_query($mysqli, $sql)){
        echo '<script>';
        echo 'Swal.fire({';
                echo '   icon: "success",';
                echo '   title: "Cliente modificado",';
                echo '    showConfirmButton: false,';
                echo '    timer: 1300';
        echo '}).then(function(result) {';
        echo 'window.location="../Fronted/Clientes.php";';
        echo '});';
        echo '</script>';
} else {
        echo '<script>';
        echo 'Swal.fire({';
                echo '   icon: "error",';
                echo '   title: "Cliente no modificado",';
                echo '   showConfirmButton: false,';
                echo '   timer: 1300';
        echo '}).then(function(result) {';
        echo 'window.location="../Fronted/Clientes.php";';
        echo '});';
        echo '</script>';
}
?>
