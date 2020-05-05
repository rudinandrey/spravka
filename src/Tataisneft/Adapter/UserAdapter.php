<?php

namespace Tataisneft\Adapter;

use DB\SQL;
use Tataisneft\Entity\UserEntity;

class UserAdapter {
    private $user;
    public function __construct(SQL $db) {
        $this->db = $db;
    }

    public function findByEmail($email) {
        try {
            if(!$this->validationEmail($email)) throw new \Exception("Email не корректный");
            $sql = "SELECT * FROM user WHERE email = :email";
            $users = $this->db->exec($sql, ["email"=>$email]);
            if(isset($users) && count($users) == 1) return new UserEntity($users[0]);
            throw new \Exception("Пользователь не найден");
        } catch (\Exception $e) {
            throw new \Exception($e->getMessage());
        }
    }

    public function findById($id) {
        try {
            if($id <= 0) throw new \Exception("Неподходящий ID пользователя, должно быть число от 1 и выше");
            $sql = "SELECT * FROM user WHERE id = :id";
            $users = $this->db->exec($sql, ["id"=>$id]);
            if(isset($users) && count($users)== 1) return new UserEntity($users[0]);
            throw new \Exception("Пользователь не найден");
        } catch (\Exception $e) {
            throw new \Exception($e->getMessage());
        }
    }

    public function findByToken($token) {
        try {
            $sql = "SELECT * FROM user WHERE token = :token;";
            $users = $this->db->exec($sql, ["token"=>$token]);
            if(isset($users) && count($users)== 1) return new UserEntity($users[0]);
            throw new \Exception("Пользователь не найден");
        } catch (\Exception $e) {
            throw new \Exception($e->getMessage());
        }
    }

    public function create($user) {
        try {
            $this->validationUser($user);

            $sql = "INSERT IGNORE INTO user (email, password, username) VALUES (:email, :password, :username);";
            $user["password"] = password_hash($user["password"], PASSWORD_BCRYPT);
            unset($user["user_id"]);
            $c = $this->db->exec($sql, $user);
            if($c == 0) throw new \Exception("Пользователь не добавлен");
            $id = $this->db->pdo()->lastInsertId();
            return $this->findById($id);
         } catch (\Exception $e) {
            throw new \Exception($e->getMessage());
        }
    }

    private function validationEmail($email) {
        if(trim($email) == "") return false;
        if(!filter_var($email, FILTER_VALIDATE_EMAIL)) return false;
        return true;
    }

    private function validationUser($user) {
        if(isset($user["user_id"]) && $user["user_id"] > 0) throw new \Exception("Неподходящий ID пользователя, для нового пользователя user_id должен быть 0");
        if(!$this->validationEmail($user["email"])) throw new \Exception("Email не корректный");

    }
}