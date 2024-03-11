<?php

use App\Database;
use App\Company;

$error = null;

if(isset($_POST['save'])){

    $connection = Database::connect();
    $company = new Company($connection);

    $isDataValid = Company::validateCompanyData($_POST);


    if($isDataValid === true){
        $company->createCompany($_POST)->insertCompany();
        header('Location: /');
        exit;
    }
    else{
        $error = $isDataValid;
    }

}


require 'view/pages/add-company.view.php';