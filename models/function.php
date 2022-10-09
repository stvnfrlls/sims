<?php

require_once("../utils/database.php");

class User
{
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    function findEmail($email)
    {
        $this->db->query('SELECT * FROM userdetails WHERE username = :email');
        $this->db->bind(':email', $email);

        $row = $this->db->single();

        if ($this->db->rowCount() > 0) {
            return $row;
        } else {
            return false;
        }
    }
    function addAccount($email, $password)
    {
        $this->db->query('INSERT INTO userdetails (username, password) VALUES (:username, :password)');
        $this->db->bind(':email', $email);
        $this->db->bind(':password', $password);

        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    function updatePassword($userID, $password)
    {
        $this->db->query('UPDATE userdetails SET password = :password WHERE userID = :userID');
        $this->db->bind(':password', $password);
        $this->db->bind(':userID', $userID);

        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function login($email, $password)
    {
        $row = $this->findEmail($email);

        if ($row == false) {
            return false;
        } else {
            if ($row->password == $password) {
                return $row;
            }else {
                return false;
            }
        }
    }
}
