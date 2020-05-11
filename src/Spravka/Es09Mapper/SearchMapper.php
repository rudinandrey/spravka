<?php


namespace Spravka\Es09Mapper;


use Spravka\Interfaces\SearchInterface;

class SearchMapper implements SearchInterface {

    public function search($city, $type, $search) {
        // TODO: Implement search() method.
        $arr = [
            "city"=>1604000014,
            "limit"=>50,
            "offset"=>0,
            "q"=>$search
        ];
        $params = http_build_query($arr);
        $url = "http://es09.ru:8080/api/company/search?city=1604000014&limit=40&offset=0&q=%D0%BA%D0%BE%D1%84%D0%B5";
        $data = file_get_contents($url);
        return $this->parse($data);
    }

    public function searchSimple(int $city, string $search) {
        $arr = [
            "city"=>1604000014,
            "limit"=>50,
            "offset"=>0,
            "q"=>$search
        ];
        $params = http_build_query($arr);
        $url = "http://es09.ru:8080/api/company/search?city=1604000014&limit=40&offset=0&q=%D0%BA%D0%BE%D1%84%D0%B5";
        $data = file_get_contents($url);
        return $this->parse($data);
    }

    private function parse($data) {
        $json = json_decode($data, true);

        $companies = [];

        $results = $json["results"];
        foreach ($results as $result) {
            if ($result["type"] == "company" && isset($result["phones"])) {
                $company = [
                    "name" => $result["name"],
                    "address" => $result["addressText"],
                    "info" => isset($result["info"]) ? $result["info"] : ""
                ];
                $phones = $result["phones"];
                foreach ($phones as $phone) {
                    $phoneAndOwner = $this->parsePhone($phone);
                    $company["owner"] = $phoneAndOwner["owner"];
                    $company["phone"] = $phoneAndOwner["phone"];
                    $companies[] = $company;
                }
            }
        }
        return $companies;
    }

    private function parsePhone($phone) {
        $result = [
            "phone" => "",
            "owner" => ""
        ];
        $parts = explode(" ", $phone);

        $phone = "";
        $phone_code = "";

        foreach ($parts as $part) {
            if (preg_match("/^\d+$/", trim($part)) == true) $phone = $part;
            if (preg_match("/\((\D+.)\)/", trim($part), $m)) echo $result["owner"] = $m[1];
            if (preg_match("/\(\d+.\)/", trim($part))) echo $phone_code = $part;
        }
        $result["phone"] = $phone_code.$phone;
        return $result;
    }

}