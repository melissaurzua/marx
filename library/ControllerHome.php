<?php

class ControllerHome extends Controller {

    public function execute() {
        $this->getData()->name = 'dino';
    }


    public function getTemplate() {
        return 'home';
    }
}