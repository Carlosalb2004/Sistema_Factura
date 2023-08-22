<?php
include("codigosw2.php");
include("config.php");
include("session.php");
$id=$_GET['id'];
$sql="DELETE FROM mae_articulo WHERE ID_Articulo='$id'";
if(mysqli_query($mysqli, $sql))
{
    echo '<script>';
    echo 'Swal.fire({';
            echo '   icon: "success",';
            echo '   title: "Artiulo Eliminado",';
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
            echo '   title: "Artiulo no Eliminado",';
            echo '   showConfirmButton: false,';
            echo '   timer: 1300';
    echo '}).then(function(result) {';
        echo 'window.location="../Fronted/Articulos.php";';
    echo '});';
    echo '</script>';
    }
    ?>