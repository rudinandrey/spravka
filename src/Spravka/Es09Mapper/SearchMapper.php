<?php


namespace Spravka\Es09Mapper;


use Spravka\Interfaces\SearchInterface;
use Spravka\Models\Cities;

class SearchMapper implements SearchInterface {

    /**
     * @var Cities
     */
    private Cities $city;

    public function __construct($f3) {
        $this->city = new Cities($f3);
    }

    public function search($city, $type, $search) {
        // TODO: Implement search() method.
        $cityEs09 = $this->city->getEs09Code($city);
        $arr = [
            "city"=>$cityEs09,
            "limit"=>50,
            "offset"=>0,
            "q"=>$search
        ];
        $params = http_build_query($arr);
        $url = "http://es09.ru:8080/api/company/search?".$params;
        $data = file_get_contents($url);
        return $this->parse($data);
    }

    public function searchSimple(int $city, string $search) {
        $cityEs09 = $this->city->getEs09Code($city);
        $arr = [
            "city"=>$cityEs09,
            "limit"=>50,
            "offset"=>0,
            "q"=>$search
        ];
        $params = http_build_query($arr);
        $url = "http://es09.ru:8080/api/company/search?".$params;
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
            if (preg_match("/\((\D+.)\)/", trim($part), $m)) $result["owner"] = $m[1];
            if (preg_match("/\(\d+.\)/", trim($part))) $phone_code = $part;
        }
        $result["phone"] = $phone_code.$phone;
        return $result;
    }

}