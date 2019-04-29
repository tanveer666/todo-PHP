<?php
require "db_conn.php";
session_start();

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
$taskArray = array();
if (isset($_SESSION['userName'])) {
    $date = date('Y-m-d');
    try {

        $querry = sprintf("SELECT * FROM %s WHERE t_date >= '%s' ;", $_SESSION['userName'], $date);
        $pdo_st = $pdo->query($querry);
        $pdo_st->setFetchMode(PDO::FETCH_ASSOC);
    } catch (PDOException $p) {
        echo ($p->getMessage() . " " . $p->getLine());
    }
}

while ($row = $pdo_st->fetch()) // Takes 1 row of the data table, stores into an assoc array called row, elements of each row can be called by column name.
    {
        $taskArray[] = new Task($row['taskID'], $row['t_date'], $row['t_time'], $row['task'], $row['task_completion']); //creates on object called task, pushes it into the Array
    }
