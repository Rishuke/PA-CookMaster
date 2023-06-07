<?php

function deleteMember(string $id): void
{
    require_once __DIR__ . "/../../database/connection.php";

    $databaseConnection = getDatabaseConnection();
    $deleteMemberQuery = $databaseConnection->prepare("DELETE FROM members WHERE id = :id");

    $deleteMemberQuery->execute([
        "id" => $id
    ]);
}
