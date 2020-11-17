<?php

session_start();

require __DIR__ . "/../vendor/autoload.php";
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . "/../");
$dotenv->load();

// Impossible d'utiliser whoops


require __DIR__ . "/../app/router.php";




