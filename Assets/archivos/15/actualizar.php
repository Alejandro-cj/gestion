<?php
$nombre = $_POST['n'];
$email = $_POST['e'];
$telefono = $_POST['c'];
$id = $_POST['id'];

$connection_obj = mysqli_connect("localhost", "root", "", "clientes");
if (!$connection_obj) {
    echo "Error No: " . mysqli_connect_errno();
    echo "Error Description: " . mysqli_connect_error();
    exit;
}

// prepare the insert query 
$query = "UPDATE usuarios SET
 `celular` = '". mysqli_real_escape_string($connection_obj, $telefono) ."'
 ,`nombre` = '". mysqli_real_escape_string($connection_obj, $nombre) ."'
 ,`email` = '". mysqli_real_escape_string($connection_obj, $email) ."' 
 WHERE `id` = '".$id."'";
// run the insert query 
$cual =mysqli_query($connection_obj, $query);
if($cual){
    echo "Dato actualizados correctamente";
}else{
    echo "Dato no actualizados";

}
// close the db connection 
mysqli_close($connection_obj);
?>