<?php

namespace Tataisneft\Adapter;

use DB\SQL;

class RoleAdapter {
    public function __construct(SQL $db) {
        $this->db = $db;
    }

    public function getRolesByUserId($userId) {
        $sql = "SELECT * FROM role LEFT JOIN user_in_role uir ON role.role_id = uir.role_id WHERE uir.user_id = :user_id;";
        $roles = $this->db->exec($sql, ["user_id"=>$userId]);
    }
}