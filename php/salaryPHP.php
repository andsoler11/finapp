<?php
    session_start();
    require "functions.php";
    require "classes.php";

    if(!isset($_SESSION['unique_id'])){
        header("location: index.php");
    }


    $salary=(isset($_POST['salary']))?$_POST['salary']:"";
    $accion=(isset($_POST['accion']))?$_POST['accion']:"";
    $random_id = $_SESSION['unique_id'];





    if($accion=="Submit"){
        $database = new Database();
        $database->name = '/json/salary.json';
        $array_data = $database->bring_data($database->name);
        $filtered = filter_by_value($array_data, 'random_id', $random_id);
        if(!$filtered){
            $extra = (array) new Salary($random_id, $salary);
            $array_data[] = $extra;
            $message_interno = $database->send_data($database->name, $array_data);
            if(isset($message_interno)){
                header('location:finapp.php');
            }   
        } else {
            $arraySize = sizeof($array_data);
            for ($i=0; $i < $arraySize; $i++) { 
                if($array_data[$i]['random_id'] == $random_id){
                    $array_data[$i]['salary'] = $salary;
                }
            }
            $message_interno = $database->send_data($database->name, $array_data);
            if(isset($message_interno)){
                header('location:finapp.php');
            }   
        }
    }

    ?>