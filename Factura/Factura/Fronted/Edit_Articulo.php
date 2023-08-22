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
                                    <form action="../BD/Update_Articulo.php" method="POST">
                                    <?php
                                   $result = mysqli_query($mysqli, "SELECT * FROM mae_articulo WHERE ID_Articulo = '$id'");
                                   while ($row = mysqli_fetch_array($result)) {
                                       echo "<input type='hidden' name='id' value='{$row['ID_Articulo']}' required>";
                                       echo "<div class='modal-body'>";
                                       echo "<div class='form-group'>";
                                       echo "<label for='Codigo' class='col-form-label'>Codigo :</label>";
                                       echo "<input type='text' class='form-control' placeholder='' name='ID_Articulo' value='{$row['ID_Articulo']}' required>";
                                       echo "</div>";
                                       echo "<div class='form-group'>";
                                       echo "<label for='ID_Categoria' class='col-form-label'>Tipo de Documento:</label>";
                                       echo "<select name='ID_Categoria' required='' style='width: 100%; margin-bottom: 15px; padding: 10px 0; padding-left: 4px; border: 0; border-bottom: 1px solid #5cb8ff; font-size: 17px; border-radius: 3px;'>";
                                       echo "<option value=''>Seleccione</option>";
                                       
                                       $categoria_query = "SELECT * FROM mae_categoria";
                                       $categoria_result = mysqli_query($mysqli, $categoria_query);
                                       
                                       while ($categoria_row = mysqli_fetch_array($categoria_result)) {
                                           $selected = ($categoria_row['ID_Categoria'] == $row['ID_Categoria']) ? 'selected' : '';
                                           echo "<option value='" . $categoria_row['ID_Categoria'] . "' " . $selected . ">" . $categoria_row['Nombre'] . "</option>";
                                       }
                                       echo "</select>";
                                       echo "</div>";
                                       echo "<div class='form-group'>";
                                       echo "<label for='Nombre' class='col-form-label'>Nombre :</label>";
                                       echo "<input type='text' class='form-control' placeholder='' name='Nombre' value='{$row['Nombre']}' required>";
                                       echo "</div>";
                                       echo "<div class='form-group'>";
                                       echo "<label for='Stock' class='col-form-label'>Stock :</label>";
                                       echo "<input type='text' class='form-control' placeholder='' name='Stock' value='{$row['Stock']}' required>";
                                       echo "</div>";
                                       echo "<div class='form-group'>";
                                       echo "<label for='Stock' class='col-form-label'>Precio :</label>";
                                       echo "<input type='text' class='form-control' placeholder='' name='Precio' value='{$row['Precio']}' required>";
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