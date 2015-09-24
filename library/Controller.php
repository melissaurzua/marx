<?php

class Controller {

    /**
     * @var ControllerData
     */
    protected $_data;

    public function __construct() {
        $this->_data = new ControllerData();
    }

    /**
     *
     */
    public function execute() {

    }

    /**
     * @return ControllerData
     */
    public function getData() {
        return $this->_data;
    }

    public function getTemplate() {
        return null;
    }


}