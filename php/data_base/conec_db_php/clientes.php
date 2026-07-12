<?php

include_once "connect_db.php";


$name = isset( $_POST['name'] ) ? $_POST['name'] : '' ;
$age = isset ($_POST['age']) ? $_POST['age'] : '';

if ( $name != '' && $age != '' ) {
    insertClient($name, $age);
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
}

