<?php
require "db_conn.php";
session_start();
$e = null;

if (isset($_POST['submit'])) {
        try {
            $query_st = sprintf("DELETE FROM %s WHERE taskID ='%d';", $_SESSION['userName'], $_POST['taskID']);
            $pdo->exec($query_st);
        } catch (PDOException $e) {
            echo ($e->getMessage() . " " . $e->getLine());
        }
    }

?>


<!DOCTYPE html>
<html lang="en-US">

<head>
    <link rel="stylesheet" href="css/view.css">
    <meta charset="UTF-8">
    <meta name="description" content="ICD0007 Project, Todo List">
    <title> View Tasks</title>
</head>

<body>
    <nav class="nav">
        <a href="index.php"> Index </a> &nbsp; &nbsp;
        <a href="register.php"> Register </a>&nbsp; &nbsp;
        <a href="create.php"> Create List </a>&nbsp; &nbsp;
        <a href="view.php"> View List</a>&nbsp; &nbsp;
        <a href="delete.php"> DELETE Tasks </a>&nbsp; &nbsp;
        <a href="faq.php"> FAQ </a>&nbsp; &nbsp;
    </nav>

    <h2> DELETE tasks </h2>
    <form method="POST">
        Enter Task ID :<input type="number" name="taskID">
        Submit :<input type="submit" name="submit" value="submit">
    </form>
</body>

</html> 