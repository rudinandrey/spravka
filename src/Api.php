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

    public function search($f3) {
        $city = $f3->get("POST.city");
        $type = $f3->get("POST.type");
        $search = $f3->get("POST.search");
        $provider = $f3->get("POST.provider");


        $this->getResult(["params"=>$f3->get("POST")]);
    }
}