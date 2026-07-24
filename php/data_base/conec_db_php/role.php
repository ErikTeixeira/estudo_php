<?php

include_once "connect_db.php";


function getRole($id) {
    $db = connect();

    $query = $db->prepare("SELECT * FROM roles WHERE id_role = $id");
    $query->execute();

    $result = $query->fetch(PDO::FETCH_ASSOC);

    return $result;
}


function selectRoles() {
    $db = connect();

    $query = $db->prepare("SELECT * FROM roles");
    $query->execute();

    $result = $query->fetchAll(PDO::FETCH_ASSOC);

    return $result;
}
