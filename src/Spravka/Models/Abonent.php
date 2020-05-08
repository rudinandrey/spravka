<?php

namespace Spravka\Models;

use Spravka\Mappers\AbonentMapper;

class Abonent {
    private $abonent;

    public function __construct($f3, $abonent) {
        $this->abonent = $this->prepare($abonent);
        $this->mapper = new AbonentMapper($f3->get("DB"));
    }

    public function save() {
        return $this->mapper->add($this->abonent);
    }

    public function get() {
        return $this->abonent;
    }

    private function prepare($abonent) {
        if(!isset($abonent["owner"])) $abonent["owner"] = "";
        $abonent["is_visible"] = 1;
        $abonent["is_company"] = $abonent["type"];
        $this->abonent = $abonent;
    }
}