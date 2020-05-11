<?php

namespace Spravka\Interfaces;

interface SearchInterface {
    public function search(int $city, int $type, string $string);
    public function searchSimple(int $city, string $search);
}