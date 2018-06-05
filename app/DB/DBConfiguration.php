<?php

namespace App\DB;
use \PDO;

class DBConfiguration
{
    private $user;
    private $password;
    private $dbname;
    private $host;

    public function __construct(string $user, string $password, string $dbname, string $host){

        $this->password = $password;
        $this->host = $host;
        $this->user = $user;
        $this->dbname = $dbname;
    }

    private function getPassword(){

        return $this->password;
    }

    private function getUser(){

        return $this->user;
    }

    private function getDbname(){

        return $this->dbname;
    }

    private function getHost(){

        return $this->host;
    }

    final public function getDsn(){

        $dsn = 'mysql:host=' .  $this->getHost() . ';dbname=' . $this->getDbname() . ';charset=utf8';
        $opt = [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES => false,
        ];
        return new PDO($dsn,$this->getUser(), $this->getPassword(), $opt);
    }

}