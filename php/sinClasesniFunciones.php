<?php


////////////////// login!!!!!!!!!!!!!!!!---------------------
if($accion=="Continue to Finapp"){
    $current_data = file_get_contents(__DIR__ .'/json/users.json');
    $array_data = json_decode($current_data, true);
    foreach ($array_data as $data){  
        if($email == $data['email'] && $password == $data['password']){
            $_SESSION['unique_id'] = $data['random_id'];
            header("location:finapp.php");
       }else {
                $message = "Usuario y/o contraseña incorrecta";
        }
    }
}




//---------------------------- signUp -----------------------------//


if($accion=="submit"){
    if($password==$passwordConfirm){
        if(filter_var($email, FILTER_VALIDATE_EMAIL)){          
            if(file_exists(__DIR__ . '/json/users.json')){
                $current_data = file_get_contents(__DIR__ .'/json/users.json');
                $array_data = json_decode($current_data, true);
                foreach ($array_data as $data){
                    if($email == $data['email']){
                        $message = 'el correo ya existe';
                    }
                }
                if(!isset($message)){
                    $extra = [
                        'fname' => $fname,
                        'lname' => $lname,
                        'email' => $email,
                        'password' => $password,
                        'random_id' => $random_id
                    ];
                    $array_data[] = $extra;
                    $final_data = json_encode($array_data);
                    if(file_put_contents(__DIR__ . '/json/users.json', $final_data)){
                       $message = 'usuario creado';
                    }
                }
            } else {
                echo 'no existe la carpeta';
            }
        } else {
            $message = "Invalid email";
        }
    } else {
        $message = "The passwords didn't match";
    }
}








//-------------------------- Finapp enter ------------------------------//
if($accion=="enter"){
    if(file_exists(__DIR__ . '/json/money.json')){
        $current_data = file_get_contents(__DIR__ .'/json/money.json');
        $array_data = json_decode($current_data, true);
        $extra = [
            'random_id' => $random_id,
            'money' => $money,
            'thing' => $thing,
            'date' => $date,
        ];
        $array_data[] = $extra;
        $final_data = json_encode($array_data);
        if(file_put_contents(__DIR__ . '/json/money.json', $final_data)){
            header('location:finapp.php');
        } 
    } else {
        echo 'no existe la carpeta';
    }

}

//------------------ finapp delete -----------------------------//
if($accion=="Delete All"){
    if(file_exists(__DIR__ . '/json/money.json')){
        $current_data = file_get_contents(__DIR__ .'/json/money.json');
        $array_data = json_decode($current_data, true);
        $arraySize = sizeof($array_data);
        for ($i=0; $i < $arraySize; $i++) { 
            if($array_data[$i]['random_id'] == $random_id){
                unset($array_data[$i]);
            }
        }
        $final_data = json_encode($array_data);
        if(file_put_contents(__DIR__ . '/json/money.json', $final_data)){
            header('location:finapp.php');
        } 
    } else {
        echo 'no existe la carpeta';
    }
}









//----------------------- finapp traer info del usuario --------------//

if(file_exists(__DIR__ . '/json/money.json')){
    $current_data = file_get_contents(__DIR__ .'/json/money.json');
    $array_data = json_decode($current_data, true);
    /*      $callback = function($item) use (&$callback, &$random_id) {
            echo "<pre>";
            var_dump($item);
            if (is_array($item)) {
                return array_filter($item, $callback);
            }else {
                return $item == $random_id;
            }
        };
*/
    function filter_by_value ($array, $index, $value){
        if(is_array($array) && count($array)>0) 
        {
            foreach(array_keys($array) as $key){
                $temp[$key] = $array[$key][$index];
                if ($temp[$key] == $value){                    
                    $newarray[$key] = $array[$key];
                }
            }
          }
      if(isset($newarray)){
        return $newarray;
      }
    }

    //$filtered = array_filter($array_data, 'buscar');
    $filtered = filter_by_value($array_data, 'random_id', $random_id);
    //$filtered = array_filter($array_data, $callback);
    //echo "<pre>";
    //var_dump($array_data); 
    //echo '------------- <br>';
    //var_dump($filtered);
    if(isset($filtered)){
        $moneyData = $filtered;
    }
     
}

//------------------- traer salario del usuario ---------------------//
if(file_exists(__DIR__ . '/json/salary.json')){
    $current_data = file_get_contents(__DIR__ .'/json/salary.json');
    $array_data = json_decode($current_data, true);
    $filtered = filter_by_value($array_data, 'random_id', $random_id);
    if(isset($filtered)){
        $salaryData = $filtered;
    }
}



//---------------- salary, colocar o actualizar salario -----------------------//
if($accion=="Submit"){

    $current_data = file_get_contents(__DIR__ .'/json/salary.json');
    $array_data = json_decode($current_data, true);
    function filter_by_value ($array, $index, $value){
        if(is_array($array) && count($array)>0) 
        {
            foreach(array_keys($array) as $key){
                $temp[$key] = $array[$key][$index];
                if ($temp[$key] == $value){                    
                    $newarray[$key] = $array[$key];
                }
            }
          }
      return $newarray;
    }
    $filtered = filter_by_value($array_data, 'random_id', $random_id);

    if(!$filtered){
        $extra = [
            'salary' => $salary,
            'random_id' => $random_id
        ];
        $array_data[] = $extra;
        $final_data = json_encode($array_data);
        if(file_put_contents(__DIR__ . '/json/salary.json', $final_data)){
            header('location:finapp.php');
        }

    } else {
        $current_data = file_get_contents(__DIR__ .'/json/salary.json');
        $array_data = json_decode($current_data, true);    
        $arraySize = sizeof($array_data);
        for ($i=0; $i < $arraySize; $i++) { 
            if($array_data[$i]['random_id'] == $random_id){
                $array_data[$i]['salary'] = $salary;
            }
        }
        $final_data = json_encode($array_data);
        if(file_put_contents(__DIR__ . '/json/salary.json', $final_data)){
            header('location:finapp.php');
        }
    }

}








?>