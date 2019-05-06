<?php
/*
 * Index page script. 
 * loads the twig auto loader. checks if the submit button was pressed or not.
 * If submited, then connects to the database and matches the password with the passhash of the user.
 * If it matches, session is started and session userName is initialized.
 * 
 * If submitted but failed, the the index html is rendered with login = false, meaning that there was a failed login attempt. 
 * So on the page is notified to try again.
 * 
 * If not submitted, then index is rendered but no additional info is sent.
*/

require 'Twig/lib/Twig/Autoloader.php'; 

Twig_Autoloader::register();
    // Loads twig templating engine
    $loader = new Twig_Loader_Filesystem('views'); //Location of the html pages in the filesystem.
    $twig = new Twig_Environment($loader); //twig object.

    // Enable debugging so we can dump array
    $twig = new \Twig\Environment($loader, ['debug' => true,]); //set debugging mode
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