<?php
    include_once __DIR__ . "/../users.php";
    include_once __DIR__ . "/../role.php";

    $id = $_GET['id'];

    $user = getUser($id);

    $role = getRole($user["role_id"]);
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
        <label for="role_id">Permissão:</label>
        <select name="role_id" id="role_id" class="form-control mb-2">
                <option value="<?=$user["role_id"] ?>">
                    <?= $role ? $role["role_name"] : "Sem permissão" ?>
                </option>
                <?php foreach( selectRoles() as $role ): ?>
                    <option value=" <?php echo $role["id_role"] ?> " > <?php echo $role["role_name"] ?> </option>
                <?php endforeach; ?>
        </select>
        </br>
        <label for="password">Senha:</label>
        <input class="form-control mb-2" id="password" name="password" type="password" placeholder="Password do Usuário" >

        <input class="btn btn-primary mb-5" type="submit" value="Enviar">
    </form>
    
</body>
</html>