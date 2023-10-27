<?php session_start(); ?>

<?php
if (!isset($_SESSION['valido'])) {
	header('Location: iniciar.php');
}
?>

<?php
include("conexion.php");

$id_venta = $_GET['id_venta'];

$resultado = mysqli_query($mysqli, "DELETE FROM ventas WHERE id_venta=$id_venta");

header("Location:ver.php");
?>