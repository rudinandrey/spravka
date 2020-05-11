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
        return file_get_contents($url);
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
        return file_get_contents($url);
    }


}