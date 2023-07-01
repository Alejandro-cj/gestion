<?php
$connection_obj = mysqli_connect("localhost", "root", "", "prueba");
if (!$connection_obj) {
    echo "Error No: " . mysqli_connect_errno();
    echo "Error Description: " . mysqli_connect_error();
    exit;
}
// prepare the select query 
$query = "SELECT * FROM usuarios";
// execute the select query 
$result = mysqli_query($connection_obj, $query) or die(mysqli_error($connection_obj));
// run the select query 
while ($row = mysqli_fetch_array($result, MYSQLI_BOTH)) {
    echo "Name:" . $row['nombre'] . "<br/>";
    echo "Direccion:" . $row['direccion'] . "<br/>";
    echo "Telefono:" . $row['telefono'] . "<br/>";
    echo "Email:" . $row['email'] . "<br/>";
    echo "<br/>";
}
// close the db connection 
mysqli_close($connection_obj);
?>