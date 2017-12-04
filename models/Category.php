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

    public function edit() {

        $prepare = self::$db->prepare(
            'UPDATE Category SET
                        name = :name, 
                        short_descr = :short_descr, 
                        full_descr = :full_descr,
                        status = :status
                        WHERE
                        id=:id');

        $prepare->execute(
            array(
                'id' => $this->id,
                'name'=> $this->name,
                'short_descr'=> $this->short_descr,
                'full_descr'=> $this->full_descr,
                'status'=> $this->status
            ));

    }

    public static function CategorySorting($category_id, $page)
    {
        $page = intval($page);
        $count = Object::SHOW_DEFAULT;
        $offset = $count * ($page - 1);
        $oQuery = Object::$db->query("SELECT goods.name, goods.short_descr, goods.full_descr, goods.status, goods.amount, goods.order_possible, goods.id 
                                                FROM category_has_good JOIN goods ON goods.id = category_has_good.good WHERE category=$category_id AND status>0
                                                ORDER BY name LIMIT $count OFFSET $offset");
        return $oQuery->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function TotalCategorySorting($category_id)
    {
        $oQuery = Object::$db->query("SELECT COUNT(*) FROM category_has_good JOIN goods ON goods.id = category_has_good.good WHERE category=$category_id AND status>0");
        return $oQuery->fetch(PDO::FETCH_ASSOC);
    }
}