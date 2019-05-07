<?php
    require "db_conn.php";
    $e = null;
    $pass_hash = password_hash($_POST['pass1'], PASSWORD_DEFAULT);

    if (isset($_POST['submit'])) {
        try {
            /* This INSERTS users credentials into the (pre existing)data table called login( userName VARCHAR(20), email VARCHAR(320), passHash CHAR(255));*/
            $pdo_stmnt = $pdo->prepare("INSERT INTO login (userName, email, passHash) VALUES( :user, :email, :passHash);");
            $paramBind = [':user' => $_POST['userName'], ':email' => $_POST['email'], ':passHash' => $pass_hash]; //array for the parameters to be bound before execution.
            $pdo_stmnt->execute($paramBind);

            /* Creates The data table for the user under the project database. Each time user creats a task, the task will be inserted into the data_table of the user name*/
            $querry = sprintf("CREATE TABLE IF NOT EXISTS %s (taskID INT AUTO_INCREMENT PRIMARY KEY, t_date DATE ,t_time TIME, task VARCHAR(300), task_completion TINYINT(1) DEFAULT 0);", $_POST['userName']);
            $pdo->exec($querry);
            header("location: ../index.php");
        } catch (PDOException $e) {
            echo "User name is taken, please choose something else.";
            // echo ("querry failiure " . $e->getMessage() . " " . $e->getLine());
        }
    }
?>