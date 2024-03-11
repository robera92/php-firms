<?php

$router->define([
    '/' => 'controllers/homeController.php',
    '/add-new' => 'controllers/addCompanyController.php',
    '/delete' => 'controllers/deleteCompanyController.php',
    '/update' => 'controllers/updateCompanyController.php',
    '404' => 'controllers/404Controller.php',
]);