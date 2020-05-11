<?php

namespace Spravka\Interfaces;

interface SearchInterface {
    public function search(int $city, int $type, string $searchName, string $searchAddress);
}