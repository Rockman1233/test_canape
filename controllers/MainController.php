<?php
/**
 * Created by PhpStorm.
 * User: sergejandrejkin
 * Date: 24.11.17
 * Time: 22:20
 */

class MainController extends Controller {

    public function actionIndex()
    {
        $this->view->__construct('IndexView.php');
        //$this->view->addData();
        $this->view->generate();

    }

};