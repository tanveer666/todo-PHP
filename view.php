<?php
require 'Twig/lib/Twig/Autoloader.php';
require "php/serveData.php";
session_start();


Twig_Autoloader::register();
// Load twig templating engine
$loader = new Twig_Loader_Filesystem('views');
$twig = new Twig_Environment($loader);

// Enable debugging so we can dump array
$twig = new \Twig\Environment($loader, [
    'debug' => true,
]);
$twig->addExtension(new \Twig\Extension\DebugExtension());


echo $twig->render('view.html', array(
    'tasks' => $taskArray,
));
