<?php

use ToDo\Database;
use ToDo\Task;

$connection = Database::connect();

$tasks = new Task($connection);


require 'view/pages/home.view.php';