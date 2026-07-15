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
            <input id="age" name="age" type="number" placeholder="Idade do Cliente" oninput="if(this.value.length > 3) this.value = this.value.slice(0, 3);" >

            <input type="submit" value="Enviar">
        </form>
    </div>


    <table cellspacing="1" cellpadding="7" style="width: 100%; margin-top: 20px" >
        <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Idade</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach (selectClients() as $clients ) : ?>
                <tr>
                    <td> <?php echo $clients["id"] ?> </td>
                    <td> <?php echo $clients["name"] ?> </td>
                    <td> <?php echo $clients["age"] ?> </td>
                    <td>
                        <a href="pages/edit_clients.php?id=<?=$clients["id"]?>">Editar</a>

                        <button type="button" onclick="openDel(<?php echo $clients['id'] ?>)" >Excluir</button>
                    </td>
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

    <div id="delete" hidden >
        <p>teste</p>
    </div>

    <script>
        function openDel(id) {
            const divDel = document.getElementById('delete');

            divDel.removeAttribute('hidden');


        }
    </script>

</body>
</html>


