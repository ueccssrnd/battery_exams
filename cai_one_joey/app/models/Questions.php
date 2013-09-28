<?php

class Questions extends Db {
    private $con;
    public function __construct() {
        parent::__construct();
        $this->con = $this->getConnection();
    }
}