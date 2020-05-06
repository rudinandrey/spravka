<?php
namespace Tataisneft\Entity;

class CityEntity {
    private $city;

    public function __construct($city) {
        if(count($this->getFields()) != count($city)) throw new \Exception("Неподходящий формат для города");
        foreach($this->getFields() as $field) {
            $this->city[$field] = $city[$field];
        }
    }

    public function get() {
        return $this->city;
    }

    private function getFields() {
        return ["city_id", "city_name"];
    }
}