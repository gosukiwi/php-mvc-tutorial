<?php
class Controller
{
    public function __construct() {
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
    }

    protected function view($file, $params = array()) {
        extract($params);
        require(__DIR__ . '/../views/' .$file);
    }
}
