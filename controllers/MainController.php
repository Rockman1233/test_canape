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

        foreach(Category::getAllNames_without_pagination(true) as $key => $value)
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

    public function actionSort($category_id, $page=1)
    {
        //небольшой костыль для вырезки номера из пагинации
        $page = preg_replace('/page_/', '', $page);
        $total = Category::TotalCategorySorting($category_id);
        $total = $total['COUNT(*)']; //костыль
        foreach(Category::CategorySorting($category_id, $page) as $key => $value)
        {
            $this->view->addData($key, $value);
        };

        foreach(Category::getAllNames_without_pagination(true) as $key => $value)
        {
            $this->view->addData2($key, $value);
        };
        //for indentification string adding index 'page'
        $pagination = new Pagination($total, "$page", Goods::SHOW_DEFAULT, 'page_');
        $pag = $pagination->get();
        $this->view->pagination = $pag;
        //make a view
        $this->view->content = 'IndexView.php';
        $this->view->generate();

    }

    public function actionCurrent($good_id)
    {
        $current_good = Goods::findById($good_id);
        //if request good isn't exists -> redirect to 404
        if(!$current_good){return include_once($_SERVER["DOCUMENT_ROOT"].'/views/404.php');}
        $categories = $current_good->getCategory();
        $this->view->addData('categories', $categories);
        $this->view->addData('current_good', $current_good);
        //make a view
        $this->view->content = 'CurrentView.php';
        $this->view->generate();

    }




};