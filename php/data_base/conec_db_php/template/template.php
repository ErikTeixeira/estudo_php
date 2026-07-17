<?php
    include_once __DIR__ . "/../products.php";

    (isset($_GET["p"]) ? $page = $_GET["p"] : $page = "home");

    include_once __DIR__ . "/../components/header.php";
?>


    <!-- Begin Page Content -->
    <div class="container-fluid">

    <?php
        (isset($_GET["p"]) ? $page = $_GET["p"] : $page = "home");
        
        if (file_exists(__DIR__ . "/../pages/{$page}.php")) {
            include_once __DIR__ . "/../pages/{$page}.php";
        } else {
            include_once __DIR__ . "/../pages/home.php";
        }
    ?>
    <!-- /.container-fluid -->



    <?php include_once __DIR__ . "/../components/footer.php"; ?>


    </br>
    </br>
    </br>


    <div id="delete" hidden>
        <div class="delete-modal">
            <h3>Tem certeza?</h3>

            <p>Tem certeza que deseja deletar este cliente?</p>

            <div class="buttons">
                <button onclick="confirmDelete()">Sim</button>
                <button onclick="closeDel()">Não</button>
            </div>
        </div>
    </div>


    <script>
        let clientId = null;

        function openDel(id) {
            clientId = id;
            const divDel = document.getElementById('delete');

            divDel.removeAttribute('hidden');
        }

        function closeDel() {
            document.getElementById('delete').setAttribute('hidden', '');
        }

        function confirmDelete() {
            window.location.href = 'clientes.php?idDel=' + clientId;
        }
    </script>