<?php



abstract class Object{

    /** @var  PDO */
    static $db;

    public function __construct($params = [])
    {
        $className = get_called_class();
        foreach ($params as $param_name => $param_value){
            if (property_exists($className, $param_name ))
                $this->$param_name = $param_value;
        }
    }


    abstract static function TableName();

    /**
     * @param integer $id
     * @return
     */
    public static function findById($id){

        /** @var Object $class */
        $class = get_called_class();
        $table = $class::TableName();

        $oQuery = Object::$db->prepare("SELECT * FROM {$table} WHERE id=:need_id");
        $oQuery->execute(['need_id' => $id]);
        $aRes = $oQuery->fetch(PDO::FETCH_ASSOC);

        return $aRes? new $class($aRes):null;
    }


}



