<?php
/**
 * Created by PhpStorm.
 * User: sergejandrejkin
 * Date: 24.11.17
 * Time: 22:23
 */

class Controller {
    public $view;

    function __construct($template='template.php')

    {
        $this->view = new View($template);
    }

    public function actionIndex() {

    }


}