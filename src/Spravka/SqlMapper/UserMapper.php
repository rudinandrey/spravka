<?php

namespace Spravka\SqlMapper;

use DB\SQL;
use Spravka\Interfaces\UserMapperInterface;

class UserMapper implements UserMapperInterface {

    /**
     * @var SQL
     */
    private SQL $db;

    public function __construct(SQL $db) {
        $this->db = $db;
    }

    public function findById($id) {
        $sql = "SELECT * FROM user WHERE user_id = :id;";
        $data = $this->db->exec($sql, ["id"=>$id]);
        if(isset($data) && count($data) == 1){
            return $data[0];
        } else {
            return false;
        }
    }

    public function findByEmailPassword($email, $password) {
        $sql = "SELECT * FROM user WHERE email = :email";
        $data = $this->db->exec($sql, ["email"=>$email]);
        if(isset($data) && count($data) == 1) {
            if(password_verify($password, $data[0]["password"])) {
                return $data[0];
            }
        }
        return false;
    }

    public function findByToken($token) {
        $sql = "SELECT * FROM user WHERE token = :token;";
        $data = $this->db->exec($sql, ["token"=>$token]);
        if(isset($data) && count($data) == 1){
            if($this->checkLastAuth($data[0]["last_auth"], 86400)) {
                return $data[0];
            }
        } else {
            return false;
        }
    }

    private function hashedPassword($password) {
        return password_hash($password, PASSWORD_BCRYPT);
    }

    private function checkLastAuth($lastAuth, $period) {
        $now = time();
        $last = strtotime($lastAuth);
        if($last + $period - $now  > 0) {
            return true;
        }
        return false;
    }

    public function saveToken($id, $token) {
        $sql = "UPDATE user SET token = :token, last_auth=:last WHERE user_id = :id";
        $last = date("Y-m-d H:i:s", time());
        $c = $this->db->exec($sql, ["token"=>$token, "last"=>$last, "id"=>$id]);
        return $c == 1;
    }

    public function createUser($email, $password, $username) {
        $sql = "INSERT INTO user (email, password, username) VALUES (:email, :password, :username);";
        return $this->db->exec($sql, ["email"=>$email, "password"=>$this->hashedPassword($password), "username"=>$username]) == 1;
    }
}