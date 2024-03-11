<?php

use App\Database;
use App\Company;
use App\Request;

    $id = intval(basename(Request::uri()));

    $error = null;

    $connection = Database::connect();
    $company = new Company($connection);
    
    $company_data = $company->loadCompanyData($id);

    if(empty($company_data)){
        header('Location: /');
        exit;
    }


    if(isset($_POST['save'])){

        $isDataValid = Company::validateCompanyData($_POST);
        if($isDataValid === true){
            $company->createCompany($_POST)->updateCompany($id);
            header('Location: /');
            exit;
        }
        else{
            $company_data = $_POST;
            $error = $isDataValid;
        }

    }




    require 'view/pages/edit-company.view.php';