<?php
/**
 * Created by PhpStorm.
 * User: sergejandrejkin
 * Date: 24.11.17
 * Time: 22:20
 */

include_once($_SERVER["DOCUMENT_ROOT"].'/models/Category.php');
include_once($_SERVER["DOCUMENT_ROOT"].'/models/Goods.php');

class AdminController extends Controller {

    public function actionIndex()
    {
        foreach(Category::getAllNames() as $key => $value)
        {
            $this->view->addData($key, $value);
        };
        $this->view->content = 'AdminView.php';
        $this->view->generate();
    }

    public function actionCreateCat()
    {
        // if POST[status]'on' set '1' else '0'
        Category::createNew($_POST['name'],$_POST['short_descr'],$_POST['full_descr'],(isset($_POST['status']))?1:0);

    }

    public function actionCreateGood()
    {
        $keys = array_keys($_POST);
        //finding uniq ID of categories
        $categories_of_new_good = preg_grep('/^[0-9]/', $keys);
        // if POST[status]'on' set '1' else '0'
        Goods::createNew($_POST['name'],$_POST['short_descr'],$_POST['full_descr'],(isset($_POST['status']))?1:0, intval($_POST['amount']),(isset($_POST['order']))?1:0, $categories_of_new_good);
    }


};