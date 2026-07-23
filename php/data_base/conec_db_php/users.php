<?php

include_once "connect_db.php";

$id = isset( $_POST['id'] ) ? $_POST['id'] : '' ;
$idDel = isset( $_GET['idDel'] ) ? $_GET['idDel'] : '' ;
$name = isset( $_POST['name'] ) ? $_POST['name'] : '' ;
$email = isset ($_POST['email']) ? $_POST['email'] : '';


if ( $name != '' && $email != '' && $id == '' ) {
    $password = isset ($_POST['password']) ? md5( $_POST['password']) : '';
    insertUser($name, $email, $password);
} elseif ( $name != '' && $email != '' && $id != '' ) {
    $user = getUser($id);
    $pass = ( !Empty($_POST["password"]) ) ? md5( $_POST['password']) : $user["password"];
    updateUser($id, $name, $email, $pass);
} elseif ( $idDel != '' ) {
    deleteUser($idDel);
}


function getUser($id) {
    $db = connect();

    $query = $db->prepare("SELECT * FROM Users WHERE id = $id");
    $query->execute();

    $result = $query->fetch(PDO::FETCH_ASSOC);

    return $result;
}


function selectUsers() {
    $db = connect();

    $query = $db->prepare("SELECT * FROM Users");
    $query->execute();

    $result = $query->fetchAll(PDO::FETCH_ASSOC);

    return $result;
}


function insertUser($name, $email, $password) {
    $db = connect();

    $query = $db->prepare("INSERT INTO Users (name, email, password) VALUES ('".$name."', '".$email."', '".$password."')");

    $query->execute();

    header("Location: ../?p=users");
    exit;
}


function updateUser($id, $name, $email, $password) {
    $db = connect();

    $query = $db->prepare("UPDATE Users SET name = '$name', email = '$email', password = '$password' WHERE id = $id");

    $query->execute();

    header("Location: ../?p=users");
    exit;
}

function deleteUser($id) {
    $db = connect();

    $query = $db->prepare("DELETE FROM Users WHERE id = $id");

    $query->execute();

    header("Location: ../?p=users");
    exit;
}
