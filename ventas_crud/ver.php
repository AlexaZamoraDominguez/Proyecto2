<?php session_start(); ?>

<?php
if(!isset($_SESSION['valido'])) {
	header('Location: iniciar.php');
}
?>

<?php
include_once("conexion.php");

$resultado = mysqli_query($mysqli, "SELECT * FROM ventas WHERE id=".$_SESSION['id']." ORDER BY id_venta DESC");
?>

<html>
<head>
	<title>Página principal</title>
</head>

<body>
	<a href="index.php">Inicio</a> | <a href="agregar.html">Agregar nuevo dato</a> | <a href="cerrar.php">Cerrar sesión</a>
	<br/><br/>

	<table width='80%' border=0>
		<tr bgcolor='#CCCCCC'>
			<td>Id Venta</td>
			<td>Fecha</td>
			<td>Hora</td>
			<td>producto</td>
			<td>precio</td>
			<td>Cantidad</td>
			<td>Total</td>
			<td>Id cajero</td>
			<td>Id cliente</td>
			<td>Numero Factura</td>
			<td>Opciones</td>
		</tr>
		<?php
		while($res = mysqli_fetch_array($resultado)) {		
			echo "<tr>";
			echo "<td>".$res['id_venta']."</td>";
			echo "<td>".$res['fecha']."</td>";
			echo "<td>".$res['hora']."</td>";
			echo "<td>".$res['producto']."</td>";
			echo "<td>".$res['precio']."</td>";
			echo "<td>".$res['cantidad']."</td>";	
			echo "<td>".$res['total']."</td>";
			echo "<td>".$res['id_cajero']."</td>";
			echo "<td>".$res['id_cliente']."</td>";
			echo "<td>".$res['no_factura']."</td>";
			echo "<td><a href=\"editar.php?id_venta=$res[id_venta]\">Editar</a> | <a href=\"eliminar.php?id_venta=$res[id_venta]\" onClick=\"return confirm('¿Estás seguro de que quieres eliminar?')\">Eliminar</a></td>";		
		}
		?>
	</table>	
</body>
</html>
