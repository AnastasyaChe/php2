<?php
namespace app\models;

class Orders extends Model
{
    public $id;
    public $user_id;
    public $product_id;
    public $count;
      

    public function getTableName(): string
    {
        return "orders";
    }
}