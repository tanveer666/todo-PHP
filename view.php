<?php
/*
 * View page.
 * Twig is loaded.
 * session is started.
 * 
 * if userName is present (meaning user is logged in), it executes the script serveData which returns a $taskArray global variable containing task objects.
 * Then this task Array rendered with twig for the view.html where the appropriate values are input into the templates.
 * 
 * else it renders view.html with tasks as null, which urges the user to log in.
*/
session_start();
require 'Twig/lib/Twig/Autoloader.php';

// $amount = $_POST['amount'];
Twig_Autoloader::register();
// Load twig templating engine
$loader = new Twig_Loader_Filesystem('views');
$twig = new Twig_Environment($loader);

// Enable debugging so we can dump array
$twig = new \Twig\Environment($loader, ['debug' => true,]);
    $twig->addExtension(new \Twig\Extension\DebugExtension());
    
    $completion;
    if($_POST['completion'] == 'done') {
        $completion = 1;
    } elseif ($_POST['completion'] == 'todo') {
        $completion = 0;
    } else {
        $completion = null;
    }
    if(isset($_SESSION['userName'])) {
        $amount = $_POST['amount'];
        $custom = $_POST['custom'];
        require "php/serveData.php";
        echo $twig->render('view.html', array('tasks' => $taskArray));
    }

else {
    echo $twig -> render('view.html',array('tasks' => null));
}