<?php

session_start();


require __DIR__ . "/../vendor/autoload.php";


use Noodlehaus\Config;

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . "/../");
$dotenv->load();

$conf = new Config(__DIR__.'/../config/database.php');

// Parsedown marche que quand je le met dans le même fichier (je sais pas si c'est intentionnel) example dans le dossier /views/index.php

// Impossible d'utiliser whoops


require __DIR__ . "/../app/router.php";





