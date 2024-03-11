<?php

    use App\Database;
    use App\Company;
    use App\Request;

    $connection = Database::connect();
    $company = new Company($connection);

    $id = intval(basename(Request::uri()));

    $company->deleteCompany($id);
    header('Location: /');
    exit;