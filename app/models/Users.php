<?php

class Users extends \Phalcon\Mvc\Model
{
   public $id;
   public $name;
   public $password;
   public $email;
    public function getSource()
    {
        return 'users';
    }
}