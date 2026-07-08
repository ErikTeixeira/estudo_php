<?php


$name = isset( $_POST['name'] ) ? $_POST['name'] : '' ;
$age = isset ($_POST['age']) ? $_POST['age'] : '';

if ( $name != '' && $age != '' ) {
    insertClient($name, $age);
}

function connect()
{
    try {
        $pdo = new PDO(
            "mysql:host=localhost;port=3316;dbname=teste",
            "root",
            "Senha@2025"
        );

        return $pdo;
    } catch (PDOException $e) {
        echo "Erro ao conectar ao banco de dados: " . $e->getMessage();
    }

}


function selectClientts() {
    $db = connect();

    $query = $db->prepare("SELECT * FROM clientes");
    $query->execute();

    $result = $query->fetchAll(PDO::FETCH_ASSOC);

    return $result;
}


function selectProducts() {
    $db = connect();

    $query = $db->prepare("SELECT * FROM produtos");
    $query->execute();

    $result = $query->fetchAll(PDO::FETCH_ASSOC);

    return $result;
}


function insertClient($name, $age) {
    $db = connect();

    $query = $db->prepare("INSERT INTO clientes (name, age) VALUES ('".$name."', $age)");

    $query->execute();
}


29:50