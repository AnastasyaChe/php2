<?php
namespace app\models;

class Category extends Model
{
    public $id;
    public $category;
    public $discount;
        

    public function getTableName(): string
    {
        return "catagory";
    }
}