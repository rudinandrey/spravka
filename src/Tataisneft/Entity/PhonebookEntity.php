<?php

namespace Tataisneft\Entity;

class PhonebookEntity {
    private $row;
    public function __construct($row) {
        foreach($this->getFields() as $field) {
            $this->row[$field] = $row[$field];
        }
    }

    public function get() {
        return $this->row;
    }

    private function getFields() {
        return [
            "id",
            "city_id",
            "phone",
            "name",
            "owner",
            "address",
            "info",
            "is_visible",
            "is_company"
        ];
    }
}