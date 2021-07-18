<?php


$fname=(isset($_POST['fname']))?$_POST['fname']:"";
$lname=(isset($_POST['lname']))?$_POST['lname']:"";
$email=(isset($_POST['email']))?$_POST['email']:"";
$password=(isset($_POST['password']))?$_POST['password']:"";
$passwordConfirm=(isset($_POST['passwordConfirm']))?$_POST['passwordConfirm']:"";
$accion=(isset($_POST['accion']))?$_POST['accion']:"";
$random_id = rand(time(), 10000000);





if(file_exists('users.json')){
    $current_data = file_get_contents('users.json');
    $array_data = json_decode($current_data, true);
    $extra = [
        'fname' => $fname,
        'lname' => $lname,
        'email' => $email,
        'password' => $password,
        'random_id' => $random_id
    ];
    $array_data[] = $extra;
    $final_data = json_encode($array_data);
    if(file_put_contents(__DIR__ . '/users.json', $final_data)){
        echo 'se coloco la informacion en el archivo';
    }
} else {
    echo 'no existe la carpeta';
}



?>