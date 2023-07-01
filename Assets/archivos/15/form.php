<?php
$connection_obj = mysqli_connect("localhost", "root", "", "clientes");
if (!$connection_obj) {
    echo "Error No: " . mysqli_connect_errno();
    echo "Error Description: " . mysqli_connect_error();
    exit;
}
// initialize variables for the insert query 
$nombre = $_POST["n"];
$direcion =$_POST["d"];
$Celular = $_POST["c"];
$Email = $_POST["e"];
// prepare the insert query 
$query = "INSERT INTO `usuarios`(`nombre`, `direccion`, `telefono`, `email`) 
VALUES ('". mysqli_real_escape_string($connection_obj, $nombre) ."','". mysqli_real_escape_string($connection_obj, $direcion) ."','". mysqli_real_escape_string($connection_obj, $Celular)."','". mysqli_real_escape_string($connection_obj, $Email) ."')";
// run the insert query 
mysqli_query($connection_obj, $query);
// close the db connection 
mysqli_close($connection_obj);
?>