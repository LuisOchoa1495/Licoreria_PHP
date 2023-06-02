<?php
session_start();
include "../conexion.php";
?>
<!DOCTYPE html>
<html lang="es-es">

<head>
	<meta charset="utf-8">
	<title>Reporte General de Ventas</title>

	<head>

	<body>
		<?php
		// Definimos el archivo exportado
		$arquivo = 'ReporteGeneralVentas.xls';

		// Crear la tabla HTML
		$html = '';
		$html .= '<table border="1">';
		$html .= '<tr>';
		$html .= '<td align="center" colspan="5" bgcolor="#4023C4" ><font size ="4", color ="#ffffff">Reporte General de Ventas</tr>';
		$html .= '</tr>';


		$html .= '<tr>';
		$html .= '<td align="center" bgcolor="#B2CAEE"><b>N° Factura</b></td>';
		$html .= '<td align="center" bgcolor="#B2CAEE"><b>Fecha</b></td>';
		$html .= '<td align="center" bgcolor="#B2CAEE"><b>Vendedor</b></td>';
		$html .= '<td align="center" bgcolor="#B2CAEE"><b>Cliente</b></td>';
		$html .= '<td align="center" bgcolor="#B2CAEE"><b>Total</b></td>';
		$html .= '</tr>';

		//Seleccionar todos los elementos de la tabla
		$result_msg_contatos = 
        "SELECT A.nofactura, A.fecha, A.codcliente, C.nombre as NameVendedor, B.nombre as NameCliente, A.totalfactura, A.estado
        FROM factura A
        INNER JOIN cliente B
        ON A.codcliente = B.idcliente
        INNER JOIN usuario C
        ON A.usuario = C.idusuario
        ORDER BY A.fecha DESC";

		$result_msg_contatos2 = 
		"SELECT SUM(D.totalfactura) AS Total
		FROM factura D";

		$resultado_msg_contatos = mysqli_query($conexion, $result_msg_contatos);
		$resultado_msg_contatos2 = mysqli_query($conexion, $result_msg_contatos2);

		while ($row_msg_contatos = mysqli_fetch_assoc($resultado_msg_contatos)) {
			$html .= '<tr>';
			$html .= '<td>' . $row_msg_contatos["nofactura"] . '</td>';
			$html .= '<td>' . $row_msg_contatos["fecha"] . '</td>';
			$html .= '<td>' . $row_msg_contatos["NameVendedor"] . '</td>';
			$html .= '<td>' . $row_msg_contatos["NameCliente"] . '</td>';
            $html .= '<td>' . $row_msg_contatos["totalfactura"] . '</td>';
			$html .= '</tr>';;
		}

		while ($row_msg_contatos2 = mysqli_fetch_assoc($resultado_msg_contatos2)) {
			$html .= '<tr>';
			$html .= '<td colspan="2" align="center" bgcolor="red"><font size ="4", color ="#ffffff">TOTAL (S/.)</td>';
			$html .= '<td colspan="3" align="center" bgcolor="red"><font size ="4", color ="#ffffff">' . $row_msg_contatos2["Total"] . '</td>';
			$html .= '</tr>';;
		}
		
		// Configuración en la cabecera
		header("Expires: Mon, 26 Jul 2227 05:00:00 GMT");
		header("Last-Modified: " . gmdate("D,d M YH:i:s") . " GMT");
		header("Cache-Control: no-cache, must-revalidate");
		header("Pragma: no-cache");
		header("Content-type: application/x-msexcel");
		header("Content-Disposition: attachment; filename=\"{$arquivo}\"");
		header("Content-Description: PHP Generado Data");
		// Envia contenido al archivo
		echo $html;
		exit; ?>
	</body>
</html>