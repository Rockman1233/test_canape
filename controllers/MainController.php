<?php
/**
 * Created by PhpStorm.
 * User: sergejandrejkin
 * Date: 24.11.17
 * Time: 22:20
 */

include_once($_SERVER["DOCUMENT_ROOT"].'/models/Category.php');
include_once($_SERVER["DOCUMENT_ROOT"].'/models/Goods.php');
class MainController extends Controller {

    public function actionIndex($page)
    {

        foreach(Goods::getAllNames($page) as $key => $value)
        {
            $this->view->addData($key, $value);
        };

        foreach(Category::getAllNames($page) as $key => $value)
        {
            $this->view->addData2($key, $value);
        };
        $this->view->content = 'IndexView.php';
        $this->view->generate();

        //pagination
        $total = Goods::Total();
        $total = $total['COUNT(*)'];
        $pagination = new Pagination("$total", "$page", Goods::SHOW_DEFAULT, '');
        print_r($pagination->get());


    }

};