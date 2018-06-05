<?php

namespace App\DBSystem;

use App\DBInterface\IConnection;
use App\traits\Connect;

class RegisteryUsers implements IConnection
{
    use Connect;

    public function __construct()
    {
        $this->setParams();
    }

    public function registery($fname, $lname, $mail, $gender)
    {
        $stmt = $this->db->conn->prepare("INSERT INTO users (fname, lname, mail, gender) VALUES (:lname, :fname, :mail, :gender)");
        $stmt->bindparam(":fname", $fname);
        $stmt->bindparam(":lname", $lname);
        $stmt->bindparam(":mail", $mail);
        $stmt->bindparam(":gender", $gender);
        $stmt->execute();
        return $stmt;
    }

    public function authorization($lname, $mail)
    {
        $stmt = $this->db->conn->prepare("SELECT * FROM users WHERE lname=:lname AND mail=:mail LIMIT 1");
        $stmt->execute(array(':lname' => $lname, ':mail' => $mail));
        $userRow = $stmt->fetch();
        if (!empty($userRow)) {
            $_SESSION['user_session'] = $userRow['id_user'];
            return true;
        } else {
            return false;
        }
    }

    public function logout()
    {
        session_destroy();
        unset($_SESSION['user_session']);
        return true;
    }
}