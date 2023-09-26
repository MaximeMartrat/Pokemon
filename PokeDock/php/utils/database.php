<?php

function connectToDB()
{
    $config = require('config/config.php');


    $host = $config['db_host'];
    $user = $config['db_user'];
    $pass = $config['db_pass'];
    $dbname = $config['db_name'];
    try {
        $db = new PDO("mysql:host=$host;dbname=$dbname", $user, $pass);
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        // echo "Connexion à la base de données réussie !";
    } catch (PDOException $e) {
        echo "Erreur : " . $e->getMessage();
    }
    return $db;
}



