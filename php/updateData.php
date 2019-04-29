<?php
require "db_conn.php";
session_start();
if (isset($_POST['save'])) {
    try {
        $querry = sprintf("UPDATE %s SET t_date = '%s' , t_time = '%s' , task = '%s' , task_completion = %d WHERE taskID = %d;", $_SESSION['userName'], $_POST['date'], $_POST['time'], $_POST['todo'], $_POST['task_completion'], $_SESSION['id']);
        //$_SESSION[id] is defined in getData, where sessiion[id] = taskID;
        echo $querry;
        $pdo->exec($querry);
        header("location: ../view.php");
    } catch (PDOException $e) {
        echo ($e->getMessage() . " " . $e->getLine());
    }
}
?>