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
                            <?php while ($row = mysqli_fetch_array($result)) { ?>
                                <tr>
                                
    <form>
    <div class="modal-body">
        <div class="form-group">
            <label for="ID_Cliente" class="col-form-label">N. Documento:</label>
            <input type="text" class="form-control" placeholder="" id="ID_Cliente" required>
        </div>
        <div class="form-group">
            <label for="Nombres_Apellidos" class="col-form-label">Nombres y Apellidos:</label>
            <input type="text" class="form-control" placeholder="" id="Nombres_Apellidos" readonly>
        </div>
        <div class="form-group">
            <label for="Email" class="col-form-label">Email:</label>
            <input type="text" class="form-control" placeholder="" id="Email" readonly>
        </div>
        <div class="form-group">
            <label for="Mobile" class="col-form-label">Celular:</label>
            <input type="text" class="form-control" placeholder="" id="Mobile" readonly>
        </div>
        <div class="form-group">
            <label for="Direccion" class="col-form-label">Dirección:</label>
            <input type="text" class="form-control" placeholder="" id="Direccion" readonly>
        </div>
    
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
                                <div class="modal-body">
                                <div class="form-group">
                                    <label for="codigo" class="col-form-label">Código:</label>
                                    <input type="text" class="form-control" placeholder="" id="ID_Factura" name="ID_Factura" readonly>
                                </div>
                                <div class="form-group">
                                    <label for="fecha" class="col-form-label">Fecha:</label>
                                    <input type="text" class="form-control" placeholder="" id="Fecha" name="Fecha" readonly>
                                </div>

                                <script>
                                    // Obtener el elemento de código y fecha
                                    var codigoInput = document.getElementById("ID_Factura");
                                    var fechaInput = document.getElementById("Fecha");

                                    // Generar el código automático
                                    var codigoInicial = 10000;
                                    var codigoActual = codigoInicial + 1;
                                    codigoInput.value = codigoActual;

                                    // Obtener la fecha actual
                                    var fechaActual = new Date();
                                    var fechaFormateada = fechaActual.toLocaleDateString();
                                    fechaInput.value = fechaFormateada;
                                </script>
                                            <div class="form-group">
                                            <?php
                                                // $vendedorquery = "SELECT * FROM mae_vendedor WHERE Username = " .$_SESSION['user'];
                                                // $Vendedor_result = filterRecord($vendedorquery);
                                                // $vendedorrow = mysqli_fetch_array($Vendedor_result);
                                                
                                                ?>
                                                <label for="ID_Vendedor" class="col-form-label">Vendedor :</label>
                                                <!-- <input type="text" class="form-control" placeholder="" value="<?php echo  $vendedorrow['Nombres'] ." ". $vendedorrow['Apellidos'] ; ?>" readonly> -->
                                                <input type="text" class="form-control" placeholder="" value="<?php echo  $_SESSION['user'] ; ?>" readonly>
                                                <input type='hidden' name='ID_Vendedor' value='{$row['ID_Vendedor']}' required>
                                            </div>
                                            <div class="form-group">
                                                <label for="middlename" class="col-form-label">Lugar :</label>
                                                <select type="text" class="form-control" placeholder=""  required name="ID_PuntoVenta" >
                                                    <option value=""> Seleccione </option>
                                                    <?php
                                                    $querylugar = "SELECT * FROM mae_puntoventa";
                                                    $resultlugar = filterRecord($querylugar);
                                                    while ($rowlugar = mysqli_fetch_array($resultlugar)) {
                                                        echo '<option value="' . $rowlugar['ID_PuntoVenta'] . '">' . $rowlugar['Nombre'] . '</option>';
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="middlename" class="col-form-label">Metodo Pago :</label>
                                                <select type="text" class="form-control" placeholder=""  required name="ID_ModoPago" >
                                                    <option value=""> Seleccione </option>
                                                    <?php
                                                    $querypago = "SELECT * FROM mae_modopago";
                                                    $resultpago = filterRecord($querypago);
                                                    while ($rowpago = mysqli_fetch_array($resultpago)) {
                                                        echo '<option value="' . $rowpago['ID_ModoPago'] . '">' . $rowpago['Nombre'] . '</option>';
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                </tr>
                            <?php } ?>
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
            <?php
            $querydetalle = "SELECT * FROM trs_ordenfactura";
            $resultdetalle = filterRecord($querydetalle);
?>
            <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <a class="btn btn-success" type="button" href="Registration_Detalle.php?id="ID_Factura">Agregar Mas</a>
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
<th >Precio</th>
<th >Cantidad</th>
<th >Total</th>
<th>Acciones</th>
</tr>
</thead>";
                    while ($row = mysqli_fetch_array($resultdetalle)) {
                        echo "<tr>";
                        $Producto_query = "SELECT * FROM mae_articulo WHERE ID_Articulo = " . $row['ID_Articulo'];
                        $Producto_result = filterRecord($Producto_query);
                        $Producto_row = mysqli_fetch_array($Producto_result);
                        echo "<td>" . $row['ID_Articulo'] . "</td>";
                        echo "<td>" . $Producto_row['Nombre'] . "</td>";
                        echo "<td>" . $Producto_row['Precio'] . "</td>";
                        echo "<td>" . $row['Cantidad'] . "</td>";
                        echo "<td>" . $row['Importe_Final'] . "</td>";

                        echo "<td >";
                        echo "<div class='text-center'>";
                        echo "<div class='btn-group'>";
                        echo "<a  type='button' id='btn-editar-popup-user'class='btn btn-light'  href='Edit_Factura.php?id=" . $row['ID_Factura'] . "'>Editar</a>";
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
            <div class="row">
				<div class="col-xs-12 col-sm-8 col-md-8 col-lg-6">
                    <br>
					<h3>Observaciones: </h3>
					<div class="form-group">
						<textarea class="form-control txt" rows="5" name="notes" id="notes" placeholder="Observaciones"></textarea>
					</div>
					<br>
					<div class="form-group">
						<input type="hidden" value="<?php echo $_SESSION['userid']; ?>" class="form-control" name="userId">
						<input data-loading-text="Guardando factura..." type="submit" name="invoice_btn" value="Guardar factura" class="btn btn-success submit_btn invoice-save-btm">
					</div>

				</div>
				<div class="col-xs-1 col-sm-4 col-md-4 col-lg-4">
                    <div class="modal-body">
						<div class="form-group">
							<label>Subtotal: &nbsp;</label>
							<div class="input-group">
								<div class="input-group-addon currency">$</div>
								<input value="" type="number" class="form-control" name="subTotal" id="subTotal" placeholder="Subtotal">
							</div>
						</div>
						<div class="form-group">
							<label>Porcentaje Impuestos: &nbsp;</label>
							<div class="input-group">
								<input value="" type="number" class="form-control" name="taxRate" id="taxRate" placeholder="Porcentaje Impuestos">
								<div class="input-group-addon">%</div>
							</div>
						</div>
						<div class="form-group">
							<label>Monto impuestos: &nbsp;</label>
							<div class="input-group">
								<div class="input-group-addon currency">$</div>
								<input value="" type="number" class="form-control" name="taxAmount" id="taxAmount" placeholder="Monto impuestos">
							</div>
						</div>
						<div class="form-group">
							<label>Total: &nbsp;</label>
							<div class="input-group">
								<div class="input-group-addon currency">$</div>
								<input value="" type="number" class="form-control" name="totalAftertax" id="totalAftertax" placeholder="Total">
							</div>
						</div>
						<div class="form-group">
							<label>Monto Pagado: &nbsp;</label>
							<div class="input-group">
								<div class="input-group-addon currency">$</div>
								<input value="" type="number" class="form-control" name="amountPaid" id="amountPaid" placeholder="Monto Pagado">
							</div>
						</div>
						<div class="form-group">
							<label>Cambio: &nbsp;</label>
							<div class="input-group">
								<div class="input-group-addon currency">$</div>
								<input value="" type="number" class="form-control" name="amountDue" id="amountDue" placeholder="Cambio">
							</div>
						</div>
					</span>
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
