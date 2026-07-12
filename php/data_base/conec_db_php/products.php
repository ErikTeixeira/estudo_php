<?php

include_once "connect_db.php";


function selectProducts() {
    $db = connect();

    $query = $db->prepare("SELECT * FROM produtos");
    $query->execute();

    $result = $query->fetchAll(PDO::FETCH_ASSOC);

    return $result;
}