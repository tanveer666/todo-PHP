<?php
require "db_conn.php";
$e = null;

if (isset($_POST['submit'])) {
    try {

        $querry = sprintf("SELECT passHash FROM login WHERE userName = '%s' ;", $_POST['userName']);
        $pdo_st = $pdo->query($querry);
        $pdo_st->setFetchMode(PDO::FETCH_ASSOC);

        $array = $pdo_st->fetch();
        $isMatch = password_verify($_POST['pass'], $array['passHash']);

        if ($isMatch == true) {
            session_start();
            $_SESSION['userName'] = $_POST['userName'];
            header("location: ../view.php"); //redirects user to a certain page upon successful login!
        }
    } catch (PDOException $e) {
        echo ($e->getMessage() . " " . $e->getLine());
    }
}
?>