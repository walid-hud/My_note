<?php

function is_input_empty($username , $password){

    if(empty($username) || empty($password)){
        return true;
    }
    else{
        return false;
    }
}

function is_account_real($pdo ,$username , $password){
    $user = get_user($pdo , $username, $password);

    if($user){
        return false ;
    }else{
        return true;
    }
}
function get_acount($pdo , $username , $password){
    $user = get_user($pdo , $username, $password);

    if($user){
        return $user ;
    }else{
        return false;
    }
}