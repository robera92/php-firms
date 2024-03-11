<?php

use ToDo\Database;
use ToDo\Task;
use ToDo\Request;

    $connection = Database::connect();
    $task = new Task($connection);

    $id = intval(basename(Request::uri()));

    $task->deleteTask($id);