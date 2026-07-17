<?php
    include_once __DIR__ . "/../clientes.php";

    $id = $_GET['id'];

    $client = getClient($id);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Cliente</title>
</head>
<body>

    <form action="../clientes.php" method="post">
        <input name="id" type="hidden" value="<?php echo $client["id"] ?> " >

        <label for="name">Nome:</label>
        <input id="name" name="name" type="text" placeholder="Nome do Cliente" value="<?php echo $client["name"] ?>">
        </br>
        <label for="age">Idade</label>
        <input id="age" name="age" type="number" placeholder="Idade do Cliente" value="<?php echo $client["age"] ?>" oninput="if(this.value.length > 3) this.value = this.value.slice(0, 3);" >

        <input type="submit" value="Enviar">
    </form>
    
</body>
</html>