<?php

class Questions extends Db {
    private $con;
    public function __construct() {
        parent::__construct();
        $this->con = $this->getConnection();
    }
    
    public function find($id) {
        $stmt = $this->con->prepare("SELECT * FROM questions WHERE question_id = :id");
        $stmt->execute(array(':id' => $id));
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    
    public function findAll() {
        $stmt = $this->con->query("SELECT * FROM questions");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    
    public function create($question, $answer, $value) {
        $query = "INSERT INTO questions VALUES (null, :question, :answer, :value)";
        $stmt = $this->con->prepare($query);
        return $stmt->execute(array(
            ':question' => $question,
            ':answer' => $answer,
            ':value' => $value));
    }
    
    public function update($id, $question, $answer, $value) {
        $query = "UPDATE questions SET question = :question, answer = :answer, question_value = :value WHERE question_id = :id";
        $stmt = $this->con->prepare($query);
        return $stmt->execute(array(
            ':id' => $id, ':question' => $question, ':answer' => $answer, ':value' => $value));
    }
    
    public function delete($id) {
        $query = "DELETE FROM questions WHERE question_id = :id";
        $stmt = $this->con->prepare($query);
        return $stmt->execute(array(
            ':id' => $id));
    }
    
    public function search($key) {
        $stmt = $this->con->prepare("SELECT * FROM questions WHERE question LIKE :key");
        $stmt->execute(array(':key' => '%'.$key.'%'));
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    
}