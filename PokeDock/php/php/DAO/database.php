<?php

function connectToDB()
{
    $host = "dbBB";
    $user = "BeWeb";
    $pass = "Pokemon34";
    $dbname = "Pokemon";
    try {
        $db = new PDO("mysql:host=$host;dbname=$dbname", $user, $pass);
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        // echo "Connection a la DataBase reussi<br>";
    } catch (PDOException $e) {
        echo "Erreur : " . $e->getMessage();
    }
    return $db;
}



