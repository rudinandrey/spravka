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

        if($provider == null) $provider = 0;

        $model = new \Spravka\Models\Search($f3, $provider);
        try {
            $abonents = $model->search($city, $type, $search, 0);
            $this->getResult(["params"=>$f3->get("POST"), "abonents"=>$abonents]);
        } catch (Exception $e) {
            $this->getResult(["message"=>$e->getMessage()], 1);
        }
    }

    public function edit($f3) {
        $post = $f3->get("POST");

        try {
            $abonent = new \Spravka\Models\Abonent($f3, $post);
            $c = $abonent->save();
            $this->getResult(["cnt"=>$c]);
        } catch (Exception $e) {
            $this->getResult(["message"=>$e->getMessage()], 1);
        }
    }

    public function remove($f3) {
        $post = $f3->get("POST");
        try {
            $abonent = new \Spravka\Models\Abonent($f3, $post);
            $c = $abonent->remove($this->user["user_id"]);
            $this->getResult(["cnt"=>$c]);
        } catch (Exception $e) {
            $this->getResult(["message"=>$e->getMessage()], 1);
        }
    }
}