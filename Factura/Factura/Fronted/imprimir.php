
<?php
$id = $_GET['id'];
$queryCliente = "SELECT *FROM mae_cliente";
$resultCliente = filterRecord($queryCliente);
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

$queryFactura = "SELECT * FROM trs_factura where ID_Factura = '$id'";
$resultFactura = filterRecord($queryFactura);
if ($resultFactura) {
    $_row = mysqli_fetch_array($resultFactura);
    } else {
      echo "Error al ejecutar la consulta";
    }
// $invoiceDate = date("d/M/Y, H:i:s", strtotime($invoiceValues['order_date']));
$output = '';
$output .= '

    <style>
    /* Estilos para la factura */
body {
  font-family: Arial, sans-serif;
}

.container {
  margin: 20px auto;
  max-width: 800px;
  padding: 20px;
  background-color: #F0F8FF;
}

.title {
  text-align: center;
  font-size: 24px;
  font-weight: bold;
  margin-bottom: 20px;
}

.client-info {
  display: flex;
  justify-content: space-between;
  margin-bottom: 20px;
}

.client-details {
  width: 65%;
}

.invoice-details {
  width: 35%;
}

.table {
  width: 100%;
  border-collapse: collapse;
}

.table th,
.table td {
  padding: 10px;
  border: 1px solid #000;
}

.subtotal-row,
.total-row {
  font-weight: bold;
  text-align: right;
}

.notes {
  margin-top: 20px;
  font-size: 14px;
}

/* Estilos específicos para el archivo PHP */
#invoice-wrapper {
  max-width: 800px;
  margin: 0 auto;
  background-color: #FFF;
  padding: 20px;
  border: 1px solid #000;
}

#invoice-wrapper .invoice-title {
  text-align: center;
  font-size: 24px;
  font-weight: bold;
  margin-bottom: 20px;
}

#invoice-wrapper .client-info {
  display: flex;
  justify-content: space-between;
  margin-bottom: 20px;
}

#invoice-wrapper .client-details {
  width: 65%;
}

#invoice-wrapper .invoice-details {
  width: 35%;
}

#invoice-wrapper .table {
  width: 100%;
  border-collapse: collapse;
  margin-bottom: 20px;
}

#invoice-wrapper .table th,
#invoice-wrapper .table td {
  padding: 10px;
  border: 1px solid #000;
}

#invoice-wrapper .subtotal-row,
#invoice-wrapper .total-row {
  font-weight: bold;
  text-align: right;
}

#invoice-wrapper .notes {
  margin-top: 20px;
  font-size: 14px;
}

    
    </style>
    <table width="100%" border="1" cellpadding="5" cellspacing="0">
	<tr>
	<td colspan="2" align="center" style="font-size:18px"><b>FACTURA COMPUTING RJG</b></td>
	</tr>
	<tr>
	<td colspan="2">
	<table width="100%" cellpadding="5">
	<tr>
    ';
    $vquery = "SELECT * FROM mae_cliente WHERE ID_Cliente ='" . $facturarrow['ID_Cliente'] . "'";
    $V_result = filterRecord($vquery);
    if ($V_result) {
      $rows = mysqli_fetch_array($V_result);
      // Resto del código que utiliza $vendedorrow
      }
    $vquery = "SELECT * FROM mae_puntoventa WHERE ID_PuntoVenta ='" . $facturarrow['ID_PuntoVenta'] . "'";
    $V_result = filterRecord($vquery);
    if ($V_result) {
        $rowspuntoventa = mysqli_fetch_array($V_result);
    } 
    $pagoquery = "SELECT * FROM mae_modopago WHERE ID_ModoPago ='" . $facturarrow['ID_ModoPago'] . "'";
    $pago_result = filterRecord($pagoquery);
    if ($pago_result) {
        $rowspago = mysqli_fetch_array($pago_result);
    } 
    $fecha = $_row['Fecha']; // Obtener la fecha de $_row['Fecha']
    $fechaFormateada = date('d/m/Y', strtotime($fecha));
    $output .= '
	<td width="65%">
	<b>Datos del Cliente</b><br />
    Nombre:  '. $rows['Nombres_Apellidos'] .'<br />
    Direccion: '. $rows['Direccion'] .'<br />
    Correo electrónico:  '.$rows['Email'] .'<br />
    Celular:  '.$rows['Mobile'] .'<br />
	</td>
	<td width="35%">         
    <b>Factura no. : '. $_row['ID_Factura'] . '</b><br />
	Fecha de la factura : '. $fechaFormateada . '<br />
    Direccion  : ' . $rowspuntoventa['Nombre'] .", " . $rowspuntoventa['Direccion'] . '<br />
    Metodo de Pago : '. $rowspago['Nombre'] . '<br />
	</td>
	</tr>
	</table>
	<br />
	<table width="100%" border="1" cellpadding="5" cellspacing="0">
	<tr>
	<th align="left">Sr No.</th>
	<th align="left">Código </th>
	<th align="left">Descripcion </th>
	<th align="left">Cantidad</th>
	<th align="left">Precio</th>
	<th align="left">Importe </th> 
	</tr>';
$count = 0;
$subto=0;
$querydetalle = "SELECT * FROM trs_ordenfactura where ID_Factura = '$id' " ;
$resultdetalle = filterRecord($querydetalle);
while ($row = mysqli_fetch_array($resultdetalle)) {
	$count++;
    $Producto_query = "SELECT * FROM mae_articulo WHERE ID_Articulo = " . $row['ID_Articulo'];
        $Producto_result = filterRecord($Producto_query);
        if ($Producto_result) {
            $Producto_row = mysqli_fetch_array($Producto_result);
        } 
	$output .= '
	<tr>
	<td align="left">' . $count . '</td>
	<td align="left">' . $row['ID_Articulo']  . '</td>
	<td align="left">' . $Producto_row['Nombre'] . '</td>
	<td align="left">' . $row['Cantidad']. '</td>
	<td align="left"> S/ ' . $Producto_row['Precio'] . '</td>
	<td align="left"> S/ ' . $row["Importe_Final"] . '</td>   
	</tr>';
}
$output .= '
	<tr>
	<td align="right" colspan="5"><b>Sub Total</b></td>
	<td align="left"><b> S/ ' . $_row['Monto_ImporteTotal'] . '</b></td>
	</tr>
	<tr>
	<td align="right" colspan="5"><b>Porcentaje Impuestos :</b></td>
	<td align="left">' . $_row['Impuesto'] . ' %</td>
	</tr>
	<tr>
	<td align="right" colspan="5"><b>Monto Impuestos: </b></td>
	<td align="left"> S/ ' . $_row['Impuesto_Total'] . '</td>
	</tr>
	<tr>
	<td align="right" colspan="5"><b>Total: </b></td>
	<td align="left"><b> S/ ' . $_row['Monto_Total'] . '</b></td>
	</tr>';
$output .= '
	</table>
	</td>
	</tr>
	</table>';

    
// // create pdf of invoice	
$invoiceFileName = 'Factura -' . $_row['ID_Factura'] . '.pdf';
require_once 'dompdf/src/Autoloader.php';
Dompdf\Autoloader::register();

use Dompdf\Dompdf;

$dompdf = new Dompdf();
$dompdf->loadHtml(html_entity_decode($output));
$dompdf->setPaper('A4', 'landscape');
$dompdf->render();
$dompdf->stream($invoiceFileName, array("Attachment" => false));
