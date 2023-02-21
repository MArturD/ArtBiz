<?php
class Database {
    private static $instance = null;
    private $pdo, $query, $error = false, $count, $result;
    private function __construct(){
        try {
            $this->pdo = new PDO("mysql:dbname=marlin_clean_oop;host=localhost", 'root', '');
//    echo "ok";
        }catch (PDOException $exception){
            die($exception->getMessage());
        }
    }
    public static function getInstance(){
        if(!isset(self::$instance)){
            self::$instance = new Database;
        }
        return self::$instance;
}
    public function query($sql){
        $this->error = false;
        $this->query = $this->pdo->prepare($sql);
        if (!$this->query->execute()){
            $this->error = true;
        }else {
            $this->result = $this->query->fetchAll(PDO::FETCH_ASSOC);
            $this->count = $this->query->rowCount();
        }
        return $this;
    }
    public function error(){
        return $this->error;
    }
    public function count(){
        return $this->count;
    }
    public function result(){
        return $this->result;
    }
}