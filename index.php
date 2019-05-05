<?php
require 'Twig/lib/Twig/Autoloader.php';

Twig_Autoloader::register();
    // Load twig templating engine
    $loader = new Twig_Loader_Filesystem('views');
    $twig = new Twig_Environment($loader);

    // Enable debugging so we can dump array
    $twig = new \Twig\Environment($loader, [
    'debug' => true,
    ]);
    $twig->addExtension(new \Twig\Extension\DebugExtension());

if (isset($_POST['submit'])) {
    try {
        require "php/db_conn.php";
        $e = null;

        $querry = sprintf("SELECT passHash FROM login WHERE userName = '%s' ;", $_POST['userName']);
        $pdo_st = $pdo->query($querry);
        $pdo_st->setFetchMode(PDO::FETCH_ASSOC);

        $array = $pdo_st->fetch();
        $isMatch = password_verify($_POST['pass'], $array['passHash']);

        if ($isMatch == true) {
            session_start();
            $_SESSION['userName'] = $_POST['userName'];
            header("location: view.php"); //redirects user to view page upon successful login!
        }
        else {
            echo $twig -> render('index.html',array('login' => 'false' ) );
        }
    } catch (PDOException $e) {
        echo ($e->getMessage() . " " . $e->getLine());
    }
}
else {
    echo $twig -> render('index.html');
}