<?php

namespace Spravka\Models;

use Spravka\Mappers\AbonentMapper;

class Abonent {
    private $abonent;

    public function __construct($f3, $abonent) {
        $this->abonent = $abonent;
        $this->mapper = new AbonentMapper($f3->get("DB"));
    }

    public function save() {
        return $this->mapper->add($this->abonent) == 1;
    }

    public function get() {
        return $this->abonent;
    }
}