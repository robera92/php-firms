<?php

use ToDo\Database;
use ToDo\Task;

if(isset($_POST['save'])){

    $connection = Database::connect();
    $task = new Task($connection);

    $task->createTask($_POST);

}


require 'view/pages/add-task.view.php';