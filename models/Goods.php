<?php
/**
 * Created by PhpStorm.
 * User: sergejandrejkin
 * Date: 24.11.17
 * Time: 23:07
 */

class Goods extends Object {

    static function TableName()
    {
        return 'goods';
    }

    public static function createNew($name, $short_descr, $full_descr, $status, $amount, $order){

        /** @var Object $class */
        $class = get_called_class();
        $table = $class::TableName();
        $oQuery = Object::$db->prepare("INSERT INTO {$table}(name, short_descr, full_descr, status, amount, order_possible) 
                                        VALUES (:name, :short_descr, :full_descr, :status, :amount, :order)");
        $oQuery->execute(['name' => $name, 'short_descr'=> $short_descr, 'full_descr' => $full_descr, 'status' => $status, 'amount' => $amount, 'order' => $order]);

    }
};