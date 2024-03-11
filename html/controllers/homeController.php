<?php

use App\Database;
use App\Company;

$connection = Database::connect();

$companies = new Company($connection);


require 'view/index.view.php';