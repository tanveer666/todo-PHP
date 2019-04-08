<!DOCTYPE html>
<html lang="en-US">

<head>
    <link rel="stylesheet" href="css/view.css">
    <meta charset="UTF-8">
    <meta name="description" content="ICD0007 Project, Todo List">
    <title> View Tasks</title>

    <?php
    session_start();
    require "db_conn.php";
    if (isset($_SESSION['userName'])) {
        try {
            $querry = sprintf("SELECT * FROM %s", $_SESSION['userName']);
            $pdo_st = $pdo->query($querry);
            $pdo_st->setFetchMode(PDO::FETCH_ASSOC);
        } catch (PDOException $p) {
            echo ($p->getMessage() . " " . $p->getLine());
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

    <h2> View Tasks for today</h2>

    <table>
        <tr>

            <th> STATUS </th>
            <th> TASK ID </th>
            <th> DATE </th>
            <th> TIME</th>
            <th> TASKS</th>
            <th> </th>
            <th> EDIT Task </th>
        </tr>

        <form method="POST" action="#" id = 'check'> </form>
        <form method="POST" action="edit.php" id = 'edit'> </form>
            <?php
            $completed_task_list = [];
            while ($row = $pdo_st->fetch()) // Takes 1 row of the data table, stores into an assoc array called row, elements of each row can be called by column name.
                {
                    $_SESSION['edit'] = $row['taskID'];
                    if (isset($_POST[$row['taskID']])) {
                        $completed_task_list = [$row['taskID'] => true];
                    }
                    if ($row['task_completion'] == true) {
                        echo "<tr class = 'strike'> <td> DONE </td>";
                    } else {
                        echo "<tr> <td> TO DO </td>";
                    }
                    
                    echo ("<td>" . $row['taskID'] . "</td>" ."<td>" . $row['t_date'] . "</td>" . "<td>" . $row['t_time'] . "</td>" . "<td>" . $row['task'] . "</td>");
                    echo "<td> <input form = 'check' type='checkbox' name = '", $row['taskID'], "' value = 'done' onChange='this.form.submit()'> </input> </td>";
                    echo "<td> <input type = 'submit' form = 'edit' name = 'edit', value ='", $row['taskID'],"'> </td>";
                    echo "</tr>";
                    
                }
            
        

            foreach ($completed_task_list as $key => $value) {
                if ($value == true) {
                    $query = sprintf("UPDATE %s SET task_completion = 1 WHERE taskID = %d", $_SESSION['userName'], $key);
                    try {
                        $pdo->exec($query);
                        header("location: view.php");
                    } catch (PDOException $e) {
                        echo ($e->getMessage() . " " . $e->getcode());
                    }
                }
            }

            ?>


    </table>



</body>


</html> 