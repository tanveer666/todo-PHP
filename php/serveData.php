<?php
require "db_conn.php";
session_start();
$taskArray = array();
// $amount = $_POST['amount'];
class Task
{
    public $taskID;
    public $t_date;
    public $t_time;
    public $task;
    public $task_completion;
    
    
    public function  __construct($taskID, $t_date, $t_time, $task, $task_completion)
    {
        $this->taskID = $taskID;
        $this->t_date = $t_date;
        $this->t_time = $t_time;
        $this->task  = $task;
        $this->task_completion = $task_completion;
    }
}


function all($pdo, &$taskArr) {
    // $date = date('Y-m-d');
    $querry = sprintf("SELECT * FROM %s ORDER BY t_date ASC;", $_SESSION['userName']);
    $pdo_st = $pdo->query($querry);
    $pdo_st->setFetchMode(PDO::FETCH_ASSOC);
    while ($row = $pdo_st->fetch()) // Takes 1 row of the data table, stores into an assoc array called row, elements of each row can be called by column name.
    {
        // $taskArr[] = new Task($row['taskID'], $row['t_date'], $row['t_time'], $row['task'], $row['task_completion']); //creates on object called task, pushes it into the Array
        array_push($taskArr, new Task($row['taskID'], $row['t_date'], $row['t_time'], $row['task'], $row['task_completion']) );
    }
}

function today($pdo, &$taskArr) {
    $date = date('Y-m-d');
    $querry = sprintf("SELECT * FROM %s WHERE t_date >= '%s' ORDER BY t_date ASC;", $_SESSION['userName'],$date);
    $pdo_st = $pdo->query($querry);
    $pdo_st->setFetchMode(PDO::FETCH_ASSOC);
    while ($row = $pdo_st->fetch()) // Takes 1 row of the data table, stores into an assoc array called row, elements of each row can be called by column name.
    {
        // $taskArr[] = new Task($row['taskID'], $row['t_date'], $row['t_time'], $row['task'], $row['task_completion']); //creates on object called task, pushes it into the Array
        array_push($taskArr, new Task($row['taskID'], $row['t_date'], $row['t_time'], $row['task'], $row['task_completion']) );
    }

}
function custom($pdo, &$taskArr, $inputDate) {
    $querry = sprintf("SELECT * FROM %s WHERE t_date >= '%s' ORDER BY t_date ASC;", $_SESSION['userName'],$inputDate);
    $pdo_st = $pdo->query($querry);
    $pdo_st->setFetchMode(PDO::FETCH_ASSOC);
    while ($row = $pdo_st->fetch()) // Takes 1 row of the data table, stores into an assoc array called row, elements of each row can be called by column name.
    {
        // $taskArr[] = new Task($row['taskID'], $row['t_date'], $row['t_time'], $row['task'], $row['task_completion']); //creates on object called task, pushes it into the Array
        array_push($taskArr, new Task($row['taskID'], $row['t_date'], $row['t_time'], $row['task'], $row['task_completion']) );
    }
}

if ($amount == 'all') {

    try {
        all($pdo,$taskArray);
    } catch (PDOException $p) {
        echo ($p->getMessage() . " " . $p->getLine());
    }
} elseif ($amount == 'today'){
    try {
        today($pdo,$taskArray);
    } catch (PDOException $p) {
        echo ($p->getMessage() . " " . $p->getLine());
    }
} elseif( $amount == 'custom') {
    try {
        custom($pdo,$taskArray,$custom);
    } catch (PDOException $p) {
        echo ($p->getMessage() . " " . $p->getLine());
    }
}
