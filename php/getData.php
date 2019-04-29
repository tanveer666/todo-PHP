<?php
/*
 * This script serves as a data controller for the edit.php script, what ever data that is to be displayed on the edit page comes from here.
 */
$arr = array_keys($_POST);
if (isset($_SESSION['userName'])) {
    try {
        if (is_numeric($arr[0])) {
            $_SESSION['id'] = $arr[0]; // id = taskID
           }
        $querry = sprintf('SELECT * FROM %s WHERE taskID = %d', $_SESSION['userName'], $_SESSION['id']);
        $pdo_st = $pdo->query($querry);
        $pdo_st->setFetchMode(PDO::FETCH_ASSOC);
        $row = $pdo_st->fetch();
    } catch (PDOException $ex) {
        echo ($ex->getMessage() . " " . $ex->getLine());
    }
}
