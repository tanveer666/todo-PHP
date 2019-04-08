<!DOCTYPE html>
<html lang="en-US">

<head>
    <link rel="stylesheet" href="css/register_css.css">
    <meta charset="UTF-8">
    <meta name="description" content="ICD0007 Project, Todo List">
    <title> Registration</title>

    <?php
    require "db_conn.php";

    $e = null;
    $pass_hash = password_hash($_POST['pass'], PASSWORD_DEFAULT);

    if (isset($_POST['submit'])) {
        try {
            /* This INSERTS users credentials into the (pre existing)data table called login( userName VARCHAR(20), email VARCHAR(320), passHash CHAR(255));*/
            $pdo_stmnt = $pdo->prepare("INSERT IGNORE INTO login (userName, email, passHash) VALUES( :userName, :email, :passHash);");
            $paramBind = [':userName' => $_POST['u_name'], ':email' => $_POST['email'], ':passHash' => $pass_hash]; //array for the parameters to be bound before execution.
            $pdo_stmnt->execute($paramBind);

            /* Creates The data table for the user under the project database. Each time user creats a task, the task will be inserted into the data_table of the user name*/
            $querry = sprintf("CREATE TABLE IF NOT EXISTS %s (taskID INT AUTO_INCREMENT PRIMARY KEY, t_date ,t_time TIME, task VARCHAR(300), task_completion TINYINT(1) DEFAULT 0);", $_POST['u_name']);
            $pdo->exec($querry);
            header("location: view.php");
        } catch (PDOException $e) {
            echo ("querry failiure " . $e->getMessage() . " " . $e->getLine());
        }
    }
    ?>
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

    <h2> Registration</h2>

    <form action="#" method="post">
        User Name &emsp;: <input type="text" name="u_name"> <br>
        Email &emsp;&emsp; &nbsp;&nbsp;&nbsp; : <input type="email" name="email"> <br>
        Password &emsp; &nbsp;&nbsp;: <input type="password" name="pass"> <br>
        Confirm Password : <input type="password"> <br>
        <input type="submit" name="submit" value="submit">



    </form>



</body>


</html> 