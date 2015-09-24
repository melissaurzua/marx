<?php

class View {

    public function render() {
        header('Content-type:text/html;charset=utf8');
        $controller = Application::getInstance()->getController();

        $templateName = $controller->getTemplate();
        $path = BASE_PATH . 'assets/templates/' . $templateName . '.php';

        $data = $controller->getData();
        ob_start();
        include $path;
        $templateContent = ob_get_contents();
        ob_end_clean();

        $data = new ControllerData();
        $data->controller = $controller;
        $data->content = $templateContent;


        ob_start();
        include BASE_PATH . 'assets/templates/index.php';
        $themeContent = ob_get_contents();
        ob_end_clean();


        echo $themeContent;
    }

    public function getPart($name){
        include BASE_PATH . 'assets/parts/' . $name . '.php';
    }
}