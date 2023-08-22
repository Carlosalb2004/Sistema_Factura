<?php
include("../BD/config.php");
$id = $_GET['id'];
?>
<?php
require_once "vistas/parte_superior.php"
?>
<!--INICIO del cont principal-->
<div class="container">
    <Center>
        <h1>Modificar Articulo</h1>
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
                                    <form action="../BD/Update_Detalle.php" method="POST">
                                    <?php
                                   $result = mysqli_query($mysqli, "SELECT * FROM trs_ordenfactura WHERE ID_OrdenFactura = '$id'");
                                   while ($row = mysqli_fetch_array($result)) {
                                       echo "<input type='hidden' name='id' value='{$row['ID_OrdenFactura']}' required>";
                                       echo "<div class='modal-body'>";
                                       echo "<div class='form-group'>";
                                       echo "<label for='Codigo' class='col-form-label'>Codigo Articulo :</label>";
                                       echo "<input type='text' class='form-control' placeholder='' name='ID_Articulo' value='{$row['ID_Articulo']}' readonly>";
                                       echo "</div>";
                                       echo "<div class='form-group'>";
                                       echo "<label for='Cantidad' class='col-form-label'>Cantidad :</label>";
                                       echo "<input type='text' class='form-control' placeholder='' name='Cantidad' value='{$row['Cantidad']}' required>";
                                       echo "</div>";
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