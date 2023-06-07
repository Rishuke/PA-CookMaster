<?php

function createMember(string $lastname, 
                    string $firstname, 
                    string $sex, 
                    string $status , 
                    string $phonenumber, 
                    string $email, 
                    string $password, 
                    string $image): void
{
    require_once __DIR__ . "/../../database/connection.php";

    $databaseConnection = getDatabaseConnection();

    $createMemberQuery = $databaseConnection->prepare("
        INSERT INTO members(
            lastname,
            firstname,
            sex,
            status,
            phonenumber,
            email,
            password,
            image
        ) VALUES (
            :lastname,
            :firstname,
            :sex,
            :status,
            :phonenumber,
            :email,
            :password,
            :image
        );
    ");

    $createMemberQuery->execute([
        "lastname" => htmlspecialchars($lastname),
        "firstname" => htmlspecialchars($firstname),
        "sex" => htmlspecialchars($sex),
        "status" => htmlspecialchars($status),
        "phonenumber" => htmlspecialchars($phonenumber),
        "email" => htmlspecialchars($email),
        "password" => password_hash(htmlspecialchars($password), PASSWORD_BCRYPT),
        "image" => htmlspecialchars($image),
    ]);
}
