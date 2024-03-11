<?php

declare(strict_types = 1);

namespace App;
use PDO;

class Company{
    protected $pdo;
    
    private string $name;
    private int $code;
    private string $vatCode;
    private string $adress;
    private string $phone;
    private string $email;
    private string $activity;
    private string $manager;

    public function __construct($pdo){
        $this->pdo = $pdo;
    }

    /**
     * Creates an object for company data.
     */
    public function createCompany(array $company){
        $this->name = $company['name'];
        $this->code = $company['code'];
        $this->vatCode = $company['vatCode'];
        $this->adress = $company['adress'];
        $this->phone = $company['phone'];
        $this->email = $company['email'];
        $this->activity = $company['activity'];
        $this->manager = $company['manager'];

        return $this;
    }

    /**
     * Inserto company data to database
     */
    public function insertCompany(){
        try{

            $query = "INSERT INTO `companies` (`id`, `name`, `code`, `vatCode`, `adress`, `phone`, `email`, `activity`, `manager`)
             VALUES (NULL, :name, :code, :vatCode, :adress, :phone, :email, :activity, :manager)";
           
            $stmt = $this->pdo->prepare($query);
            $stmt->bindParam(':name', $this->name, PDO::PARAM_STR);
            $stmt->bindParam(':code', $this->code, PDO::PARAM_INT);
            $stmt->bindParam(':vatCode', $this->vatCode, PDO::PARAM_STR);
            $stmt->bindParam(':adress', $this->adress, PDO::PARAM_STR);
            $stmt->bindParam(':phone', $this->phone, PDO::PARAM_STR);
            $stmt->bindParam(':email', $this->email, PDO::PARAM_STR);
            $stmt->bindParam(':activity', $this->activity, PDO::PARAM_STR);
            $stmt->bindParam(':manager', $this->manager, PDO::PARAM_STR);
            $stmt->execute();
            
    
        }catch(PDOException $e){
            die($e->getMessage());
        }
    }

    /**
     * Delete company from database
     * @param int $id Company ID
     */
    public function deleteCompany(int $id){
        try{

            $query = "DELETE FROM `companies` WHERE id = :id";
            $stmt = $this->pdo->prepare($query);
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->execute();
            
        }catch(PDOException $e){
            die($e->getMessage());
        }
    }

    /**
     * Check if company data is valid.
     * @param array $data All data for company
     * @return true|string Return true if data is valid, string with information if invalid.
     */
    public static function validateCompanyData(array $data){
        
        $requiredFields = ['name', 'code', 'adress', 'phone', 'email', 'activity', 'manager'];
        foreach ($requiredFields as $field) {
            if (empty($data[$field])) {
                return "Neužpildytas laukelis!";
            }
        }

        if (!is_numeric($data['code'])) {
            return "Netinkamas kodo formatas: turi būti skaičiai";
        }

        if (!empty($data['vatCode']) && !preg_match('/^[A-Z]{2}[0-9]{2,}$/', $data['vatCode'])) {
            return "Netinkamas PVM kodo formatas!";
        }
    
        if (!filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
            return "Netinkamas el. pašto formatas";
        }
    
        $maxLengths = [
            'name' => 255,
            'adress' => 255,
            'vatCode' => 50,
            'phone' => 50,
            'email' => 255,
            'activity' => 255,
            'manager' => 255
        ];
    
        foreach ($maxLengths as $field => $maxLength) {
            if (strlen($data[$field]) > $maxLength) {
                return "$field ilgis viršija didžiausią leistiną ilgį";
            }
        }
    
        return true;
    }
    

    /**
     * Get array of all companies
     * @param int $limit Data limit, default 20
     * @return array ASSOC Array with companies data from database.
     */
    public function allCompanies(int $limit = 20){

        try{
            $stmt = $this->pdo->prepare('SELECT * FROM `companies` ORDER BY `id` DESC LIMIT :limit');
            $stmt->bindParam(':limit', $limit, PDO::PARAM_INT);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }catch(PDOException $e){
            die($e->getMessage());
        }

    }


    /**
    * Load a single company data from database.
    * @param int $id company ID.
    * @return array Single company data
    */
    public function loadCompanyData(int $id){

        try{
            $stmt = $this->pdo->prepare('SELECT * FROM `companies` WHERE id = :id');
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->execute();
            return $stmt->fetch(PDO::FETCH_ASSOC);
        }catch(PDOException $e){
            die($e->getMessage());
        }

    }


    /**
    * Update single company data in database.
    * @param int $id company ID.
    */
    public function updateCompany(int $id){
        try{

            $query = "UPDATE `companies` SET `name` = :name, `code` = :code, `vatCode` = :vatCode, `adress` = :adress, `phone` = :phone, `email` = :email, `activity` = :activity, `manager`= :manager WHERE id = :id";
            $stmt = $this->pdo->prepare($query);
            
            $stmt->bindParam(':name', $this->name, PDO::PARAM_STR);
            $stmt->bindParam(':code', $this->code, PDO::PARAM_INT);
            $stmt->bindParam(':vatCode', $this->vatCode, PDO::PARAM_STR);
            $stmt->bindParam(':adress', $this->adress, PDO::PARAM_STR);
            $stmt->bindParam(':phone', $this->phone, PDO::PARAM_STR);
            $stmt->bindParam(':email', $this->email, PDO::PARAM_STR);
            $stmt->bindParam(':activity', $this->activity, PDO::PARAM_STR);
            $stmt->bindParam(':manager', $this->manager, PDO::PARAM_STR);
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->execute();
            
        }catch(PDOException $e){
            die($e->getMessage());
        }
    }




}