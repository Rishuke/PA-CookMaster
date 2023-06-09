<?php 


// https://www.wicookin.fr
// https://www.wicookin.fr/members/ => // https://www.wicookin.fr/index.php

ini_set("display_errors", 1);
error_reporting(E_ALL);

require_once __DIR__ . "/libraries/path.php";
require_once __DIR__ . "/libraries/method.php";

if (isPath("members")) {
    if (isGetMethod()) {
        require_once __DIR__ . "/routes/members/get.php";
        die();
    } else if (isPostMethod()) {
        require_once __DIR__ . "/routes/members/post.php";
        die();
    }
} else if (isPath("members/:member")) {
    if (isDeleteMethod()) {
        require_once __DIR__ . "/routes/members/delete.php";
        die();
    } else if (isPatchMethod()) {
        require_once __DIR__ . "/routes/members/patch.php";
        die();
    }
} else {
    require_once __DIR__ . "/routes/not-found/all.php";
    die();
}
