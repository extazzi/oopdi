<?php

namespace App\DB;

class DBConnection
{
    private $configuration;
    public $conn;

    public function __construct(DBConfiguration $config)
    {
        $this->configuration = $config;
        $this->conn = $this->configuration->getDsn();
        return $this->conn;
    }

}