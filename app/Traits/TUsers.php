<?php

namespace App\traits;

trait TUsers
{
    public function getAllNameUsers($gender = NULL)
    {
        if (empty($gender)) {
            $users = $this->db->conn->query('SELECT * FROM users');
        } else {
            $users = $this->db->conn->query('SELECT * FROM users WHERE gender = ' . $gender);
        }
        while ($row = $users->fetch()) {
            $ar[] = $row['fname'] . ' ' . $row['lname'];
        }
        return $ar;
    }
}