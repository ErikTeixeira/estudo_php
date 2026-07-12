<?php
    include_once "clientes.php";
    include_once "products.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Conectando com o banco</title>

    <link rel="stylesheet" href="../style/style.css">

</head>
<body>

    <div>
        <form action="clientes.php" method="post">
            <label for="name">Nome:</label>
            <input id="name" name="name" type="text" placeholder="Nome do Cliente">
            </br>
            <label for="age">Idade</label>
            <input id="age" name="age" type="number" placeholder="Idade do Cliente" >

            <input type="submit" value="Enviar">
        </form>
    </div>


    <table cellspacing="1" cellpadding="7" style="width: 100%; margin-top: 20px" >
        <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Idade</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach (selectClients() as $clients ) : ?>
                <tr>
                    <td> <?php echo $clients["id"] ?> </td>
                    <td> <?php echo $clients["name"] ?> </td>
                    <td> <?php echo $clients["age"] ?> </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    

    <div>
        <h2>Produtos</h2>
        <ul>
            <?php foreach (selectProducts() as $products ) : ?>
                <li> <?php echo $products["title"] . " - R$ " . number_format($products["price"], 2, ",", ".") ?> </li>
            <?php endforeach; ?>
        </ul>
    </div>

</body>
</html>


17:23