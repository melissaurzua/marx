<?php

class DB extends PDO {


    public function __construct() {
        $config = Application::getInstance()->getConfig();
        parent::__construct(
            'mysql:host=localhost;dbname=' . $config->db->name,
            $config->db->username,
            $config->db->password
        );
    }
}