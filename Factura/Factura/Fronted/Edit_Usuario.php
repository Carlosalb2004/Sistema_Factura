<?php
require_once "vistas/parte_superior.php"
?>
<?php
include("../BD/config.php");
$id = $_GET['id'];
?>
<!--INICIO del cont principal-->
<div class="container">
    <Center>
        <h1>Modificar Usuario</h1>
    </Center>
    <div class="container">
        <br>
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="table-responsive">
                        <div aria-labelledby="exampleModalLabel" >
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel"></h5>
                                        <a type="button" class="close" data-dismiss="modal" onclick="history.back()" aria-label="Close"><span aria-hidden="true">&times;</span></a>
                                    </div>
                                    <form action="../BD/Update_Usuario.php" method="POST">
                                    <?php
                                    $result = mysqli_query($mysqli, "SELECT * FROM mae_vendedor WHERE ID_Vendedor= '$id'");
                                    while ($row = mysqli_fetch_array($result)) {
                                        echo "<input type='hidden' name='id' value='{$row['ID_Vendedor']}' required>";
                                        echo "<div class='modal-body'>";

                                        echo "<div class='form-group'>";
                                        echo "<label for='T_Documento' class='col-form-label'>Tipo de Documento:</label>";
                                        echo "<select name='T_Documento' required='' style='width: 100%; margin-bottom: 15px; padding: 10px 0; padding-left: 4px; border: 0; border-bottom: 1px solid #5cb8ff; font-size: 17px; border-radius: 3px;'>";
                                        echo "<option value=''>Seleccione</option>";
                                        echo "<option value='DNI' " . (($row['T_Documento'] == 'DNI') ? 'selected' : '') . ">DNI</option>";
                                        echo "<option value='RUC' " . (($row['T_Documento'] == 'RUC') ? 'selected' : '') . ">RUC</option>";
                                        echo "<option value='Pasaporte' " . (($row['T_Documento'] == 'Pasaporte') ? 'selected' : '') . ">Pasaporte</option>";
                                        echo "<option value='Carnet de Extranjeria' " . (($row['T_Documento'] == 'Carnet de Extranjeria') ? 'selected' : '') . ">Carnet de Extranjeria</option>";
                                        echo "</select>";
                                        echo "</div>";
                                        echo "   <div class='form-group'>";
                                        echo "       <label for='firstname' class='col-form-label'>Numero de Documento :</label>";
                                        echo "       <input type='text' class='form-control' placeholder='' name='ID_Vendedor' value='{$row['ID_Vendedor']}' required>";
                                        echo "    </div>";
                                        echo "   <div class='form-group'>";
                                        echo "       <label for='firstname' class='col-form-label'>Nombres :</label>";
                                        echo "       <input type='text' class='form-control' placeholder='' name='nombres' value='{$row['Nombres']}' required>";
                                        echo "    </div>";
                                        echo "    <div class='form-group'>";
                                        echo "        <label for='lastname' class='col-form-label'>Apellidos :</label>";
                                        echo "        <input type='text' class='form-control' placeholder='' name='apellidos' value='{$row['Apellidos']}' required>";
                                        echo "    </div>";
                                        echo "    <div class='form-group'>";
                                        echo "        <label for='mobile' class='col-form-label'>Mobile :</label>";
                                        echo "        <input type='text' class='form-control' placeholder='' name='mobile' value='{$row['Mobile']}' required>";
                                        echo "    </div>";
                                        echo "    <div class='form-group'>";
                                        echo "        <label for='email' class='col-form-label'>Email :</label>";
                                        echo "        <input type='email' class='form-control' placeholder='' name='email' value='{$row['Email']}' required>";
                                        echo "    </div>";
                                        echo "    <div class='form-group'>";
                                        echo "        <label for='username' class='col-form-label'>Usuario :</label>";
                                        echo "        <input type='text' class='form-control' placeholder='' name='username' value='{$row['Username']}' required>";
                                        echo "    </div>";
                                        echo "    <div class='form-group'>";
                                        echo "        <label for='password' class='col-form-label'>Contraseña :</label>";
                                        echo "        <input type='text' class='form-control' placeholder='' name='password' value='{$row['Password']}' required>";
                                        echo "    </div>";
                                        echo "</div>";
                                        echo "<div class='modal-footer'>";
                                        echo "<a type='button' class='btn btn-light' onclick='history.back()' data-dismiss='modal'>Cancelar</a>";
                                        echo "<button type='submit' id='btnGuardar' class='btn btn-dark'>Guardar</button>";
                                        echo "</div>";
                                    }
                                    ?>

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