<?php
    include "function.php"
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Conectando com o banco</title>
</head>
<body>

    <div>
        <form action="function.php" method="post">
            <label for="name">Nome:</label>
            <input id="name" name="name" type="text" placeholder="Nome do Cliente">
            </br>
            <label for="age">Idade</label>
            <input id="age" name="age" type="number" placeholder="Idade do Cliente" >

            <input type="submit" value="Enviar">
        </form>
    </div>

    <div>
        <h2>Clientes</h2>
        <?php foreach (selectClientts() as $clients ) : ?>
            <p id="<?php echo $clients["id"] ?>" > <?php echo $clients["name"] . " - " . $clients["age"] . " anos" ?> </p>
            </br>
        <?php endforeach; ?>
    </div>

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
