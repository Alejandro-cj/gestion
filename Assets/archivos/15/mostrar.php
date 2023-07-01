<?php
$connection_obj = mysqli_connect("localhost", "root", "", "clientes");
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
    echo "ID:" . $row['id'] . "<br/>";
    echo "Name:" . $row['nombre'] . "<br/>";
    echo "Phone:" . $row['celular'] . "<br/>";
    echo "Email:" . $row['email'] . "<br/>";
    echo "<br/>";
}
// close the db connection 
mysqli_close($connection_obj);
?>