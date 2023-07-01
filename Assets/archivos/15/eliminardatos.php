<?php
$id = $_POST['id'];

$connection_obj = mysqli_connect("localhost", "root", "", "clientes");
if (!$connection_obj) {
    echo "Error No: " . mysqli_connect_errno();
    echo "Error Description: " . mysqli_connect_error();
    exit;
}

// prepare the insert query 
$query = "DELETE FROM `usuarios` WHERE `id` = '".$id."'";
// run the insert query 
$cual =mysqli_query($connection_obj, $query);
if($cual){
    echo "Dato eliminado correctamente";
}else{
    echo "Dato no eliminado";

}
// close the db connection 
mysqli_close($connection_obj);
?>