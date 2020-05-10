<?php


class App {
    private Base $f3;

    public function __construct() {
        $this->f3 = Base::instance();

    }

    private function connectDb() {
        $connect = parse_ini_file("/etc/connect.ini");
        $this->f3->set("DB", new \DB\SQL("mysql:host=db;dbname={$connect["MYSQL_DATABASE"]};charset=utf8", $connect["MYSQL_USER"], $connect["MYSQL_PASSWORD"]));
    }

    private function routes() {
        $this->f3->route("GET /", "Main->index");
        $this->f3->route("GET /login", "Enter->login");
        $this->f3->route("POST /auth", "Enter->auth");
        $this->f3->route("GET|POST /api/@method", "Api->@method");
        $this->f3->route("GET /@method", "Main->@method");
        $this->f3->route("GET /test/@area/@method", 'Tests\@area->@method');
    }

    private function setup() {
        $this->connectDb();

        $this->f3->set("AUTOLOAD", "app/;classes/;");
        $this->f3->set("ROOT", ".");
        $this->f3->set("UI", "./ui/");

        $this->routes();
    }

    public function run() {
        $this->setup();
        $this->f3->run();
    }
}