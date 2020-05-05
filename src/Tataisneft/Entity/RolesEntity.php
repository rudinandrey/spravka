<?php

namespace Tataisneft\Entity;

use Tataisneft\Adapter\RoleAdapter;

class RolesEntity {
    private $roles;

    public function __construct($f3) {
        $this->f3 = $f3;
    }

    public function isInRole($userId, $roleName) {
        if(!isset($this->roles)) {
            $adapter = new RoleAdapter($this->f3->get("DB"));
            $this->roles = $adapter->getRolesByUserId($userId);
        }
        foreach($this->roles as $role) {
            if($role["role_name"] == $roleName) return true;
        }
        return false;
    }
}