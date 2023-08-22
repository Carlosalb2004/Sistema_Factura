<?php
include("codigosw2.php");
include("config.php");
include("session.php");

$T_Documento=$_POST['T_Documento'];
$ID_Cliente=$_POST['ID_Cliente'];
$Nombres_Apellidos=$_POST['Nombres_Apellidos'];
$Email=$_POST['Email'];
$Mobile=$_POST['Mobile'];
$Direccion=$_POST['Direccion'];

$sql="INSERT INTO mae_cliente(T_Documento, ID_Cliente, Nombres_Apellidos, Email, Mobile, Direccion) VALUES
('$T_Documento','$ID_Cliente','$Nombres_Apellidos','$Email','$Mobile','$Direccion')";

if(mysqli_query($mysqli, $sql))
{
    echo '<script>';
    echo 'Swal.fire({';
            echo '   icon: "success",';
            echo '   title: "Nuevo Cliente agregado",';
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
            echo '   title: "Cliente no creado",';
            echo '   showConfirmButton: false,';
            echo '   timer: 1300';
    echo '}).then(function(result) {';
        echo 'window.location="../Fronted/registration_cliente.php";';
    echo '});';
    echo '</script>';
    }
    ?>

