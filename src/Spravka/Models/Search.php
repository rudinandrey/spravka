<?php


namespace Spravka\Models;


use Spravka\SqlMapper\SearchMapper;

class Search {
    private \Base $f3;
    /**
     * @var SearchMapper
     */
    private SearchMapper $mapper;

    public function __construct(\Base $f3, $provider) {
        $this->f3 = $f3;
        $factory = new ProviderFactory($f3);
        $this->mapper = $factory->getProvider($provider);
    }

    public function search($city, $type, $search, $provider) {
        if($city == 0) throw new \Exception("Не выбран город");

        if($type == -1) {
            // используем простой поиск по всем типам
            return $this->mapper->searchSimple($city, $search);
        } else {
            return $this->mapper->search($city, $type, $search);
        }
    }
}