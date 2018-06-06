<?php

namespace App\DBInterface;

interface IUsers
{
    public function showDataUserForBrouser();
    public function getAllNameUsers($gender);
}