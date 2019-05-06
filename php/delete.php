<?php
/*
 * This takes a task ID and deletes it from the database.
*/
require "db_conn.php";
session_start();
$e = null;
$arr = array_keys($_POST);
if (isset($arr)) {
        try {
            $query_st = sprintf("DELETE FROM %s WHERE taskID ='%d';", $_SESSION['userName'], $arr[0]);
            $pdo->exec($query_st);
             header("location: ../view.php");
        } catch (PDOException $e) {
            echo ($e->getMessage() . " " . $e->getLine());
        }
    }

?>

