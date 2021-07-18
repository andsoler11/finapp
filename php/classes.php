<?php


class Database 
{   

    public $name;


    public function bring_data($name){
        if(file_exists(__DIR__ . '/json/users.json')){
            $current_data = file_get_contents(__DIR__ .$name);
            $array_data = json_decode($current_data, true);
            return $array_data;
        } else {
            return 'no hay database';
        }
    }

    public function send_data($name, $array_data){
        $final_data = json_encode($array_data);
        if(file_put_contents(__DIR__ . $name, $final_data)){
            return 'usuario creado';
        }
    }
}


class User 
{

    public $fname;
    public $lname;
    public $email;
    public $password;
    public $random_id;

    public function __construct($fname, $lname, $email, $password, $random_id)
    {
        $this->fname = $fname;
        $this->lname = $lname;
        $this->email = $email;
        $this->password = $password;
        $this->random_id = $random_id;
    }
}


class Money 
{
    public $random_id;
    public $money;
    public $thing;
    public $date;

    public function __construct($random_id, $money, $thing, $date)
    {
        $this->random_id = $random_id;
        $this->money = $money;
        $this->thing = $thing;
        $this->date = $date;
    }
}

class Salary 
{
    public $random_id;
    public $salary;

    public function __construct($random_id, $salary)
    {
        $this->random_id = $random_id;
        $this->salary = $salary;
    }
}



?>