<?php

class Loader {


    public function __construct() {
        spl_autoload_register(
            array($this, 'autoload')
        );
    }

    public function autoload($className) {
        $parts = explode('_', $className);
        if (count($parts) > 1 && $parts[0] == 'App'){

        } else {
            require_once BASE_PATH . 'library/' . $className . '.php';
        }

    }



}