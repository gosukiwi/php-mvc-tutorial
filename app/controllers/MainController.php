<?php
require(__DIR__ . '/../models/GreetingModel.php');

class MainController
{
    public function index() {
        $model = new GreetingModel();
        $greeting = $model->getGreeting();

        $this->view('Main/index.html.php', array(
            'greeting' => $greeting
        ));
    }

    private function view($file, $params = array()) {
        extract($params);
        require(__DIR__ . '/../views/' .$file);
    }
}
