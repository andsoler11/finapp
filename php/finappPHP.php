<?php
    session_start();
        
    require "functions.php";
    require "classes.php";

    if(!isset($_SESSION['unique_id'])){
        header("location: index.php");
    }

    $accion=(isset($_POST['accion']))?$_POST['accion']:"";
    $money=(isset($_POST['money']))?$_POST['money']:"";                   
    $thing=(isset($_POST['thing']))?$_POST['thing']:"";
    $random_id = $_SESSION['unique_id'];

    if($accion=="enter"){
        $date = new DateTime();
        $date = $date->format('Y-m-d');
        $database = new Database();
        $database->name = '/json/money.json';
        $array_data = $database->bring_data($database->name);
        $extra = (array) new Money($random_id, $money, $thing, $date);
        $array_data[] = $extra;
        $message_interno = $database->send_data($database->name, $array_data);
        if(isset($message_interno)){
            header('location:finapp.php');
        }   
    }



    if($accion=="Delete All"){
        $database = new Database();
        $database->name = '/json/money.json';
        $array_data = $database->bring_data($database->name);
        $array_data_deleted = delete_data_user($array_data, $random_id);
        $message_interno = $database->send_data($database->name, $array_data_deleted);
        if(isset($message_interno)){
            header('location:finapp.php');
        }
    }



    if($accion=="Logout"){
        session_destroy();
        header('location:finapp.php');
    }


    $database = new Database();
    $database->name = '/json/money.json';
    $array_data = $database->bring_data($database->name);
    $filtered = filter_by_value($array_data, 'random_id', $random_id);
    if(isset($filtered)){
        $moneyData = $filtered;
    }


    $database = new Database();
    $database->name = '/json/salary.json';
    $array_data = $database->bring_data($database->name);
    $filtered = filter_by_value($array_data, 'random_id', $random_id);
    if(isset($filtered)){
        $salaryData = $filtered;
    }
    


?>