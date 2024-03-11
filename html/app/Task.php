<?php

namespace ToDo;
use PDO;

class Task{
    protected $pdo;
    
    private $subject;
    private $dueDate;
    private $priority;
    private $status = 0;

    public function __construct($pdo){
        $this->pdo = $pdo;
    }

    public function createTask($task){
        $this->subject = $task['subject'];
        $this->dueDate = $task['dueDate'];
        $this->priority = $task['priority'];

        $this->insertTask();
    }

    private function insertTask(){
        try{

            $query = "INSERT INTO `tasks` (`subject`,`priority`,`dueDate`,`status`) VALUES (:subject,:priority,:dueDate,:status)";
            $stmt = $this->pdo->prepare($query);
            $stmt->bindParam(':subject', $this->subject, PDO::PARAM_STR);
            $stmt->bindParam(':priority', $this->priority, PDO::PARAM_INT);
            $stmt->bindParam(':dueDate', $this->dueDate, PDO::PARAM_STR);
            $stmt->bindParam(':status', $this->status, PDO::PARAM_INT);
            $stmt->execute();
            header('Location: /'); exit;
            
        }catch(PDOException $e){
            die($e->getMessage());
        }
    }


    public function deleteTask($id){
        try{

            $query = "DELETE FROM `tasks` WHERE id = :id";
            $stmt = $this->pdo->prepare($query);
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->execute();
            header('Location: /'); exit;
            
        }catch(PDOException $e){
            die($e->getMessage());
        }
    }


    public function allTasks(){

        try{
            $stmt = $this->pdo->prepare('SELECT * FROM `tasks`');
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }catch(PDOException $e){
            die($e->getMessage());
        }

    }



    public function completeTask($id){
        try{
            $this->status = 1;

            $query = "UPDATE `tasks` SET `status` = :status WHERE id = :id";
            $stmt = $this->pdo->prepare($query);
            $stmt->bindParam(':status', $this->status, PDO::PARAM_INT);
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->execute();
            header('Location: /'); exit;
            
        }catch(PDOException $e){
            die($e->getMessage());
        }
    }




}