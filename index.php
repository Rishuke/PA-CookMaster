<?php 


// https://www.wicookin.fr
// https://www.wicookin.fr/users/ => // https://www.wicookin.fr/index.php



if (isPath("users")) {
    if (isGetMethod()) {
        require_once __DIR__ . "/routes/users/get.php";
        die();
    }

    if (isPostMethod()) {
        require_once __DIR__ . "/routes/users/post.php";
        die();
    }
}

if (isPath("users/:user")) {
    if (isDeleteMethod()) {
        require_once __DIR__ . "/routes/users/delete.php";
        die();
    }

    if (isPatchMethod()) {
        require_once __DIR__ . "/routes/users/patch.php";
        die();
    }
}

echo jsonResponse(404, [], [
    "success" => false,
    "message" => "Route not found"
]);