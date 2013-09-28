<?php

class QuestionsController {
    
    private $model;
    
    public function __construct() {
        $this->model = new Questions();
    }
    
    public function index() {
        echo json_encode(array('message' => 'welcome to questions'));
    }
    
    public function find($id = null) {
        if (!isset($id)) {
            echo json_encode($this->model->findAll());
        } else {
            echo json_encode($this->model->find($id));
        }
    }
    
    public function create() {
        $create = filter_input(INPUT_POST, 'create');
        if(!isset($create)) {
            die(json_encode(array('message'=>'this requires form submission')));
        }
        
        $question = filter_input(INPUT_POST, 'question');
        $answer = filter_input(INPUT_POST, 'answer');
        $value = filter_input(INPUT_POST, 'value');
        
        if (!isset($question) || !isset($answer) || !isset($value)) {
            die(json_encode(array('message'=>'all are required fields')));
        } else {
            // do work
        }
    }
    
    public function update() {
        $method = filter_input(INPUT_POST, '_method');
        if (!isset($method) && $method == 'put') {
            echo json_encode(array('message'=>'method type (PUT) must explicitly defined'));
        } else {
            $id = filter_input(INPUT_POST, 'id');
            if (!isset($id)) {
                echo json_encode(array('message'=>'question id needs to be specified'));
            } else {
                // do work
            }
        }
    }
    
    public function delete() {
        $method = filter_input(INPUT_POST, '_method');
        if (!isset($method) && $method == 'delete') {
            echo json_encode(array('message'=>'method type (DELETE) must explicitly defined'));
        } else {
            $id = filter_input(INPUT_POST, 'id');
            if (!isset($id)) {
                echo json_encode(array('message'=>'question id needs to be specified'));
            } else {
                // do work
            }
        }
    }
    
    public function search($key) {
        if (!isset($key)) {
            echo json_encode(array('message'=>'provide search key'));
        }
    }
    
}

