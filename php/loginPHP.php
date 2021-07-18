<?php

    require "functions.php";
    require "classes.php";

    

    $email=(isset($_POST['email']))?$_POST['email']:"";
    $password=(isset($_POST['password']))?$_POST['password']:"";
    $accion=(isset($_POST['accion']))?$_POST['accion']:"";
    $messageInterno = '';

    if($accion=="Continue to Finapp"){
        $database = new Database();
        $database->name = '/json/users.json';
        $array_data = $database->bring_data($database->name);
        if(confirm_user($email, $password, $array_data)){       
            header("location:finapp.php");
        } else {
            $message = "Usuario y/o contraseña incorrecta";
        }
    }



?>