<?php 
    include_once __DIR__ . "/../clientes.php";
?>



    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Cadastro de Clientes</h1>

    <div>
        <form action="clientes.php" method="post">
            <label for="name">Nome:</label>
            <input class="form-control mb-2" id="name" name="name" type="text" placeholder="Nome do Cliente">

            <label for="age">Idade</label>
            <input class="form-control mb-2" id="age" name="age" type="number" placeholder="Idade do Cliente" oninput="if(this.value.length > 3) this.value = this.value.slice(0, 3);" >

            <input class="btn btn-primary mb-5" type="submit" value="Enviar">
        </form>
    </div>


    <!-- DataTales client -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Clientes</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nome</th>
                            <th>Idade</th>
                            <th>Ações</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>ID</th>
                            <th>Nome</th>
                            <th>Idade</th>
                            <th>Ações</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        <?php foreach (selectClients() as $clients ) : ?>
                            <tr>
                                <td> <?php echo $clients["id"] ?> </td>
                                <td> <?php echo $clients["name"] ?> </td>
                                <td> <?php echo $clients["age"] ?> </td>
                                <td>
                                    <a href="/?p=edit_clients&id=<?=$clients["id"]?>">Editar</a>

                                    <button type="button" onclick="openDel(<?php echo $clients['id'] ?>)" >Excluir</button>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>


    <div>
        <h2>Produtos</h2>
        <ul>
            <?php foreach (selectProducts() as $products ) : ?>
                <li> <?php echo $products["title"] . " - R$ " . number_format($products["price"], 2, ",", ".") ?> </li>
            <?php endforeach; ?>
        </ul>
    </div>