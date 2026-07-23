<?php

session_start();

include_once "connect_db.php";


$email = isset ($_POST['email']) ? $_POST['email'] : '';
$password = isset ($_POST['password']) ? md5( $_POST['password']) : '';

if ( !empty($email) && !empty($password) ) {
    $user = getUser($email, $password);
}


function getUser($email, $password) {
    $db = connect();

    $query = $db->prepare("SELECT * FROM Users WHERE email = '$email' AND password = '$password'");
    $query->execute();
    $result = $query->fetch(PDO::FETCH_ASSOC);

    if ( $result ) {
        // tirar o password do array
        unset($result['password']);
        $_SESSION['user'] = $result;
        header("Location:/");
    }
}

