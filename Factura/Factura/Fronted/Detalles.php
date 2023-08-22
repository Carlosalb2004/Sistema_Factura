<?php
require_once "vistas/parte_superior.php";
$id = $_GET['id'];
?>
<?php
$query = "SELECT * FROM trs_factura where ID_Factura = '$id'";
$result = filterRecord($query);
if ($result) {
    $facturarrow = mysqli_fetch_array($result);
    // Resto del código que utiliza $vendedorrow
    } else {
      echo "Error al ejecutar la consulta";
    }
function filterRecord($query)
{
    include("../BD/config.php");
    $filter_result = mysqli_query($mysqli, $query);
    return $filter_result;
}
?>
<script src="invoice.js"></script>
<!-- INICIO del cont principal -->
<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <center>
                <h1>Factura</h1>
            </center>
            <hr>
            <div class="row">
                <div class="col-md-6">
                    <!-- Información del cliente -->
                    <h4>Información del Cliente:</h4>
                    <table class="table table-striped">
                        <tbody>
                                <tr>
                                
    <form action="../BD/Guardar_Factura.php" method="POST">
    <?php
    $vquery = "SELECT * FROM mae_cliente WHERE ID_Cliente ='" . $facturarrow['ID_Cliente'] . "'";
    $V_result = filterRecord($vquery);
    if ($V_result) {
      $rows = mysqli_fetch_array($V_result);
      // Resto del código que utiliza $vendedorrow
      } else {
        echo "Error al ejecutar la consulta";
      }
                        echo "<input type='hidden' name='id' value='{$id}' readonly>";
                        echo "   <div class='modal-body'>";
                        echo "   <div class='form-group' action='../BD/register.php' method='POST'>";
                        echo "       <label for='ID_Cliente' class='col-form-label'>Numero de Documento :</label>";
                        echo "       <input type='text' class='form-control' pplaceholder=''value='{$rows['ID_Cliente']}' name='ID_Cliente' id='ID_Cliente'>";
                        echo "   </div>";
                        echo "   <div class='form-group' action='../BD/register.php' method='POST'>";
                        echo "       <label for='Nombres_Apellidos' class='col-form-label'>Nombres y Apellidos :</label>";
                        echo "       <input type='text' class='form-control' pplaceholder=''value='{$rows['Nombres_Apellidos']}' id='Nombres_Apellidos' readonly>";
                        echo "   </div>";
                        echo "  <div class='form-group'>";
                        echo "     <label for='middlename' class='col-form-label'>Correo :</label>";
                        echo "     <input type='text' class='form-control' placeholder='' value='{$rows['Email']}' id='Email' readonly>";
                        echo " </div>";
                        echo " <div class='form-group'>";
                        echo "     <label for='Mobile' class='col-form-label'>Celular :</label>";
                        echo "     <input type='text' class='form-control' placeholder=''  value='{$rows['Mobile']}' id='Mobile' readonly>";
                        echo "  </div>";
                        echo "  <div class='form-group'>";
                        echo "      <label for='Direccion' class='col-form-label'>Direccion :</label>";
                        echo "     <input  type='text' class='form-control' placeholder='' value='{$rows['Direccion']}' id='Direccion' readonly>";
                        echo "  </div>";
                        echo " </div>";
                                        ?>
</div>
<script>
    document.getElementById("ID_Cliente").addEventListener("input", function() {
        // Obtener el valor del ID_Cliente ingresado
        var documento = this.value;
        
        // Crear una solicitud AJAX para buscar los datos del cliente
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                // Procesar la respuesta y asignar los datos a los campos correspondientes
                var response = JSON.parse(this.responseText);
                document.getElementById("Nombres_Apellidos").value = response.Nombres_Apellidos;
                document.getElementById("Email").value = response.Email;
                document.getElementById("Mobile").value = response.Mobile;
                document.getElementById("Direccion").value = response.Direccion;
            }
        };
        xhttp.open("GET", "buscar_cliente.php?documento=" + documento, true);
        xhttp.send();
    });
</script>
                                </tr>
                        </tbody>
                    </table>
                    
                    <!-- Mostrar aquí los detalles del cliente, como nombre, dirección, etc. -->
                </div>
                <div class="col-md-6">
                    <!-- Detalles de la factura -->
                    <h4>Detalles de la Factura:</h4>
                    <table class="table table-striped">
                        <tbody>
                                <tr>
                                <?php
                        echo "   <div class='modal-body'>";
                        echo "   <div class='form-group' action='../BD/register.php' method='POST'>";
                        echo "       <label for='firstname' class='col-form-label'>Factura :</label>";
                        echo "       <input type='text' class='form-control' pplaceholder=''value='{$facturarrow['ID_Factura']}' name='Id_servicios' readonly>";
                        echo "   </div>";
                        echo "  <div class='form-group'>";
                        echo "     <label for='middlename' class='col-form-label'>Fecha :</label>";
                        echo "     <input type='text' class='form-control' placeholder='' value='{$facturarrow['Fecha']}' name='Nombre_servicio' readonly>";
                        echo " </div>";
                        echo " <div class='form-group'>";
                        $vquery = "SELECT * FROM mae_Vendedor WHERE ID_Vendedor ='" . $facturarrow['ID_Vendedor'] . "'";
                        $V_result = filterRecord($vquery);
                        if ($V_result) {
                          $rows = mysqli_fetch_array($V_result);
                    
                          } else {
                            echo "Error al ejecutar la consulta";
                          }
                        echo "     <label for='lastname' class='col-form-label'>Vendedor :</label>";
                        echo "     <input type='text' class='form-control' placeholder=''  value='{$rows['Nombres']}' name='Costo_servicio' readonly>";
                        echo "  </div>";
                        echo "  <div class='form-group'>";
                        $vquery = "SELECT * FROM mae_puntoventa WHERE ID_PuntoVenta ='" . $facturarrow['ID_PuntoVenta'] . "'";
                        $V_result = filterRecord($vquery);
                        if ($V_result) {
                          $rows = mysqli_fetch_array($V_result);
                    
                          } else {
                            echo "Error al ejecutar la consulta";
                          }
                        echo "      <label for='birthdate' class='col-form-label'>Lugar :</label>";
                        echo "     <input  type='text' class='form-control' placeholder='' value='{$rows['Nombre']}' name='Observaciones' readonly>";
                        echo "  </div>";
                        $vquery = "SELECT * FROM mae_modopago WHERE ID_ModoPago ='" . $facturarrow['ID_ModoPago'] . "'";
                        $V_result = filterRecord($vquery);
                        if ($V_result) {
                          $rows = mysqli_fetch_array($V_result);
                    
                          } else {
                            echo "Error al ejecutar la consulta";
                          }
                        echo "      <label for='birthdate' class='col-form-label'>Modo de Pago :</label>";
                        echo "     <input  type='text' class='form-control' placeholder='' value='{$rows['Nombre']}' name='Observaciones' readonly>";
                        echo "  </div>";
                        echo " </div>";
                                        ?>
                                </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <hr>
            <div class="row">
                <div class="col-lg-12">
                    <!-- Detalles de los productos/servicios -->
                    <!-- <h4>Detalles de los Productos/Servicios:</h4> -->
            <div class="row">

            <div class="container">
        <div class="row">
            <div class="col-lg-12">
            <?php
            $querydetalle = "SELECT * FROM trs_ordenfactura where ID_Factura = '$id' " ;
            $resultdetalle = filterRecord($querydetalle);
            if ($resultdetalle) {
                $P_row = mysqli_fetch_array($resultdetalle);
          
                } else {
                  echo "Error al ejecutar la consulta";
                }
            echo "<a  type='button' class='btn btn-success' href='Registration_Detalle.php?id=" . $id . "'>Agregar Mas</a>"; 
?>
                <br>
                <br>
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
<th >Codigo</th>
<th >Nombre</th>
<th >Cantidad</th>
<th >Precio</th>
<th >Total</th>
<th>Acciones</th>
</tr>
</thead>";
$subto=0;
$querydetalle = "SELECT * FROM trs_ordenfactura where ID_Factura = '$id' " ;
$resultdetalle = filterRecord($querydetalle);
                    while ($row = mysqli_fetch_array($resultdetalle)) {
                        echo "<tr>";
                        $Producto_query = "SELECT * FROM mae_articulo WHERE ID_Articulo = " . $row['ID_Articulo'];
                        $Producto_result = filterRecord($Producto_query);
                        if ($Producto_result) {
                            $Producto_row = mysqli_fetch_array($Producto_result);
                        } 
                        $importeFinal = ($Producto_row['Precio'] * $row['Cantidad']);
                        echo "<td>" . $row['ID_Articulo'] . "</td>";
                        echo "<td>" . $Producto_row['Nombre'] . "</td>";
                        echo "<td>" . $row['Cantidad'] . "</td>";
                        echo "<td> S/ " . $Producto_row['Precio'] . "</td>";
                        echo "<td> S/ " . number_format((float)$importeFinal, 2, '.', ''). "</td>";
                        $subto = $subto +$importeFinal;
                        $updateQuery = "UPDATE trs_ordenfactura SET Importe_Final = $importeFinal WHERE ID_OrdenFactura = " . $row['ID_OrdenFactura'];
                        $result = filterRecord($updateQuery);
                        echo "<td >";
                        echo "<div class='text-center'>";
                        echo "<div class='btn-group'>";
                        echo "<a  type='button' id='btn-editar-popup-user'class='btn btn-light'  href='Edit_Detalle.php?id=" . $row['ID_OrdenFactura'] . "'>Editar</a>";
                        echo "<a  type='button' class='btn btn-danger btnBorrar' href='../BD/Delete_Detalle.php?id=" . $row['ID_OrdenFactura'] . "'>Borrar</a>";
                        echo "</div></div></td>";
                        echo "</tr>";
                    }
                    echo "</table>";

                    $querdetalle = "SELECT * FROM trs_factura where ID_Factura = '$id' " ;
                    $resuldetallef = filterRecord($querdetalle);
                    if ($resuldetallef) {
                        $P_rowdf = mysqli_fetch_array($resuldetallef);
                  
                        }
                    ?>
                </div>
            </div>
        </div>
    </div>
			</div>
            <div class="row">
				<div class="col-xs-12 col-sm-8 col-md-8 col-lg-7">
                    <br>
					<h3>Observaciones: </h3>
					<div class="form-group">
                    <textarea class="form-control txt" rows="5" name="Observaciones"><?php echo $P_rowdf['Observaciones']; ?></textarea>

					</div>
					<br>


                    </div>
                    
				<div class="col-xs-1 col-sm-4 col-md-4 col-lg-5">
                <div class="modal-body">
                    <div class="modal-body">
                    <div class="form-group">

                    <label>Sub Total: &nbsp;</label>
<div class="input-group">
<div class="input-group-append">
    <span class="input-group-text">
      <i class=""> S/.</i>
    </span>
  </div>
  <input value="<?php echo $subto; ?>" type="number" class="form-control" name="Monto_ImporteTotal" id="Monto_ImporteTotal" placeholder="Monto_ImporteTotal" readonly>
</div>
<div class='form-group'></div>
<div class="form-group">
    <label>Porcentaje Impuestos: &nbsp;</label>
    
    <div class="input-group">
    <div class="input-group-append">
    <span class="input-group-text">
      <i class=""> %</i>
    </span>
  </div>
        <input value="<?php echo "18"; ?>" type="number" class="form-control" name="Impuesto" id="Impuesto" placeholder="Porcentaje Impuestos" oninput="calculateValues()">
    </div>
</div>
<div class="form-group">
    <label>Monto impuestos: &nbsp;</label>
    <div class="input-group">
    <div class="input-group-append">
    <span class="input-group-text">
      <i class=""> S/.</i>
    </span>
  </div>
  <?php
  $resultadototal = bcdiv(bcmul($subto, '18'), '118', 2);
?>
        <input value="<?php echo bcdiv(bcmul($subto, '18'), '118', 2); ?>" type="number" class="form-control" name="Impuesto_Total" id="Impuesto_Total" placeholder="Monto impuestos" readonly>
    </div>
</div>
<div class="form-group">
    <label>Total: &nbsp;</label>
    <div class="input-group">
    <div class="input-group-append">
    <span class="input-group-text">
      <i class=""> S/.</i>
    </span>
  </div>
        <input value="<?php echo $subto + $resultadototal; ?>" type="number" class="form-control" name="Monto_Total" id="Monto_Total" placeholder="Total" readonly>
    </div>
</div>

<script>
    function calculateValues() {
        var Monto_ImporteTotal = <?php echo $subto; ?>;
        document.getElementById('Monto_ImporteTotal').value = Monto_ImporteTotal.toFixed(2);
        
        var Impuesto = parseFloat(document.getElementById('Impuesto').value);


        var Impuesto_Total = Monto_ImporteTotal * (Impuesto / 118);
        var total = Monto_ImporteTotal + Impuesto_Total;

        document.getElementById('Monto_ImporteTotal').value = Monto_ImporteTotal.toFixed(2);
        document.getElementById('Impuesto_Total').value = Impuesto_Total.toFixed(2);
        document.getElementById('Monto_Total').value = total.toFixed(2);

        var amountPaid = parseFloat(document.getElementById('amountPaid').value);
        document.getElementById('Monto_ImporteTotal').value = Monto_ImporteTotal.toFixed(2);
        document.getElementById('Impuesto_Total').value = Impuesto_Total.toFixed(2);
        document.getElementById('Monto_Total').value = total.toFixed(2);
    }
    
</script>
					</span>
				</div>
                <div class="form-group">
						<input type="hidden" value="<?php echo $_SESSION['userid']; ?>" class="form-control" name="userId">
						<input data-loading-text="Guardando factura..." type="submit" name="invoice_btn" value="Guardar factura" class="btn btn-success submit_btn invoice-save-btm">
					</div>
                </div>
                </div>
			</div>
			<div class="clearfix"></div>
                </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- FIN del cont principal -->
<?php require_once "vistas/parte_inferior.php" ?>
