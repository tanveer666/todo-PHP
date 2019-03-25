
<!DOCTYPE html>
<html lang="en-US">
    <head>
        <link rel="stylesheet" href = "css/view.css">
        <meta charset="UTF-8">
        <meta name="description" content="ICD0007 Project, Todo List">
        <title> View Tasks</title>

        <?php
session_start();
require "db_conn.php";
if( isset($_SESSION['userName']) )
{
    try
    {
        $querry = sprintf("SELECT * FROM %s", $_SESSION['userName']);
        $pdo_st = $pdo -> query($querry);
        $pdo_st -> setFetchMode(PDO::FETCH_ASSOC);
    }
    catch(PDOException $p)
    {
        echo($p -> getMessage(). " ". $p -> getLine());
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

        <h2> View Tasks for today</h2>

        <table>
            <tr> <th> TIME</th> <th> TASKS</th></tr>
            <?php
            while ($row = $pdo_st->fetch()) // Takes 1 row of the data table, stores into an assoc array called row, elements of each row can be called by column name.
            {
                echo"<tr>";
                echo("<td>". $row['time']. "</td>". "<td>". $row['task'] . "</td>");
                echo"</tr>";

            }
            ?>
        </table>



    </body>


    </html>

