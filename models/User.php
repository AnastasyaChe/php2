<?php
namespace app\models;

class User extends Model
{
    public $id;
    public $name;
    public $email;
    public $login;
    public $password;

    public function getByLogin($login) {

    }

    public function getTableName(): string
    {
        return "users";
    }
}