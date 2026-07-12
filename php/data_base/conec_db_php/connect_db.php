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