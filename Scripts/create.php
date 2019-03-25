
<!DOCTYPE html>
<html lang="en-US">
    <head>
        <link rel="stylesheet" href= "css/create_style.css">
        
        <meta charset="UTF-8">
        <meta name="description" content="ICD0007 Project, Todo List">
        <title> Create List</title>
        
        <?php
session_start();
require "db_conn.php";
$e = NULL;
$dateTime = $_POST['date']. " ". $_POST['time'];

if( isset($_POST['submit']))
{
    try
    {
    /* This will insert Time and to do into a pre existing table called $_POST['user] */
    $querry_prep = sprintf("INSERT INTO %s (time, task) VALUES ( :time , :task);",$_SESSION['userName'] );
    /* The sprintf part is necessary because there cannot be "quotes" before the table name.*/
    /* Be default execute statement adds quotes before and after the bound parameters, so userName couldn't be bound, rather added by sprintf*/
    $pdo_st = $pdo -> prepare($querry_prep);
    $param = [':time' => $dateTime, ':task' => $_POST['todo'] ];
    $pdo_st -> execute($param);
    header("location: view.php");
    }
    catch(PDOException $e)
    {
    echo("querry error ". $e -> getMessage(). " ". $e -> getLine());
    }
}
?>

    </head>

    <body>

            <nav class="nav">
                    <a href = "index.php"> Index </a> &nbsp; &nbsp;
                    <a href = "register.php"> Register </a>&nbsp; &nbsp;
                    <a href = "create.php">  Create List </a>&nbsp; &nbsp;
                    <a href = "view.php"> View List</a>&nbsp; &nbsp;
                    <a href = "faq.php"> FAQ </a>&nbsp; &nbsp;
                </nav>

        <h2> Create List</h2>
        
        <form action = "#" method="POST"> 
        <!--   User Name: <input type="text" name = "user"> <br> <br>  unecessary, session variables will hold the username (and table name)-->
            Date : <input type="date" name= "date"> <br> <br>
            Time : <input type = "time" name ="time"> <br> <br>
            Task (upto 300 characters) : <textarea rows = "6" cols= "40" name = "todo" maxlength="300"></textarea> <br> <br>
            
            <input type="submit" name = "submit" value="submit"> <br>
        </form>

    </body>
</html>


