<?php

namespace App\traits;
use App\DB\DBConnection;
use App\DB\DBConfiguration;

trait Connect
{
    public $conf;
    public $db;
    public function setParams(){
        $this->conf = new DBConfiguration('root','','oop','localhost');
        $this->db = new DBConnection($this->conf);
    }
}