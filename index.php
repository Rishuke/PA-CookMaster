<?php 


// https://www.wicookin.fr
// https://www.wicookin.fr/members/ => // https://www.wicookin.fr/index.php


ini_set("display_errors", 1);
error_reporting(E_ALL);

require_once __DIR__ . "/libraries/path.php";
require_once __DIR__ . "/libraries/method.php";
require_once __DIR__ . "/libraries/response.php";


if (isPath("members")) {
    if (isGetMethod()) {
        require_once __DIR__ . "/routes/members/get.php";
        die();
    }

    if (isPostMethod()) {
        require_once __DIR__ . "/routes/members/post.php";
        die();
    }
}

if (isPath("members/:member")) {
    if (isDeleteMethod()) {
        require_once __DIR__ . "/routes/members/delete.php";
        die();
    }

    if (isPatchMethod()) {
        require_once __DIR__ . "/routes/members/patch.php";
        die();
    }
}

echo jsonResponse(404, [], [
    "success" => false,
    "message" => "Route not found"
]);