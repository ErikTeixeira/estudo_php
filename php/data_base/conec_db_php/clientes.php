<?php

include_once "connect_db.php";


$id = isset( $_POST['id'] ) ? $_POST['id'] : '' ;
$name = isset( $_POST['name'] ) ? $_POST['name'] : '' ;
$age = isset ($_POST['age']) ? $_POST['age'] : '';

if ( $name != '' && $age != '' && $id == '' ) {
    insertClient($name, $age);
} elseif ( $name != '' && $age != '' && $id != '' ) {
    updateClient($id, $name, $age);
}


function getClient($id) {
    $db = connect();

    $query = $db->prepare("SELECT * FROM clientes WHERE id = $id");
    $query->execute();

    $result = $query->fetch(PDO::FETCH_ASSOC);

    return $result;
}


function selectClients() {
    $db = connect();

    $query = $db->prepare("SELECT * FROM clientes");
    $query->execute();

    $result = $query->fetchAll(PDO::FETCH_ASSOC);

    return $result;
}


function insertClient($name, $age) {
    $db = connect();

    $query = $db->prepare("INSERT INTO clientes (name, age) VALUES ('".$name."', $age)");

    $query->execute();

    header("Location: index.php");
    exit;
}


function updateClient($id, $name, $age) {
    $db = connect();

    $query = $db->prepare("UPDATE clientes SET name = '$name', age = $age WHERE id = $id");

    $query->execute();

    header("Location: ../index.php");
    exit;
}