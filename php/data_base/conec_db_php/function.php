<?php

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

