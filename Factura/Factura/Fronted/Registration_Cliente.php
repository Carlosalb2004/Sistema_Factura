<?php
require_once "vistas/parte_superior.php"
?>
<?php
if(isset($_GET['ID_Cliente'])) {
    $ID_Cliente = $_GET['ID_Cliente'];
} else {
    $ID_Cliente = "";
}
?>
<!--INICIO del cont principal-->
<div class="container">
    <Center>
        <h1>Registrar un nuevo Cliente</h1>
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
                                    <form action="../BD/Register_Cliente.php" method="POST">
                                        <div class="modal-body">
                                        <div class="form-group">
                                    <select id="tipoDocumento" name="T_Documento" required style="width: 100%; margin-bottom: 15px; padding: 10px 0; padding-left: 4px; border: 0; border-bottom: 1px solid #5cb8ff; font-size: 17px; border-radius: 3px;">
                                        <option value="">Seleccione</option>
                                        <option value="DNI">DNI</option>
                                        <option value="RUC">RUC</option>
                                        <option value="Pasaporte">Pasaporte</option>
                                        <option value="Carnet de Extranjeria">Carnet de Extranjeria</option>
                                        <option value="Otros">Otros</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="ID_Cliente" class="col-form-label">N. Documento :</label>
                                    <input id="ID_Cliente" type="text" class="form-control" placeholder="" name="ID_Cliente" value =" <?php echo $ID_Cliente; ?>" required>
                                    <div id="mensajeError" style="display: none; color: red; margin-top: 10px;"></div>
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
                                            <div class="form-group">
                                                <label for="lastname" class="col-form-label">Nombres y Apellidos :</label>
                                                <input type="text" class="form-control" placeholder="" name="Nombres_Apellidos"  required>
                                            </div>
                                            <div class="form-group">
                                                <label for="birthdate" class="col-form-label">Email :</label>
                                                <input type="Email" class="form-control" placeholder="" name="Email" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="username" class="col-form-label">Celular :</label>
                                                <input type="number" class="form-control" placeholder="" name="Mobile" required pattern="[0-9]{9}">
                                            </div>
                                            <div class="form-group">
                                                <label for="username" class="col-form-label">Direccion :</label>
                                                <input type="text" class="form-control" placeholder="" name="Direccion" required>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <a type="button" class="btn btn-light" onclick="history.back()" data-dismiss="modal">Cancelar</a>
                                            <button type="submit" id="btnGuardar" class="btn btn-dark">Guardar</button>
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