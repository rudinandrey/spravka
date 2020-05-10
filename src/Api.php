<?php


class Api extends \TypeController\SecureApiController {
    public function cities($f3) {
        $cities = new \Spravka\Models\Cities($f3);
        $this->getResult(["cities"=>$cities->getAllCities()]);
    }

    public function add($f3) {
        $abonent = new \Spravka\Models\Abonent($f3, $f3->get("POST"));
        $result = $abonent->save();
        $this->getResult(["status"=>$result]);
    }
}