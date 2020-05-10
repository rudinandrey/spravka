<?php


namespace Spravka\Models;


class Parser {
    private string $search;
    private array $result = [
        "city" => 0,
        "type" => -1,
        "search" => ""
    ];

    public function __construct(string $search) {
        $this->search = $search;
    }

    public function getSearch() {

    }

    private function getType() {

    }
}