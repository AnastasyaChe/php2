<?php
namespace app\models;

class UserInfo extends Model
{
    public $id;
    public $fio;
    public $adress;
    public $phone;
    public $email;

    

    public function getTableName(): string
    {
        return "user_info";
    }
}