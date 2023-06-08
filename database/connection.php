<?php

function getDatabaseConnection(): PDO
{
    require_once __DIR__ . "/settings.php";

    try{

        $databaseConnection = new PDO(
            "$databaseDialect:host=$databaseHostname:$databasePort;dbname=$databaseName",
            $databaseUsername,
            $databasePassword, [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);


    }
    catch(Exception $e){
        die('Erreur : ' . $e->getMessage());
    }

    return $databaseConnection;
}
