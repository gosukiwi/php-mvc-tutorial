<?php
namespace App\Controllers;

class Controller
{
    private $container;

    public function __construct($container) {
        $this->container = $container;
    }

    protected function get($name) {
        return $this->container->get($name);
    }

    protected function view($file, $params = array()) {
        // katar will compile $file and render the compiled file by
        // including it
        $this->get('katar')->render(__DIR__ . '/../views/' . $file, $params);
    }
}
