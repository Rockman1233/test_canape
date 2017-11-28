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
        foreach(Category::getAllNames_without_pagination() as $key => $value)
        {
            $this->view->addData($key, $value);
        };

        foreach(Goods::getAllNames_without_pagination() as $key => $value)
        {
            $this->view->addData2($key, $value);
        };
        $this->view->content = 'AdminView.php';
        $this->view->generate();
    }

    public function actionCreateCat()
    {
        // if POST[status]'on' set '1' else '0'
        Category::createNew($_POST['name'],$_POST['short_descr'],$_POST['full_descr'],(isset($_POST['status']))?1:-1);
        header('Location: ' . $_SERVER['HTTP_REFERER']);

    }

    public function actionEdit($cat_id,$object)
    {
        $current_obj = $object::findById($cat_id);
        var_dump($current_obj);
        $this->view->addData('obj_type', $object);
        $this->view->addData('cur_cat', $current_obj);
        $this->view->content = 'EditView.php';
        $this->view->generate();
        //set values for saving
        foreach ($_POST as $par => $value) {
            if ($value) {
                $current_obj->$par = $value;
            }
        }
        $current_obj->edit();


    }

    public function actionCreateGood()
    {
        $keys = array_keys($_POST);
        //finding uniq ID of categories
        $categories_of_new_good = preg_grep('/^[0-9]/', $keys);
        // if POST[status]'on' set '1' else '0'
        Goods::createNew($_POST['name'],$_POST['short_descr'],$_POST['full_descr'],(isset($_POST['status']))?1:-1, intval($_POST['amount']),(isset($_POST['order']))?1:-1, $categories_of_new_good);
        header('Location: ' . $_SERVER['HTTP_REFERER']);
    }

};