<?php

class QueryBuilder{
    protected $pdo;
    public function __construct($pdo){
        $this-> pdo = $pdo;
    }


    function getAllPosts(){
        $statement = $this-> pdo -> prepare("SELECT * FROM posts");
        $statement->execute();
        $posts = $statement->fetchAll(PDO::FETCH_ASSOC);
        return $posts;
    }
}
