<?php


namespace Spravka\Models;


use Spravka\SqlMapper\SearchMapper;

class Search {
    private \Base $f3;
    /**
     * @var SearchMapper
     */
    private SearchMapper $mapper;

    public function __construct(\Base $f3) {
        $this->f3 = $f3;
        $this->mapper = new SearchMapper($f3->get("DB"));
    }

    public function search($city, $type, $search, $provider) {
        if($city == 0) throw new \Exception("Не выбран город");
        if($type == -1) throw new \Exception("Не выбран тип абонента");

        return $this->mapper->searchSimple($city, $search);
    }


}