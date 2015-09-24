<?php

class Request {


    protected $_request;

    public function __construct() {
        $this->_request = (object)$_REQUEST;
        $requestUri = $_SERVER['REQUEST_URI'];
        $cleanUri = $requestUri;
        if (strpos($requestUri, ROOT) === 0) {
            $cleanUri = substr($requestUri, strlen(ROOT));
        }
        $segments = explode('/', $cleanUri);
        $segmentsCount = count($segments);
        if ($segmentsCount > 0) {
            for ($i = 0; $i < $segmentsCount; $i = $i + 2) {
                if ($segments[$i] != '') {
                    $this->_request->{urldecode($segments[$i])} = isset($segments[$i + 1]) ? urldecode($segments[$i + 1]) : null;
                }
            }
        }
    }

    public function __get($key) {
        if (isset($this->_request->$key)){
            return $this->_request->$key;
        }
        return null;
    }

    public function __set($key, $value){
        $this->_request->$key = $value;
    }

    public function __isset($key) {
        return isset($this->_request->$key);
    }
}