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

    public function actionIndex($page=1)
    {

        foreach(Goods::getAllNames($page) as $key => $value)
        {
            $this->view->addData($key, $value);
        };

        foreach(Category::getAllNames($page) as $key => $value)
        {
            $this->view->addData2($key, $value);
        };
        //pagination
        $total = Goods::Total();
        $total = $total['COUNT(*)']; //костыль
        $pagination = new Pagination("$total", "$page", Goods::SHOW_DEFAULT, '');
        $pag = $pagination->get();
        $this->view->pagination = $pag;
        //make a view
        $this->view->content = 'IndexView.php';
        $this->view->generate();

    }

    public function actionSort($category_id)
    {

        foreach(Object::CategorySorting($category_id) as $key => $value)
        {
            $this->view->addData($key, $value);
        };

        foreach(Category::getAllNames($page) as $key => $value)
        {
            $this->view->addData2($key, $value);
        };

        //make a view
        $this->view->content = 'IndexView.php';
        $this->view->generate();

    }

    public function actionCurrent($good_id)
    {
        $current_good = Goods::findById($good_id);
        $categories = $current_good->getCategory();
        print_r($categories);
        $this->view->addData('categories', $categories);
        $this->view->addData('current_good', $current_good);
        //make a view
        $this->view->content = 'CurrentView.php';
        $this->view->generate();

    }




};