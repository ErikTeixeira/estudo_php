<?php 
    include_once __DIR__ . "/../users.php";
    include_once __DIR__ . "/../role.php";
?>



    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Cadastro de Usuários</h1>

    <div>
        <form action="users.php" method="post">
            <label for="name">Nome:</label>
            <input class="form-control mb-2" id="name" name="name" type="text" placeholder="Nome do Cliente">

            <label for="emial">E-mail: </label>
            <input class="form-control mb-2" id="email" name="email" type="email" placeholder="Email do Cliente" >

            <label for="role_id">Permissão:</label>
            <select name="role_id" id="role_id" class="form-control mb-2">
                <?php foreach( selectRoles() as $role ): ?>
                    <option value=" <?php echo $role["id_role"] ?> " > <?php echo $role["role_name"] ?> </option>
                <?php endforeach; ?>
            </select>

            <label for="password">Senha:</label>
            <input class="form-control mb-2" id="password" name="password" type="password" placeholder="Password do Cliente" >

            <input class="btn btn-primary mb-5" type="submit" value="Enviar">
        </form>
    </div>


    <!-- DataTales client -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Usuários</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nome</th>
                            <th>Permissão</th>
                            <th>E-mail</th>
                            <th>Ações</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>ID</th>
                            <th>Nome</th>
                            <th>Permissão</th>
                            <th>E-mail</th>
                            <th>Ações</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        <?php foreach (selectUsers() as $users ) : ?>
                            <tr>
                                <td> <?php echo $users["id"] ?> </td>
                                <td> <?php echo $users["name"] ?> </td>
                                <td> <?php echo $users["role_name"] ?> </td>
                                <td> <?php echo $users["email"] ?> </td>
                                <td>
                                    <a href="/?p=edit_users&id=<?=$users["id"]?>">Editar</a>

                                    <button type="button" onclick="openDel(<?php echo $users['id'] ?>)" >Excluir</button>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>


<div id="delete" hidden>
    <div class="delete-modal">
        <h3>Tem certeza?</h3>

        <p>Tem certeza que deseja deletar este usuário?</p>

        <div class="buttons">
            <button onclick="confirmDelete()">Sim</button>
            <button onclick="closeDel()">Não</button>
        </div>
    </div>
</div>


<script>
    let userId = null;

    function openDel(id) {
        userId = id;
        const divDel = document.getElementById('delete');

        divDel.removeAttribute('hidden');
    }

    function closeDel() {
        document.getElementById('delete').setAttribute('hidden', '');
    }

    function confirmDelete() {
        window.location.href = 'users.php?idDel=' + userId;
    }
</script>