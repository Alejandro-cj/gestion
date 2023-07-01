<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario de actualizacion</title>
</head>
<body>
    <h1>Actualizar</h1>
    <form action="actualizar.php" method="post">
        <label for="id">Digite el id</label>
        <input type="number" name = "id">
        <label for="n">Nombre</label>
        <input type="text" placeholder="Nombre" name = "n">
        <label for="c">Celular</label>
        <input type="number" placeholder="Celular" name = "c">
        <label for="e">Email</label>
        <input type="email" placeholder="Email" name = "e">
        <input type="submit" value="Enviar">
    </form>
</body>
</html>