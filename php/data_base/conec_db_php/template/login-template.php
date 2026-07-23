

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>

    <link rel="stylesheet" href="../css/sb-admin-2.min.css">

        <!-- Custom fonts for this template -->
    <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this page -->
    <link href="../vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

</head>
<body class="bg-gradient-primary">

    <div id="container">
        <div class="row justify-content-center" >
            <div class="card o-hidden border-0 shadow-lg my-5" >
                <div class="p-5" >
                    <div class="text-center" >
                       <h1 class="h4 text-gray-900 mb-4" >Bem vindo de volta!</h1> 
                    </div>

                    <form action="login.php" method="post">
                        <input name="email" type="email" placeholder="Digite seu E-mail" >
                        <input name="password" type="password" placeholder="Digite sua Senha">
                    
                        <button type="submit" class="btn btn-primary btn-user btn-block mt-4" >
                            Login
                        </button>
                    </form>

                    <hr>

                    <div>
                        <a class="semail" >
                            Esqueci minha senha
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="../vendor/jquery/jquery.min.js"></script>
    <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="../vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Page level plugins -->
    <script src="../vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="../vendor/datatables/dataTables.bootstrap4.min.js"></script>


</body>
</html>