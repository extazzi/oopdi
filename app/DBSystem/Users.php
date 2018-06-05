<?php
namespace App\DBSystem;
use App\DBInterface\IConnection;
use App\traits\Connect;

class Users implements IConnection
{
    use Connect;
    //public function __construct(DBConfiguration $cnf)
    //$this->conf= $cnf;

    public function __construct()
    {
        $this->setParams();
    }

    public function getAllNameUsers()
    {
        $users = $this->db->conn->query('SELECT * FROM users');
        while ($row = $users->fetch()) {
            $ar[] = $row['fname'].' '.$row['lname'];
        }
        return $ar;
    }

}