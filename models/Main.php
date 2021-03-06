<?php



abstract class Object
{

    /** @var  PDO */
    static $db;
    const SHOW_DEFAULT = 3; //pagination - How many goods do you want to see on page?

    public function __construct($params = [])
    {
        $className = get_called_class();
        foreach ($params as $param_name => $param_value) {
            if (property_exists($className, $param_name))
                $this->$param_name = $param_value;
        }
    }


    abstract static function TableName();

    /**
     * @param integer $id
     * @return
     */
    public static function findById($id)
    {
        /** @var Object $class */
        $class = get_called_class();
        $table = $class::TableName();

        $oQuery = Object::$db->prepare("SELECT * FROM {$table} WHERE id=:need_id");
        $oQuery->execute(['need_id' => $id]);
        $aRes = $oQuery->fetch(PDO::FETCH_ASSOC);

        return $aRes ? new $class($aRes) : null;
    }

    public static function findByName($name)
    {
        /** @var Object $class */
        $class = get_called_class();
        $table = $class::TableName();

        $oQuery = Object::$db->prepare("SELECT * FROM {$table} WHERE name=:name");
        $oQuery->execute(['name' => $name]);
        $aRes = $oQuery->fetch(PDO::FETCH_ASSOC);

        return $aRes ? new $class($aRes) : null;
    }

    public static function Total()
    {
        $class = get_called_class();
        $table = $class::TableName();
        $oQuery = Object::$db->query("SELECT COUNT(*) FROM {$table} WHERE status>0");
        return $oQuery->fetch(PDO::FETCH_ASSOC);
    }

    public static function getAllNames($page)
    {
        $page = intval($page);
        $count = Object::SHOW_DEFAULT;
        $offset = $count * ($page - 1);
        $class = get_called_class();
        $table = $class::TableName();
        //костыль для списка категорий
        $oQuery = Object::$db->query("SELECT * FROM {$table} WHERE status>0 ORDER BY name LIMIT $count OFFSET $offset");
        return $oQuery->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function getAllNames_without_pagination($only_active = true)
    {
        $class = get_called_class();
        $table = $class::TableName();
        $oQuery =  ($only_active)?Object::$db->query("SELECT * FROM {$table} WHERE status>0  ORDER BY name"):
                                  Object::$db->query("SELECT * FROM {$table} ORDER BY name");
        return $oQuery->fetchAll(PDO::FETCH_ASSOC);
    }




}


