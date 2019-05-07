<?php
session_start();
require "db_conn.php";
$arr = array_keys($_POST);

if (isset($arr)) { 
    $query = sprintf("UPDATE %s SET task_completion = 1 WHERE taskID = %d", $_SESSION['userName'], $arr[0]);
    try{
        $pdo -> exec($query);
        header("location: ../view.php");
    }catch (PDOException $e) {
        // echo ($e->getMessage() . " " . $e->getcode());
    }
}
