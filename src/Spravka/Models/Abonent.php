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
        if($this->abonent["id"] == null) {
            return $this->mapper->add($this->abonent);
        } else {
            return $this->mapper->save($this->abonent);
        }

    }

    public function get() {
        return $this->abonent;
    }

    public function remove(int $user_id) {
        $abonent = $this->abonent;
        $abonent["user_id"] = $user_id;
        try {
            return $this->mapper->remove($abonent);
        } catch (\Exception $e) {
            return ["message"=>$e->getMessage(), "abonent"=>$abonent];
        }
    }

    private function prepare(array $abonent) {
        if(!isset($abonent["owner"])) $abonent["owner"] = "";
        return $abonent;
    }
}