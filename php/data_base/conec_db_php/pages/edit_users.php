<?php
    include_once __DIR__ . "/../users.php";

    $id = $_GET['id'];

    $user = getUser($id);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Usuario</title>
</head>
<body>

    <form action="../users.php" method="post">
        <input name="id" type="hidden" value="<?php echo $user["id"] ?> " >

        <label for="name">Nome:</label>
        <input id="name" name="name" type="text" placeholder="Nome do Usuário" value="<?php echo $user["name"] ?>">
        </br>
        <label for="emial">E-mail: </label>
        <input class="form-control mb-2" id="email" name="email" type="email" placeholder="Email do Usuario" value="<?php echo $user["email"] ?>" >
        </br>
        <label for="password">Senha:</label>
        <input class="form-control mb-2" id="password" name="password" type="password" placeholder="Password do Usuário" >

        <input class="btn btn-primary mb-5" type="submit" value="Enviar">
    </form>
    
</body>
</html>