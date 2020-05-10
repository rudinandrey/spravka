<?php

namespace Spravka\Models;


use Spravka\SqlMapper\SearchMapper;

class ProviderFactory {
    private \Base $f3;

    public function __construct(\Base $f3) {
        $this->f3 = $f3;
    }

    private function getProvider(string $provider) {
        switch ($provider) {
            case "sql":
                return new SearchMapper($this->f3->get("DB"));
                break;
            case "es09":
                return new \Spravka\Es09Mapper\SearchMapper($this->f3);
        }
    }
}