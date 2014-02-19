<?php
namespace App\Lib;

class Configuration implements \ArrayAccess
{
    private $config;

    public function __construct() {
        $this->config = require(__DIR__ . '/../config/config.php');
    }

    public function offsetSet($offset, $value) {
        if(is_null($offset)) {
            $this->config[] = $value;
        } else {
            $this->config[$offset] = $value;
        }
    }

    public function offsetExists($offset) {
        return isset($this->config[$offset]);
    }

    public function offsetUnset($offset) {
        unset($this->config[$offset]);
    }

    public function offsetGet($offset) {
        return isset($this->config[$offset]) ? $this->config[$offset] : null;
    }
}
