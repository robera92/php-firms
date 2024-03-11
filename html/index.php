<?php
require('vendor/autoload.php');


use App\Request;
use App\Router;

require Router::load('routes.php')->direct(Request::uri());