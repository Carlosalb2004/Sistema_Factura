<?php
include("codigosw2.php");
include("config.php");
include("session.php");
$id=$_GET['id'];
$sql="DELETE FROM mae_cliente WHERE ID_Cliente='$id'";
if(mysqli_query($mysqli, $sql))
{
    echo '<script>';
    echo 'Swal.fire({';
            echo '   icon: "success",';
            echo '   title: "Cliente Eliminado",';
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
            echo '   title: "Cliente no Eliminado",';
            echo '   showConfirmButton: false,';
            echo '   timer: 1300';
    echo '}).then(function(result) {';
        echo 'window.location="../Fronted/Clientes.php";';
    echo '});';
    echo '</script>';
    }
    ?>