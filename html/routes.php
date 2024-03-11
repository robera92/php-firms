<?php

$router->define([
    '/' => 'controllers/homeController.php',
    '/add-task' => 'controllers/addTaskController.php',
    '/delete' => 'controllers/deleteTaskController.php',
    '/complete' => 'controllers/completeTaskController.php',
    '404' => 'controllers/404Controller.php',
]);