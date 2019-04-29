<!DOCTYPE html>
<html lang="en-US">

<head>
    <link rel="stylesheet" href="css/bootstrap.css">
    <meta charset="UTF-8">
    <meta name="description" content="ICD0007 Project, Todo List">
    <title> View Tasks</title>

    <?php
    session_start();
    require "php/db_conn.php";
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


    <nav class="navbar navbar-expand-lg navbar-dark bg-primary" id="navbarColor01">      
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link" href="index.php"> Index </a> &nbsp; &nbsp;
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="register.php"> Register </a>&nbsp; &nbsp;
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="create.php"> Create List </a>&nbsp; &nbsp;
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="view.php"> View List</a>&nbsp; &nbsp;
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="faq.php"> FAQ </a>&nbsp; &nbsp;
                </li>
            </ul>
    </nav>

    <h2> View Tasks for today</h2>

    <table class="table table-success table-hover">
        <tr>

            <th class="table-info"> STATUS </th>
            <th class="table-info"> TASK ID </th>
            <th class="table-info"> DATE </th>
            <th class="table-info"> TIME</th>
            <th class="table-info"> TASKS</th>
            <th class="table-info"> </th>
            <th class="table-info"> EDIT Task </th>
            <th class="table-info"> DELETE Task </th>
        </tr>

        <form method="POST" action="./php/taskComplete.php" id='done' onsubmit="return confirm('Are you sure you want to mark task as Done?');"> </form>
        <form method="POST" action="edit.php" id='edit'> </form>
        <form method="POST" action="./php/delete.php" id='delete' onsubmit="return confirm('Do you really want to Delete the task?');"> </form>
        <?php
        while ($row = $pdo_st->fetch()) // Takes 1 row of the data table, stores into an assoc array called row, elements of each row can be called by column name.
            {
                if ($row['task_completion'] == true) {
                    echo "<tr class = 'table-danger'> <td> DONE </td>";
                } else {
                    echo "<tr> <td> TO DO </td>";
                }

                echo ("<td>" . $row['taskID'] . "</td>" . "<td>" . $row['t_date'] . "</td>" . "<td>" . $row['t_time'] . "</td>" . "<td>" . $row['task'] . "</td>");
                echo "<td> <input type = 'submit' form = 'done' name = '", $row['taskID'], "' value = 'done?' > </input> </td>";
                echo "<td> <input type = 'submit' form = 'edit' value = 'edit', name ='", $row['taskID'], "'> </td>";
                echo "<td> <input type = 'submit' form = 'delete' value = 'delete' name ='", $row['taskID'], "' > </td>";
                echo "</tr>";
            }

        ?>
    </table>



    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

</body>


</html>