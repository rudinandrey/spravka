<?php

namespace Tataisneft\Provider;

class Database {
    public function __construct($f3) {
        $this->db = $f3->get("DB");
    }


}