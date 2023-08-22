<?php
require_once "vistas/parte_superior.php";

?>
<?php
$query = "SELECT * FROM trs_factura";
$result = filterRecord($query);

function filterRecord($query)
{
    include("../BD/config.php");
    $filter_result = mysqli_query($mysqli, $query);
    return $filter_result;
}

?>
<!-- INICIO del cont principal -->
<div class="container">
    <center>
        <h1>Facturas</h1>
    </center>
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <a class="btn btn-success" type="button" href="Registration_Factura.php">Nueva Factura</a>
                <br>
                <br>
            </div>
        </div>
    </div>
    <br>
    <div class="container">
        <div class="row">
            <div class="col-lg-15">
                <div class="table-responsive">
                    <?php
                    echo "<table id='example' class='table table-striped table-bordered table-condensed' style='width:80%'>
<thead class='text-center'>
<tr>
<th># Factura</th>
<th>Cliente </th>
<th>Fecha</th>
<th>Vendedor</th>
<th>Luga</th>
<th>Modo de Pago</th>
<th>Monto Total</th>
<th>Observaciones</th>
<th>Acciones</th>
</tr>
</thead>";
                    while ($row = mysqli_fetch_array($result)) {
                        echo "<tr>";
                        echo "<td>" . $row['ID_Factura'] . "</td>";

                        $Cliente_query = "SELECT * FROM mae_cliente WHERE ID_Cliente = " . $row['ID_Cliente'];
                        $Cliente_result = filterRecord($Cliente_query);
                        $Cliente_row = mysqli_fetch_array($Cliente_result);
                        echo "<td>" . $Cliente_row['Nombres_Apellidos'] . "</td>";
                        echo "<td>" . $row['Fecha'] . "</td>";
                        $Vendedor_query = "SELECT * FROM mae_vendedor WHERE ID_Vendedor = " . $row['ID_Vendedor'];
                        $Vendedor_result = filterRecord($Vendedor_query);
                        $Vendedor_row = mysqli_fetch_array($Vendedor_result);
                        echo "<td>" . $Vendedor_row['Nombres'] ." ". $Vendedor_row['Apellidos'] . "</td>";
                        $Vendedor_query = "SELECT * FROM mae_puntoventa WHERE ID_PuntoVenta = " . $row['ID_PuntoVenta'];
                        $Vendedor_result = filterRecord($Vendedor_query);
                        $Vendedor_row = mysqli_fetch_array($Vendedor_result);
                        echo "<td>" . $Vendedor_row['Nombre']. "</td>";
                        $Vendedor_query = "SELECT * FROM mae_modopago WHERE ID_ModoPago = " . $row['ID_ModoPago'];
                        $Vendedor_result = filterRecord($Vendedor_query);
                        $Vendedor_row = mysqli_fetch_array($Vendedor_result);
                        echo "<td>" . $Vendedor_row['Nombre']. "</td>";
                        echo "<td> S/. " . $row['Monto_Total'] . "</td>";
                        echo "<td>" . $row['Observaciones'] . "</td>";
                        echo "<td >";
                        echo "<div class='text-center'>";
                        echo "<div class='btn-group'>";
                        echo "<a  type='button' id='btn-editar-popup-user'class='btn btn-info'  href='imprimir.php?id=" . $row['ID_Factura'] . "'>Imprimir</a>";
                        echo "<a  type='button' id='btn-editar-popup-user'class='btn btn-light'  href='Detalles.php?id=" . $row['ID_Factura'] . "'>Detalles</a>";
                        // echo "<a  type='button' id='btn-editar-popup-user'class='btn btn-light'  href='Edit_Factura.php?id=" . $row['ID_Factura'] . "'>Editar</a>";
                        echo "<a  type='button' class='btn btn-danger btnBorrar' href='../BD/Delete_Factura.php?id=" . $row['ID_Factura'] . "'>Borrar</a>";
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
<!-- FIN del cont principal -->
<?php require_once "vistas/parte_inferior.php" ?>
