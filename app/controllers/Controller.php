<?php
class Controller
{
    private $katar;

    public function __construct() {
        // configure model
        ActiveRecord\Config::initialize(function($cfg)
        {
            // activerecord will autoload all classes inside this folder
            $cfg->set_model_directory(__DIR__ . '/../models');
            // let's use a mysql datbase, in this case the username and
            // password are both root, and the database is php-mvc
            $cfg->set_connections(array(
                'development' => 'mysql://root:root@localhost/php-mvc'
            ));
        });

        // configure views
        // load Katar and set the cache folder to ./app/cache
        $this->katar = new \Katar\Katar(__DIR__ . '/../cache');
    }

    protected function view($file, $params = array()) {
        // katar will compile $file and render the compiled file by
        // including it
        $this->katar->render(__DIR__ . '/../views/' . $file, $params);
    }
}
