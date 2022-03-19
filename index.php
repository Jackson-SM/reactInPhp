<?php

require_once __DIR__."/vendor/autoload.php";

$loader = new \Twig\Loader\FilesystemLoader("/App/View/templates");
$twig = new \Twig\Environment($loader);

echo $twig->render('home.html', array('template' => 'Página home'));