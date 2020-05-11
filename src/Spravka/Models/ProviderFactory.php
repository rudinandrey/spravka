<?php

namespace Spravka\Models;


use Spravka\SqlMapper\SearchMapper;

class ProviderFactory {
    private \Base $f3;

    public function __construct(\Base $f3) {
        $this->f3 = $f3;
    }

    public function getProvider(int $provider) {
        switch ($provider) {
            case 0:
                return new SearchMapper($this->f3->get("DB"));
                break;
            case 1:
                return new \Spravka\Es09Mapper\SearchMapper($this->f3);
        }
    }
}