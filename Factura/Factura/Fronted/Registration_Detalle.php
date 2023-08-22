<?php
require_once "vistas/parte_superior.php"
?>
<?php
$id = $_GET['id'];
$query = "SELECT *FROM trs_ordenfactura";
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
        <h1>Agregar un Articulo</h1>
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
                                    <form action="../BD/Register_Detalle.php" method="POST">
  <div class="modal-body">
    <div class="form-group">
      <input type="hidden" name="ID_Factura" value="<?php echo $id; ?>" required>
      <input type="text" id="searchInput" placeholder="Buscar artículo" style="width: 100%; margin-bottom: 15px; padding: 10px 0; padding-left: 4px; border: 0; border-bottom: 1px solid #5cb8ff; font-size: 17px; border-radius: 3px;">
      <select name="ID_Articulo" required="" style="width: 100%; margin-bottom: 15px; padding: 10px 0; padding-left: 4px; border: 0; border-bottom: 1px solid #5cb8ff; font-size: 17px; border-radius: 3px;" id="categoriaSelect">
        <option value="">Seleccione un Artículo</option>
        <?php 
        $query = "SELECT * FROM mae_articulo";
        $result1 = filterRecord($query);
        while ($row = mysqli_fetch_array($result1)) { 
          echo "<option value='" . $row['ID_Articulo'] . "'>" . $row['Nombre'] . "</option>";
        }
        ?>
      </select>
    </div>
    <div class="form-group">
      <label for="Stock" class="col-form-label">Cantidad:</label>
      <input type="text" class="form-control" placeholder="" name="Cantidad" required>
    </div>
  </div>

<script>
  const searchInput = document.getElementById('searchInput');
  const categoriaSelect = document.getElementById('categoriaSelect');
  const options = Array.from(categoriaSelect.options);

  searchInput.addEventListener('input', function(event) {
    const searchTerm = event.target.value.toLowerCase();
    const filteredOptions = options.filter(function(option) {
      return option.text.toLowerCase().includes(searchTerm);
    });

    categoriaSelect.innerHTML = '';
    filteredOptions.forEach(function(option) {
      categoriaSelect.appendChild(option);
    });
  });
</script>

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