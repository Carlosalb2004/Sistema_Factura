<?php
require_once "vistas/parte_superior.php"
?>
<?php
if (isset($_POTS['search'])) {
    $valueToSearch = $_POST['valueToSearch'];
    $query = "SELECT * FROM serviciocliente WHERE Id_servicio LIKE '%" . $valueToSearch . "%' OR last_name LIKE '%" . $valueToSearch . "%'";
    $result = filterRecord($query);
} else {
    $query = "SELECT *FROM serviciocliente";
    $result = filterRecord($query);
}

function filterRecord($query)
{
    include("../BD/config.php");
    $filter_result = mysqli_query($mysqli, $query);
    return $filter_result;
}

?>
<!--INICIO del cont principal-->
<div class="container">
    <Center>
        <h1>Servicio Cliente</h1>
    </Center>
    <div class="container">

        <div class="row">
            <div class="col-lg-12">
                <a  class="btn btn-success" type="button"  href="registration_ServicioCliente.php" >Nuevo</a>
<br>
<br>
                <!-- <form action="" method="POST">
                    <input type="search" name="valueToSearch" placeholder="Búsqueda" style="
    width: 49%;
    margin-bottom: 15px;
    padding: 5px;
    padding-left: 6px;
    border: 0;
    border-bottom: 1px solid #5cb8ff;
    font-size: 17px;
    border-radius: 3px;
">
                    <button type="submit" class="btn" name="search">Buscar</button>
                    </from> -->
            </div>
            </div>

    </div>
    <br>
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="table-responsive">
                    <?php
                    echo "<table id='example' class='table table-striped table-bordered table-condensed' style='width:100%'>
<thead class='text-center'>
<tr>
<th>Codigo</th>
<th>Codigo Cliente</th>
<th>Codigo Servicio</th>
<th>Codigo Usuario</th>
<th>Fecha</th>
<th>Acciones</th>
</tr></thead>";
                    while ($row = mysqli_fetch_array($result)) {
                        echo "<tr>";
                        echo "<td>" . $row['idServicioCliente'] . "</td>";
                        echo "<td>" . $row['idCliente'] . "</td>";
                        echo "<td>" . $row['idServicio'] . "</td>";
                        echo "<td>" . $row['idUsername'] . "</td>";
                        echo "<td>" . $row['fecha'] . "</td>";
                        echo "<td >";
                        echo "<div class='text-center'>";
                        echo "<div class='btn-group'>";
                        echo "<a  type='button' id='btn-editar-popup-user'class='btn btn-light'  href='edit__ServicioCliente.php?id=" . $row['idServicioCliente'] . "'>Editar</a>";
                        echo "<a  type='button' class='btn btn-danger btnBorrar' href='../BD/deleteServiciosCliente.php?id=" . $row['idServicioCliente'] . "'>Borrar</a>";
                        echo "</div></div></td>";
                        echo "</tr>";
                    }
                    echo "</table>";
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>
<!--FIN del cont principal-->
<?php require_once "vistas/parte_inferior.php" ?>