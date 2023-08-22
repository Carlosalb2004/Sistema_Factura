<?php
require_once "vistas/parte_superior.php"
?>
<?php
$query = "SELECT *FROM mae_categoria";
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
        <h1>Registrar un nuevo Articulo</h1>
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
                                    <form action="../BD/Register_Articulo.php" method="POST">
                                        <div class="modal-body">
                                        <div class="form-group">
                                                <label for="ID_Articulo" class="col-form-label">Codigo:</label>
                                                <input type="text" class="form-control" name="ID_Articulo" id="ID_Articulo" required>
                                            </div>
                                        <div class="form-group">
                                            <select name="ID_Categoria" required="" style="width: 100%; margin-bottom: 15px; padding: 10px 0; padding-left: 4px; border: 0; border-bottom: 1px solid #5cb8ff; font-size: 17px; border-radius: 3px;" id="categoriaSelect">
                                                <option value="">Seleccione una categoría</option>
                                                <?php
                                                while ($row = mysqli_fetch_array($result)) {
                                                    echo "<option value='" . $row['ID_Categoria'] . "'>" . $row['Nombre'] . "</option>";
                                                }
                                                ?>
                                            </select>
                                        </div>
                                        <script>
                                            // Función para filtrar las opciones del select mientras se escribe en el campo de selección
                                            document.getElementById("categoriaSelect").addEventListener("input", function() {
                                                var input = this.value.toLowerCase();
                                                var options = this.getElementsByTagName("option");
                                                for (var i = 0; i < options.length; i++) {
                                                    var text = options[i].text.toLowerCase();
                                                    var select = options[i].parentNode;
                                                    if (text.includes(input)) {
                                                        options[i].style.display = "";
                                                    } else {
                                                        options[i].style.display = "none";
                                                    }
                                                }
                                            });
                                        </script>
                                            <div class="form-group">
                                                <label for="Nombre" class="col-form-label">Nombre:</label>
                                                <input type="text" class="form-control" placeholder="" name="Nombre" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="Stock" class="col-form-label">Stock:</label>
                                                <input type="text" class="form-control" placeholder="" name="Stock" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="Stock" class="col-form-label">Precio:</label>
                                                <input type="text" class="form-control" placeholder="" name="Precio" required>
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