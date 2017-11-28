<?php
/**
 * Created by PhpStorm.
 * User: sergejandrejkin
 * Date: 24.11.17
 * Time: 23:07
 */

class Goods extends Object {

    public $id;
    public $name;
    public $short_descr;
    public $full_descr;
    public $status;
    public $amount;
    public $order_possible;

    static function TableName()
    {
        return 'goods';
    }


    public static function createNew($name, $short_descr, $full_descr, $status, $amount, $order, $categories){

        /** @var Object $class */
        $class = get_called_class();
        $table = $class::TableName();
        $oQuery = Object::$db->prepare("INSERT INTO {$table}(name, short_descr, full_descr, status, amount, order_possible) 
                                        VALUES (:name, :short_descr, :full_descr, :status, :amount, :order)");
        $oQuery->execute(['name' => $name, 'short_descr'=> $short_descr, 'full_descr' => $full_descr, 'status' => $status, 'amount' => $amount, 'order' => $order]);
        //find current good by name
        $current_good = Goods::findByName($name);
        //write data into connect table (I'll use foreach because one good could have many categories)
        foreach ($categories as $key => $id){
            $oQuery = Object::$db->prepare("INSERT INTO category_has_good (good, category) VALUES (:good_id, :category_id)");
            $oQuery->execute(['good_id' => intval($current_good->id), 'category_id' => intval($id)]);
        }
    }

    public function getCategory()
    {
        $oQuery = Object::$db->query("SELECT category.name, category.id
                                                FROM category_has_good JOIN category ON category.id = category_has_good.category WHERE good=$this->id");
        return $oQuery->fetchAll(PDO::FETCH_ASSOC);

    }
    public function edit() {
        echo 'goods';
        $prepare = self::$db->prepare(
            'UPDATE Goods SET
                        name = :name, 
                        short_descr = :short_descr, 
                        full_descr = :full_descr,
                        status = :status,
                        amount = :amount,
                        order_possible = :order_possible
                        WHERE
                        id=:id');
        $prepare->execute(
            array(
                'id' => $this->id,
                'name'=> $this->name,
                'short_descr'=> $this->short_descr,
                'full_descr'=> $this->full_descr,
                'status'=> $this->status,
                'amount'=> $this->amount,
                'order_possible'=> $this->order_possible
            ));

}};