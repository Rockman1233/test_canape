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
        //$this->view->addData();
        $this->view->content = 'AdminView.php';
        $this->view->generate();

    }

};