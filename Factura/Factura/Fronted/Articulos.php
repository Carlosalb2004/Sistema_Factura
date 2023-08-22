<?php
require_once "vistas/parte_superior.php"
?>
<?php
$query = "SELECT *FROM mae_articulo";
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
        <h1>Articulos</h1>
    </Center>
    <div class="container">

        <div class="row">
            <div class="col-lg-12">
                <a class="btn btn-success" type="button"  href="Registration_Articulo.php"  >Nuevo</a>      
                <a class="btn btn-success" type="button"  href="Categorias.php"  >Categorias</a>
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
<th>Codigo del Articulo</th>
<th>Nombre </th>
<th> Categoria </th>
<th>Stock</th>
<th>Precio</th>
<th>Acciones</th>
</tr></thead>";

                    while ($row = mysqli_fetch_array($result)) {
                        echo "<tr>";
                        echo "<td>" . $row['ID_Articulo'] . "</td>";
                        echo "<td>" . $row['Nombre'] . "</td>";
                        $categoria_query = "SELECT Nombre FROM mae_categoria WHERE ID_Categoria = " . $row['ID_Categoria'];
                        $categoria_result = filterRecord($categoria_query);
                        $categoria_row = mysqli_fetch_array($categoria_result);
                        echo "<td>" . $categoria_row['Nombre'] . "</td>";
                        echo "<td>" . $row['Stock'] . "</td>";
                        echo "<td>" . $row['Precio'] . "</td>";
                        echo "<td >";
                        echo "<div class='text-center'>";
                        echo "<div class='btn-group'>";
                        echo "<a  type='button' id='btn-editar-popup-user'class='btn btn-light'  href='Edit_Articulo.php?id=" . $row['ID_Articulo'] . "'>Editar</a>";
                        echo "<a  type='button' class='btn btn-danger btnBorrar' href='../BD/Delete_Articulo.php?id=" . $row['ID_Articulo'] . "'>Borrar</a>";
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
<!--FIN del cont principal-->
<?php require_once "vistas/parte_inferior.php" ?>