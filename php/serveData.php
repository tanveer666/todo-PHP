<?php
require "db_conn.php";
session_start();
$taskArray = array(); //global array used by view.php. array of task objects.
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

/*
 * functions execute the querries. each function takes a PDO object (in db_conn.php), the reference to $taskArray, and $comp (which is true false or null)
 * $comp tell which tasks to display, if null it displays all, if 1 only completed if 0, then the ones need to be done.
 * 
 * One function also takes in a date string for custom date searches.
*/

function all($pdo, &$taskArr, $comp) {
    // $date = date('Y-m-d');
    $querry;
    if(is_null($comp)) {
    $querry = sprintf("SELECT * FROM %s ORDER BY t_date ASC;", $_SESSION['userName']);
    }
    else{
        $querry = sprintf("SELECT * FROM %s WHERE task_completion = '%s' ORDER BY t_date ASC;", $_SESSION['userName'],$comp);
    }
    $pdo_st = $pdo->query($querry);
    $pdo_st->setFetchMode(PDO::FETCH_ASSOC);
    while ($row = $pdo_st->fetch()) // Takes 1 row of the data table, stores into an assoc array called row, elements of each row can be called by column name.
    {
        // $taskArr[] = new Task($row['taskID'], $row['t_date'], $row['t_time'], $row['task'], $row['task_completion']); //creates on object called task, pushes it into the Array
        array_push($taskArr, new Task($row['taskID'], $row['t_date'], $row['t_time'], $row['task'], $row['task_completion']) );
    }
}

function today($pdo, &$taskArr, $comp) {
    $date = date('Y-m-d');
    if(is_null($comp)) {
    $querry = sprintf("SELECT * FROM %s WHERE t_date >= '%s' ORDER BY t_date ASC;", $_SESSION['userName'],$date);
    }
    else {
        $querry = sprintf("SELECT * FROM %s WHERE t_date >= '%s' AND task_completion = '%s' ORDER BY t_date ASC;", $_SESSION['userName'],$date,$comp);
    }
    $pdo_st = $pdo->query($querry);
    $pdo_st->setFetchMode(PDO::FETCH_ASSOC);
    while ($row = $pdo_st->fetch()) // Takes 1 row of the data table, stores into an assoc array called row, elements of each row can be called by column name.
    {
        // $taskArr[] = new Task($row['taskID'], $row['t_date'], $row['t_time'], $row['task'], $row['task_completion']); //creates on object called task, pushes it into the Array
        array_push($taskArr, new Task($row['taskID'], $row['t_date'], $row['t_time'], $row['task'], $row['task_completion']) );
    }

}
function custom($pdo, &$taskArr, $inputDate, $comp) {
    if( is_null($comp)) {
    $querry = sprintf("SELECT * FROM %s WHERE t_date >= '%s' ORDER BY t_date ASC;", $_SESSION['userName'],$inputDate);
    } else {
        $querry = sprintf("SELECT * FROM %s WHERE t_date >= '%s' AND task_completion = '%s' ORDER BY t_date ASC;", $_SESSION['userName'],$inputDate,$comp);
    }
    $pdo_st = $pdo->query($querry);
    $pdo_st->setFetchMode(PDO::FETCH_ASSOC);
    while ($row = $pdo_st->fetch()) // Takes 1 row of the data table, stores into an assoc array called row, elements of each row can be called by column name.
    {
        // $taskArr[] = new Task($row['taskID'], $row['t_date'], $row['t_time'], $row['task'], $row['task_completion']); //creates on object called task, pushes it into the Array
        array_push($taskArr, new Task($row['taskID'], $row['t_date'], $row['t_time'], $row['task'], $row['task_completion']) );
    }
}


/*
 * Depending on the value for amount (which means all tasks, or todays task or task for some arbitrary date), different function is executed. 
 * also in the view.php script. completion value is set .
 * by default tho, when no info is submitted via post, it executes the last script. which means it will display today's todo list.
 * 
*/
if ($amount == 'all') {
    try {
        all($pdo,$taskArray, $completion);
    } catch (PDOException $p) {
        echo ($p->getMessage() . " " . $p->getLine());
    }
} elseif ($amount == 'today'){
    try {
        today($pdo,$taskArray, $completion);
    } catch (PDOException $p) {
        echo ($p->getMessage() . " " . $p->getLine());
    }
} elseif( $amount == 'custom') {
    try {
        custom($pdo,$taskArray,$custom, $completion);
    } catch (PDOException $p) {
        echo ($p->getMessage() . " " . $p->getLine());
    }
}  else {
    try {
        today($pdo,$taskArray, 0);
    } catch (PDOException $p) {
        echo ($p->getMessage() . " " . $p->getLine());
    }
}

