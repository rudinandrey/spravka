<?php

namespace Spravka\Models;

use Spravka\Interfaces\TokenInterface;

class TokenGenerator implements TokenInterface {
    public function generate() {
        return $this->randomString(64);
    }

    private function randomString(int $length) {
        try {
            return bin2hex(random_bytes($length));
        } catch (\Exception $e) {
        }
    }

}