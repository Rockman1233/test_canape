<?php
/**
 * Created by PhpStorm.
 * User: sergejandrejkin
 * Date: 24.11.17
 * Time: 23:07
 */

class Category extends Object {

    public $id;
    public $name;
    public $short_descr;
    public $full_descr;
    public $status;

    static function TableName()
    {
        return 'category';
    }

    public static function createNew($name, $short_descr, $full_descr, $status){

        /** @var Object $class */
        $class = get_called_class();
        $table = $class::TableName();
        $oQuery = Object::$db->prepare("INSERT INTO {$table}(name, short_descr, full_descr, status) 
                                        VALUES (:name, :short_descr, :full_descr, :status) ");
        $oQuery->execute(['name' => $name, 'short_descr'=> $short_descr, 'full_descr' => $full_descr, 'status' => $status]);

    }
}