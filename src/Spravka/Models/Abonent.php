<?php

namespace Spravka\Models;

use Spravka\SqlMapper\AbonentMapper;

class Abonent {
    private $abonent;
    /**
     * @var AbonentMapper
     */
    private AbonentMapper $mapper;

    public function __construct($f3, array $abonent) {
        $this->abonent = $this->prepare($abonent);
        $this->mapper = new AbonentMapper($f3->get("DB"));
    }

    public function save() {
        return $this->mapper->add($this->abonent);
    }

    public function get() {
        return $this->abonent;
    }

    private function prepare(array $abonent) {
        if(!isset($abonent["owner"])) $abonent["owner"] = "";
        $abonent["is_visible"] = 1;
        $abonent["is_company"] = $abonent["type"];
        return $abonent;
    }
}