<?php
session_start();
require 'Twig/lib/Twig/Autoloader.php';

// $amount = $_POST['amount'];
Twig_Autoloader::register();
// Load twig templating engine
$loader = new Twig_Loader_Filesystem('views');
$twig = new Twig_Environment($loader);

// Enable debugging so we can dump array
$twig = new \Twig\Environment($loader, [
    'debug' => true,
    ]);
    $twig->addExtension(new \Twig\Extension\DebugExtension());

    if(isset($_SESSION['userName'])) {
        $amount = $_POST['amount'];
        $custom = $_POST['custom'];
        require "php/serveData.php";
        echo $twig->render('view.html', array(
        'tasks' => $taskArray,
        ));
    }

else {
    echo $twig -> render('view.html',array('tasks' => null));
}