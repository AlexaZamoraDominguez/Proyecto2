<?php
session_start();

if(!isset($_SESSION['valido'])) {
	header('Location: iniciar.php');
}
?>

<html>
<head>
	<title>Agregar datos</title>
</head>

<body>
<?php
include_once("conexion.php");

if(isset($_POST['update'])) {	
	$id_venta = $_POST['id_venta'];
	$fecha = $_POST['fecha'];
	$hora = $_POST['hora'];
	$producto = $_POST['producto'];
	$precio = $_POST['precio'];
	$cantidad = $_POST['cantidad'];
	$total = $_POST['total'];
	$id_cajero = $_POST['id_cajero'];
	$id_cliente = $_POST['id_cliente'];
	$no_factura = $_POST['no_factura'];
	$id = $_SESSION['id'];

	if(empty($id_venta) || empty($fecha) || empty($hora) || empty($producto) || empty($precio) || empty($cantidad) || empty($total) || empty($id_cajero) || empty($id_cliente) || empty($no_factura)) {
		echo "<font color='red'>Por favor, complete todos los campos.</font><br/>";
		echo "<br/><a href='javascript:self.history.back();'>Volver</a>";
	} else { 
		$resultado = mysqli_query($mysqli, "INSERT INTO ventas (id_venta, fecha, hora, producto, precio, cantidad, total, id_cajero, id_cliente, no_factura, id) VALUES ('$id_venta', '$fecha', '$hora', '$producto', '$precio', '$cantidad', '$total', '$id_cajero', '$id_cliente', '$no_factura', '$id')");
		
		if($resultado){
			echo "<font color='green'>Datos añadidos con éxito.</font>";
			echo "<br/><a href='ver.php'>Ver resultados</a>";
		} else {
			echo "Error en la inserción: " . mysqli_error($mysqli);
		}
	}
}
?>
</body>
</html>
