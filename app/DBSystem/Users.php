<?php

namespace App\DBSystem;

use App\DBInterface\IConnection;
use App\traits\Connect;
use App\traits\TUsers;
use App\DBInterface\IUsers;

class Users implements IConnection, IUsers
{
    private $users;

    use Connect;
    use TUsers;

    public function __construct()
    {
        $this->setParams();
    }

    public function showDataUserForBrouser()
    {
        $user = $this->users;
        return $user;
    }

    public function getGender($id)
    {
        $stmt = $this->db->conn->prepare("SELECT `gender` FROM users WHERE id_user = :id_user");
        $stmt->execute(array(':id_user' => $id));
        $rez = $stmt->fetch();
        return $rez['gender'];
    }

    public function getCustomerFnameByGender($gender){
        $stmt = $this->db->conn->prepare("SELECT * FROM users WHERE gender = :gender");
        $stmt->execute(array(':gender' => $gender));
        $rez = $stmt->fetchAll();
        $fname = array();
        foreach ($rez as $name){
            $fname[] = $name['fname'];
        }
        return $fname;
    }
}