<?php

include_once "connect_db.php";

$id = isset( $_POST['id'] ) ? $_POST['id'] : '' ;
$idDel = isset( $_GET['idDel'] ) ? $_GET['idDel'] : '' ;
$role_id = isset( $_POST['role_id'] ) ? $_POST['role_id'] : '' ;
$name = isset( $_POST['name'] ) ? $_POST['name'] : '' ;
$email = isset ($_POST['email']) ? $_POST['email'] : '';


if ( $name != '' && $email != '' && $id == '' ) {
    $password = isset ($_POST['password']) ? md5( $_POST['password']) : '';
    insertUser($name, $email, $password, $role_id);
} elseif ( $name != '' && $email != '' && $id != '' ) {
    $user = getUser($id);
    $pass = ( !Empty($_POST["password"]) ) ? md5( $_POST['password']) : $user["password"];
    updateUser($id, $name, $email, $pass, $role_id);
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

    $query = $db->prepare("SELECT * FROM users AS u JOIN roles as r ON u.role_id = r.id_role");
    $query->execute();

    $result = $query->fetchAll(PDO::FETCH_ASSOC);

    return $result;
}


function insertUser($name, $email, $password, $role_id) {
    $db = connect();

    $query = $db->prepare("INSERT INTO Users (name, email, password, role_id) VALUES ('".$name."', '".$email."', '".$password."', $role_id)");

    $query->execute();

    header("Location: ../?p=users");
    exit;
}


function updateUser($id, $name, $email, $password, $role_id) {
    $db = connect();

    $query = $db->prepare("UPDATE Users SET name = '$name', email = '$email', password = '$password', role_id = $role_id WHERE id = $id");

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
