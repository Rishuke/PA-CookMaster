<?php

require_once __DIR__ . "/connection.php";

try {
    $databaseConnection = getDatabaseConnection();
    $databaseConnection->query("DROP TABLE IF EXISTS members;");
    $databaseConnection->query("CREATE TABLE members (id INTEGER PRIMARY KEY AUTO_INCREMENT, 
                                                        lastname VARCHAR(80) NOT NULL, 
                                                        firstname VARCHAR(80) NOT NULL, 
                                                        sex VARCHAR(1) NOT NULL, 
                                                        status VARCHAR(80) NOT NULL, 
                                                        phonenumber VARCHAR(25) NOT NULL, 
                                                        email VARCHAR(100) NOT NULL, 
                                                        password VARCHAR(255) NOT NULL, 
                                                        image TEXT NOT NULL);
                                                        ");

    echo "Migration réussie" . PHP_EOL;
} catch (Exception $exception) {
    echo "Une erreur est survenue durant la migration des données" . PHP_EOL;
    echo $exception->getMessage();
}
