<?php


namespace Spravka\Models;


class Providers {

    private \Base $f3;

    public function __construct($f3) {
        $this->f3 = $f3;
    }

    public function getListProviders() {
        return ["sql", "es09"];
    }
}