<?php
namespace app\models;

use app\interfaces\ModelInterface;
use app\services\Db;

abstract class Model implements ModelInterface
{
    protected $db;
    protected $tableName;

    public function __construct()
    {
        $this->db = Db::getInstance();
        $this->tableName = $this->getTableName();
    }

    public function getAll()
    {
        $sql = "SELECT * FROM {$this->tableName}";
        return $this->db->queryAll($sql);
    }

    public function getById(int $id)
    {
        $sql = "SELECT * FROM {$this->tableName} WHERE id = :id";
        return $this->db->queryOne($sql, [':id' => $this->id]);
    }

    function create() {
        $keys = [];
        $values = [];
        foreach($this as $key => $value) {
           $keys[] = $key;
           $values[] = $value;
        }
        $keys = implode(",", $keys);
        $values = implode(",", $values);

        $sql = "INSERT INTO {$this->tableName} $keys VALUES $values";
        return $this->db->execute($sql);

    }
    function update(){
        
        $update_fields = [];
        foreach($this as $key => $value){
            $value = is_numeric($value) ? : "'$value'";
            $update_fields[] = "{$key} = {$value}";
        }
        $update_fields = implode(",", $update_fields);
        $sql = "UPDATE {$this->tableName} SET {$update_fields} WHERE id = :id";
        return $this->db->execute($sql);
    }
    function delete(int $id)
    {
        return $this->db->execute("DELETE FROM {$this->tableName} WHERE id = :id");
    }
    
}