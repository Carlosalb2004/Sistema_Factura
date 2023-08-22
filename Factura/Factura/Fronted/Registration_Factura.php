<?php
require_once "vistas/parte_superior.php"
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
<!--INICIO del cont principal-->
<div class="container">
    <Center>
        <h1>Registrar una nueva Factura</h1>
    </Center>
    <div class="container">
        <br>
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="table-responsive">
                        <div aria-labelledby="exampleModalLabel">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel"></h5>
                                        <a type="button" class="close" data-dismiss="modal" onclick="history.back()" aria-label="Close"><span aria-hidden="true">&times;</span></a>
                                    </div>
                                    <form action="../BD/Register_Factura.php" method="POST">
                                <div class="modal-body">
                                <div class="form-group">
    <label for="codigo" class="col-form-label">Código:</label>
    <input type="text" class="form-control" placeholder="" id="ID_Factura" name="ID_Factura" readonly>
</div>
<div class="form-group">
    <label for="fecha" class="col-form-label">Fecha:</label>
    <input type="text" class="form-control" placeholder="" id="Fecha" name="Fecha" readonly>
</div>

<?php
function obtenerUltimoCodigo() {
    // Establecer la conexión a la base de datos (reemplaza los valores con los adecuados para tu configuración)
    $mysqli = new mysqli("localhost", "root", "", "db_factura");
    
    // Verificar si hay errores de conexión
    if ($mysqli->connect_errno) {
        echo "Error en la conexión a la base de datos: " . $mysqli->connect_error;
        exit();
    }
    
    // Consultar el último código generado
    $query = "SELECT MAX(ID_Factura) AS ultimo_codigo FROM trs_factura";
    $result = $mysqli->query($query);
    
    // Verificar si hay resultados
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $ultimoCodigo = $row['ultimo_codigo'];
        return $ultimoCodigo;
    } else {
        return 0; // Si no hay resultados, devuelve un valor inicial predeterminado
    }
    
    // Cerrar la conexión a la base de datos
    $mysqli->close();
}
?>


<script>
    // Obtener el elemento de código y fecha
    var codigoInput = document.getElementById("ID_Factura");
    var fechaInput = document.getElementById("Fecha");
    
    // Obtener el último valor generado o establecer un valor inicial
    var ultimoCodigo = <?php echo obtenerUltimoCodigo(); ?>;
    
    // Incrementar el valor del código
    var nuevoCodigo = ultimoCodigo + 1;
    
    // Asignar el nuevo código al campo de entrada
    codigoInput.value = nuevoCodigo;
    
    // Obtener la fecha actual
    var fechaActual = new Date();
    var fechaFormateada = fechaActual.toLocaleDateString();
    
    // Asignar la fecha actual al campo de entrada
    fechaInput.value = fechaFormateada;
</script>
                    
<div class="form-group">
    <label for="ID_Cliente" class="col-form-label">N. Documento:</label>
    <input type="text" class="form-control" placeholder="" id="ID_Cliente" name="ID_Cliente" required>
</div>
<div id="cliente-details" style="display: none;">
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
<div id="crear-nuevo" style="display: none;">
    <a type="button" class="btn btn-primary" href="Registration_Cliente.php?ID_Cliente=" onclick="enviarIDCliente()">Crear Nuevo Cliente</a>
</div>

<script>
function enviarIDCliente() {
    var idCliente = document.getElementById("ID_Cliente").value;
    var enlace = document.getElementById("crear-nuevo").getElementsByTagName("a")[0];
    enlace.href = enlace.href + idCliente;
}
</script>
<script>
var inputID_Cliente = document.getElementById("ID_Cliente");
var divClienteDetails = document.getElementById("cliente-details");
var divCrearNuevo = document.getElementById("crear-nuevo");

inputID_Cliente.addEventListener("input", function() {
    var documento = this.value;

    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            var response = JSON.parse(this.responseText);
            if (response.Nombres_Apellidos) {
                divClienteDetails.style.display = "block";
                divCrearNuevo.style.display = "none";
                document.getElementById("Nombres_Apellidos").value = response.Nombres_Apellidos;
                document.getElementById("Email").value = response.Email;
                document.getElementById("Mobile").value = response.Mobile;
                document.getElementById("Direccion").value = response.Direccion;
            } else {
                divClienteDetails.style.display = "none";
                divCrearNuevo.style.display = "block";
            }
        }
    };
    xhttp.open("GET", "buscar_cliente.php?documento=" + documento, true);
    xhttp.send();
});

function crearNuevoCliente() {
    alert("Crear nuevo cliente");
}
</script>

                                        
                                            <?php
                                                $vendedorquery = "SELECT * FROM mae_vendedor WHERE Username = '" . $_SESSION['user'] . "'";
                                                $Vendedor_result = filterRecord($vendedorquery);

                                                if ($Vendedor_result) {
                                                    $vendedorrow = mysqli_fetch_array($Vendedor_result);
                                                    // Resto del código que utiliza $vendedorrow
                                                } else {
                                                    echo "Error al ejecutar la consulta de vendedor";
                                                } 
                                                ?>
                                                <label for="ID_Vendedor" class="col-form-label">Vendedor :</label>
                                                <input type="text" class="form-control" placeholder="" value="<?php echo  $vendedorrow['Nombres'] ." ". $vendedorrow['Apellidos'] ; ?>" readonly> 
                                                <input type='hidden' name='ID_Vendedor' value=' <?php echo$vendedorrow['ID_Vendedor'] ?>' required>
                                            
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

                                <script>
                                    const tipoDocumento = document.getElementById("tipoDocumento");
                                    const campoIDCliente = document.getElementById("ID_Cliente");
                                    const mensajeError = document.getElementById("mensajeError");

                                    campoIDCliente.addEventListener("input", validarIDCliente);

                                    tipoDocumento.addEventListener("change", () => {
                                        campoIDCliente.value = "";
                                        mensajeError.style.display = "none";
                                    });
                                    function validarIDCliente() {
                                        const seleccionado = tipoDocumento.value;
                                        const valorIDCliente = campoIDCliente.value;

                                        let longitudEsperada;

                                        switch (seleccionado) {
                                            case "DNI":
                                                longitudEsperada = 8;
                                                break;
                                            case "RUC":
                                                longitudEsperada = 11;
                                                break;
                                            case "Pasaporte":
                                                longitudEsperada = 9;
                                                break;
                                            case "Carnet de Extranjeria":
                                                longitudEsperada = 8;
                                                break;
                                            default:
                                                longitudEsperada = 0;
                                        }
                                        if (valorIDCliente.length !== longitudEsperada) {
                                            mensajeError.innerText = `El número de ${seleccionado} debe tener ${longitudEsperada} dígitos.`;
                                            mensajeError.style.display = "block";
                                        } else {
                                            mensajeError.style.display = "none";
                                        }
                                    }
                                </script>
                                        </div>
                                        <div class="modal-footer">
                                            <a type="button" class="btn btn-light" onclick="history.back()" data-dismiss="modal">Cancelar</a>
                                            <button type="submit" id="btnGuardar" class="btn btn-dark">Agregar Articulos</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--FIN del cont principal-->
    <?php require_once "vistas/parte_inferior.php" ?>