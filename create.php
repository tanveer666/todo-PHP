 <?php
session_start();
require 'Twig/lib/Twig/Autoloader.php';

// $amount = $_POST['amount'];
Twig_Autoloader::register();
// Loads twig templating engine
$loader = new Twig_Loader_Filesystem('views');
$twig = new Twig_Environment($loader);

// Enable debugging so we can dump array
$twig = new \Twig\Environment($loader, ['debug' => true,]);
    $twig->addExtension(new \Twig\Extension\DebugExtension());

    if(isset($_SESSION['userName'])) {
        echo $twig->render('create.html', array('login' => "true")); //If user is logged in, the normal page is renderd
    }
    else {
        echo $twig->render('create.html'); // Otherwise login is null, and does not let user access.
    }
?>



