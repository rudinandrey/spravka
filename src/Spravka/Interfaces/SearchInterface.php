<?php

namespace Spravka\Interfaces;

interface SearchInterface {
    public function search($city, $type, $searchName, $searchAddress);
}