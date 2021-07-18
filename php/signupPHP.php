<?php 
    require "functions.php";
    require "classes.php";
                 
    $fname=(isset($_POST['fname']))?$_POST['fname']:"";
    $lname=(isset($_POST['lname']))?$_POST['lname']:"";
    $email=(isset($_POST['email']))?$_POST['email']:"";
    $password=(isset($_POST['password']))?$_POST['password']:"";
    $passwordConfirm=(isset($_POST['passwordConfirm']))?$_POST['passwordConfirm']:"";
    $accion=(isset($_POST['accion']))?$_POST['accion']:"";
    $random_id = rand(time(), 10000000);

    if($accion=="submit"){
        if($password==$passwordConfirm){
            if(filter_var($email, FILTER_VALIDATE_EMAIL)){              
               $database = new Database();
               $database->name = '/json/users.json';
               $array_data = $database->bring_data($database->name);
               $message = confirm_email($email,$array_data);
               if(!isset($message)){
                   $extra = (array) new User($fname, $lname, $email, $password, $random_id);
                   $array_data[] = $extra;
                   $message = $database->send_data($database->name, $array_data);
               } else {
                   $message = 'el correo ya existe';
               }     
            } else {
                $message = "Invalid email";
            }
        } else {
            $message = "The passwords didn't match";
        }
    }


?>