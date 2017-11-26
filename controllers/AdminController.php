<?php
/**
 * Created by PhpStorm.
 * User: sergejandrejkin
 * Date: 24.11.17
 * Time: 22:20
 */

class AdminController extends Controller {

    public function actionIndex()
    {
        $this->view->__construct('AdminView.php');
        //$this->view->addData();
        $this->view->generate();

    }

};