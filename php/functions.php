<?php

function confirm_user($email, $password, $array_data) {
    session_start();
    $final = false;
    foreach ($array_data as $data){
        if($email == $data['email'] && $password == $data['password']){
            $_SESSION['unique_id'] = $data['random_id'];
            $final = true;
        }
    }
    return $final;
}


function confirm_email($email, $array_data){
    foreach ($array_data as $data){
        if($email == $data['email']){
            return 'el correo ya existe';
        }
    }
    
}



function delete_data_user($array_data, $random_id) {
    $arraySize = sizeof($array_data);
    for ($i=0; $i < $arraySize; $i++) { 
        if($array_data[$i]['random_id'] == $random_id){
            unset($array_data[$i]);
        }
    }
    return $array_data;
}




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


?>